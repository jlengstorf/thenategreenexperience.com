<?php

use Roots\Sage\Assets;

?>

<div class="footer-bio">
  <figure class="footer-bio__image-wrap">
    <div class="js--lazyload" style="padding-bottom: 100%;">
      <img class="footer-bio__image"
           alt="Nate Green"
           src="<?= Assets\asset_path('images/nate-green-footer.jpg') ?>"
           srcset="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
           data-lazyload="<?= Assets\asset_path('images/nate-green-footer.jpg') ?> 1x,
                          <?= Assets\asset_path('images/nate-green-footer@2x.jpg') ?> 2x">
      <noscript>
        <img class="footer-bio__image"
             alt="Nate Green"
             src="<?= Assets\asset_path('images/nate-green-footer.jpg') ?>"
             srcset="<?= Assets\asset_path('images/nate-green-footer.jpg') ?> 1x,
                     <?= Assets\asset_path('images/nate-green-footer@2x.jpg') ?> 2x">
      </noscript>
    </div>
    <figcaption class="footer-bio__image-caption">Nate Green</figcaption>
  </figure>
  <div class="footer-bio__text-wrap">
    <h3 class="footer-bio__heading">
      I’m Nate. Every week I send out an email sharing my latest ideas
      and strategies.
    </h3>
    <p class="footer-bio__text">
      According to the internet I’m an author and fitness expert. But what I
      really do is try things, talk to people, and share what I learn with my
      thousands of readers. Every week I share a practical strategy, story, or
      idea to help you <strong>simplify and upgrade your daily life</strong> —
      from fitness and work to relationships and mindset.
    </p>
    <p class="footer-bio__text">
      <a href="<?= home_url('/what-people-say/') ?>" class="footer-bio__link">
        Click here to get my free weekly email &amp; see what other people say
        about it.
      </a>
    </p>
  </div>
</div>
