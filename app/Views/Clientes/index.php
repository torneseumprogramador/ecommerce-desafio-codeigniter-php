<?= $this->extend('Layouts/application') ?>

<?= $this->section('title') ?>
    Lista de Clientes
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section>
        <div class="container mt-4">
            <h1 class="mb-4">Lista de clientes</h1>
            <a href="/clientes/new" class="btn btn-primary">Novo</a>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= esc($cliente['id']) ?></td>
                            <td><?= esc($cliente['nome']) ?></td>
                            <td><?= esc($cliente['telefone']) ?></td>
                            <td><?= esc($cliente['email']) ?></td>
                            <td><?= esc($cliente['endereco']) ?></td>
                            <td style="width:230px">
                                <a href="/clientes/<?= $cliente['id'] ?>" class="btn btn-primary btn-sm">Mostrar</a>
                                <a href="/clientes/<?= $cliente['id'] ?>/edit" class="btn btn-warning btn-sm">Editar</a>
                                <form action="/clientes/<?= $cliente['id'] ?>" method="POST" style="display:inline-block;">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar este cliente?');">Apagar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?= $pager->links('clientes', 'bootstrap_pagination') ?>
        </div>
    </section>
<?= $this->endSection() ?>
