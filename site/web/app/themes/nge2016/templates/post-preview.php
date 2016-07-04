<?php

  // If the excerpt was added in Yoast SEO, use that.
  $excerpt = get_post_meta(get_the_id(), '_yoast_wpseo_metadesc', true);
  if (empty(trim($excerpt))) {
    $excerpt = get_the_excerpt();
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
        <a href="#" class="post-preview__meta-link">Health &amp; Fitness</a>
      </p>
      <p class="post-preview__meta post-preview__meta--read-more">
        <a href="<?php the_permalink(); ?>"
           class="post-preview__meta-link">Read more &rsaquo;</a>
      </p>
    </footer>
  </article>
