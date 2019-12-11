<?php
    
    //Importação da conexao com o banco e estruturas de html
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
    $btn = (string) "Inserir";
    $direcao = (string) "";
    $titulo = (string) "";
    $texto = (string) "";
    $foto = (string) "";
    $img = (string) "<img alt='Adicionar uma imagem' style='width:50%; height: 70%;margin-top: 25px;' src='imagens/addimg.png'>";


    //Verificando qual menu o usuário tem acesso
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
            
            $sql = "select * from tblcuriosidades where id_curious=".$id;
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsEditar = mysqli_fetch_array($select)){
                
                $titulo = $rsEditar['titulo'];
                $foto = $rsEditar['foto'];
                $texto = $rsEditar['texto'];
                $direcao = $rsEditar['left_right'];
                $_SESSION['nomeFoto'] = $foto;
                
                $btn = "Editar";
                $img = "<img src='MODULOS/arquivos/".$foto."'>";
                
                
            }
            
            
        }
    }

    //Verificando se a variavel modo existe e se for igual a desativar, faz um update no banco 
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'desativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            $sql = "update tblcuriosidades set status=0 where id_curious=".$id;
            
            $select = mysqli_query($conexao, $sql);
        }
        
    }

    //Verificando se a variavel modo existe e se for igual a ativar, faz um update no banco 
    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'ativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            $sql = "update tblcuriosidades set status=1 where id_curious=".$id;
            
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
        
        <script src="js/jquery.js"></script>
        <script src="js/jquery.form.js"></script>
        
        <!-- JQuery pra fazer o upload da imagem -->
        <script>
            $(document).ready(function(){
               
                /* Function para fazer o upload e o preview da imagem*/
                $('#fileFoto').live('change', function(){
                   
                    $('#formFoto').ajaxForm({
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
            <section id="section_adm_curiosidades">
                <div class="conteudo center"> 
                    <a href="admconteudo.php" title="Voltar para página anterior"><div id="seta"></div></a>

                    <div id="titulo_admconteudo" style="color: white; background-color: rgba(0,0,0,0.5); border-radius: 20px;" class="center">
                        CADASTRAR CURIOSIDADES
                    </div>

                    <div id="container_form_curious" class="center">
                        <form id="form_curious" name="frm_curious" action="MODULOS/inserir.php" method="post" enctype="multipart/form-data">

                            <div id="box_titulo_curious" class="center">
                                <h2 style="color: black; font-weight: bold;">Título:</h2>
                                <br><br><br>
                                <input class="input_curious" type="text" name="txttitulo" value="<?=$titulo?>" placeholder=" Digite um título..." required>
                            </div>

                            <div id="box_upload_curious" class="center">

                                <div id="box_image">
                                    <div id="view_image" title="Clique para selecionar uma imagem...">
                                    <label for="fileFoto"><?=$img?></label></div> 
                                </div>

                                <select name="slct_curious" id="select_curious" required>
                                    
                                    <?php
                                        //Verificando se a variavel modo existe e se é igual a editar
                                        if(isset($_GET['modo']) == 'editar'){
                                            
                                            //Se a direcao for direita, manda a estrutura pra direita, senao, esquerda
                                            if($direcao == "Direita"){
                                    ?>
                                    
                                        
                                    <option value="<?=$direcao?>"><?=$direcao?></option>
                                    <option value="">Selecione uma direção</option>
                                    <option value="Esquerda">Esquerda</option>
                                    
                                    <?php
                                            }elseif($direcao == "Esquerda"){
                                    ?>
                                    <option value="<?=$direcao?>"><?=$direcao?></option>
                                    <option value="">Selecione uma direção</option>
                                    <option value="Direita">Direita</option>
                                    <?php
                                            }
                                        }else{

                                     ?>
                                    
                                    <option value="">Selecione uma direção</option>
                                    <option value="Esquerda">Esquerda</option>
                                    <option value="Direita">Direita</option>
                                    
                                    <?php
                                        }
                                    ?>
                                    
                                    
                                </select>
                                
                            </div>

                            <div id="box_texto_curious" class="center">
                                
                                <h2 style="color: black; font-weight: bold;">Conteúdo:</h2>
                                <br><br><br>   
                                <textarea name="txt_content" cols="30" rows="10" placeholder="  Digite aqui..." required><?=$texto?></textarea>


                            </div>

                            <input id="btn_curious" type="submit" value="<?=$btn?>" name="btnInse">
                                    

                        </form>
                        <form id="formFoto" style="margin: 0px; width: 400px;" name="frmfoto" method="post" action="MODULOS/upload.php" enctype="multipart/form-data"><input style="display: none;" id="fileFoto" type="file" name="fle_foto" ></form>
                    </div>
                    
                    
                    <div id="crud_curious" class="center">
                        <div class="container_crud_curious center">
                        
                            <div class="crud_foto">Foto</div>
                            <div class="crud_titulo_curious">Título</div>
                            <div class="crud_texto">Texto</div>
                            <div class="crud_direcao">Direção</div>
                            <div class="crud_editar_conteudo">Editar</div>
                            <div class="crud_excluir_conteudo">Excluir</div>
                            <div class="crud_status">Ativar/ Desativar</div>
                            
                        </div>
                        
                        <?php
                            //Fazendo select no banco pra trazer todas as curiosidades cadastradas
                            $sql = "select * from tblcuriosidades";
                            
                            $select = mysqli_query($conexao, $sql);
                            
                            while($rsCuriosidades = mysqli_fetch_array($select)){
                                
                                
                        
                        ?>
                        
                        <div class="container_crud_curious center">
                            <div class="crud_foto format" style="padding-top: 5px;background-color: white;"><img class="crud_img" alt="<?=$rsCuriosidades['titulo']?>" title="<?=$rsCuriosidades['titulo']?>" src="MODULOS/arquivos/<?=$rsCuriosidades['foto']?>"></div>
                            
                            <div class="crud_titulo_curious format" style="background-color: white;"><?=$rsCuriosidades['titulo']?></div>
                            
                            <div class="crud_texto format" style="background-color: white;"><?=$rsCuriosidades['texto']?></div>
                            
                            <div class="crud_direcao format" style="background-color: white;"><?=$rsCuriosidades['left_right']?></div>
                            
                            <div class="crud_editar_conteudo" style="background-color: white;"><a href="admcuriosidades.php?modo=editar&codigo=<?=$rsCuriosidades['id_curious']?>"><img class="crud_img_op" alt="Editar" title="Editar" src="imagens/editar.png"></a></div>
                            
                            <div class="crud_excluir_conteudo" style="background-color: white;"><a onclick="return confirm('Deseja realmente excluir esse registro?');" href="MODULOS/deletar.php?modo=deletar&codigo=<?=$rsCuriosidades['id_curious']?>&foto=<?=$rsCuriosidades['foto']?>"><img class="crud_img_op" alt="Excluir" title="Excluir" src="imagens/excluir.png"></a></div>
                            
                            <?php
                                //Se o status for igual a 1, está ativado, senão, desativado
                                if($rsCuriosidades['status'] == 1){
                                    
                                
                            
                            ?>
                            
                            <div class="crud_status" style="padding-top: 25px;background-color: white;"><a href="admcuriosidades.php?modo=desativar&codigo=<?=$rsCuriosidades['id_curious']?>"><img title="Desativar" alt="Desativar" class="crud_img_op" src="imagens/ativar.png"></a></div>
                            
                            <?php
                            
                                }
                                if($rsCuriosidades['status'] == 0){
                                    
                                
                            
                            ?>
                            
                            <div class="crud_status" style="padding-top: 25px;background-color: white;"><a href="admcuriosidades.php?modo=ativar&codigo=<?=$rsCuriosidades['id_curious']?>"><img title="Ativar" alt="Ativar" class="crud_img_op" src="imagens/desativar.png"></a></div>
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
            
            
            <!-- rodape -->
            <?=$footer?>
            
        </div>
    </body>
</html>