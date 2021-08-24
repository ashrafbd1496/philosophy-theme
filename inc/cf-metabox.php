<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$prefix_page_opts = '_prefix_page_options';

//
// Create a metabox
//
CSF::createMetabox( $prefix_page_opts, array(
  'title'        => 'Custom Page Options',
  'post_type'    => 'page',
  'show_restore' => true,
  'exclude_post_types' => array(),
  'page_templates'     => 'about.php',
) );

//
// Create a section
//
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
      'id'    => 'opt-checkbox',
      'type'  => 'checkbox',
      'title' => 'Checkbox',
      'label' => 'The label text of the checkbox.',
      'default'=>1,
    ),

    array(
      'id'    => 'show_color_selector',
      'type'  => 'switcher',
      'title' => 'Show Select Color',
      'label' => 'The label text of the switcher.',
      'default'=>0,
    ),

    array(
      'id'      => 'opt-color',
      'type'    => 'color',
      'title'   => 'Color',
      'default' => '#3498db',
      'dependency'=>array('show_color_selector|opt-checkbox','==|==','1|1'),

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
) );

//
// Create a section
//
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'More Fields',
  'icon'   => 'fas fa-tint',
  'fields' => array(

    array(
      'id'      => 'opt-image-select',
      'type'    => 'image_select',
      'title'   => 'Image Select',
      'options' => array(
        'opt-1' => 'http://codestarframework.com/assets/images/placeholder/100x80-2ecc71.gif',
        'opt-2' => 'http://codestarframework.com/assets/images/placeholder/100x80-e74c3c.gif',
        'opt-3' => 'http://codestarframework.com/assets/images/placeholder/100x80-ffbc00.gif',
        'opt-4' => 'http://codestarframework.com/assets/images/placeholder/100x80-3498db.gif',
        'opt-5' => 'http://codestarframework.com/assets/images/placeholder/100x80-555555.gif',
      ),
      'default' => 'opt-1',
    ),

    array(
      'id'    => 'opt-background',
      'type'  => 'background',
      'title' => 'Background',
    ),

    array(
      'type'    => 'notice',
      'style'   => 'success',
      'content' => 'A <strong>notice</strong> field with <strong>success</strong> style.',
    ),

    array(
      'id'    => 'opt-icon',
      'type'  => 'icon',
      'title' => 'Icon',
    ),

    array(
      'id'    => 'opt-alt-text',
      'type'  => 'text',
      'title' => 'Text',
    ),

    array(
      'id'         => 'opt-alt-textarea',
      'type'       => 'textarea',
      'title'      => 'Textarea',
      'subtitle'   => 'A textarea with shortcoder.',
      'shortcoder' => 'csf_demo_shortcodes',
    ),

  )
) );

//
// Metabox of the POST
// Set a unique slug-like ID
//
$prefix_post_opts = '_prefix_post_options';

//
// Create a metabox
//
CSF::createMetabox( $prefix_post_opts, array(
  'title'        => 'Philosophy Post Options',
  'post_type'    => 'post',
  'show_restore' => true,
) );

//
// Create a section
//
CSF::createSection( $prefix_post_opts, array(
  'fields' => array(

    //
    // A text field
    //
    array(
      'id'    => 'post_title',
      'type'  => 'text',
      'title' => 'Post Title',
    ),
    array(
      'id'    => 'post_sub_title',
      'type'  => 'text',
      'title' => 'Post Sub Title',
    ),


    array(
      'id'    => 'post_excerpt',
      'type'  => 'textarea',
      'title' => 'Post Excerpt',
      'help'  => 'The help text of the field.',
    ),
    array(
      'id'    => 'post_details',
      'type'  => 'textarea',
      'title' => 'Post Details',
      'help'  => 'The help text of the field.',
    ),

    array(
      'id'    => 'feature_image',
      'type'  => 'upload',
      'title' => 'Feature Image',
    ),

    array(
      'id'    => 'opt-switcher',
      'type'  => 'switcher',
      'title' => 'Switcher',
      'label' => 'The label text of the switcher.',
    ),

    array(
      'id'    => 'heading-color',
      'type'  => 'color',
      'title' => 'Heading Color',
    ),

  )
) );

//
// Metabox of the PAGE and POST both.
// Set a unique slug-like ID
//
$prefix_meta_opts = '_prefix_meta_options';

//
// Create a metabox
//
CSF::createMetabox( $prefix_meta_opts, array(
  'title'     => 'Custom Options',
  'post_type' => array( 'post', 'page' ),
  'context'   => 'side',
) );

//
// Create a section
//
CSF::createSection( $prefix_meta_opts, array(
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
      'id'    => 'opt-switcher',
      'type'  => 'switcher',
      'title' => 'Switcher',
      'label' => 'The label of the switcher.',
    ),

    array(
      'id'    => 'opt-color',
      'type'  => 'color',
      'title' => 'Color',
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
) );
