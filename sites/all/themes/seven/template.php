<?php

/**
 * Override or insert variables into the page template.
 */
function seven_preprocess_page(&$vars) {
  // Primary and secondary local tasks are jammed into the same output in D6, so
  // secondary links need to be stripped out. See http://drupal.org/node/1041118
  // for what happens if we try to just use menu_primary_local_tasks() like we
  // would in D7.
  $vars['primary_local_tasks'] = substr($vars['tabs'], 0, strpos($vars['tabs'], '</ul>') + 5);

  $vars['secondary_local_tasks'] = menu_secondary_local_tasks();
}

/**
 * Display the list of available node types for node creation.
 */
function seven_node_add_list($content) {
  $output = '';
  if ($content) {
    $output = '<ul class="admin-list">';
    foreach ($content as $item) {
      $output .= '<li class="clearfix">';
      $output .= '<span class="label">' . l($item['title'], $item['href'], $item['localized_options']) . '</span>';
      $output .= '<div class="description">' . filter_xss_admin($item['description']) . '</div>';
      $output .= '</li>';
    }
    $output .= '</ul>';
  }
  else {
    $output = '<p>' . t('You have not created any content types yet. Go to the <a href="@create-content">content type creation page</a> to add a new content type.', array('@create-content' => url('admin/structure/types/add'))) . '</p>';
  }
  return $output;
}

/**
 * Overrides theme_admin_block_content().
 *
 * Use unordered list markup in both compact and extended mode.
 */
function seven_admin_block_content($content) {
  $output = '';
  if (!empty($content)) {
    $output = system_admin_compact_mode() ? '<ul class="admin-list compact">' : '<ul class="admin-list">';
    foreach ($content as $item) {
      $output .= '<li class="leaf">';
      $output .= l($item['title'], $item['href'], $item['localized_options']);
      if (isset($item['description']) && !system_admin_compact_mode()) {
        $output .= '<div class="description">' . filter_xss_admin($item['description']) . '</div>';
      }
      $output .= '</li>';
    }
    $output .= '</ul>';
  }
  return $output;
}

/**
 * Override of theme_tablesort_indicator().
 *
 * Use our own image versions, so they show up as black and not gray on gray.
 */
function seven_tablesort_indicator($style) {
  $theme_path = drupal_get_path('theme', 'seven');
  if ($style == 'asc') {
    return theme('image', $theme_path . '/images/arrow-asc.png', t('sort ascending'), t('sort ascending'));
  }
  else {
    return theme('image', $theme_path . '/images/arrow-desc.png', t('sort descending'), t('sort descending'));
  }
}

/**
 * Override of theme_fieldset().
 *
 * Add span to legend tag, so we can style it to be inside the fieldset.
 */
function seven_fieldset($element) {
  if (!empty($element['#collapsible'])) {
    drupal_add_js('misc/collapse.js');

    if (!isset($element['#attributes']['class'])) {
      $element['#attributes']['class'] = '';
    }

    $element['#attributes']['class'] .= ' collapsible';
    if (!empty($element['#collapsed'])) {
      $element['#attributes']['class'] .= ' collapsed';
    }
  }

  $output = '<fieldset' . drupal_attributes($element['#attributes']) . '>';
  if (!empty($element['#title'])) {
    // Always wrap fieldset legends in a SPAN for CSS positioning.
    $output .= '<legend><span class="fieldset-legend">' . $element['#title'] . '</span></legend>';
  }
  // Add a wrapper if this fieldset is not collapsible.
  // theme_fieldset() in D7 adds a wrapper to all fieldsets, however in D6 this
  // wrapper is added by Drupal.behaviors.collapse(), but only to collapsible
  // fieldsets. So to ensure the wrapper is consistantly added here we add the
  // wrapper to the markup, but only for non collapsible fieldsets.
  if (empty($element['#collapsible'])) {
    $output .= '<div class="fieldset-wrapper">';
  }
  if (!empty($element['#description'])) {
    $output .= '<div class="description">' . $element['#description'] . '</div>';
  }
  if (isset($element['#children'])) {
    $output .= $element['#children'];
  }
  if (isset($element['#value'])) {
    $output .= $element['#value'];
  }
  if (empty($element['#collapsible'])) {
    $output .= '</div>';
  }
  $output .= "</fieldset>\n";
  return $output;
}
