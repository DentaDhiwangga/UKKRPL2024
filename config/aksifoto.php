<?php
include "koneksi.php";
session_start();

if (isset($_POST['tambah'])) {
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $albumid = $_POST['albumid'];
    $tanggalunggah = date("Y-m-d");
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand() . '-' . $foto;

    move_uploaded_file($tmp, $lokasi . $namafoto);

    $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('','$judulfoto','$deskripsifoto','$tanggalunggah','$namafoto','$albumid','$userid')");

    if ($sql) {
        echo "<script>alert('Tambah Foto berhasil');location.href='../admin/foto.php';</script>";
    } else {
        echo "<script>alert('tambah Foto tidak berhasil');location.href='foto.php';</script>";
    }
}


if (isset($_POST['edit'])) {
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $albumid = $_POST['albumid'];
    $tanggalunggah = date("Y-m-d");
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand() . '-' . $foto;

    if ($foto == null) {
        $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', albumid='$albumid' WHERE fotoid='$fotoid'");
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
        $data = mysqli_fetch_array($query);
        if (is_file('gambar/' . $data['lokasifile'])) {
            unlink('gambar/' . $data['lokasifile']);
        }
        move_uploaded_file($tmp, $lokasi . $namafoto);
        $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', lokasifile='$namafoto', albumid='$albumid' WHERE fotoid='$fotoid'");
    }
    echo "<script>alert('Ubah data berhasil');location.href='../admin/foto.php';</script>";
}

if (isset($_POST['hapus'])) {
    $fotoid=$_POST['fotoid'];
    $query = mysqli_query($koneksi, "SELECT * FROM  foto WHERE fotoid='$fotoid'");
    $data = mysqli_fetch_array($query);

    if (is_file('../assets/img/'.$data['lokasifile'])) {
        unlink('../assets/img/'.$data['lokasifile']);
    }
    $sql=mysqli_query($koneksi,"DELETE FROM foto WHERE fotoid='$fotoid'");

    echo "<script>alert('Hapus foto berhasil!');location.href='../admin/foto.php';</script>";
}
