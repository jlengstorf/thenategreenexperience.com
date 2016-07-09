<div class="peeker peeker--hidden">
  <div class="peeker__text-wrap">
    <h3 class="peeker__heading"><?php the_field('peeker_heading', 'options'); ?></h3>
    <div class="peeker__text"><?php the_field('peeker_text', 'options'); ?></div>
  </div>
  <?= do_shortcode('[opt-in class="peeker__form-wrap" button_text="' . get_field('peeker_button') . '"]') ?>
  <div class="peeker__close">
    <a href="#close-peeker" class="peeker__close-link">close &times;</a>
  </div>
</div>
