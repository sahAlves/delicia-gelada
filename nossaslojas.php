<?php

    require_once('MODULOS/html.php');
    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

    $sql = "select * from tbl_lojas";

    $select = mysqli_query($conexao,$sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

    <?=head("Nossas Lojas");?>

    <body>
        <?=cabecalho("nossaslojas.php");?>
        
        <section id="section_nossaslojas">
            <div style="padding-top: 40px;padding-bottom:50px;;padding-left: 80px;min-height: inherit; height: auto;" class="conteudo center">
                <h1 id="titulo_lojas">NOSSAS LOJAS</h1>
                
                
                <?php
                
                    while($rsLojas = mysqli_fetch_array($select)){
                        
                        if($rsLojas['status'] == 1)                                                                        echo(lojas("cms/MODULOS/arquivos/".$rsLojas['foto'],$rsLojas['nome_loja'],$rsLojas['endereco'],$rsLojas['telefone'],$rsLojas['horario_funcionamento']));
                        
                    }
                ?>
                
            </div>
        </section>
        
        
        <?=$rodape?>
    </body>   
</html>