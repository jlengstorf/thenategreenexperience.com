<?php

  while (have_posts()):
    the_post();

?>
<div class="nate-intro">
  <h1 class="nate-intro__heading"><?php the_title(); ?></h1>
  <div class="nate-intro__text"><?php the_content(); ?></div>
</div>

<?php

    $query = new WP_Query([ 'post_type' => 'post', 'posts_per_page' => 4 ]);
    if ($query->have_posts()):

?>
<div class="content content--front-page">
<?php

      while($query->have_posts()) {
        $query->the_post();
        get_template_part('templates/post', 'preview');
      }

?>
  <div class="pagination">
    <a href="<?= home_url('/blog/') ?>" class="pagination__link button">More Blog Posts &rsaquo;</a>
  </div>
</div>
<?php

    endif;

?>

<?php

    wp_reset_postdata();
  endwhile;
