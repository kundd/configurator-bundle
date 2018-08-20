<?php

/**
 * @file ContentConfigurator.php
 * @package configurator-bundle
 * @author Christoph Wasmer
 * @version 0.1
 * @copyright Kommunikation & Design Gröber GmbH & Co. KG
 */

namespace kundd\ConfiguratorBundle;

class ContentConfigurator extends \ContentElement {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_configurator';

	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate() {
		if (TL_MODE == 'BE') {
			/** @var BackendTemplate|object $objTemplate */
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . strtoupper($GLOBALS['TL_LANG']['FMD']['configurator'][0]) . ' ###';
			$objTemplate->title = $this->headline;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile() {
		$this->Template->configurator = 'Test';
	}
}


// --- END ContentConfigurator.php