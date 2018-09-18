<?php require_once 'cabecalho.php' ?>
<?php require_once 'global.php' ?>
<?php

try
{
    $produto = new Produto();
    $lista = $produto->listar();
} catch (Exception $e)
{
    Erro::tratarErro($e);
}

?>
<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Crair Novo Produto</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if(count($lista) > 0): ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $p): ?>
                        <?php $categoria = new Categoria($p['categoria_id']); ?>
                        <tr>
                            <td><?=$p['id']?></td>
                            <td><?=$p['nome']?></td>
                            <td>R$ <?=$p['preco']?></td>
                            <td><?=$p['quantidade']?></td>
                            <td><?=$categoria->nome?></td>
                            <td><a href="produtos-editar.php?id=<?=$p['id']?>" class="btn btn-info">Editar</a></td>
                            <td><a href="produtos-excluir-post.php?id=<?=$p['id']?>" class="btn btn-danger">Excluir</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
