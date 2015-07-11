<?php
/**
 * Minhocco functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

// custom menu renderer
function minhocco_menu($menu_itens){
	$html_conteudo = '<div class="encap">';
	//o primeiro item do menu é sempre a Home, ou Início
	$html_conteudo = $html_conteudo.'
			<div class="logo-holder">
        <a href="'.$menu_itens[0]->url.'" class="sprt '.$menu_itens[0]->attr_title.'">'.$menu_itens[0]->title.'</a>
      </div>
	';
	$html_conteudo = $html_conteudo.'<input class="main-menu-ctrl" id="main-menu-ctrl" type="checkbox" value="visible" aria-hidden="true"/>';
	$html_conteudo = $html_conteudo.'<div class="main-navigation-bar">
        													 <label class="main-menu-label" for="main-menu-ctrl">Menu</label>
        													         <nav class="main-menu">
          																		<ul class="main-menu-list">';
  for($i = 1; $i < count($menu_itens);$i++){
  	$html_conteudo = $html_conteudo.'<li><a class="main-menu-a '.$menu_itens[$i]->attr_title.'"  href="'.$menu_itens[$i]->url.'">'.$menu_itens[$i]->title.'</a></li>';
  }
  $html_conteudo = $html_conteudo.'</ul>
        </nav>
        <form class="search" id="search">
          <input class="search-field" id="search-field" type="search" aria-label="busca"/>
          <input class="sprt search-submit" type="submit" value="" aria-label="enviar busca" />
        </form>
      </div></div>';
      return $html_conteudo;
}
// Custom filter function to modify default gallery shortcode output
function minhocco_home_separa_galerias($html_conteudo){
	//separa as divs das galerias usando regex
	preg_match_all('/<div[^>]+>(.*?)<\/div>/s',$html_conteudo, $divs_galerias);
	return $divs_galerias[0];
}

//gallery util
function minhocco_extrair_alts_e_srcs($div_galeria_1){
	//extraindo imagens
	preg_match_all('/<img[^>]+>/i',$div_galeria_1, $images0); 
	
	//extraindo os srcs
	$srcs = array();
	for($i = 0; $i < count($images0[0]); $i++){
		preg_match_all('/src="[^"]+"/i', $images0[0][$i], $srcsA);
		$stringTratada = str_replace('-150x150', '', $srcsA[0][0]);
		array_push($srcs, $stringTratada);
	}
	
	//extraindo os alts
	$alts = array();
	for($i = 0; $i < count($images0[0]); $i++){
		preg_match_all('/alt="[^"]+"/i', $images0[0][$i], $altsA);
		$stringTratada = str_replace('alt=', '', $altsA[0][0]);
		array_push($alts, $stringTratada);
	}
	
	return array($alts, $srcs);
}

function minhocco_home_galeria_1($div_galeria_1){
	$alts_e_srcs = minhocco_extrair_alts_e_srcs($div_galeria_1);
	
	$alts = $alts_e_srcs[0];
	$srcs = $alts_e_srcs[1];
	
	//criando o loop para retornar o html montado
	$html_conteudo = 
	 '<fl-banner>
    <ul>';
    for($i = 0; $i < count($srcs); $i++){
        $html_conteudo = $html_conteudo.'<li>
        <a href='.$alts[$i].'><img '.$srcs[$i].' /></a>
        </li>';
    }
    $html_conteudo = $html_conteudo.'</ul>
  </fl-banner>';
  return $html_conteudo;
}

function minhocco_home_galeria_2($div_galeria_2){
	$alts_e_srcs = minhocco_extrair_alts_e_srcs($div_galeria_2);
	
	$alts = $alts_e_srcs[0];
	$srcs = $alts_e_srcs[1];	

	//essa galeria só vai ter duas divs mesmo
	//então só renderize o html como uma grande string
	$html_conteudo = 
	'<div class="block-line colx2">
      <div class="col">
        <a href='.$alts[0].'>
          <img '.$srcs[0].' />
        </a>
      </div><div class="col">
        <a href='.$alts[1].'>
          <img '.$srcs[1].' />
        </a>
      </div>
    </div>';
  return $html_conteudo;
}

//wordpress stuff
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );