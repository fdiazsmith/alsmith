<?php
/*
 * Template Name: Contacto
 * Description: todo lo de contacto
 */

//Create a new WP_Query Object
$query = new WP_Query("category_name=contacto");
$panelNumeber =0;
?>

<br><br><br><br><br><br>

<?php get_header(); ?>

<div id="main">
	

	<?php if( $query->have_posts() ) :
		while ($query->have_posts()) : $query->the_post(); ?>



			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>


			<div class="entry">
			<?php the_content(); ?>
			</div>

		<?php endwhile;
		endif; ?>
		<?php wp_reset_query(); ?>
		<div> <?php  the_field("email"); ?>       </div>
		<div> <?php  the_field("email_cv"); ?>    </div>
		<div> <?php  the_field("tel"); ?>  		   </div>
		<div> <?php  the_field("cel"); ?>			   </div>
		<div> <?php  the_field("text_cv"); ?>		  </div>
		<div> <?php  the_field("extra_info");  ?>  </div>

</div>
<?php get_footer(); ?>