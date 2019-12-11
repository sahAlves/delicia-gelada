<?php

    $controller = (string) null;
    $modo = (string) null;

    $controller = $_GET['controller'];
    $modo = $_GET['modo'];

    //Valida qual a controller ser instanciada
    switch ( strtoupper($controller)){
            
        case 'LOGAR' :
            
            require_once('controller/usuarioController.php');
            //Valida qual a ação a ser executada na controller
            switch (strtoupper($modo)){
                    
                case 'LOGIN' :
                    
                    //Instancia da classe contato controller
                    $usuarioController = new UsuarioController();    
                
                    //Metodo para inserir um novo contato
                    $usuarioController->buscarUsuario();
                    
                    
                    break;    
    
                    
                
            }
            
        break;
            
        
            
    }

?>