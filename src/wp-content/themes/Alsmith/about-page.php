<?php
/*
 * Template Name: Metodologia
 * Description: Description
 */

//Create a new WP_Query Object
$query = new WP_Query("category_name=metodologia");

?>

<?php get_header(); ?>
<br>
<br>

<br>
<h1>
Metodologia
</h1>
<?php if( $query->have_posts() ) :?>
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <?php the_title() ?>
    <?php the_content() ?>
  <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>