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
    public $data_nasc;
    public $ativo = true;

    function add()
    {
        try {

            $dao = new DAO;
            $conn = $dao->conecta(); //Conectar ao banco de dados;
            $sql = "INSERT INTO usuario (nome, foto, cpf, email, senha, telefone, data_nasc) 
            VALUES (:nome, :foto, :cpf, :email, md5(:senha), :telefone, :data_nasc)"; //Criar o comando SQL com os parametros

            //Define a nova senha criptografada.
            $newSenha = crypt($this->senha, '$5$rounds=5000$' . $this->email . '$');

            $statement = $conn->prepare($sql); //Prepara o comando SQL para executar;
            $statement->bindParam(":nome", $this->nome);
            $statement->bindParam(":email", $this->email);
            $statement->bindParam(":cpf", $this->cpf);
            $statement->bindParam(":foto", $this->foto);
            $statement->bindParam(":data_nasc", $this->data_nasc);
            $statement->bindParam(":senha", $newSenha);
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

    function update()
    {

        try {

            $dao = new DAO;
            $conn = $dao->conecta(); //Conectar ao banco de dados;
            $sql = "UPDATE usuario SET 
                nome = :nome, 
                foto = :foto, 
                cpf = :cpf, 
                email = :email, 
                -- senha = md5(:senha), 
                telefone = :telefone, 
                data_nasc = :data_nasc
                where id_usuario = :id";

            $statement = $conn->prepare($sql); //Prepara o comando SQL para executar;
            $statement->bindParam(":nome", $this->nome);
            $statement->bindParam(":email", $this->email);
            $statement->bindParam(":cpf", $this->cpf);
            $statement->bindParam(":foto", $this->foto);
            $statement->bindParam(":data_nasc", $this->data_nasc); //YYYY-MM-DD -> BR: DD-MM-YYYY
            $statement->bindParam(":telefone", $this->telefone);
            $statement->bindParam(":id", $this->id_usuario);
            $statement->execute(); //Grava os dados no banco de dados;

        } catch (Exception $e) {

            throw new Exception("Erro ao cadastrar o usuário!" . $e->getMessage());
        }


    }
    // function delete($id) //Remoção física do banco de dados

    // {

    //     try {

    //         $dao = new DAO;
    //         $conn = $dao->conecta(); //Conectar ao banco de dados;
    //         $sql = "DELETE usuario where id_usuario = : id";

    //         $statement = $conn->prepare($sql); //Prepara o comando SQL para executar;
    //         $statement->bindParam(":id", $id);
    //         $statement->execute(); //Grava os dados no banco de dados;

    //     } catch (Exception $e) {

    //         throw new Exception("Erro ao cadastrar o usuário!" . $e->getMessage());
    //     }


    // }

    function deleteLogico($id) //Remoção lógica do banco de dados
    
    {

        try {

            $dao = new DAO;
            $conn = $dao->conecta(); //Conectar ao banco de dados;
            $sql = "UPDATE usuario SET usuario.ativo = false where id_usuario = :id";
            $statement = $conn->prepare($sql); //Prepara o comando SQL para executar;
            $statement->bindParam(":id", $id);
            $statement->execute(); //Grava os dados no banco de dados;

        } catch (Exception $e) {

            throw new Exception("Erro ao cadastrar o usuário!" . $e->getMessage());
        }


    }
     function logon($email, $pass)
    {
        try {
            $dao = new DAO;
            $conn = $dao->conecta();

            $newSenha = crypt($pass, '$5$rounds=5000$' . $email . '$');
            $sql = "SELECT id_usuario, nome, foto, cpf, email, telefone, data_nasc 
                from usuario 
                where usuario.email = :email 
                and usuario.senha = md5(:pass)
                and usuario.ativo = true";
            $stman = $conn->prepare($sql);
            $stman->bindParam(":email", $email);
            $stman->bindParam(":pass", $newSenha);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result ? $result : null;
        } catch (Exception $e) {
            throw new Exception("Erro ao entrar com o usuario! " . $e->getMessage());
        }
    }
}

?>