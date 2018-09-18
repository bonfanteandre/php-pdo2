<?php require_once 'cabecalho.php' ?>
<?php

require_once 'global.php';

$id = $_GET['id'];
$categoria = new Categoria($id);
$categoria->carregarProdutos();
?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?=$categoria->id?></dd>
    <dt>Nome</dt>
    <dd><?=$categoria->nome?></dd>
    <dt>Produtos</dt>
    <?php if(count($categoria->produtos) > 0) : ?>
        <dd>
            <ul>
                <?php foreach ($categoria->produtos as $produto) : ?>
                    <li><a href="/produtos-editar.php?id=<?=$produto['id']?>"><?=$produto['nome']?></a></li>
                <?php endforeach ?>
            </ul>
        </dd>
    <?php else: ?>
        <dd>Nenhum produto encontrado para esta categoria</dd>
    <?php endif ?>
</dl>
<?php require_once 'rodape.php' ?>
