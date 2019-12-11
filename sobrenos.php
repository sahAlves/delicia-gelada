<?php

    require_once('MODULOS/html.php');
    require_once('bd/conexao.php');


    $conexao = conexaoMysql();

    $sql = "select * from tblsobre_inicio";

    $select = mysqli_query($conexao,$sql);

    

?>

<!DOCTYPE html>
<html lang="pt-br">
    
    <?=head("Sobre Nós");?>
    
    <body>
        
        <?=cabecalho("sobrenos.php");?>
        
        <section id="section_sobrenos">
            <div id="sobre_nos" class="conteudo center">
                <h1 style="margin-left: 50px; color:white; font-size: 30px; margin-bottom:100px;">Sobre nós</h1>
                <?php
                    while($rsSobre = mysqli_fetch_array($select)){
                        if($rsSobre['status'] == 1){
                ?>
                <h1 style="color:white; text-align: center; font-size: 25px;margin-bottom:50px;"><?=$rsSobre['titulo']?></h1>
                
                <div id="texto_sobrenos" class="center" style="margin-bottom: 50px;"><p><?=$rsSobre['texto']?></p></div>
                <?php 
                        }
                    }        
                ?>    
            </div>
        </section>
        
        <section id="sobrenos_info">
            <div class="conteudo center" style="background-color: rgba(0,0,0,0.7);">
                <div class="center" style="padding-top: 160px;width: 1500px;min-height: 600px; height: auto; display: flex;flex-direction: row;flex-wrap: wrap;">
                <?php
                
                    $sql = "select * from tblsobre_cards";
                
                    $select = mysqli_query($conexao,$sql);
                
                    while($rsSobreCards = mysqli_fetch_array($select)){
                        if($rsSobreCards['status'] == 1){
                ?>
                
                
                <div class="caixas_sobrenos center">
                    <div class="img_sobrenos">
                        <img alt="valores" class="imagem_sobre" src="cms/MODULOS/arquivos/<?=$rsSobreCards['foto']?>">
                    </div>
                    <div class="descricao_sobrenos center"><h1><?=$rsSobreCards['titulo']?></h1></div>
                    <div class="detalhe_sobrenos center"><?=$rsSobreCards['descricao']?></div>
                </div>
                
                <?php
                        }
                    }
                
                ?>
                </div>
            
            </div>
        </section>
        
        <?=$rodape;?>
    </body>
</html>