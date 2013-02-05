<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Helmut Schottmüller 2009
 * @author     Helmut Schottmüller <helmut.schottmueller@aurealis.de>
 * @package    tags
 * @license    LGPL
 * @filesource
 */

/**
 * Class tl_module_tags_articles
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2009
 * @author     Helmut Schottmüller <helmut.schottmueller@aurealis.de>
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

	public function getArticlelistOrder(DataContainer $dc)
	{
		$this->loadLanguageFile('tl_article');
		return array(
			'' => '-',
			'tstamp ASC' => $GLOBALS['TL_LANG']['tl_article']['tstamp'][0] . ' (' . $GLOBALS['TL_LANG']['MSC']['ascending'] . ')',
			'tstamp DESC' => $GLOBALS['TL_LANG']['tl_article']['tstamp'][0] . ' (' . $GLOBALS['TL_LANG']['MSC']['descending'] . ')',
			'title ASC' => $GLOBALS['TL_LANG']['tl_article']['title'][0] . ' (' . $GLOBALS['TL_LANG']['MSC']['ascending'] . ')',
			'title DESC' => $GLOBALS['TL_LANG']['tl_article']['title'][0] . ' (' . $GLOBALS['TL_LANG']['MSC']['descending'] . ')',
			'start ASC' => $GLOBALS['TL_LANG']['tl_article']['start'][0] . ' (' . $GLOBALS['TL_LANG']['MSC']['ascending'] . ')',
			'start DESC' => $GLOBALS['TL_LANG']['tl_article']['start'][0] . ' (' . $GLOBALS['TL_LANG']['MSC']['descending'] . ')',
			'stop ASC' => $GLOBALS['TL_LANG']['tl_article']['stop'][0] . ' (' . $GLOBALS['TL_LANG']['MSC']['ascending'] . ')',
			'stop DESC' => $GLOBALS['TL_LANG']['tl_article']['stop'][0] . ' (' . $GLOBALS['TL_LANG']['MSC']['descending'] . ')'
		);
	}
}

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][]      = 'show_in_column';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][]      = 'restrict_to_column';
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'article_showtags';
$GLOBALS['TL_DCA']['tl_module']['palettes']['tagcloudarticles']    = '{title_legend},name,headline,type;{size_legend},tag_maxtags,tag_buckets,tag_named_class,tag_on_page_class,tag_show_reset;{template_legend:hide},cloud_template;{tagextension_legend},tag_related,tag_topten;{redirect_legend},tag_jumpTo,keep_url_params;{datasource_legend},tag_articles,restrict_to_column;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['taggedArticleList']   = '{title_legend},name,headline,type;{config_legend},show_in_column;{showtags_legend},article_showtags,hide_on_empty;{template_legend},articlelist_tpl,linktoarticles,articlelist_firstorder,articlelist_secondorder;{datasource_legend},tag_articles;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
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
	'eval'                    => array('fieldType'=>'radio', 'helpwizard'=>false, 'mandatory' => true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['show_in_column'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['show_in_column'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['restrict_to_column'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['restrict_to_column'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_module']['fields']['linktoarticles'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['linktoarticles'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50 m12')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['articlelist_tpl'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['articlelist_tpl'],
	'default'                 => 'mod_global_articlelist',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_tags_articles', 'getArticlelistTemplates'),
	'eval'                    => array('tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['articlelist_firstorder'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['articlelist_firstorder'],
	'default'                 => 'title ASC',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_tags_articles', 'getArticlelistOrder'),
	'eval'                    => array('tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['articlelist_secondorder'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['articlelist_secondorder'],
	'default'                 => '',
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_module_tags_articles', 'getArticlelistOrder'),
	'eval'                    => array('tl_class' => 'w50')
);

$GLOBALS['TL_DCA']['tl_module']['fields']['article_showtags'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['article_showtags'],
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true)
);

?>