<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Core
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Table tl_layout
 */
$tl_content = &$GLOBALS['TL_DCA']['tl_content'];

// Palettes
foreach ($tl_content['palettes'] as &$pallet) {
	if (!is_array($pallet) && stristr($pallet, 'invisible_legend')) {
		$string = '{device_legend:hide},deviceSelect;{invisible_legend';

		$pallet = str_replace('{invisible_legend', $string, $pallet);
	}
}

//Fields
$fields = array
(
	'deviceSelect' => array
	(
		'label'     => &$GLOBALS['TL_LANG']['tl_content']['deviceSelect'],
		'default'   => '--',
		'exclude'   => true,
		'inputType' => 'select',
		'options'   => array('--', 'desktop', 'mobile', 'phone', 'tablet'),
		'reference' => &$GLOBALS['TL_LANG']['tl_content'],
		'sql'       => "varchar(32) NOT NULL default ''"
	)
);

$tl_content['fields'] = array_merge($tl_content['fields'], $fields);
