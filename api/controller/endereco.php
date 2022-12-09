<?php

include_once("./model/Endereco.php");
function enderecoController($method, $router)
{
   $method == "GET" ? get($method, $router) : false;
   $method == "POST" ? post($method, $router) : false;
   

}

function post($method, $router) {

    if ($method == "POST") {
        if ($router == "/endereco/add")
            try {

                $dados = json_decode(file_get_contents('php://input'));
                //var_dump($dados);
                $endereco = new Endereco();
                $endereco->cep = $dados->cep;
                $endereco->logradouro = $dados->logradouro;
                $endereco->bairro = $dados->bairro;
                $endereco->cidade = $dados->cidade;
                $endereco->uf = $dados->uf;
                $endereco->add();
                
                http_response_code(200);
                echo "Endereço cadastrado!";

            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
    }

}

function get($method, $router) {
     if ($method == "GET") { //Busca de dados
        if ($router == "/endereco/list") {
            try {
                $endereco = new Endereco();
                $result = $endereco->getAll();

                echo json_encode($result);
                 http_response_code(200);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
            
        }
        if (!empty(strstr($router, "/endereco/get"))) {
            try {
                $dados = explode("/", $router);
                $cep = $dados[count($dados) - 1];
                $endereco = new Endereco();
                $result = $endereco->getId($cep);

                echo json_encode($result);
                http_response_code(200);
                return true;
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
        }
        
    }

      if ($method == "DELETE") { //Busca de dados
        if ($router == "/endereco") {
            try {
                $dados = json_decode(file_get_contents('php://input'));
                $endereco = new Endereco();
                $endereco->deleteLogico($dados->cep);

                http_response_code(200);
                echo "Dados Removidos!";
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
        }

}
}
?>