<?php

use NGE\Custom\Footnotes;

?>
<div class="content">
<?php

  while (have_posts()):
    the_post();

?>
  <article class="article">
    <header class="article__header">
      <h1 class="article__heading"><?php the_title(); ?></h1>
    </header>
    <div class="article__content">
      <?php the_content(); ?>
    </div>
  </article>
<?php

  endwhile;

  get_template_part('templates/footer', 'bio');

?>
  <div class="footnotes"><?= Footnotes\footnotes() ?></div>
  <div class="comments"><?php comments_template('/templates/comments.php'); ?></div>
</div>
