<?php
require '../DB/db.php';
require 'user.php';

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

    if ($password !== $confirm_password) {
        $errorMessage = "Passwords do not match!";
    } else {
        $user = new User($pdo);
        $resultMessage = $user->register($username, $firstname, $lastname, $password, $email);

        if (strpos($resultMessage, 'successfully') !== false) {
            $successMessage = $resultMessage;
        } else {
            $errorMessage = $resultMessage;
        }
    }
}

// Redirect back to register.php with the result messages
header("Location:../register.php?success=" . urlencode($successMessage) . "&error=" . urlencode($errorMessage));
exit();
?>
