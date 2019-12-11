<?php

/* Classe para conexão com o Banco de Dados
 * Autor: Sabrina Souza Alves da Silva
 * Data de Criação: 25/11/2019
 * Modificações:
    Data:
    Alterações realizadas:
    Nome do desenvolvedor:
 *

*/

class ConexaoMysql{
    
    private $server;
    private $user;
    private $password;
    private $database;
    
    //Construtor da Classe
    public function __construct (){
        
        $this->server="localhost";
        $this->user="root";
        $this->password="";
        $this->database="dbcontatos";
        
    }
    
    //Abre a conexão com o BD
    public function conectDatabase(){
        
        try{
            $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database, $this->user, $this->password);
            return $conexao;
        }catch(PDOException $erro){
            echo("Erro ao realizar a conexão com o BD <br> Linha do erro:".$erro->getLine()."<br> Mensagem do Erro:".$erro->getMessage());
        }
        
    }
    
}


?>