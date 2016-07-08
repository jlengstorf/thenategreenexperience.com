<?php

  while (have_posts()):
    the_post();

?>
<div class="nate-intro">
  <h1 class="nate-intro__heading"><?php the_field('heading'); ?></h1>
  <div class="nate-intro__text"><?php the_field('cta_text'); ?></div>
</div>
<div class="content content--front-page">
<?php the_content(); ?>

</div>
<?php

  endwhile;
