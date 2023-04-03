<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_relationship');
if(mysqli_error($koneksi)){
    die("koneksi gagal");
}
