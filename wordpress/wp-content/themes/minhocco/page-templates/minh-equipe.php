<?php
/**
 * Template Name: Minhocco Equipe
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */


get_header(); ?>

<body <?php body_class("pg-universo pg-sub"); ?>>
<?php echo get_template_part("menu", "geral");?>
<main class="body-main" role="main">
     
     <div class="mascotes">
      <input type="radio" class="mascote-rd-jacare" id="mascote-rd-jacare" name="mascote-rd" value="jacare"/>
      <input type="radio" class="mascote-rd-arara" name="mascote-rd" value="arara"/>
      <ul aria-hidden="true">
        <li><label class="mascote-jacare" for="mascote-rd-jacare"></label></li>
        <li><label class="mascote-arara"></label></li>
        <li><label class="mascote-onca"><input type="radio" class="mascote-rd-onca" name="mascote-rd" value="onca"></label></li>
        <li><label class="mascote-preguica"><input type="radio" class="mascote-rd-preguica" name="mascote-rd" value="preguica"></label></li>
        <li><label class="mascote-lobo"><input type="radio" class="mascote-rd-lobo" name="mascote-rd" value="lobo"></label></li>
        <li><label class="mascote-tamandua"><input type="radio" class="mascote-rd-tamandua" name="mascote-rd" value="tamandua"></label></li>
      </ul>
      <div class="mascote-selected"></div>
      <div class="mascotes-bg">
        <img src="images/Todos-escondidos.png" alt=""/>
      </div>
    </div>

    
  </main>

<?php
get_footer();
