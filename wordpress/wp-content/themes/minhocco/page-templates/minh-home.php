<?php
/**
 * Template Name: Minhocco Home
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */


get_header(); ?>

<body <?php body_class(); ?>>
<?php echo get_template_part("menu", "geral");?>
<main class="body-main" role="main">

     <?php
    /*
    O Conteúdo dessa página são duas galerias. Vamos assim separá-las em duas partes.
    */
        if ( have_posts() ) : while ( have_posts() ) : the_post();
          //the_content();
          //recuperando o código em html:
          $html = do_shortcode(get_the_content());
          //separando as divs da galeria:
          $divs_galerias = minhocco_home_separa_galerias($html);
         //formatando imagens de cada galeria
         //usando as funções que eu defini no function.php
          $html_galeria_1 = minhocco_home_galeria_1($divs_galerias[0]);
          $html_galeria_2 = minhocco_home_galeria_2($divs_galerias[1]);
        endwhile; else: ?>
          
     <?php endif; ?>
     
    <?php echo $html_galeria_1; ?>
  
    <?php echo $html_galeria_2; ?>
    
  </main>

<?php
get_footer();
