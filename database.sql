create database transactionmanager;

use transactionmanager;

CREATE TABLE `transactionmanager` (
  `id` int(11) NOT NULL auto_increment,
  `description` int(3) NOT NULL,
  `credit` varchar(100),
  `debit` varchar(100),
  `running_balance` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);