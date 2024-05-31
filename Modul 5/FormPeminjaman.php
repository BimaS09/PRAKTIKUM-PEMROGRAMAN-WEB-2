<?php
require_once 'Model.php';
$model = new Model();
$id = isset($_GET['id']) ? $_GET['id'] : null;
$peminjaman = $id ? $model->getData("peminjaman", "id_peminjaman = $id")[0] : null;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['id_member'])) {
        $errors[] = 'ID Member harus diisi!';
    }
    if (empty($_POST['id_buku'])) {
        $errors[] = 'ID Buku harus diisi!';
    }
    if (empty($_POST['tgl_pinjam'])) {
        $errors[] = 'Tanggal Pinjam harus diisi!';
    }
    if (empty($_POST['tgl_kembali'])) {
        $errors[] = 'Tanggal Kembali harus diisi!';
    }

    if (empty($errors)) {
        $data = [
            'id_member' => $_POST['id_member'],
            'id_buku' => $_POST['id_buku'],
            'tgl_pinjam' => $_POST['tgl_pinjam'],
            'tgl_kembali' => $_POST['tgl_kembali']
        ];
        if ($id) {
            $model->update('peminjaman', $data, "id_peminjaman = $id");
        } else {
            $model->insert('peminjaman', $data);
        }
        header('Location: Peminjaman.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Peminjaman</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="Member.php">Member</a>
        <a href="Buku.php">Buku</a>
        <a href="Peminjaman.php">Peminjaman</a>
    </div>
    <div class="container">
        <h1><?php echo $id ? 'Edit' : 'Tambah'; ?> Peminjaman</h1>
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
            <label>ID Member:</label>
            <input type="text" name="id_member" value="<?php echo htmlspecialchars($peminjaman['id_member'] ?? '', ENT_QUOTES); ?>"><br>
            <label>ID Buku:</label>
            <input type="text" name="id_buku" value="<?php echo htmlspecialchars($peminjaman['id_buku'] ?? '', ENT_QUOTES); ?>"><br>
            <label>Tanggal Pinjam:</label>
            <input type="date" name="tgl_pinjam" value="<?php echo htmlspecialchars($peminjaman['tgl_pinjam'] ?? '', ENT_QUOTES); ?>"><br>
            <label>Tanggal Kembali:</label>
            <input type="date" name="tgl_kembali" value="<?php echo htmlspecialchars($peminjaman['tgl_kembali'] ?? '', ENT_QUOTES); ?>"><br>
            <button type="submit"><?php echo $id ? 'Update' : 'Tambah'; ?></button>
        </form>
    </div>
</body>
</html>