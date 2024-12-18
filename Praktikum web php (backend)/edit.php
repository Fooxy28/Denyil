<?php
include "db_conn.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tb_rpl WHERE id_rpl = '$id'");
    $row = mysqli_fetch_array($query);
}

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $gambar = $_FILES['gambar']['name'];
    $sumber = $_FILES['gambar']['tmp_name'];
    $folder = './img/';
    
    if ($gambar) {
        move_uploaded_file($sumber, $folder . $gambar);
        $update = mysqli_query($conn, "UPDATE tb_rpl SET nama_mhs = '$nama', img = '$gambar' WHERE id_rpl = '$id'");
    } else {
        $update = mysqli_query($conn, "UPDATE tb_rpl SET nama_mhs = '$nama' WHERE id_rpl = '$id'");
    }

    if ($update) {
        header("Location: data.php");
    } else {
        echo "Data gagal diupdate";
    }
}
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
    <div class="form-create d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form action="" class="p-5" style="background-color: white; border-radius: 10px; width: 30rem;" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" id="" placeholder="Masukan Nama" name="nama" value="<?php echo $row['nama_mhs']; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="" name="gambar">
            </div>
            <button type="submit" class="btn btn-primary" name="update" id="" value="update">Update</button>
        </form>
    </div>
</body>
</html>