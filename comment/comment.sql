CREATE TABLE `article` (
	`id` int(11) NOT NULL auto_increment,
	`title` varchar(200) default NULL,
	`body` text,
	PRIMARY KEY  (`id`)
)

CREATE TABLE `comment` (
	`id` int(11) NOT NULL auto_increment,
	`article_id` int(11) default NULL,
	`name` varchar(50) default NULL,
	`email` varchar(100) default NULL,
	`comment` text,
	`date` datetime default NULL,
	PRIMARY KEY  (`id`)
)