<?php

include "Endereco.php";
include "Usuario.php";
class ListaEndereço
{

    public $usuario = new Usuario();
    public $endereco = new Endereco();
    public $numero;
    public $complemento;

    public $default = false;

    public $ative = true;
}


?>