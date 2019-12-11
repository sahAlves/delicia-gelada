<?php

    require_once('MODULOS/html.php');
    require_once('bd/conexao.php');

    $conexao = conexaoMysql();


?>

<!DOCTYPE html>
<html lang="pt-br">
    <?=head("Curiosidades");?>
    <body>
        <?=cabecalho("curiosidades.php");?>
        
        <section id="section_curiosidades">
        
            <div id="curiosidades" class="conteudo center">
                <div id="titulo_curiosidades" class="center">
                    <h1 style="color: white;">CURIOSIDADES: Conheça os benefícios das frutas que você come!</h1>
                </div>
                
                <?php
                    
                    $sql = "select * from tblcuriosidades";
                
                    $select = mysqli_query($conexao, $sql);
                
                    while($rsCuriosidades = mysqli_fetch_array($select)){
                        if($rsCuriosidades['left_right'] == "Esquerda" && $rsCuriosidades['status'] == 1){
                            
                            $nomeFoto = $rsCuriosidades['foto'];
                            $_SESSION['nomeFoto'] = $nomeFoto;
                            echo(curiosidades_left($rsCuriosidades['titulo'],"cms/MODULOS/arquivos/$nomeFoto",$rsCuriosidades['texto']));
                        }
                        elseif($rsCuriosidades['left_right'] == "Direita" && $rsCuriosidades['status'] == 1){
                            
                            $nomeFoto = $rsCuriosidades['foto'];
                            $_SESSION['nomeFoto'] = $nomeFoto;
                            echo(curiosidades_right($rsCuriosidades['titulo'],"cms/MODULOS/arquivos/$nomeFoto",$rsCuriosidades['texto']));
                        }
                    }
                
                ?>
                
                
                
            </div>
        
        </section>
        
        <?=$rodape;?>
    </body>
</html>