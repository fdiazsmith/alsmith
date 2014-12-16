<?php

  /**
   *
   * About Page Editor - Custom Metaboxes
   *
   * @package   Alsmith 2015
   * @author    Fernando Diaz Smith
   * @copyright Free to copy
   *
   */
  
  add_action('add_meta_boxes', 'add_about_page_custom_metaboxes');

  function add_about_page_custom_metaboxes() {

    $template_file = get_template_filename();
    if(!$template_file) return;

    /* Custom Meta Boxes for Pages
       -------------------------------------------------- */

    if ($template_file == 'about.php') {
      add_meta_box (
        'about_page_meta',              // id
        'About Info' ,                // label
        'render_about_page_meta_boxes', // callback
        'page',                         // post type
        'normal',                       // context
        'default'                       // priority 
      );
    }
  }

  /**
   *
   * HTML for Home Custom Metaboxes
   *
   */

  function render_about_page_meta_boxes() {

    add_editor_style( 'custom-editor-style.css' );

    global $post;
    global $num_about_page_clients;
    global $num_about_page_awards;

    $meta = get_post_custom( $post->ID ); //get stored meta data

    $about_page_clients_array = [];
    $about_page_awards_array = [];

    // featured clients
    for ($i = 0; $i < $num_about_page_clients; $i++) {
      array_push( $about_page_clients_array, isset( $meta['about_page_client' . ($i + 1)][0] ) ? $meta['about_page_client' . ($i + 1)][0] : '' );
    }

    // featured awards
    for ($i = 0; $i < $num_about_page_awards; $i++) {
      array_push( $about_page_awards_array, isset( $meta['about_page_award' . ($i + 1)][0] ) ? $meta['about_page_award' . ($i + 1)][0] : '' );
    }

    $about_content_1  = ! isset( $meta[ 'about_content_1' ][0] ) ? '' : $meta[ 'about_content_1' ][0];
    $about_content_2  = ! isset( $meta[ 'about_content_2' ][0] ) ? '' : $meta[ 'about_content_2' ][0];
    $about_clients_blurb  = ! isset( $meta[ 'about_clients_blurb' ][0] ) ? '' : $meta[ 'about_clients_blurb' ][0];

    wp_nonce_field( basename( __FILE__ ), 'about_fields_nonce' );

    // Register our callback to the appropriate filter
    add_filter('mce_buttons_2', 'my_mce_buttons_2');

    // Attach callback to 'tiny_mce_before_init' 
    add_filter( 'tiny_mce_before_init', 'about_mce_before_init_insert_formats' );

  ?>

  <section id="about_page_editor">
    
    <h3>Content (Section 1)</h3>
    <table class="">
      <tr><td class='td-editor'>
      <?php wp_editor( $about_content_1, 'about_content_1', array( 
      'textarea_name'    => 'about_content_1',
      'textarea_rows'    => 5,
      'wpautop'          => true,
      'drag_drop_upload' => false,
      'media_buttons'    => false )); 
      ?>
    </td></tr>
    </table>

    <h3>Content (Section 2)</h3>
    <table class="">
      <tr><td class='td-editor'>
      <?php wp_editor( $about_content_2, 'about_content_2', array( 
      'textarea_name'    => 'about_content_2',
      'textarea_rows'    => 5,
      'wpautop'          => true,
      'drag_drop_upload' => false,
      'media_buttons'    => false )); 
      ?>
    </td></tr>
    </table>

    <br>
    <hr>

    <!-- FEATURED CLIENTS -->

    <h3>Featured Clients</h3>
    <table class="">
      <tr>
        <th>Client</th>
      </tr>

      <?php $i = 1; while($i <= count($about_page_clients_array)) { ?>
      
      <tr>
        <td>
        <?php
        $args = array( 
          'post_type' => 'clients',
          'order'     => 'ASC',
          'nopaging'  => true,
          'caption'   => 'Clients'
          );

        $query = new WP_Query( $args );

        echo '<select class="link-sel ';
        echo ($about_page_clients_array[ $i - 1 ] == 'none') ? 'unselected" ' : '" ';
        echo 'name="about_page_client' . $i . '">';

        echo '<option value="none" ';
        echo ($about_page_clients_array[ $i - 1 ] == 'none') ? 'selected>' : '>';
        echo 'None</option>';

        while ( $query->have_posts() ) : $query->the_post();
          echo '<option value="' . $post->ID . '" ';
          echo ($about_page_clients_array[ $i - 1 ] == $post->ID) ? 'selected>' : '>';
          the_title();
          echo '</option>';
        endwhile;
        echo '</select>';
        ?>
        </td>
      </tr>

      <?php $i++; }; ?>
    </table>

    
    <h3>Clients Blurb</h3>
    <table class="">
      <tr><td class='td-editor'>
        <?php wp_editor( $about_clients_blurb, 'about_clients_blurb', array( 
        'textarea_name'    => 'about_clients_blurb',
        'textarea_rows'    => 5,
        'wpautop'          => true,
        'drag_drop_upload' => false,
        'media_buttons'    => false )); 
        ?>
      </td></tr>
    </table>

    <br>
    <hr>

    <!-- FEATURED AWARDS -->

    <h3>Featured Awards</h3>
    <table class="">
      <tr>
        <th>Client</th>
      </tr>

      <?php $i = 1; while($i <= count($about_page_awards_array)) { ?>
      
      <tr>
        <td>
        <?php
        $args = array( 
          'post_type' => 'awards',
          'order'     => 'ASC',
          'nopaging'  => true,
          'caption'   => 'Awards'
          );

        $query = new WP_Query( $args );

        echo '<select class="link-sel ';
        echo ($about_page_awards_array[ $i - 1 ] == 'none') ? 'unselected" ' : '" ';
        echo 'name="about_page_award' . $i . '">';

        echo '<option value="none" ';
        echo ($about_page_awards_array[ $i - 1 ] == 'none') ? 'selected>' : '>';
        echo 'None</option>';

        while ( $query->have_posts() ) : $query->the_post();
          echo '<option value="' . $post->ID . '" ';
          echo ($about_page_awards_array[ $i - 1 ] == $post->ID) ? 'selected>' : '>';
          the_title();
          echo '</option>';
        endwhile;
        echo '</select>';
        ?>
        </td>
      </tr>

      <?php $i++; }; ?>
    </table>

  </section>

  <?php 
  }

  /**
   *
   * Custom Meta Save
   *
   */

  function save_about_page_meta( $post_id ) {
    
    global $post;
    global $num_about_page_clients;
    global $num_about_page_awards;

    // verify nonce
    if ( !isset( $_POST['about_fields_nonce'] ) || !wp_verify_nonce( $_POST['about_fields_nonce'], basename(__FILE__) ) ) {
      return $post_id;
    }

    // check if its an autosave
    if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || ( defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']) ) {
      return $post_id;
    }

    // don't save if only a revision!
    if ( isset( $post->post_type ) && $post->post_type == 'revision' ) {
      return $post_id;
    }

    // check permissions
    if ( !current_user_can( 'edit_post', $post->ID ) ) {
      return $post_id;
    }

    // capture $_POST vars from all metabox fields
    for($i = 1; $i <= $num_about_page_clients; $i++) {
      $meta['about_page_client' . $i] = ( isset( $_POST['about_page_client' . $i] ) ? esc_textarea( $_POST['about_page_client' . $i] ) : '' );
    }

     for($i = 1; $i <= $num_about_page_awards; $i++) {
      $meta['about_page_award' . $i] = ( isset( $_POST['about_page_award' . $i] ) ? esc_textarea( $_POST['about_page_award' . $i] ) : '' );
    }

    $meta[ 'about_content_1'] = ( isset( $_POST[ 'about_content_1'] ) ? $_POST[ 'about_content_1'] : '' );
    $meta[ 'about_content_2'] = ( isset( $_POST[ 'about_content_2'] ) ? $_POST[ 'about_content_2'] : '' );
    $meta[ 'about_clients_blurb'] = ( isset( $_POST[ 'about_clients_blurb'] ) ? esc_textarea( $_POST[ 'about_clients_blurb'] ) : '' );

    foreach ( $meta as $key => $value ) {
      if ( get_post_meta( $post->ID, $key, false ) ) {

        // if the custom field already has a value
        update_post_meta( $post->ID, $key, $value );
      } else {

        // if the custom field doesn't have a value
        add_post_meta( $post->ID, $key, $value );
      }
    }
  }

  add_action( 'pre_post_update', 'save_about_page_meta' );
  add_action( 'save_post', 'save_about_page_meta' );

  /* Helper Functions
    -------------------------------------------------- */

  /**
   *
   * Callback function to filter the MCE settings
   *
   */
  
  function about_mce_before_init_insert_formats( $init_array ) {  

    // Define the style_formats array
    $style_formats = array(  
      // Each array child is a format with it's own settings
      array(  
        'title' => 'left_col',  
        'block' => 'div',  
        'classes' => 'left-col',
        'wrapper' => true,
        
      ),  
      array(  
        'title' => 'right_col',  
        'block' => 'div',  
        'classes' => 'right-col',
        'wrapper' => true,
      )
    );  

    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  
  } 

?>