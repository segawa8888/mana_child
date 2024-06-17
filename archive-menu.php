<?php
     get_header();
     $options = get_design_plus_option();
     $headline = $options['menu_title'];
     $headline_color = $options['menu_title_color'];
     $sub_title = $options['menu_sub_title'];
     $image_id = $options['menu_bg_image'];
     if(!empty($image_id)) {
       $image = wp_get_attachment_image_src($image_id, 'full');
     }
     $use_overlay = $options['menu_use_overlay'];
     if($use_overlay) {
       $overlay_color = hex2rgb($options['menu_overlay_color']);
       $overlay_color = implode(",",$overlay_color);
       $overlay_opacity = $options['menu_overlay_opacity'];
     }
?>
<div id="page_header" <?php if($image_id) { ?>style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"<?php }; ?>>
 <div class="headline_area rich_font_<?php echo esc_attr($options['page_header_font_type']); ?>">
  <?php if($headline){ ?><h1 class="headline"><?php echo wp_kses_post(nl2br($headline)); ?></h1><?php }; ?>
  <?php if($sub_title){ ?><p class="sub_title"><?php echo wp_kses_post(nl2br($sub_title)); ?></p><?php }; ?>
 </div>
 <?php get_template_part('template-parts/breadcrumb'); ?>
 <?php if($use_overlay) { ?><div class="overlay" style="background:rgba(<?php echo esc_html($overlay_color); ?>,<?php echo esc_html($overlay_opacity); ?>);"></div><?php }; ?>
</div>

<div id="menu_archive">

 <?php
      $catch = $options['menu_catch'];
      $desc = $options['menu_desc'];
      if($catch || $desc) {
 ?>
 <div id="catch_area">
  <?php if($catch) { ?><h2 class="catch rich_font"><?php echo nl2br(esc_html($catch)); ?></h2><?php }; ?>
  <?php if($desc) { ?><p class="desc"><?php echo nl2br(esc_html($desc)); ?></p><?php }; ?>
 </div>
 <?php }; ?>

 <?php if ( have_posts() ) : ?>
 <div id="menu_list" class="clearfix">
  <?php
       while ( have_posts() ) : the_post();
         $title = get_post_meta($post->ID, 'menu_header_title', true);
         $sub_title = get_post_meta($post->ID, 'menu_header_sub_title', true);
         $desc = get_post_meta($post->ID, 'menu_header_desc', true);
         $image = get_post_meta($post->ID, 'menu_archive_image', true);
         if($image) {
           $image = wp_get_attachment_image_src( $image, 'full' );
         } elseif($options['no_image2']) {
           $image = wp_get_attachment_image_src( $options['no_image2'], 'full' );
         } else {
           $image = array();
           $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
         }
  ?>

    <!-- menu 追記 -->
    <div class="menu-content">
    <div class="menu-slider">
    <div class="slider">
    <div class="slick-img"><?php if( get_field('menu-image01') ): ?>
    <img src="<?php the_field('menu-image01'); ?>" />
    <?php endif; ?></div>
    <div class="slick-img"><?php if( get_field('menu-image02') ): ?>
    <img src="<?php the_field('menu-image02'); ?>" />
    <?php endif; ?></div>
    <div class="slick-img"><?php if( get_field('menu-image03') ): ?>
    <img src="<?php the_field('menu-image03'); ?>" />
    <?php endif; ?></div>
    </div>
    <div class="thumbnail">
    <div class="thumbnail-img"><?php if( get_field('menu-image01') ): ?>
    <img src="<?php the_field('menu-image01'); ?>" />
    <?php endif; ?></div>
    <div class="thumbnail-img"><?php if( get_field('menu-image02') ): ?>
    <img src="<?php the_field('menu-image02'); ?>" />
    <?php endif; ?></div>
    <div class="thumbnail-img"><?php if( get_field('menu-image03') ): ?>
    <img src="<?php the_field('menu-image03'); ?>" />
    <?php endif; ?></div>
    </div>
    </div>


<div class="menu-menus">
    <?php if($title) { ?><h3 class="menu-title"><?php echo esc_html($title); ?><?php if($sub_title) { ?><span><?php echo esc_html($sub_title); ?></span><?php }; ?></h3><?php }; ?></h3>
    <?php if($desc) { ?><p class="menu-text"><?php echo esc_html($desc); ?></p><?php }; ?>


  <div class="menu-table-container">
  <div class="menu-table-wrapper">
    
      <?php
      $table = get_field( 'table' );
      if ( ! empty ( $table ) ) {
          echo '<table class="menu-table">';
              if ( ! empty( $table['caption'] ) ) {
                  echo '<caption>' . $table['caption'] . '</caption>';
              }
              if ( ! empty( $table['header'] ) ) {
                  echo '<thead>';
                      echo '<tr>';
                          foreach ( $table['header'] as $th ) {
                              echo '<th>';
                                  echo $th['c'];
                              echo '</th>';
                          }
                      echo '</tr>';
                  echo '</thead>';
              }
              echo '<tbody>';
                  foreach ( $table['body'] as $tr ) {
                      echo '<tr>';
                          foreach ( $tr as $td ) {
                              echo '<td>';
                                  echo $td['c'];
                              echo '</td>';
                          }
                      echo '</tr>';
                  }
              echo '</tbody>';
          echo '</table>';
      }
      ?>

  </div>
  </div>



</div>
</div>

<div class="menu-option">
<h3 class="menu-title">【オプション】<?php echo esc_html($title); ?><?php if($sub_title) { ?><span><?php echo esc_html($sub_title); ?></span><?php }; ?></h3>
  <table class="menu-option__table">
    <tr>
      <td><?php the_field('option_01'); ?></td>
      <td><?php the_field('option-price_01'); ?></td>
    </tr>
    <tr>
      <td><?php the_field('option_02'); ?></td>
      <td><?php the_field('option-price_02'); ?></td>
    </tr>
    <tr>
      <td><?php the_field('option_03'); ?></td>
      <td><?php the_field('option-price_03'); ?></td>
    </tr>
  </table>
</div>

<a class="c-btn p-btn js-fadeIn c-blue" href="<?php the_field('reservation-url')?>">予約はこちら</a>

  <?php endwhile; ?>
 </div><!-- END #menu_list -->

 <?php get_template_part('template-parts/navigation'); ?>

 <?php else: ?>

 <p id="no_post"><?php _e('There is no registered post.', 'tcd-w');  ?></p>

 <?php endif; ?>

</div><!-- END #menu_archive -->

<?php get_footer(); ?>