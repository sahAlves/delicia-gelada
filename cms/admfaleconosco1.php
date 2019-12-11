<?php
    
    require_once('MODULOS/html.php');
    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();


        
        
    

?>

<html>
    <?=$headModal?>
    <body>
        
        <div id="container">
            <div id="modal">
                <div id="fechar" title="Fechar"></div>
                <div id="modalDados"></div>
            </div>
        </div> 
        
        <div id="container_all">
            <?=header_menu(1);?>

            <section id="section_faleconosco">
                <div class="conteudo center">
                    
                    
                    
                    <!-- TITULO -->
                    <div id="titulo_faleconosco" class="center">
                        <h1 style="color: white;">CONSULTA DO ENTRE EM CONTATO</h1>
                    </div>
                    
                    <!-- Filtro -->
                    
                    <div id="container_filtro">
                        
                        <p style="height: 30px; margin-bottom: 0px;float:left; font-size:30px; font-weight: bold; margin-right: 20px;">Filtro:</p> 
                        <form id="form" method="post">
                            <select name="filtro">
                                <option>
                                    Exibir todos
                                </option>
                                <option>
                                    Sugestões
                                </option>
                                <option>
                                    Críticas
                                </option>
                            </select>

                            <input id="input" type="submit" name="btnbuscar" value="Buscar">
                        </form>
                        
                    </div>

                    <!-- LISTAGEM -->

                    <div id="container_listagem" class="center">
                        <!--    Titulos     -->
                        <div id="container_titulos">
                            <div class="listagem_nomes float">
                                <h2 class="h2">NOME</h2>
                            </div>
                            <div class="listagem_celular float">
                                <h2 class="h2">CELULAR</h2>
                            </div>
                            <div class="listagem_email float">
                                <h2 class="h2">EMAIL</h2>
                            </div>
                            <div class="listagem_sexo float">
                                <h2 class="h2">SEXO</h2>
                            </div>
                            <div class="listagem_visualizar float">
                                <h2 class="h2" style="font-size: 27px;">Visualizar</h2>
                            </div>
                            <div class="listagem_excluir float">
                                <h2 class="h2">Excluir</h2>
                            </div>
                        </div>
                        <!-- Campos de exibição -->

                        <?php
                        if(isset($_POST['btnbuscar'])){
                            $filtro = $_POST['filtro'];
        
                        if($filtro == "Exibir todos"){
                           
        
                            $sql = "select * from tbldados";
                            $select = mysqli_query($conexao,$sql);


                            while($rsContatos = mysqli_fetch_array($select)){
                        ?>

                        <div class="container_campos">
                            <div class="listagem_nomes float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['nome']?>
                            </div>
                            <div class="listagem_celular float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['celular']?>
                            </div>
                            <div class="listagem_email float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['email']?>
                            </div>
                            <div class="listagem_sexo float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['sexo']?>
                            </div>
                            <div class="listagem_visualizar float" style="padding:0px; background-color:white;">
                                <a href="#" class="visualizar" onclick="visualizarDados(<?=$rsContatos['id']?>);"><img class="visualizar_excluir" alt="Visualizar" title="Visualizar" src="imagens/visualizar.png"></a>
                            </div>
                            <div class="listagem_excluir float" style="padding:0px; background-color:white;">
                                <a onclick="return confirm('Deseja realmente excluir esse registro?');" href="../bd/deletar.php?modo=excluir&id=<?=$rsContatos['id']?>"><img class="visualizar_excluir" alt="Excluir" title="Deseja Excluir?" src="imagens/excluir.png"></a>
                            </div>
                        </div>
                        <?php
                            }
                        }
                        elseif($filtro == "Sugestões"){
                            $sql = "select *from tbldados where sugestao_criticas='Sugestão';";
                            $select = mysqli_query($conexao,$sql);


                            while($rsContatos = mysqli_fetch_array($select)){
                        ?>
                        <div class="container_campos">
                            <div class="listagem_nomes float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['nome']?>
                            </div>
                            <div class="listagem_celular float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['celular']?>
                            </div>
                            <div class="listagem_email float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['email']?>
                            </div>
                            <div class="listagem_sexo float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['sexo']?>
                            </div>
                            <div class="listagem_visualizar float" style="padding:0px; background-color:white;">
                                <a href="#" class="visualizar" onclick="visualizarDados(<?=$rsContatos['id']?>);"><img class="visualizar_excluir" alt="Visualizar" title="Visualizar" src="imagens/visualizar.png"></a>
                            </div>
                            <div class="listagem_excluir float" style="padding:0px; background-color:white;">
                                <a onclick="return confirm('Deseja realmente excluir esse registro?');" href="../bd/deletar.php?modo=excluir&id=<?=$rsContatos['id']?>"><img class="visualizar_excluir" alt="Excluir" title="Deseja Excluir?" src="imagens/excluir.png"></a>
                            </div>
                        </div>    
                        <?php
                        }        
                    }
                    elseif($filtro == "Críticas"){
                        $sql = "select *from tbldados where sugestao_criticas='Crítica';";
                            $select = mysqli_query($conexao,$sql);


                            while($rsContatos = mysqli_fetch_array($select)){
                                
                        ?>        
                        <div class="container_campos">
                            <div class="listagem_nomes float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['nome']?>
                            </div>
                            <div class="listagem_celular float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['celular']?>
                            </div>
                            <div class="listagem_email float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['email']?>
                            </div>
                            <div class="listagem_sexo float" style="padding:12px; background-color:white;">
                                <?=$rsContatos['sexo']?>
                            </div>
                            <div class="listagem_visualizar float" style="padding:0px; background-color:white;">
                                <a href="#" class="visualizar" onclick="visualizarDados(<?=$rsContatos['id']?>);"><img class="visualizar_excluir" alt="Visualizar" title="Visualizar" src="imagens/visualizar.png"></a>
                            </div>
                            <div class="listagem_excluir float" style="padding:0px; background-color:white;">
                                <a onclick="return confirm('Deseja realmente excluir esse registro?');" href="../bd/deletar.php?modo=excluir&id=<?=$rsContatos['id']?>"><img class="visualizar_excluir" alt="Excluir" title="Deseja Excluir?" src="imagens/excluir.png"></a>
                            </div>
                        </div>            
                            <?php    
                            }
                    }
                }
                        ?>
    <!--                    <a href="./bd/deletar.php"-->
                    </div>

                </div>
            </section>
        
        
            <?=$footer?>
        </div>
    </body>
</html>