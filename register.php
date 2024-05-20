<?php
session_start();
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    if ($stmt->execute([$email, $password])) {
        $_SESSION['success_message'] = "Registration successful! Please login.";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: Could not register user";
    }
}
?>
