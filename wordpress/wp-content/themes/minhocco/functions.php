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

function register_my_menu() {
  register_nav_menu('menu-nivel-1',__( 'Menu Nivel 1' ));
  register_nav_menu('menu-nivel-2',__( 'Menu Nivel 2' ));
  register_nav_menu('menu-nivel-3',__( 'Menu Nivel 3' ));
}
add_action( 'init', 'register_my_menu' );

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
  $pid = get_the_ID();
  $parent_pid = wp_get_post_parent_id($pid);
  $grandparent_pid = wp_get_post_parent_id($parent_pid);
 
  for($i = 1; $i < count($menu_itens);$i++){
  	$html_conteudo = $html_conteudo.'<li><a class="main-menu-a '.$menu_itens[$i]->attr_title;
  	if($pid == $menu_itens[$i]->object_id || $parent_pid == $menu_itens[$i]->object_id || $grandparent_pid == $menu_itens[$i]->object_id){
  		$html_conteudo = $html_conteudo.' selected';
  	}
  	$html_conteudo = $html_conteudo.'"  href="'.$menu_itens[$i]->url.'">'.$menu_itens[$i]->title.'</a></li>';
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


function minhocco_submenu($page_id) { 
	global $post;
	$children = get_pages('child_of='.$page_id.'&parent='.$page_id.'&sort_column=menu_order');
	$html_conteudo = '<nav class="sub-menu">
      <ul class="sub-menu-list encap">';
  $pid = get_the_ID();
  
	for($i = 0; $i < count($children); $i++){
		$html_conteudo = $html_conteudo.'<li class="sub-menu-item"><a class="sub-menu-a';
		
		if($pid == $children[$i]->ID){
  		$html_conteudo = $html_conteudo.' selected';
  	}
		$html_conteudo = $html_conteudo.'" href="'.$children[$i]->guid.'">'.$children[$i]->post_title.'</a></li>';
	}
	$html_conteudo = $html_conteudo."</ul>
    </nav>";
	return $html_conteudo;
	
}


// Custom filter function to modify default gallery shortcode output
function minhocco_home_separa_galerias($html_conteudo){
	//separa as divs das galerias usando regex
	preg_match_all('/<div[^>]+>(.*?)<\/div>/s',$html_conteudo, $divs_galerias);
	return $divs_galerias[0];
}

function minhocco_brincadeiras_separa_galerias($html_conteudo){
	//separa as divs das galerias usando regex
	preg_match_all('/<div[^>]+>(.*?)<\/div>/s',$html_conteudo, $divs_galerias);
	return $divs_galerias[0];
}

function minhocco_guarda_roupa_separa_galerias($html_conteudo){
	//separa as divs das galerias usando regex
	$array_geral = array();
	preg_match_all('/<div[^>]+>(.*?)<\/div>/s',$html_conteudo, $divs_galerias);
	
	preg_match_all('/<hr \/>(.*)/s',$html_conteudo, $popup);
	array_push($array_geral, $divs_galerias[0][0]);
	preg_match_all('/<h[^>]+>(.*?)<\/h[^>]>(.*)/s', $popup[1][0], $popup_conteudo);
	array_push($array_geral, $popup_conteudo[1][0]);
	array_push($array_geral, $popup_conteudo[2][0]);
	return $array_geral;
	
}

function minhocco_contato_separa_galerias($html_conteudo){
	//separa as divs das galerias usando regex
	preg_match_all('/<div[^>]+>(.*?)<\/div>/s',$html_conteudo, $divs_galerias);
	return $divs_galerias[0];
}

//menu util
//se houver filhos dessa página, retorna o primeiro filho
function minhocco_checar_se_ha_pai(){
	global $post;
	return $post->post_parent; 
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
	'<nav>
      <ul class="block-line colx2">
        <li class="col">
        <a href='.$alts[0].'>
          <img '.$srcs[0].' />
        </a>
       </li><li class="col">
        <a href='.$alts[1].'>
          <img '.$srcs[1].' />
         </li>
      </ul>
    </nav>';
  return $html_conteudo;
}


function minhocco_brincadeiras_galeria_1($div_galeria_1){
	$alts_e_srcs = minhocco_extrair_alts_e_srcs($div_galeria_1[0]);
	
	$alts = $alts_e_srcs[0];
	$srcs = $alts_e_srcs[1];
	
	//criando o loop para retornar o html montado
	$html_conteudo = 
	 '
    <ul class="block-line colx2">';
    for($i = 1; $i < count($srcs); $i++){
        $html_conteudo = $html_conteudo.'<li>
        <a href='.$alts[$i].'><img '.$srcs[$i].' /></a>
        </li>';
    }
    $html_conteudo = $html_conteudo.'</ul>
  ';
  return $html_conteudo;
}

function minhocco_a_minhocco_galeria_1($div_galeria_1){
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


function minhocco_guarda_roupa_galeria_1($div_galeria_1){
	
	$alts_e_srcs = minhocco_extrair_alts_e_srcs($div_galeria_1);
	
	$alts = $alts_e_srcs[0];
	$srcs = $alts_e_srcs[1];
	
	//criando o loop para retornar o html montado
	$html_conteudo = 
	 '<fl-banner class="banner-masked">
    <ul>';
    for($i = 0; $i < count($srcs); $i++){
    		$url = str_replace('src=', '', $srcs[$i]);
    		$url = str_replace('"', "", $url);
        $html_conteudo = $html_conteudo.'<li>
        <a href='.$alts[$i].'>
        <div class="banner-mask" style="background-image:url('.$url.')"></div>
        <img '.$srcs[$i].' /></a>
        </li>';
    }
    $html_conteudo = $html_conteudo.'</ul>
  </fl-banner>';
  return $html_conteudo;
}

function minhocco_guarda_roupa_popup_1($titulo, $texto){
	$html_conteudo = '<div class="popup-encap">
      <input class="popup-ctrl" id="popup-ctrl" type="checkbox" aria-hidden="true" checked/>
      <label class="popup-sprt" for="popup-ctrl" aria-hidden="true"></label>
      <div class="popup">
        <h1>'.$titulo.'</span></h1>
        <p>'.$texto.'</p>
      </div>
      <label class="popup-sprt fechar" for="popup-ctrl" aria-hidden="true"></label>
    </div>';
    return $html_conteudo;
  
}

function minhocco_universo_galeria_1($div_galeria_1){
	$alts_e_srcs = minhocco_extrair_alts_e_srcs($div_galeria_1);
	
	$alts = $alts_e_srcs[0];
	$srcs = $alts_e_srcs[1];
	
	//criando o loop para retornar o html montado
	$html_conteudo = 
	 '<nav>
      <ul class="block-line colx3">';
    for($i = 0; $i < count($srcs); $i++){
        $html_conteudo = $html_conteudo.'<li class="col">
        <a href='.$alts[$i].'><img '.$srcs[$i].' /></a>
        </li>';
    }
    $html_conteudo = $html_conteudo.'</ul>
    </nav>';
  return $html_conteudo;
}


function minhocco_contato_galeria_1($div_galeria_1){
	$alts_e_srcs = minhocco_extrair_alts_e_srcs($div_galeria_1);
	
	$alts = $alts_e_srcs[0];
	$srcs = $alts_e_srcs[1];
	
	//criando o loop para retornar o html montado
	$html_conteudo = 
	 '<nav>
      <ul class="block-line colx3">';
    for($i = 0; $i < count($srcs); $i++){
        $html_conteudo = $html_conteudo.'<li class="col">
        <a href='.$alts[$i].'><img '.$srcs[$i].' /></a>
        </li>';
    }
    $html_conteudo = $html_conteudo.'</ul>
    </nav>';
  return $html_conteudo;
}

function minhocco_contato_separa_conteudo($conteudo){
	//separa as divs das galerias usando regex
	$html = array();
	preg_match_all('/(.*?)<hr \/>(.*)/s', $conteudo, $divs);
	preg_match_all('/(.*?)\r/s', $divs[1][0], $linhas);
	array_push($html, $linhas[0]);
	array_push($html, $divs[2][0]);
	return $html;
}

function minhocco_contato_main_superior($html_1){
	
	$html_conteudo = '';
	$i = 0;
	$html_conteudo = $html_conteudo.$html_1[$i];
	$i++;
	$html_conteudo = $html_conteudo.'<address>';
	while( strpos($html_1[$i], '<h1>')===false ){
		$html_conteudo = $html_conteudo.'<div>'.trim($html_1[$i]).'</div>';
		$i++;
	}
	$html_conteudo = $html_conteudo.'</address>';
	$html_conteudo = $html_conteudo.$html_1[$i];
	$i++;
	while( $i < count($html_1) ){
		$html_conteudo = $html_conteudo.'<div>'.trim($html_1[$i]).'</div>';
		$i++;
	}
	return $html_conteudo;
	
}

function minhocco_contato_main_inferior($html_2){
	preg_match('/(.*?)([a-z]+@([a-z]|\.)+)/s', $html_2, $email);
	
	$html_conteudo = trim($email[1]).' <a href="mailto:'.$email[2].'">'.$email[2]."</a>";
	return $html_conteudo;
}