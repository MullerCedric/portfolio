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
	if ( empty( $title ) ) {
		$title = the_title();
	}
	$title .= ' - ' . get_bloginfo( 'name' );

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
	add_image_size( 'cm-project', 500, 550, true );
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