<?= $this->extend('Layouts/application') ?>

<?= $this->section('title') ?>
    Mostrando cliente: <?= $cliente['nome'] ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section>
        <div class="container mt-4">
            <h1 class="mb-4">
                Mostrando cliente: <?= $cliente['nome'] ?>
            </h1>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($cliente['nome']) ?></h5>
                    <p class="card-text"><strong>ID:</strong> <?= esc($cliente['id']) ?></p>
                    <p class="card-text"><strong>Telefone:</strong> <?= esc($cliente['telefone']) ?></p>
                    <p class="card-text"><strong>Email:</strong> <?= esc($cliente['email']) ?></p>
                    <p class="card-text"><strong>Endereço:</strong> <?= esc($cliente['endereco']) ?></p>
                    <a href="/clientes" class="btn btn-secondary">Voltar</a>
                    <a href="/clientes/<?= $cliente['id'] ?>/edit" class="btn btn-warning">Editar</a>
                    <form action="/clientes/<?= $cliente['id'] ?>" method="POST" style="display:inline-block;">
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar este cliente?');">Apagar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>
