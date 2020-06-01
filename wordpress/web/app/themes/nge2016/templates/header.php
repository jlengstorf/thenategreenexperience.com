<?php

use NGE\Custom\Nav;

$header_classes = ['site__header', 'header'];
if (is_front_page()) {
  array_push($header_classes, 'site__header--home');
} else {
  array_push($header_classes, 'header--solid');
}

?>
<a href="#content" class="a11y__sr-only">Jump to Content</a>
<header class="<?= join(' ', $header_classes) ?>">
  <nav class="header__nav">
<?php

  if (!is_front_page()):

?>
    <a href="<?= esc_url(home_url('/')); ?>"
       class="header__link header__link--home"
       rel="home"><?php bloginfo('name'); ?></a>
<?php

  endif;

  if (has_nav_menu('primary_navigation')) {
    wp_nav_menu([
      'theme_location' => 'primary_navigation',
      'items_wrap' => '%3$s',
      'depth' => 1,
      'walker' => new Nav\Walker,
      'menu_class' => 'header__link'
    ]);
  }

?>
  </nav>
</header>
