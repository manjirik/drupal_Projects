<?php

/**
 * @file
 * Administrative callbacks for simple node archive module
 */

/**
 * Form builder. Configure archives.
 */
function sna_blocks_admin_settings() {
  // Get an array of node types with internal names as keys and
  // array('page' => ’Basic Page, 'article' => 'Articles')
  $types = node_type_get_types();
  $options['all'] = t('All type');
  $options['custom'] = t('Custom type');
  foreach ($types as $type) {
    $options[$type->type] = $type->name;
  }
  $vocabularies = taxonomy_get_vocabularies();
  $taxonomy_options = array();
  $taxonomy_options_var = array();
  foreach ($vocabularies as $vocabulary) {
    $terms = taxonomy_get_tree($vocabulary->vid);
    $vocabulary_key = 'V' . $vocabulary->vid;
    $taxonomy_options[$vocabulary_key] = '<' . $vocabulary->name . '>';
    $taxonomy_options_var[$vocabulary_key] = $vocabulary->name;
    if (!empty($terms)) {
      foreach ($terms as $term) {
        $taxonomy_options['T' . $term->tid] = str_repeat('--', $term->depth) . $term->name;
        $taxonomy_options_var['T' . $term->tid] = $term->name;
      }
    }
  }
  variable_set('sna_blocks_taxonomy_options', $taxonomy_options_var);

  $form['sna_blocks_block_types'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Type of Archive Blocks - For each checked item an archive block will be created'),
    '#options' => $options,
    '#default_value' => variable_get('sna_blocks_block_types', array('page')),
    '#description' => t('For each checked item an archive block will be created and listed in Administration » Structure » Blocks.'),
  );

  unset($options['all']);
  unset($options['custom']);

  $form['sna_blocks_custom_selection'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Content types that inclueded in Custom Archive Block type'),
    '#options' => $options,
    '#default_value' => variable_get('sna_blocks_custom_selection', array()),
    '#description' => t('if "Custom type" is checked then select the content types should be included.'),
  );
  $form['sna_blocks_taxonomy_items'] = array(
    '#type' => 'select',
    '#title' => t('Create archive block based on taxonomy'),
    '#options' => $taxonomy_options,
    '#default_value' => variable_get('sna_blocks_taxonomy_items', array()),
    '#description' => t('Select taxnomy term for which an archvie block will be created.'),
    '#multiple' => TRUE,
    '#attributes' => array('style' => 'height: 200px; width: 205px;'),
  );
  $form['sna_blocks_items'] = array(
    '#type' => 'select',
    '#title' => t('Number of items'),
    '#options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
    '#default_value' => variable_get('sna_blocks_items', 0),
    '#description' => t('Select the number of node will display in expanded archive. select 0 to show unlimited.'),
  );

  $disabled_jquerymenu_option = TRUE;
  if (module_exists('jquerymenu')) {
    $disabled_jquerymenu_option = FALSE;
  }

  $form['sna_blocks_jquerymenu'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Theme archive blocks using Jquery Menu module'),
    '#options' => array(1 => 'check this box if you want to use <a href="http://drupal.org/project/jquerymenu" target="_blank">Jquerymenu module </a> to theme archive blocks.'),
    '#default_value' => variable_get('sna_blocks_jquerymenu', array()),
    '#disabled' => $disabled_jquerymenu_option,
  );

  return system_settings_form($form);
}
