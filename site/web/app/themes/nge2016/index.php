
<div class="content">
<?php

  if (!have_posts()):

?>
  <div class="alert alert-warning">
<?php

    _e('Sorry, no results were found.', 'sage');

?>
  </div>
<?php

    get_search_form();
  endif;

  while (have_posts()) {
    the_post();

    $part = get_post_type() !== 'post' ? get_post_type() : get_post_format();
    get_template_part('templates/content', $part);
  }

  the_posts_navigation([
    'prev_text' => '&lsaquo; older posts',
    'next_text' => 'newer posts &rsaquo;'
  ]);

  get_template_part('templates/footer', 'bio');

?>
</div>
