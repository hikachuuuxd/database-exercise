<?php
include "koneksi.php";
if(isset($_POST['following'])){
    $following = $_POST['id_user_following'];
   mysqli_query($koneksi, "INSERT INTO  followers (id_user_following) VALUES($following)");
header("Location:index.php");
}
if(isset($_POST['followed'])){
    $followed= $_POST['id_user_followed'];
 mysqli_query($koneksi, "INSERT INTO  followers (id_user_followed) VALUES($followed)");
    header("Location:index.php");
}
    