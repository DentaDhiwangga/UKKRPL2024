<?php
session_start();
$userid = $_SESSION['userid'];
include "../config/koneksi.php";
if ($_SESSION['status'] != 'login') {
    echo "<script>alert('Anda Belum Login');location.href='../index.php'</script>";
}

//  echo $_SESSION['username'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Galery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">WEB Galery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto"></ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="album.php">Album</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="foto.php">Foto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../config/aksilogout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                    <div class="card-header">Tambah Album</div>
                    <div class="card-body">
                        <form action="../config/aksialbum.php" method="POST">
                            <div class="form-group">
                                <label class="form-label">Nama Album</label>
                                <input type="text" name="namaalbum" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Deskripsi</label>
                                <textarea type="text" name="deskripsi" class="form-control" required cols="30" rows="0"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Data Album</div>
                    <div class="card-body">

                        <?php
                        $rows_per_page = 5;
                        $sql_count = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM album WHERE userid='$userid'");
                        $count_row = mysqli_fetch_assoc($sql_count)['total'];
                        $total_pages = ceil($count_row / $rows_per_page);
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $offset = ($current_page - 1) * $rows_per_page;
                        $sqlpg = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid' LIMIT $offset, $rows_per_page");


                        if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
                            $keyword = $_GET['keyword'];
                            $sqlpg = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid' AND namaalbum LIKE '%$keyword%' LIMIT $offset, $rows_per_page");
                        } else {
                            $sqlpg = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid' LIMIT $offset, $rows_per_page");
                        }

                        ?>

                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <form action="" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari berdasarkan nama album" name="keyword">
                                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Album</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userid = $_SESSION['userid'];
                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                    <?php while ($datapg = mysqli_fetch_array($sqlpg)) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $datapg['namaalbum'] ?></td>
                                            <td><?= $datapg['deskripsi'] ?></td>
                                            <td><?= $datapg['tanggaldibuat'] ?></td>
                                            <td>
                                                <!-- <a href="../config/aksialbum.php?albumid=<?= $data['albumid'] ?>" class="btn btn-danger">Hapus</a> -->
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $no ?>">Hapus</a>
                                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $no ?>">Edit</a>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="edit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Album</h1>
                                                    </div>
                                                    <form action="../config/aksialbum.php" method="POST">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="hidden" name="albumid" value="<?= $data['albumid'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Nama Album</label>
                                                                <input type="text" name="namaalbum" class="form-control" value="<?= $data['namaalbum'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Deskripsi</label>
                                                                <input type="text" name="deskripsi" class="form-control" value="<?= $data['deskripsi'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="hapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Album</h1>
                                                    </div>
                                                    <form action="../config/aksialbum.php" method="POST">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="albumid" value="<?= $data['albumid'] ?>">
                                                            Apakah anda yakin akan menghapus data <strong><?= $data['namaalbum'] ?></strong> ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item <?php echo ($current_page == 1) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo ($current_page - 1); ?>">Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php } ?>
                                <li class="page-item <?php echo ($current_page == $total_pages) ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo ($current_page + 1); ?>">Next</a>
                                </li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>


        </div>
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
        <p>&copy; UKK RPL 2024 | Aldenta Dhiwangga Rizqilla Ilham</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>