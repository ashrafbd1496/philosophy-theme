<?php
// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'philosophy_options';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' =>__('Philosophy Options','philosophy'),
    'menu_slug'  => 'philosophy_options',
    'framework_title'  => __('Philosophy Theme Options','philosophy'),
    'menu_slug'  => 'philosophy_options',
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'id'  => 'header_options',
    'title'  => 'Header Option',
    'icon'  => 'fas fa-header',
    'fields' => array(
      array(
        'id'    => 'logo',
        'type'  => 'media',
        'title' => 'Logo',
      ),
      array(
        'id'    => 's_links',
        'type'  => 'text',
        'title' => 'Social Links',
      ),
      array(
        'id'    => 'search_button',
        'type'  => 'icon',
        'title' => 'Search Button',
      ),

    )
    ),

);

$prefix_page_opts ='philosophy_page_options';
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Overview',
  'icon'   => 'fas fa-rocket',
  'fields' => array(

    //
    // A text field
    //
    array(
      'id'    => 'opt-text',
      'type'  => 'text',
      'title' => 'Text',
    ),

    array(
      'id'    => 'opt-textarea',
      'type'  => 'textarea',
      'title' => 'Textarea',
      'help'  => 'The help text of the field.',
    ),

    array(
      'id'    => 'opt-upload',
      'type'  => 'upload',
      'title' => 'Upload',
    ),

    array(
      'id'    => 'opt-switcher',
      'type'  => 'switcher',
      'title' => 'Switcher',
      'label' => 'The label text of the switcher.',
    ),

    array(
      'id'      => 'opt-color',
      'type'    => 'color',
      'title'   => 'Color',
      'default' => '#3498db',
    ),

    array(
      'id'    => 'opt-checkbox',
      'type'  => 'checkbox',
      'title' => 'Checkbox',
      'label' => 'The label text of the checkbox.',
    ),

    array(
      'id'      => 'opt-radio',
      'type'    => 'radio',
      'title'   => 'Radio',
      'options' => array(
        'yes'   => 'Yes, Please.',
        'no'    => 'No, Thank you.',
      ),
      'default' => 'yes',
    ),

    array(
      'id'          => 'opt-select',
      'type'        => 'select',
      'title'       => 'Select',
      'placeholder' => 'Select an option',
      'options'     => array(
        'opt-1'     => 'Option 1',
        'opt-2'     => 'Option 2',
        'opt-3'     => 'Option 3',
      ),
    ),

  )
));


}