<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Tags_articles
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Class tl_module_tags_articles
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2009-2012
 * @author     Helmut Schottmüller <https://github.com/hschottm>
 * @package    Controller
 */
class tl_module_tags_articles extends tl_module
{
	public function getArticlelistTemplates(DataContainer $dc)
	{
		if (version_compare(VERSION.BUILD, '2.9.0', '>=')) 
		{
			return $this->getTemplateGroup('mod_', $dc->activeRecord->pid);
		} 
		else 
		{
			return $this->getTemplateGroup('mod_');
		}
	}  
}

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][]      = 'show_in_column';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][]      = 'restrict_to_column';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'article_showtags';
$GLOBALS['TL_DCA']['tl_module']['palettes']['tagcloudarticles']    = '{title_legend},name,headline,type;{size_legend},tag_maxtags,tag_buckets,tag_named_class,tag_on_page_class,tag_show_reset;{template_legend:hide},cloud_template;{tagextension_legend},tag_related,tag_topten;{redirect_legend},tag_jumpTo,keep_url_params;{datasource_legend},tag_articles,restrict_to_column;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['taggedArticleList']   = '{title_legend},name,headline,type;{config_legend},show_in_column;{showtags_legend},article_showtags,hide_on_empty;{template_legend},articlelist_tpl,linktoarticles;{datasource_legend},tag_articles;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['show_in_column']    = 'inColumn';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['restrict_to_column']    = 'inColumn';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['article_showtags']    = 'tag_jumpTo';


/**
 * Add fields to tl_module
 */

$GLOBALS['TL_DCA']['tl_module']['fields']['tag_articles'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['tag_articles'],
	'inputType'               => 'pageTree',
	'eval'                    => array('fieldType'=>'radio', 'helpwizard'=>false, 'mandatory' => true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['show_in_column'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['show_in_column'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['restrict_to_column'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['restrict_to_column'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['linktoarticles'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['linktoarticles'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50 m12'),
	'sql'                     => "char(1) NOT NULL default '1'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['articlelist_tpl'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['articlelist_tpl'],
	'default'                 => 'mod_global_articlelist',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_tags_articles', 'getArticlelistTemplates'),
	'eval'                    => array('tl_class' => 'w50'),
	'sql'                     => "varchar(64) NOT NULL default 'mod_global_articlelist'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['article_showtags'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['article_showtags'],
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "char(1) NOT NULL default ''"
);

?>