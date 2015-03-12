<?php
/*
Template Name: Als normal
*/
?>

<?php get_header(); ?>
<br>
<br>

<br>
<h1>
</h1>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<h2><?php the_title(); ?></h2>

			<div class="entry">
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				<?php echo the_field('parte_uno'); ?>
				<img src="<?php echo the_field('image', 'url'); ?>" alt="" />

			</div>
		</div>


	<?php endwhile; endif; ?>



<?php get_footer(); ?>