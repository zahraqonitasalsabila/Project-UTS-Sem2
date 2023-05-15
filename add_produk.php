<?php
include_once("config.php");
$cat_product = mysqli_query($mysqli, "SELECT *  FROM kategori_produk");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>BackOffice Zara Furniture</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Zara Furniture</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="index.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin.php">
                                <span data-feather="home"></span>
                                Daftar Pesanan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_prod.php">
                                <span data-feather="file"></span>
                                Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_cat.php">
                                <span data-feather="file"></span>
                                Kategori
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="container-fluid">
                    <h1>Tambah Produk</h1>
                    <div class="registration-form">
                        <form id='formpesanan' action="CRUD.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group p-2">
                                <input type="text" class="form-control item" id="kode" name="kode" placeholder="Kode Produk" required>
                            </div>
                            <div class="form-group p-2">
                                <input type="text" class="form-control item" id="nama" name="nama" placeholder="Nama" required>
                            </div>
                            <div class="form-group p-2">
                                <input type="number" class="form-control item" id="harga_jual" name="harga_jual" placeholder="Harga Jual" required>
                            </div>
                            <div class="form-group p-2">
                                <input type="number" class="form-control item" id="harga_beli" name="harga_beli" placeholder="Harga Beli" required>
                            </div>
                            <div class="form-group p-2">
                                <input type="number" class="form-control item" id="stok" name="stok" placeholder="Stok" required>
                            </div>
                            <div class="form-group p-2">
                                <input type="number" class="form-control item" id="min_stok" name="min_stok" placeholder="Min Stok" required>
                            </div>
                            <div class="form-group p-2">
                                <input type="text" class="form-control item" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
                            </div>
                            <div class="form-group p-2">
                                <input type="text" class="form-control item" id="kategori_produk_id" list="kategori_list" name="kategori_produk_id" placeholder="Kategori Produk" required>
                                <datalist id="kategori_list">
                                    <?php while ($data = mysqli_fetch_array($cat_product)) : ?>
                                        <option value="<?= $data['id'] ?>" data-id="<?= $data['nama'] ?>"><?= $data['nama'] ?></option>
                                    <?php endwhile; ?>
                                </datalist>
                            </div>
                            <div class="form-group p-2">
                                <input type="file" name="image" accept="image/*" />
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" value="produk" class="btn btn-outline-dark" name="produk">Tambah Produk</button>
                            </div>

                        </form>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tablepesanan').DataTable({

            });
        });
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>