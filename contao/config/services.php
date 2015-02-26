<?php
/**
 * Contao Content Device
 * Copyright (C) 2015 Sven Baumann
 *
 * PHP version 5
 *
 * @package   contaoblackforest/contao-content-device
 * @file      services.php
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   LGPL-3.0+
 * @copyright ContaoBlackforest 2015
 */


$container['mobile-detect'] = $container->share(
	function () {
		return new Mobile_Detect();
	}
);
