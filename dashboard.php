<?php
session_start();
if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: form.php");
    exit();
}
setcookie("username", $_SESSION['name'], time() + 3600, "/");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
           
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard-card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .info {
            margin: 10px 0;
            font-size: 16px;
        }
        .highlight {
            color: #4e73df;
            font-weight: bold;
        }
        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #e74a3b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<div class="dashboard-card">
    <h2>Welcome!</h2>
    <div class="info">Name: <span class="highlight"><?php echo $_SESSION['name']; ?></span></div>
    <div class="info">Email: <span class="highlight"><?php echo $_SESSION['email']; ?></span></div>
    <?php if (isset($_COOKIE['username'])): ?>
        <div class="info">Cookie: <span class="highlight"><?php echo $_COOKIE['username']; ?></span></div>
    <?php endif; ?>
    <a href="form.php" class="logout-btn">Logout</a>
</div>
</body>
</html>
