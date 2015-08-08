/*!40103 SET TIME_ZONE='+00:00' */;
--
-- Table structure for table `pastes`
--

CREATE TABLE `pastes` (
	-- AKA slug
	`id` varchar(13) NOT NULL,
	`content` text,
	`lang` varchar(10) NOT NULL DEFAULT 'auto',
	`private` tinyint(1) NOT NULL DEFAULT 0,
	`owner_id` int(10) UNSIGNED NOT NULL DEFAULT 0, --  References users.id for cascade and listing user's pastes
	`owner_addr` varchar(128) NOT NULL,
	`size_bytes` int(8) UNSIGNED NOT NULL,
	`created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	INDEX owner_id (owner_id),
	INDEX owner_addr (owner_addr)
) ENGINE=InnoDB CHARSET=utf8;
