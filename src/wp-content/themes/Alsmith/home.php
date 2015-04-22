<?php
/*
 * Template Name: Home
 * Description: pagina inicial
 */

$bg_img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ),"full" );  
// $bg_img = get_the_post_thumbnail( $query->ID );

//Create a new WP_Query Object
$contacto = new WP_Query("category_name=contacto");

// consider using get_posts() function it might be cleaner 


?>
<?php  get_header(); ?>

<section id="landing-wrapper" >
	<div class="background" style="background-image: url(<?php echo $bg_img[0]; ?> );">
	</div>
	<div id="content-landing">

	<?php if( $contacto->have_posts() ) :?>
  <?php while ($contacto->have_posts()) : $contacto->the_post(); ?>
  
  	
  <div class="top row ">
	  <div class="col-sm-4  " >
			<img class="img-responsive" src="<?php echo get_header_image() ?>">
	  </div>
  </div>
 
	    
		<div class="row">
			<div class=" info" >
				<div class="content col-sm-6 col-md-4 ">
					<h3 class="contacto-title"><span class="land-title">Telefonos</span></h3>
					<div class="land-line"></div>
					<p><strong>officina</strong> <a class="tel" href="tel:+<?php echo $meta_values = get_post_meta( $post->ID, "Telefono", true); ?>"><?php echo $meta_values = get_post_meta( $post->ID, "Telefono", true); ?></a></p>
					<p><strong>celular</strong> <a class="tel" href="tel:+<?php echo $meta_values = get_post_meta( $post->ID, "Celular", true); ?>"><?php echo $meta_values = get_post_meta( $post->ID, "Celular", true); ?></a></p>
				</div>
				<div class="content col-sm-6 col-md-4" >
					<h3 class="contacto-title"><span class="land-title">Email</span></h3>
					<div class="land-line"></div>
					<p><strong>Ana Luz</strong> <a href="mailto:<?php echo $meta_values = get_post_meta( $post->ID, "Email", true); ?>" target="_top"> <?php echo $meta_values = get_post_meta( $post->ID, "Email", true); ?></a></p>
					<p>	<strong>Curriculums</strong> <span>alsmith@alsmith.com.mx</span></p>
				</div> <!-- dir -->
			<div class="chevron-down"><img id="chevron-down" src="<?php echo get_template_directory_uri()?>/images/chevron-down.svg" alt=""></div>
			</div>
		</div>

	  <?php endwhile; ?>
	<?php endif; ?>
	</div>
</section>

<div id="main">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  <div class="panel panel-default">
			<?php
				wp_reset_query();
				$query = new WP_Query("category_name=Home");
				$panelNumeber = 0;
				 if( $query->have_posts() ) :
					 while ($query->have_posts()) : $query->the_post(); 
						 ?> 
							<?php $panelNumeber = $panelNumeber + 1; ?>
							    <div class="panel-heading" role="tab" id="heading-<?php echo $panelNumeber?>">
							      <h2 class="panel-title">
							        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $panelNumeber ?>" aria-expanded="true" aria-controls="collapse-<?php echo $panelNumeber ?>">
							          <?php the_title() ?>
							        </a>
							      </h2>
							    </div>
							    <div id="collapse-<?php echo $panelNumeber ?>" class="panel-collapse collapse <?php if ($panelNumeber ==1) echo 'in'?>" role="tabpanel" aria-labelledby="headingOne">
							      <div class="panel-body" style="background-image: url(<?php echo get_the_post_thumbnail( $query->ID, 'thumbnail' );?> )">
							        <?php the_content() ?>
							      </div>
							    </div>
										
			<?php
					endwhile;
				endif; 
			?>
 	  </div>
	</div>

</div><!-- /main -->


<?php get_footer(); ?>