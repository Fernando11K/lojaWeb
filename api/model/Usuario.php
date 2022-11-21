<?php
include_once("./service/DAO.php");
class Usuario
{
    public $id_usuario;
    public $nome;
    public $foto;
    public $email;
    public $cpf;
    public $senha;
    public $telefone;
    public $ative = true;

    function add()
    {
        try {

            $dao = new DAO;
            $conn = $dao->conecta(); //Conectar ao banco de dados;
            $sql = "INSERT INTO usuario (nome, foto, cpf, email, senha, telefone) 
        VALUES (:nome, :foto, :cpf, :email, :senha, :telefone)"; //Criar o comando SQL com os parametros

            $statement = $conn->prepare($sql); //Prepara o comando SQL para executar;
            $statement->bindParam(":nome", $this->nome);
            $statement->bindParam(":email", $this->email);
            $statement->bindParam(":cpf", $this->cpf);
            $statement->bindParam(":foto", $this->foto);
            $statement->bindParam(":senha", $this->senha);
            $statement->bindParam(":telefone", $this->telefone);
            $statement->execute(); //Grava dos dados no banco de dados;

        } catch (Exception $e) {

            throw new Exception("Erro ao cadastrar o usuário!" . $e->getMessage());
        }
    }

}

?>