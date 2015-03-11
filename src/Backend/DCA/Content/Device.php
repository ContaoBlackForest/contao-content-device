<?php
/**
 * Contao Content Device
 * Copyright (C) 2015 Sven Baumann
 *
 * PHP version 5
 *
 * @package   contaoblackforest/contao-content-device
 * @file      Device.php
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   LGPL-3.0+
 * @copyright ContaoBlackforest 2015
 */


namespace ContaoBlackforest\Backend\DCA\Content;


/**
 * Class Device
 *
 * @package ContaoBlackforest\Backend\DCA\Content
 */
class Device extends \Backend
{

	/**
	 * set to the content type if device selected
	 *
	 * @param array
	 *
	 * @return string
	 */
	public function addDeviceVisibility($row)
	{
		$strName = \Input::get('table');

		$callback = &$GLOBALS['TL_DCA'][$strName]['list']['sorting']['child_record_callback'];

		$reflectionClass = new \ReflectionClass($this);

		foreach ($callback as $k => $v) {
			if ($v == $reflectionClass->name || $v == __FUNCTION__) {
				unset($callback[$k]);
			}
		}
		$callback = array_values($callback);

		$return = static::importStatic($callback[0])
						->$callback[1](
							$row
						);

		if ($row['deviceSelect']) {
			$devices = unserialize($row['deviceSelect']);

			if ($devices) {
				$string = '';
				foreach ($devices as $device) {
					$string .= ' (' . $GLOBALS['TL_LANG'][$strName]['deviceVisibility'] . ' ' . $GLOBALS['TL_LANG'][$strName][$device] . ')';
				}

				$return    = explode('</div>', $return);
				$return[0] = str_replace($GLOBALS['TL_LANG']['CTE'][$row['type']][0], $GLOBALS['TL_LANG']['CTE'][$row['type']][0] . $string, $return[0]);
				$return    = implode('</div>', $return);
			}
		}

		array_insert($callback, 0, array($reflectionClass->name, __FUNCTION__));

		return $return;
	}

	public function addChildRecordCallback($table)
	{
		if ($table === 'tl_content') {
			$callback = &$GLOBALS['TL_DCA'][$table]['list']['sorting']['child_record_callback'];

			array_insert($callback, 0, array('ContaoBlackforest\Backend\DCA\Content\Device', 'addDeviceVisibility'));
		}
	}
}
