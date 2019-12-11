<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>CMS - Sistema Interno</title>
        <link rel="stylesheet" type="text/css" href="view/css/style.css">
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
            <section id='section_conteudo_login'>
            <div class='conteudo center' style="border-top: solid 2px black;">
                <div id="container_login" class="center">

                    <form action="router.php?controller=logar&modo=login" id="formLogin" name="frmLogin" method="post">
                        <input class="login center" type="text" name="txtusuario" placeholder="Usuário...">

                        <input class="login center" type="text" name="txtsenha" placeholder="Senha...">

                        <input id="btnLogin" class="center" type="submit" name="btnLogin" value="Entrar">

                    </form>

                </div>
            </div>
        </section>

        <footer>
            <div class='conteudo center'>
                <p>Desenvolvido por Sabrina Souza Alves da Silva</p>
            </div>
        </footer>
    </body>
</html>