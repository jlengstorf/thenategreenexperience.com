<?php

namespace NGE\Custom\Shortcodes;

use Roots\Sage\Assets;
use NGE\Custom\OptIn;
use NGE\Custom\Footnotes;
use NGE\Custom\Popover;

function button( $atts, $content ) {
  $classes = array_merge(['button'], explode(' ', $atts['classes'] ?? ''));
  $href = $atts['href'] ?? '#no-link';
  $text = $atts['text'] ?? $content ?? 'Click Here';
  $subtext = $atts['subtext'] ?? false;
  $text_markup = '<strong class="button__text">' . $text . "</strong>\n";

  if (array_key_exists('popover', $atts) && !!$atts['popover']) {
    $classes[] = 'button--open-popover';
    Popover\show();
  }

  if ($subtext) {
    $subtext_markup = '<span class="button__subtext">' . $subtext . '</span>';
  }

  return sprintf('<a href="%s" class="%s">%s%s</a>',
    $href,
    join(' ', $classes),
    $text_markup,
    $subtext_markup ?? ''
  );
}
add_shortcode('button', __NAMESPACE__ . '\\button');

function as_seen_in( $atts, $content ) {
  $img_shade = ($atts['type'] ?? false) === 'dark' ? 'dark' : 'light';
  $classes = array_merge(['as-seen-in'], explode(' ', $atts['classes'] ?? ''));
  $img_dir = get_template_directory_uri();
  $alt = $atts['alt'] ?? 'Nate Green has been featured on multiple major websites.';
  $srcset = [
    Assets\asset_path("images/as-seen-in-${img_shade}-300w.png") . " 300w",
    Assets\asset_path("images/as-seen-in-${img_shade}.png") . " 360w",
    Assets\asset_path("images/as-seen-in-${img_shade}@2x.png") . " 720w",
  ];
  return sprintf('<img src="%s" srcset="%s" alt="%s" class="%s">',
    Assets\asset_path("images/as-seen-in-${img_shade}@2x.png"),
    join(', ', $srcset),
    $alt,
    join(' ', $classes)
  );
}
add_shortcode('as-seen-in', __NAMESPACE__ . '\\as_seen_in');

function signature( $atts, $content ) {
  $classes = array_merge(['signature'], explode(' ', $atts['classes'] ?? ''));
  $alt = $atts['alt'] ?? 'Nate Green';
  $srcset = [
    Assets\asset_path('images/signature.png') . " 250w",
    Assets\asset_path('images/signature@2x.png') . " 500w",
  ];
  return sprintf('<img src="%s" srcset="%s" alt="%s" class="%s">',
    Assets\asset_path('images/signature@2x.png'),
    join(', ', $srcset),
    $alt,
    join(' ', $classes)
  );
}
add_shortcode('signature', __NAMESPACE__ . '\\signature');

function headshot( $atts, $content ) {
  $classes = array_merge(['headshot'], explode(' ', $atts['classes'] ?? ''));
  $alt = $atts['alt'] ?? 'Nate Green';
  $blank = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///////' .
           'yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
  $srcset = [
    Assets\asset_path('images/headshot.jpg') . " 210w",
    Assets\asset_path('images/headshot@2x.jpg') . " 420w",
  ];
  return sprintf('<div class="popover__lazyload js--lazyload" style="padding-bottom: 100%%"><img src="%s" srcset="%s" data-lazyload="%s" alt="%s" class="%s"></div>',
    Assets\asset_path('images/headshot@2x.jpg'),
    $blank,
    join(', ', $srcset),
    $alt,
    join(' ', $classes)
  );
}
add_shortcode('headshot', __NAMESPACE__ . '\\headshot');

function lead( $atts, $content ) {
  return sprintf('<p class="article__lead">%s</p>',
    do_shortcode($content)
  );
}
add_shortcode('lead', __NAMESPACE__ . '\\lead');

function section( $atts, $content ) {
  return '<hr>';
}
add_shortcode('section', __NAMESPACE__ . '\\section');

function optin( $atts, $content ) {
  $class = $atts['class'] ?? '';
  $button_text = $atts['button_text'] ?? '';
  return OptIn\get_markup($class, $button_text);
}
add_shortcode('opt-in', __NAMESPACE__ . '\\optin');

function footnote( $atts, $content=NULL )
{
    return Footnotes\add_footnote($content, get_permalink());
}
add_shortcode('footnote', __NAMESPACE__ . '\\footnote');
