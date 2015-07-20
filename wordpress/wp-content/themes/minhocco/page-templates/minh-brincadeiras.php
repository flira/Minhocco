<?php
/**
 * Template Name: Minhocco Brincadeiras
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */


get_header(); ?>

<body <?php body_class('pg-brincadeiras'); ?>>
<?php echo get_template_part("menu", "geral");?>
<main class="body-main" role="main">

     <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
          $html = do_shortcode(get_the_content());
          $divs = minhocco_brincadeiras_separa_galerias($html);
          $html_conteudo = minhocco_brincadeiras_galeria_1($divs);
           echo $html_conteudo;
        endwhile; else: ?>
          
     <?php endif; ?>
     
  </main>

<?php
get_footer();
