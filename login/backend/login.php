<?php
session_start();
require 'config/db.php';

// Proses login
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email'");
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {
        // Set session untuk login
        $_SESSION['username'] = $user['name'];
        $_SESSION['role'] = $user['role']; // role dari database
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Email atau password salah.";
    }
}
?>
