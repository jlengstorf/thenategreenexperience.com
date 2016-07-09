<?php

namespace NGE\Custom\Filters;

function get_attribution( $caption, $img_id ) {
  $attr_text = get_field('attribution', $img_id) ?? false;

  if ($attr_text) {
    $attribution = sprintf(' <small class="%s">Credit: %s</small>',
      'figure__attribution',
      get_attribution_link($img_id, $attr_text)
    );
  } else {
    $attribution = '';
  }

  return $caption . $attribution;
}
add_filter('image_add_caption_text', __NAMESPACE__ . '\\get_attribution', 10, 2);

function get_attribution_link( $img_id, $attr ) {
  $attr_link = get_field('attribution_link', $img_id) ?? false;

  if ($attr_link) {
    return sprintf('<a href="%s" class="figure__attribution-link">%s</a>',
      $attr_link,
      $attr
    );
  } else {
    return $attr;
  }
}

function wrapped_image( $matches ) {
  $image = $matches['image'];
  $ratio = $matches['height'] / $matches['width'] * 100;
  $padding = "padding-bottom: $ratio%;";
  return sprintf('<div class="js--lazyload" style="%s">%s</div>', $padding, $image);
}

function add_lazyloading( $content ) {
  $pattern = '/(?<image><img(?:.*?)width="(?<width>\d+)"(?:.*?)height="(?<height>\d+)"(?:.*?)>)/i';
  return preg_replace_callback($pattern, __NAMESPACE__ . '\\wrapped_image', $content);
}
add_filter('the_content', __NAMESPACE__ . '\\add_lazyloading', 90);

function filter_image_content( $content ) {
  $blank = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///////' .
           'yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
  $pattern = '/class="(.*?)js--lazyload(.*?)"(.*?)(?<!\<noscript\>)<img(.*?)srcset="(.*?)"/is';
  $replace = 'class="$1js--lazyload$2"$3<img$4srcset="' . $blank . '" data-lazyload="$5"';

  // Returns the content.
  return preg_replace($pattern, $replace, $content);
}
add_filter( 'the_content', __NAMESPACE__ . '\\filter_image_content', 100 );
