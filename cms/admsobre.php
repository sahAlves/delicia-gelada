<?php
    //Importação da conexão com o banco e da estrutura html
    require_once('MODULOS/html.php');
    require_once('../bd/conexao.php');


    //Iniciando variáveis de sessao
    if(!isset($_SESSION))
        session_start();


    //Declaração de variaveis
    $conexao = conexaoMysql();

    $admconteudo = (string) "";
    $admfaleconosco = (string) "";
    $admusuarios = (string) "";
    $btnCards = (string) "Inserir";
    $img = (string) "<img alt='Adicionar uma imagem' style='width:50%; height: 70%;margin-top: 20px;' src='imagens/addimg.png'>";
    $titulo = (string) "";
    $texto = (string) "";
    $modo = (string) "";
    $foto = (string) "";


    //Verificando qual menu o usuario tem acesso 
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

    
    //Verificando se a variavel modo existe
    if(isset($_GET['modo'])){
        //Se a variavel modo for igual a editar ele traz todas as informações do banco
        if($_GET['modo'] == 'editar'){
            
            $id = $_GET['codigo'];
            
            $_SESSION['id'] = $id;
            
            $sql1 = "select * from tblsobre_inicio where id_sobrei=".$id;
            
            $sql2 = "select * from tblsobre_cards where id_sobreds=".$id;
            
            $select1 = mysqli_query($conexao, $sql1);
            $select2 = mysqli_query($conexao, $sql2);
            
            if($rsEditar = mysqli_fetch_array($select1)){
                
                $titulo = $rsEditar['titulo'];
                $texto = $rsEditar['texto'];
                $modo = $rsEditar['modo'];
                $btnCards = "Editar";
                
                
            }
            
            if($rsEditar = mysqli_fetch_array($select2)){
                
                $titulo = $rsEditar['titulo'];
                $foto = $rsEditar['foto'];
                $texto = $rsEditar['descricao'];
                $modo = $rsEditar['modo'];
                $_SESSION['nomeFoto'] = $foto;
                $btnCards = "Editar";
                $img = "<img src='MODULOS/arquivos/".$foto."'>";
                
            }
            
            
        }
    }

    //Verificando se a variavel modo existe e se for igual a desativar, faz um update no banco 
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'desativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            if($_GET['tipo'] == 'Introdução'){
                $sql = "update tblsobre_inicio set status=0 where id_sobrei=".$id;
            
                $select = mysqli_query($conexao, $sql);
            }
            
            if($_GET['tipo'] == 'Cards'){
                $sql = "update tblsobre_cards set status=0 where id_sobreds=".$id;
            
                $select = mysqli_query($conexao, $sql);
            }
        }
        
    }

    //Verificando se a variavel modo existe e se for igual a ativar, faz um update no banco 
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'ativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            if($_GET['tipo'] == 'Introdução'){
                $sql = "update tblsobre_inicio set status=1 where id_sobrei=".$id;
            
                $select = mysqli_query($conexao, $sql);
            }
            
            if($_GET['tipo'] == 'Cards'){
                $sql = "update tblsobre_cards set status=1 where id_sobreds=".$id;
            
                $select = mysqli_query($conexao, $sql);
            }
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
        
        <script src="js/jquery.js"></script>
        <script src="js/jquery.form.js"></script>
        
        <!-- JQuery pra fazer o upload da imagem -->
        <script>
            $(document).ready(function(){
               
                /* Function para fazer o upload e o preview da imagem*/
                $('#fileFoto').live('change', function(){
                   
                    $('#form_cards').ajaxForm({
                        target:'#view_image' //Call back do upload.php
                    }).submit();
                    
                });
                
                
                
            });
            
            
        </script>
    </head>
    <body>
    
        <div id="container_all">
            <!-- CABEÇALHO -->
            <header>
                <div class="conteudo center">
                    <div id="titulo">
                        <h1 style="float: left;"><a href='home.php'>CMS</a></h1>
                        <h2>- Sistema de Gerenciamento do Site</h2>
                    </div>
                    <!-- logo -->
                    <a href="../index.php"><div id="logo" class="bkg" title="Delícia Gelada">

                    </div></a>
                </div>
            </header>
            
             <!-- section que contem os menus e a parte de login -->
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
            
            <!-- conteudo -->
            <section id="section_adm_sobre">
                <div class="conteudo center"> 
                    <a href="admconteudo.php" title="Voltar para página anterior"><div id="seta"></div></a>
                    
                    <div id="titulo_admconteudo" style="color: white; background-color: rgba(0,0,0,0.5); border-radius: 20px;" class="center">
                        CADASTRAR SOBRE NÓS
                    </div>
                    
                        
                        <div id="container_nos" class="center">
                            <form class="center" style="margin: 0px; margin-left: 30px; width: 500px; height: 480px;" name="frm_cards" method="post" action="MODULOS/inserir.php" enctype="multipart/form-data">
                                
                                
                                <div id="box_sobr" style="float: left; width: 200px; margin-right: 60px;">
                                    <h2 style="color: black; font-weight: bold; margin-bottom: 10px; float: none; ">Título:</h2>
                                    
                                    <input id="input_sobre" style="width: 200px;" type="text" name="txttitulo" value="<?=$titulo?>" placeholder=" Digite um título..." required>
                                </div>
                                <div id="view_image" style="float: left; width: 150px; height: 100px;">
                                    <label for="fileFoto">
                                        <?=$img?>
                                    </label>
                                </div>
                                
                                <select style="width: 250px; clear: both; margin:0px; margin-bottom: 50px;" name="slct_sobre" required>
                                    
                                    <?php
                                         //Verificando se a variavel modo existe e se é igual a editar
                                        if(isset($_GET['modo']) == 'editar'){
                                            //Se o modo for introdução, cadastra na tabela de introducao, senao, cards
                                            if($modo == "Introdução"){
                                                
                                    ?>            
                                                <option value="<?=$modo?>"><?=$modo?></option>
                                                <option value="">Selecione uma opção</option>
                                                <option value="Cards">Referências</option>
                                    
                                    <?php
                                            }
                                            if($modo == "Cards"){
                                    ?>            
                                                <option value="<?=$modo?>"><?=$modo?></option>
                                                <option value="">Selecione uma opção</option>
                                                <option value="Introdução">Introdução</option>
                                    <?php
                                            }
                                        }else{
                                    
                                    ?>
                                    
                                    
                                    <option value="">Selecione uma opção</option>
                                    <option value="Introdução">Introdução</option>
                                    <option value="Cards">Referências</option>
                                    
                                    <?php
                                        }
                                    ?>
                                </select>
                                    
                                    <h2 style="color: black; font-weight: bold; margin-bottom: 10px; float: none; clear: both; ">Texto:</h2>
                                
                                    <textarea style="width: 400px; height: 170px;font-size: 18px; margin-bottom: 30px;" placeholder=" Digite aqui..." name="txttexto" required><?=$texto?></textarea>
                            
                                
                                    <input style="width: 100px; height: 40px; font-weight: bold; font-size: 18px; border: solid 2px black; border-radius: 10px; margin-left: 300px;" type="submit" value="<?=$btnCards?>" name="btnInsert">
                            </form>
                            <form style="margin: 0px; margin-left: 0px; width: 100px; height: 10px;" id="form_cards" method="post" action="MODULOS/upload.php" enctype="multipart/form-data"><input style="display: none;" type="file" id="fileFoto" name="fle_foto"></form>
                        </div>
                
                    
   
                    <div id="crud_curious" class="center">
                        <div class="container_crud_curious center">
                        
                            <div class="crud_foto">Foto</div>
                            <div class="crud_titulo_curious">Título</div>
                            <div class="crud_texto">Texto</div>
                            <div class="crud_direcao">Modo</div>
                            <div class="crud_editar_conteudo">Editar</div>
                            <div class="crud_excluir_conteudo">Excluir</div>
                            <div class="crud_status">Ativar/ Desativar</div>
                            
                        </div>
                        
                        <?php
                            //Fazendo select no banco pra trazer todas as introduções cadastradas
                        
                            $sql = "select * from tblsobre_inicio";
                            
                            $select = mysqli_query($conexao, $sql);
                            
                            while($rsSobreNos = mysqli_fetch_array($select)){
                                
                                
                        
                        ?>
                        
                        <div class="container_crud_curious center">
                            <div class="crud_foto format" style="padding-top: 5px;background-color: white;"><img class="crud_img" alt="<?=$rsSobreNos['titulo']?>" title="<?=$rsSobreNos['titulo']?>" style="width: 60%;" src="imagens/image.png"></div>
                            
                            <div class="crud_titulo_curious format" style="background-color: white;"><?=$rsSobreNos['titulo']?></div>
                            
                            <div class="crud_texto format" style="background-color: white;"><?=$rsSobreNos['texto']?></div>
                            
                            <div class="crud_direcao format" style="background-color: white;"><?=$rsSobreNos['modo']?></div>
                            
                            <div class="crud_editar_conteudo" style="background-color: white;"><a href="admsobre.php?modo=editar&codigo=<?=$rsSobreNos['id_sobrei']?>"><img class="crud_img_op" alt="Editar" title="Editar" src="imagens/editar.png"></a></div>
                            
                            <div class="crud_excluir_conteudo" style="background-color: white;"><a onclick="return confirm('Deseja realmente excluir esse registro?');" href="MODULOS/deletar.php?modo=delete&codigo=<?=$rsSobreNos['id_sobrei']?>&tipo=<?=$rsSobreNos['modo']?>"><img class="crud_img_op" alt="Excluir" title="Excluir" src="imagens/excluir.png"></a></div>
                            
                            <?php
                                //Se o status for igual a 1, está ativado, senão, desativado
                                if($rsSobreNos['status'] == 1){
                                    
                                
                            
                            ?>
                            
                            <div class="crud_status" style="padding-top: 25px;background-color: white;"><a href="admsobre.php?modo=desativar&codigo=<?=$rsSobreNos['id_sobrei']?>&tipo=<?=$rsSobreNos['modo']?>"><img title="Desativar" alt="Desativar" class="crud_img_op" src="imagens/ativar.png"></a></div>
                            
                            <?php
                            
                                }
                                if($rsSobreNos['status'] == 0){
                                    
                                
                            
                            ?>
                            
                            <div class="crud_status" style="padding-top: 25px;background-color: white;"><a href="admsobre.php?modo=ativar&codigo=<?=$rsSobreNos['id_sobrei']?>&tipo=<?=$rsSobreNos['modo']?>"><img title="Ativar" alt="Ativar" class="crud_img_op" src="imagens/desativar.png"></a></div>
                            <?php
                                
                                    
                                }
                            
                            ?>
                            
                        </div>
                        
                        <?php
                        
                        }//Fazendo select no banco pra trazer todas os cards cadastradas
                        
                            $sql = "select * from tblsobre_cards";
                            
                            $select = mysqli_query($conexao, $sql);
                            
                            while($rsSobreNos = mysqli_fetch_array($select)){
                                
                                
                        
                        ?>
                        
                        <div class="container_crud_curious center">
                            <div class="crud_foto format" style="padding-top: 5px;background-color: white;"><img class="crud_img" style="width: 60%;" alt="<?=$rsSobreNos['titulo']?>" title="<?=$rsSobreNos['titulo']?>" src="MODULOS/arquivos/<?=$rsSobreNos['foto']?>"></div>
                            
                            <div class="crud_titulo_curious format" style="background-color: white;"><?=$rsSobreNos['titulo']?></div>
                            
                            <div class="crud_texto format" style="background-color: white;"><?=$rsSobreNos['descricao']?></div>
                            
                            <div class="crud_direcao format" style="background-color: white;"><?=$rsSobreNos['modo']?></div>
                            
                            <div class="crud_editar_conteudo" style="background-color: white;"><a href="admsobre.php?modo=editar&codigo=<?=$rsSobreNos['id_sobreds']?>"><img class="crud_img_op" title="Editar" alt="Editar" src="imagens/editar.png"></a></div>
                            
                            <div class="crud_excluir_conteudo" style="background-color: white;"><a onclick="return confirm('Deseja realmente excluir esse registro?');" href="MODULOS/deletar.php?modo=delete&codigo=<?=$rsSobreNos['id_sobreds']?>&foto=<?=$rsSobreNos['foto']?>&tipo=<?=$rsSobreNos['modo']?>"><img class="crud_img_op" title="Excluir" alt="Excluir" src="imagens/excluir.png"></a></div>
                            
                            <?php
                                //Se o status for igual a 1, está ativado, senão, desativado
                            
                                if($rsSobreNos['status'] == 1){
                                    
                                
                            
                            ?>
                            
                            <div class="crud_status" style="padding-top: 25px;background-color: white;"><a href="admsobre.php?modo=desativar&codigo=<?=$rsSobreNos['id_sobreds']?>&tipo=<?=$rsSobreNos['modo']?>"><img title="Desativar" alt="Desativar" class="crud_img_op" src="imagens/ativar.png"></a></div>
                            
                            <?php
                            
                                }
                                if($rsSobreNos['status'] == 0){
                                    
                                
                            
                            ?>
                            
                            <div class="crud_status" style="padding-top: 25px;background-color: white;"><a href="admsobre.php?modo=ativar&codigo=<?=$rsSobreNos['id_sobreds']?>&tipo=<?=$rsSobreNos['modo']?>"><img title="Ativar" alt="Ativar" class="crud_img_op" src="imagens/desativar.png"></a></div>
                            <?php
                                
                                    
                                }
                            
                            ?>
                            
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