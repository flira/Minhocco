<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */
?>
<!doctype html>
<html lang="pt-br" data-ng-app="minhocco">

<head>
  <meta charset="utf-8">
  <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
  <meta name="description" content="Minhocco: roupas de brincar">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Minhocco</title>
  <style id="above-the-fold-css">
    /* Paste here the above the fold styles */
  </style>
  <meta property="og:description" content="Em breve, site da Minhocco: roupas de brincar">
  <meta property="og:url" content="http://www.minhocco.com.br">
  <meta property="og:title" content="Minhocco">
  <meta property="og:type" content="Minhocco:page">
  <meta property="og:image" content="favicon.ico">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
  <!-- Add to homescreen -->
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">

  <!-- Fallback to homescreen for Chrome <39 on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="Minhocco">
  <link rel="icon" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/images/touch/chrome-touch-icon-192x192.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Minhocco">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/touch/apple-touch-icon.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/touch/ms-touch-icon-144x144-precomposed.png">
  <meta name="msapplication-TileColor" content="#F2049F">
  <meta name="theme-color" content="#F2049F">

  <!-- IE fixes -->
  <!--[if lt IE 8]>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/a.ielt8.js"></script>
  <![endif]-->
  <!--[if IE 8]>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/a.ie8.js"></script>
  <![endif]-->
  <!--[if IE lte 8]>
    <script type="text/javascript">window.ltIE9 = true;</script>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/IE9.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.9/angular.min.js"></script>
  <![endif]-->
  <!--[if IE lte 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/a.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/TweenLite.js"></script>
  <![endif]-->
  
  <!-- Page styles -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/main.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="body-header">
<?php 
  
  $args = array(
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
        'post_type'              => 'nav_menu_item',
        'post_status'            => 'publish',
        'output'                 => ARRAY_A,
        'output_key'             => 'menu_order',
        'nopaging'               => true,
        'update_post_term_cache' => false );
  $menu = 'Principal';
  $items = wp_get_nav_menu_items( $menu, $args );
  echo(minhocco_menu($items));
  ?>
    <!--<div class="encap">
      <div class="logo-holder">
        <a href="/" class="sprt logo">Início</a>
      </div>
      <input class="main-menu-ctrl" id="main-menu-ctrl" type="checkbox" value="visible" aria-hidden="true"/>
      <div class="main-navigation-bar">
        <label class="main-menu-label" for="main-menu-ctrl">Menu</label>
        <nav class="main-menu">
          <ul class="main-menu-list">
            <li><a class="main-menu-a universo"  href="">universo</a>
            </li>
            <li><a class="main-menu-a guardaroupa"  href="">guarda-roupa</a>
            </li>
            <li><a class="main-menu-a parque"  href="">parque</a>
            </li>
            <li><a class="main-menu-a encontre"  href="">encontre a minhocco</a>
            </li>
            <li><a class="main-menu-a lojinha"  href="">lojinha</a>
            </li>
          </ul>
        </nav>
        <form class="search" id="search">
          <input class="search-field" id="search-field" type="search" aria-label="busca"/>
          <input class="sprt search-submit" type="submit" value="" aria-label="enviar busca" />
        </form>
      </div>
    </div>-->
  </header>
  
  
