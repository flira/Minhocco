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
        <div class="pintar-1">
            <svg id="paleta"></svg>
        </div>
        <div class="pintar-2">
            <svg id="bichinho"></svg>
        </div>
        <div class="pintar-3">
            <svg id="bichinho-0" viewbox="0 0 600 400"></svg>
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
    .pintar-1, .pintar-2, .pintar-3{
        position:absolute;
        z-index:2;
    }
    .pintar-1{
        bottom:-15px;
        left:15px;
    }
    .pintar-3{
        top:0px;
        right:0px;
        width:600px;
        height:400px;
    }
    .pintar-3>svg{
        display:block;
        float:left;
        width:600px;
        height:400px;
        border: 1px black solid;
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
            console.log(corEscolhida);
          });
          
        }
      });
     
     var bichinhos = ['araraazul.svg', 'bichopreguica.svg', 'jacare.svg', 'lobo.svg', 'oncapintada.svg','tamandua.svg'];
     var bichinhosSVG = Snap("#bichinho-0");
     for(var i = 0; i < bichinhos.length; i++){
         loadBichinhos(i);
     }
     
     function loadBichinhos(i){
         Snap.load("<?php echo get_template_directory_uri(); ?>/svg/"+bichinhos[i], function(f){
                var preenchimento = f.select("#Preenchimento");
                var linhas = f.select("#Linhas");
                var escala = "0.6";
                
                var transladoX = -90+((i%3)*200);
                var transladoY = -150+((Math.floor(i/3))*200);
                console.log(i);
                console.log(transladoX);
                console.log(transladoY);
                preenchimento.transform("S"+escala+"T"+transladoX+","+transladoY);
                linhas.transform("S"+escala+"T"+transladoX+","+transladoY);
                
                preenchimento.appendTo(bichinhosSVG);
                linhas.appendTo(bichinhosSVG);
                
                var paths = preenchimento.selectAll("path");
                for(a = 1; a < paths.length; a++){
                  paths[a].attr({fill: "#fff"});
                }
         });
     }
    </script>
<?php
get_footer();
