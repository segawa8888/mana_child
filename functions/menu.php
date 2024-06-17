<?php
/**
 * Add data-megamenu attributes to the global navigation
 */
function nano_walker_nav_menu_start_el( $item_output, $item, $depth, $args ) {

  $options = get_design_plus_option();

  if ( 'global-menu' !== $args->theme_location ) return $item_output;

  if ( ! isset( $options['megamenu'][$item->ID] ) ) return $item_output;

  if ( 'type1' === $options['megamenu'][$item->ID] ) return $item_output;

  return sprintf( '<a href="%s" class="megamenu_button" data-megamenu="js-megamenu%d">%s</a>', $item->url, $item->ID, $item->title );
}

add_filter( 'walker_nav_menu_start_el', 'nano_walker_nav_menu_start_el', 10, 4 );


// Mega menu A - Menu list ---------------------------------------------------------------
function render_megamenu_a( $id, $megamenus ) {
  global $post;
  $options = get_design_plus_option();
?>
<div class="megamenu_menu_list" id="js-megamenu<?php echo esc_attr( $id ); ?>">
 <div class="megamenu_menu_list_inner clearfix">

  <?php
       $post_num = '6';
       $args = array( 'post_type' => 'menu', 'posts_per_page' => $post_num );
       $menu_list_query = new wp_query($args);
       if($menu_list_query->have_posts()):
  ?>
  <div class="menu_list clearfix rich_font_<?php echo esc_attr($options['global_menu_font_type']); ?>">
   <?php
        while($menu_list_query->have_posts()): $menu_list_query->the_post();
          $menu_header_title = get_post_meta($post->ID, 'menu_header_title', true);
          $menu_header_sub_title = get_post_meta($post->ID, 'menu_header_sub_title', true);
         $image = get_post_meta($post->ID, 'menu_archive_image', true);
         if($image) {
           $image = wp_get_attachment_image_src( $image, 'full' );
         } elseif($options['no_image1']) {
           $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
         } else {
           $image = array();
           $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image1.gif";
         }
   ?>
   <article class="item">
    <a class="clearfix animate_background" href="<?php the_permalink(); ?>">
     <div class="image_wrap">
      <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
     </div>
     <div class="title_area">
      <?php if($menu_header_title || $menu_header_sub_title) { ?>
      <h4 class="title"><?php if($menu_header_title){ echo esc_html($menu_header_title); }; ?><?php if($menu_header_sub_title){ echo '<span>' . esc_html($menu_header_sub_title) . '</span>'; }; ?></h4>
      <?php }; ?>
     </div>
    </a>
   </article>
   <?php endwhile; wp_reset_query(); ?>
  </div><!-- END .menu_list -->
  <?php endif; ?>

 </div>
</div>
<?php
}

// Mega menu B - Blog list ---------------------------------------------------------------
function render_megamenu_b( $id, $megamenus ) {
  global $post;
  $options = get_design_plus_option();
?>
<div class="megamenu_blog_list" id="js-megamenu<?php echo esc_attr( $id ); ?>">
 <div class="megamenu_blog_list_inner clearfix">
  <ul class="menu_area gothic_font">
   <?php
        $i = 1;
        foreach ( $megamenus[$id] as $menu ) :
          if ( 'category' !== $menu->object ) continue;
          $cat_id = $menu->object_id;
          $cat_name = $menu->title;
          $url = $menu->url;
   ?>
   <li<?php if($i == 1) { echo ' class="active"'; }; ?>><a class="cat_id<?php echo esc_attr($cat_id); ?>" href="<?php echo esc_url($url); ?>"><?php echo esc_html($cat_name); ?></a></li>
   <?php $i++; endforeach; ?>
  </ul>
  <div class="post_list_area">
   <?php
       foreach ( $megamenus[$id] as $menu ) :
         if ( 'category' !== $menu->object ) continue;
         $cat_id = $menu->object_id;
           $args = array( 'post_type' => 'post', 'posts_per_page' => 12, 'tax_query' => array( array( 'taxonomy' => 'category', 'field' => 'term_id', 'terms' => $cat_id ) ) );
           $post_list = new wp_query($args);
           if($post_list->have_posts()):
   ?>
   <ol class="post_list clearfix cat_id<?php echo esc_attr($cat_id); ?>">
    <?php
         while( $post_list->have_posts() ) : $post_list->the_post();
           if(has_post_thumbnail()) {
             $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size1' );
           } elseif($options['no_image1']) {
             $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
           } else {
             $image = array();
             $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image1.gif";
           }
    ?>
    <li>
     <a class="clearfix animate_background" href="<?php the_permalink(); ?>">
      <div class="image_wrap">
       <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
      </div>
      <div class="title_area gothic_font">
       <h4 class="title"><span><?php the_title_attribute(); ?></span></h4>
      </div>
     </a>
    </li>
    <?php endwhile; wp_reset_query(); ?>
   </ol>
   <?php endif; // END end post list ?>
   <?php endforeach; ?>
  </div><!-- END post_list_area -->
 </div>
</div>
<?php
}
?>