<?php
    //Head
    $head = "<head>
        <title>
            CMS - Sistema Interno
        </title>
        <meta charset='utf-8'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <link rel='icon' href='imagens/settings.ico'> 
    </head>";

    //Head que contém a modal
    $headModal = "<head>
        <title>
            CMS - Sistema Interno
        </title>
        <meta charset='utf-8'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <link rel='icon' href='imagens/settings.ico'>
        <script src='../js/jquery.js'></script>
        <script src='../js/modulo.js'></script>
        
        <script>
            $(document).ready(function(){
                $('.visualizar').click(function(){
                    $('#container').fadeIn(1000);
                });
                $('#fechar').click(function(){
                    $('#container').fadeOut(1000);
                });
                
            });
            
            function visualizarDados(idItem){
                $.ajax({
                    type: 'POST',
                    url: 'modal.php',
                    data: {modo:'visualizar',codigo:idItem},
                    success: function(dados){
                        $('#modalDados').html(dados);
                    }
                });
            }
        </script>
        
    </head>";
    
    
    //section da home
    $conteudo_home = "<section id='section_conteudo'>
            <div class='conteudo center'>
                <h2 style='margin-bottom: 50px; float: none; font-size: 50px;'>Bem vindo(a) ao Sistema de Gerenciamento do Site!</h2>
                <p>Aqui você pode administrar o que for necessário para seu site ficar perfeito.</p>
            </div>
        </section>";





    //Rodape
    $footer = "<footer>
            <div class='conteudo center'>
                <p>Desenvolvido por Sabrina Souza Alves da Silva</p>
            </div>
        </footer>";

?>