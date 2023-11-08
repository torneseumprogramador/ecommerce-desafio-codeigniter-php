<!-- app/Views/clientes/_form.php -->

<?php
// Defina $formAction e $cliente como vazios se não forem passados para a partial
if(isset($cliente)){
    $formAction =  '/clientes/' . $cliente['id'];
    $method = 'PUT';
}
else{
    $formAction = '/clientes';
    $cliente = ['id' => '', 'nome' => '', 'telefone' => '', 'email' => '', 'endereco' => ''];
    $method = 'POST';
}
?>

<form action="<?= $formAction ?>" method="post">
    <?= csrf_field() ?>
    <?php if ($method === 'PUT'): ?>
        <input type="hidden" name="_method" value="PUT" />
    <?php endif; ?>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= esc($cliente['nome']) ?>" required>
    </div>
    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone" value="<?= esc($cliente['telefone']) ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= esc($cliente['email']) ?>" required>
    </div>
    <div class="form-group">
        <label for="endereco">Endereço</label>
        <textarea class="form-control" id="endereco" name="endereco" rows="3" required><?= esc($cliente['endereco']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="/clientes" class="btn btn-secondary">Cancelar</a>
</form>
