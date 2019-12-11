<?php

    if(isset($_POST['modo'])){
        if(strtoupper($_POST['modo']) == "VISUALIZAR"){
            
            $codigo = $_POST['codigo'];
            
            require_once('../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $sql = "select * from tbldados where id=".$codigo;
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsVisualizar = mysqli_fetch_array($select)){
                $nome = $rsVisualizar['nome'];
                $telefone = $rsVisualizar['telefone'];
                $celular = $rsVisualizar['celular'];
                $dt_nasc = explode("-",$rsVisualizar['dt_nasc']);
                $dt_nasc = $dt_nasc[2]."/".$dt_nasc[1]."/".$dt_nasc[0];
                $sexo = $rsVisualizar['sexo'];
                $profissao = $rsVisualizar['profissao'];
                $email = $rsVisualizar['email'];
                $home_page = $rsVisualizar['home_page'];
                $link_facebook = $rsVisualizar['link_facebook'];
                $sugestao_criticas = $rsVisualizar['sugestao_criticas'];
                $mensagem = $rsVisualizar['mensagem'];
                
            }
            
        }
    }

?>

<html>
    <head>
        <title>
            Visualização
        </title>
    </head>
    <body>
        
        <div id="container_dados_modal">
            
            <div class="box_dados">
                <p class="titulo_modal">Nome:</p>
                <div class="campos_modal">
                    <?=$nome?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Telefone:</p>
                <div class="campos_modal">
                    <?=$telefone?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Celular:</p>
                <div class="campos_modal">
                    <?=$celular?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Data de Nascimento:</p>
                <div class="campos_modal">
                    <?=$dt_nasc?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Sexo:</p>
                <div class="campos_modal">
                    <?=$sexo?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Profissão:</p>
                <div class="campos_modal">
                    <?=$profissao?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Email:</p>
                <div class="campos_modal">
                    <?=$email?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Home Page:</p>
                <div class="campos_modal">
                    <?=$home_page?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Link no Facebook:</p>
                <div class="campos_modal">
                    <?=$link_facebook?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Sugestão/Crítica:</p>
                <div class="campos_modal">
                    <?=$sugestao_criticas?>
                </div>
            </div>
            
            <div class="box_dados" style="width: 800px; height: 170px; padding-top: 0px;">
                <p class="titulo_modal">Mensagem:</p>
                <div id="campos_modal_mensagem">
                    <?=$mensagem?>
                </div>
            </div>
            
        </div>
    </body>
</html>