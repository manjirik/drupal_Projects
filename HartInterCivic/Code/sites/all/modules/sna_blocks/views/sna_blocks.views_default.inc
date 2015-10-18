<?php
/**
 * @file
 * Default views for simple_node_archive module.
 */

/**
 * Implements hook_views_default_views().
 */
function sna_blocks_views_default_views() {
  $view = new view();
  $view->name = 'simple_node_archive';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Simple Node Archive';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Simple Node Archive';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['row_plugin'] = 'node';
  $handler->display->display_options['row_options']['view_mode'] = 'full';
  /* Field: Content: Title */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['alter_text'] = 0;
  $handler->display->display_options['fields']['title']['alter']['make_link'] = 0;
  $handler->display->display_options['fields']['title']['alter']['absolute'] = 0;
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = 0;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = 0;
  $handler->display->display_options['fields']['title']['alter']['strip_tags'] = 0;
  $handler->display->display_options['fields']['title']['alter']['trim'] = 0;
  $handler->display->display_options['fields']['title']['alter']['html'] = 0;
  $handler->display->display_options['fields']['title']['hide_empty'] = 0;
  $handler->display->display_options['fields']['title']['empty_zero'] = 0;
  $handler->display->display_options['fields']['title']['link_to_node'] = 1;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Contextual filter: Content: Created year */
  $handler->display->display_options['arguments']['created_year']['id'] = 'created_year';
  $handler->display->display_options['arguments']['created_year']['table'] = 'node';
  $handler->display->display_options['arguments']['created_year']['field'] = 'created_year';
  $handler->display->display_options['arguments']['created_year']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['created_year']['default_argument_skip_url'] = 0;
  $handler->display->display_options['arguments']['created_year']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['created_year']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['created_year']['summary_options']['items_per_page'] = '25';
  /* Contextual filter: Content: Created month */
  $handler->display->display_options['arguments']['created_month']['id'] = 'created_month';
  $handler->display->display_options['arguments']['created_month']['table'] = 'node';
  $handler->display->display_options['arguments']['created_month']['field'] = 'created_month';
  $handler->display->display_options['arguments']['created_month']['exception']['value'] = '00';
  $handler->display->display_options['arguments']['created_month']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['created_month']['default_argument_skip_url'] = 0;
  $handler->display->display_options['arguments']['created_month']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['created_month']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['created_month']['summary_options']['items_per_page'] = '25';
  /* Contextual filter: Content: Type */
  $handler->display->display_options['arguments']['type']['id'] = 'type';
  $handler->display->display_options['arguments']['type']['table'] = 'node';
  $handler->display->display_options['arguments']['type']['field'] = 'type';
  $handler->display->display_options['arguments']['type']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['type']['default_argument_skip_url'] = 0;
  $handler->display->display_options['arguments']['type']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['type']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['type']['summary_options']['items_per_page'] = '25';
  /* Contextual filter: Content: Has taxonomy term ID */
  $handler->display->display_options['arguments']['tid']['id'] = 'tid';
  $handler->display->display_options['arguments']['tid']['table'] = 'taxonomy_index';
  $handler->display->display_options['arguments']['tid']['field'] = 'tid';
  $handler->display->display_options['arguments']['tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['tid']['default_argument_skip_url'] = 0;
  $handler->display->display_options['arguments']['tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['tid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['arguments']['tid']['break_phrase'] = 1;
  $handler->display->display_options['arguments']['tid']['add_table'] = 0;
  $handler->display->display_options['arguments']['tid']['require_value'] = 0;
  $handler->display->display_options['arguments']['tid']['reduce_duplicates'] = 0;
  $handler->display->display_options['arguments']['tid']['set_breadcrumb'] = 0;
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content translation: Language */
  if (module_exists('locale')) {
    $handler->display->display_options['filters']['language']['id'] = 'language';
    $handler->display->display_options['filters']['language']['table'] = 'node';
    $handler->display->display_options['filters']['language']['field'] = 'language';
    $handler->display->display_options['filters']['language']['value'] = array(
      '***CURRENT_LANGUAGE***' => '***CURRENT_LANGUAGE***',
    );
  }
  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page');
  $handler->display->display_options['path'] = 'sna';

  $views[$view->name] = $view;
  return $views;
}
