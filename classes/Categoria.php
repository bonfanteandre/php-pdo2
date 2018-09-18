<?php

require_once "global.php";

class Categoria
{

    public $id;
    public $nome;
    public $produtos;

    function __construct($id = 0)
    {
        if ($id > 0)
        {
            $this->id = $id;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query = "SELECT id, nome FROM categorias";
        $resultado = Conexao::obterConexao()->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir()
    {
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $conexao = Conexao::obterConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE categorias SET nome = :nome WHERE id = :id";
        $conexao = Conexao::obterConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function carregar()
    {
        $query = "SELECT id, nome FROM categorias WHERE id = :id";
        $conexao = Conexao::obterConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $c = $stmt->fetch();
        $this->nome = $c['nome'];
    }

    public function excluir()
    {
        $query = "DELETE FROM categorias WHERE id = :id";
        $conexao = Conexao::obterConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function carregarProdutos()
    {
        $this->produtos = Produto::carregarPorCategoria($this->id);
    }
}