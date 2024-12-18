<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tampilkan Data</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body style="background-color: rgb(133, 190, 255)">
  <div class="container text-center mt-5">
    <div class="row row-cols-3 d-flex justify-content-center align-items-center" style="height: 100hv;">
      <?php
      $query = mysqli_query($conn, "SELECT * FROM tb_rpl");
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <div class="col d-flex justify-content-center">
          <div class="card mb-5" style="width: 18rem">
            <img src="img/<?php echo $row['img']; ?>" class="card-img-top" />
            <div class="card-body">
              <p class="card-text mb-0 fw-bold">
                <?php echo $row['id_rpl']; ?>
              </p>
              <p class="card-text fw-semibold">
                <?php echo $row['nama_mhs']; ?>
              </p>
              <div class="button-card">
                <a href="edit.php?id=<?php echo $row['id_rpl']; ?>" class="btn btn-primary" style="width: 5rem;">Edit</a>
                <a href="delete.php?id=<?php echo $row['id_rpl']; ?>" onclick="return confirm('Hapus Data?');" class="btn btn-primary" style="width: 5rem;">Delete</a>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</body>
</html>