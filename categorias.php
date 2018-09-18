<?php
    require_once 'global.php';

    try {

        $lista = Categoria::listar();

    } catch (Exception $ex) {

        Erro::tratarErro($ex);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Categorias</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="categorias-criar.php" class="btn btn-info btn-block">Criar Nova Categoria</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                    <tr>
                        <td><a href="categorias-detalhe.php?id=<?=$linha['id']?>" class="btn btn-link"><?= $linha['id'] ?></a></td>
                        <td><a href="categorias-detalhe.php?id=<?=$linha['id']?>" class="btn btn-link"><?= $linha['nome'] ?></a></td>
                        <td><a href="categorias-editar.php?id=<?= $linha['id'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="categorias-excluir-post.php?id=<?= $linha['id'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
