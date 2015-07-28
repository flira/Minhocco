<?php
/**
 * Template Name: Minhocco para pintar
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */


get_header(); ?>

<body <?php body_class("pg-sub pg-parque"); ?>>
<?php echo get_template_part("menu", "geral");?>
<main class="body-main" role="main">
    <div class="colx1">
        <img src="https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Cenario.png" alt=""/>
        <div class="container-pintar">
            <div class="pintar-1">
                <div class="pintar-01">
                    <svg id="paleta"></svg>
                </div>
            </div>
            <div class="pintar-2">
                <svg id="bichinho"></svg>
            </div>
            <div class="pintar-3">
                <svg id="bichinho-0" viewbox="0 0 600 400"></svg>
            </div>
        </div>
    </div>
</main>
<style>
    .colx1{
        position:relative;
        max-width:100%;
    }
    .colx1>img{
        position:relative;
        width:100%;
        z-index:1;
    }
    .container-pintar{
        position:absolute;
        z-index:2;
        width:100%;
        height:700px;
        top:0px;
    }
    .pintar-1, .pintar-2, .pintar-3{
        position:relative;
        float:left;
        width:33.33333333333333333333%;
        height:100%;
    }
    .pintar-01{
       position:relative;
       bottom:0px;
        
    }
    .pintar-0-1{
        position:absolute;
        bottom:10px;
    }
    #paleta{
         margin-top:90px;
         padding-left:15px;
    }
    #bichinho{
        height:100%;
    }
    #bichinho-0{
       
    }
    .pintar-3>svg{
       
    }
</style>
<script src="<?php echo get_template_directory_uri(); ?>/js/snap.svg-min.js"></script>
<script>
    
      var paletaSVG = Snap("#paleta");
      
      var corEscolhida = '#fff';
      var cores = ['#009245','#8BC540' , '#FAEC20','#EF5A28' , '#EB1F27','#47C6F4' , '#2D3091', '#91298B', '#E90D8A',  '#BD1E2C','#C3996B' , '#754B28', '#ffffff','#929294' , '#000000'];
      
      Snap.load("<?php echo get_template_directory_uri(); ?>/svg/paleta.svg", function(f){
        var paleta = f.selectAll("image");
        
        for(var i = 0; i < paleta.length; i++){
          paleta[i].appendTo(paletaSVG);
          paleta[i].attr({fill: cores[i]});
          paleta[i].click(function(){
            corEscolhida = this.attr("fill");
          });
          
        }
      });
     
     var bichinhos = ['lobo.svg', 'tamandua.svg', 'bichopreguica.svg', 'oncapintada.svg', 'araraazul.svg', 'jacare.svg'];
     var translado = [-80,-150, 120,-140, 320,-150, -85,70, 110,40, 320,60]
     var transf = [1];
     var bichinhosSVG = Snap("#bichinho-0");
     
     for(var i = 0; i < bichinhos.length; i++){
         loadBichinhos(i);
     }
     
     var bichinhoPrincipalSVG = Snap("#bichinho");
     loadBichinhoPrincipal(0);
     
     function loadBichinhos(i){
         Snap.load("<?php echo get_template_directory_uri(); ?>/svg/"+bichinhos[i], function(f){
                var preenchimento = f.select("#Preenchimento");
                var linhas = f.select("#Linhas");
                var escala = "0.6";
                
                preenchimento.transform("S"+escala+"T"+translado[i*2]+','+translado[1+(i*2)]);
                linhas.transform("S"+escala+"T"+translado[i*2]+','+translado[1+(i*2)]);
                
                preenchimento.appendTo(bichinhosSVG);
                linhas.appendTo(bichinhosSVG);
                
                preenchimento.click(function(){
                    removeBichinhoPrincipal();
                    loadBichinhoPrincipal(i);
                    
                    var paths = preenchimento.selectAll("path");
                        for(a = 1; a < paths.length; a++){
                          paths[a].attr({fill: "#fff"});
                        }
                });
                
                linhas.click(function(){
                    loadBichinhoPrincipal(i);
                });
                
                
         });
     }
     
     function removeBichinhoPrincipal(){
         var graficos = bichinhoPrincipalSVG.selectAll("g");
         for(var i = 0; i < graficos.length; i++) graficos[i].remove();
     }
     
     function loadBichinhoPrincipal(i){
        Snap.load("<?php echo get_template_directory_uri(); ?>/svg/"+bichinhos[i], function(f){
            var preenchimento = f.select("#Preenchimento");
            var linhas = f.select("#Linhas");
            
            var escala = "0.99";
            var transladoA = [-170, -250];
            
            preenchimento.transform("S"+escala+"T"+transladoA[0]+','+transladoA[1]);
            linhas.transform("S"+escala+"T"+transladoA[0]+','+transladoA[1]);
            
            preenchimento.appendTo(bichinhoPrincipalSVG);
            linhas.appendTo(bichinhoPrincipalSVG);
            
            var paths = preenchimento.selectAll("path");
                for(i = 1; i < paths.length; i++){
                  paths[i].click(function(){
                    this.attr({fill: corEscolhida});
                  });
                }
        }); 
     }
    </script>
<?php
get_footer();
