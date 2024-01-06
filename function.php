<?php 
  require 'database.php';
  
  function query($query) {
    global $db;
    $result = mysqli_query($db, $query);

    // mengecek apakah koneksi ke database dan tabel berhasil atau tidak
    if( !$result ) {
      echo mysqli_error($db);
    }

    // fetching data 
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
      $rows[] = $row;
    }

    return $rows;
  }

  function add($data) {
    global $db;

    if( isset($data["submit"]) ) {
      $merk = htmlspecialchars($data["merk"]);
      // $gambar = htmlspecialchars($data["gambar"]);
      $gambar = upload();
      if( !$gambar ) {
        return false;
      }
      $kategori = htmlspecialchars($data["kategori"]);
      $jumlah = htmlspecialchars($data["jumlah"]);
      $kondisi = htmlspecialchars($data["kondisi"]);

      $query = "INSERT INTO tbinvenit VALUES(null, '$merk', '$gambar', '$kategori', '$jumlah', '$kondisi')";

      // echo '<pre>'; var_dump( $query ); die;

      mysqli_query($db, $query);

      return mysqli_affected_rows($db);
    }
  }

  function upload() {
    // echo '<pre>'; var_dump( $_FILES ); die;
    $fileName = $_FILES["gambar"]["name"];
    $fileSize = $_FILES["gambar"]["size"];
    $fileError = $_FILES["gambar"]["error"];
    $fileTmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang diupload
    if( $fileError === 4 ) {
      echo "<script>
              alert('Pilih file gambar terlebih dahulu');
            </script>";
      return false;
    }

    // cek apakah yang diupload adalah gambar
    $extentionImageValid = ['jpg', 'jpeg', 'png'];
    $extentionImage = explode('.', $fileName);
    $extentionImage = strtolower(end($extentionImage));
    if( !in_array($extentionImage, $extentionImageValid) ) {
      echo "<script>
              alert('Yang kamu upload bukan gambar')
            </script>";
      return false;
    }

    // cek jika ukuranya terlalu besar
    if( $fileSize > 1000000 ) {
      echo "<script>
              alert('Ukuran gambar terlalu besar');
            </script>";
      return false;
    }

    // jika semua lolos pengecekan, generate nama gambar baru dan lakukan proses upload
    $fileNameNew = uniqid();
    $fileNameNew .= '.';
    $fileNameNew .= $extentionImage;
    move_uploaded_file($fileTmpName, 'img/' . $fileNameNew);

    return $fileNameNew;
  }

  function delete($id) {
    global $db;

    mysqli_query($db, "DELETE FROM tbinvenit WHERE id = $id");
    
    return mysqli_affected_rows($db);
  }

  function detail() {
    global $db;

    $id = $_GET["id"];
    $result = mysqli_query($db, "SELECT * FROM tbinvenit WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    
    return $row;
  }

  function update($data) {
    global $db;

    $id = $data["id"];
    $merk = htmlspecialchars($data["merk"]);
    // $gambar = htmlspecialchars($data["gambar"]);
    $oldGambar = htmlspecialchars($data["oldGambar"]);
    if( $_FILES["gambar"]["error"] === 4 ) {
      $gambar = $oldGambar;
    } else {
      $gambar = upload();
    }
    $kategori = htmlspecialchars($data["kategori"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $kondisi = htmlspecialchars($data["kondisi"]);

    $query = "UPDATE tbinvenit SET merk = '$merk', gambar = '$gambar', kategori = '$kategori', jumlah = '$jumlah', kondisi = '$kondisi' WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);  
  }

  function search($keyword) {
    $query = "SELECT * FROM tbinvenit WHERE merk LIKE '%$keyword%' OR kategori LIKE '%$keyword%'";

    return query($query);
  }

?>