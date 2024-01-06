<?php 
  require 'function.php';

  if( isset($_POST["submit"]) ) {
    if( add($_POST) > 0 ) {
      echo "
        <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
        <script type='text/javascript'>

        $(document).ready(function(){

          swal({
            position: 'top-end',
            type: 'success',
            title: 'Berhasil tambah data',
            icon: 'success',
            // showConfirmButton: false,
            // timer: 2500
          })
          .then(() => {
            swal(document.location.href = 'index.php');
          })

        });

        </script>
      ";
    } else {
      echo "
        <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
        <script type='text/javascript'>

        $(document).ready(function(){

          swal({
            position: 'top-end',
            type: 'error',
            title: 'Gagal tambah data',
            icon: 'error'
          })
          .then(() => {
            swal(document.location.href = 'index.php');
          })

        });

        </script>
      ";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah aset IT</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  

  <style>
    .width-input-group {
      width: 130px;
    }
  </style>
</head>
<body>
  
  <main class="p-2">
    <h1>Tambah detail aset IT</h1>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="input-group mb-3">
        <span class="input-group-text width-input-group" id="merk">Merk / Type</span>
        <input type="text" class="form-control" aria-label="Sizing example input" for="merk" name="merk" required>
      </div>
      <!-- <div class="input-group mb-3">
        <span class="input-group-text width-input-group" id="gambar">Gambar</span>
        <input type="text" class="form-control" aria-label="Sizing example input" for="gambar" name="gambar" required>
      </div> -->
      <!-- <div class="input-group mb-3">
        <span class="input-group-text width-input-group" id="kategori">Kategori</span>
        <input type="text" class="form-control" aria-label="Sizing example input" for="kategori" name="kategori" required>
      </div> -->

      <div class="input-group mb-3">
        <label class="input-group-text width-input-group" for="inputGroupSelect01">Kategori</label>
        <select class="form-select" id="inputGroupSelect01" name="kategori" required>
          <option selected>Choose...</option>
          <option value="Router / AP">Router / AP</option>
          <option value="Switch / Hub">Switch / Hub</option>
          <option value="PC / Laptop">PC / Laptop</option>
          <option value="Tools">Tools</option>
        </select>
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text width-input-group" id="jumlah">Jumlah</span>
        <input type="number" class="form-control" aria-label="Sizing example input" for="jumlah" name="jumlah" required>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text width-input-group" id="kondisi">Kondisi</span>
        <input type="text" class="form-control" aria-label="Sizing example input" for="kondisi" name="kondisi" required>
      </div>
      
      <div class="input-group mb-3">
        <input type="file" name="gambar" id="" placeholder="Pilih file" class="form-control">
      </div>

      <button class="btn btn-primary w-100" type="submit" name="submit">
        <i class="bi bi-plus-square"></i> Tambah aset
      </button>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>