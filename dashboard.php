<?php
session_start();
$user = $_SESSION['user'] ?? null;
if (is_string($user)) {
    $decoded = json_decode($user, true);
    $user = is_array($decoded) ? $decoded : null;
    $_SESSION['user'] = $user;
}
if (!is_array($user) || !isset($user['id'])) {
    header("Location: login.php");
    exit();
}

$appointments = [];
$db_error = false;
try {
    require 'db.php';
    $stmt = $conn->prepare("
        SELECT a.doctor_name, a.department, a.created_at, q.token_number
        FROM appointments a
        LEFT JOIN queue q ON a.id = q.appointment_id
        WHERE a.user_id = ?
        ORDER BY a.created_at DESC
    ");
    $stmt->bind_param("i", $user['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $appointments = $result->fetch_all(MYSQLI_ASSOC);
} catch (Throwable $e) {
    $db_error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - MedQueue</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>tailwind.config={theme:{extend:{colors:{brand:'#0D9488',accent:'#F59E0B',violet:'#7C3AED'}}}}</script>
  <link rel="icon" href="images/d1.png" />
</head>
<body class="bg-gradient-to-br from-teal-50 via-amber-50/20 to-rose-50 min-h-screen font-sans text-gray-800">

  <!-- Navbar -->
  <header class="bg-gradient-to-r from-teal-600 to-violet-600 text-white p-4 shadow-lg">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <img src="images/d1.png" class="w-8 h-8" alt="Logo" />
        <h1 class="text-xl font-bold">MedQueue</h1>
      </div>

      <nav class="flex items-center space-x-6 text-sm md:text-base">
        <a href="index.php" class="hover:underline">Home</a>
        <a href="doctor.php" class="hover:underline">Doctors</a>
        <a href="about.php" class="hover:underline">About</a>
        <a href="feedback.php" class="hover:underline">Feedback</a>

        <?php if ($user): ?>
          <a href="dashboard.php" class="hover:underline">Dashboard</a>
          <a href="logout.php" class="hover:underline text-rose-200">Logout</a>
        <?php else: ?>
          <a href="login.php" class="hover:underline">Login</a>
          <a href="register.php" class="hover:underline">Register</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <!-- Welcome -->
  <section class="py-10 px-4 text-center">
    <?php if (isset($_SESSION['success'])): ?>
      <div class="max-w-xl mx-auto mb-4 bg-teal-100 text-teal-800 px-4 py-3 rounded-xl font-semibold"><?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <h2 class="text-3xl font-extrabold text-teal-800 mb-2">👋 Welcome, <?= htmlspecialchars(is_array($user) ? ($user['full_name'] ?? $user['email'] ?? 'User') : 'User') ?>!</h2>
    <p class="text-gray-600 text-lg">Below are your appointment details and token numbers.</p>
  </section>

  <!-- Appointments Table -->
  <main class="max-w-6xl mx-auto px-6 py-8 bg-white shadow-lg rounded-2xl border-2 border-teal-100">
    <?php if ($db_error): ?>
      <p class="text-amber-700 text-center py-6">Database not set up yet. Run <code class="bg-gray-100 px-2 py-1 rounded">setup.sql</code> in MySQL to create tables, then refresh. You can still use Login and other pages.</p>
    <?php elseif (count($appointments) > 0): ?>
      <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse rounded-xl overflow-hidden">
          <thead>
            <tr class="bg-gradient-to-r from-teal-100 to-violet-100 text-teal-800">
              <th class="px-6 py-3 text-left font-semibold">Doctor</th>
              <th class="px-6 py-3 text-left font-semibold">Department</th>
              <th class="px-6 py-3 text-left font-semibold">Token</th>
              <th class="px-6 py-3 text-left font-semibold">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($appointments as $appt): ?>
              <tr class="border-b border-teal-100 hover:bg-teal-50/50 transition duration-200">
                <td class="px-6 py-4"><?= htmlspecialchars($appt['doctor_name']) ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($appt['department']) ?></td>
                <td class="px-6 py-4 text-teal-700 font-bold"><?= $appt['token_number'] ?? '—' ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars(date("M d, Y", strtotime($appt['created_at']))) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <p class="text-gray-600 text-center text-lg py-8">You haven't booked any appointments yet. <a href="doctor.php" class="text-teal-600 font-semibold hover:underline">Book one now</a>.</p>
    <?php endif; ?>
  </main>

  <!-- Footer -->
  <footer class="mt-10 py-4 text-center text-sm text-gray-500">
    &copy; <?= date('Y') ?> MedQueue. All rights reserved.
  </footer>

</body>
</html>
