<?php

/* Classe para integração de usuário com o Banco de Dados
 * Autor: Sabrina Souza Alves da Silva
 * Data de Criação: 09/12/2019
 * Modificações:
    Data:
    Alterações realizadas:
    Nome do desenvolvedor:

*/

class UsuarioController{

    private $usuario;

    //construtor
    public function __construct(){
        
        require_once('model/usuarioClass.php');
        require_once('model/DAO/usuarioDAO.php');

        //Valida se a requisição que esta chegando pelo metodo do form é post 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Instancia da Classe contato
            $this->usuario = new Usuario();
            
            //Guarda nos atributos do objeto os dados do post do FORM
            $this->usuario->setNomeUsuario($_POST['txtusuario']);
            $this->usuario->setSenha(md5($_POST['txtsenha']));


        }
        

        
    }

    //Listar todos os contatos
    public function buscarUsuario(){

        //Instancia da classe Contato DAO
        $usuarioDAO = new UsuarioDAO();
       
        // guardando os dados digitados.
        $usuario = $this->usuario->getNomeUsuario();
        $senha = $this->usuario->getSenha();
        
        $nome  = $usuarioDAO->login($usuario, $senha);
        
        if($nome){
            session_start();
            $_SESSION['nome'] = $nome;
            header('location: view/home.php');
        }
        else
            echo("Erro ao realizar autenticação");
        
    
    }


}

?>