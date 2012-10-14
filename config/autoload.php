<?php

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
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\TagListArticles'         => 'system/modules/tags_articles/classes/TagListArticles.php',

	// Modules
	'Contao\ModuleTagCloudArticles'  => 'system/modules/tags_articles/modules/ModuleTagCloudArticles.php',
	'Contao\ModuleTaggedArticleList' => 'system/modules/tags_articles/modules/ModuleTaggedArticleList.php',
));
