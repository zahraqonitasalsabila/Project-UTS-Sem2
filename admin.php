<?php

include_once("config.php");

$pesanan = mysqli_query($mysqli, "SELECT pe.*, pr.img_url FROM pesanan AS pe JOIN produk AS pr WHERE pe.produk_id = pr.id ORDER BY pe.id DESC");
if (!$pesanan) {
  echo "Error: " . mysqli_error($mysqli);
}
$data = array();
while ($row = mysqli_fetch_array($pesanan)) {
  $data[] = $row;
}
$jsonString = json_encode($data);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Pesanan</h1>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered" id="tablepesanan" name="tablepesanan" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Pemesan</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>email</th>
                <th>Jumlah</th>
                <th>Deskripsi</th>
                <th>Produk</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $key => $value) {
                echo '<tr>';
                echo '<td>' . ($key + 1) . '</td>';
                echo '<td>' . $value['tanggal'] . '</td>';
                echo '<td>' . $value['nama_pemesan'] . '</td>';
                echo '<td>' . $value['alamat_pemesan'] . '</td>';
                echo '<td>' . $value['no_hp'] . '</td>';
                echo '<td>' . $value['email'] . '</td>';
                echo '<td>' . $value['jumlah_pesanan'] . '</td>';
                echo '<td>' . $value['deskripsi'] . '</td>';
                echo '<td>' . $value['produk_id'] . '</td>';
                ?>
                <td>
                  <form method="POST" action="edit_order.php">
                    <input type="text" hidden name="id" value="<?php echo $value['id']; ?>">
                    <input type="text" hidden name="produk_id" value="<?php echo $value['produk_id']; ?>">
                    <button type="submit" class="btn btn-primary">Edit</button>
                  </form>
                </td>
                </tr>
              <?php
              };
              ?>
            </tbody>
          </table>
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