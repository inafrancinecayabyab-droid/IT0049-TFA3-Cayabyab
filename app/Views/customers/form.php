<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<p class="eyebrow">Customer form</p><h1><?= esc($title) ?></h1><p class="lead">Required fields are checked before the record is saved.</p>
<?php if ($errors): ?><div class="error-list"><strong>Please correct the following:</strong><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form class="form-card" method="post"><label>Full name<input type="text" name="full_name" value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>"></label><label>Email<input type="email" name="email" value="<?= esc(old('email', $customer['email'] ?? '')) ?>"></label><label>Phone<input type="text" name="phone" value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>"></label><button class="button" type="submit">Save customer</button></form>
<?= $this->endSection() ?>
