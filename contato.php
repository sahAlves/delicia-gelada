<?php

    require_once('MODULOS/html.php');
    require_once('bd/conexao.php');

    $conexao = conexaoMysql();

    $nome = null;
    $telefone = null;
    $celular = null;
    $dt_nasc = null;
    $sexo = null;
    $profissao = null;
    $email = null;
    $home_page = null;
    $link_facebook = null;
    $sugestao_criticas = null;
    $mensagem = null;



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

    <?=head("Entre em Contato");?>
<!--    <script src="js/modulo.js"></script>-->
    
    <body>
        <?=cabecalho("contato.php");?>
        
        <section id="section_contato">
            <div style="padding-top: 60px;" class="conteudo center">
                <h1 style="margin-left: 200px;margin-bottom: 60px;color:white;">ENTRE EM CONTATO</h1>
                <div id="container_form" class="center">
                    <form id="formcontato" name="formcontato" method="post" action="bd/inserir.php">
                        <div class="form_box center">
                            Nome:* <br>
                            <input class="input_txt" type="text" name="txtnome" value="" placeholder=" Digite seu nome..." onkeypress="return validarEntrada(event,'numeric');" required>
                        </div>
                        <div class="form_box center">
                            Telefone: <br>
                            <input id="telefone" class="input_txt" type="text" name="txttelefone" placeholder=" Ex:(99) 9999-9999" value="" onkeypress="return mascaraFone(this, event);">
                        </div>
                        <div class="form_box center">
                            Celular:* <br>
                            <input id="celular" class="input_txt" type="text" name="txtcelular" value="" placeholder=" Ex: (99) 9-9999-9999" onkeypress="return mascaraCel(this,event);" required>
                        </div>
                        
                        <div class="form_box center">
                            Data de Nascimento:* <br>
                            <input id="data" class="input_txt" type="text" name="txtdata" value="" placeholder=" dd/mm/aaaa" onkeypress="return mascaraData(this, event);" required>
                        </div>
                        
                        <div class="form_box center">
                            Sexo:* <br>
                            <input class="input_rdo" type="radio" name="rdosexo" value="Feminino"  required><p style="float: left;margin-right: 20px;margin-top: 20px;">Feminino</p>
                            <input class="input_rdo" type="radio" name="rdosexo" value="Masculino"  required>
                            <p style="float: left;margin-top: 20px;">Masculino</p>
                        </div>
                        
                         <div class="form_box center">
                            Profissão:* <br>
                            <input class="input_txt" type="text" name="txtprofissao" value="" placeholder=" Digite sua profissão..." required>
                        </div>
                        
                         <div class="form_box center">
                            Email:* <br>
                            <input class="input_txt" type="email" name="txtemail" value="" placeholder=" Ex: deliciagelada@gmail.com" required>
                        </div>
                        
                         <div class="form_box center">
                            Home Page: <br>
                            <input class="input_txt" type="url" name="txthomepage" value="" placeholder=" Digite sua home page...">
                        </div>
                        
                         <div class="form_box center">
                            Link no facebook: <br>
                            <input class="input_txt" type="url" name="txtlinkfb" value="" placeholder=" Digite seu link no facebook...">
                        </div>
                        
                         <div style="height: 80px;" class="form_box center">
                            <select name="select">
                                <option value="Sugestão">
                                    Sugestão
                                </option>
                                <option value="Crítica">
                                    Crítica
                                </option>
                            </select>
                        </div>
                        
                        <div style="height: 200px;" class="form_box center">
                            Mensagem:* <br>
                            <textarea name="mensagem" required></textarea>
                        </div>
                        
                        <div id="botao_enviar">
                            <input id="input_btn" type="submit" title="Enviar" name="btnenviar" value="Enviar">
                        </div>
                        
                    </form>
                </div>
            </div>
        </section>
        
        <?=$rodape?>
        <script src="js/modulo.js"></script>
    </body>

</html>