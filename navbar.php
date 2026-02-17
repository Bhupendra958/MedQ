<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = $_SESSION['user'] ?? null;
?>

<header class="bg-teal-600 text-white p-4 shadow-lg">
  <div class="max-w-7xl mx-auto flex justify-between items-center">

    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <img src="images/d1.png" class="w-8 h-8" alt="Logo" />
      <h1 class="text-xl font-bold">MedQueue</h1>
    </div>

    <!-- Hamburger -->
    <button id="menu-btn" class="md:hidden text-2xl focus:outline-none">
      ☰
    </button>

    <!-- Menu -->
    <nav id="menu"
      class="hidden md:flex flex-col md:flex-row md:items-center md:space-x-6 text-sm md:text-base absolute md:static top-16 left-0 w-full md:w-auto bg-teal-600 md:bg-transparent p-4 md:p-0">

      <a href="index.php" class="block py-2 md:py-0 hover:underline">Home</a>
      <a href="doctor.php" class="block py-2 md:py-0 hover:underline">Doctors</a>
      <a href="about.php" class="block py-2 md:py-0 hover:underline">About</a>
      <a href="feedback.php" class="block py-2 md:py-0 hover:underline">Feedback</a>

      <?php if ($user): ?>
        <a href="dashboard.php" class="block py-2 md:py-0 hover:underline">Dashboard</a>
        <a href="logout.php" class="block py-2 md:py-0 hover:underline text-rose-200">Logout</a>
      <?php else: ?>
        <a href="login.php" class="block py-2 md:py-0 hover:underline">Login</a>
        <a href="register.php" class="block py-2 md:py-0 hover:underline">Register</a>
      <?php endif; ?>

    </nav>
  </div>
</header>

<script>
  const btn = document.getElementById('menu-btn');
  const menu = document.getElementById('menu');

  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>
