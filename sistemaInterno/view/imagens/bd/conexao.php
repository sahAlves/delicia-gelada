<?php

    function conexaoMysql(){
        
        $server = (string) "localhost";
        $user = (string) "root";
        $password = (string) "bcd127";
        $database = (string) "dbcontatos";
        
        $conexao = mysqli_connect($server,$user,$password,$database);
        
        return $conexao;
        
    }

?>