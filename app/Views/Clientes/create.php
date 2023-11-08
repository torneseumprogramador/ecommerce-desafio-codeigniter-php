<?= $this->extend('Layouts/application') ?>

<?= $this->section('title') ?>
    Novo cliente
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section>
    <div class="container mt-4">
        <h1 class="mb-4">Novo cliente</h1>
        <hr>
        <?= $this->include('clientes/_form') ?>
    </div>
</section>
<?= $this->endSection() ?>
