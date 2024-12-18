<?php
include "db_conn.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $delete = mysqli_query($conn, "DELETE FROM tb_rpl WHERE id_rpl = '$id'");
    if($delete){
        header("location:data.php");
    }else{
        echo "ada yang salah jir";
    }
}
?>