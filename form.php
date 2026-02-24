<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = trim($_POST['name']);
    $email = trim($_POST['email']);


    if (!empty($name) && !empty($email)) {


        // Save session
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;


        // Save/update cookie for 1 hour, accessible site-wide
        setcookie("username", $name, time() + 3600, "/");


        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "All fields are required!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
           
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }


        .card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }


        h2 {
            margin-bottom: 20px;
            color: #333;
        }


        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }


        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4e73df;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }


        input[type="submit"]:hover {
            background-color: #2e59d9;
        }


        .error {
            color: red;
            margin-bottom: 10px;
        }


        .footer {
            margin-top: 15px;
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>


<div class="card">
    <h2>Login Form</h2>


    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>


    <form method="POST">
        <input type="text" name="name" placeholder="Enter your name">
        <input type="email" name="email" placeholder="Enter your email">
        <input type="submit" value="Login">
    </form>


    <div class="footer">PHP Authentication Demo</div>
</div>


</body>
</html>

