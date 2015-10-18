<?php

// Plugin definition
$plugin = array(
  'title' => t('One left, two right'),
  'category' => t('Columns:2'),
  'icon' => 'twoRight.png',
  'theme' => 'twoRight',
  'css' => 'twoRight.css',
  'regions' => array(
	'top' => t('Top'),
	'left' => t('Left side'),
    'right1' => t('Right side 1'),
	 'right2' => t('Right side 2')
  ),
);
