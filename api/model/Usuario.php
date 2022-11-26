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
            VALUES (:nome, :foto, :cpf, :email, md5(:senha), :telefone)"; //Criar o comando SQL com os parametros
            $newSenha = crypt(this->senha, '');
            $statement = $conn->prepare($sql); //Prepara o comando SQL para executar;
            $statement->bindParam(":nome", $this->nome);
            $statement->bindParam(":email", $this->email);
            $statement->bindParam(":cpf", $this->cpf);
            $statement->bindParam(":foto", $this->foto);
            $statement->bindParam(":senha", $this->senha);
            $statement->bindParam(":telefone", $this->telefone);
            $statement->execute(); //Grava os dados no banco de dados;

        } catch (Exception $e) {

            throw new Exception("Erro ao cadastrar o usuário!" . $e->getMessage());
        }
    }
    function getAll()
    {
        try {
            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "SELECT id_usuario, nome, foto, cpf, telefone, data_nasc, ativo FROM usuario WHERE ativo = true";
            $statement = $conn->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
            //return $statement->fetchAll();
        } catch (PDOException $pdoe) {
            throw new Exception("Erro ao lista todos os usuários!" . $pdoe->getMessage());
        } catch (JsonException $jsone) {
            throw new Exception("Erro ao lista todos os usuários!" . $jsone->getMessage());
        } catch (Exception $e) {
            throw new Exception("Erro ao lista todos os usuários!" . $e->getMessage());
        }
    }

    function getId($id)
    {
        try {
            $dao = new DAO;
            $conn = $dao->conecta();
            $sql = "SELECT id_usuario, nome, foto, cpf, telefone, data_nasc, ativo FROM usuario 
            WHERE id_usuario =:id and ativo = true ";
            $statement = $conn->prepare($sql);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
            //return $statement->fetchAll();
        } catch (PDOException $pdoe) {
            throw new Exception("Erro ao lista todos os usuários!" . $pdoe->getMessage());
        } catch (JsonException $jsone) {
            throw new Exception("Erro ao lista todos os usuários!" . $jsone->getMessage());
        } catch (Exception $e) {
            throw new Exception("Erro ao lista todos os usuários!" . $e->getMessage());
        }
    }

}

?>