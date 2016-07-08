<div class="popover popover--fade-out popover--hidden" id="sign-up">
  <div class="popover__content">
    <div class="popover__image-wrap"><?= do_shortcode('[headshot classes="popover__image"]') ?></div>
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
