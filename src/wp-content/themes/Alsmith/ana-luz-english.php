
<?php
/*
 * Template Name: Ana Luz - english
 * Description: Description
 */
$args = array(
	"category_name" => "ana-luz",
	"tag" => "english"
);
//Create a new WP_Query Object
$query = new WP_Query($args);
$panelNumeber =0;

?>

<?php get_header("english"); ?>





<div id="main">

			<?php if( $query->have_posts() ) :
				 			while ($query->have_posts()) : $query->the_post();
					$bg_img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ),"full" );


				 			?>
								<?php $panelNumeber = $panelNumeber + 1; ?>
											<?php if ($bg_img != ""): ?>
												<div class="jumbotron" style="background-image: url(<?php echo $bg_img[0];?> )"></div>
												<?php endif;?>
									    <div class="panel-heading d" role="tab" id="heading-<?php echo $panelNumeber?>">
									      <h1 class="panel-titlex">
									          <?php the_title() ?>
									      </h1>
									    </div>

									      <div class="d" style="">
									        <?php the_content() ?>
									      </div>

			<?php
						endwhile;
			 		endif; ?>
</div><!-- /main -->

<?php get_footer("english"); ?>
