<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #e8f5e9, #f1f8f6);
      color: #333;
    }

    section {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      min-height: 100vh;
      padding: 20px;
    }

    .glass-container {
      position: relative;
      margin: 40px auto;
      padding: 40px;
      width: 100%;
      max-width: 1000px;
      background: rgba(255, 255, 255, 0.85);
      border: 1px solid rgba(0, 0, 0, 0.05);
      backdrop-filter: blur(8px);
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.08);
      z-index: 200;
    }

    .glass-container h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 2em;
      font-weight: 600;
      color: #2e7d32;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .logout-btn {
      padding: 10px 18px;
      background: #66bb6a;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      color: #fff;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .logout-btn:hover {
      background: #388e3c;
      transform: translateY(-2px);
    }

    .search-form {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 6px 12px;
      border-radius: 8px;
      background: #f1f8f6;
      border: 1px solid #c8e6c9;
    }

    .search-form input {
      border: none;
      background: transparent;
      padding: 8px;
      font-size: 14px;
      flex: 1;
    }

    .search-form input:focus {
      outline: none;
    }

    .search-form button {
      padding: 8px 16px;
      font-size: 14px;
      font-weight: 600;
      border-radius: 6px;
      border: none;
      background: #43a047;
      color: #fff;
      transition: 0.3s ease;
    }

    .search-form button:hover {
      background: #2e7d32;
      transform: translateY(-2px);
    }

    .table-responsive {
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #ffffff;
    }

    th, td {
      padding: 14px;
      text-align: center;
      font-size: 14px;
    }

    th {
      background: #a5d6a7;
      color: #1b5e20;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    td {
      color: #2e2e2e;
      border-bottom: 1px solid #e0e0e0;
    }

    tr:last-child td {
      border-bottom: none;
    }

    tr:hover {
      background: #f1f8f6;
      transition: 0.3s ease;
    }

    a {
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      margin: 0 4px;
      display: inline-block;
    }

    a[href*="update"] {
      background: #81c784;
      color: #fff;
    }

    a[href*="update"]:hover {
      background: #388e3c;
    }

    a[href*="delete"] {
      background: #ef5350;
      color: #fff;
    }

    a[href*="delete"]:hover {
      background: #c62828;
    }

    .button-container {
      text-align: center;
      margin-top: 20px;
    }

    .btn-create {
      width: 50%;
      padding: 14px;
      border: none;
      background: #2e7d32;
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-create:hover {
      background: #1b5e20;
      transform: translateY(-2px);
    }

    .user-status {
      background: #f1f8f6;
      border: 1px solid #c8e6c9;
      padding: 10px 15px;
      border-radius: 8px;
      display: inline-block;
      color: #2e7d32;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .user-status strong {
      font-weight: 600;
    }

    .user-status .username {
      color: #1b5e20;
      font-weight: 500;
    }

    .user-status .role {
      font-size: 13px;
      color: #555;
    }

    .user-status.error {
      background: #fff0f0;
      border: 1px solid #ffcdd2;
      color: #c62828;
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin: 25px 0;
    }

    .pagination-container ul {
      display: flex;
      list-style: none;
      gap: 8px;
      padding: 0;
      margin: 0;
    }

    .pagination-container li a,
    .pagination-container li span {
      display: block;
      padding: 8px 14px;
      border: 1px solid #c8e6c9;
      border-radius: 6px;
      background: #f1f8f6;
      color: #2e7d32;
      font-size: 14px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .pagination-container li a:hover {
      background: #a5d6a7;
      color: #1b5e20;
    }

    .pagination-container li.active span {
      background: #43a047;
      color: #fff;
      border-color: #2e7d32;
      font-weight: bold;
    }
    .pagination a,
    .pagination strong {
      margin: 0 3px;
      padding: 8px 12px;
      border-radius: 6px;
      border: 1px solid #2e7d32 !important;
      font-size: 14px;
      text-decoration: none;
      color: #ffffffff !important;   
      background: #2e7d32 !important;
    }

    .pagination a:hover {
      background: #ffffffff !important;
      color: #198754 !important;
    }

    .pagination strong {
      background: #ffffffff !important;
      color: #2e7d32 !important;
    }

    .page-link.active {
      background-color: #ffffff !important;
      color: #2e7d32 !important;
      border: 1px solid #2e7d32 !important;
    }

    @media (max-width: 768px) {
      .top-bar {
        flex-direction: column;
        gap: 15px;
      }
      .search-form {
        width: 100%;
      }
      table {
        font-size: 13px;
      }
      th, td {
        padding: 10px;
      }
      .btn-create {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <section>
    <div class="glass-container">
      <h2>
        <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?>
      </h2>

      <?php if(!empty($logged_in_user)): ?>
        <div class="user-status">
          <strong>Welcome:</strong> 
          <span class="username"><?= html_escape($logged_in_user['username']); ?></span>
        </div>
      <?php else: ?>
        <div class="user-status error">
          Logged in user not found
        </div>
      <?php endif; ?>

      <div class="top-bar">
        <a href="<?=site_url('auth/logout'); ?>"><button class="logout-btn">Logout</button></a>
        <form action="<?=site_url('users');?>" method="get" class="search-form">
          <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
          <input name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
          <button type="submit">Search</button>  
        </form>
      </div>

      <div class="table-responsive">
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <?php if ($logged_in_user['role'] === 'admin'): ?>
              <th>Password</th>
              <th>Role</th>
            <?php endif; ?>
            <th>Action</th>
          </tr>
          <?php foreach ($users as $user): ?>
          <tr>
            <td><?=html_escape($user['id']); ?></td>
            <td><?=html_escape($user['username']); ?></td>
            <td><?=html_escape($user['email']); ?></td>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <td>*******</td>
                <td><?= html_escape($user['role']); ?></td>
              <?php endif; ?>
            <td>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <a href="<?=site_url('/users/update/'.$user['id']);?>">Update</a>
                <a href="<?=site_url('/users/delete/'.$user['id']);?>" onclick="return confirm('Are you sure?')">Delete</a>
              <?php else: ?>
                <span class="text-muted">View Only</span>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="pagination-container">
        <?php echo $page; ?>
      </div>

      <?php if ($logged_in_user['role'] === 'admin'): ?>
        <div class="button-container">
          <a href="<?=site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
        </div>
      <?php endif; ?>
    </div>
  </section>
</body>
</html>
