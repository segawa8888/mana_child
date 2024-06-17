<div class="news-list-container">
    <h3 class="news-list-title">重要なお知らせ</h3>
  <div class="news-list-wrapper">
  <?php
$args = array(
    'post_type' => 'post',
    'category_name' => 'Important', 
    'posts_per_page' => 3
);
$new_query = new WP_Query($args);
?>
<?php if ($new_query->have_posts()) : ?>
    <ul class="news-lists">
        <?php while ($new_query->have_posts()) : $new_query->the_post(); ?>
            <li class="news-list">
               <a href="<?php the_permalink(); ?>">
               <p class="news-list__date"><?php the_time('n月j日'); ?></p>
               <p class="news-list__title"><?php the_title(); ?></p>
               </a>
            </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
</ul>
<?php else : ?>
    <p>記事がありません。</p>
<?php endif; ?>
  </div>
</div>

<div class="news-list-space"></div>