<?php

namespace NGE\Custom\Filters;

use NGE\Custom\Popover;

function image_markup( $html, $id, $caption, $title, $align, $url, $size, $alt ) {
  $full_pattern = '<div class="figure__image-wrap js--lazyload">' .
                  '%7$s<img class="%1$s" alt="%2$s" src="%3$s" ' .
                  'data-lazyload="%4$s" srcset="%5$s" sizes="%6$s">' .
                  '<noscript><img class="%1$s" alt="%2$s" src="%3$s" ' .
                  'srcset="%4$s" sizes="%6$s"></noscript>%8$s</div>';

  $classes = join(' ', [ 'js--lazyload', 'figure__image-wrap' ]);
  $fallback_src = get_src($id, $size);
  $srcset = join(', ', get_srcset($id));
  $sizes = get_sizes($align);
  $blank = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///////' .
           'yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';

  $image = sprintf('<img class="%s" alt="%s" src="%s" srcset="%s" sizes="%s">',
    $classes,
    $alt,
    $fallback_src,
    $srcset,
    $sizes
  );

  $fallback = sprintf('<noscript>%s</noscript>', $image);

  $wrapper_pattern = '<div class="figure__image-wrap js--lazyload" ' .
                     'style="%s">%s%s%s</div>';

  $image_link = get_image_link($url);

  $wrapper = sprintf($wrapper_pattern,
    get_image_aspect_ratio($id),
    $image_link['start'],
    $image,
    $fallback,
    $image_link['end']
  );

  $figure_pattern = '<figure class="%s">%s%s</figure>';

  return sprintf($figure_pattern,
    join(' ', get_image_classes('figure', $align)),
    $wrapper,
    get_caption($id, $caption)
  );
}
add_filter('image_send_to_editor', __NAMESPACE__ . '\\image_markup', 10, 8);

function get_image_link( $url ) {
  $link = [
    'start' => '',
    'end' => '',
  ];

  if (!empty($url)) {
    $link['start'] = sprintf('<a href="%s" class="figure__image-link">', $url);
    $link['end'] = '</a>';
  }

  return $link;
}

function get_image_classes( $base_class, $align ) {
  $classes = [$base_class];
  if ($align) {
    $classes[] = sprintf('%s--%s', $base_class, $align);
  }

  return $classes;
}

function get_dir( $rel_path ) {
  $sep = DIRECTORY_SEPARATOR;
  return wp_upload_dir()['baseurl'] . $sep . dirname($rel_path) . $sep;
}

function get_src( $img_id, $size ) {
  $image = wp_get_attachment_metadata($img_id);
  $dir = get_dir( $image['file'] );
  if (array_key_exists($size, $image['sizes'])) {
    return $dir . $image['sizes'][$size]['file'];
  } else {
    return $dir . basename($image['file']);
  }
}

function get_srcset( $img_id ) {
  $srcset = [];
  $image = wp_get_attachment_metadata($img_id);
  $dir = get_dir( $image['file'] );
  $sizes = $image['sizes'];

  foreach( $sizes as $size => $img ) {
    if ($size !== 'thumbnail') {
      $srcset[] = $dir . $img['file'] . ' ' . $img['width'] . 'w';
    }
  }

  $srcset[] = $dir . basename($image['file']) . ' ' . $image['width'] . 'w';

  return $srcset;
}

function get_image_aspect_ratio( $img_id ) {
  extract(wp_get_attachment_metadata($img_id));

  return sprintf('padding-bottom: %01.2f%%;', ($height / $width * 100));
}

function get_sizes( $align ) {
  if ($align === 'center') {
    return '(min-width: 690px) 690px, 100vw';
  } else {
    return '(min-width: 690px) 300px, 100vw';
  }
}

function get_caption( $img_id, $caption ) {
  $attr = get_attribution($img_id);

  if (!empty($caption) || !empty($attr)) {
    return sprintf('<figcaption class="%s">%s%s</figcaption>',
      'figure__caption',
      $caption,
      $attr
    );
  } else {
    return '';
  }
}

function get_attribution( $img_id ) {
  $attr_text = get_field('attribution', $img_id) ?? false;

  if ($attr_text) {
    return sprintf(' <small class="%s">Credit: %s</small>',
      'figure__attribution',
      get_attribution_link($img_id, $attr_text)
    );
  } else {
    return '';
  }
}

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

function filter_image_content( $content ) {
  $blank = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///////' .
           'yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
  $pattern = '/<figure(.*?)class="(.*?)js--lazyload(.*?)"(.*?)(?<!\<noscript\>)<img(.*?)srcset="(.*?)"(.*?)<\/figure>/is';
  $replace = '<figure$1class="$2js--lazyload$3"$4<img$5srcset="' . $blank . '" data-lazyload="$6"$7</figure>';

  // Returns the content.
  return preg_replace($pattern, $replace, $content);
}
add_filter( 'the_content', __NAMESPACE__ . '\\filter_image_content', 100 );
