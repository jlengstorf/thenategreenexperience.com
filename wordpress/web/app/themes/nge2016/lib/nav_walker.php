<?php

namespace NGE\Custom\Nav;

class Walker extends \Walker_Nav_Menu {

  public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $post;
    $title = apply_filters('the_title', $item->title, $item->ID);

    // This is a hack since WP won’t accept custom props in the walker setup.
    $base_class = $args->menu_class ?? 'nav__link';
    $modifiers = [
      $item->post_name,
      $item->current ? 'current' : '',
    ];
    $link = sprintf('<a href="%s" class="%s">%s</a>',
      $item->url ?? '#no-link',
      join(' ', $this->_add_modifiers($base_class, $modifiers)),
      $title
    );
    $output .= apply_filters('walker_nav_menu_start_el', $link, $item, $depth, $args);
  }

  public function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "\n";
  }

  private function _add_modifiers( $element_class, $modifiers = array() ) {
    $classes = [$element_class];
    foreach ($modifiers as $modifier) {
      if (!empty($modifier)){
        $classes[] = "${element_class}--${modifier}";
      }
    }

    return $classes;
  }

}
