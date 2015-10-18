<?php
/**
 * @file
 * Provide function to alter views query.
 */

/**
 * Implements hook_views_query_alter().
 */
function sna_blocks_views_query_alter(&$view, &$query) {
  $driver = db_driver();
  if ($view->name == 'simple_node_archive' && !empty($query->where[0]['conditions'])) {
    foreach ($query->where[0]['conditions'] as $key => $condition) {

      // Alter views query for SQLite Database.
      if (is_array($condition['value']) && $driver == 'sqlite') {
        if (key($condition['value']) == ':node_created_year') {
          $query->where[0]['conditions'][$key]['field'] = "strftime('%Y', date(node.created, 'unixepoch')) = :node_created_year";
        }
        elseif (key($condition['value']) == ':node_created_month') {
          $query->where[0]['conditions'][$key]['field'] = "strftime('%m', date(node.created, 'unixepoch')) = :node_created_month";
        }
      }

      // Alter views query for custom node archive block.
      if (isset($view->args['2']) && $view->args['2'] == 'custom' && $condition['value'] == 'custom') {
        $query->where[0]['conditions'][$key]['operator'] = 'in';
        $custom_selection = variable_get('sna_blocks_custom_selection', array('page'));
        foreach ($custom_selection as $custom_key => $value) {
          if ($value != '0') {
            $values[] = $value;
          }
        }
        $query->where[0]['conditions'][$key]['value'] = $values;
        $view->build_info['substitutions']['%3'] = 'Custom node';
      }
    }
    // Set breadcrumb.
    if (isset($view->build_info['breadcrumb'])) {
      $view->build_info['breadcrumb'] = array();
    }
    $arg = explode('/', $_GET['q']);
    $year = $arg[1];
    $month = '';
    $request_uri = 'sna/' . $arg[1] . '/' . $arg[2] . '/' . $arg[3] . '/' . $arg[4];
    $view->build_info['breadcrumb'] = array($request_uri => $year);
    if (is_numeric($arg[2]) && $arg[2] != '00') {
      $month = date('F', mktime(0, 0, 0, $arg[2]));
      $year_url = 'sna/' . $arg[1] . '/00/' . $arg[3] . '/' . $arg[4];
      $view->build_info['breadcrumb'] = array($year_url => $arg[1], $request_uri => $month);
    }

    // Set title.
    $title = array();
    $title[] = 'Archive for';
    if (!empty($month)) {
      $title[] = $month;
    }
    $title[] = $year;
    $view->build_info['title'] = t(implode(' ', $title));
  }
}
