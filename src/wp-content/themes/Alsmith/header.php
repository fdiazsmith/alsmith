<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	 
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/favicon.ico">
	
	<!-- <link href='http://fonts.googleapis.com/css?family=Josefin+Slab:100,400,300italic|Open+Sans:400,700|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> -->
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic|Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
	

	<header class="navbar navbar-default navbar-fixed-top affix-top" role="navigation">
		<div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="home">
        <div class="brand " style="background-image: url('<?php echo get_template_directory_uri();?>/images/logo.jpg');" >   
	        <?php// echo get_option('home'); ?> <?php //bloginfo('name'); ?>
          <div class="navbar-brand als" href="#"><span class="Al">AL</span><span class="Smith">Smith</span> <span class="associados">y Associados</span></div>
        </div>
      </a>
      
    </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right " id="nav-links">
			  <?php //code to be replaced the abo
					// Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)
					// This code based on wp_nav_menu's code to get Menu ID from menu slug

					$menu_name = 'main_nav';

					if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
					// if ( flase) {
						$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
							// $menu = wp_get_nav_menu_object( 'main_nav');

						$menu_items = wp_get_nav_menu_items($menu->term_id);

						$menu_list = '<ul class="nav navbar-nav navbar-left " id="menu-' . $menu_name . '">';

						foreach ( (array) $menu_items as $key => $menu_item ) {
							$title = $menu_item->title;
							$url = $menu_item->url;
							$menu_list .= '<li class="nav-button"><a href="' . $url . '">' . $title . '</a></li>';
						}
						$menu_list .= '</ul>';
					} else {
						$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
					}
			   // $menu_list now ready to output
					print $menu_list;
       ?>

    </div> <!-- /.navbar-collapse -->
	  </div>
	</header>


