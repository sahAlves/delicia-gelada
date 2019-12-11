<div id="container_nos" class="center">
                            <form class="center" style="margin: 0px; margin-left: 30px; width: 500px; height: 480px;" name="frm_cards" method="post" action="MODULOS/inserir.php" enctype="multipart/form-data">
                                
                                
                                <div id="box_sobr" style="float: left; width: 200px; margin-right: 60px;">
                                    <h2 style="color: black; font-weight: bold; margin-bottom: 10px; float: none; ">Título:</h2>
                                    
                                    <input id="input_sobre" style="width: 200px;" type="text" name="txttitulo" value="<?=$titulo?>" placeholder=" Digite um título..." required>
                                </div>
                                <div id="view_image" style="float: left; width: 150px; height: 100px;">
                                    <label for="fileFoto">
                                        <?=$img?>
                                    </label>
                                </div>
                                
                                <select style="width: 250px; clear: both; margin:0px; margin-bottom: 50px;" name="slct_sobre" required>
                                    
                                    <?php
                                         //Verificando se a variavel modo existe e se é igual a editar
                                        if(isset($_GET['modo']) == 'editar'){
                                            //Se o modo for introdução, cadastra na tabela de introducao, senao, cards
                                            if($modo == "Introdução"){
                                                
                                    ?>            
                                                <option value="<?=$modo?>"><?=$modo?></option>
                                                <option value="">Selecione uma opção</option>
                                                <option value="Cards">Referências</option>
                                    
                                    <?php
                                            }
                                            if($modo == "Cards"){
                                    ?>            
                                                <option value="<?=$modo?>"><?=$modo?></option>
                                                <option value="">Selecione uma opção</option>
                                                <option value="Introdução">Introdução</option>
                                    <?php
                                            }
                                        }else{
                                    
                                    ?>
                                    
                                    
                                    <option value="">Selecione uma opção</option>
                                    <option value="Introdução">Introdução</option>
                                    <option value="Cards">Referências</option>
                                    
                                    <?php
                                        }
                                    ?>
                                </select>
                                    
                                    <h2 style="color: black; font-weight: bold; margin-bottom: 10px; float: none; clear: both; ">Texto:</h2>
                                
                                    <textarea style="width: 400px; height: 170px;font-size: 18px; margin-bottom: 30px;" placeholder=" Digite aqui..." name="txttexto" required><?=$texto?></textarea>
                            
                                
                                    <input style="width: 100px; height: 40px; font-weight: bold; font-size: 18px; border: solid 2px black; border-radius: 10px; margin-left: 300px;" type="submit" value="<?=$btnCards?>" name="btnInsert">
                            </form>
                            <form style="margin: 0px; margin-left: 0px; width: 100px; height: 10px;" id="form_cards" method="post" action="MODULOS/upload.php" enctype="multipart/form-data"><input style="display: none;" type="file" id="fileFoto" name="fle_foto"></form>
                        </div>