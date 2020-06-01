<?php

namespace NGE\Custom\Peeker;

function markup(  ) {
  if (is_single() && get_field('peeker_active', 'options')) {
    get_template_part('templates/peeker');
  }
}
