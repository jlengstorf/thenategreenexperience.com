<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/nav_walker.php', // Custom NGE nav walker
  'lib/shortcodes.php', // Custom NGE shortcodes
  'lib/filters.php',    // Custom NGE filters
  'lib/opt-in.php',    // Custom NGE opt-in
  'lib/footnotes.php',    // Custom NGE footnotes handling
  'lib/custom-fields.php',    // Custom NGE ACF settings and initialization
  'lib/popover.php',    // Custom NGE popover
  'lib/peeker.php',    // Custom NGE sidebar peeker thing
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
