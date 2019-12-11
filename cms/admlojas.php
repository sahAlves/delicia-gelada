<?php
    
    require_once('MODULOS/html.php');
    require_once('../bd/conexao.php');

    if(!isset($_SESSION))
        session_start();



    $conexao = conexaoMysql();

    $admconteudo = (string) "";
    $admfaleconosco = (string) "";
    $admusuarios = (string) "";
    $btn = (string) "Inserir";
    $img = (string) "<img alt='Adicionar uma imagem' style='width:50%; height: 70%;margin-top: 45px;' src='imagens/addimg.png'>";
    $nome = (string) "";
    $endereco = (string) "";
    $telefone = (string) "";
    $hr_funcionamento = (string) "";
    $foto = (string) "";
     

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


    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'editar'){
            
            $id = $_GET['codigo'];
            
            $_SESSION['id'] = $id;
            
            $sql = "select * from tbl_lojas where id_lojas=".$id;
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsEditar = mysqli_fetch_array($select)){
                
                $foto = $rsEditar['foto'];
                $nome = $rsEditar['nome_loja'];
                $endereco = $rsEditar['endereco'];
                $telefone = $rsEditar['telefone'];
                $hr_funcionamento = $rsEditar['horario_funcionamento'];
                $_SESSION['nomeFoto'] = $foto;
                
                $btn = "Editar";
                $img = "<img src='MODULOS/arquivos/".$foto."'>";
                
                
            }
            
        }
    }







    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'desativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            $sql = "update tbl_lojas set status=0 where id_lojas=".$id;
            
            $select = mysqli_query($conexao, $sql);
        }
        
    }

    if(isset($_GET['modo'])){
        if($_GET['modo'] == 'ativar'){
            $id = $_GET['codigo'];
            
            $_SESSION['codigo'] = $id;
            
            $sql = "update tbl_lojas set status=1 where id_lojas=".$id;
            
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
        <script src="js/usuarios.js"></script>
        
        
        <script>
            $(document).ready(function(){
               
                /* Function para fazer o upload e o preview da imagem*/
                $('#fleFoto').live('change', function(){
                   
                    $('#form_lojas').ajaxForm({
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
           
            <section id="section_adm_lojas">
                <div class="conteudo center"> 
                    <a href="admconteudo.php" title="Voltar para página anterior"><div id="seta"></div></a>
                    
                    
                    <div id="titulo_admconteudo" style="color: white; background-color: rgba(0,0,0,0.5); border-radius: 20px;" class="center">
                        CADASTRAR NOSSAS LOJAS
                    </div>
                    
                    
                    <div id="container_cadastro_lojas" class="center">
                        <div class="box_lojas">
                            <div id="view_image" style="width: 400px; height: 300px;">
                                <label for="fleFoto">
                            
                                    <?=$img?>
                            
                                </label>
                            </div>    
                            
                            <form id="form_lojas" style="height:40px;" method="post" action="MODULOS/upload.php" enctype="multipart/form-data"><input class="inputs_lojas" type="file" name="fle_foto" id="fleFoto" required></form>
                        
                        </div>
                        <div class="box_lojas">
                            
                            <form id="form_loja" name="frm_lojas" method="post" action="MODULOS/inserir.php">
                            
                                <div class="box_crud_lojas">
                                <h2 style="color: black; margin: 0px; float: none; margin-bottom: 10px;">Nome da Loja:</h2>
                                <input class="inputs_lojas" type="text" name="txtnomeloja" value="<?=$nome?>" onkeypress="return validarEntrada(event, 'numeric');" placeholder=" Digite o nome da loja..." required>
                            </div>
                            
                            <div class="box_crud_lojas">
                                <h2 style="color: black; margin: 0px; float: none; margin-bottom: 10px;">Endereço:</h2>
                                <input class="inputs_lojas" type="text" name="txtendereco" value="<?=$endereco?>" placeholder=" Digite o endereço da loja..." required>
                            </div>
                            
                            <div class="box_crud_lojas">
                                <h2 style="color: black; margin: 0px; float: none; margin-bottom: 10px;">Telefone:</h2>
                                <input class="inputs_lojas" type="text" id="tel" name="txttelefone" value="<?=$telefone?>" onkeypress="return mascaraFone(this, event);" placeholder=" Digite o telefone da loja..." required>
                            </div>
                            
                            <div class="box_crud_lojas">
                                <h2 style="color: black; margin: 0px; float: none; margin-bottom: 10px;">Horário de Funcionamento:</h2>
                                <input class="inputs_lojas" type="text" name="txthorariofuncionamento" value="<?=$hr_funcionamento?>" placeholder=" Digite o horário de funcionamento da loja..." required>
                            </div>
                            
                            <input type="submit" name="btnLojas" value="<?=$btn?>" id="btnLojas">
                                
                            </form>
                            
                            
                        </div>
                    </div>
                    
                    
                    
                    <div id="crud_curious" class="center">
                        <div class="container_crud_curious center">
                        
                            <div class="crud_foto">Foto</div>
                            <div class="crud_titulo_curious">Nome</div>
                            <div class="crud_texto" style="padding-top: 15px;">Endereço/ Horário de Funcionamento</div>
                            <div class="crud_direcao">Telefone</div>
                            <div class="crud_editar_conteudo">Editar</div>
                            <div class="crud_excluir_conteudo">Excluir</div>
                            <div class="crud_status">Ativar/ Desativar</div>
                            
                        </div>
                        
                        <?php
                        
                            $sql = "select * from tbl_lojas";
                            
                            $select = mysqli_query($conexao, $sql);
                            
                            while($rsLojas = mysqli_fetch_array($select)){
                                
                                
                        
                        ?>
                        
                        <div class="container_crud_curious center">
                            <div class="crud_foto format" style="padding-top: 5px;background-color: white;"><img style="width: 50%;" alt="<?=$rsLojas['nome_loja']?>" title="<?=$rsLojas['nome_loja']?>" class="crud_img" src="MODULOS/arquivos/<?=$rsLojas['foto']?>"></div>
                            
                            <div class="crud_titulo_curious format" style="background-color: white;"><?=$rsLojas['nome_loja']?></div>
                            
                            <div class="crud_texto format" style="background-color: white;"><?=$rsLojas['endereco']?> / <?=$rsLojas['horario_funcionamento']?></div>
                            
                            <div class="crud_direcao format" style="background-color: white; font-size: 18px;"><?=$rsLojas['telefone']?></div>
                            
                            <div class="crud_editar_conteudo" style="background-color: white;"><a href="admlojas.php?modo=editar&codigo=<?=$rsLojas['id_lojas']?>"><img class="crud_img_op" alt="Editar" title="Editar" src="imagens/editar.png"></a></div>
                            
                            <div class="crud_excluir_conteudo" style="background-color: white;"><a onclick="return confirm('Deseja realmente excluir esse registro?');" href="MODULOS/deletar.php?modo=delet&codigo=<?=$rsLojas['id_lojas']?>&foto=<?=$rsLojas['foto']?>"><img class="crud_img_op" alt="Excluir" title="Excluir" src="imagens/excluir.png"></a></div>
                            
                            <?php
                            
                                if($rsLojas['status'] == 1){
                                    
                                
                            
                            ?>
                            
                            <div class="crud_status" style="padding-top: 25px;background-color: white;"><a href="admlojas.php?modo=desativar&codigo=<?=$rsLojas['id_lojas']?>"><img title="Desativar" alt="Desativar" class="crud_img_op" src="imagens/ativar.png"></a></div>
                            
                            <?php
                            
                                }
                                if($rsLojas['status'] == 0){
                                    
                                
                            
                            ?>
                            
                            <div class="crud_status" style="padding-top: 25px;background-color: white;"><a href="admlojas.php?modo=ativar&codigo=<?=$rsLojas['id_lojas']?>"><img title="Ativar" alt="Ativar" class="crud_img_op" src="imagens/desativar.png"></a></div>
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