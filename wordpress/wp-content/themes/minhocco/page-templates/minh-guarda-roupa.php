<?php
/**
 * Template Name: Minhocco Guarda Roupa
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */

get_header();
?>

<body <?php body_class("pg-guardaroupa"); ?>>
<?php echo get_template_part("menu", "geral");?>
<main class="body-main" role="main">
     
     <?php
    /*
    O Conteúdo dessa página é uma galeria com uma div
    */
        if ( have_posts() ) : while ( have_posts() ) : the_post();
          //the_content();
          //recuperando o código em html:
          $html = do_shortcode(get_the_content());
          //separando as divs da galeria:
          $divs_galerias = minhocco_guarda_roupa_separa_galerias($html);
          //var_dump($divs_galerias);
         //formatando imagens de cada galeria
         //usando as funções que eu defini no function.php
          //$html_galeria_1 = minhocco_universo_galeria_1($divs_galerias[0]);
        endwhile; else: ?>
          
     <?php endif; ?>
     
    <?php echo $html_galeria_1; ?>
</main>

<?php
get_footer();
