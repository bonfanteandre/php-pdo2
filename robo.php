<?php

require_once 'global.php';

$tipos = ["Camiseta", "Bermuda", "Calça", "Meia", "Jaqueta", "Moletom"];
$sexo = ["Masculina", "Feminina"];
$cores = ["Vermelha", "Amarela", "Verde", "Azul", "Branca", "Preta"];
$quantidade_registros = 10;


for($i = 0; $i < $quantidade_registros; $i++)
{
    $tipo_index = rand(0, 5);
    $sexo_index = rand(0, 1);
    $cor_index = rand(0, 5);

    $nome_roupa = $tipos[$tipo_index] . " " . $sexo[$sexo_index] . " " . $cores[$cor_index];
    $quantidade = rand(0, 1000);
    $preco = rand(1, 300);
    $categoria_id = 7;


    $query = "INSERT INTO produtos (nome, quantidade, preco, categoria_id) VALUES (:nome, :quantidade, :preco, :categoria_id)";

    $conexao = Conexao::obterConexao();

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $nome_roupa);
    $stmt->bindValue(':quantidade', $quantidade);
    $stmt->bindValue(':preco', $preco);
    $stmt->bindValue(':categoria_id', $categoria_id);
    $stmt->execute();

    echo "Produto inserido com sucess: " . $nome_roupa . "<br />";
}