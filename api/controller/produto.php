<?php

include_once("./model/Produto.php");
function produtoController($method, $router)
{
   $method == "GET" ? get($method, $router) : false;
   $method == "POST" ? postProduto($method, $router) : false;
   

}

function postProduto($method, $router) {

    if ($method == "POST") {
        if (!empty(strstr($router, "/produto/add"))){
            try {

                $dados = json_decode(file_get_contents('php://input'));
                //var_dump($dados);
                $produto = new Produto();
                $produto->nome = $dados->nome;
                $produto->descricao = $dados->descricao;
                $produto->quantidade = $dados->quantidade;
                $produto->data_alteracao = $dados->data_alteracao;
                $produto->valor = $dados->valor;
                $produto->largura = $dados->largura;
                $produto->altura = $dados->altura;
                $produto->comprimento = $dados->comprimento;
                $produto->peso = $dados->peso;
                $produto->fotos = $dados->fotos;
                $produto->fk_id_categoria = $dados->fk_id_categoria;
                $produto->add();
                
                http_response_code(200);
                echo "Endereço cadastrado!";

            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
    }

}

function getProduto($method, $router) {
     if ($method == "GET") { //Busca de dados
        if (!empty(strstr(($router == "/produto/list")))) {
            try {
                $produto = new Produto();
                $result = $produto->getAll();

                echo json_encode($result);
                 http_response_code(200);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode("error:" . $e->getMessage());
            }
            
        }
        if (!empty(strstr($router, "/produto/get"))) {
            try {
                $dados = explode("/", $router);
                $cep = $dados[count($dados) - 1];
                $endereco = new Produto();
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
        if (!empty(strstr(($router == "/produto")))) {
            try {
                $dados = json_decode(file_get_contents('php://input'));
                $endereco = new Produto();
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
}
?>