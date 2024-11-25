<?php
    if(isset($_POST['email']) && isset($_POST['password'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Cek email dan password
        if ($email === 'admin@admin.com' && $password === 'admin') {
            // Tampilkan pesan dashboard admin jika email adalah admin
            echo "Dashboard Admin";
            // Redirect ke dashboard.php jika diperlukan
            header('Location: ./../dashboard.php');
        } else {
            // Jika email atau password salah
            echo "Email atau password Anda salah";
        }
    }
?>
