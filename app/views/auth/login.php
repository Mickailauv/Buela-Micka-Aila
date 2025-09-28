<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Font Awesome for eye icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      min-height: 100vh;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #e8f5e9, #f1f8f6);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 40px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.1);
      text-align: center;
    }

    .login-container h2 {
      font-size: 2em;
      font-weight: 600;
      color: #2e7d32;
      margin-bottom: 20px;
    }

    .error-box {
      background: rgba(244, 67, 54, 0.1);
      color: #d32f2f;
      padding: 10px;
      border: 1px solid #e57373;
      border-radius: 8px;
      margin-bottom: 20px;
      font-size: 0.95em;
    }

    .form-group {
      position: relative;
      margin-bottom: 18px;
    }

    .form-group input {
      width: 100%;
      padding: 12px 40px 12px 14px;
      font-size: 14px;
      border: 1px solid #c8e6c9;
      border-radius: 8px;
      background: #fff;
      color: #333;
      transition: 0.3s ease;
      box-sizing: border-box;
    }

    .form-group input:focus {
      border-color: #43a047;
      box-shadow: 0 0 6px rgba(67, 160, 71, 0.4);
      outline: none;
    }

    .toggle-password {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #43a047;
    }

    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 8px;
      background: #2e7d32;
      color: #fff;
      font-size: 1.1em;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn-submit:hover {
      background: #1b5e20;
      transform: translateY(-2px);
    }

    .group {
      margin-top: 15px;
      font-size: 0.9em;
    }

    .group a {
      color: #2e7d32;
      font-weight: 500;
      text-decoration: none;
      transition: 0.2s;
    }

    .group a:hover {
      text-decoration: underline;
      color: #1b5e20;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-box">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="form-group">
        <input type="text" placeholder="Username" name="username" required>
      </div>

      <div class="form-group">
        <input type="password" placeholder="Password" name="password" id="password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit" class="btn-submit">Login</button>
    </form>

    <div class="group">
      Don’t have an account? <a href="<?= site_url('auth/register'); ?>">Register here</a>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    if (togglePassword) {
      togglePassword.addEventListener('click', function () {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }
  </script>
</body>
</html>
