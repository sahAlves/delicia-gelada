<?php

    require_once('MODULOS/html.php');



    $usuario = "sabrina";
    $senha = "123";

    if(isset($_POST['btnok'])){
        $usu = $_POST['txtusuario'];
        $pass = $_POST['txtsenha'];
        
        if($usu == $usuario && $pass == $senha){
            header('location:cms/home.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    
    <?=head("Promoções");?>
    
    <body>
        
        <?=cabecalho("promocoes.php");?>
        
        <section id="section_promocoes">
            <div style="padding-top: 50px; min-height: inherit; height: auto;" class="conteudo center">
                <div id="titulo_promocoes" class="center"><h1 style="color:white;">PROMOÇÕES IMPERDÍVEIS! APROVEITE!</h1></div>
                <div id="categorias_promocoes">
                    <nav style="min-height: inherit; height: auto;" id="menu_categorias">
                    <div id="caixa_categorias">
                        
                        <?=categorias("Morango");?>
                        
                        <?=categorias("Maracujá");?>
                        
                        <?=categorias("Detox");?>
                        
                        <?=categorias("Manga");?>
                        
                    </div>
                </nav>
                <div id="produtos_promocoes">
                    
                    <?=produtos_promocoes("img/sucoMorango.jpg","Suco de Morango","Vitaminas A","R$20,00","R$2,00");?>
                    
                    <?=produtos_promocoes("img/sucoMorango.jpg","Suco de Morango","Vitaminas A","R$20,00","R$2,00");?>
                    <?=produtos_promocoes("img/sucoMorango.jpg","Suco de Morango","Vitaminas A","R$20,00","R$2,00");?>
                    <?=produtos_promocoes("img/sucoMorango.jpg","Suco de Morango","Vitaminas A","R$20,00","R$2,00");?>
                    <?=produtos_promocoes("img/sucoMorango.jpg","Suco de Morango","Vitaminas A","R$20,00","R$2,00");?>
                    
                </div>
                </div>
            </div>
        </section>
        
        
        
        <?=$rodape;?>
    </body>
</htmL>