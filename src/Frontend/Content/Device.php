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


namespace ContaoBlackforest\Frontend\Content;


/**
 * Class Device
 *
 * @package ContaoBlackforest\Frontend\Content
 */
class Device extends \Controller
{
	/**
	 * control frontend visibility
	 *
	 * @param $element
	 * @param $return
	 *
	 * @return bool
	 */
	public function visibleDevice($element, $return)
	{
		if ($return) {

			$method = explode('_', $element->getTable())[1] . 'Visible';

			if (method_exists($this, $method)) {
				return $this->$method($element);
			}
		}

		return $return;
	}


	protected function contentVisible($element)
	{
		$method = 'is' . str_replace($element->deviceSelect[0], strtoupper($element->deviceSelect[0]), $element->deviceSelect);

		if (method_exists($this, $method)) {
			return $this->$method($element);
		}

		return true;
	}


	protected function isDesktop()
	{
		if (!$GLOBALS['container']['mobile-detect']->isMobile()) {
			return true;
		}

		return false;
	}


	protected function isMobile()
	{
		if ($GLOBALS['container']['mobile-detect']->isMobile()) {
			return true;
		}

		return false;
	}


	protected function isPhone()
	{
		if (!$GLOBALS['container']['mobile-detect']->isTablet() && $GLOBALS['container']['mobile-detect']->isMobile()) {
			return true;
		}

		return false;
	}


	protected function isTablet()
	{
		if ($GLOBALS['container']['mobile-detect']->isTablet()) {
			return true;
		}

		return false;
	}
}