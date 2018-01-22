CREATE TABLE `farm_cows` (
  `id` char(36) NOT NULL,
  `farm_id` char(36) NOT NULL,
  `cow_id` char(36) NOT NULL,
  `seq` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` varchar(150) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `farm_herdsmans` (
  `id` char(36) NOT NULL,
  `farm_id` char(36) NOT NULL,
  `herdsman_id` char(36) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `seq` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `createdby` varchar(150) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
