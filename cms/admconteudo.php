<?php
    
    //Importação da conexao com o banco e das estruturas de html
    require_once('MODULOS/html.php');
    require_once('../bd/conexao.php');

    //Iniciando váriaveis de sessao
    if(!isset($_SESSION))
        session_start();


    //Declaração de variaveis
    $conexao = conexaoMysql();
    $admconteudo = (string) "";
    $admfaleconosco = (string) "";
    $admusuarios = (string) "";

    //Validando qual menu o usuário tem acesso
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
                    <!-- Logo -->
                    <a href="../index.php"><div id="logo" class="bkg" title="Delícia Gelada">

                    </div></a>
                </div>
            </header>
            
            <!-- Section que tem os menu e a parte do login -->
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
            
            <!-- CONTEUDO -->
            <section id="section_adm_conteudo"><h2 style="display:none;">a</h2>
                <div class="conteudo center">
                    <div class="box_opcoes">
                        <div class="content_icon">
                            <a href="admcuriosidades.php"><img class="icon_cont" alt="Administrar Curiosidades" src="imagens/curious.png" title="Clique aqui para administrar Curiosidades..."></a>
                        </div>

                        <div class="text_content">
                            <a href="admcuriosidades.php" title="Clique aqui para administrar Curiosidades...">Administrar Curiosidades...</a>
                        </div>
                    </div>    
                    <div class="box_opcoes">
                        <div class="content_icon">
                            <a href="admsobre.php"><img class="icon_cont" alt="Administrar Sobre Nós" src="imagens/sobre.png" title="Clique aqui para administrar Sobre Nós..."></a>
                        </div>

                        <div class="text_content">
                            <a href="admsobre.php" title="Clique aqui para administrar Sobre Nós...">Administrar Sobre Nós...</a>
                        </div>
                    </div>
                    
                    <div class="box_opcoes">
                        <div class="content_icon">
                            <a href="admlojas.php"><img class="icon_cont" alt="Administrar Nossas Lojas" src="imagens/lojas.png" title="Clique aqui para administrar Nossas Lojas..."></a>
                        </div>

                        <div class="text_content">
                            <a href="admlojas.php" title="Clique aqui para administrar Nossas Lojas...">Administrar Nossas Lojas...</a>
                        </div>
                    </div>
                </div>
            </section>
            
            
            
            
            <?=$footer?>
            
        </div>
    </body>
</html>