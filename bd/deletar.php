<?php

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'excluir'){
            
            require_once('conexao.php');
            
            $conexao = conexaoMysql();
            
            $id = $_GET['id'];
            $sql = "delete from tbldados where id =".$id;
            
            echo($sql);
            
            if(mysqli_query($conexao, $sql))
                header('location:../cms/admfaleconosco1.php');
            
        }
    }


?>