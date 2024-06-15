<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
<h1 class="mt-4">Login</h1>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <p style="color:green;">
            <?= session()->getFlashdata('success') ?>
        </p>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <p style="color:red;">
            <?= session()->getFlashdata('error') ?>
        </p>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('warning')): ?>
    <div class="alert alert-warning">
        <p style="color:red;">
            <?= session()->getFlashdata('warning') ?>
        </p>
    </div>
<?php endif; ?>
<form action="/auth/doLogin" method="post" class="mt-4">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<p class="mt-3">Belum punya akun? <a href="/register">Daftar di sini</a></p>
<?= $this->endSection() ?>