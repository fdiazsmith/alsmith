<?php
/*
 * Template Name: Home - english
 * Description: pagina inicial
 */
$tagline = get_field("parte_uno");
$tagline_landing = get_field("parte_dos");//the_content();//get_the_content();
$bg_img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ),"full" );

// $bg_img = get_the_post_thumbnail( $query->ID );

//Create a new WP_Query Object

// $args = array(
// 	"category_name" => "contacto",
// 	// "tag" = "english"
// );
// $contacto = new WP_Query($args);
//Create a new WP_Query Object
$contacto = new WP_Query("category_name=contacto");
// consider using get_posts() function it might be cleaner


?>
<?php  get_header("english"); ?>

<section id="landing-wrapper" >
	<div class="background" style="background-image: url(<?php echo $bg_img[0]; ?> );">
	</div>
	<div id="content-landing">

	<?php if( $contacto->have_posts() ) :?>
  <?php while ($contacto->have_posts()) : $contacto->the_post(); ?>


  <div class="top row  ">
	  <div class="col-xs-7 col-sm-5 col-md-4 col-lg-3 img " >
			<img class="img-responsive" src="<?php echo get_header_image() ?>">
	  </div>
  <h1  id="tagline"><?php echo $tagline_landing; ?></h1>
  </div>


		<div class="row">
			<div class=" info" >
				<div class="content col-sm-6 col-md-4 ">
					<h3 class="contacto-title"><span class="land-title">Phone numbers</span></h3>
					<div class="land-line"></div>
					<p><strong>office</strong> <a class="tel" href="tel:+<?php echo $meta_values = get_post_meta( $post->ID, "Telefono", true); ?>"><?php echo $meta_values = get_post_meta( $post->ID, "Telefono", true); ?></a></p>
					<p><strong>cel phone</strong> <a class="tel" href="tel:+<?php echo $meta_values = get_post_meta( $post->ID, "Celular", true); ?>"><?php echo $meta_values = get_post_meta( $post->ID, "Celular", true); ?></a></p>
				</div>
				<div class="content col-sm-6 col-md-4" >
					<h3 class="contacto-title"><span class="land-title">Email</span></h3>
					<div class="land-line"></div>
					<p><strong>Ana Luz</strong> <a href="mailto:<?php echo $meta_values = get_post_meta( $post->ID, "Email", true); ?>" target="_top"> <?php echo $meta_values = get_post_meta( $post->ID, "Email", true); ?></a></p>
					<p>	<strong>Curriculums</strong> <span>curriculums@alsmith.com.mx</span></p>
				</div> <!-- dir -->
			<div class="chevron-down">
			<!-- <span class="glyphicon glyphicon-menu-down"></span> -->
			<img id="chevron-down" src="<?php echo get_template_directory_uri()?>/images/chevron-down.svg" alt="">
			</div>
			</div>
		</div>

	  <?php endwhile; ?>
	<?php endif; ?>
	</div>
</section>

<div id="main" class="container">
			<h1 class="intro"><?php echo $tagline; ?></h1>
			<?php
				wp_reset_query();
				// search filter

				$argsTwo = array(
					'category_name' => "home",
					'tag' => "english"
				);

				$query = new WP_Query($argsTwo);
				// var_dump($query);
				// $query = new WP_Query("category_name=Home");
				$panelNumeber = 0;
				 if( $query->have_posts() ) :
					 while ($query->have_posts()) : $query->the_post();
						 ?>
						<div class="col-xs-12 col-md-6 col-lg-3 intro">
							<?php $panelNumeber = $panelNumeber + 1; ?>
							    <!-- <div class="panel-heading" role="tab" id="heading-<?php echo $panelNumeber?>"> -->
							      <h2 class="">
							        <!-- <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $panelNumeber ?>" aria-expanded="true" aria-controls="collapse-<?php echo $panelNumeber ?>"> -->
							          <?php the_title() ?>
							        <!-- </a> -->
							      </h2>
							    <!-- </div> -->
							    <!-- <div id="collapse-<?php echo $panelNumeber ?>" class="panel-collapse collapse <?php if ($panelNumeber ==1) echo 'in'?>" role="tabpanel" aria-labelledby="headingOne"> -->
							      <div class="panel-body" style="background-image: url( )">
							        <!-- <?php the_content() ?> -->
							        <?php $thumbnail_id = get_post_thumbnail_id( $query->ID);

								        if($thumbnail_id != '' ){
						        			$images = get_posts(array(
													        'post_parent' => $thumbnail_id,
													        'post_type' => 'attachment',
													        'numberposts' => -1,
													        'order'           => 'ASC',
													        'post_mime_type' => 'image',
													    ));

									        $images = get_post($thumbnail_id);
									        $svg = apply_filters( 'the_description', $images->post_content );
													$png = wp_get_attachment_url($images->ID);
												}
												else{
													$svg = null;
													$png = null;
												}
							        ?>
							       <div class="img img-responsive" style="background-image: url(<?php //echo $png;?>);">
							       	 <?php echo $svg; ?>
							       </div>



											<?php
												$my_excerpt = the_excerpt();

												// echo $my_excerpt; // Outputs the processed value to the page
											?>
							      </div>
							    <!-- </div> -->
						</div>
			<?php
					endwhile;
				endif;
			?>

 	 		<div id="enviar-cv-wrapper">
 	 		<button class="row" id="enviar-cv">Send us your CV
 	 		<!-- <span class="glyphicon glyphicon-file"></span> -->
 	 		</button>
 	 		</div>



</div><!-- /main -->



<?php get_footer("english"); ?>
