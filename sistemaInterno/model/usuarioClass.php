<?php


/* Classe referente ao objeto Contato
 * Autor: Sabrina Souza Alves da Silva
 * Data de Criação: 09/12/2019
 * Modificações:
    Data:
    Alterações realizadas:
    Nome do desenvolvedor:
 *

*/



class Usuario{
    
    private $idUsuario;
    private $nome;
    private $nomeUsuario;
    private $senha;
    private $status;
    private $nivel;
    
    
    //Construtor
    public function __construct(){
        
    }
    
    public function getId(){
        
        return $this->idUsuario;
        
    }
    
    public function setId($idUsuario){
        
        $this->idUsuario = $idUsuario;
    }
    
    
    public function getNome(){
        
        return $this->nome;
        
    }
    
    public function setNome($nome){
        
        $this->nome = $nome;
    }

    public function getNomeUsuario(){
        
        return $this->nomeUsuario;
        
    }
    
    public function setNomeUsuario($nomeUsuario){
        
        $this->nomeUsuario = $nomeUsuario;
    }


    public function getSenha(){
        
        return $this->senha;
        
    }
    
    public function setSenha($senha){
        
        $this->senha = $senha;
    }
    
    public function getStatus(){
        
        return $this->status;
        
    }
    
    public function setStatus($status){
        
        $this->status = $status;
    }

    public function setNivel($nivel){
        
        $this->nivel = $nivel;
    }
    
    public function getNivel(){
        
        return $nivel->nivel;
        
    }
    
}


?>