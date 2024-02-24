<?php
include "koneksi.php";
session_start();

if (isset($_POST['tambah'])) {
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggaldibuat = date("Y-m-d");
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "INSERT INTO album VALUES('','$namaalbum','$deskripsi','$tanggaldibuat','$userid')");

    if ($sql) {
        echo "<script>alert('Tambah album berhasil');location.href='../admin/album.php';</script>";
    } else {
        echo "<script>alert('tambah album tidak berhasil');location.href='album.php';</script>";
    }
}


if (isset($_POST['edit'])) {
    $albumid = $_POST['albumid'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggaldibuat = date("Y-m-d");
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "UPDATE album SET namaalbum='$namaalbum', deskripsi='$deskripsi' WHERE albumid='$albumid'");

    if ($sql) {
        echo "<script>alert('Edit album berhasil diperbarui!');location.href='../admin/album.php';</script>";
    } else {
        echo "<script>alert('Edit album tidak berhasil');location.href='album.php';</script>";
    }
}

if (isset($_POST['hapus'])) {
    $albumid = $_POST['albumid'];

    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE albumid='$albumid'");

    if ($sql) {
        echo "<script> alert('Hapus data berhasil');location.href='../admin/album.php';</script>";
    } else {
        echo "<script> alert('Hapus data tidak berhasil');location.href='album.php';</script>";
    }
}
