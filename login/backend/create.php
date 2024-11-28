<?php

require './../config/db.php';

if (isset($_POST['submit'])) {
    global $db_connect;

    // Ambil data dari form
    $name = mysqli_real_escape_string($db_connect, $_POST['name']);
    $price = mysqli_real_escape_string($db_connect, $_POST['price']);
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    // Validasi input
    if (empty($name) || empty($price) || empty($image)) {
        echo "Semua kolom wajib diisi!";
        exit();
    }

    // Validasi tipe file
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $imageExtension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    if (!in_array($imageExtension, $allowedExtensions)) {
        echo "File harus berupa gambar (jpg, jpeg, png, gif).";
        exit();
    }

    // Generate nama file unik
    $randomFilename = time() . '-' . md5(rand()) . '.' . $imageExtension;

    // Tentukan path upload
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $randomFilename;

    // Cek apakah folder upload ada
    if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '/upload')) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . '/upload', 0777, true);
    }

    // Upload file
    if (move_uploaded_file($tempImage, $uploadPath)) {
        // Simpan ke database
        $query = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '/upload/$randomFilename')";
        $result = mysqli_query($db_connect, $query);

        if ($result) {
            echo "Berhasil upload dan simpan ke database.";
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($db_connect);
        }
    } else {
        echo "Gagal upload file.";
    }
}
