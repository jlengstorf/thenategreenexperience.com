<?php

use Roots\Sage\Assets;

?>
<div class="popover popover--fade-out popover--hidden" id="sign-up">
  <div class="popover__content">
    <div class="popover__image-wrap">
      <div class="popover__lazyload js--lazyload"
           style="padding-bottom: 100%">
        <img src="<?= Assets\asset_path('images/nate-talking.jpg') ?>"
             srcset="data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
             data-lazyload="<?= Assets\asset_path('images/nate-talking.jpg') ?> 210w,
                            <?= Assets\asset_path('images/nate-talking@2x.jpg') ?> 420w"
             alt="Nate Green talking"
             class="popover__image">
      </div>
    </div>
    <div class="popover__text-wrap">
      <h2 class="popover__heading"><?php the_field('popover_heading', 'options'); ?></h2>
      <div class="popover__text"><?php the_field('popover_text', 'options'); ?></div>
    </div>
    <div class="popover__form-wrap">
      <?= do_shortcode('[opt-in class="popover__form" button_text="' . get_field('popover_button_text', 'options') . '"]') ?>
    </div>
  </div>
  <div class="popover__close">
    <a class="popover__close-link" href="#popover-close">close &times;</a>
  </div>
</div>
