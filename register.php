<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - MedQueue</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>tailwind.config={theme:{extend:{colors:{brand:'#0D9488',accent:'#F59E0B',violet:'#7C3AED'}}}}</script>
</head>
<body class="bg-gradient-to-br from-teal-50 via-amber-50/30 to-rose-50 min-h-screen flex items-center justify-center px-4 font-sans">

  <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-xl border-2 border-teal-200">
    <div class="text-center mb-6">
      <h2 class="text-3xl font-extrabold text-teal-700 drop-shadow">Create Your MedQueue Account</h2>
      <p class="text-gray-500 text-sm mt-1">Join and skip the queue today!</p>
    </div>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="bg-rose-100 text-rose-800 p-3 rounded-xl mb-4 text-sm font-semibold text-center shadow">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
      <div class="bg-teal-100 text-teal-800 p-3 rounded-xl mb-4 text-sm font-semibold text-center shadow">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
      </div>
    <?php endif; ?>

    <form action="Backend/register.php" method="POST" class="space-y-5">
      <div>
        <label class="block mb-1 font-medium text-gray-700">Username</label>
        <div class="relative">
          <input type="text" name="username" placeholder="choose_a_username" required class="w-full border-2 border-teal-100 px-4 py-2 pl-10 rounded-xl focus:ring-2 focus:ring-teal-400 focus:border-teal-400">
          <span class="absolute left-3 top-2.5 text-gray-400">👤</span>
        </div>
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Full Name</label>
        <div class="relative">
          <input type="text" name="full_name" placeholder="John Doe" required class="w-full border-2 border-teal-100 px-4 py-2 pl-10 rounded-xl focus:ring-2 focus:ring-teal-400 focus:border-teal-400">
          <span class="absolute left-3 top-2.5 text-gray-400">👤</span>
        </div>
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Email</label>
        <div class="relative">
          <input type="email" name="email" placeholder="you@example.com" required class="w-full border-2 border-teal-100 px-4 py-2 pl-10 rounded-xl focus:ring-2 focus:ring-teal-400 focus:border-teal-400">
          <span class="absolute left-3 top-2.5 text-gray-400">📧</span>
        </div>
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Password</label>
        <div class="relative">
          <input type="password" name="password" placeholder="••••••••" required class="w-full border-2 border-teal-100 px-4 py-2 pl-10 rounded-xl focus:ring-2 focus:ring-teal-400 focus:border-teal-400">
          <span class="absolute left-3 top-2.5 text-gray-400">🔒</span>
        </div>
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Register As</label>
        <select name="role" required class="w-full border-2 border-teal-100 px-3 py-2 rounded-xl focus:ring-2 focus:ring-teal-400">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-rose-500 text-white font-semibold py-3 rounded-xl shadow-lg hover:opacity-90 transition duration-300">
        Register
      </button>
    </form>

    <p class="mt-6 text-sm text-center text-gray-600">
      Already have an account? 
      <a href="login.php" class="text-teal-600 font-semibold hover:underline">Login</a>
    </p>
  </div>

</body>
</html>
