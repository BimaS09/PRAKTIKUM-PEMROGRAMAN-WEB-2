<?php
require_once 'Model.php';
$model = new Model();
$id = isset($_GET['id']) ? $_GET['id'] : null;
$member = $id ? $model->getData("member", "id_member = $id")[0] : null;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nama_member'])) {
        $errors[] = 'Nama Member harus diisi!';
    }
    if (empty($_POST['nomor_member'])) {
        $errors[] = 'Nomor Member harus diisi!';
    }
    if (empty($_POST['alamat'])) {
        $errors[] = 'Alamat harus diisi!';
    }
    if (empty($_POST['tgl_mendaftar'])) {
        $errors[] = 'Tanggal Mendaftar harus diisi!';
    }
    if (empty($_POST['tgl_terakhir_bayar'])) {
        $errors[] = 'Tanggal Terakhir Bayar harus diisi!';
    }

    if (empty($errors)) {
        $data = [
            'nama_member' => $_POST['nama_member'],
            'nomor_member' => $_POST['nomor_member'],
            'alamat' => $_POST['alamat'],
            'tgl_mendaftar' => $_POST['tgl_mendaftar'],
            'tgl_terakhir_bayar' => $_POST['tgl_terakhir_bayar']
        ];
        if ($id) {
            $model->update('member', $data, "id_member = $id");
        } else {
            $model->insert('member', $data);
        }
        header('Location: Member.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Member</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="Member.php">Member</a>
        <a href="Buku.php">Buku</a>
        <a href="Peminjaman.php">Peminjaman</a>
    </div>
    <div class="container">
        <h1><?php echo $id ? 'Edit' : 'Tambah'; ?> Member</h1>
        <?php if (!empty($errors)): ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="post">
            <label>Nama Member:</label>
            <input type="text" name="nama_member" value="<?php echo htmlspecialchars($member['nama_member'] ?? '', ENT_QUOTES); ?>"><br>
            <label>Nomor Member:</label>
            <input type="text" name="nomor_member" value="<?php echo htmlspecialchars($member['nomor_member'] ?? '', ENT_QUOTES); ?>"><br>
            <label>Alamat:</label>
            <input type="text" name="alamat" value="<?php echo htmlspecialchars($member['alamat'] ?? '', ENT_QUOTES); ?>"><br>
            <label>Tanggal Mendaftar:</label>
            <input type="datetime-local" name="tgl_mendaftar" value="<?php echo htmlspecialchars($member['tgl_mendaftar'] ?? '', ENT_QUOTES); ?>"><br>
            <label>Tanggal Terakhir Bayar:</label>
            <input type="date" name="tgl_terakhir_bayar" value="<?php echo htmlspecialchars($member['tgl_terakhir_bayar'] ?? '', ENT_QUOTES); ?>"><br>
            <button type="submit"><?php echo $id ? 'Update' : 'Tambah'; ?></button>
        </form>
    </div>
</body>
</html>