<?php
/*
 * Template Name: Metodologia
 * Description: Description
 */

//Create a new WP_Query Object
$query = new WP_Query("category_name=metodologia&post_status=publish");
$panelNumeber =0;
?>

<?php get_header(); ?>

<div id="main">

	<?php if( $query->have_posts() ) :
 			while ($query->have_posts()) : $query->the_post(); ?>
			<?php $panelNumeber = $panelNumeber + 1; ?>

						<div class="panel-group core" id="accordion" role="tablist" aria-multiselectable="true">
						  <div class="panel panel-default ">
							    <div class="panel-heading" role="tab" id="heading-<?php echo $panelNumeber?>">
							      <h2 class="panel-title">
							        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $panelNumeber ?>" aria-expanded="true" aria-controls="collapse-<?php echo $panelNumeber ?>">
							          <?php the_title() ?>
							        </a>
							      </h2>
							    </div>
							    <div id="collapse-<?php echo $panelNumeber ?>" class="panel-collapse collapse e <?php if ($panelNumeber ==1) echo 'in'?>" role="tabpanel" aria-labelledby="headingOne">
							      <div class="panel-body" style="background-image: url(<?php  get_the_post_thumbnail( $query->ID, 'large' );?> )">
							         <?php the_content() ;?> 
							         <?php 
							         	$addendums = get_field("apendice");
							         	// var_dump($addendums);
							         	echo $addendums->post_content;
							         ?> 
							      </div>
							    </div>
							</div>
						</div>
	<?php 
			endwhile; 
		endif; ?>




</div><!-- /main -->
<?php get_footer(); ?>