<?php

require_once "classes/Categoria.php";

try {

    $id = $_POST["id"];
    $nome = $_POST["nome"];

    $categoria = new Categoria();
    $categoria->id = $id;
    $categoria->nome = $nome;
    $categoria->atualizar();

    header("Location: categorias.php");

} catch (Exception $e) {

    Erro::tratarErro($e);
}