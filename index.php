<?php

    require_once('MODULOS/html.php');

    if(!isset($_SESSION))
        session_start();


?>


    
<!DOCTYPE html>
<html lang="pt-br">
    <?=head("Delícia Gelada");?>
    
    
    <body>
        <?=cabecalho("index.php");?>

        <!--Parte do slide-->
        <section id="secao_slide">
            <div id="borda_slide" class="conteudo center"><h1 class="titulo">a</h1>
                <!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="js/slider.js"></script>
    <script>
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:500,$Delay:12,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:2049,$Easing:$Jease$.$OutQuad},
              {$Duration:500,$Delay:40,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$SlideOut:true,$Easing:$Jease$.$OutQuad},
              {$Duration:1000,x:-0.2,$Delay:20,$Cols:16,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Assembly:260,$Easing:{$Left:$Jease$.$InOutExpo,$Opacity:$Jease$.$InOutQuad},$Opacity:2,$Outside:true,$Round:{$Top:0.5}},
              {$Duration:1600,y:-1,$Delay:40,$Cols:24,$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraight,$Easing:$Jease$.$OutJump,$Round:{$Top:1.5}},
              {$Duration:1200,x:0.2,y:-0.1,$Delay:16,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InWave,$Top:$Jease$.$InWave,$Clip:$Jease$.$OutQuad},$Round:{$Left:1.3,$Top:2.5}},
              {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.2,0.8],$Top:[0.2,0.8]},$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Round:{$Left:0.8,$Top:2.5}},
              {$Duration:1500,x:0.3,y:-0.3,$Delay:20,$Cols:10,$Rows:5,$Opacity:2,$Clip:15,$During:{$Left:[0.1,0.9],$Top:[0.1,0.9]},$SlideOut:true,$Formation:$JssorSlideshowFormations$.$FormationStraightStairs,$Assembly:260,$Easing:{$Left:$Jease$.$InJump,$Top:$Jease$.$InJump,$Clip:$Jease$.$OutQuad},$Round:{$Left:0.8,$Top:2.5}}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 1600;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    
    <div id="jssor_1" style="position:relative;top:0px;left:0px;width:1500px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" alt="spin" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1500px;height:500px;overflow:hidden;">
            <div>
                <img data-u="image" src="img/slide1.jpg" alt="Suco de Laranja" title="Suco de Laranja" />
            </div>
            <div>
                <img data-u="image" src="img/propaganda_suco.jpg" alt="Sucos" title="Sucos" />
            </div>
            <div>
                <img data-u="image" src="img/suco-detox.jpg" alt="Detox" title="Detox" />
            </div>
            <div>
                <img data-u="image" src="img/sucos-naturais.jpg" alt="Sucos Naturais" title="Sucos Naturais" />
            </div>
            <div>
                <img data-u="image" src="img/sucos-detox-istock.jpg" alt="Detox" title="Detox" />
            </div>
            <div>
                <img data-u="image" src="img/sucos-health-magazine.jpg" alt="Sucos Naturais" title="Sucos Naturais" />
            </div>
            <div>
                <img data-u="image" src="img/sucos.jpg" alt="Sucos" title="Sucos" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb053" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
<!--                <circle class="c" cx="8000" cy="8000" r="5920"></circle>-->
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
<!--                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>-->
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
<!--                <circle class="c" cx="8000" cy="8000" r="5920"></circle>-->
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
<!--                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>-->
            </svg>
        </div>
    </div>
    <script>jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->
            </div>
        </section>

        <!--Parte do conteudo-->
        <section id="secao_conteudo">
            <div class="conteudo center"><h1 class="titulo">a</h1>
                <div id="container_home">
                    <nav id="menu_categorias">
                    <div id="caixa_categorias">
                        
                        <?=categorias("Morango");?>
                        
                        <?=categorias("Maracujá");?>
                        
                        <?=categorias("Detox");?>
                        
                        <?=categorias("Manga");?>
                        
                    </div>
                </nav>
                <div id="caixa_produtos">
                    
                    <?=produtos('img/sucoMorango.jpg','Suco de Morango','Rico em vitaminas vitamina C, A, etc.','8,00');?>
                    
                    <?=produtos('img/sucoMaracuja.jpg','Suco de Maracujá','Vitaminas A, C e do complexo B','8,00');?>
                    
                    <?=produtos('img/sucoMaracuja.jpg','Suco de Maracujá','Vitaminas A, C e do complexo B','8,00');?>
                    
                    <?=produtos('img/sucoMorango.jpg','Suco de Morango','Rico em vitaminas vitamina C, A, etc.','10,00');?>
                    
                    <?=produtos('img/sucoMaracuja.jpg','Suco de Maracujá','Vitaminas A, C e do complexo B','10,00');?>
                    
                    <?=produtos('img/sucoMorango.jpg','Suco de Morango','Rico em vitaminas vitamina C, A, etc.','10,00');?>
                    
                    <?=produtos('img/sucoMorango.jpg','Suco de Morango','Rico em vitaminas vitamina C, A, etc.','10,00');?>
                    
                    <?=produtos('img/sucoMorango.jpg','Suco de Morango','Rico em vitaminas vitamina C, A, etc.','10,00');?>
                    
                    <?=produtos('img/sucoMorango.jpg','Suco de Morango','Rico em vitaminas vitamina C, A, etc.','10,00');?>
                    
                </div>
                </div>
            </div>
        </section>
        
        
        <?=$rodape;?>    
        <script src="js/slider.js"></script>
    </body>
</html>


<?php
            if(isset($_SESSION['alert'])){
                if($_SESSION['alert'] == 1){
                echo("<script>alert('Usuário ou Senha incorretos!');</script>");
                unset($_SESSION['alert']);
                }   
                elseif($_SESSION['alert'] == 2){
                    echo("<script>alert('Usuário ou Nível desativado!');</script>");
                    unset($_SESSION['alert']);
                }
                else{
                    unset($_SESSION['alert']);
                }
            }
        
?>