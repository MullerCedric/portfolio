<?php
add_action( 'init', 'cm_remove_page_fields' );
function cm_remove_page_fields() {
	remove_post_type_support( 'page', 'editor' );
	remove_post_type_support( 'page', 'revisions' );
	remove_post_type_support( 'page', 'page-attributes' );
}
