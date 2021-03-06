<?php
add_action('init', 'cm_register_project');
function cm_register_project() {
    register_post_type( 'project', [
            'labels' => [
                'name' => __( 'Projects' ),
                'singular_name' => __( 'Project' ),
                'add_new_item' => 'Add new project',
	            'edit_item' => 'Update project',
	            'all_items' => 'All projects'
            ],
            'description' => 'All of your projects',
            'public' => true,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-format-aside',
            'supports' => ['title'],
            'taxonomies'  => array( 'category' ),
            'has_archive' => true,
            'rewrite' => ['slug' => 'projets'],
        ]
    );
}

add_action('init', 'cm_remove_project_fields');
function cm_remove_project_fields() {
	remove_post_type_support( 'project', 'editor' );
}
