<aside>

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
        <?php
        $slug_to_get = 'contacto';
        $args=array(
        'name' => $slug_to_get,
        'post_type' => 'page',
        'post_status' => 'publish',
        'showposts' => 1,
        'caller_get_posts'=> 1
        );
        $my_posts = get_posts($args);
        if( $my_posts ) {
        echo 'ID on the first post found '.$my_posts[0]->ID;
        }
        ?>
            <div> <?php  the_field("email",$my_posts[0]->ID); ?>       </div>
            <div> <?php  the_field("email_cv", $my_posts[0]->ID); ?>    </div>
            <div> <?php  the_field("tel", $my_posts[0]->ID); ?>          </div>
            <div> <?php  the_field("cel", $my_posts[0]->ID); ?>              </div>
            <div> <?php  the_field("text_cv", $my_posts[0]->ID); ?>         </div>
            <div> <?php  the_field("extra_info", $my_posts[0]->ID);  ?>  </div>
	
	<?php endif; ?>

</aside>