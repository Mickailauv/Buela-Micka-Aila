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
      background: linear-gradient(135deg, #e3f2fd, #f5f9ff);
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
      background: rgba(255, 255, 255, 0.9);
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
      color: #1565c0;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .logout-btn {
      padding: 10px 18px;
      background: #42a5f5;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      color: #fff;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .logout-btn:hover {
      background: #1565c0;
      transform: translateY(-2px);
    }

    .search-form {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 6px 12px;
      border-radius: 8px;
      background: #f0f7ff;
      border: 1px solid #bbdefb;
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
      background: #1e88e5;
      color: #fff;
      transition: 0.3s ease;
    }

    .search-form button:hover {
      background: #1565c0;
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
      background: #90caf9;
      color: #0d47a1;
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
      background: #f5f9ff;
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
      background: #64b5f6;
      color: #fff;
    }

    a[href*="update"]:hover {
      background: #1976d2;
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
      background: #1565c0;
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-create:hover {
      background: #0d47a1;
      transform: translateY(-2px);
    }

    .user-status {
      background: #f0f7ff;
      border: 1px solid #bbdefb;
      padding: 10px 15px;
      border-radius: 8px;
      display: inline-block;
      color: #1565c0;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .user-status strong {
      font-weight: 600;
    }

    .user-status .username {
      color: #0d47a1;
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

    .pagination a,
    .pagination strong {
      margin: 0 3px;
      padding: 8px 12px;
      border-radius: 6px;
      border: 1px solid #1565c0 !important;
      font-size: 14px;
      text-decoration: none;
      color: #ffffff !important;
      background: #1565c0 !important;
    }

    .pagination a:hover {
      background: #ffffff !important;
      color: #1565c0 !important;
    }

    .pagination strong {
      background: #ffffff !important;
      color: #1565c0 !important;
    }

    .page-link.active {
      background-color: #ffffff !important;
      color: #1565c0 !important;
      border: 1px solid #1565c0 !important;
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
  <!-- (Body content unchanged) -->
</body>
</html>
