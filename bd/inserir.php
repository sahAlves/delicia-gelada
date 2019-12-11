<?php

    if(isset($_POST['btnenviar'])){
        
        require_once('conexao.php');
        
        $conexao = conexaoMysql();
        
        $nome = $_POST['txtnome'];
        $telefone = $_POST['txttelefone'];
        $celular = $_POST['txtcelular'];
        $dt_nasc = explode("/",$_POST['txtdata']);
        $dt_nasc = $dt_nasc[2]."-".$dt_nasc[1]."-".$dt_nasc[0];
//        echo($dt_nasc);
        $sexo = $_POST['rdosexo'];
        $profissao = $_POST['txtprofissao'];
        $email = $_POST['txtemail'];
        $home_page = $_POST['txthomepage'];
        $link_facebook = $_POST['txtlinkfb'];
        $sugestao_criticas = $_POST['select'];
        $mensagem = $_POST['mensagem'];
        
        $sql = "   insert into tbldados
                                (nome,telefone,celular,
                                dt_nasc,sexo,profissao,
                                email,home_page,
                                link_facebook,
                                sugestao_criticas,mensagem)
                                
                                values ('".$nome."','".$telefone."','".$celular."','".$dt_nasc."','".$sexo."','".$profissao."','".$email."','".$home_page."','".$link_facebook."','".$sugestao_criticas."','".$mensagem."')";
        
        if(mysqli_query($conexao,$sql))
            header('location:../contato.php');
        else
            echo("Erro ao executar o script no banco");
//            echo($sql);
        
    }

?>