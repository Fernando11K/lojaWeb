<?php

include "../model/Usuario.php";

$request = $_REQUEST;

var_dump($request);

$usuario = new Usuario();

$usuario->nome = $request["nome"];
$usuario->email = $request["email"];

var_dump($usuario);

echo "Editado";


?>