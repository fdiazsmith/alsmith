<?php
/*
 * Template Name: Servicios
 * Description: Describe servicios que ofreces aqui. 
 */

//Create a new WP_Query Object
$query = new WP_Query("category_name=servicios&tag_name=algo");

?>

<?php get_header(); ?>

<div id="main">
	<br>
	<br>

	<br>
	<h1>
	Servicios
	</h1>
	<?php if( $query->have_posts() ) :?>
	  <?php while ($query->have_posts()) : $query->the_post(); ?>
	    <?php the_title() ?>
	    <?php the_content() ?>
	  <?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>