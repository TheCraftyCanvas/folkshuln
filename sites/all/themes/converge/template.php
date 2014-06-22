<?php
// $Id$

/**		
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 */

/**
 * Implementation of HOOK_theme().
 */
function converge(&$existing, $type, $theme, $path) {
  $hooks = fusion_core($existing, $type, $theme, $path);
  return $hooks;
}

function converge_imagecache($presetname, $path, $alt = '', $title = '', $attributes = NULL, $getsize = TRUE, $absolute = TRUE) {
  
  // Check is_null() so people can intentionally pass an empty array of
  // to override the defaults completely.
  if (is_null($attributes)) {
    $attributes = array('class' => 'imagecache imagecache-'. $presetname);
  }
  if ($getsize && ($image = image_get_info(imagecache_create_path($presetname, $path)))) {
    $attributes['width'] = $image['width'];
    $attributes['height'] = $image['height'];
	//cpr($attributes);
  }

  $attributes = drupal_attributes($attributes);
  switch($presetname) {
	  case 'album_feature':
	  case 'galleryformatter_thumb':
	 
	 break;
	  default:
	  //cpr($attributes['width']);
	  if($alt) $capt = '<div class="fcaption" style="padding-bottom:3px;line-height:normal;width:'.$image['width'].'px" >'.check_plain($alt).'</div>';
	  break;
	  
	  
  }
  $imagecache_url = imagecache_create_url($presetname, $path, FALSE, $absolute);
  return '<img src="'. $imagecache_url .'" alt="'. check_plain($alt) .'" title="'. check_plain($title) .'" '. $attributes .' />'.$capt;
}
/**
 * Theme a "you can't post comments" notice.
 *
 * @param $node
 *   The comment node.
 * @ingroup themeable
 */
function converge_comment_post_forbidden($node) {
  global $user;
  static $authenticated_post_comments;

  if (!$user->uid) {
    if (!isset($authenticated_post_comments)) {
      // We only output any link if we are certain, that users get permission
      // to post comments by logging in. We also locally cache this information.
      $authenticated_post_comments = array_key_exists(DRUPAL_AUTHENTICATED_RID, user_roles(TRUE, 'post comments') + user_roles(TRUE, 'post comments without approval'));
    }

    if ($authenticated_post_comments) {
      // We cannot use drupal_get_destination() because these links
      // sometimes appear on /node and taxonomy listing pages.
      if (variable_get('comment_form_location_'. $node->type, COMMENT_FORM_SEPARATE_PAGE) == COMMENT_FORM_SEPARATE_PAGE) {
        $destination = 'destination='. rawurlencode("comment/reply/$node->nid#comment-form");
      }
      else {
        $destination = 'destination='. rawurlencode("node/$node->nid#comment-form");
      }

      if (variable_get('user_register', 1)) {
        // Users can register themselves.
        return t('<a href="@login"><span>Login</span></a> <span class="regulat-text">or</span> <a href="@register"><span>register</span></a> <span class="regulat-text">to post comments</span>', array('@login' => url('user/login', array('query' => $destination)), '@register' => url('user/register', array('query' => $destination))));
      }
      else {
        // Only admins can add new users, no public registration.
        return t('<a href="@login"><span>Login</span></a> to post comments', array('@login' => url('user/login', array('query' => $destination))));
      }
    }
  }
}


/**
 * Process variables for forums.tpl.php
 *
 * The $variables array contains the following arguments:
 * - $forums
 * - $topics
 * - $parents
 * - $tid
 * - $sortby
 * - $forum_per_page
 *
 * @see forums.tpl.php
 */
function converge_preprocess_forums(&$variables) {
  global $user;
  if (isset($variables['links']['login'])) {
    $variables['links']['login']['title'] = str_replace('to post new content in the forum.','<span class="regular_text">to post new content in the forum.</span>',$variables['links']['login']['title']);
  }
}


/**
 * Adds spans and useful ID's to the links below post.
 *
 */
function converge_links($links, $attributes = array('class' => 'links')) {
 // cpr($links);
  $output = '';
  if (count($links) > 0) {
    $output = '<ul'. drupal_attributes($attributes) .'>';
    $num_links = count($links);
    $i = 1;
    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && $link['href'] == $_GET['q']) {
        $class .= ' active';
      }
      $output .= '<li class="'. $class .'">';
      if (isset($link['href'])) {

        // Pass in $link as $options, they share the same keys.
        $link['html'] = TRUE;
        $output .= l('<span>'. $link['title'] .'</span>', $link['href'], $link);
      }
      else if (!empty($link['title'])) {

        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }
      $i++;
      $output .= "</li>\n";
    }
    $output .= '</ul>';
  }
  return $output;
}


/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function converge_breadcrumb($breadcrumb) {
  
 // cpr($breadcrumb);
 if(is_array($breadcrumb)) {
	 foreach($breadcrumb AS $k => $v) {
		 if(strstr($v,'nolink')) {
			 $breadcrumb[$k] = '<a href="#" class="nlink">'.strip_tags($v).'</a>';
			// cpr('yes');
		 }
	 }
 }
 
 //cpr( implode('', $breadcrumb) );
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode('&nbsp;&raquo;&nbsp;', $breadcrumb) .'</div>';
  }
}


/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function converge_preprocess_page(&$vars) {
  if(arg(0) == 'contact') $vars['title'] = 'Contact Us';
  
  
  $theme_background = theme_get_setting('theme_background');
  $themes = array();
  foreach ($vars['css']['all']['theme'] as $key => $value) {
    $themes[$key] = $value;
  }
  $vars['css']['all']['theme'] = $themes;
  $vars['styles'] = drupal_get_css($vars['css']);
  if (!module_exists('conditional_styles')) {
    $vars['styles'] .= $vars['conditional_styles'] = variable_get('conditional_styles_'. $GLOBALS['theme'], '');
  }

  if ($vars['logo'] != '') {
	  //Extract logo size, used for maintain header vertically aligned 
    $logo_path_name = $_SERVER['DOCUMENT_ROOT'] . $vars['logo'];
    if (file_exists($logo_path_name)) {
      if ($logo_size = getimagesize($logo_path_name )) {
        $vars['logo_size'] = $logo_size; 
      }
    }
	}

  $body_classes = split(' ', $vars['body_classes']);
  // Add class to body depends on selected primary menu from theme settings. 
  $vars['body_classes_array'] = $body_classes;
  $body_classes[] = theme_get_setting('theme_grid');

  if(empty($vars['preface_upper_top1'])){
    $classes[] ='preface-upper-top2';
  }
  // Set variable for header top region depending on theme settings
  $body_classes[] = theme_get_setting('header_top_region');

  // Set variable for featured background depending on theme settings
  $vars['theme_featured_background'] = (theme_get_setting('theme_featured_background') == 'CustomFeaturedBg') ? theme_get_setting('theme_featured_background_custom') : theme_get_setting('theme_featured_background');  
  
  // Set variable for featured 2 color depending on theme settings
  $vars['theme_featured_color'] = (theme_get_setting('theme_featured_color') == 'CustomFeaturedColor') ? theme_get_setting('theme_featured_color_custom') : theme_get_setting('theme_featured_color');  
  
  // Set variable for featured 2 background depending on theme settings
  $vars['theme_featured2_background'] = (theme_get_setting('theme_featured2_background') == 'CustomFeatured2Bg') ? theme_get_setting('theme_featured2_background_custom') : theme_get_setting('theme_featured2_background');  
  
  // Set variable for featured 2 color depending on theme settings
  $vars['theme_featured2_color'] = (theme_get_setting('theme_featured2_color') == 'CustomFeatured2Color') ? theme_get_setting('theme_featured2_color_custom') : theme_get_setting('theme_featured2_color');  
  
  // Set variable for footer background depending on theme settings
  $vars['theme_footer_background'] = (theme_get_setting('theme_footer_background') == 'CustomFooterBg') ? theme_get_setting('theme_footer_background_custom') : theme_get_setting('theme_footer_background');  
  
  // Set variable theme font color depending on theme settings
  $vars['theme_font_color'] = (theme_get_setting('theme_font_color') == 'CustomFontColor') ? theme_get_setting('theme_font_color_custom') : theme_get_setting('theme_font_color');  
  
  // Set variable theme heading i.e. h1,h2,h3...h6 color depending on theme settings
  $vars['theme_heading_font_color'] = (theme_get_setting('theme_heading_font_color') == 'CustomHeadingFontColor') ? theme_get_setting('theme_heading_font_color_custom') : theme_get_setting('theme_heading_font_color');  

  // Set variable for selection background color depending on theme settings
  $vars['theme_selection_bg_color'] = (theme_get_setting('theme_selection_bg_color') == 'CustomSelectionBgColor') ? theme_get_setting('theme_selection_bg_color_custom') : theme_get_setting('theme_selection_bg_color');  
  
  // Set variable for selection color depending on theme settings
  $vars['theme_selection_color'] = (theme_get_setting('theme_selection_color') == 'CustomSelectionColor') ? theme_get_setting('theme_selection_color_custom') : theme_get_setting('theme_selection_color');  
  
  // Set variable for link color depending on theme settings
  $vars['theme_link_color'] = (theme_get_setting('theme_link_color') == 'CustomLinkColor') ? theme_get_setting('theme_link_color_custom') : theme_get_setting('theme_link_color');  
  
  // Set variable for link hover color depending on theme settings
  $vars['theme_link_hover_color'] = (theme_get_setting('theme_link_hover_color') == 'CustomLinkHoverColor') ? theme_get_setting('theme_link_hover_color_custom') : theme_get_setting('theme_link_hover_color');  

  
  // Set variable theme footer heading i.e. h1,h2,h3...h6 color depending on theme settings
  $vars['theme_footer_heading_font_color'] = (theme_get_setting('theme_footer_heading_font_color') == 'CustomFooterHeadingFontColor') ? theme_get_setting('theme_footer_heading_font_color_custom') : theme_get_setting('theme_footer_heading_font_color');  

  // Set variable for footer selection background color depending on theme settings
  $vars['theme_footer_font_color'] = (theme_get_setting('theme_footer_font_color') == 'CustomFooterFontColor') ? theme_get_setting('theme_footer_font_color_custom') : theme_get_setting('theme_footer_font_color');  
  
  // Set variable for footer selection background color depending on theme settings
  $vars['theme_footer_selection_bg_color'] = (theme_get_setting('theme_footer_selection_bg_color') == 'CustomFooterSelectionBgColor') ? theme_get_setting('theme_footer_selection_bg_color_custom') : theme_get_setting('theme_footer_selection_bg_color');  
  
  // Set variable for footer selection color depending on theme settings
  $vars['theme_footer_selection_color'] = (theme_get_setting('theme_footer_selection_color') == 'CustomFooterSelectionColor') ? theme_get_setting('theme_footer_selection_color_custom') : theme_get_setting('theme_footer_selection_color');  
  
  // Set variable for footer link color depending on theme settings
  $vars['theme_footer_link_color'] = (theme_get_setting('theme_footer_link_color') == 'CustomFooterLinkColor') ? theme_get_setting('theme_footer_link_color_custom') : theme_get_setting('theme_footer_link_color');  
  
  // Set variable for link color depending on theme settings
  $vars['theme_footer_link_hover_color'] = (theme_get_setting('theme_footer_link_hover_color') == 'CustomFooterLinkHoverColor') ? theme_get_setting('theme_footer_link_hover_color_custom') : theme_get_setting('theme_footer_link_hover_color');  
  
  $vars['body_classes'] = implode(' ', $body_classes); // Concatenate with spaces.
}


 /**
 * Override or insert variables into the ddblock_cycle_block_content templates.
 *   Used to convert variables from view_fields to slider_items template variables
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * 
 */
function converge_preprocess_ddblock_cycle_block_content(&$vars) {
  if ($vars['output_type'] == 'view_fields') {
    $content = array();
    // Add slider_items for the template 
    // If you use the devel module uncomment the following line to see the theme variables
    // dsm($vars['settings']['view_name']);  
    // dsm($vars['content'][0]);
    // If you don't use the devel module uncomment the following line to see the theme variables
    // drupal_set_message('<pre>'. var_export($vars['settings']['view_name'], TRUE) .'</pre>');
    // drupal_set_message('<pre>'. var_export($vars['content'][0], TRUE) .'</pre>');
    if ($vars['settings']['view_name'] == 'front_featured') {
      if (!empty($vars['content'])) {
        foreach ($vars['content'] as $key1 => $result) {
          // add slide_image variable 
          if (isset($result->node_data_field_image_field_image_fid)) {
            // get image id
            $fid = $result->node_data_field_image_field_image_fid;
            // get path to image
            $filepath = db_result(db_query("SELECT filepath FROM {files} WHERE fid = %d", $fid));
            //  use imagecache (imagecache, preset_name, file_path, alt, title, array of attributes)
            if (module_exists('imagecache') && is_array(imagecache_presets()) && $vars['slide_image'] <> '<none>') {
              $slider_items[$key1]['slide_image'] = 
              l(theme('imagecache', 
                    $vars['imgcache_slide'], 
                    $filepath,
                    check_plain($result->node_title)),'node/'.$result->nid,array('html'=>'TRUE'));
            }
            else {          
              $slider_items[$key1]['slide_image'] = 
                '<a href="'. base_path() . 'node/' . $result->nid.'"><img src="' . base_path() . $filepath . 
                '" alt="' . check_plain($result->node_data_field_image_field_image_data) . 
                '"/></a>';     
            }          
          }
          // add slide_text variable
          if (isset($result->node_data_field_teaser_description_field_teaser_description_value)) {
            $slider_items[$key1]['slide_text'] =  check_markup($result->node_data_field_teaser_description_field_teaser_description_value);
          }
          // add slide_title variable
          if (isset($result->node_data_field_teaser_title_field_teaser_title_value)) {
            $slider_items[$key1]['slide_title'] =  check_plain($result->node_data_field_teaser_title_field_teaser_title_value);
          }
          // add slide_read_more variable and slide_node variable
          if (isset($result->nid)) {
            $slider_items[$key1]['nid'] =  $result->nid;
            $slider_items[$key1]['slide_node'] =  base_path() .'node/'. $result->nid;
          }
        }
      }
    }    
    $vars['slider_items'] = $slider_items;
  }
}


/**
 * Override or insert variables into the ddblock_cycle_pager_content templates.
 *   Used to convert variables from view_fields  to pager_items template variables
 *  Only used for custom pager items
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 *
 */
function converge_preprocess_ddblock_cycle_pager_content(&$vars) {
  if (($vars['output_type'] == 'view_fields') && ($vars['pager_settings']['pager'] == 'custom-pager')) {
    $content = array();
    // Add pager_items for the template 
    // If you use the devel module uncomment the following lines to see the theme variables
    // dsm($vars['pager_settings']['view_name']);     
    // dsm($vars['content'][0]);     
    // If you don't use the devel module uncomment the following lines to see the theme variables
    // drupal_set_message('<pre>'. var_export($vars['pager_settings'], TRUE) .'</pre>');
    // drupal_set_message('<pre>'. var_export($vars['content'][0], TRUE) .'</pre>');
    if ($vars['pager_settings']['view_name'] == 'front_featured') {
      if (!empty($vars['content'])) {
        foreach ($vars['content'] as $key1 => $result) {
          // add pager_item_image variable
          if (isset($result->node_data_field_image_field_image_fid)) {
            $fid = $result->node_data_field_image_field_image_fid;
            $filepath = db_result(db_query("SELECT filepath FROM {files} WHERE fid = %d", $fid));
            //  use imagecache (imagecache, preset_name, file_path, alt, title, array of attributes)
            if (module_exists('imagecache') && 
                is_array(imagecache_presets()) && 
                $vars['imgcache_pager_item'] <> '<none>') {
              $pager_items[$key1]['image'] = 
                theme('imagecache', 
                      $vars['pager_settings']['imgcache_pager_item'],              
                      $filepath,
                      check_plain($result->node_data_field_teaser_title_field_teaser_title_value));
            }
            else {          
              $pager_items[$key1]['image'] = 
                '<img src="'. base_path() . $filepath . 
                '" alt="'. check_plain($result->node_data_field_teaser_title_field_teaser_title_value) . 
                '"/>';     
            }          
          }
          // add pager_item _text variable
          if (isset($result->node_data_field_teaser_title_field_teaser_title_value)) {
            $pager_items[$key1]['text'] =  check_plain($result->node_data_field_teaser_title_field_teaser_title_value);
          }
        }
      }
    }
    $vars['pager_items'] = $pager_items;
  }    
}


// Adding default name in Search Box
drupal_add_js("$(document).ready(function() {
  $('#block-search-0 .form-text').val('". t('Search')."');
  $('#block-search-0 .form-text').focus(function() { if ($(this).val() == '". t('Search')."') $(this).val(''); });
  $('#block-search-0 .form-text').blur(function() { if ($(this).val() == '') $(this).val('". t('Search')."'); });

  h4_width = $('.view-front-featured-kwicks .item-list ul li').width();
  $('.view-front-featured-kwicks .item-list h4').each(function(){
    $(this).css({'width':h4_width - 58});
  });
  
  });
", 'inline', 'footer');


/*
 * Implementation of hook_enable().
 */
function converge_unwelcome_enable() {
  variable_set('site_frontpage', 'unwelcome');
}

drupal_add_js(drupal_get_path('theme', 'converge').'/js/jquery.easing.1.1.1.js', 'theme');