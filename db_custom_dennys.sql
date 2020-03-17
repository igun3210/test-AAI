/*
SQLyog Ultimate v8.55 
MySQL - 5.5.8 : Database - db_custom_dennys
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tm_customer_feeback` */

DROP TABLE IF EXISTS `tm_customer_feeback`;

CREATE TABLE `tm_customer_feeback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_key` varchar(12) NOT NULL DEFAULT '',
  `feedback_customer_name` varchar(50) NOT NULL DEFAULT '',
  `feedback_customer_email` varchar(150) NOT NULL DEFAULT '',
  `feedback_customer_phone` varchar(30) NOT NULL DEFAULT '',
  `feedback_customer_address` varchar(255) NOT NULL DEFAULT '',
  `feedback_note` text NOT NULL,
  `feedback_createddt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `feedback_createdby` int(11) NOT NULL DEFAULT '0',
  `feedback_modifieddt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `feedback_modifiedby` int(11) NOT NULL DEFAULT '0',
  `feedback_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'not yet decided',
  `feedback_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=deleted',
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tm_customer_feeback` */

insert  into `tm_customer_feeback`(`feedback_id`,`store_key`,`feedback_customer_name`,`feedback_customer_email`,`feedback_customer_phone`,`feedback_customer_address`,`feedback_note`,`feedback_createddt`,`feedback_createdby`,`feedback_modifieddt`,`feedback_modifiedby`,`feedback_status`,`feedback_deleted`) values (1,'DEF','Gunawan','gun@solis.com','sfdsdfsdf','','qwerty','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,0),(2,'DEF','Gunawan','gun@solis.com','sfdsdfsdf','','qwerty','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,0),(3,'DEF','Gunawan','gun@solis.com','sfdsdfsdf','','qwerty','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,0),(4,'DEF','Gunawan','gun@solis.com','sfdsdfsdf','','qwerty','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,0),(5,'DEF','Ricky','r@solis.com','4563456','','ggggg','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,0),(6,'DEF','Dini','dini@solis.com','89347','','dkfvzvkjzgvnb','2019-05-31 00:00:00',0,'2019-05-31 00:00:00',0,0,0),(7,'DEF','Odin','odin@f.com','s34535','','sdfgniafghangfv','0000-00-00 00:00:00',0,'0000-00-00 00:00:00',0,0,0),(8,'DEF','Susan','susan@g.com','34237u45987','','kjnhgvkdsngkjsdng','2019-05-31 00:00:00',0,'2019-05-31 00:00:00',0,0,0);

/*Table structure for table `tm_store` */

DROP TABLE IF EXISTS `tm_store`;

CREATE TABLE `tm_store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_code` varchar(12) NOT NULL DEFAULT '',
  `store_name` varchar(30) NOT NULL DEFAULT '',
  `store_desc` varchar(255) NOT NULL DEFAULT '',
  `store_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=deleted',
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tm_store` */

insert  into `tm_store`(`store_id`,`store_code`,`store_name`,`store_desc`,`store_deleted`) values (1,'DEF','Main Store','Default store',0),(2,'DNY_KOKAS','Kota Kasablanka','First Dennys in Indonesia at Kota Kasablanka',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
