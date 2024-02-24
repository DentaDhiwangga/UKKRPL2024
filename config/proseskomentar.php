<?php
include "koneksi.php";
session_start();

$fotoid = $_POST['fotoid'];
$isikomentar = $_POST['isikomentar'];
$tanggalkomentar = date("Y-m-d");
$userid = $_SESSION['userid'];

$sql = mysqli_query($koneksi, "INSERT INTO komentarfoto VALUES('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");

echo "<script>location.href='../admin/index.php'</script>";
