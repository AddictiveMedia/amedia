<?php
// Register Custom Post Type
function knewton_custom_type_types() {

	$labels = array(
		'name'                => _x( 'Partners', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Partners', 'text_domain' ),
		'name_admin_bar'      => __( 'Post Type', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Partner:', 'text_domain' ),
		'all_items'           => __( 'All Partners', 'text_domain' ),
		'add_new_item'        => __( 'Add New Partner', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Partner', 'text_domain' ),
		'edit_item'           => __( 'Edit Partner', 'text_domain' ),
		'update_item'         => __( 'Update Partner', 'text_domain' ),
		'view_item'           => __( 'View Partners', 'text_domain' ),
		'search_items'        => __( 'Search Partners', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);

	$args = array(
		'label'               => __( 'partners', 'text_domain' ),
		'description'         => __( 'Partners', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
		'taxonomies'          => array(),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'partners', $args );



    $labels = array(
        'name'                       => _x( 'Continent', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Continents', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Continents', 'text_domain' ),
        'all_items'                  => __( 'All Continents', 'text_domain' ),
        'parent_item'                => __( 'Parent Continents', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Continents:', 'text_domain' ),
        'new_item_name'              => __( 'New Continents name', 'text_domain' ),
        'add_new_item'               => __( 'Add new Continents', 'text_domain' ),
        'edit_item'                  => __( 'Edit Continents', 'text_domain' ),
        'update_item'                => __( 'Update Continents', 'text_domain' ),
        'view_item'                  => __( 'View Continents', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Continents with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Continents', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Continents', 'text_domain' ),
        'search_items'               => __( 'Search Continents', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'continents', array( 'partners' ), $args );

    $labels = array(
        'name'                       => _x( 'Subject', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Subjects', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Subjects', 'text_domain' ),
        'all_items'                  => __( 'All Subjects', 'text_domain' ),
        'parent_item'                => __( 'Parent Subjects', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Subjects:', 'text_domain' ),
        'new_item_name'              => __( 'New Subjects name', 'text_domain' ),
        'add_new_item'               => __( 'Add new Subjects', 'text_domain' ),
        'edit_item'                  => __( 'Edit Subjects', 'text_domain' ),
        'update_item'                => __( 'Update Subjects', 'text_domain' ),
        'view_item'                  => __( 'View Subjects', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Subjects with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Subjects', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Subjects', 'text_domain' ),
        'search_items'               => __( 'Search Subjects', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'subjects', array( 'partners' ), $args );

    $labels = array(
        'name'                       => _x( 'Grade Level', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Grade Levels', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Grade Levels', 'text_domain' ),
        'all_items'                  => __( 'All Grade Levels', 'text_domain' ),
        'parent_item'                => __( 'Parent Grade Levels', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Grade Levels:', 'text_domain' ),
        'new_item_name'              => __( 'New Grade Levels name', 'text_domain' ),
        'add_new_item'               => __( 'Add new Grade Levels', 'text_domain' ),
        'edit_item'                  => __( 'Edit Grade Levels', 'text_domain' ),
        'update_item'                => __( 'Update Grade Levels', 'text_domain' ),
        'view_item'                  => __( 'View Grade Levels', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate Grade Levels with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove Grade Levels', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Grade Levels', 'text_domain' ),
        'search_items'               => __( 'Search Grade Levels', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'grade-levels', array( 'partners' ), $args );



	register_post_type(
        'newsletter', array(
            'labels' => array(
                'name' => 'Newsletter',
                'singular_name' => 'Newsletter',
                'add_new' => 'Add new Newsletter',
                'add_new_item' => 'Add new Newsletter',
                'new_item' => 'New Newsletter',
                'view_item' => 'View Newsletter',
                'edit_item' => 'Edit Newsletter'
            ),
            'has_archive' => true,
            'query_var' => true,
            'capability_type' => 'page',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'supports' => array('title', 'editor'),
            'exclude_from_search' => false,
            'rewrite' => array('slug' => 'newsletters', 'with_front' => false),
        )
    );

    register_post_type(
        'faq', array(
            'labels' => array(
                'name' => 'FAQs',
                'singular_name' => 'FAQ',
                'add_new' => 'Add new FAQ',
                'add_new_item' => 'Add new FAQ',
                'new_item' => 'New FAQ',
                'view_item' => 'View FAQ',
                'edit_item' => 'Edit FAQ'
            ),
            'has_archive' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'platform/faq', 'with_front' => false),
            'capability_type' => 'page',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'hierarchical' => true,
            'supports' => array('title', 'editor'),
            'exclude_from_search' => true
        )
    );

    register_post_type(
        'projector', array(
            'labels' => array(
                'name' => 'Projectors',
                'singular_name' => 'Projector',
                'add_new' => 'Add new Projector',
                'add_new_item' => 'Add new Projector',
                'new_item' => 'New Projector',
                'view_item' => 'View Projector',
                'edit_item' => 'Edit Projector'
            ),
            'has_archive' => false,
            'query_var' => true,
            'capability_type' => 'page',
            'public' => true,
            'show_ui' => true,
            'rewrite' => array('slug' => 'projector-new', 'with_front' => false),
            'show_in_menu' => true,
            'hierarchical' => true,
            'supports' => array('title'),
            'exclude_from_search' => true
        )
    );

    register_post_type(
        'quote', array(
            'labels' => array(
                'name' => 'Quotes',
                'singular_name' => 'Quotes',
                'add_new' => 'Add new Quote',
                'add_new_item' => 'Add new Quote',
                'new_item' => 'New Quotes',
                'view_item' => 'View Quote',
                'edit_item' => 'Edit Quote'
            ),
            'has_archive' => false,
            'query_var' => true,
            'capability_type' => 'page',
            'public' => true,
            'show_ui' => true,
            'rewrite' => array('slug' => 'quotes', 'with_front' => false),
            'show_in_menu' => true,
            'hierarchical' => false,
            'supports' => array('title', 'thumbnail'),
            'exclude_from_search' => true
        )
    );

    register_post_type(
        'resources', array(
            'labels' => array(
                'name' => 'Resources',
                'singular_name' => 'Resource',
                'add_new' => 'Add new Resource',
                'add_new_item' => 'Add new Resource',
                'new_item' => 'New Resources',
                'view_item' => 'View Resource',
                'edit_item' => 'Edit Resource'
            ),
            'has_archive' => true,
            'query_var' => true,
            'capability_type' => 'page',
            'public' => true,
            'show_ui' => true,
            // 'rewrite' => array('slug' => 'quotes', 'with_front' => false),
            'show_in_menu' => true,
            'hierarchical' => true,
            'supports' => array('title'),
            'exclude_from_search' => true
        )
    );

    $labels = array(
        'name'                       => _x( 'Resource Categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Resource Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Resource Category', 'text_domain' ),
        'all_items'                  => __( 'All categories', 'text_domain' ),
        'parent_item'                => __( 'Parent category', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent category:', 'text_domain' ),
        'new_item_name'              => __( 'New category name', 'text_domain' ),
        'add_new_item'               => __( 'Add new category', 'text_domain' ),
        'edit_item'                  => __( 'Edit category', 'text_domain' ),
        'update_item'                => __( 'Update category', 'text_domain' ),
        'view_item'                  => __( 'View category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular categories', 'text_domain' ),
        'search_items'               => __( 'Search categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'resource_categories', array( 'resources' ), $args );

    $array = array(
        'label' => 'Press Releases',
        'description' => 'Press Releases',
        'public' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'capability_type' => 'post',
        'hierarchical' => false,
        'has_archive' => true,
        'query_var' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author' ),
        'labels' => array (
            'name' => 'Press Releases',
            'singular_name' => 'Press Release',
            'menu_name' => 'Press Releases',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Press Release',
            'edit' => 'Edit',
            'edit_item' => 'Edit Press Release',
            'new_item' => 'New Press Release',
            'view' => 'View',
            'view_item' => 'View Press Release',
            'search_items' => 'Search Press Releases',
            'not_found' => 'No Press Releases Found',
            'not_found_in_trash' => 'No Press Releases found in Trash',
            'parent' => 'Parent Press Release'
        ),
        'rewrite' => array('slug' => 'resources/press', 'with_front' => false)
    );

    register_post_type( 'press-release', $array);
    add_filter('page-links-to-post-types', 'knewton_page_links_to_post_types');
    flush_rewrite_rules();

    $array = array(
        'label' => 'Press slides',
        'description' => 'Press slides',
        'public' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'capability_type' => 'page',
        'hierarchical' => true,
        'has_archive' => true,
        'query_var' => true,
        'supports' => array( 'title'),
        'labels' => array (
            'name' => 'Press slides',
            'singular_name' => 'Press slide',
            'menu_name' => 'Press slides',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Press slide',
            'edit' => 'Edit',
            'edit_item' => 'Edit Press slide',
            'new_item' => 'New Press slide',
            'view' => 'View',
            'view_item' => 'View Press slide',
            'search_items' => 'Search Press slides',
            'not_found' => 'No Press slides Found',
            'not_found_in_trash' => 'No Press slides found in Trash',
            'parent' => 'Parent Press slide'
        )
    );

    register_post_type( 'press-slides', $array);

}

// Hook into the 'init' action
add_action( 'init', 'knewton_custom_type_types', 0 );

function knewton_page_links_to_post_types($post_types) {
    return array('press-release');
}

?>