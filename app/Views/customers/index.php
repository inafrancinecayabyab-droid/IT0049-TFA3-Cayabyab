<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<p class="eyebrow">Accounts</p><h1>Customer Accounts</h1><p class="lead">Create and update customer records with validated forms.</p>
<div class="actions"><a class="button" href="<?= site_url('customers/new') ?>">Add customer</a></div>
<?php if (session()->getFlashdata('message')): ?><p class="notice"><?= esc(session()->getFlashdata('message')) ?></p><?php endif; ?>
<div class="table-card"><table><thead><tr><th>Full name</th><th>Email</th><th>Phone</th><th>Action</th></tr></thead><tbody><?php foreach ($customers as $customer): ?><tr><td><?= esc($customer['full_name']) ?></td><td><?= esc($customer['email']) ?></td><td><?= esc($customer['phone']) ?></td><td><a href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td></tr><?php endforeach; ?></tbody></table></div>
<?= $this->endSection() ?>
