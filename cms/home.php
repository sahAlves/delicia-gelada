<?php
    //Importação do arquivo que guarda as estruturas em html.
    require_once('MODULOS/html.php');

    //Iniciando as variáveis de sessão
    if(!isset($_SESSION))
        session_start();

    //Criação de váriaveis
    $admconteudo = (string) "";
    $admfaleconosco = (string) "";
    $admusuarios = (string) "";

    
    //Estrutura de decisão pra fazer validação de qual menu o usuário tem permissão de acessar
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
    <?=$head;?>
    <body>
        <div id="container_all">
            <!-- CABEÇALHO -->
            <header>
                <div class="conteudo center">
                    <div id="titulo">
                        <h1 style="float: left;"><a href='home.php'>CMS</a></h1>
                        <h2>- Sistema de Gerenciamento do Site</h2>
                    </div>
                    <!-- Logo -->
                    <a href="../index.php"><div id="logo" class="bkg" title="Delícia Gelada">

                    </div></a>
                </div>
            </header>
            <!-- Section que guarda os menus e a parte do login -->
            <section id="section_menu_cms"><h2 style="display:none;">a</h2>
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

            <!-- Conteudo -->
            <?=$conteudo_home;?>

            
            <!-- Rodapé -->
            <?=$footer;?>
            
        </div>
    </body>
</html>
