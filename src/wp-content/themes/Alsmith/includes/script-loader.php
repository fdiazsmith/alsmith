<?php 

/**
 *
 * Script Loader - Tellart 2014 Theme
 *
 * @package   Alsmith 2015
 * @author    Fernando Diaz
 * @link      Alsmith.
 * @copyright 2014 alsmith sa de cv
 *
 */


/**
 * Proper way to enqueue scripts and styles
 */
// function alsmith_scripts() {
//   // wp_enqueue_style( 'style-name', get_stylesheet_uri() );
//   wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/index.js', array(), '1.0.0', true );
// }

add_action( 'wp_enqueue_scripts', 'alsmith_frontend_scripts' );

// add_action( 'wp_enqueue_scripts', 'load_frontend_scripts' );

function alsmith_backend_scripts() {

  global $typenow;

  $scripts_array = [];

 /**
  *
  * ENQUEUE ADMIN SCRIPTS
  *
  */

  // shared scripts for all admin posts or pages


  array_push($scripts_array, $app_config = array (
    'handle'    => 'index',
    'src'       => get_template_directory_uri() . '/js/index.js',
    'deps'      => array('jquery'),
    'in_footer' => true,
    'ver'       => '1.0'
  ));
  

  if($typenow == 'page') { // add custom page scripts

    $template_file = get_template_filename();

    if(!$template_file) return;

    switch($template_file) {

      case 'metodologia.php' : //home page admin scripts

        array_push($scripts_array, $edit_home_page = array (
          'handle'    => 'metodologia',
          'src'       => get_template_directory_uri() . '/js/edit-home-page.js',
          'deps'      => array('jquery'),
          'in_footer' => false,
          'ver'       => '1.0'
        ));

        break;

      case 'home.php' : //work page admin scripts

        array_push($scripts_array, $edit_work_page = array (
          'handle'    => 'home',
          'src'       => get_template_directory_uri() . '/js/edit-home-page.js',
          'deps'      => array('jquery'),
          'in_footer' => false,
          'ver'       => '1.0'
        ));

        break;

    } //endswitch (page)

  } else { // add custom post type scripts

    switch($typenow) {

      case 'home' :

        /* Works admin screen script
           -------------------------------------------------- */
        array_push($scripts_array, $edit_works_post_type = array (
          'handle'    => 'edit-works-post-type',
          'src'       => get_template_directory_uri() . '/js/main.js',
          'deps'      => array('jquery'),
          'in_footer' => false,
          'ver'       => '1.0'
        ));

        break;
        
        case 'news' :

        array_push($scripts_array, $news = array (
            'handle'    => 'meta-image-upload',
            'src'       => get_template_directory_uri() . '/core/scripts/news.js',
            'deps'      => array('jquery'),
            'in_footer' => false,
            'ver'       => '1.0'
        ));
        break;

    } //endswitch (posttype)

  } // endif
  

  foreach($scripts_array as $value) {
    
    wp_register_script( 
       $value['handle'],
       $value['src'],
       $value['deps'],
       $value['ver'],
       $value['in_footer']
    );
    
    wp_enqueue_script( 
       $value['handle'],
       $value['src'],
       $value['deps'],
       $value['ver'],
       $value['in_footer']
    );

    // handle special cases

    // if($value['handle'] == 'meta-image-upload') {
    //   localize_image_upload();
    // }
  }
}

function alsmith_frontend_scripts() {
  
  if (is_admin()) return;

  /**
   *
   * ENQUEUE FRONT-END SCRIPTS
   *
   */

  // shared frontend scripts

  $scripts_array = array (

    'app-bootstrap' => array (
      'handle'    => 'bootstrap',
      'src'       => get_bloginfo('template_directory') . '/js/bootstrap.min.js',
      'ver'       => '1.0',
      'deps'      => array('jquery'),
      'in_footer' => false
    ),

    'app-main' => array (

      'handle'    => 'main',
      'src'       => get_bloginfo('template_directory') . '/js/main.js',
      'ver'       => '1.0',
      'deps'      => array('jquery'),
      'in_footer' => false
    ),
  );

  if(is_page( 'home' )) {
    
    array_push($scripts_array, $work_page = array (
      'handle'    => 'home-page',
      'src'       => get_template_directory_uri() . '/js/home.js',
      'deps'      => array('jquery'),
      'in_footer' => false,
      'ver'       => '1.0'
    ));
  }

  if(is_page_template( 'metodologia.php' )) {
    
    array_push($scripts_array, $news_page = array (
      'handle'    => 'metodologia-page',
      'src'       => get_template_directory_uri() . '/js/metodologia.js',
      'deps'      => array('jquery'),
      'in_footer' => false,
      'ver'       => '1.0'
    ));
  }
  elseif (is_page_template( 'servicios.php' )) {
    
    array_push($scripts_array, $news_page = array (
      'handle'    => 'servicios-page',
      'src'       => get_template_directory_uri() . '/js/servicios.js',
      'deps'      => array('jquery'),
      'in_footer' => false,
      'ver'       => '1.0'
    ));
  }
  elseif (is_page_template( 'ana-luz.php' )) {
    
    array_push($scripts_array, $news_page = array (
      'handle'    => 'ana-luz-page',
      'src'       => get_template_directory_uri() . '/js/ana-luz.js',
      'deps'      => array('jquery'),
      'in_footer' => false,
      'ver'       => '1.0'
    ));
  }
  elseif (is_page_template( 'contacto.php' )) {
    
    array_push($scripts_array, $news_page = array (
      'handle'    => 'contacto-page',
      'src'       => get_template_directory_uri() . '/js/contacto.js',
      'deps'      => array('jquery'),
      'in_footer' => false,
      'ver'       => '1.0'
    ));
  }

 
  foreach($scripts_array as $value) {

    wp_register_script( 
       $value['handle'],
       $value['src'],
       $value['deps'],
       $value['ver'],
       $value['in_footer']
    );
    
    wp_enqueue_script( 
       $value['handle'],
       $value['src'],
       $value['deps'],
       $value['ver'],
       $value['in_footer']
    );
  }
}

?>
