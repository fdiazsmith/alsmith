<?php get_header(); 
 $panelNumeber = 1;
?>
<br><br><br><br>
<div id="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		$bg_img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ),"full" );
		// if ($bg_img !== null ) echo "string";
	?>

						<?php if ($bg_img != "" ): ?>
												<div class="jumbotron" style="background-image: url(<?php echo $bg_img[0];?> )"></div>
						<?php endif;?>
						<div class="panel-group core" id="accordion" role="tablist" aria-multiselectable="true">
						  <div class="panel panel-default ">
							    <div class="panel-heading" role="tab" id="heading-<?php echo $panelNumeber?>">
							      <h2 class="panel-title">
							        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $panelNumeber ?>" aria-expanded="true" aria-controls="collapse-<?php echo $panelNumeber ?>">
							          <?php the_title() ?>
							        </a>
							      </h2>
							    </div>
							    <div id="collapse-<?php echo $panelNumeber ?>" class="panel-collapse collapse  <?php if ($panelNumeber ==1) echo 'in'?>" role="tabpanel" aria-labelledby="headingOne">
							      <div class="panel-body" style="background-image: url(<?php ?> )">
							        <?php the_content() ?>
							      </div>
							    </div>
							</div>
						</div>

	<?php endwhile; endif; ?>
	
</div>

<?php get_footer(); ?>