<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

// Add content element
$GLOBALS['TL_CTE']['includes']['configurator'] = 'kundd\ConfiguratorBundle\ContentConfigurator';

// Back end modules
array_insert($GLOBALS['BE_MOD']['content'], 5, array
(
	'configurators' => array
	(
		'tables'     => array('tl_configurators'),
		'stylesheet' => 'bundles/kuundconfigurator/style.css'
	)
));
