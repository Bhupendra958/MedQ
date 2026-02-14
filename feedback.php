<?php
session_start();
$user = $_SESSION['user'] ?? null;
$currentPage = basename($_SERVER['PHP_SELF']);
$sent = isset($_SESSION['feedback_sent']) && $_SESSION['feedback_sent'];
if ($sent) unset($_SESSION['feedback_sent']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['feedback_sent'] = true;
    header('Location: feedback.php');
    exit;
}
function isActive($p) { global $currentPage; return $currentPage === $p ? 'underline' : 'hover:underline'; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback - MedQueue</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { theme: { extend: { colors: { brand: '#0D9488', accent: '#F59E0B', coral: '#F43F5E', violet: '#7C3AED' } } } }
  </script>
  <link rel="icon" href="images/d1.png">
</head>
<body class="bg-gradient-to-br from-teal-50 via-amber-50/30 to-rose-50 min-h-screen text-gray-800 font-sans">

  <header class="bg-gradient-to-r from-teal-600 to-violet-600 text-white p-4 shadow-lg">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <img src="images/d1.png" class="w-8 h-8" alt="Logo">
        <h1 class="text-xl font-bold">MedQueue</h1>
      </div>
      <nav class="flex items-center space-x-6 text-sm md:text-base">
        <a href="index.php" class="<?= isActive('index.php') ?>">Home</a>
        <a href="doctor.php" class="<?= isActive('doctor.php') ?>">Doctors</a>
        <a href="about.php" class="<?= isActive('about.php') ?>">About</a>
        <a href="feedback.php" class="<?= isActive('feedback.php') ?>">Feedback</a>
        <?php if ($user): ?>
          <a href="<?= $user['role'] === 'admin' ? 'Backend/admin/dashboard.php' : 'dashboard.php' ?>">Dashboard</a>
          <a href="logout.php">Logout</a>
        <?php else: ?>
          <a href="login.php">Login</a>
          <a href="register.php">Register</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <main class="max-w-2xl mx-auto px-6 py-12">
    <?php if ($sent): ?>
      <div class="bg-white rounded-3xl shadow-xl border-2 border-teal-200 p-8 text-center">
        <div class="text-5xl mb-4">💜</div>
        <h2 class="text-2xl font-bold text-teal-800 mb-2">Thank you!</h2>
        <p class="text-gray-600">Your feedback has been received. We appreciate you.</p>
        <a href="index.php" class="inline-block mt-6 bg-gradient-to-r from-teal-500 to-violet-500 text-white font-semibold px-6 py-2 rounded-xl hover:opacity-90">Back to Home</a>
      </div>
    <?php else: ?>
      <div class="bg-white rounded-3xl shadow-xl border-2 border-teal-200 p-8">
        <h2 class="text-2xl font-bold text-teal-800 mb-2">Send us feedback</h2>
        <p class="text-gray-600 mb-6">We’d love to hear from you. Drop a message below.</p>
        <form method="POST" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Message</label>
            <textarea name="message" rows="4" placeholder="Your feedback..." required class="w-full border-2 border-teal-100 rounded-xl px-4 py-3 focus:ring-2 focus:ring-teal-400 focus:border-teal-400"></textarea>
          </div>
          <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-rose-500 text-white font-semibold py-3 rounded-xl shadow-lg hover:opacity-90">Send feedback</button>
        </form>
      </div>
    <?php endif; ?>
  </main>

  <footer class="mt-12 py-4 text-center text-sm text-gray-500">
    &copy; <?= date('Y') ?> MedQueue.
  </footer>
</body>
</html>
