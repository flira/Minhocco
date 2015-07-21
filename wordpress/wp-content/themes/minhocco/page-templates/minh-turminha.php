<?php
/**
 * Template Name: Minhocco Turminha
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */


get_header(); ?>

<body <?php body_class("pg-universo pg-sub"); ?>>
<?php echo get_template_part("menu", "geral");?>
<main class="body-main" role="main">
     <style>
        .mascotes .mascote-rd-jacare:checked ~ .mascote-selected {
          background-image: url(https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Jacare.png); }
        .mascotes .mascote-rd-arara:checked ~ .mascote-selected {
          background-image: url(https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Arara.png); }
        .mascotes .mascote-rd-onca:checked ~ .mascote-selected {
          background-image: url(https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Onca.png); }
        .mascotes .mascote-rd-preguica:checked ~ .mascote-selected {
          background-image: url(https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Preguica.png); }
        .mascotes .mascote-rd-lobo:checked ~ .mascote-selected {
          background-image: url(https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Lobo-guara.png); }
        .mascotes .mascote-rd-tamandua:checked ~ .mascote-selected {
          background-image: url(https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Tamandua.png); }
       
     </style>
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
        <img src="https://minhocco-flira.c9.io/wordpress/wp-content/uploads/2015/07/Todos-escondidos.png" alt=""/>
      </div>
    </div>

    
  </main>

<?php
get_footer();
