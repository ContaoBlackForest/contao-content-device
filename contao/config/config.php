<?php
/**
 * Contao Content Device
 * Copyright (C) 2015 Sven Baumann
 *
 * PHP version 5
 *
 * @package   contaoblackforest/contao-content-device
 * @file      config.php
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   LGPL-3.0+
 * @copyright ContaoBlackforest 2015
 */

$GLOBALS['TL_HOOKS']['isVisibleElement'][]  = array('ContaoBlackforest\Frontend\Content\Device', 'visibleDevice');
$GLOBALS['TL_HOOKS']['loadDataContainer'][]  = array('ContaoBlackforest\Backend\DCA\Content\Device', 'addChildRecordCallback');
