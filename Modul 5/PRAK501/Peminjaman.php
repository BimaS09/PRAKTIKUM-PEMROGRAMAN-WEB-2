<?php
require_once 'Model.php';
$model = new Model();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $model->delete('peminjaman', "id_peminjaman = $id");
    header('Location: Peminjaman.php');
    exit();
}

$peminjaman = $model->getData("peminjaman");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="Member.php">Member</a>
        <a href="Buku.php">Buku</a>
        <a href="Peminjaman.php">Peminjaman</a>
    </div>
    <div class="container">
        <h1>Data Peminjaman</h1>
        <a class="btn" href="FormPeminjaman.php">Tambah Peminjaman</a>
        <table>
            <tr>
                <th>ID Peminjaman</th>
                <th>ID Member</th>
                <th>ID Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($peminjaman as $p): ?>
            <tr>
                <td><?php echo $p['id_peminjaman']; ?></td>
                <td><?php echo $p['id_member']; ?></td>
                <td><?php echo $p['id_buku']; ?></td>
                <td><?php echo $p['tgl_pinjam']; ?></td>
                <td><?php echo $p['tgl_kembali']; ?></td>
                <td>
                    <a href="FormPeminjaman.php?id=<?php echo $p['id_peminjaman']; ?>"><button>Edit</button></a>
                    <a href="Peminjaman.php?hapus=<?php echo $p['id_peminjaman']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><button>Hapus</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>