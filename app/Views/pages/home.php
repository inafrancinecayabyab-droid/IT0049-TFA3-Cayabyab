<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section class="hero">
    <p class="eyebrow">Point of Sale Foundations</p>
    <h1>From zero to four pages.</h1>
    <p class="lead">A simple CodeIgniter application that demonstrates routing, controllers, views, and temporary in-memory data.</p>
    <div class="actions"><a class="button" href="<?= site_url('customers') ?>">View customer accounts</a><a class="button secondary" href="<?= site_url('users') ?>">View user accounts</a></div>
</section>
<section class="grid two-col">
    <article class="card"><span class="number">01</span><h2>Clear routes</h2><p>Each page has a dedicated URL and controller method.</p></article>
    <article class="card"><span class="number">02</span><h2>Static data</h2><p>Sample records are stored in PHP arrays until a database is introduced.</p></article>
</section>
<?= $this->endSection() ?>
