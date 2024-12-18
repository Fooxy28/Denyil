<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>pehape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: rgb(133, 190, 255);">
    <div class="form-create  d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="" class="p-5 " style="background-color: white;border-radius: 10px;width: 30rem;" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" id="" placeholder="Masukan Nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary" name="kirim" id="" value="kirim">Submit</button><br>
            <?php
            if (isset($_POST['kirim'])) {
                $nama = $_POST['nama'];
                $gambar = $_FILES['gambar']['name'];
                $sumber = $_FILES['gambar']['tmp_name'];
                $folder = './img/';
                move_uploaded_file($sumber, $folder . $gambar);
                $insert = mysqli_query($conn, "INSERT INTO tb_rpl VALUES (NULL ,'$nama','$gambar')");
                if ($insert) {
                    echo "data berhasil diupload";
                } else {
                    echo "data gagal diupload";
                }
            }
            ?>
        </form>
    </div>
</body>

</html>