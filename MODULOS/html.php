<?php

    function head($title){
        $title;
        
        $h = "<head>
        <title>
            ".$title."
        </title>
        <meta charset='utf-8'>
        <link rel='stylesheet' type='text/css' href='css/style.css'>
        <link rel='icon' href='img/icon.ico'>
        
        <!-- style do slide -->
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 053 css*/
        .jssorb053 .i {position:absolute;cursor:pointer;}
        .jssorb053 .i .b {fill:#abb1ba;fill-opacity:0.5;}
        .jssorb053 .i:hover .b {fill-opacity:.7;}
        .jssorb053 .iav .b {fill-opacity: 1;}
        .jssorb053 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 093 css*/
        .jssora093 {display:block;position:absolute;cursor:pointer;}
        .jssora093 .c {fill:none;stroke:#abb1ba;stroke-width:400;stroke-miterlimit:10;}
        .jssora093 .a {fill:none;stroke:#abb1ba;stroke-width:1500;stroke-miterlimit:10;}
        .jssora093:hover {opacity:.8;}
        .jssora093.jssora093dn {opacity:.6;}
        .jssora093.jssora093ds {opacity:.3;pointer-events:none;}
    </style>
        
    </head>";

        return $h;
    }

    function cabecalho($pagina){
        
        $pagina;
        
        $header = "<!-- Cabeçalho/menu -->
        <header id='cabecalho'>
            <div class='conteudo center'>
                <!--Parte do logo-->
                <div id='caixa_logo'>
                   <a href='index.php'><div id='logo' title='Delícia Gelada'>
                       
                   </div></a>
                </div>
                <!--Parte do menu-->
                <nav id='caixa_menu'>
                    <ul id='container_menu'>
                            <li class='menu'>
                                <a href='curiosidades.php' title='Curiosidades'>Curiosidades</a>
                            </li>
                            <li class='menu'>
                                <a href='sobrenos.php' title='Sobre Nós'>Sobre</a>
                            </li>
                            <li class='menu'>
                                <a href='promocoes.php' title='Promoções'>Promoções</a>
                            </li>
                            <li class='menu'>
                                <a href='nossaslojas.php' title='Nossas Lojas'>Lojas</a>
                            </li>
                            <li class='menu'>
                                <a href='produtosdomes.php' title='Produtos do Mês'>Produtos Mês</a>
                            </li>
                            <li class='menu'>
                                <a href='contato.php' title='Entre em contato'>Contato</a>
                            </li>
                    </ul>
                </nav>
                <!--Parte do Login-->
                <div id='container_login'>
                    <form name='formlogin' method='post' action='bd/autenticacao.php'>
                            <div class='caixa_login'>
                                Usuário:
                                <input name='txtusuario' type='text' id='usuario' placeholder=' Insira seu usuário...' value='' title='Insira seu usuário' required> 
                            </div>
                            <div class='caixa_login' id='senha_button'>
                                Senha:
                                <input name='txtsenha' type='password' value='' id='senha' placeholder=' Insira sua senha...' title='Insira sua senha' required>
                                <input name='btnok' type='submit' value='Ok' id='botao_ok'>
                            </div>
                    </form>
                </div>
                <div id='redes_sociais'>
                    <div class='img_redes'>
                        <img class='imagens' src='img/fb.png' alt='Facebook' title='Facebook'>
                    </div>
                    <div class='img_redes' >
                        <img class='imagens' src='img/insta.png' alt='Instagram' title='Instagram'>
                    </div>
                    <div class='img_redes'>
                    <img class='imagens' src='img/tt.png' alt='Twitter' title='Twitter'>
                    </div>
                </div>
            </div>
        </header>";
        
        return $header;
        
    } 

    
    function categorias($nome){
        $nome;
        
        $categoria = "<div class='categorias_itens' title='".$nome."'>".$nome."</div>";
        
        return $categoria;
    }



    function produtos($img,$titulo,$descricao,$preco){
        
        $img;
        $titulo;
        $descricao;
        $preco;
        
        $caixa_produto = "<div class='produtos_1'>
                        <div class='img_produtos'>
                            <img class='imagens_home' alt='".$titulo."' title='".$titulo."' src='".$img."'>
                        </div>
                        <div class='nome_descricao_preco_detalhes'>
                            <h3 style='text-align: center;'>".$titulo."</h3>
                        </div>
                        <div class='nome_descricao_preco_detalhes'>
                            <p style='font-size: 15px;text-align: center;'>".$descricao."</p>
                        </div>
                        <div class='nome_descricao_preco_detalhes'>
                            <p style='text-align: center;font-size: 25px;color:#d90b00;'>R$".$preco."</p>
                        </div>
                        <div class='nome_descricao_preco_detalhes' style='padding-left: 195px;padding-top: 10px;'>
                            <p class='detalhes'>+Detalhes</p>
                        </div>
                    </div>";
        
        return $caixa_produto;
        
    }




    function curiosidades_left($titulo,$img,$texto){
        
        $titulo;
        $img;
        $texto;
        
        $formatacao_left="<div class='titulo_img_texto center'>
                    <h2>".$titulo."</h2>
                    <div class='img_curiosidades'>
                        <img class='imagem_curiosidades' src='".$img."' title='".$titulo."' alt='".$titulo."'> 
                    </div>
                    <div class='texto_curiosidades'><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$texto."</p></div>
                </div>";
        
        return $formatacao_left;
    }

    function curiosidades_right($titulo,$img,$texto){
        
        $titulo;
        $img;
        $texto;
        
        $formatacao_right="<div class='titulo_img_texto center'>
                    <h2 class='right'>".$titulo."</h2>
                    
                    <div class='texto_curiosidades'><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$texto."</p></div>
                    
                    <div class='img_curiosidades'>
                        <img class='imagem_curiosidades' src='".$img."' title='".$titulo."' alt='".$titulo."'> 
                    </div>
                    
                </div>";
        
        return $formatacao_right;
    }


    function produtos_promocoes($img,$nome,$descricao,$preco_antigo,$preco_atual){
        
        $img;
        $nome;
        $descricao;
        $preco_antigo;
        $preco_atual;
        
        $formatacao ="<div class='promocoes_produtos'>
                        <div class='img_promocoes center'>
                            <img class='imagem_promo' src='".$img."' alt='".$nome."' title='".$nome."'>
                        </div>
                        <div class='nome_promocoes center'>".$nome."</div>
                        <div class='descricao_promocoes center'>".$descricao."</div>
                        <div class='preco_antigo'>".$preco_antigo."</div>
                        <div class='preco_atual center'>".$preco_atual."</div>
                        <div class='detalhes_promocoes'>+ Detalhes</div>
                    </div>";
        
        return $formatacao;
        
    }


    function lojas($img,$nome,$endereco,$telefone,$hr_funcionamento){
        
        $img;
        $nome;
        $endereco;
        $telefone;
        $hr_funcionamento;
        
        $formato = "<div class='container_lojas center'>
                    <div class='img_lojas'> 
                        <img class='imagem_loja' src='".$img."' alt='".$nome."' title='".$nome."'>
                    </div>
                    
                    <div class='container_descricao'>
                        <h1 style='margin-left: 10px; margin-top: 20px;'>".$nome."</h1>
                        <div class='container_endereco_etc'>
                        
                            <div class='endereco_telefone'>
                                <h3 style='margin-bottom: 25px;'>Endereço:</h3>
                                <p style='margin-bottom: 40px;'>".$endereco."</p>
                                <h3 style='margin-bottom: 25px;'>Telefone:</h3>
                                <p>".$telefone."</p>
                            </div>
                            <div class='hr_funcionamento'>
                                <h3 style='margin-bottom: 25px;'>Horário de Funcionamento:</h3>
                                <p style='margin-bottom: 105px;'>".$hr_funcionamento
                                ."</p>
                                
                                <div class='caixa_aviso'>
                                
                                    <div class='img_aviso'>
                                        <img class='img_shop' src='img/shop.png' title='Compre on-line, retire na loja!' alt='shop'>
                                    </div>
                                    <div class='txt_aviso'>
                                        Compre on-line, retire na loja!
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                </div>";
        
        return $formato;
        
        
    }


    function produtosMes($img,$nome,$descricao,$preco){
        
        $img;
        $nome;
        $descricao;
        $preco;
        
        $format = "<div class='container_produtos_mes'>
                        <div class='img_mes'>
                            <img class='imagem_mes' src='".$img."' title='".$nome."' alt='".$nome."'>
                        </div>
                        <div class='nome_descricao_mes'>
                            <div class='nome_mes center'>
                                ".$nome."
                            </div>
                            <div class='descricao_mes center'>
                                ".$descricao."
                            </div>
                        </div>
                        <div class='preco_mes'>
                            ".$preco."
                        </div>
                    </div>";
        
        return $format;
        
    }









            
    $rodape="<!-- Parte do rodapé -->
        <footer id='secao_rodape'>
            <div class='conteudo center'>
                <a href='sistemaInterno/index.php'><div id='botao_sistema_interno'>
                <input class='btn' type='submit' name='btnSistemaInterno' title='Acesse o sistema interno' value='Sistema Interno' style='font-weight: bold;font-size: 20px;width: inherit;height: inherit;'>
            </div></a>
                <div id='endereco'>
                   <p style='color:white; font-size: 20px;'>Endereço:   Av. Luis Carlos Berrini, nº 666.</p>
                </div>
                <div id='img_app' title='Baixe o App!'>
                    
                </div>
                <div id='botao_baixe_app'>
                    <input class='btn' type='submit' name='btnapp' title='Baixe o App!' value='Baixe o App' style='font-weight: bold; font-size: 20px;width: inherit;height: inherit;'>
                </div>
            </div>
        </footer>";
    
?>