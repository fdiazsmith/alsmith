<?php
/*
 * Template Name: Servicios - english
 * Description: Describe servicios que ofreces aqui.
 */

//Create a new WP_Query Object
// $query = new WP_Query("category_name=servicios&tag_name=algo");
$args = array(
	'category_name' => 'servicios',
	'tag' => 'english'
	);
$query = new WP_Query($args);

?>

<?php get_header("english"); ?>

<div id="main">
	<div id="panel-wrapper" role="tabpanel">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
		<?php $counter = 1;
				 if( $query->have_posts() ) :
				 			while ($query->have_posts()) : $query->the_post();
				 				$ID  = basename(get_permalink()); //sanitize_title_with_dashes($title, "blank", "save"); ?>

				        <li role="presentation" class="<?php if ($counter == 1 )echo 'active'; ?>">
				        	<a href="#<?php echo $ID?>" aria-controls="<?php echo $ID?>" role="tab" data-toggle="tab">
				        		<?php the_title() ?>
			        		</a>
		        		</li>
			<?php $counter++;
							endwhile;
			 		endif; ?>
	 		</ul>



	  <div class="tab-content">
			<?php $counter = 1;
					if( $query->have_posts() ) :
				 			while ($query->have_posts()) : $query->the_post();
								$ID  = basename(get_permalink()); ?>
								  	    <div role="tabpanel" class="tab-pane fade  <?php if ($counter == 1 )echo 'active in'; ?>" id="<?php echo $ID?>">
								  	    	<?php the_content() ?>
								  	    </div>


			<?php $counter++;
							endwhile;
			 		endif; ?>
	 		</div>


	</div><!-- /tabpanel -->

</div><!-- /main -->
<?php get_footer("english"); ?>
