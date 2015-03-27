<?php
/*
 * Template Name: test
 * Description: try new thing here
 */


?>

<?php get_header(); ?>
<br><br><br><br>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			

			<div class="entry">
				<?php the_content(); ?>
			</div>

			<div>custom forms - empieza aqui</div>

			
			<div><?php  the_field("parte_uno"); ?></div>
			<div><?php echo get_field("parte_dos"); ?></div>
			<div><?php echo wp_get_attachment_image(get_field("image", false, false), 'full'); ?></div>
		<!-- 	<?php $image = get_field('image');
			if( !empty($image) ): ?> // this method allow to add costum classes to the image
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			<?php endif; ?> -->

		</div>

	<?php endwhile;
		endif; ?>



<?php get_footer(); ?>