<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Edit Book</h1>
<form action="/books/update/<?= $book['id'] ?>" method="post" class="mt-4">
    <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" class="form-control" value="<?= $book['judul'] ?>" required>
    </div>
    <div class="form-group">
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" class="form-control" value="<?= $book['penulis'] ?>" required>
    </div>
    <div class="form-group">
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" id="penerbit" class="form-control" value="<?= $book['penerbit'] ?>" required>
    </div>
    <div class="form-group">
        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="<?= $book['tahun_terbit'] ?>" min="1801" max="2023" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?= $this->endSection() ?>