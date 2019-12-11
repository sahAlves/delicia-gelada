<?php

/* Classe para integração de usuário com o Banco de Dados
 * Autor: Sabrina Souza Alves da Silva
 * Data de Criação: 09/12/2019
 * Modificações:
    Data:
    Alterações realizadas:
    Nome do desenvolvedor:

*/


 class produtoController{

    private $produto;

    //construtor
    public function __construct(){

        require_once('model/produtoClass.php');
        require_once('model/DAO/produtoDAO.php');

    }

 }


?>