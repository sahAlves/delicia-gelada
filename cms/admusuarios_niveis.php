<?php

    require_once('MODULOS/html.php');


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

            <section id="section_menu_cms"><h2 style="display: none;">a</h2>
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

            <section id="section_usuarios"><h2 style="display: none;">a</h2>
                <div class="conteudo center">

                    <div class="box_opcao">
                        <div class="usuarios_icon">
                            <a href="admusuarios.php"><img class="icon_users" alt="Administrar Usuários" src="imagens/admusers.png" title="Clique aqui para administrar usuários..."></a>
                        </div>

                        <div class="text_usuarios">
                            <a href="admusuarios.php" title="Clique aqui para administrar usuários...">Administrar Usuários...</a>
                        </div>
                    </div>    
                    <div class="box_opcao">
                        <div class="usuarios_icon">
                            <a href="admniveis.php"><img class="icon_users" alt="Administrar Níveis" src="imagens/admlvl.png" title="Clique aqui para administrar os níveis..."></a>
                        </div>

                        <div class="text_usuarios">
                            <a href="admniveis.php" title="Clique aqui para administrar os níveis...">Administrar Níveis...</a>
                        </div>
                    </div>    

                </div>
            </section>




            <?=$footer?>
            
        </div>    
    </body>
</html>