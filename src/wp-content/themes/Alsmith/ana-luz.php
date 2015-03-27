<?php
/*
 * Template Name: Ana Luz
 * Description: Description
 */

//Create a new WP_Query Object
$query = new WP_Query("category_name=ana-luz");
$panelNumeber =0;
?>

<?php get_header(); ?>

<div id="main">

			<?php if( $query->have_posts() ) :
				 			while ($query->have_posts()) : $query->the_post(); ?>
								<?php $panelNumeber = $panelNumeber + 1; ?>
									    <div class="panel-heading" role="tab" id="heading-<?php echo $panelNumeber?>">
									      <h1 class="panel-titlex">
									          <?php the_title() ?>
									      </h1>
									    </div>
									    
									      <div class="" style="background-image: url(<?php echo get_the_post_thumbnail( $query->ID, 'thumbnail' );?> )">
									        <?php the_content() ?>
									      </div>
									    
			<?php 
						endwhile; 
			 		endif; ?>
</div><!-- /main -->
<?php get_footer(); ?>