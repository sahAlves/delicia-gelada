<?php
    
    require_once('MODULOS/html.php');
    require_once('../bd/conexao.php');

    if(!isset($_SESSION))
        session_start();

    $conexao = conexaoMysql();

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
    


        
    $nome_completo = null;
    $nome_usuario = null;
    $email = null;
    $senha = null;
    $codNivel = (int) 0;
    $nomeNivel = (string) "";
    $button = (string) "Inserir";
    $disabled = (string) "required";
    $boxSenha = (string) "<h2 style='color:black; font-weight: bold;margin-bottom: 10px;'>Senha:</h2>
    <br><br><br>
    <input class='input_email' type='password' value='' name='txtsenha' placeholder='********' required>";

    if(isset($_GET['tipo'])){
        if($_GET['tipo'] == 'editar'){
            
            $id = $_GET['id'];
            
            $_SESSION['id'] = $id;
            
            $sql = "select tblusuarios.*, tblniveis.nome_nivel
                    from tblusuarios inner join tblniveis
                    on tblniveis.id_niveis = tblusuarios.nivel where tblusuarios.id_usuario=".$id;
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsEditar = mysqli_fetch_array($select)){
                $nome_completo = $rsEditar['nome'];
                $nome_usuario = $rsEditar['nome_usuario'];
                $email = $rsEditar['email'];
                $senha = $rsEditar['senha'];
                $codNivel = $rsEditar['nivel'];
                $nomeNivel = $rsEditar['nome_nivel'];
                
                $disabled = "disabled";
                
                $boxSenha = "<input id='check_senha' type='checkbox' value='1'> 
                <p style='margin: 0px; padding: 0px; float: left; margin-top: 5px;'>Deseja alterar a senha?</p>
                <br><br>
                <h2 style='color:black; font-weight: bold;margin-bottom: 10px;'>Senha atual:</h2>
                <br><br><br>
                <input class='input_email' id='antes' type='password' value='' name='txtsenhaatual' placeholder='********' disabled required>
                <br><br><br>
                <h2 style='color:black; font-weight: bold;margin-bottom: 10px;'>Nova senha:</h2>
                <br><br><br>
                <input class='input_email' id='nova' type='password' value='' name='txtnovasenha' placeholder='********' disabled required>";
                
                $button = "Salvar";
            }
            
            
        }
    }


    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'desativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            $sql = "update tblusuarios set status=0 where id_usuario=".$id;
            
            $select = mysqli_query($conexao, $sql);
        }
        
    }

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'ativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            $sql = "update tblusuarios set status=1 where id_usuario=".$id;
            
            $select = mysqli_query($conexao, $sql);
        }
        
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS - Sistema de Gerenciamento do Site
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="icon" href="imagens/settings.ico">
        <script src="../js/jquery.js"></script>
        <script src="../js/modulo.js"></script>
        
        
        <script>
            $(document).ready(function(){
                $('.visualizar').click(function(){
                    $('#container').fadeIn(1000);
                });
                $('#fechar').click(function(){
                    $('#container').fadeOut(1000);
                });
                
            });
            
            function visualizarDados(idItem){
                $.ajax({
                    type: "POST",
                    url: "modalUsers.php",
                    data: {modo:'visualizar',codigo:idItem},
                    success: function(dados){
                        $('#modalDados').html(dados);
                    }
                });
            }
            
            
        </script>
        
    </head>
    
    <body>
        
        <div id="container">
            <div id="modal">
                <div id="fechar" title="Fechar"></div>
                <div id="modalDados"></div>
            </div>
        </div> 
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



            <section id="section_users">
                <div class="conteudo center">
                    <a href="admusuarios_niveis.php" title="Voltar para página anterior"><div id="seta"></div></a>
                    <div id="titulo_users" class="center">
                        CADASTRAR USUÁRIOS
                    </div>

                    <div id="container_form_users" class="center">
                        <form id="form_users" name="frm_users" action="MODULOS/inserir.php" method="post">
                            <div id="container_cadastro_users" class="center">
                                <div id="box_nom_nivel">
                                    <h2 style="color:black; font-weight: bold;margin-bottom: 10px;">Nome completo:</h2>
                                    <input id="input_user_nome_completo" value="<?=$nome_completo?>" type="text" name="txtnomecompleto" placeholder=" Digite seu nome completo..." onkeypress="return validarEntrada(event,'numeric');" required>
                                </div>
                                <div id="box_nome_usuario">
                                    <h2 style="color:black; font-weight: bold;margin-bottom: 10px;">Nome de usuário:</h2>
                                    <input id="input_nome_usuario" value="<?=$nome_usuario?>" type="text" name="txtnomeusuario" placeholder=" Digite um nome de usuário..." required>
                                </div>
                                <div id="box_email">
                                    <h2 style="color:black; font-weight: bold;margin-bottom: 10px;">Email:</h2>
                                    <br><br><br>
                                    <input class="input_email" value="<?=$email?>" type="email" name="txtemail" placeholder=" Digite seu email..." required>
                                </div>
                                <div id="box_select_niveis">
                                    <select style="width: 400px; height : 40px;" name="slct_nivel" required>

                                        <?php

                                            if(isset($_GET['tipo']) == 'editar'){

                                        ?> 

                                        <option value="<?=$codNivel?>"><?=$nomeNivel?></option>

                                        <?php
                                            }else{

                                        ?>

                                        <option value="">
                                            Selecione um nível
                                        </option>

                                        <?php
                                            }
                                            $sql = "select * from tblniveis where id_niveis <>".$codNivel;

                                            $select = mysqli_query($conexao, $sql);

                                            while($rsNiveis = mysqli_fetch_array($select)){

                                        ?>

                                            <option value="<?=$rsNiveis['id_niveis']?>">
                                                <?=$rsNiveis['nome_nivel']?>
                                            </option>

                                        <?php

                                            }

                                        ?>

                                    </select>
                                </div>
                                <div id="box_senha">
                                    <?=$boxSenha?>
                                </div>
                                <input id="btnUsers" type="submit" name="btninserir" title="Inserir" value="<?=$button?>">
                            </div>
                        </form>
                    </div>  



                    <div id="crud_users" class="center">
                        <div class="container_listagem_users center">

                            <div class="crud_usuario">
                                <p class="crud_titulo">Usuário</p>
                            </div>

                            <div class="crud_nivel">
                                <p class="crud_titulo">Nível</p>
                            </div>

                            <div class="crud_editar">
                                <p class="crud_titulo">Editar</p>
                            </div>

                            <div class="crud_visualizar">
                                <p class="crud_titulo">Visualizar</p>
                            </div>

                            <div class="crud_excluir">
                                <p class="crud_titulo">Excluir</p>
                            </div>

                            <div class="crud_ativar_desativar">
                                <p class="crud_titulo">Ativar/ Desativar</p>
                            </div>

                        </div>

                        <?php
                            $sql = "select tblusuarios.*, tblniveis.nome_nivel
                                    from tblusuarios inner join tblniveis
                                    on tblniveis.id_niveis = tblusuarios.nivel";

                            $select = mysqli_query($conexao,$sql);

                            while($rsUsuarios = mysqli_fetch_array($select)){
                        ?>
                        <div class="container_listagem_users center">
                            <div class="crud_campo_usuario">
                                <?=$rsUsuarios['nome_usuario']?>
                            </div>
                            <div class="crud_campo_nivel">
                                <?=$rsUsuarios['nome_nivel']?>
                            </div>
                            <div class="crud_campo_editar">
                                <a href="admusuarios.php?tipo=editar&id=<?=$rsUsuarios['id_usuario']?>"><img class="img_crud" style="width: 70%; height: 70%;" alt="Editar" title="Editar" src="imagens/editar.png"></a>
                            </div>
                            <div class="crud_campo_visualizar">
                                <a href="#" class="visualizar" onclick="visualizarDados(<?=$rsUsuarios['id_usuario']?>);"><img class="img_crud" alt="Visualizar" title="Visualizar" src="imagens/visualizar.png"></a>
                            </div>
                            <div class="crud_campo_excluir">
                                <a onclick="return confirm('Deseja realmente excluir esse registro?');" href="MODULOS/deletar.php?tipo=excluir&id=<?=$rsUsuarios['id_usuario']?>"><img class="img_crud" alt="Excluir" title="Excluir" src="imagens/excluir.png"></a>
                            </div>

                            <div class="crud_campo_ativar_desativar">

                                <?php

                                    $status = $rsUsuarios['status'];

                                    if($status == 1){


                                ?>
                                    <a href="admusuarios.php?modo=desativar&codigo=<?=$rsUsuarios['id_usuario']?>"><img title="Desativar" alt="Desativar" class="ativar_desati" src="imagens/ativar.png"></a>
                                <?php        
                                    }
                                    else{
                                ?>

                                    <a href="admusuarios.php?modo=ativar&codigo=<?=$rsUsuarios['id_usuario']?>"><img title="Ativar" alt="Ativar" class="ativar_desati" src="imagens/desativar.png"></a>

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
        <script src="js/usuarios.js"></script>
    </body>
    
</html>

<?php

    if(isset($_SESSION['senha'])){
        if($_SESSION['senha'] == 1){
            
            echo("<script>alert('Senha atual não corresponde com a cadastrada!');</script>");
            
            unset($_SESSION['senha']);
            
        }
    }


?>


