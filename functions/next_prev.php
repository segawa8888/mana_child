<?php

function next_prev_post_link() {

  $options = get_design_plus_option();
  $prev_post = get_adjacent_post(false, '', true);
  $next_post = get_adjacent_post(false, '', false);

  if ($prev_post) {
    $post_id = $prev_post->ID;
?>
<div class="item prev_post clearfix">
 <a class="animate_background" href="<?php echo get_permalink($post_id); ?>">
  <div class="title_area">
   <p class="title"><span><?php the_title_attribute('post='.$post_id); ?></span></p>
   <p class="nav"><?php echo __('Prev post', 'tcd-w'); ?></p>
  </div>
 </a>
</div>
<?php
  };
  if ($next_post) {
    $post_id = $next_post->ID;
?>
<div class="item next_post clearfix">
 <a class="animate_background" href="<?php echo get_permalink($post_id); ?>">
  <div class="title_area">
   <p class="title"><span><?php the_title_attribute('post='.$post_id); ?></span></p>
   <p class="nav"><?php echo __('Next post', 'tcd-w'); ?></p>
  </div>
 </a>
</div>
<?php
  };

}


// add class to posts_nav_link()
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="next"';
}
function posts_link_attributes_2() {
    return 'class="prev"';
}


?>