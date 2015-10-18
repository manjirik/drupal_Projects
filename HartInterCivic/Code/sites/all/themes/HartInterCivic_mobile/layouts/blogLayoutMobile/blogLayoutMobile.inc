<?php

// Plugin definition
$plugin = array(
  'title' => t('One Colomn Layout For Blog'),
  'category' => t('Columns:2'),

  'icon' => 'blogLayoutMobile.png',
  'theme' => 'blogLayoutMobile',
  'css' => 'blogLayoutMobile.css',
  'regions' => array(
	'top1' => t('Top 1'),
	'top2' => t('Top 2'),
    'top3' => t('Top 3'),
	 'top4' => t('Top 4')
  ),
);
