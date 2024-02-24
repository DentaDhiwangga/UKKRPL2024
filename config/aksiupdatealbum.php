<?php
include "koneksi.php";
session_start();

    $albumid = $_POST['albumid'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggaldibuat = date("Y-m-d");
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "UPDATE album SET('','$namaalbum','$albumid','$deskripsi','$tanggaldibuat','$userid' WHERE '$albumid')");

    if ($sql) {
        echo "<script>alert('Tambah album berhasil diperbarui!');location.href='../admin/album.php';</script>";
    } else {
        echo "<script>alert('Edit album tidak berhasil');location.href='album.php';</script>";
    }
?>
