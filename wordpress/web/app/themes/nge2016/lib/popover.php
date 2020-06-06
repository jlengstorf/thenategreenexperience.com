<?php

namespace NGE\Custom\Popover;

/**
 * This class allows us to only add popover markup when needed.
 */
class PopoverState {
  static $visible = false;
}

function markup(  ) {
  if (PopoverState::$visible) {
    get_template_part('templates/popover');
  }
}

function show(  ) {
  PopoverState::$visible = true;
}
