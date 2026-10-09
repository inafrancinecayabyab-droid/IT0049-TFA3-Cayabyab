<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<p class="eyebrow">About this activity</p><h1>Learning the MVC flow</h1>
<p class="lead">This project is the first version of a basic Point-of-Sale system for IT0049. It focuses on the routing, controller, and view layers of CodeIgniter 4.</p>
<div class="card prose"><h2>What is demonstrated?</h2><p>The routes map URLs to controller methods. Controllers prepare page data, and views render the HTML shown in the browser. Customer and user listings use static PHP arrays as a temporary data source.</p><h2>Next step</h2><p>The next module can replace the arrays with models and a database without changing the overall page structure.</p></div>
<?= $this->endSection() ?>
