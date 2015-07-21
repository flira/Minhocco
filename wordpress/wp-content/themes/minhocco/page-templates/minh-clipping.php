<?php
/**
 * Template Name: Minhocco Clipping
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */


get_header(); ?>

<body <?php body_class("pg-sub pg-encontre"); ?>>
  <?php echo get_template_part("menu", "geral");?>
  <main class="body-main" role="main">
     <!-- Lira, usar lightbox -->
      <div class="block-line colx4 zoom">
        <div class="col">
            <a href="image-big" rel="clipping" title="Aqui vai o conteúdo de caption">
              <img src="https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Slideshow.jpg" alt="" />
            </a>
        </div><div class="col">
            <a href="image-big" rel="clipping" title="Aqui vai o conteúdo de caption">
              <img src="https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Slideshow.jpg" alt="" />
            </a>
        </div><div class="col">
            <a href="image-big" rel="clipping" title="Aqui vai o conteúdo de caption">
              <img src="https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Slideshow.jpg" alt="" />
            </a>
        </div><div class="col">
            <a href="image-big" rel="clipping" title="Aqui vai o conteúdo de caption">
              <img src="https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Slideshow.jpg" alt="" />
            </a>
        </div>
      </div>
  </main>

<?php
get_footer();
