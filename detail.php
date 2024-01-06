<?php 
  require 'function.php';
  $row = detail();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail aset</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <style>
    @media screen and (max-width: 548px) {
      main {
        display: flex;
        flex-wrap: wrap;
      }

      img {
        width: 100%;
      }

      ul {
        width: 100%;
      }
    }
  </style>
</head>
<body class="p-2">
  
  <h1>Detail aset IT</h1>

  <main class="d-flex gap-2">
    <img src="img/<?php echo $row["gambar"] ?>" class="rounded" alt="..." width="400" style="border: 1px solid grey;">
  
    <ul class="list-group">
      <li class="list-group-item active" aria-current="true">
        <b><?php echo $row["merk"] ?></b>
      </li>
      <li class="list-group-item">Kategori: <?php echo $row["kategori"] ?></li>
      <li class="list-group-item">Jumlah&nbsp;&nbsp;: <?php echo $row["jumlah"] ?></li>
      <li class="list-group-item">Kondisi&nbsp;&nbsp;:  <?php echo $row["kondisi"] ?></li>
    </ul>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>