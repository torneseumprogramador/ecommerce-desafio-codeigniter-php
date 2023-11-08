<?= $this->extend('Layouts/application') ?>

<?= $this->section('title') ?>
    Editanto Cliente: <?= $cliente['nome'] ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section>
    <div class="container mt-4">
        <h1 class="mb-4">Editanto Cliente: <?= $cliente['nome'] ?></h1>
        <hr>
        <?= $this->include('clientes/_form') ?>
    </div>
</section>
<?= $this->endSection() ?>
