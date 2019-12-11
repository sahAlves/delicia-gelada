<?php

if(isset($_FILES['fle_foto'])){
    if($_FILES['fle_foto']['size'] > 0 && $_FILES['fle_foto']['type'] != ""){

        $arquivo_size = $_FILES['fle_foto']['size'];
        
        $tamanho_arquivo = round($arquivo_size/1024);
        
        $arquivos_permitidos = array("image/jpeg","image/jpg","image/png");

        $ext_arquivo = $_FILES['fle_foto']['type'];


        if(in_array($ext_arquivo,$arquivos_permitidos)){

        //Valida o tamanho 
        if ($tamanho_arquivo < 2000){

            
            $nome_arquivo = pathinfo($_FILES['fle_foto']['name'], PATHINFO_FILENAME);

            $ext = pathinfo($_FILES['fle_foto']['name'], PATHINFO_EXTENSION);

            $nome_arquivo_cripty = MD5(uniqid(time()).$nome_arquivo);

            $foto = $nome_arquivo_cripty.".".$ext;

            $arquivo_temp = $_FILES['fle_foto']['tmp_name'];

            $diretorio = "arquivos/";

            if(move_uploaded_file($arquivo_temp,$diretorio.$foto)){
                
                session_start();
                $_SESSION['previewFoto'] = $foto;
                $_SESSION['viewFoto'] = $foto;
                
                echo("<label for='fileFoto'><img style='width: 100%; height: 100%;' src='MODULOS/arquivos/".$foto."'></label>");
                
            }else{
                echo("<script> alert('Não foi possivel enviar o arquivo para o servidor!');</script>");
                echo("<label for='fileFoto'><img alt='Adicionar uma imagem' style='width:50%; height: 70%;margin-top: 25px;' src='imagens/addimg.png'></label>");
             }

         }else{
            echo("<script> alert('Tamanho de arquivo não pode ser maior do que 2Mb');</script>");
            echo("<label for='fileFoto'><img alt='Adicionar uma imagem' style='width:50%; height: 70%;margin-top: 25px;' src='imagens/addimg.png'></label>");
          }
        }else{
            echo("<script>alert('Tipo de arquivo não pode ser upado para o servidor (arquivos permitidos: .jpg, .jpeg, .png)');</script>");
            echo("<label for='fileFoto'><img alt='Adicionar uma imagem' style='width:50%; height: 70%;margin-top: 25px;' src='imagens/addimg.png'></label>");
         }    
    }else{
        echo("<script>alert('Arquivo não selecionado conforme tamanho de arquivo!');</script>");
        echo("<label for='fileFoto'><img alt='Adicionar uma imagem' style='width:50%; height: 70%;margin-top: 25px;' src='imagens/addimg.png'></label>");
     }
}else{
    echo("<label for='fileFoto'><img alt='Adicionar uma imagem' style='width:50%; height: 70%;margin-top: 25px;' src='imagens/addimg.png'></label>");
}
    

?>