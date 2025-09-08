<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-4xl">
    <!-- Title -->
    <h1 class="text-2xl font-bold text-gray-800 mb-6">User List</h1>

    <!-- Table -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded-lg">
        <thead class="bg-gray-600 text-white">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
            <th class="px-6 py-3 text-left text-sm font-semibold">Username</th>
            <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
            <th class="px-6 py-3 text-left text-sm font-semibold">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach (html_escape($users) as $user): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 text-sm text-gray-700"><?= $user['id']; ?></td>
              <td class="px-6 py-4 text-sm font-medium text-gray-900"><?= $user['username']; ?></td>
              <td class="px-6 py-4 text-sm text-gray-700"><?= $user['email']; ?></td>
              <td class="px-6 py-4 text-sm text-gray-700">
                <a href="<?=site_url('users/update/'.$user['id']);?>" 
                   class="text-blue-600 hover:underline">Update</a> 
                | 
                <button onclick="openModal(<?= $user['id']; ?>)" 
                        class="text-red-600 hover:underline">
                  Delete
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Create Button -->
    <div class="mt-6">
      <a href="<?= site_url('users/create'); ?>"
        class="inline-block bg-gray-600 text-white px-5 py-2 rounded-lg shadow hover:bg-gray-700 transition duration-200">
        + Create New User
      </a>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-sm">
      <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Delete</h2>
      <p class="text-gray-600 mb-6">Are you sure you want to delete this user? This action cannot be undone.</p>
      <div class="flex justify-end space-x-3">
        <button onclick="closeModal()" 
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
          Cancel
        </button>
        <a id="confirmDeleteBtn" href="#" 
           class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-red-700">
          Delete
        </a>
      </div>
    </div>
  </div>

  <script>
    let deleteUrl = "";

    function openModal(userId) {
      deleteUrl = "<?= site_url('users/delete/'); ?>" + userId;
      document.getElementById("confirmDeleteBtn").setAttribute("href", deleteUrl);

      document.getElementById("deleteModal").classList.remove("hidden");
      document.getElementById("deleteModal").classList.add("flex");
    }

    function closeModal() {
      document.getElementById("deleteModal").classList.add("hidden");
      document.getElementById("deleteModal").classList.remove("flex");
    }
  </script>

</body>
</html>
