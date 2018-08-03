<?php
// Removes unwanted tabs in the admin panel
add_action( 'admin_menu', 'cm_remove_menu_pages' );
function cm_remove_menu_pages() {
	remove_menu_page( 'edit.php' );                   //Posts
	remove_menu_page( 'edit-comments.php' );          //Comments
}
