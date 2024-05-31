<?php
require_once 'Model.php';
$model = new Model();
$id = isset($_GET['id']) ? $_GET['id'] : null;
$buku = $id ? $model->getData("buku", "id_buku = $id")[0] : null;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['judul_buku'])) {
        $errors[] = 'Judul Buku harus diisi!';
    }
    if (empty($_POST['penulis'])) {
        $errors[] = 'Penulis harus diisi!';
    }
    if (empty($_POST['penerbit'])) {
        $errors[] = 'Penerbit harus diisi!';
    }
    if (empty($_POST['tahun_terbit'])) {
        $errors[] = 'Tahun Terbit harus diisi!';
    }

    if (empty($errors)) {
        $data = [
            'judul_buku' => $_POST['judul_buku'],
            'penulis' => $_POST['penulis'],
            'penerbit' => $_POST['penerbit'],
            'tahun_terbit' => $_POST['tahun_terbit']
        ];
        if ($id) {
            $model->update('buku', $data, "id_buku = $id");
        } else {
            $model->insert('buku', $data);
        }
        header('Location: Buku.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="Member.php">Member</a>
        <a href="Buku.php">Buku</a>
        <a href="Peminjaman.php">Peminjaman</a>
    </div>
    <div class="container">
        <h1><?php echo $id ? 'Edit' : 'Tambah'; ?> Buku</h1>
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
            <label>Judul Buku:</label>
            <input type="text" name="judul_buku" value="<?php echo htmlspecialchars($buku['judul_buku'] ?? '', ENT_QUOTES); ?>"><br>
            <label>Penulis:</label>
            <input type="text" name="penulis" value="<?php echo htmlspecialchars($buku['penulis'] ?? '', ENT_QUOTES); ?>"><br>
            <label>Penerbit:</label>
            <input type="text" name="penerbit" value="<?php echo htmlspecialchars($buku['penerbit'] ?? '', ENT_QUOTES); ?>"><br>
            <label>Tahun Terbit:</label>
            <input type="text" name="tahun_terbit" value="<?php echo htmlspecialchars($buku['tahun_terbit'] ?? '', ENT_QUOTES); ?>"><br>
            <button type="submit"><?php echo $id ? 'Update' : 'Tambah'; ?></button>
        </form>
    </div>
</body>
</html>