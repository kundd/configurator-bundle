<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

$GLOBALS['TL_DCA']['tl_configurators'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'closed'                      => true,
		'notCopyable'                 => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				// 'published' => 'index',
				// 'source,parent,published' => 'index'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 2,
			'fields'                  => array('title DESC'),
			'flag'                    => 8,
			'panelLayout'             => 'filter;sort,search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s',
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_configurators']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.svg',
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_configurators']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.svg',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
			),
			'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_configurators']['toggle'],
				'icon'                => 'visible.svg',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_configurators']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.svg'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('addReply'),
		'default'                     => '{settings_legend},title;{template_legend},configurator_template'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_configurators']['source'],
			'filter'                  => true,
			'sorting'                 => true,
			'reference'               => &$GLOBALS['TL_LANG']['tl_configurators'],
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'configurator_template' => array
		(
			'label'					=> &$GLOBALS['TL_LANG']['tl_configurators']['configurator_template'],
			'default'				=> 'configurator_default',
			'exclude'				=> true,
			'inputType'				=> 'select',
			'options_callback'		=> array('tl_configurators', 'getConfiguratorTemplates'),
			'eval'					=> array('tl_class'=>'w50'),
			'sql'					=> "varchar(64) NOT NULL default ''"
		),
	)
);

/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 */
class tl_configurators extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Return all comments templates as array
	 *
	 * @return array
	 */
	public function getConfiguratorTemplates()
	{
		return $this->getTemplateGroup('configurator_');
	}
}
