<?php
/**
 * Template Name: Minhocco Brincadeiras
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */


get_header(); ?>

<body <?php body_class('pg-parque'); ?>>
<?php echo get_template_part("menu", "geral");?>
<main class="body-main" role="main">

     <nav class="homescreen">
      <ul class="block-line colx2">
        <li class="col">
          <a class="imprimir" href="https://minhocco-flira.c9.io/wordpress/brincadeiras/para-imprimir-2">Para imprimir</a>
        </li><li class="col">
          <a class="pintar" href="https://minhocco-flira.c9.io/wordpress/brincadeiras/para-pintar-2/">Para pintar</a>
        </li>
      </ul>
    </nav>
     
  </main>

<?php
get_footer();
