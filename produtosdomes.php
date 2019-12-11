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
    
    <?=head("Produtos do Mês");?>
    
    <body>
    
        <?=cabecalho("produtosdomes.php");?>
    
        
        <section id="section_produtosdomes">
            
            <div style="padding-top: 50px; min-height: inherit; height: auto;background-color: rgba(0,0,0,0.0);
" class="conteudo center">
                <div id="titulo_mes" class="center"><h1 style="color: white;">PRODUTOS DO MÊS: SETEMBRO</h1></div>
                <div id="categorias_promocoes">
                    <nav style="min-height: inherit; height: auto;" id="menu_categorias">
                    <div id="caixa_categorias">
                        
                        <?=categorias("Morango");?>
                        
                        <?=categorias("Maracujá");?>
                        
                        <?=categorias("Detox");?>
                        
                        <?=categorias("Manga");?>
                        
                    </div>
                </nav>
                <div style="padding-left: 25px;padding-right: 0px;" id="produtos_promocoes">
                    
                    
                    <?=produtosMes("img/sucoMorango.jpg","Suco de Morango","Vitamina A, B, C e bla blabla","R$ 23,00 + brinde (1 caneca da loja)");?>
                    
                    <?=produtosMes("img/sucoMaracuja.jpg","Suco de Maracujá","Vitamina A, B, C e bla blabla","R$ 23,00 + brinde (1 caneca)");?>
                    
                    <?=produtosMes("img/sucoMaracuja.jpg","Suco de Maracujá","Vitamina A, B, C e bla blabla","R$ 23,00 + brinde (1 caneca)");?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
                </div>
            </div>
        
        </section>
        
        
        <?=$rodape?>
    </body>

</html>