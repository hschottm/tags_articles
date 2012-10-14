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
 * @copyright  Helmut Schottmüller 2008
 * @author     Helmut Schottmüller <helmut.schottmueller@aurealis.de>
 * @package    tags
 * @license    LGPL
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['tag_articles']   = array('Articles', 'Please select the pages theirs articles are used to build the tag cloud. If you check a page which contains subpages, the articles of all subpages will be used too.');
$GLOBALS['TL_LANG']['tl_module']['show_in_column'] = array('Restrict to specific column', 'Restrict the output of the article list to a specific column of the page template.');
$GLOBALS['TL_LANG']['tl_module']['linktoarticles'] = array('Article list links to articles', 'Check to create an article list with links to the article or uncheck to create an article list with links to the containing page.');
$GLOBALS['TL_LANG']['tl_module']['restrict_to_column'] = array('Restrict to specific column', 'Restrict the tag cloud to tags of articles from a specific column of the page template.');
$GLOBALS['TL_LANG']['tl_module']['articlelist_tpl'] = array('Article list template', 'Here you can select the article list template.');
$GLOBALS['TL_LANG']['tl_module']['article_showtags']       = array('Show article tags', 'Select this option to show all assigned tags below each article. This only works if you use a tag enabled article template, e.g. mod_global_articlelist');

?>