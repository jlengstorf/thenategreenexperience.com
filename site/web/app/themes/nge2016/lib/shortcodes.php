<?php

namespace NGE\Custom\Shortcodes;

use Roots\Sage\Assets;
use NGE\Custom\OptIn;
use NGE\Custom\Footnotes;

function button( $atts, $content ) {
  $classes = array_merge(['button'], explode(' ', $atts['classes'] ?? ''));
  $href = $atts['href'] ?? '#no-link';
  $text = $atts['text'] ?? $content ?? 'Click Here';
  $subtext = $atts['subtext'] ?? false;
  $text_markup = '<strong class="button__text">' . $text . "</strong>\n";

  if ($subtext) {
    $subtext_markup = '<span class="button__subtext">' . $subtext . '</span>';
  }

  return sprintf('<a href="%s" class="%s">%s%s</a>',
    $href,
    join(' ', $classes),
    $text_markup,
    $subtext_markup
  );
}
add_shortcode('button', __NAMESPACE__ . '\\button');

function as_seen_in( $atts, $content ) {
  $img_path = ($atts['type'] ?? false) === 'dark' ? 'as-seen-in-dark' : 'as-seen-in';
  $classes = array_merge(['as-seen-in'], explode(' ', $atts['classes'] ?? ''));
  $img_dir = get_template_directory_uri();
  $alt = $atts['alt'] ?? 'Nate Green has been featured on multiple major websites.';
  $srcset = [
    Assets\asset_path("images/${img_path}-300w.png") . " 300w",
    Assets\asset_path("images/${img_path}.png") . " 360w",
    Assets\asset_path("images/${img_path}@2x.png") . " 720w",
  ];
  return sprintf('<img src="%s" srcset="%s" alt="%s" class="%s">',
    Assets\asset_path("images/${img_path}@2x.png"),
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
    Assets\asset_path('signature@2x.png'),
    join(', ', $srcset),
    $alt,
    join(' ', $classes)
  );
}
add_shortcode('signature', __NAMESPACE__ . '\\signature');

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
  return OptIn\get_markup();
}
add_shortcode('opt-in', __NAMESPACE__ . '\\optin');

function footnote( $atts, $content=NULL )
{
    return Footnotes\add_footnote($content, get_permalink());
}
add_shortcode('footnote', __NAMESPACE__ . '\\footnote');
