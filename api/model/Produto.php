<?php

include_once("./service/DAO.php");

class Produto {

    public $id_produto;
    public $nome;
    public $descricao;
    public $quantidade;
    public $data_alteracao;
    public $valor;
    public $largura;
    public $altura;
    public $comprimento;
    public $peso;
    public $fotos;
    public $fk_id_categoria;

    function add() {

        $dao = new DAO();
        $conn = $dao->conecta();
        $sql = "INSERT INTO produto (nome, descricao, quantidade, data_alteracao, 
        valor, largura, altura, comprimento, peso, fotos, fk_id_categoria)
        VALUES (:nome, :descricao, :quantidade, :data_alteracao, 
        :valor, :largura, :altura, :comprimento, :peso, :fotos, :fk_id_categoria)";
          $statement = $conn->prepare($sql);
          $statement->bindParam(":nome", $this->nome);
          $statement->bindParam(":descricao", $this->descricao);
          $statement->bindParam(":quantidade", $this->quantidade);
          $statement->bindParam(":data_alteracao", $this->data_alteracao);
          $statement->bindParam(":valor", $this->largura);
          $statement->bindParam(":altura", $this->comprimento);
          $statement->bindParam(":peso", $this->peso);
          $statement->bindParam(":fotos", $this->fotos);
          $statement->bindParam(":fk_id_categoria", $this->fk_id_categoria);
    }
    function getId($id_produto)
    {
        try {
            $dao = new DAO();
            $conn = $dao->conecta();
            $sql = "Select * from produto where id_produto = :id_produto";
            $stman = $conn->prepare($sql);
            $stman->bindParam(":id_produto", $id_produto);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao retornar o produto!" . $e->getMessage());
        }
    }
    function getAll()
    {
        try {
            $dao = new DAO();
            $conn = $dao->conecta();
            $sql = "Select * from produto";
            // $sql = "Select * from produto limit :inicio, :final";
            $stman = $conn->prepare($sql);
            // $stman->bindParam(":inicio", $inicio);
            //  $stman->bindParam(":final", $final);

            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao buscar produtos!" . $e->getMessage());
        }
    }

    function update($id_produto)
    {
        try {
            $dao = new DAO();
            $conn = $dao->conecta();
            $sql = "UPDATE produto SET 
            nome = :nome, 
            descricao = :descricao,
            quantidade = : quantidade,
            data_alteracao =: data_alteracao,
            valor = :valor,
            largura = :largura,
            altura = :altura,
            comprimento = :comprimento,
            peso = :peso,
            fotos = fotos,
            fk_id_categoria = fk_id_categoria
            WHERE id_produto = :id_produto";
            $stman = $conn->prepare($sql);
              $statement->bindParam(":nome", $this->nome);
          $statement->bindParam(":descricao", $this->descricao);
          $statement->bindParam(":quantidade", $this->quantidade);
          $statement->bindParam(":data_alteracao", $this->data_alteracao);
          $statement->bindParam(":valor", $this->largura);
          $statement->bindParam(":altura", $this->comprimento);
          $statement->bindParam(":peso", $this->peso);
          $statement->bindParam(":fotos", $this->fotos);
          $statement->bindParam(":fk_id_categoria", $this->fk_id_categoria);
          $statement->execute(); 
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastra o endereço!" . $e->getMessage());
        }
    }

    function delete()
    {
        try {
            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "DELETE produto where id_produto = :id_produto";
            $stman = $conn->prepare($sql);;
            $stman->bindParam(":id_produto", $this->id_produto);
            $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastra o usuário! " . $e->getMessage());
        }
    }

}

?>