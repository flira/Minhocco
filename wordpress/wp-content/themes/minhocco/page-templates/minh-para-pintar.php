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

     <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
          the_content();
          
        endwhile; else: ?>
          
     <?php endif; ?>
     
  </main>

<?php
get_footer();
