<?php

    if(isset($_POST['modo'])){
        if(strtoupper($_POST['modo']) == "VISUALIZAR"){
            
            $codigo = $_POST['codigo'];
            
            require_once('../bd/conexao.php');
            
            $conexao = conexaoMysql();
            
            $sql = "select tblusuarios.*,tblniveis.nome_nivel from tblusuarios inner join tblniveis
                    on tblniveis.id_niveis = tblusuarios.nivel where tblusuarios.id_usuario=".$codigo;
            
            $select = mysqli_query($conexao, $sql);
            
            if($rsVisualizar = mysqli_fetch_array($select)){
                $nomeCompleto = $rsVisualizar['nome'];
                $nomeUsuario = $rsVisualizar['nome_usuario'];
                $email = $rsVisualizar['email'];
                $nivel = $rsVisualizar['nome_nivel'];
                
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
                    <?=$nomeCompleto?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Nome de Usuário:</p>
                <div class="campos_modal">
                    <?=$nomeUsuario?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Email:</p>
                <div class="campos_modal">
                    <?=$email?>
                </div>
            </div>
            
            <div class="box_dados">
                <p class="titulo_modal">Nível:</p>
                <div class="campos_modal">
                    <?=$nivel?>
                </div>
            </div>
            
            
            
        </div>
    </body>
</html>