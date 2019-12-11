<?php 

    if(!isset($_SESSION))
        session_start();

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CMS - Sistema Interno</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        
    <header>
                <div class="conteudo center">
                    <div id="titulo">
                        <h1 style="float: left;"><a href='home.php'>CMS</a></h1>
                        <h2>- Sistema Interno</h2>
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
                        <div class="container_menu_itens">
                            <div class="img_menu center">
                                <a href="admconteudo.php"><img src="imagens/admprodutos.png" title="Clique para administrar os produtos..." alt="Admin. produtos"></a>
                            </div>
                            <h3 class="titulo_menu" title="Clique para administrar os produtos..."><a href="home.php">Adm. Produtos</a></h3>
                        </div>

                        <div class="container_menu_itens">
                            <div class="img_menu center">
                                <a href="admconteudo.php"><img src="imagens/admcategorias.png" title="Clique para administrar as categorias..." alt="Admin. as categorias"></a>
                            </div>
                            <h3 class="titulo_menu" title="Clique para administrar as categorias..."><a href="home.php">Adm. Categorias</a></h3>
                        </div>

                        <div class="container_menu_itens">
                            <div class="img_menu center">
                                <a href="admconteudo.php"><img src="imagens/admsubcategorias.png" title="Clique para administrar as sub categorias..." alt="Admin. as sub categorias"></a>
                            </div>
                            <h3 class="titulo_menu" title="Clique para administrar as sub categorias..."><a href="home.php">Adm. Sub Categorias</a></h3>
                        </div>

                    </nav>
                    <div id="welcome_logout">
                        <p>Bem vindo(a), <span><?=$_SESSION['nome']?></span></p>
                        <form method="post" name="frmlogout" onclick="return confirm('Deseja mesmo sair?');" action="../bd/autenticacao.php"><input type="submit" name="btnlogout" value="Logout" title="Deseja sair?"></form>
                    </div>
                </div>
            </section>

            <?php require_once('produtos/produtos.php');?>

            

            <footer>
            <div class="conteudo center">
                <p>Desenvolvido por Sabrina Souza Alves da Silva</p>
            </div>
        </footer>

    </body>
</html>