<?php

include "../model/Usuario.php";
$request = $_REQUEST;

if (isset($request["add"])) { //isset = verifica se a variavel foi criada ou existe
    echo "Cadastro";
}

if (isset($request["edit"])) {
    echo "Editar";
}

if (isset($request["list"])) {
    echo "Lista";
}


?>