<?php

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'excluir'){
            require_once('../../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $id = $_GET['codigo'];
            $sql = "delete from tblusuarios where nivel =".$id;
            $sql2 = "delete from tblniveis where id_niveis =".$id;
            
            echo($sql);
            echo($sql2);
            
            if(mysqli_query($conexao,$sql)){
                if(mysqli_query($conexao,$sql2)){
                    header('location:../admniveis.php');
                }    
            }
        }
    }


    if(isset($_GET['tipo'])){
        if($_GET['tipo'] == 'excluir'){
            require_once('../../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $id = $_GET['id'];
            $sql = "delete from tblusuarios where id_usuario=".$id;
            
            echo($sql);
            
            if(mysqli_query($conexao,$sql))
                header('location:../admusuarios.php');
            
        }
    }



    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'deletar'){
            require_once('../../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $id = $_GET['codigo'];
            $foto = $_GET['foto'];
            
            $sql = "delete from tblcuriosidades where id_curious=".$id;
            
            if(mysqli_query($conexao,$sql)){
                
                unlink('arquivos/'.$foto);
                header('location:../admcuriosidades.php');
            }else{
                echo("Erro ao deletar registro!");
            }
                
            
        }
    }

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'delete'){
            require_once('../../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $id = $_GET['codigo'];
            $modo = $_GET['tipo'];
            
            if($modo == "Introdução"){
                
                $sql = "delete from tblsobre_inicio where id_sobrei=".$id;
                
                
            }
            elseif($modo == "Cards"){
                $foto = $_GET['foto'];
                $sql = "delete from tblsobre_cards where id_sobreds=".$id;
            }
                
            
            
            if(mysqli_query($conexao,$sql)){
                if(isset($_GET['foto']))
                unlink('arquivos/'.$foto);
                
                header('location:../admsobre.php');
            }else{
                echo("Erro ao deletar registro!");
            }
                
            
        }
    }




    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'delet'){
            require_once('../../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $id = $_GET['codigo'];
            $foto = $_GET['foto'];
            
            $sql = "delete from tbl_lojas where id_lojas=".$id;
            
            if(mysqli_query($conexao,$sql)){
                
                unlink('arquivos/'.$foto);
                header('location:../admlojas.php');
            }else{
                echo("Erro ao deletar registro!");
                echo($sql);
            }
                
            
        }
    }

?>