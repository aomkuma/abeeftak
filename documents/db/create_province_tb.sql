
DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `id` char(36) NOT NULL,
  `province_code` varchar(100) DEFAULT NULL,
  `province_name` varchar(255) DEFAULT NULL,
  `geoid` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `provinces` */

insert  into `provinces`(`id`,`province_code`,`province_name`,`geoid`) values 
('1','10','กรุงเทพมหานคร   ',2),
('10','19','สระบุรี',2),
('11','20','ชลบุรี   ',5),
('12','21','ระยอง   ',5),
('13','22','จันทบุรี   ',5),
('14','23','ตราด   ',5),
('15','24','ฉะเชิงเทรา   ',5),
('16','25','ปราจีนบุรี   ',5),
('17','26','นครนายก   ',2),
('18','27','สระแก้ว   ',5),
('19','30','นครราชสีมา   ',3),
('2','11','สมุทรปราการ   ',2),
('20','31','บุรีรัมย์   ',3),
('21','32','สุรินทร์   ',3),
('22','33','ศรีสะเกษ   ',3),
('23','34','อุบลราชธานี   ',3),
('24','35','ยโสธร   ',3),
('25','36','ชัยภูมิ   ',3),
('26','37','อำนาจเจริญ   ',3),
('27','39','หนองบัวลำภู   ',3),
('28','40','ขอนแก่น   ',3),
('29','41','อุดรธานี   ',3),
('3','12','นนทบุรี   ',2),
('30','42','เลย   ',3),
('31','43','หนองคาย   ',3),
('32','44','มหาสารคาม   ',3),
('33','45','ร้อยเอ็ด   ',3),
('34','46','กาฬสินธุ์   ',3),
('35','47','สกลนคร   ',3),
('36','48','นครพนม   ',3),
('37','49','มุกดาหาร   ',3),
('38','50','เชียงใหม่   ',1),
('39','51','ลำพูน   ',1),
('4','13','ปทุมธานี   ',2),
('40','52','ลำปาง   ',1),
('41','53','อุตรดิตถ์   ',1),
('42','54','แพร่   ',1),
('43','55','น่าน   ',1),
('44','56','พะเยา   ',1),
('45','57','เชียงราย   ',1),
('46','58','แม่ฮ่องสอน   ',1),
('47','60','นครสวรรค์   ',2),
('48','61','อุทัยธานี   ',2),
('49','62','กำแพงเพชร   ',2),
('5','14','พระนครศรีอยุธยา   ',2),
('50','63','ตาก   ',4),
('51','64','สุโขทัย   ',2),
('52','65','พิษณุโลก   ',2),
('53','66','พิจิตร   ',2),
('54','67','เพชรบูรณ์   ',2),
('55','70','ราชบุรี   ',4),
('56','71','กาญจนบุรี   ',4),
('57','72','สุพรรณบุรี   ',2),
('58','73','นครปฐม   ',2),
('59','74','สมุทรสาคร   ',2),
('6','15','อ่างทอง   ',2),
('60','75','สมุทรสงคราม   ',2),
('61','76','เพชรบุรี   ',4),
('62','77','ประจวบคีรีขันธ์   ',4),
('63','80','นครศรีธรรมราช   ',6),
('64','81','กระบี่   ',6),
('65','82','พังงา   ',6),
('66','83','ภูเก็ต   ',6),
('67','84','สุราษฎร์ธานี   ',6),
('68','85','ระนอง   ',6),
('69','86','ชุมพร   ',6),
('7','16','ลพบุรี   ',2),
('70','90','สงขลา   ',6),
('71','91','สตูล   ',6),
('72','92','ตรัง   ',6),
('73','93','พัทลุง   ',6),
('74','94','ปัตตานี   ',6),
('75','95','ยะลา   ',6),
('76','96','นราธิวาส   ',6),
('77','97','บึงกาฬ',3),
('8','17','สิงห์บุรี   ',2),
('9','18','ชัยนาท   ',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
