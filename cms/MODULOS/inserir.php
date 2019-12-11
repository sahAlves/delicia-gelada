<?php

    //Iniciando todas as variaveis de sessão
    if(!isset($_SESSION))
        session_start();

    //inserir de adm usuarios
    if(isset($_POST['btninserir'])){
        
        require_once('../../bd/conexao.php');
        
        $conexao = conexaoMysql();
        
        $nome_completo = $_POST['txtnomecompleto'];
        $nome_usuario = $_POST['txtnomeusuario'];
        $email = $_POST['txtemail'];
        $nivel = $_POST['slct_nivel'];
        $ativado = 1;
        $desativado = 0;
        
        
        
        if(strtoupper($_POST['btninserir']) == "INSERIR"){
            $senha = $_POST['txtsenha'];
            $senhaCrip = md5($senha);
            
            $sql = "insert into tblusuarios
                (nome,nome_usuario,email,senha, nivel, status)
                    values
                        ('".$nome_completo."','".$nome_usuario."','".$email."','".$senhaCrip."',".$nivel.", ".$ativado.")";
            
        }
            
        
        elseif(strtoupper($_POST['btninserir']) == "SALVAR"){
            
            $sql = "select * from tblusuarios where id_usuario =".$_SESSION['id'];
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsEditar = mysqli_fetch_array($select)){
                $senhaAntiga = $rsEditar['senha'];
                
                if(isset($_POST['txtsenhaatual']) && isset($_POST['txtnovasenha'])){
                    
                    $senhaAtual = $_POST['txtsenhaatual'];
                    $senhaNova = $_POST['txtnovasenha'];
                    $senhaAtualCrip = md5($senhaAtual);
                    $senhaNovaCrip = md5($senhaNova);
                
                    if($senhaAtualCrip == $senhaAntiga){

                        $sql = "update tblusuarios set
                            nome = '".$nome_completo."', nome_usuario = '".$nome_usuario."',
                            email = '".$email."', senha = '".$senhaNovaCrip."',
                            nivel = ".$nivel.", status = ".$ativado."
                            where id_usuario =".$_SESSION['id'];
                        
                    }
                    elseif($senhaAtualCrip != $senhaAntiga){
                        
                        $_SESSION['senha'] = 1;
                        header('location:../admusuarios.php');

                    }        
                }else{
                    $sql = "update tblusuarios set
                    nome = '".$nome_completo."', nome_usuario = '".$nome_usuario."',
                    email = '".$email."',
                    nivel = ".$nivel.", status = ".$ativado."
                    where id_usuario =".$_SESSION['id'];   
                }
            }
        }
            
        if(mysqli_query($conexao,$sql))
            header('location:../admusuarios.php');
        else
            echo("Erro ao executar o script no banco");
//            echo($sql);
        
    }

    //Inserir de admniveis
    if(isset($_POST['btnCadastrar'])){
        
        require_once('../../bd/conexao.php');

        $conexao = conexaoMysql();
        
        $nome_nivel = $_POST['txt_nivel'];
        $adm_conteudo = $_POST['check_adm_conteudo']?1:0;
        $adm_fale_conosco = $_POST['check_fale_conosco']?1:0;
        $adm_usuarios = $_POST['check_usuarios']?1:0;
        $status = 1;
        
        if(strtoupper($_POST['btnCadastrar']) == "CADASTRAR")
            $sql = "  
                     insert into tblniveis
                        (nome_nivel, admconteudo, admfaleconosco, admusuarios,status)
                      values 
                        ('".$nome_nivel."',".$adm_conteudo.", ".$adm_fale_conosco.",".$adm_usuarios.",".$status.")

                    ";
        
        elseif(strtoupper($_POST['btnCadastrar']) == "SALVAR")
            $sql = "update tblniveis set
            nome_nivel = '".$nome_nivel."',
            admconteudo = '".$adm_conteudo."',
            admfaleconosco = '".$adm_fale_conosco."',
            admusuarios = '".$adm_usuarios."'
            where id_niveis=".$_SESSION['codigo'];  
        
        
        if(mysqli_query($conexao,$sql))
            header('location:../admniveis.php');
        else
            echo("Erro ao executar o script no banco");
//            echo($sql);
        
        
    }

    

    //inserir da admcuriosidades
    if(isset($_POST['btnInse'])){
        
        require_once('../../bd/conexao.php');
        
        $conexao = conexaoMysql();

        $titulo = $_POST['txttitulo'];
        $direcao = $_POST['slct_curious'];
        $texto = $_POST['txt_content'];
        $status = 1;
        
        if(isset($_SESSION['previewFoto']))
           $foto = $_SESSION['previewFoto'];
        else
           $foto = null;

        
            
            
        if(strtoupper($_POST['btnInse']) == "INSERIR")

            $sql = "insert into tblcuriosidades 
                    (titulo, foto, texto, left_right, status)
                    values
                    ('".$titulo."','".$foto."','".$texto."',
                    '".$direcao."','".$status."')";

        elseif(strtoupper($_POST['btnInse']) == "EDITAR")

            $sql = "update tblcuriosidades set
                    titulo='".$titulo."', foto='".$foto."',
                    texto='".$texto."', left_right='".$direcao."'
                    where id_curious=".$_SESSION['id'];




        if(mysqli_query($conexao, $sql)){

            if(isset($_SESSION['nomeFoto'])){
                unlink('arquivos/'.$_SESSION['nomeFoto']);
                unset($_SESSION['nomeFoto']);
            } 
            if (isset($_SESSION['previewFoto']))
                unset($_SESSION['previewFoto']);
                header('location:../admcuriosidades.php');
        }

        else
            echo("Erro ao executar o script no banco");
            echo($sql);

    }



    //Inserir do adm sobre nos
    if(isset($_POST['btnInsert'])){
        
        require_once('../../bd/conexao.php');
        
        $conexao = conexaoMysql();

        $titulo = $_POST['txttitulo'];
        $modo = $_POST['slct_sobre'];
        $texto = $_POST['txttexto'];
        $status = 1;
        
        if(isset($_SESSION['viewFoto']))
           $foto = $_SESSION['viewFoto'];
        else
           $foto = null;

        
        if($modo == "Introdução"){
            
            if(strtoupper($_POST['btnInsert']) == "INSERIR")

            $sql = "insert into tblsobre_inicio 
                    (titulo, texto, status, modo)
                    values
                    ('".$titulo."','".$texto."',
                    '".$status."', '".$modo."')";
            
            elseif(strtoupper($_POST['btnInsert']) == "EDITAR")

            $sql = "update tblsobre_inicio set
                    titulo='".$titulo."',
                    texto='".$texto."', modo='".$modo."'
                    where id_sobrei=".$_SESSION['id'];
            
        } elseif($modo == "Cards"){
            
            if(strtoupper($_POST['btnInsert']) == "INSERIR")

            $sql = "insert into tblsobre_cards 
                    (titulo, foto, descricao, status, modo)
                    values
                    ('".$titulo."','".$foto."','".$texto."',
                    '".$status."', '".$modo."')";
            
            elseif(strtoupper($_POST['btnInsert']) == "EDITAR")

            $sql = "update tblsobre_cards set
                    titulo='".$titulo."',
                    descricao='".$texto."', modo='".$modo."', foto='".$foto."'
                    where id_sobreds=".$_SESSION['id'];
            
        }    
            


        if(mysqli_query($conexao, $sql)){

            if(isset($_SESSION['nomeFoto'])){
                unlink('arquivos/'.$_SESSION['nomeFoto']);
                unset($_SESSION['nomeFoto']);
            } 
            if (isset($_SESSION['viewFoto']))
                unset($_SESSION['viewFoto']);
            
                header('location:../admsobre.php');
        }

        else
            echo("Erro ao executar o script no banco");
            echo($sql);

    }



    //Inserir do adm nossas lojas
    if(isset($_POST['btnLojas'])){
        
        require_once('../../bd/conexao.php');
        
        $conexao = conexaoMysql();

        $nome = $_POST['txtnomeloja'];
        $endereco = $_POST['txtendereco'];
        $telefone = $_POST['txttelefone'];
        $hrFuncionamento = $_POST['txthorariofuncionamento'];
        $status = 1;
        
        if(isset($_SESSION['viewFoto']))
           $foto = $_SESSION['viewFoto'];
        else
           $foto = null;

        
            
            if(strtoupper($_POST['btnLojas']) == "INSERIR")

                $sql = "insert into tbl_lojas 
                        (foto, nome_loja, endereco, telefone, horario_funcionamento, status)
                        values
                        ('".$foto."','".$nome."',
                        '".$endereco."', '".$telefone."','".$hrFuncionamento."', '".$status."')";
            
            elseif(strtoupper($_POST['btnLojas']) == "EDITAR")

                $sql = "update tbl_lojas set
                        foto='".$foto."',
                        nome_loja='".$nome."', endereco='".$endereco."',
                        telefone='".$telefone."', horario_funcionamento='".$hrFuncionamento."'
                        where id_lojas=".$_SESSION['id'];
            
            


        if(mysqli_query($conexao, $sql)){

            if(isset($_SESSION['nomeFoto'])){
                unlink('arquivos/'.$_SESSION['nomeFoto']);
                unset($_SESSION['nomeFoto']);
            } 
            if (isset($_SESSION['viewFoto']))
                unset($_SESSION['viewFoto']);
            
                header('location:../admlojas.php');
        }

        else
            echo("Erro ao executar o script no banco");
            echo($sql);

    }

    
    


?>