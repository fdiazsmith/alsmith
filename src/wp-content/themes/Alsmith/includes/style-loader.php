<?php

  /**
   *
   * Script Loader - alsmith 2015 Theme
   *
   * @package   alsmith Template 2014
   * @author    Fernando Diaz Smith
   * @link      http://alsmith.com.mx
   * @copyright 2015 alsmith llc.
   *
   */

  /* ( FRONT END ) ENQUEUE STYLES
   -------------------------------------------------- */

  add_action( 'wp_enqueue_scripts', 'alsmith_enqueue_styles' );

  function alsmith_enqueue_styles() {

    $styles_array = [];

    $page_title = strtolower(get_the_title(get_the_ID()));

    if (is_admin()) return;

    if(!$page_title) return;


    // temporary? bootstrap loader
    array_push($styles_array, $main = array (
      'handle'    => 'bootstrap',
      'src'       => get_template_directory_uri() . '/css/bootstrap-min.css',
      'deps'      => 'array()',
      'media'     => 'screen',
      'ver'       => '1.0'
    ));
    // main styles 
    array_push($styles_array, $main = array (
      'handle'    => 'main',
      'src'       => get_template_directory_uri() . '/css/main.css',
      'deps'      => 'array()',
      'media'     => 'screen',
      'ver'       => '1.0'
    ));

  
    switch($page_title) {

      case 'home' : //home page styles

        array_push($styles_array, $home_page = array (
          'handle'    => 'home-page',
          'src'       => get_template_directory_uri() . '/css/home.css',
          'deps'      => 'array()',
          'media'     => 'screen',
          'ver'       => '1.0'
        ));

        break;


      case 'work' : //work page styles

        array_push($styles_array, $home_page = array (
          'handle'    => 'work-page',
          'src'       => get_template_directory_uri() . '/core/styles/work-page.css',
          'deps'      => 'array()',
          'media'     => 'screen',
          'ver'       => '1.0'
        ));

        break;

    } //endswitch (page)

    foreach($styles_array as $value) {

      wp_register_style( 
         $value['handle'],
         $value['src'],
         $value['deps'],
         $value['ver'],
         $value['media']
      );
      
      wp_enqueue_style( 
         $value['handle'],
         $value['src'],
         $value['deps'],
         $value['ver'],
         $value['media']
      );
    }
  }

  /* ( ADMIN ) ENQUEUE STYLES
     -------------------------------------------------- 

  add_action( 'admin_enqueue_scripts', 'enqueue_admin_styles' );

  function enqueue_admin_styles() {

    global $typenow;

    $styles_array = [];

    if($typenow == 'page') { // add custom page styles

      $template_file = get_template_filename();
      if(!$template_file) return;

      //common styles for page editor screens:
      array_push($styles_array, $edit_home_page = array (
        'handle'    => 'edit-page',
        'src'       => get_template_directory_uri() . '/core/styles/edit-page.css',
        'deps'      => 'array()',
        'media'     => 'screen',
        'ver'       => '1.0'
      ));

      switch($template_file) {

        // specific page editor styles:

        case 'home.php' : //home page admin styles

          /* Works admin screen styles
             -------------------------------------------------- *
          // array_push($styles_array, $edit_home_page = array (
          //   'handle'    => 'edit-home-page',
          //   'src'       => get_template_directory_uri() . '/core/styles/edit-home-page.css',
          //   'deps'      => 'array()',
          //   'media'     => 'screen',
          //   'ver'       => '1.0'
          // ));

          break;

      } //endswitch (page)

    } else { // add custom post type styles

      // common styles for post-type editor screens:

      //ChromePhp::log("enqueing editor style");

      array_push($styles_array, $edit_post_type = array (
        'handle' => 'edit-post-type',
        'src'    => get_template_directory_uri() . '/core/styles/edit-post-type.css',
        'deps'   => 'array()',
        'media'  => 'screen',
        'ver'    => '1.0'
      ));

      switch($typenow) {

        // specific post type editor styles:

        case 'works'     :
          break;
        case 'team'      :
          break;
        case 'news'      : 
          break;
        case 'locations' :
          break;
        case 'clients'   :
          break;
        default          :
          break; 

      } //endswitch (posttype)

    } // endif

    foreach($styles_array as $value) {

      wp_register_style( 
         $value['handle'],
         $value['src'],
         $value['deps'],
         $value['ver'],
         $value['media']
      );
      
      wp_enqueue_style( 
         $value['handle'],
         $value['src'],
         $value['deps'],
         $value['ver'],
         $value['media']
      );
    }
  }
?>
*/