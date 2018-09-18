<?php

class Produto
{
    public $id;
    public $nome;
    public $preco;
    public $quantidade;
    public $categoria_id;

    function __construct($id = 0)
    {
        if ($id > 0)
        {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome, preco, quantidade, categoria_id FROM produtos WHERE id = :id";

        $conexao = Conexao::obterConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();

        $resultado = $stmt->fetch();

        $this->nome = $resultado['nome'];
        $this->preco = $resultado['preco'];
        $this->quantidade = $resultado['quantidade'];
        $this->categoria_id = $resultado['categoria_id'];
    }

    public function listar()
    {
        $query = "SELECT p.id, p.nome, p.preco, p.quantidade, p.categoria_id
                  FROM produtos p
                  ORDER BY p.nome, p.preco";

        $conexao = Conexao::obterConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir()
    {
        $query = "INSERT INTO produtos (nome, preco, quantidade, categoria_id) VALUES
                  (:nome, :preco, :quantidade, :categoria_id)";

        $conexao = Conexao::obterConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE produtos 
                  SET nome = :nome, preco = :preco, quantidade = :quantidade, categoria_id = :categoria_id 
                  WHERE id = :id";

        $conexao = Conexao::obterConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':quantidade', $this->quantidade);
        $stmt->bindValue(':categoria_id', $this->categoria_id);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "DELETE FROM produtos WHERE id = :id";

        $conexao = Conexao::obterConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public static function carregarPorCategoria($idCategoria)
    {
        $query = "SELECT * FROM produtos WHERE categoria_id = :idCategoria ORDER BY nome, preco";

        $conexao = Conexao::obterConexao();

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':idCategoria', $idCategoria);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}