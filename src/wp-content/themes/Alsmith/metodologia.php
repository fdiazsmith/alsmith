<?php
/*
 * Template Name: Metodologia
 * Description: Description
 */

//Create a new WP_Query Object
$query = new WP_Query("category_name=metodologia");

?>

<?php get_header(); ?>

<div id="main">
	<br>
	<br>

	<br>
	<h1>
	Metodologia
	</h1>
		<?php if( $query->have_posts() ) :?>
	  <?php while ($query->have_posts()) : $query->the_post(); ?>
	  	<!-- look for has post format  -->
				<!-- <h6> <?php the_title() ?> </h6> -->
		  
	    <h2> <?php the_title() ?> </h2>
	    <?php the_content() ?>
	  <?php endwhile; ?>
	<?php endif; ?>
</div>


<?php get_footer(); ?>