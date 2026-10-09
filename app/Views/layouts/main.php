<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'POS Foundations') ?> | Cayabyab POS</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="<?= site_url('/') ?>">CAYABYAB POS</a>
            <nav aria-label="Main navigation">
                <a href="<?= site_url('/') ?>">Home</a>
                <a href="<?= site_url('about') ?>">About</a>
                <a href="<?= site_url('customers') ?>">Customers</a>
                <a href="<?= site_url('users') ?>">Users</a>
            </nav>
        </div>
    </header>
    <main class="container page-content">
        <?= $this->renderSection('content') ?>
    </main>
    <footer class="site-footer"><div class="container">IT0049 Technical Formative Assessment 1 · CodeIgniter 4</div></footer>
</body>
</html>
