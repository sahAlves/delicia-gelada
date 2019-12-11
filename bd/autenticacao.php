<?php

    require_once('conexao.php');

    if(!isset($_SESSION))
        session_start();

    $conexao = conexaoMysql();

    $usu = (string) "";
    $pass = (string) "";
    $passCrip = (string) "";


    if(isset($_POST['btnok'])){
        $usu = $_POST['txtusuario'];
        $pass = $_POST['txtsenha'];
        $passCrip = md5($pass);
        
        $sql = "select tblusuarios.*, tblniveis.admconteudo, tblniveis.admfaleconosco,tblniveis.admusuarios, tblniveis.status as 'st_nivel' from tblusuarios
        inner join tblniveis on tblniveis.id_niveis = tblusuarios.nivel";
        
        $select = mysqli_query($conexao,$sql);
        
        while($rsUsuarios = mysqli_fetch_array($select)){
            
//            var_dump($rsUsuarios);
            
            if($usu == $rsUsuarios['nome_usuario'] && $passCrip == $rsUsuarios['senha'] ){
                
                if($rsUsuarios['status'] == 1 && $rsUsuarios['st_nivel'] == 1){
                    
                    $nome = $rsUsuarios['nome'];
                    $admconteudo = $rsUsuarios['admconteudo'];
                    $admfaleconosco = $rsUsuarios['admfaleconosco'];
                    $admusuarios = $rsUsuarios['admusuarios'];


                    $_SESSION['nome'] = $nome;
                    $_SESSION['conteudo'] = $admconteudo;
                    $_SESSION['contato'] = $admfaleconosco;
                    $_SESSION['usuarios'] = $admusuarios;
                    $_SESSION['alert'] = 0;
                    header('location:../cms/home.php');
                    break;
                }
                else{
                    $_SESSION['alert'] = 2;
                    header('location:../index.php');
                    break;
                }
                
                
            }
            else{
                $_SESSION['alert'] = 1;
                header('location:../index.php');
                
            }
            
        };
        
        
        
    }
    

    if(isset($_POST['btnlogout'])){
        session_destroy();
        header('location:../index.php');
    }

    




//    $usuario = "sabrina";
//    $senha = "123";
//
//    if(isset($_POST['btnok'])){
//        $usu = $_POST['txtusuario'];
//        $pass = $_POST['txtsenha'];
//        
//        if($usu == $usuario && $pass == $senha){
//            header('location:cms/home.php');
//        }
//    }


?>