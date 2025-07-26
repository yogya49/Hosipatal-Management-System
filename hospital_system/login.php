<?php
session_start();

$error = ''; // To store error message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $users = json_decode(file_get_contents('users.json'), true);

    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        }
    }

    $error = "Invalid credentials. Please try again.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Saakshi Multispeciality Hospital - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-image: url('https://images.ctfassets.net/5ghoewqh73wu/1g43njpFzYtQFmeTGNhdcN/b98de6dbb6af4fafc7c41b2a714307f8/Home_Hero_HighRes.webp');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      color: white;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .overlay {
      background-color: rgba(0, 0, 0, 0.6);
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
    }

    .content {
      z-index: 1;
      position: relative;
      padding: 50px 20px;
      text-align: center;
    }

    .content h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .content p {
      font-size: 1.5rem;
      margin-bottom: 30px;
    }

    .btn-book {
      background-color: white;
      color: #0d6efd;
      font-weight: bold;
      padding: 12px 30px;
      border-radius: 30px;
      font-size: 1.1rem;
      text-decoration: none;
    }

    .btn-book:hover {
      background-color: #e6f0ff;
      color: #0a58ca;
    }

    footer {
      background-color: #0d6efd;
      color: white;
      text-align: center;
      padding: 15px 0;
    }

    .ticker-wrap {
      background: #0d6efd;
      overflow: hidden;
      white-space: nowrap;
      font-weight: bold;
      font-size: 1.5rem;
      padding: 10px;
    }

    .ticker {
      display: inline-block;
      animation: scroll-left 20s linear infinite;
    }

    @keyframes scroll-left {
      0%   { transform: translateX(100%); }
      100% { transform: translateX(-100%); }
    }

    .login-box {
      max-width: 400px;
      margin: 40px auto 0;
      background: rgba(255,255,255,0.1);
      padding: 30px;
      border-radius: 10px;
    }

    .login-box input {
      margin-bottom: 15px;
    }

    .error-message {
      color: #ff6666;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .login-title {
      font-size: 1.8rem;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>

  <!-- Ticker -->
  <div class="ticker-wrap">
    <div class="ticker">
      Cardiology • Neurology • Orthopedics • Pediatrics • Oncology • Dermatology • Gynecology • Urology • ENT • General Surgery
    </div>
  </div>

  <!-- Login Form -->
  <div class="content">
    <h1>Saakshi Multispeciality Hospital</h1>
    <p>Your Health, Our Priority</p>

    <div class="login-box bg-light text-dark">
      <div class="login-title">Login</div>
      <?php if ($error): ?>
        <div class="error-message"><?php echo $error; ?></div>
      <?php endif; ?>
      <form method="POST" action="">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
      <hr>
      <a href="hmsreg.html" target="_blank" class="btn-book d-block mt-3">New User? Book Appointment</a>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    &copy; 2025 Saakshi Multispeciality Hospital. All rights reserved.
  </footer>
</body>
</html>
