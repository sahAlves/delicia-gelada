<?php
    
    //Importando conexão do banco e tags do html.
    require_once('MODULOS/html.php');
    require_once('../bd/conexao.php');

    if(!isset($_SESSION))
        session_start();

    
    $admconteudo = (string) "";
    $admfaleconosco = (string) "";
    $admusuarios = (string) "";

    if($_SESSION['conteudo'] == 1)
        $admconteudo = "<div class='container_menu_itens'>
                        <div class='img_menu center'>
                            <a href='admconteudo.php'><img src='imagens/admconteudo.png' title='Clique para administrar o conteúdo...' alt='Admin. Conteúdo'></a>
                        </div>
                        <h3 class='titulo_menu' title='Clique para administrar o conteúdo...'><a href='home.php'>Adm. Conteúdo</a></h3>
                    </div>";
    if($_SESSION['contato'] == 1)
        $admfaleconosco = "<div class='container_menu_itens'>
                        <div class='img_menu center'>
                            <a href='admfaleconosco.php'><img src='imagens/admfaleconosco.png' alt='Admin. Fale Conosco' title='Clique para administrar o Fale Conosco...'></a>
                        </div>
                        <h3 class='titulo_menu' title='Clique para administrar o Fale Conosco...'><a href='admfaleconosco.php'>Adm. Fale Conosco</a></h3>
                    </div>";
    if($_SESSION['usuarios'] == 1)
        $admusuarios = "<div class='container_menu_itens'>
                        <div class='img_menu center'>
                            <a href='admusuarios_niveis.php'><img src='imagens/admusuarios.png' alt='Admin. Usuários' title='Clique para administrar os usuários...'></a>
                        </div>
                        <h3 class='titulo_menu' title='Clique para administrar os usuários...'><a href='admusuarios_niveis.php'>Adm. Usuários</a></h3>
                    </div>";




    $conexao = conexaoMysql();


    
    
    $chkConteudo = (string) "";
    $chkFaleConosco = (string) "";
    $chkUsuarios = (string) "";
    $conteudo = null;
    $faleConosco = null;
    $usuarios = null;
    $nome = null;
    $status = 0;
    $botao = (string) "Cadastrar";

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'editar'){
            
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            $sql = "select * from tblniveis where id_niveis=".$id;
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsEditar = mysqli_fetch_array($select)){
                $nome = $rsEditar['nome_nivel'];
                $conteudo =$rsEditar['admconteudo'];
                $faleConosco = $rsEditar['admfaleconosco'];
                $usuarios = $rsEditar['admusuarios'];
                
                if($conteudo == "1")
                    $chkConteudo = "checked";
                if($faleConosco == "1")
                    $chkFaleConosco = "checked";
                if($usuarios == "1")
                    $chkUsuarios = "checked";
                
                $botao = "Salvar";
                
                
            }
            
        }
    }
    


    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'desativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            $sql = "update tblniveis set status=0 where id_niveis=".$id;
            
            $select = mysqli_query($conexao, $sql);
        }
        
    }

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'ativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            $sql = "update tblniveis set status=1 where id_niveis=".$id;
            
            $select = mysqli_query($conexao, $sql);
        }
        
    }



?>

<!DOCTYPE html>
<html lang="pt-br">
    <?=$head?>
    
    <body>
        <div id="container_all">
            <!-- CABEÇALHO -->
            <header>
                <div class="conteudo center">
                    <div id="titulo">
                        <h1 style="float: left;"><a href='home.php'>CMS</a></h1>
                        <h2>- Sistema de Gerenciamento do Site</h2>
                    </div>
                    <a href="../index.php"><div id="logo" class="bkg" title="Delícia Gelada">

                    </div></a>
                </div>
            </header>

            <section id="section_menu_cms"><h2 class="disp">a</h2>
                <div class="conteudo center">
                    <nav>
                        <?=$admconteudo;?>
                        <?=$admfaleconosco;?>
                        <?=$admusuarios;?>
                    </nav>
                    <div id="welcome_logout">
                        <p>Bem vindo(a), <span><?=$_SESSION['nome']?></span></p>
                        <form method="post" name="frmlogout" onclick="return confirm('Deseja mesmo sair?');" action="../bd/autenticacao.php"><input type="submit" name="btnlogout" value="Logout" title="Deseja sair?"></form>
                    </div>
                </div>
            </section>

            <!-- CONTEUDO -->

            <section id="section_niveis"><h2 class="disp">a</h2>
                <div class="conteudo center">
                    <a href="admusuarios_niveis.php" title="Voltar para página anterior"><div id="seta"></div></a>
                    <div id="titulo_nivel" class="center">
                        CADASTRAR NÍVEIS
                    </div>

                    <div id="container_form_niveis" class="center">
                        <form id="form_niveis" name="frm_niveis" action="MODULOS/inserir.php" method="post">
                            <div id="box_nome_nivel" class="center">
                            Nome do Nível:
                            <br><br>
                            <input type="text" value="<?=$nome?>" name="txt_nivel" placeholder=" Insira o nome do nível..." required>
                        </div>
                        <div id="box_permissoes" class="center">
                            PERMISSÕES:
                            <div id="box_checks">
                                <div class="checks">

                                    <input type="checkbox" value="1" name="check_adm_conteudo" <?=$chkConteudo?> >

                                    <p class="adms">Administrar Conteúdo</p>

                                </div>

                                <div class="checks">

                                    <input type="checkbox" value="1" name="check_fale_conosco" <?=$chkFaleConosco?> >

                                    <p class="adms">Administrar Fale Conosco</p>

                                </div>

                                <div class="checks">

                                    <input type="checkbox" value="1" name="check_usuarios" <?=$chkUsuarios?> >

                                    <p class="adms">Administrar Usuários</p>

                                </div>

                            </div>
                        </div>
                        <input id="cadastrarbtn" type="submit" value="<?=$botao?>" name="btnCadastrar">
                        </form>
                    </div>


                    <div id="listagem_niveis" class="center">

                        <div class="container_titulos_niveis center">

                            <div class="nomes_nivel" style="background-color:#edbf9f;">
                                <p class="p_niveis">Níveis</p>
                            </div>

                            <div class="visualizar_niveis" style="background-color:#edbf9f; padding-top: 10px;">
                                <p class="p_niveis">Permissões</p>
                            </div>

                            <div class="editar" style="background-color:#edbf9f;">
                                <p class="p_niveis">Editar</p>
                            </div>


                            <div class="excluir_niveis" style="background-color:#edbf9f;">
                                <p class="p_niveis">Excluir</p>
                            </div>

                            <div class="ativar_desativar" style="background-color:#edbf9f;">
                                <p class="p_niveis">Ativar/Desativar</p>
                            </div>

                        </div>

                        <?php
                            $sql = "select * from tblniveis";

                            $select = mysqli_query($conexao,$sql);



                            while($rsNiveis = mysqli_fetch_array($select)){
                        ?>
                        <div class="container_titulos_niveis center">
                            <div class="nomes_nivel campos_padd">
                                <?=$rsNiveis['nome_nivel']?>
                            </div>

                            <div class="visualizar_niveis" style="padding-top: 10px;">

                                <?php

                                    if($rsNiveis['admconteudo'] == 1){

                                ?>
                                <div style="float:left; width:50px;height: 40px; border: solid 3px green; background-color: green; border-radius: 10px; margin-left: 10px; background-image: url(imagens/admconteudo.png); background-size: contain; background-repeat: no-repeat;background-position: center;"></div>

                                <?php
                                    }else{
                                ?>

                                    <div style="float:left; width:50px;height: 40px; border: solid 3px firebrick; background-color: firebrick; border-radius: 10px; margin-left: 10px; background-image: url(imagens/admconteudo.png); background-size: contain; background-repeat: no-repeat;background-position: center;"></div>

                                <?php
                                    }

                                    if($rsNiveis['admfaleconosco'] == 1){
                                ?>

                                <div style="float:left; width:50px;height: 40px; border: solid 3px green; background-color: green; border-radius: 10px; margin-left: 10px; background-image: url(imagens/admfaleconosco.png); background-size: contain; background-repeat: no-repeat;background-position: center;"></div>

                                <?php
                                    }else{
                                ?>

                                <div style="float:left; width:50px;height: 40px; border: solid 3px firebrick; background-color: firebrick; border-radius: 10px; margin-left: 10px; background-image: url(imagens/admfaleconosco.png); background-size: contain; background-repeat: no-repeat;background-position: center;"></div>

                                <?php
                                    }

                                    if($rsNiveis['admusuarios'] == 1){
                                ?>


                                <div style="float:left; width:50px;height: 40px; border: solid 3px green; background-color: green; border-radius: 10px; margin-left: 10px; background-image: url(imagens/admusers.png); background-size: contain; background-repeat: no-repeat;background-position: center;"></div>


                                <?php
                                    }else{
                                ?>

                                <div style="float:left; width:50px;height: 40px; border: solid 3px firebrick; background-color: firebrick; border-radius: 10px; margin-left: 10px; background-image: url(imagens/admusers.png); background-size: contain; background-repeat: no-repeat;background-position: center;"></div>

                                <?php
                                    }
                                ?>


                            </div>

                            <div class="editar">
                                <a href="admniveis.php?modo=editar&codigo=<?=$rsNiveis['id_niveis']?>"><img alt="Editar" title="Editar?" class="img_niveis" src="imagens/editar.png"></a>
                            </div>


                            <div class="excluir_niveis">
                                <a onclick="return confirm('Deseja realmente excluir esse registro? Lembrete: Se algum usuário estiver usando esse registro, o mesmo será excluído junto!');" href="MODULOS/deletar.php?modo=excluir&codigo=<?=$rsNiveis['id_niveis']?>"><img alt="Excluir" title="Excluir?" class="img_niveis" src="imagens/excluir.png"></a>
                            </div>

                            <div class="ativar_desativar">

                                <?php

                                    $status = $rsNiveis['status'];

                                    if($status == 1){


                                ?>
                                    <a href="admniveis.php?modo=desativar&codigo=<?=$rsNiveis['id_niveis']?>"><img title="Desativar" alt="Desativar" class="ativar_desati" src="imagens/ativar.png"></a>
                                <?php        
                                    }
                                    else{
                                ?>

                                    <a href="admniveis.php?modo=ativar&codigo=<?=$rsNiveis['id_niveis']?>"><img title="Ativar" alt="Ativar" class="ativar_desati" src="imagens/desativar.png"></a>

                                 <?php        
                                    }
                                ?>

                            </div>
                        </div>

                        <?php
                            }
                        ?>



                    </div>



                </div>
            </section>

            <?=$footer?>
        </div>    
    </body>
</html>