<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Tambah Data Buku</h1>
<?php if (session()->getFlashdata('errors')): ?>
    <ul style="color:red;">
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </div>
    </ul>
<?php endif; ?>
<form action="/books/store" method="post" class="mt-4">
    <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" class="form-control" value="<?= old('judul') ?>" required>
    </div>
    <div class="form-group">
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" class="form-control" value="<?= old('penulis') ?>" required>
    </div>
    <div class="form-group">
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" id="penerbit" class="form-control" value="<?= old('penerbit') ?>" required>
    </div>
    <div class="form-group">
        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" value="<?= old('tahun_terbit') ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Buku</button>
</form>
<?= $this->endSection() ?>