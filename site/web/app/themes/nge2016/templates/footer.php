<?php

use NGE\Custom\Nav;
use NGE\Custom\Popover;
use NGE\Custom\Peeker;

?>
<footer class="site__footer footer">
  <p class="footer__nav">
<?php

  if (has_nav_menu('primary_navigation')) {
    wp_nav_menu([
      'theme_location' => 'footer_navigation',
      'items_wrap' => '%3$s',
      'depth' => 1,
      'walker' => new Nav\Walker,
      'menu_class' => 'footer__link',
    ]);
  }

?>
  </p>
  <p class="footer__credits">
    <span class="footer__credit">
      All content ©
      <a href="<?= home_url('/') ?>" class="footer__link footer__link--inline">Nate Green</a>
    </span>
    <span class="footer__credit">
      Site designed and built by
      <a href="https://lengstorf.com/?utm_source=thenategreenexperience.com&amp;utm_medium=site-credit&amp;utm_campaign=web-design" class="footer__link footer__link--inline">Jason Lengstorf</a>
    </span>
  </p>
</footer>

<?php

Popover\markup();
Peeker\markup();
