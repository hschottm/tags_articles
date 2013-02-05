-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `tag_articles` blob NULL,
  `show_in_column` char(1) NOT NULL default '0',
  `restrict_to_column` char(1) NOT NULL default '0',
  `linktoarticles` char(1) NOT NULL default '1',
  `article_showtags` char(1) NOT NULL default '',
  `articlelist_tpl` varchar(64) NOT NULL default 'mod_global_articlelist',
  `articlelist_firstorder` varchar(64) NOT NULL default 'title ASC',
  `articlelist_secondorder` varchar(64) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
