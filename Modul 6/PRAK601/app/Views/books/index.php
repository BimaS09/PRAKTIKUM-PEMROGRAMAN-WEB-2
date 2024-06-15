<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Books List</h1>
<a href="/books/create" class="btn btn-primary mb-3">Add New Book</a>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Penulis</th>
            <th class="text-center">Penerbit</th>
            <th class="text-center">Tahun Terbit</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
        <tr>
            <td class="text-center"><?= $book['id'] ?></td>
            <td class="text-center"><?= $book['judul'] ?></td>
            <td class="text-center"><?= $book['penulis'] ?></td>
            <td class="text-center"><?= $book['penerbit'] ?></td>
            <td class="text-center"><?= $book['tahun_terbit'] ?></td>
            <td class="text-center">
                <a href="/books/edit/<?= $book['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <button onclick="confirmDelete(<?= $book['id'] ?>)" class="btn btn-danger btn-sm">Delete</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<form id="deleteForm" action="" method="post" style="display:none;">
    <input type="hidden" name="_method" value="DELETE" />
    <?= csrf_field() ?>
</form>
<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus buku ini?')) {
        document.getElementById('deleteForm').action = '/books/delete/' + id;
        document.getElementById('deleteForm').submit();
    }
}
</script>
<?= $this->endSection() ?>