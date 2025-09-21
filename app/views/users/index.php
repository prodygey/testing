<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #1a1a1a;
    }
  </style>
</head>
<body class="bg-gray-900 font-sans text-white">

  <!-- Navbar -->
  <nav class="bg-gray-800 border-b border-purple-900">
    <div class="max-w-7xl mx-auto px-6 py-4">
      <a href="#" class="text-white font-semibold text-xl">📊 User Management</a>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="max-w-6xl mx-auto mt-10 px-4">
    <div class="bg-gray-800 shadow-lg rounded-lg p-6 border border-gray-700">

      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-white">👥 User Directory</h1>
        
        <!-- Search Form -->
        <form action="<?= site_url('users'); ?>" method="get" class="d-flex">
          <input class="form-control me-2" name="q" type="text" placeholder="Search" 
                 value="<?= html_escape($q); ?>">
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
      </div>

      <!-- Create Button -->
      <div class="mb-4">
        <a href="<?= site_url('users/create') ?>"
           class="inline-block bg-purple-700 hover:bg-purple-600 text-white font-medium px-5 py-2 rounded shadow">
           Create New User
        </a>
      </div>

      <!-- Table -->
      <div class="overflow-x-auto rounded-lg">
        <table class="w-full text-center border-collapse">
          <thead>
            <tr class="bg-purple-900 text-white">
              <th class="py-3 px-4 font-medium">ID</th>
              <th class="py-3 px-4 font-medium">Lastname</th>
              <th class="py-3 px-4 font-medium">Firstname</th>
              <th class="py-3 px-4 font-medium">Email</th>
              <th class="py-3 px-4 font-medium">Action</th>
            </tr>
          </thead>
          <tbody class="bg-gray-700">
            <?php if (!empty($users)): ?>
              <?php foreach ($users as $user): ?>
                <tr class="border-b border-gray-600 hover:bg-gray-600">
                  <td class="py-3 px-4 text-purple-300"><?= html_escape($user['id']); ?></td>
                  <td class="py-3 px-4"><?= html_escape($user['last_name']); ?></td>
                  <td class="py-3 px-4"><?= html_escape($user['first_name']); ?></td>
                  <td class="py-3 px-4">
                    <span class="bg-purple-800 text-purple-200 text-sm px-3 py-1 rounded-full">
                      <?= html_escape($user['email']); ?>
                    </span>
                  </td>
                  <td class="py-3 px-4">
                    <a href="<?= site_url('users/update/'.$user['id']); ?>" 
                       class="text-purple-400 hover:text-purple-300">Update</a> | 
                    <a href="<?= site_url('users/delete/'.$user['id']); ?>" 
                       class="text-purple-400 hover:text-purple-300"
                       onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="py-3">No users found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="mt-6">
            <?php echo $page; ?>
      </div>

    </div>
  </div>

</body>
</html>
