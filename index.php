<?php 
  // ini_set('display_errors', true);
  // ini_set('display_startup_errors', true);
  // error_reporting(E_ALL);

  // echo phpinfo(); die;

  require "function.php";
  $assets = query("SELECT * FROM tbinvenit ORDER BY id DESC");

  // pagination
  $numberOfDataPerPage = 10;
  $result = mysqli_query($db, "SELECT * FROM tbinvenit");
  $numberOfData = mysqli_num_rows($result);
  $numberOfPages = ceil($numberOfData / $numberOfDataPerPage);
  if( isset($_GET["page"]) ) {
    $activePage = $_GET["page"];
  } else {
    $activePage = 1;
  }
  $beginningData = ( $numberOfDataPerPage * $activePage ) - $numberOfDataPerPage;

  $assets = query("SELECT * FROM tbinvenit ORDER BY id DESC LIMIT $beginningData, $numberOfDataPerPage");

  if( isset($_POST["cari"]) ) {
    $assets = search($_POST["keyword"]);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InvenIT</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">


  <script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js'></script>
  <script>
    function confirmation(ev, id) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
    console.log(urlToRedirect); // verify if this is the right URL
    swal({
      title: "Yakin hapus data aset?",
      text: "Data yang telah dihapus, tidak bisa lagi dipulihkan",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      // redirect with javascript here as per your logic after showing the alert using the urlToRedirect value
      if (willDelete) {
        window.location.href = 'delete.php?id='+id;
      } else {
        swal("Data tidak jadi dihapus!");
      }
    });
    }
  </script>
</head>
<body>

  <main class="p-2">
    <h1>Daftar semua aset IT</h1>
    <a href="add.php">
      <button type="button" class="mb-2 btn btn-primary">
          <i class="bi bi-plus-square"></i> Tambah aset
      </button>
    </a>

    <form action="" method="post">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Cari berdasarkan merk / kategori" aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
      <button class="btn btn-outline-primary" type="submit" id="button-addon2" name="cari">Search</button>
    </div>
    </form>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th class="" scope="col">No</th>
          <th class="text-center" scope="col">Merk / type</th>
          <th class="text-center" scope="col">Gambar</th>
          <th class="text-center" scope="col">Kategori</th>
          <th class="text-center" scope="col">Jumlah</th>
          <th class="text-center" scope="col">Kondisi</th>
          <th class="text-center" scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
          <?php foreach( $assets as $asset ) : ?>
          <tr>
            <th scope="row"><?php echo $i++ ?></th>
            <td>
              <a href="detail.php?id=<?php echo $asset["id"] ?>" style="text-decoration: none; color: black;">
                <?php echo $asset["merk"] ?>
              </a>
            </td>
            <td><img src="img/<?php echo $asset["gambar"] ?>" alt="" width="100"></td>
            <td><?php echo $asset["kategori"] ?></td>
            <td><?php echo $asset["jumlah"] ?></td>
            <td><?php echo $asset["kondisi"] ?></td>
            <td>
              <button class="btn btn-success">
                <a href="update.php?id=<?php echo $asset["id"] ?>" class="text"> 
                  <i class="bi bi-pencil-square"></i> Update
                </a>
              </button>
              <button class="btn btn-danger">
                <a onclick="confirmation(event, <?php echo $asset['id'] ?>)" class="text">
                  <i class="bi bi-trash3"></i> Delete
                </a>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div class="d-flex justify-content-center">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <?php if( $activePage > 1 ) : ?>
            <a class="page-link" href="?page=<?php echo $activePage - 1 ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
            <?php endif; ?>
          </li>

          <?php for($i = 1; $i <= $numberOfPages; $i++) : ?>
            <?php if( $i == $activePage ) : ?>
              <li class="page-item"><a class="page-link bg-body-secondary" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php else : ?>
              <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>

          <li class="page-item">
            <?php if( $activePage < $numberOfPages ) : ?>
            <a class="page-link" href="?page=<?php echo $activePage + 1 ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
            <?php endif; ?>
          </li>
        </ul>
      </nav>
    </div>
  </main>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</body>
</html>