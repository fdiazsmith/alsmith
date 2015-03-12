<?php	//
    // don't show the toolbar // more info at http://codex.wordpress.org/Function_Reference/show_admin_bar
    show_admin_bar( false );
    
    
    // Add RSS links to <head> section
    automatic_feed_links();
    
    // Load jQuery
    if ( !is_admin() ) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("http://code.jquery.com/jquery-latest.min.js"), false, '');
        wp_enqueue_script('jquery');
    }

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    if(function_exists('register_nav_menus')){
        register_nav_menus(
            array(
                'main_nav' => 'Main Navigation'
                )
            );
    }
    //THEME support
    //adds post format
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
    add_theme_support( 'post-thumbnails' );
    $defaults = array(
    'default-image'          => '',
    'random-default'         => false,
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'default-text-color'     => '',
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );


// consider this
// add_image_size('vantage-carousel', 272, 182, true);

if ( function_exists ('register_sidebar')) { 
    register_sidebar ('custom'); 
} 






require('script-loader.php' );
require('style-loader.php' );




    ?>