CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `is_purchase` tinyint(1) DEFAULT '0',
  `unit_price` decimal(15,2) DEFAULT '0.00',
  `purchase_account` varchar(100) DEFAULT NULL,
  `purchase_tax` varchar(100) DEFAULT NULL,
  `is_sale` tinyint(1) DEFAULT '0',
  `stock_monitor` tinyint(1) DEFAULT '0',
  `min_stock` int(11) DEFAULT '0',
  `default_stock_account` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
