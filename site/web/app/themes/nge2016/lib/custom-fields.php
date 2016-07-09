<?php

namespace NGE\Custom\CustomFields;

function hide_acf_menu(  ) {
  if (getenv('WP_ENV') !== 'development') {
    add_filter('acf/settings/show_admin', '\\__return_false');
  }
}
add_action('after_setup_theme', __NAMESPACE__ . '\\hide_acf_menu');

function add_options_page(  ) {
  if (!function_exists('acf_add_options_page')) {
    return;
  }

  acf_add_options_page(array(
    'page_title'  => 'Footer Mini-Bio',
    'menu_title'  => 'Footer Mini-Bio',
    'parent_slug' => 'options-general.php',
  ));

  acf_add_options_page(array(
    'page_title'  => 'Email Capture',
    'menu_title'  => 'Email Capture',
    'parent_slug' => 'options-general.php',
  ));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\add_options_page');

// Add the custom fields (grouped here for easier scanning).
add_action('after_setup_theme', __NAMESPACE__ . '\\add_mini_bio_fields');
add_action('after_setup_theme', __NAMESPACE__ . '\\add_popover_fields');
add_action('after_setup_theme', __NAMESPACE__ . '\\add_peeker_fields');
add_action('after_setup_theme', __NAMESPACE__ . '\\add_hero_fields');
add_action('after_setup_theme', __NAMESPACE__ . '\\add_image_credit_fields');

function add_mini_bio_fields(  ) {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array (
    'key' => 'group_577facfc1ad19',
    'title' => 'Footer Mini-Bio',
    'fields' => array (
      array (
        'key' => 'field_577fad078a6dc',
        'label' => 'Heading',
        'name' => 'heading',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
      array (
        'key' => 'field_577fad4c8a6dd',
        'label' => 'Bio Text',
        'name' => 'bio_text',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'basic',
        'media_upload' => 0,
      ),
      array (
        'key' => 'field_577fad618a6de',
        'label' => 'Headshot',
        'name' => 'headshot',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
      array (
        'key' => 'field_577fada08a6df',
        'label' => 'Headshot Caption',
        'name' => 'headshot_caption',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-footer-mini-bio',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));
}

function add_popover_fields(  ) {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array (
    'key' => 'group_577fe366306cb',
    'title' => 'Popover Text',
    'fields' => array (
      array (
        'key' => 'field_577fe36cf0041',
        'label' => 'Heading',
        'name' => 'popover_heading',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
      array (
        'key' => 'field_577fe379f0042',
        'label' => 'Text',
        'name' => 'popover_text',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'basic',
        'media_upload' => 0,
      ),
      array (
        'key' => 'field_577fe39ff0043',
        'label' => 'Button Text',
        'name' => 'popover_button_text',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-email-capture',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));
}

function add_peeker_fields (  ) {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array (
    'key' => 'group_57814c087cade',
    'title' => 'Peeker Text',
    'fields' => array (
      array (
        'key' => 'field_57814c2eb3f48',
        'label' => 'Show the peeker?',
        'name' => 'peeker_active',
        'type' => 'true_false',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'message' => 'Yes, show a peeker on blog posts when the user has scrolled almost to the end of the post.',
        'default_value' => 0,
      ),
      array (
        'key' => 'field_57814c10b3f47',
        'label' => 'Heading',
        'name' => 'peeker_heading',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array (
          array (
            array (
              'field' => 'field_57814c2eb3f48',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
      array (
        'key' => 'field_57814c90b3f49',
        'label' => 'Text',
        'name' => 'peeker_text',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array (
          array (
            array (
              'field' => 'field_57814c2eb3f48',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'basic',
        'media_upload' => 0,
      ),
      array (
        'key' => 'field_57814cb6b3f4a',
        'label' => 'Button Text',
        'name' => 'peeker_button',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => array (
          array (
            array (
              'field' => 'field_57814c2eb3f48',
              'operator' => '==',
              'value' => '1',
            ),
          ),
        ),
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => 'Sign Up',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-email-capture',
        ),
      ),
    ),
    'menu_order' => 1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));
}

function add_hero_fields(  ) {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array (
    'key' => 'group_577f9ed9d43c5',
    'title' => 'Hero Box',
    'fields' => array (
      array (
        'key' => 'field_577f9ee36c320',
        'label' => 'Heading',
        'name' => 'heading',
        'type' => 'text',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
      array (
        'key' => 'field_577f9f106c321',
        'label' => 'CTA Text',
        'name' => 'cta_text',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'basic',
        'media_upload' => 0,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'front_page',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => 'For the home page text that overlays the image.',
  ));
}

function add_image_credit_fields(  ) {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  acf_add_local_field_group(array (
    'key' => 'group_577654331cc0f',
    'title' => 'Image Credit',
    'fields' => array (
      array (
        'key' => 'field_57765445114c7',
        'label' => 'Credit',
        'name' => 'attribution',
        'type' => 'text',
        'instructions' => 'Who owns this image?',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
        'readonly' => 0,
        'disabled' => 0,
      ),
      array (
        'key' => 'field_5776545d114c8',
        'label' => 'Link',
        'name' => 'attribution_link',
        'type' => 'url',
        'instructions' => 'Link to image owner.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'attachment',
          'operator' => '==',
          'value' => 'all',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => 'For adding credits to media attachments.',
  ));
}
