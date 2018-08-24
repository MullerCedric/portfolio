<?php
include( __DIR__ . '/core/CmPortfolio.php' );
include( __DIR__ . '/core/Menus/Container.php' );
include( __DIR__ . '/core/Menus/Item.php' );

include( __DIR__ . '/core/Post_types/remove_undesirable.php' );
include( __DIR__ . '/core/Post_types/project.php' );

include( __DIR__ . '/core/remove_template_fields.php' );



$CmPortfolio = new CmPortfolio();

/*
 * Handle site tab title
 */
add_filter( 'wp_title', 'cm_tab_title' );
function cm_tab_title( $title ) {
	!empty( $title ) ? $title .= ' - ' . get_bloginfo( 'name' ) : $title .= get_bloginfo( 'name' ) . ', ' . get_bloginfo( 'description' ) ;
	if(is_post_type_archive('project')) $title = ' Mes travaux - ' . get_bloginfo( 'name' );

	return trim( $title );
}

/*
 * Theme navigation menus
 */
add_action( 'init', 'cm_register_menus' );
function cm_register_menus() {
	register_nav_menus( [
		'main-menu' => __( 'Main navigation' ),
		'social-menu' => __( 'List of useful links and social media' )
	] );
}

show_admin_bar( false );

/*
 * Menus controllers
 */
function cm_get_menu( $location ) {
	global $CmPortfolio;
	if ( ! isset( $CmPortfolio->menus ) ) {
		$CmPortfolio->menus = [];
	}
	if ( ! isset( $CmPortfolio->menus[ $location ] ) ) {
		$CmPortfolio->menus[ $location ] = new Container( $location );
	}

	return $CmPortfolio->menus[ $location ];
}

function cm_get_menu_classes( $item, $menu = 'main' ) {
	$classes = 'c-'. $menu .'Menu__link';

	if($menu === 'main') $classes .= ( preg_match( '#^(https?)?://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] .'$#', $item->url) ) ? ' c-mainMenu__links--current' : '';
	if($menu === 'social' AND get_field('icon', $item->id)) $classes .= ' socicon socicon-' . get_field('icon', $item->id);

	if(is_array($item->classes)) {
		foreach ($item->classes as $cssClass) {
			$classes .= ' '.$cssClass;
		}
	}

	return $classes;
}

/*
 * Retrieves the absolute URI for given asset in this theme
 */
function cm_get_theme_asset( $src = '' ) {
	return get_template_directory_uri() . '/assets/' . trim( $src, '/' );
}

/*
 * Creates needed images sizes
 */
add_action( 'after_setup_theme', 'cm_register_image_sizes' );
function cm_register_image_sizes() {
	add_image_size( 'cm-projectThumb', 255, 330, true );
	add_image_size( 'cm-banner', 1170, 754, false );
	add_image_size( 'cm-gallery', 1340, 754, false );
}

/*
 * Retrieves image URL in an image array for a given size
 */
function cm_get_src( $arrImg, $size = 'full' ) {
	if ( is_array( $arrImg ) && isset( $arrImg['sizes'][ $size ] ) ) {
		return $arrImg['sizes'][ $size ];
	}

	return $arrImg['url'] ?? null;
}

/*
 * Handling categories taxonomy for Project post type
 */
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
	if( is_category() ) {
		$post_type = get_query_var('post_type');
		if($post_type)
			$post_type = $post_type;
		else
			$post_type = array('nav_menu_item', 'post', 'project');
		$query->set('post_type',$post_type);
		return $query;
	}
}