<?php
/*
 * Template Name: Contacto
 * Description: todo lo de contacto
 */

//Create a new WP_Query Object
$query = new WP_Query("category_name=contacto");
$panelNumeber =0;
?>

<?php get_header(); ?>

<div id="main">
	

	<?php if( $query->have_posts() ) :
		while ($query->have_posts()) : $query->the_post(); ?>



			<!-- <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2> -->


			<h4 class="copy">
				<?php the_content(); ?>
				<br>
			</h4>

		<?php endwhile;
		endif; ?>
		<?php wp_reset_query(); ?>

		<div class="copy">
			<p> Ana Luz Smith - <?php  the_field("email"); ?>       </p>
			<p> Curriculums  - <?php  the_field("email_cv"); ?>    </p>
			<p> Oficina -  <?php  the_field("tel"); ?>  		   </p>
			<p> Celular <?php  the_field("cel"); ?>			 </p>
	  </div>
		<div> 
			<?php  the_field("text_cv"); ?>
		</div>
		<div>
			<?php $id_privacidad = get_field("extra_info");  ?>
		</div>


</div>
<?php get_footer(); ?>