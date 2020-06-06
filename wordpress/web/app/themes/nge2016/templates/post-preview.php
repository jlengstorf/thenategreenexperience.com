<?php

  // If the excerpt was added in Yoast SEO, use that.
  $excerpt = get_post_meta(get_the_id(), '_yoast_wpseo_metadesc', true);
  if (empty(trim($excerpt))) {
    $excerpt = get_the_excerpt();
  }

  // Get only the primary category for display.
  $category_array = get_the_category();
  $category_blacklist = ['essay', 'tactical'];
  foreach ($category_array as $category) {
    if (!in_array($category->slug, $category_blacklist)) {
      $category = sprintf('<a href="%s" class="%s">%s</a>',
        esc_url(get_category_link($category->term_id)),
        'post-preview__meta-link',
        $category->name
      );
      break;
    }
  }

?>
  <article class="content__article post-preview">
    <header class="post-preview__header">
      <h2 class="post-preview__heading">
        <a href="<?php the_permalink(); ?>"
           class="post-preview__heading-link">
          <?php the_title(); ?>

        </a>
      </h2>
    </header>
    <section class="post-preview__excerpt">
      <?= $excerpt; ?>

    </section>
    <footer class="post-preview__footer">
      <p class="post-preview__meta post-preview__meta--category">
        <?= $category ?>
      </p>
      <p class="post-preview__meta post-preview__meta--read-more">
        <a href="<?php the_permalink(); ?>"
           class="post-preview__meta-link">Read more &rsaquo;</a>
      </p>
    </footer>
  </article>
