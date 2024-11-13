<?php
session_start();
require 'DB/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from database
    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['Id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Login</title>
    
</head>
<body>
<body>
<div class="container bg-light d-flex pt-5 pb-5">
        <div class="left-panel d-none d-md-block col-md-6">
            <h2>Welcome to Ekash</h2>
            <p>Have an issue with 2-factor authentication?</p>
            <a href="#" class="text-white">Privacy Policy</a>
            <div class="mt-auto d-flex justify-content-start">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-x-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="text-white"><i class="fab fa-pinterest"></i></a>
            </div>
        </div>
        <div class="col-md-6 p-4 ">  
        <h2 class="text-center text-uppercase">Sign In</h2>
        <form method="POST" class="mt-4">
         <div class="form-group">
            <input type="text" name="username"  class="form-control" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
            <button type="submit" class="btn btn-sm btn-primary btn-block">Sign in</button>
        </form>
        <a href="register.php"> New to the system? Sign up here</a> <!-- Registration link -->
        </div>
    </div>
</body>
</html>
