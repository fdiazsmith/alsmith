<?php
/*
 * Template Name: Home
 * Description: pagina inicial
 */

//Create a new WP_Query Object
$contacto = new WP_Query("category_name=contacto");

// consider using get_posts() function it might be cleaner 


?>
<?php  get_header(); ?>

<section id="landing-wrapper" >
	<div class="background">
	<?php if( $contacto->have_posts() ) :?>
  <?php while ($contacto->have_posts()) : $contacto->the_post(); ?>
  
  	
  
	  <div class="col-sm-4">
			<img class="img-responsive" src="<?php echo get_header_image() ?>">
	  </div>
<!-- 	  <div class="col-sm-8">
					<?php the_content() ?>
	  </div> -->

  
	    

		<div class=" info" >
			<div class="content col-sm-6 col-md-4 ">
				<h3 class="contacto-title"><span class="land-title">Telefonos</span></h3>
				<div class="land-line"></div>
				<p><strong>officina</strong> <a class="tel" href="tel:+<?php echo $meta_values = get_post_meta( $post->ID, "Telefono", true); ?>"><?php echo $meta_values = get_post_meta( $post->ID, "Telefono", true); ?></a></p>
				<p><strong>celular</strong> <a class="tel" href="tel:+<?php echo $meta_values = get_post_meta( $post->ID, "Celular", true); ?>"><?php echo $meta_values = get_post_meta( $post->ID, "Celular", true); ?></a></p>
			</div>
			<div class="content col-sm-6 col-md-4 ">
				<h3 class="contacto-title"><span class="land-title">Email</span></h3>
				<div class="land-line"></div>
				<p><strong>Ana Luz</strong> <a href="mailto:<?php echo $meta_values = get_post_meta( $post->ID, "Email", true); ?>" target="_top"> <?php echo $meta_values = get_post_meta( $post->ID, "Email", true); ?></a></p>
				<p>	<strong>Curriculums</strong> <span>alsmith@alsmith.com.mx</span></p>
			</div> <!-- dir -->
		<div class="chevron-down"><img class="chevron-ddown" src="<?php echo get_template_directory_uri()?>/images/chevron-down.svg" alt=""></div>
		</div>
		

		  
	    
	
	  <?php endwhile; ?>
	<?php endif; ?>
	</div>
</section>

<div id="main">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
	<?php
		wp_reset_query(); 
		$query = new WP_Query("category_name=Home");
	
	 if( $query->have_posts() ) :
		 while ($query->have_posts()) : $query->the_post(); 
			 echo get_the_post_thumbnail( $query->ID, 'thumbnail' ); ?> 
			<!-- look for has post format  -->
			<!-- <h6> <?php the_title() ?> </h6> -->

			<h2> <?php the_title() ?> </h2>
			<?php the_content() ?>
		<?php endwhile; ?>
	<?php endif; ?>


	

	<!-- from the actual page  -->
	<?php wp_reset_query(); 
		$query = new WP_Query("pagename=Home");
	?>
	<?php if( $query->have_posts() ) :?>
		<?php while ($query->have_posts()) : $query->the_post(); ?>
			<?php echo get_the_post_thumbnail( $query->ID, 'thumbnail' ); ?> 
			<!-- look for has post format  -->
				<!-- <h6> <?php the_title() ?> </h6> -->
		  
		  <h2> <?php the_title() ?> </h2>
		  <?php the_content() ?>
		<?php endwhile; ?>
	<?php endif; ?>

</div>



<?php get_footer(); ?>