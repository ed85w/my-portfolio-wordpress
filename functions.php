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


?>