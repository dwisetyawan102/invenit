<?php 
  require 'function.php';

  $id = $_GET["id"];

  if( delete($id) > 0 ) {
    echo "

      <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
      <script type='text/javascript'>

      $(document).ready(function(){

        swal({
          position: 'top-end',
          type: 'success',
          title: 'Berhasil hapus data',
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
          title: 'Gagal hapus data',
          icon: 'error'
        })
        .then(() => {
          swal(document.location.href = 'index.php');
        })

      });

      </script>
    ";
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
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>