
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="text-center">
            <h1 class="display-4 mb-4">Selamat Datang, <?php echo htmlspecialchars($name); ?></h1>
            <p class="lead">Anda telah berhasil masuk ke dashboard admin.</p>
            <div class="row">
                <div class="col-md-6">
                    <a href="show.php" class="btn btn-primary btn-lg w-100">
                        <i class="bi bi-box-seam"></i> Kelola Data Produk
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="logout.php" class="btn btn-danger btn-lg w-100">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
