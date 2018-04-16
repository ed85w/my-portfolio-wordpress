<?php 

/*
	=========================================
	STATIC FILES SETUP
	=========================================
*/

//function to embed custom css & js
function theme_script_enqueue() { 

	// css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('devicons', '//cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css', array() );
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/theme-css.css', array(), '1.0.0', 'all' );

	// js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true);
	wp_enqueue_script('customscript', get_template_directory_uri() . '/js/theme-js.js', array(), '1.0.0', true );
}

//embed custom css & js
add_action('wp_enqueue_scripts', 'theme_script_enqueue');

/*
	=========================================
	THEME MENU FUNCTIONS
	=========================================
*/

// function to setup theme menus
function test_theme_setup() {

	//add 'menus' item to 'appearance' options 
	add_theme_support('menus');

	//register nav 
	register_nav_menu('primary', 'Primary Header Navigation');

	// remove p tags from the_content
	remove_filter( 'the_content', 'wpautop' );

	// remove p tags from the_excerpt
	remove_filter( 'the_excerpt', 'wpautop' );
}

// call functions to setup theme menu
add_action( 'init', 'test_theme_setup');



/*
	=========================================
	THEME SUPPORT FUNCTIONS
	=========================================
*/

// add background image to customisation menu
add_theme_support('custom-background');

// add custom header to appearance menu
add_theme_support( 'custom-header' );

// add post thumbnail image
add_theme_support( 'post-thumbnails' );

// add extra featured images to portfolio post type
add_filter( 'kdmfi_featured_images', function( $featured_images ) {
  $args = array(
    'id' => 'featured-image-2',
    'desc' => 'Portfolio item picture',
    'label_name' => 'Featured Image 2',
    'label_set' => 'Set featured image 2',
    'label_remove' => 'Remove featured image 2',
    'label_use' => 'Set featured image 2',
    'post_type' => array( 'portfolio' ),
  );

  $featured_images[] = $args;

  return $featured_images;
});


/*
	=========================================
	INCLUDE WALKER FILE (for custom/bootstrap dropdown nav etc)
	=========================================
*/

require get_template_directory() . '/inc/walker.php';

/*
	=========================================
	HEAD FUNCTION 
	=========================================
*/

// remove wordpress version from head data (prevent hacks)
function theme_remove_version() {
	return '';
}

add_filter('the_generator', 'theme_remove_version');


/*
	=========================================
	CUSTOM POST TYPE (portfolio)
	=========================================
*/

function theme_custom_post_type(){

	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Project',
		'add_new' => 'Add Project',
		'all_items' => 'All Projects',
		'add_new_item' => 'Add Project',
		'edit_item' => 'Edit Project',
		'new_item' => 'New Project',
		'view_item' => 'View Project',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No Projects Found',
		'not_found_in_trash' => 'No Projects Found in Trash',
		'parent_item_colon' => 'Parent Project'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false, //ie tags
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
			// 'comments' etc
		),
		// 'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false,
	);
	register_post_type('portfolio', $args);

}

add_action('init', 'theme_custom_post_type');

// custom taxonomies for the above

function theme_custom_taxonomies() {
	
	//add new taxonomy, hierarchical
	$labels = array(
		'name' => 'Fields', //always plural!
		'singular_name' => 'Field',
		'search_items' => 'Search Fields',
		'all_items' => 'All Fields',
		'parent_item' => 'Parent Field',
		'parent_item_colon' => 'Parent Field:',
		'edit_item' => 'Edit Field',
		'update_item' => 'Update Field',
		'add_new_item' => 'Add New Field',
		'new_item_name' => 'New Field Name',
		'menu_name' => 'Fields'
	);

	$args = array(
		'hierarchical' => true, //ie categories
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true, //ability to create custom queries
		'rewrite' => array('slug' => 'field'), //rewrite slug (name of taxonomy, lower case - DON'T USE TYPE!)
	);

	//register 'field' taxonomy to 'portfolio' custom post type
	register_taxonomy('field' , array('portfolio'), $args);

}

add_action( 'init', 'theme_custom_taxonomies');

/*
	=========================================
	CUSTOM POST TYPE (portfolio) META BOXES
	=========================================
*/

function portfolio_add_meta_box() {
	add_meta_box('project_link', 'Link to Project', 'theme_project_link_callback', 'portfolio', 'normal', 'high');
}

function theme_project_link_callback($post) {
	wp_nonce_field( 'theme_save_project_link_data', 'theme_portfolio_link_meta_box_nonce' );

	$value = get_post_meta( $post->ID , '_project_link_value_key', true );

	echo '<label for="theme_project_link_field">Link to Project: </label>';
	echo '<input type="text" id="theme_project_link_field" name="theme_project_link_field" value="' . esc_attr($value) . '" size="25" />';
}

function theme_save_project_link_data($post_id) {
	
	if(! isset($_POST['theme_portfolio_link_meta_box_nonce'])){
		return;
	}

	if(! wp_verify_nonce( $_POST['theme_portfolio_link_meta_box_nonce'],'theme_save_project_link_data' )){
		return;
	}

	// prevent autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (! current_user_can( 'edit_post', $post_id )) {
		return;
	}

	if(! isset( $_POST['theme_project_link_field'])) {
		return;
	}

	$my_data = sanitize_text_field($_POST['theme_project_link_field']);

	update_post_meta($post_id, '_project_link_value_key', $my_data );




}

add_action( 'add_meta_boxes', 'portfolio_add_meta_box' );
add_action( 'save_post', 'theme_save_project_link_data' );

?>