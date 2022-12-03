<?php

include_once("./model/Usuario.php");
function usuarioController($method, $router)
{

    if ($method == "POST") {
        if ($router == "/usuario/add")
            try {

                $dados = json_decode(file_get_contents('php://input'));
                //var_dump($dados);
                $user = new Usuario();
                $user->nome = $dados->nome;
                $user->email = $dados->email;
                $user->senha = $dados->senha;
                $user->cpf = $dados->cpf;
                $user->foto = $dados->foto;
                $user->telefone = $dados->telefone;
                $user->data_nasc = $dados->data_nasc;
                $user->ativo = $dados->ativo;
                http_response_code(200);
                $user->add();
                echo "Usuário cadastrado!";

            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
    }
    if ($method == "PUT") {//Alterações de dados
        if ($router == "/usuario/update")
            try {
                $dados = json_decode(file_get_contents('php://input'));
                //var_dump($dados);
                $user = new Usuario();
                $user->nome = $dados->nome;
                $user->email = $dados->email;
                $user->senha = $dados->senha;
                $user->cpf = $dados->cpf;
                $user->foto = $dados->foto;
                $user->telefone = $dados->telefone;
                $user->data_nasc = $dados->data_nasc;
                $user->ativo = $dados->ativo;
                $user->id_usuario = $dados->id_usuario;
               
                http_response_code(201);
                $user->update();
       
                echo "Dados Salvos!";
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
    }

    if ($method == "GET") { //Busca de dados
        if ($router == "/usuario/list") {
            try {
                $user = new Usuario();
                $result = $user->getAll();
                echo json_encode($result);
                 http_response_code(200);
            } catch (Exception $e) {
                 http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
            
        }
        if (!empty(strstr($router, "/usuario/get"))) {
            try {
                //$id = $_GET["id"];
                //var_dump($_GET);
                //var_dump(explode("/", $router)); //Explode: separa uma string em vetor com base em um
                //caracter. No exemplo "/"
                $id = explode("/", $router)[3];
                $user = new Usuario();
                $result = $user->getId($id);
                echo json_encode($result);
                 http_response_code(200);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
        }
        
    }
     if ($method == "DELETE") { //Busca de dados
        if ($router == "/usuario") {
            try {
                $dados = json_decode(file_get_contents('php://input'));
                $user = new Usuario();
                $user->deleteLogico($dados->id_usuario);
                http_response_code(200);
                echo "Dados Removidos!";
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
        }

}
// Outra forma

// if ($method == "POST") { //Envio dados e cadastros
//         if ($router == "/usuario/add") {
//             try {
//                 $dados = json_decode(file_get_contents('php://input'));
//                 //var_dump($dados);
//                 $user = new Usuario();
//                 $user->nome = $dados->nome;
//                 $user->email = $dados->email;
//                 $user->cpf = $dados->cpf;
//                 $user->foto = $dados->foto;
//                 $user->telefone = $dados->telefone;
//                 $user->data_nasc = $dados->data_nasc;
//                 $user->ativo = $dados->ativo;
//                 $user->id_usuario = $dados->id_usuario;
//                 if ($user->id_usuario == null) {
//                     $user->senha = $dados->senha;
//                     http_response_code(200);
//                     $user->add();
//                 } else {
//                     http_response_code(201);
//                     $user->update();
//                 }

//                 echo "Dados Salvos!";
//             } catch (Exception $e) {
//                 http_response_code(500);
//                 echo json_encode("error:" . $e->getMessage());
//             }
//         }
//     }


}
?>