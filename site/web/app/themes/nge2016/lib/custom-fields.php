<?php

namespace NGE\Custom\CustomFields;

function add_options_page(  ) {
  if (!function_exists('acf_add_options_page')) {
    return;
  }

  acf_add_options_page(array(
    'page_title'  => 'Mini-Bio',
    'menu_title'  => 'Footer Mini-Bio',
    'parent_slug' => 'options-general.php',
  ));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\add_options_page');
add_action('after_setup_theme', __NAMESPACE__ . '\\add_mini_bio_fields');

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
