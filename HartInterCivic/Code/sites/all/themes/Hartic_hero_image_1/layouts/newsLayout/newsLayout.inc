<?php

// Plugin definition
$plugin = array(
  'title' => t('Left Divided'),
  'category' => t('Columns:2'),
  'icon' => 'newsLayout.png',
  'theme' => 'newsLayout',
  'css' => 'newsLayout.css',
  'regions' => array(
	'top' => t('Top'),
	'left1' => t('Left side 1'),
    'left2' => t('Left side 2'),
	 'right' => t('Right side')
  ),
);
