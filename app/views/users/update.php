<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
    <!-- Title -->
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Users Update View</h1>

    <!-- Form -->
    <form action="<?= site_url('users/update/'.segment(4)); ?>" method="POST" class="space-y-5">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" id="username" name="username"
        value="<?= html_escape($user['username']); ?>"
        required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email"
        value="<?= html_escape($user['email']); ?>"
        required
          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
      </div>

      <!-- Action Buttons -->
      <div class="flex space-x-3">
        <!-- Update -->
        <button type="submit"
          class="flex-1 bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-gray-700 transition duration-200">
          Update
        </button>

        <!-- Cancel -->
        <a href="<?= site_url(''); ?>"
          class="flex-1 text-center bg-gray-200 text-gray-800 font-semibold py-2 px-4 rounded-lg hover:bg-gray-300 transition duration-200">
          Cancel
        </a>
      </div>
    </form>
  </div>

</body>
</html>
