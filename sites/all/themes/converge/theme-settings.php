<?php  
// $Id$
/**
 * @file
 * theme-settings.php
 */
include_once './'. drupal_get_path('theme', 'fusion_core') .'/theme-settings.php';


/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @return
 *   A form array. 
 */
function converge_settings($saved_settings) {
  $form = array();
  // Get the default values from the .info file.
  $defaults = fusion_core_default_theme_settings('converge');
  $settings = array_merge($defaults, $saved_settings);


  // Add the base theme's settings.
  $form += phptemplate_settings($saved_settings, $defaults);
  $form['tnt_container']['general_settings']['theme_font_config']['theme_font_config_font']['theme_font'] = array(
    '#type'          => 'radios',
    '#title'         => t('Select a new font family'),
    '#default_value' => $settings['theme_font'],
    '#options'       => array(
      'none' => t('Theme default'),
      'font-family-sans-serif-sm' => '<span class="font-family-sans-serif-sm">' . t('Sans serif - smaller (Helvetica Neue, Arial, Helvetica, sans-serif)') . '</span>',
      'font-family-sans-serif-lg' => '<span class="font-family-sans-serif-lg">' . t('Sans serif - larger (Verdana, Geneva, Arial, Helvetica, sans-serif)') . '</span>',
      'font-family-serif-sm' => '<span class="font-family-serif-sm">' . t('Serif - smaller (Garamond, Perpetua, Nimbus Roman No9 L, Times New Roman, serif)') . '</span>',
      'font-family-serif-lg' => '<span class="font-family-serif-lg">' . t('Serif - larger (Baskerville, Georgia, Palatino, Palatino Linotype, Book Antiqua, URW Palladio L, serif)') . '</span>',
      'font-family-myriad' => '<span class="font-family-myriad">' . t('Myriad (Myriad Pro, Myriad, Trebuchet MS, Arial, Helvetica, sans-serif)') . '</span>',
      'font-family-lucida' => '<span class="font-family-lucida">' . t('Lucida (Lucida Sans, Lucida Grande, Lucida Sans Unicode, Verdana, Geneva, sans-serif)') . '</span>',
      'font-family-lucida-grande' => '<span class="font-family-lucida-grande">' . t('Lucida Grande, Lucida Sans Unicode, Arial, Verdana, sans-serif') . '</span>',
    ),
  );
	

  // Sidebar layout
  $form['tnt_container']['general_settings']['theme_grid_config']['header_top_region'] = array(
    '#type'          => 'select',
    '#title'         => t('Always keep header top region open'),
    '#default_value' => $settings['header_top_region'],
    '#options'       => array(
      'header-top-no-collpaisble' => t('yes'),
      'header-top-collpaisble' => t('no - keep it collpasible'),
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['sidebar_layout']['#options'][$defaults['sidebar_layout']] .= t(' - Theme Default');


  // Theme Featured Background
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_featured_background'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Featured Background'),
    '#default_value'     => $settings['theme_featured_background'],
	'#description'       => t('Default color - #098c90'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFeaturedBg' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_featured_background_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_featured_background_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Featured Color
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_featured_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Featured Color'),
    '#default_value'     => $settings['theme_featured_color'],
	'#description'       => t('Default color - #f5f5f5'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFeaturedColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_featured_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_featured_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Featured 2 Background
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_featured2_background'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Featured 2 Background'),
    '#default_value'     => $settings['theme_featured2_background'],
	'#description'       => t('Default color - #060606'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFeatured2Bg' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_featured2_background_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_featured2_background_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );



  // Theme Featured 2 Color
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_featured2_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Featured 2 Color'),
    '#default_value'     => $settings['theme_featured2_color'],
	'#description'       => t('Default color - #c7c7c7'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFeatured2Color' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_featured2_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_featured2_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Footer Background
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_footer_background'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Footer Background'),
	'#description'       => t('Default color - #000000'),
    '#default_value'     => $settings['theme_footer_background'],
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFooterBg' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_footer_background_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_footer_background_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Basic Theme Color/Style
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Basic Color/Style'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );


  // Theme Font Color
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_font_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Font Color'),
    '#default_value'     => $settings['theme_font_color'],
	'#description'       => t('Default color - #676767'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFontColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_font_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_font_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Heading Color
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_heading_font_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Heading Color i.e. h1,h2,h3...h6'),
    '#default_value'     => $settings['theme_heading_font_color'],
	'#description'       => t('Default color - #424242'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomHeadingFontColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_heading_font_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_heading_font_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Selection Background Color
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_selection_bg_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Selection Background Color'),
    '#default_value'     => $settings['theme_selection_bg_color'],
	'#description'       => t('Default color - #009add'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomSelectionBgColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_selection_bg_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_selection_bg_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Selection Color
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_selection_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Selection Color'),
    '#default_value'     => $settings['theme_selection_color'],
	'#description'       => t('Default color - #ffffff'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomSelectionColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_selection_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_selection_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Link Color
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_link_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Link Color'),
    '#default_value'     => $settings['theme_link_color'],
	'#description'       => t('Default color - #5C5C5C'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomLinkColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_link_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_link_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );

  // Theme Link Hover Color
  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_link_hover_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Link Hover Color'),
    '#default_value'     => $settings['theme_link_hover_color'],
	'#description'       => t('Default color - #000000'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomLinkHoverColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['theme_color_style']['theme_link_hover_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_link_hover_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Footer Theme Color/Style
  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style'] = array(
    '#type' => 'fieldset',
    '#title' => t('Theme Footer Color/Style'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );


  // Theme Footer Font Color
  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_font_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Footer Font Color'),
	'#description'       => t('Default color - #cecece'),
    '#default_value'     => $settings['theme_footer_font_color'],
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFooterFontColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_font_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_footer_font_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Footer Heading Color
  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_heading_font_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Footer Heading Color i.e. h1,h2,h3...h6'),
	'#description'       => t('Default color - #ffffff'),
    '#default_value'     => $settings['theme_footer_heading_font_color'],
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFooterHeadingFontColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_heading_font_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_footer_heading_font_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Footer Selection Background Color
  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_selection_bg_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Footer Selection Background Color'),
	'#description'       => t('Default color - #009add'),
    '#default_value'     => $settings['theme_footer_selection_bg_color'],
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFooterSelectionBgColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_selection_bg_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_footer_selection_bg_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Footer Selection Text Color
  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_selection_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Footer Selection Color'),
	'#description'       => t('Default color - #ffffff'),
    '#default_value'     => $settings['theme_footer_selection_color'],
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFooterSelectionColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_selection_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_footer_selection_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );


  // Theme Footer Link Color
  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_link_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Footer Link Color'),
	'#description'       => t('Default color - #e8e8e8'),
    '#default_value'     => $settings['theme_footer_link_color'],
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFooterLinkColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_link_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_footer_link_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );

  // Theme Footer Link Hover Color
  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_link_hover_color'] = array(
    '#type'             => 'select',
    '#title'             => t('Theme Footer Link Hover Color'),
    '#default_value'     => $settings['theme_footer_link_hover_color'],
	'#description'       => t('Default color - #a6a6a6'),
    '#options' => array(
    '1cbfc0' => t('Aqua'),
    '6a6a6a' => t('Ash'),
	'009add' => t('Blue'),
	'3f3f3f' => t('Black'),
	'28b433' => t('Green'),
    'abcf0e' => t('limegreen'),
	'dd5800' => t('Orange'),
	'dd00a1' => t('Pink'),
	'a100dd' => t('Purple'),
	'dd0000' => t('Red'),
	'309bac' => t('Teal'),
	'ddb400' => t('Yellow'),
    'CustomFooterLinkHoverColor' => t('Custom (Pick a color below)')
    ),
  );

  $form['tnt_container']['general_settings']['theme_grid_config']['footer_theme_color_style']['theme_footer_link_hover_color_custom'] = array(
    '#type'             => 'colorpicker',
    '#default_value'     => $settings['theme_footer_link_hover_color_custom'],
    '#size'             => 40,
    '#maxlength'         => 200,
  );



  // Return the form 
  return $form;
}