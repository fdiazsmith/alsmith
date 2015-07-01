<?php
/*
 * Template Name: Modal - english
 * Description: todo lo de contacto
 */

//Create a new WP_Query Object
$page = get_page_by_path('privacy-policy');
// $query = new WP_Query("category_name=privacidad");
$politica = get_post($page->ID);
// wp_list_pages( 'exclude=' . $page->ID );
?>



<!-- Modal -->
<div class="modal fade" id="politicaDePrivacidad-english" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">
        <?php echo $politica->post_title; ?>
        </h4>
      </div>
      <div class="modal-body">
        <?php echo $politica->post_content; ?>

      </div>
      <div class="modal-footer">
        <button id="close-modal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="accept-modal" type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
      </div>
    </div>
  </div>
</div>
