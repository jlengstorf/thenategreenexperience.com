<?php

use Roots\Sage\Assets;

$image_array = get_field('headshot', 'options');

?>

<div class="footer-bio">
  <figure class="footer-bio__image-wrap">
    <div class="js--lazyload" style="padding-bottom: 100%;">
      <img class="footer-bio__image"
           alt="Nate Green"
           src="<?= $image_array['url'] ?>"
           srcset="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
           data-lazyload="<?= $image_array['sizes']['medium'] ?> 1x,
                          <?= $image_array['url'] ?> 2x">
      <noscript>
        <img class="footer-bio__image"
             alt="Nate Green"
             src="<?= $image_array['url'] ?>"
             srcset="<?= $image_array['sizes']['medium'] ?> 1x,
                     <?= $image_array['url'] ?> 2x">
      </noscript>
    </div>
    <figcaption class="footer-bio__image-caption"><?php the_field('headshot_caption', 'options'); ?></figcaption>
  </figure>
  <div class="footer-bio__text-wrap">
    <h3 class="footer-bio__heading">
      <?php the_field('heading', 'options'); ?>
    </h3>
    <div class="footer-bio__text">
      <?php the_field('bio_text', 'options'); ?>
    </div>
  </div>
</div>
