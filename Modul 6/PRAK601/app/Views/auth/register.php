<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Register</h1>
<?php if (session()->getFlashdata('errors')): ?>
    <ul style="color:red;">
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </div>
    </ul>
<?php endif; ?>
<form action="/register" method="post" class="mt-4">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= old('username') ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password_confirm">Confirm Password:</label>
        <input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<p class="mt-3">Sudah punya akun? <a href="/login">Login di sini</a></p>
<?= $this->endSection() ?>