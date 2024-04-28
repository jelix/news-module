-- copyright 2007-2019 laurent jouanneau

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `slugurl` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `content` text NOT NULL,
  `date_create` datetime NOT NULL,
  `lang` varchar(5) NOT NULL,
  `author` varchar(100) default NULL,
  PRIMARY KEY  (`news_id`)
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDb DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;