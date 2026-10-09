<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<p class="eyebrow">User form</p><h1><?= esc($title) ?></h1><p class="lead">Username must be unique. Edit mode accepts a JPG or PNG avatar up to 2MB.</p>
<?php if ($errors): ?><div class="error-list"><strong>Please correct the following:</strong><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form class="form-card" method="post" enctype="multipart/form-data"><label>Username<input type="text" name="username" value="<?= esc(old('username', $user['username'] ?? '')) ?>"></label><label>Full name<input type="text" name="full_name" value="<?= esc(old('full_name', $user['full_name'] ?? '')) ?>"></label><label>Email<input type="email" name="email" value="<?= esc(old('email', $user['email'] ?? '')) ?>"></label><?php if ($user): ?><label>Profile picture<input type="file" name="avatar" accept=".jpg,.jpeg,.png"><small>JPG or PNG, maximum 2MB.</small></label><?php endif; ?><button class="button" type="submit">Save user</button></form>
<?= $this->endSection() ?>
