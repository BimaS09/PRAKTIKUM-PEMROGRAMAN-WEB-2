<?php
require_once 'Model.php';
$model = new Model();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $model->delete('buku', "id_buku = $id");
    header('Location: Buku.php');
    exit();
}

$buku = $model->getData("buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="Member.php">Member</a>
        <a href="Buku.php">Buku</a>
        <a href="Peminjaman.php">Peminjaman</a>
    </div>
    <div class="container">
        <h1>Data Buku</h1>
        <a class="btn" href="FormBuku.php">Tambah Buku</a>
        <table>
            <tr>
                <th>ID Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($buku as $b): ?>
            <tr>
                <td><?php echo $b['id_buku']; ?></td>
                <td><?php echo $b['judul_buku']; ?></td>
                <td><?php echo $b['penulis']; ?></td>
                <td><?php echo $b['penerbit']; ?></td>
                <td><?php echo $b['tahun_terbit']; ?></td>
                <td>
                    <a href="FormBuku.php?id=<?php echo $b['id_buku']; ?>"><button>Edit</button></a>
                    <a href="Buku.php?hapus=<?php echo $b['id_buku']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><button>Hapus</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>