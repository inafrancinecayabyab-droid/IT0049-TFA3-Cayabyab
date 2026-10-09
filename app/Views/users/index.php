<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<p class="eyebrow">Administration</p><h1>User Accounts</h1><p class="lead">Manage staff records and display-ready profile avatars.</p>
<div class="actions"><a class="button" href="<?= site_url('users/new') ?>">Add user</a></div>
<?php if (session()->getFlashdata('message')): ?><p class="notice"><?= esc(session()->getFlashdata('message')) ?></p><?php endif; ?>
<div class="table-card"><table><thead><tr><th>Avatar</th><th>Username</th><th>Full name</th><th>Email</th><th>Action</th></tr></thead><tbody><?php foreach ($users as $user): ?><tr><td><img class="avatar" src="<?= $user['avatar'] ? base_url('uploads/' . $user['avatar']) : base_url('uploads/placeholder.svg') ?>" alt="Avatar for <?= esc($user['full_name']) ?>"></td><td><?= esc($user['username']) ?></td><td><?= esc($user['full_name']) ?></td><td><?= esc($user['email']) ?></td><td><a href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a></td></tr><?php endforeach; ?></tbody></table></div>
<?= $this->endSection() ?>
