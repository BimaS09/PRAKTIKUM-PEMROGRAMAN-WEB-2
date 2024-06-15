<?php
require_once 'Model.php';
$model = new Model();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $model->delete('member', "id_member = $id");
    header('Location: Member.php');
    exit();
}

$members = $model->getData("member");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Member</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="Member.php">Member</a>
        <a href="Buku.php">Buku</a>
        <a href="Peminjaman.php">Peminjaman</a>
    </div>
    <div class="container">
        <h1>Data Member</h1>
        <a class="btn" href="FormMember.php">Tambah Member</a>
        <table>
            <tr>
                <th>ID Member</th>
                <th>Nama Member</th>
                <th>Nomor Member</th>
                <th>Alamat</th>
                <th>Tanggal Mendaftar</th>
                <th>Tanggal Terakhir Bayar</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?php echo $member['id_member']; ?></td>
                <td><?php echo $member['nama_member']; ?></td>
                <td><?php echo $member['nomor_member']; ?></td>
                <td><?php echo $member['alamat']; ?></td>
                <td><?php echo $member['tgl_mendaftar']; ?></td>
                <td><?php echo $member['tgl_terakhir_bayar']; ?></td>
                <td>
                    <a href="FormMember.php?id=<?php echo $member['id_member']; ?>"><button>Edit</button></a>
                    <a href="Member.php?hapus=<?php echo $member['id_member']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><button>Hapus</button></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>