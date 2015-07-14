<?php
/**
 * Menu geral - mostra o menu
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Minhocco
 * @since Minhocco 1.0
 */
?>
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
  
  //verifica se a página tem filhos. se sim, redireciona pro primeiro filho
  $ref_id = minhocco_checar_se_ha_pai();
  if($ref_id != null){
   echo minhocco_submenu($ref_id);
  }
  
  
?>
</header> 
