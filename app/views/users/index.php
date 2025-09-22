<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Users Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
 body {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  background: #f4fdf6; /* light greenish white */
  min-height: 100vh;
  margin: 0;
  padding: 20px;
}

h1 {
  text-align: center;
  color: #198754; /* Bootstrap green */
  margin-bottom: 30px; 
  font-size: 36px;
  font-weight: 700;
  letter-spacing: 1px;
}

.search-form {
  display: flex;
  justify-content: flex-end;
  gap: 12px;
  margin-bottom: 20px;
}

.search-form .btn-search {
  background: #198754;     /* green background */
  color: #fff;             /* white text */
  font-weight: 600;
  border: none;
  border-radius: 6px;
  padding: 10px 18px;
  transition: all 0.3s ease;
}

.search-form .btn-search:hover {
  background: #157347; /* darker green */
}


/* Table */
table {
  width: 90%;
  margin: 0 auto 25px;
  background: #fff;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}

th {
  background: #198754; /* green header */
  color: #fff;
  text-transform: uppercase;
  font-size: 14px;
  padding: 14px;
}

td {
  font-size: 15px;
  color: #444;
  padding: 14px;
  border-bottom: 1px solid #eee;
}

tr:hover {
  background-color: #e9f7ef; /* soft green hover */
  transition: background-color 0.3s ease;
}

/* Action Buttons */
a {
  margin: 0 4px;
  text-decoration: none;
  font-size: 14px;
  font-weight: 600;
  padding: 6px 12px;
  border-radius: 6px;
}

a[href*="update"] {
  color: #fff;
  background: #20c997; /* teal green */
}

a[href*="update"]:hover {
  background: #17a589;
}

a[href*="delete"] {
  color: #fff;
  background: #dc3545;
}

a[href*="delete"]:hover {
  background: #b02a37;
}

/* Create Button */
.btn-create {
  display: inline-block;
  padding: 12px 22px;
  background: #198754;
  color: #fff;
  border-radius: 8px;
  font-weight: 600;
  font-size: 15px;
  text-decoration: none;
  transition: all 0.3s ease;
}

.btn-create:hover {
  background: #157347;
  transform: translateY(-2px);
}

/* Pagination Styling */
.pagination {
  justify-content: center;
}

/* ✅ Force Green Theme Pagination */
.pagination a,
.pagination strong {
  margin: 0 3px;
  padding: 8px 12px;
  border-radius: 6px;
  border: 1px solid #198754 !important;
  font-size: 14px;
  text-decoration: none;
  color: #ffffffff !important;   /* make text green */
  background: #198754 !important; /* white background */
}

.pagination a:hover {
  background: #ffffffff !important;
  color: #198754 !important;
}

.pagination strong {
  background: #ffffffff !important; /* active page green */
  color: #198754 !important;
}
.page-link.active {
    background-color: #ffffff !important; /* white background */
    color: #198754 !important;            /* green text */
    border: 1px solid #198754 !important; /* green border */
}



  </style>
</head>
<body>
  <h1>Users Info</h1>

  <!-- Search -->
  <form action="<?= site_url('users'); ?>" method="get" class="search-form">
    <?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
    <input class="form-control" name="q" type="text" placeholder="Search..." value="<?= html_escape($q); ?>" style="max-width: 300px;">
    <button type="submit" class="btn-search">Search</button>

  </form>

  <!-- Table -->
  <table class="table table-hover table-bordered text-center align-middle">
    <thead>
      <tr>
        <th width="10%">ID</th>
        <th width="30%">Name</th>
        <th width="40%">Email</th>
        <th width="20%">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (html_escape($user) as $users): ?>
        <tr>
          <td><?= html_escape($users['id']); ?></td>
          <td><?= html_escape($users['username']); ?></td>
          <td><?= html_escape($users['email']); ?></td>
          <td>
            <a href="<?= site_url('/users/update/'.$users['id']); ?>">Update</a>
            <a href="<?= site_url('/users/delete/'.$users['id']); ?>" onclick="return confirm('Delete this user?');">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
	echo $page;?>

  <!-- Create Button -->
  <div class="text-center">
    <a href="<?= site_url('users/create'); ?>" class="btn-create">+ Create New User</a>
  </div>
</body>
</html>