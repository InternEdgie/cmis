

CREATE TABLE `tbl_citizenship` (
  `citizenship_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `citizenship_name` varchar(50) NOT NULL,
  `citizenship_description` text NOT NULL,
  `citizenship_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`citizenship_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_citizenship VALUES("1","Filipino","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Faucibus in ornare quam viverra orci sagittis eu.","2023-01-12 12:40:19");
INSERT INTO tbl_citizenship VALUES("2","Japanese","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Faucibus in ornare quam viverra orci sagittis eu.","2023-02-04 00:50:21");
INSERT INTO tbl_citizenship VALUES("3","American","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Faucibus in ornare quam viverra orci sagittis eu.","2023-02-04 00:52:18");
INSERT INTO tbl_citizenship VALUES("4","Sample Citizenship","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Faucibus in ornare quam viverra orci sagittis eu.","2023-02-04 00:52:39");
INSERT INTO tbl_citizenship VALUES("5","Sample Citizenship 2","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Faucibus in ornare quam viverra orci sagittis eu.","2023-02-04 00:56:11");
INSERT INTO tbl_citizenship VALUES("6","Sample Citizenship 3","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Faucibus in ornare quam viverra orci sagittis eu.","2023-02-09 12:21:58");



CREATE TABLE `tbl_complaint_type` (
  `com_id` int(15) NOT NULL AUTO_INCREMENT,
  `com_name` varchar(100) NOT NULL,
  `com_details` text NOT NULL,
  `com_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_complaint_type VALUES("1","Physical Injuries","Physical Injuries","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("2","Slander","Slander","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("3","Oral Defamation","Oral Defamation","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("4","Threats","Threats","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("5","Theft","Theft","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("6","Malicious Mischief","Malicious Mischief","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("7","Alarms and Scandal","Alarms and Scandal","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("8","Imprudence and Negligence","Imprudence and Negligence","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("9","Trespassing","Trespassing","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("10","Harrasment","Harrasment","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("11","Coercion","Coercion","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("12","Unjust Vexation","Unjust Vexation","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("13","Arsons of Property of Small Value","Arsons of Property of Small Value","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("14","Intriguing Against Honour","Intriguing Against Honour","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("15","Ejectment","Ejectment","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("16","Damages","Damages","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("17","Dog Bites","Dog Bites","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("18","Boundary Dispute","Boundary Dispute","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("19","Lot Dispute","Lot Dispute","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("20","Recovery of Personal Properties","Recovery of Personal Properties","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("21","Demand for Payment of Sum of Money","Demand for Payment of Sum of Money","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("22","Demand for Specific Performance","Demand for Specific Performance","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("23","House Rental","House Rental","2023-01-07 16:18:16");
INSERT INTO tbl_complaint_type VALUES("24","Rumors","","2023-01-09 19:28:50");
INSERT INTO tbl_complaint_type VALUES("25","Family Conflicts","","2023-01-09 19:29:21");
INSERT INTO tbl_complaint_type VALUES("26","Noisy Neighbor","","2023-01-09 19:00:58");
INSERT INTO tbl_complaint_type VALUES("27","Blackmail","","2023-01-09 19:05:10");
INSERT INTO tbl_complaint_type VALUES("28","Hurtful Words","","2023-01-27 11:27:18");
INSERT INTO tbl_complaint_type VALUES("29","Catcall","","2023-02-01 10:14:55");
INSERT INTO tbl_complaint_type VALUES("30","Sample Complaint 1","","2023-02-04 00:30:25");
INSERT INTO tbl_complaint_type VALUES("31","Sample Complaint 2","","2023-02-04 00:37:49");



CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) NOT NULL,
  `event_color` varchar(50) NOT NULL,
  `event_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_events VALUES("1","Invitation","#008000","2023-02-04 00:58:13");
INSERT INTO tbl_events VALUES("2","Notice of Hearing (1st Mediation)","#FFD700","2023-02-04 00:58:13");
INSERT INTO tbl_events VALUES("3","Notice of Hearing (2nd Mediation)","#FF8C00","2023-02-04 00:58:13");
INSERT INTO tbl_events VALUES("4","Notice of Hearing (Conciliation)","#FF0000","2023-02-04 00:58:13");
INSERT INTO tbl_events VALUES("5","Others (Specify)","#000","2023-02-04 00:58:13");



CREATE TABLE `tbl_file_complaint` (
  `fc_id` varchar(50) NOT NULL,
  `comp_id` int(15) NOT NULL,
  `resp_id` int(15) NOT NULL,
  `com_id` int(15) NOT NULL,
  `fc_statement` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `fc_type` int(11) NOT NULL DEFAULT 0 COMMENT '[0] = Resident\r\n[1] = Non Resident',
  `fc_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `fc_moddatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`fc_id`),
  KEY `comp_id` (`comp_id`,`resp_id`,`com_id`,`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_file_complaint VALUES("001-2023","28","3","29","Niadtong Febuary 1, niari ko diri sa Macabalan kay giadtoan nako akong uyab. Unya pag labay nako atong gamay nga dalan padulong sa balay sa akong uyab, gapang whistle naman nuon ning lakiha, bastos kaayo. Unta matagam ning tawhana kay bastosan ra kaayo ko.","1","0","2023-02-04 01:03:37","2023-02-13 17:57:11");
INSERT INTO tbl_file_complaint VALUES("002-2023","2","12","17","Adtong Febuary 2, 2023, kalit rako gisukmag sa ilang iro. Dako raba kaayo nga iro tapos napaakan ko, kusog kaayo mamaak. Ang nakaapan pajud wala pa diay na vaccinan ilang iro. Please unta lang nga mag bayad ni siya sa damage ug iyang negligence sa pag buhi sa iro. Iyaha manang responsibility, unta mabayaran pud ko niya pang anti rabbies.","1","1","2023-02-04 00:43:56","2023-02-04 00:38:21");
INSERT INTO tbl_file_complaint VALUES("003-2023","24","10","16","Damages","2","0","2023-02-04 01:16:55","2023-02-11 13:30:31");
INSERT INTO tbl_file_complaint VALUES("004-2023","21","25","25","Family Conflicts","2","0","2023-02-04 01:16:54","2023-02-13 17:08:54");
INSERT INTO tbl_file_complaint VALUES("005-2023","28","16","26","Noisy Neighbor","0","0","2023-02-04 01:23:07","2023-02-04 01:23:07");
INSERT INTO tbl_file_complaint VALUES("006-2023","4","15","23","House Rental","0","0","2023-02-04 01:23:58","2023-02-04 01:23:58");
INSERT INTO tbl_file_complaint VALUES("007-2023","5","6","29","Cat call.","2","1","2023-02-04 00:33:10","2023-02-13 11:02:02");
INSERT INTO tbl_file_complaint VALUES("008-2023","10","3","18","Boundary Dispute","0","1","2023-02-04 00:36:13","2023-02-04 00:36:13");
INSERT INTO tbl_file_complaint VALUES("009-2023","5","26","24","Rumors","0","1","2023-02-09 12:08:41","2023-02-09 12:08:41");
INSERT INTO tbl_file_complaint VALUES("010-2023","3","2","7","Alarms and Scandal","0","1","2023-02-11 13:24:19","2023-02-11 13:24:19");
INSERT INTO tbl_file_complaint VALUES("011-2023","23","6","11","Coercion","0","0","2023-02-11 14:08:52","2023-02-11 14:08:52");
INSERT INTO tbl_file_complaint VALUES("012-2023","11","8","13","Arsons of Property of Small Value","0","0","2023-02-13 17:59:09","2023-02-13 17:59:09");



CREATE TABLE `tbl_logs` (
  `log_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `log_action` text DEFAULT NULL,
  `log_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=407 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_logs VALUES("1","1","Filed new complaint with Entry No: <b>001-2023</b>","2023-02-04 01:03:37");
INSERT INTO tbl_logs VALUES("2","1","Updated the detail of <b>Crist Blue Brown</b> from the non-resident","2023-02-04 01:25:30");
INSERT INTO tbl_logs VALUES("3","1","Updated the detail of <b>Crist Blue Brown</b> from the non-resident","2023-02-04 01:26:57");
INSERT INTO tbl_logs VALUES("4","1","Updated the detail of <b>Crist Blue Brown</b> from the non-resident","2023-02-04 01:27:04");
INSERT INTO tbl_logs VALUES("5","1","Updated resident detail of <b>Bryan Melencio Bayani</b>","2023-02-04 00:30:15");
INSERT INTO tbl_logs VALUES("6","1","Updated <b>Edgie Llagas Ocariza</b>","2023-02-04 00:54:22");
INSERT INTO tbl_logs VALUES("7","1","Updated <b>Edgie Llagas Ocariza</b>","2023-02-04 00:54:46");
INSERT INTO tbl_logs VALUES("8","1","Updated <b>Arthur  Very</b>","2023-02-04 01:06:07");
INSERT INTO tbl_logs VALUES("9","1","Logged Out","2023-02-04 01:06:12");
INSERT INTO tbl_logs VALUES("10","0","Logged In","2023-02-04 01:06:17");
INSERT INTO tbl_logs VALUES("11","0","Logged Out","2023-02-04 01:07:18");
INSERT INTO tbl_logs VALUES("12","0","Tried to access his account but he is already <b>INACTIVE</b>","2023-02-04 01:13:18");
INSERT INTO tbl_logs VALUES("13","0","Logged In","2023-02-04 01:13:25");
INSERT INTO tbl_logs VALUES("14","0","Logged Out","2023-02-04 01:13:45");
INSERT INTO tbl_logs VALUES("15","0","Logged In","2023-02-04 01:13:50");
INSERT INTO tbl_logs VALUES("16","0","Logged Out","2023-02-04 01:14:27");
INSERT INTO tbl_logs VALUES("17","0","Logged In","2023-02-04 01:14:41");
INSERT INTO tbl_logs VALUES("18","0","Logged Out","2023-02-04 01:14:47");
INSERT INTO tbl_logs VALUES("19","0","Logged In","2023-02-04 01:15:18");
INSERT INTO tbl_logs VALUES("20","0","Logged Out","2023-02-04 01:15:23");
INSERT INTO tbl_logs VALUES("21","0","Logged In","2023-02-04 01:16:32");
INSERT INTO tbl_logs VALUES("22","0","Tried to access unauthorized page.","2023-02-04 01:16:50");
INSERT INTO tbl_logs VALUES("23","0","Logged Out","2023-02-04 01:16:55");
INSERT INTO tbl_logs VALUES("24","0","Logged In","2023-02-04 01:17:02");
INSERT INTO tbl_logs VALUES("25","0","Logged Out","2023-02-04 01:17:07");
INSERT INTO tbl_logs VALUES("26","0","Logged In","2023-02-04 01:17:38");
INSERT INTO tbl_logs VALUES("27","0","Logged Out","2023-02-04 01:17:47");
INSERT INTO tbl_logs VALUES("28","0","Logged In","2023-02-04 01:17:53");
INSERT INTO tbl_logs VALUES("29","0","Logged Out","2023-02-04 01:17:59");
INSERT INTO tbl_logs VALUES("30","0","Logged In","2023-02-04 01:18:03");
INSERT INTO tbl_logs VALUES("31","0","Logged Out","2023-02-04 01:19:04");
INSERT INTO tbl_logs VALUES("32","1","Logged In","2023-02-04 01:19:29");
INSERT INTO tbl_logs VALUES("33","1","Logged Out","2023-02-04 01:21:36");
INSERT INTO tbl_logs VALUES("34","0","Logged In","2023-02-04 01:21:53");
INSERT INTO tbl_logs VALUES("35","0","Logged Out","2023-02-04 01:24:48");
INSERT INTO tbl_logs VALUES("36","1","Logged In","2023-02-04 01:24:52");
INSERT INTO tbl_logs VALUES("37","1","Logged Out","2023-02-04 01:25:07");
INSERT INTO tbl_logs VALUES("38","2","Logged In","2023-02-04 01:25:11");
INSERT INTO tbl_logs VALUES("39","2","Logged Out","2023-02-04 01:25:17");
INSERT INTO tbl_logs VALUES("40","1","Logged In","2023-02-04 01:25:23");
INSERT INTO tbl_logs VALUES("41","1","Updated <b>Arthur  Very</b>","2023-02-04 01:25:37");
INSERT INTO tbl_logs VALUES("42","1","Logged Out","2023-02-04 01:25:45");
INSERT INTO tbl_logs VALUES("43","2","Logged In","2023-02-04 01:25:49");
INSERT INTO tbl_logs VALUES("44","2","Logged Out","2023-02-04 01:25:56");
INSERT INTO tbl_logs VALUES("45","0","Tried to access the content of the System.","2023-02-04 00:34:53");
INSERT INTO tbl_logs VALUES("46","0","Login attempt","2023-02-04 00:36:37");
INSERT INTO tbl_logs VALUES("47","0","Tried to access the content of the System.","2023-02-04 00:36:41");
INSERT INTO tbl_logs VALUES("48","1","Logged Out","2023-02-04 00:37:19");
INSERT INTO tbl_logs VALUES("49","2","Logged Out","2023-02-04 00:38:53");
INSERT INTO tbl_logs VALUES("50","2","Logged Out","2023-02-04 00:39:52");
INSERT INTO tbl_logs VALUES("51","1","Logged In","2023-02-04 00:39:57");
INSERT INTO tbl_logs VALUES("52","1","Logged Out","2023-02-04 00:41:44");
INSERT INTO tbl_logs VALUES("53","2","Logged Out","2023-02-04 00:42:19");
INSERT INTO tbl_logs VALUES("54","2","Logged Out","2023-02-04 00:43:40");
INSERT INTO tbl_logs VALUES("55","2","Logged Out","2023-02-04 00:44:58");
INSERT INTO tbl_logs VALUES("56","2","Logged Out","2023-02-04 00:45:14");
INSERT INTO tbl_logs VALUES("57","2","Logged Out","2023-02-04 00:45:48");
INSERT INTO tbl_logs VALUES("58","2","Logged Out","2023-02-04 00:46:08");
INSERT INTO tbl_logs VALUES("59","1","Logged In","2023-02-04 00:50:04");
INSERT INTO tbl_logs VALUES("60","1","Logged Out","2023-02-04 00:50:09");
INSERT INTO tbl_logs VALUES("61","1","Logged In","2023-02-04 00:51:21");
INSERT INTO tbl_logs VALUES("62","1","Logged Out","2023-02-04 00:51:26");
INSERT INTO tbl_logs VALUES("63","1","Logged In","2023-02-04 00:56:20");
INSERT INTO tbl_logs VALUES("64","1","Logged Out","2023-02-04 00:57:17");
INSERT INTO tbl_logs VALUES("65","0","Tried to access <b>Arthur Very</b> account that is currently Inactive","2023-02-04 00:57:22");
INSERT INTO tbl_logs VALUES("66","1","Logged In","2023-02-04 00:57:27");
INSERT INTO tbl_logs VALUES("67","1","Updated <b>Arthur  Very</b>","2023-02-04 01:00:38");
INSERT INTO tbl_logs VALUES("68","1","Logged Out","2023-02-04 01:00:45");
INSERT INTO tbl_logs VALUES("69","2","Logged In","2023-02-04 01:00:52");
INSERT INTO tbl_logs VALUES("70","2","Logged Out","2023-02-04 01:01:00");
INSERT INTO tbl_logs VALUES("71","1","Logged In","2023-02-04 01:01:10");
INSERT INTO tbl_logs VALUES("72","1","Added new user","2023-02-04 01:19:07");
INSERT INTO tbl_logs VALUES("73","1","Added new user","2023-02-04 01:20:48");
INSERT INTO tbl_logs VALUES("74","1","Logged Out","2023-02-04 01:21:02");
INSERT INTO tbl_logs VALUES("75","5","Logged In","2023-02-04 01:21:10");
INSERT INTO tbl_logs VALUES("76","5","Added new user","2023-02-04 01:21:56");
INSERT INTO tbl_logs VALUES("77","5","Logged Out","2023-02-04 01:22:09");
INSERT INTO tbl_logs VALUES("78","6","Logged In","2023-02-04 01:22:16");
INSERT INTO tbl_logs VALUES("79","6","Logged Out","2023-02-04 01:22:22");
INSERT INTO tbl_logs VALUES("80","1","Logged In","2023-02-04 01:22:28");
INSERT INTO tbl_logs VALUES("81","1","Updated user   ","2023-02-04 01:00:59");
INSERT INTO tbl_logs VALUES("82","1","Updated user   ","2023-02-04 01:02:49");
INSERT INTO tbl_logs VALUES("83","1","Appointed a schedule for Entry No.: <b></b>","2023-02-04 01:06:19");
INSERT INTO tbl_logs VALUES("84","1","Appointed a schedule for Entry No.: <b>001-2023</b>","2023-02-04 01:08:32");
INSERT INTO tbl_logs VALUES("85","1","Logged Out","2023-02-04 01:15:15");
INSERT INTO tbl_logs VALUES("86","1","Logged In","2023-02-04 00:29:29");
INSERT INTO tbl_logs VALUES("87","1","Filed new complaint with Entry No: <b>002-2023</b>","2023-02-04 00:43:56");
INSERT INTO tbl_logs VALUES("88","1","Appointed a schedule for Entry No.: <b></b>","2023-02-04 00:48:20");
INSERT INTO tbl_logs VALUES("89","1","Logged Out","2023-02-04 01:22:53");
INSERT INTO tbl_logs VALUES("90","1","Logged In","2023-02-04 00:39:45");
INSERT INTO tbl_logs VALUES("91","1","Updated the status of Entry No.: <b>002-2023</b>","2023-02-04 00:41:30");
INSERT INTO tbl_logs VALUES("92","1","Logged In","2023-02-04 01:23:57");
INSERT INTO tbl_logs VALUES("93","1","Logged Out","2023-02-04 01:01:47");
INSERT INTO tbl_logs VALUES("94","1","Logged In","2023-02-04 01:01:53");
INSERT INTO tbl_logs VALUES("95","1","Logged Out","2023-02-04 01:02:12");
INSERT INTO tbl_logs VALUES("96","2","Logged In","2023-02-04 01:03:35");
INSERT INTO tbl_logs VALUES("97","2","Filed new complaint with Entry No: <b>003-2023</b>","2023-02-04 01:16:55");
INSERT INTO tbl_logs VALUES("98","2","Logged Out","2023-02-04 01:17:08");
INSERT INTO tbl_logs VALUES("99","1","Logged In","2023-02-04 01:17:12");
INSERT INTO tbl_logs VALUES("100","1","Logged Out","2023-02-04 01:18:53");
INSERT INTO tbl_logs VALUES("101","1","Logged In","2023-02-04 01:18:58");
INSERT INTO tbl_logs VALUES("102","1","Logged Out","2023-02-04 01:19:55");
INSERT INTO tbl_logs VALUES("103","2","Logged In","2023-02-04 01:20:02");
INSERT INTO tbl_logs VALUES("104","2","Logged Out","2023-02-04 01:21:13");
INSERT INTO tbl_logs VALUES("105","1","Logged In","2023-02-04 01:21:17");
INSERT INTO tbl_logs VALUES("106","1","Logged Out","2023-02-04 01:26:22");
INSERT INTO tbl_logs VALUES("107","1","Logged In","2023-02-04 01:26:28");
INSERT INTO tbl_logs VALUES("108","1","Logged Out","2023-02-04 01:27:14");
INSERT INTO tbl_logs VALUES("109","1","Logged In","2023-02-04 00:30:06");
INSERT INTO tbl_logs VALUES("110","0","Tried to access the content of the System.","2023-02-04 00:38:40");
INSERT INTO tbl_logs VALUES("111","0","Tried to access the content of the System.","2023-02-04 00:38:40");
INSERT INTO tbl_logs VALUES("112","0","Tried to access the content of the System.","2023-02-04 00:38:40");
INSERT INTO tbl_logs VALUES("113","0","Tried to access the content of the System.","2023-02-04 00:38:40");
INSERT INTO tbl_logs VALUES("114","0","Tried to access the content of the System.","2023-02-04 00:38:41");
INSERT INTO tbl_logs VALUES("115","0","Tried to access the content of the System.","2023-02-04 00:38:41");
INSERT INTO tbl_logs VALUES("116","0","Tried to access the content of the System.","2023-02-04 00:38:41");
INSERT INTO tbl_logs VALUES("117","1","Logged Out","2023-02-04 00:41:56");
INSERT INTO tbl_logs VALUES("118","2","Logged In","2023-02-04 00:42:04");
INSERT INTO tbl_logs VALUES("119","2","Logged Out","2023-02-04 00:44:14");
INSERT INTO tbl_logs VALUES("120","1","Logged In","2023-02-04 00:44:18");
INSERT INTO tbl_logs VALUES("121","0","Tried to access the content of the System.","2023-02-04 00:45:06");
INSERT INTO tbl_logs VALUES("122","0","Tried to access the content of the System.","2023-02-04 00:45:08");
INSERT INTO tbl_logs VALUES("123","1","Logged Out","2023-02-04 00:47:59");
INSERT INTO tbl_logs VALUES("124","1","Logged In","2023-02-04 00:48:03");
INSERT INTO tbl_logs VALUES("125","1","Logged Out","2023-02-04 00:49:27");
INSERT INTO tbl_logs VALUES("126","1","Logged In","2023-02-04 00:49:34");
INSERT INTO tbl_logs VALUES("127","1","Added <b>Bryan Dave Banal Bultan</b> to the resident record.","2023-02-04 01:02:15");
INSERT INTO tbl_logs VALUES("128","1","Filed new complaint with Entry No: <b>004-2023</b>","2023-02-04 01:16:54");
INSERT INTO tbl_logs VALUES("129","1","Added <b>Natashia Velez Macasana</b> to the resident record.","2023-02-04 01:23:07");
INSERT INTO tbl_logs VALUES("130","1","Filed new complaint with Entry No: <b>005-2023</b>","2023-02-04 01:23:07");
INSERT INTO tbl_logs VALUES("131","1","Filed new complaint with Entry No: <b>006-2023</b>","2023-02-04 01:23:58");
INSERT INTO tbl_logs VALUES("132","1","Added <b>Sample Complaint 1</b> to complaint type record.","2023-02-04 00:30:25");
INSERT INTO tbl_logs VALUES("133","1","Filed new complaint with Entry No: <b>007-2023</b>","2023-02-04 00:33:10");
INSERT INTO tbl_logs VALUES("134","1","Added <b>Xander  Bord</b> to the non-resident record.","2023-02-04 00:36:13");
INSERT INTO tbl_logs VALUES("135","1","Filed new complaint with Entry No: <b>008-2023</b>","2023-02-04 00:36:13");
INSERT INTO tbl_logs VALUES("136","1","Added <b>Sample Complaint 2</b> to complaint type record.","2023-02-04 00:37:49");
INSERT INTO tbl_logs VALUES("137","1","Updated the status of Entry No.: <b>002-2023</b>","2023-02-04 00:58:50");
INSERT INTO tbl_logs VALUES("138","1","Updated the details of Entry No.: <b>002-2023</b>","2023-02-04 00:38:21");
INSERT INTO tbl_logs VALUES("139","1","Appointed a schedule for Entry No: <b>003-2023</b>","2023-02-08 22:34:26");
INSERT INTO tbl_logs VALUES("140","1","Appointed a schedule for Entry No: <b>004-2023</b>","2023-02-08 22:35:14");
INSERT INTO tbl_logs VALUES("141","1","Appointed a schedule for Entry No: <b>003-2023</b>","2023-02-08 22:44:07");
INSERT INTO tbl_logs VALUES("142","1","Logged In","2023-02-08 22:51:25");
INSERT INTO tbl_logs VALUES("143","1","Appointed a schedule for Entry No: <b></b>","2023-02-08 23:08:03");
INSERT INTO tbl_logs VALUES("144","1","Appointed a schedule for Entry No: <b></b>","2023-02-08 23:10:10");
INSERT INTO tbl_logs VALUES("145","1","Appointed a schedule for Entry No: <b>005-2023</b>","2023-02-08 23:12:11");
INSERT INTO tbl_logs VALUES("146","1","Appointed a schedule for Entry No: <b>006-2023</b>","2023-02-08 23:17:05");
INSERT INTO tbl_logs VALUES("147","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-08 23:25:36");
INSERT INTO tbl_logs VALUES("148","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-08 23:25:53");
INSERT INTO tbl_logs VALUES("149","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-08 23:27:59");
INSERT INTO tbl_logs VALUES("150","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-08 23:29:28");
INSERT INTO tbl_logs VALUES("151","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-08 23:30:40");
INSERT INTO tbl_logs VALUES("152","1","Appointed a schedule for Entry No: <b>006-2023</b>","2023-02-08 23:32:01");
INSERT INTO tbl_logs VALUES("153","1","Logged In","2023-02-09 09:22:24");
INSERT INTO tbl_logs VALUES("154","1","Appointed a schedule for Entry No: <b>007-2023</b>","2023-02-09 09:43:09");
INSERT INTO tbl_logs VALUES("155","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:44:09");
INSERT INTO tbl_logs VALUES("156","1","Appointed a schedule for Entry No: <b>007-2023</b>","2023-02-09 09:45:25");
INSERT INTO tbl_logs VALUES("157","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:48:38");
INSERT INTO tbl_logs VALUES("158","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:49:36");
INSERT INTO tbl_logs VALUES("159","1","Updated the schedule of Entry No.: <b>001-2023</b>","2023-02-09 09:49:42");
INSERT INTO tbl_logs VALUES("160","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:49:47");
INSERT INTO tbl_logs VALUES("161","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-09 09:49:54");
INSERT INTO tbl_logs VALUES("162","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:50:01");
INSERT INTO tbl_logs VALUES("163","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:50:07");
INSERT INTO tbl_logs VALUES("164","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:50:27");
INSERT INTO tbl_logs VALUES("165","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:50:57");
INSERT INTO tbl_logs VALUES("166","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:52:25");
INSERT INTO tbl_logs VALUES("167","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:52:34");
INSERT INTO tbl_logs VALUES("168","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:52:56");
INSERT INTO tbl_logs VALUES("169","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:54:05");
INSERT INTO tbl_logs VALUES("170","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:54:15");
INSERT INTO tbl_logs VALUES("171","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:54:33");
INSERT INTO tbl_logs VALUES("172","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:54:51");
INSERT INTO tbl_logs VALUES("173","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 10:00:04");
INSERT INTO tbl_logs VALUES("174","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 10:01:28");
INSERT INTO tbl_logs VALUES("175","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 10:01:40");
INSERT INTO tbl_logs VALUES("176","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 10:09:18");
INSERT INTO tbl_logs VALUES("177","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 10:09:29");
INSERT INTO tbl_logs VALUES("178","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:22:35");
INSERT INTO tbl_logs VALUES("179","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:22:40");
INSERT INTO tbl_logs VALUES("180","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:23:02");
INSERT INTO tbl_logs VALUES("181","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-09 09:23:08");
INSERT INTO tbl_logs VALUES("182","1","Added <b>Fernando Boe Jumama</b> to the resident record.","2023-02-09 10:29:47");
INSERT INTO tbl_logs VALUES("183","1","Added <b>Sample Zone 1</b> to zone record","2023-02-09 10:40:59");
INSERT INTO tbl_logs VALUES("184","1","Updated resident detail of <b>Fernando Boe Jumama</b>","2023-02-09 11:54:11");
INSERT INTO tbl_logs VALUES("185","1","Updated resident detail of <b>Natashia Velez Macasana</b>","2023-02-09 11:54:26");
INSERT INTO tbl_logs VALUES("186","1","Added <b>Ovaltine  Nido</b> to the non-resident record.","2023-02-09 12:00:13");
INSERT INTO tbl_logs VALUES("187","1","Filed new complaint with Entry No: <b>009-2023</b>","2023-02-09 12:08:41");
INSERT INTO tbl_logs VALUES("188","1","Updated the detail of <b>Reynaldo Lapira Espinosa</b> from the non-resident","2023-02-09 12:12:29");
INSERT INTO tbl_logs VALUES("189","1","Logged In","2023-02-09 12:20:24");
INSERT INTO tbl_logs VALUES("190","1","Updated the detail of <b>Reynaldo Lapira Espinosa</b> from the non-resident","2023-02-09 12:21:40");
INSERT INTO tbl_logs VALUES("191","1","Added <b>Sample Citizenship 3</b> citizenship","2023-02-09 12:21:58");
INSERT INTO tbl_logs VALUES("192","1","Added <b>Tristan Lopez Strange</b> as one of the Lupong Tagapamayapa","2023-02-09 12:23:15");
INSERT INTO tbl_logs VALUES("193","1","Added <b>Fernando Boe Jumama</b> as one of the Lupong Tagapamayapa","2023-02-09 12:23:40");
INSERT INTO tbl_logs VALUES("194","1","Added <b>Mary Joy Nabalacan Tumama</b> to the resident record.","2023-02-09 12:24:58");
INSERT INTO tbl_logs VALUES("195","1","Updated <b>Fernando Boe Jumama</b>","2023-02-09 12:26:29");
INSERT INTO tbl_logs VALUES("196","1","Updated <b>Fernando Boe Jumama</b>","2023-02-09 12:26:43");
INSERT INTO tbl_logs VALUES("197","1","Added <b>Marvin  Balatano</b> as one of the Lupong Tagapamayapa","2023-02-09 12:33:10");
INSERT INTO tbl_logs VALUES("198","1","Updated user   ","2023-02-09 12:44:32");
INSERT INTO tbl_logs VALUES("199","1","Updated user   ","2023-02-09 12:44:44");
INSERT INTO tbl_logs VALUES("200","1","Updated user   ","2023-02-09 12:44:49");
INSERT INTO tbl_logs VALUES("201","1","Updated user   ","2023-02-09 12:45:28");
INSERT INTO tbl_logs VALUES("202","1","Updated user   ","2023-02-09 12:45:43");
INSERT INTO tbl_logs VALUES("203","1","Updated user   ","2023-02-09 12:46:21");
INSERT INTO tbl_logs VALUES("204","1","Updated user   ","2023-02-09 12:46:28");
INSERT INTO tbl_logs VALUES("205","1","Updated the status of Entry No.: <b>001-2023</b>","2023-02-09 14:17:45");
INSERT INTO tbl_logs VALUES("206","1","Logged Out","2023-02-09 14:39:21");
INSERT INTO tbl_logs VALUES("207","1","Logged In","2023-02-09 14:43:37");
INSERT INTO tbl_logs VALUES("208","1","Logged Out","2023-02-09 15:32:07");
INSERT INTO tbl_logs VALUES("209","1","Logged In","2023-02-09 14:43:15");
INSERT INTO tbl_logs VALUES("210","1","Logged In","2023-02-10 10:34:45");
INSERT INTO tbl_logs VALUES("211","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-10 10:43:10");
INSERT INTO tbl_logs VALUES("212","1","Updated the schedule of Entry No.: <b>007-2023</b>","2023-02-10 10:43:22");
INSERT INTO tbl_logs VALUES("213","1","Logged In","2023-02-11 13:24:21");
INSERT INTO tbl_logs VALUES("214","1","Filed new complaint with Entry No: <b>010-2023</b>","2023-02-11 13:24:19");
INSERT INTO tbl_logs VALUES("215","1","Logged In","2023-02-11 13:33:35");
INSERT INTO tbl_logs VALUES("216","1","Logged Out","2023-02-11 13:45:10");
INSERT INTO tbl_logs VALUES("217","0","Tried to access the content of the System.","2023-02-11 13:48:00");
INSERT INTO tbl_logs VALUES("218","1","Logged In","2023-02-11 13:48:10");
INSERT INTO tbl_logs VALUES("219","1","Filed new complaint with Entry No: <b>011-2023</b>","2023-02-11 14:08:52");
INSERT INTO tbl_logs VALUES("220","1","Updated the status of Entry No.: <b>003-2023</b>","2023-02-11 13:30:31");
INSERT INTO tbl_logs VALUES("221","1","Logged Out","2023-02-11 13:31:24");
INSERT INTO tbl_logs VALUES("222","1","Logged In","2023-02-11 13:26:52");
INSERT INTO tbl_logs VALUES("223","1","Logged Out","2023-02-13 10:03:20");
INSERT INTO tbl_logs VALUES("224","0","Login attempt","2023-02-13 10:08:42");
INSERT INTO tbl_logs VALUES("225","1","Logged In","2023-02-13 10:08:47");
INSERT INTO tbl_logs VALUES("226","1","Appointed a schedule for Entry No: <b>008-2023</b>","2023-02-13 10:40:46");
INSERT INTO tbl_logs VALUES("227","1","Appointed a schedule for Entry No: <b>009-2023</b>","2023-02-13 10:41:53");
INSERT INTO tbl_logs VALUES("228","1","Updated the status of Entry No.: <b>007-2023</b>","2023-02-13 11:02:02");
INSERT INTO tbl_logs VALUES("229","1","Appointed a schedule for Entry No: <b>008-2023</b>","2023-02-13 11:02:18");
INSERT INTO tbl_logs VALUES("230","1","Logged Out","2023-02-13 10:46:47");
INSERT INTO tbl_logs VALUES("231","1","Logged In","2023-02-13 10:14:14");
INSERT INTO tbl_logs VALUES("232","1","Logged In","2023-02-13 17:06:50");
INSERT INTO tbl_logs VALUES("233","1","Filed new complaint with Entry No: <b>012-2023</b>","2023-02-13 17:59:09");
INSERT INTO tbl_logs VALUES("234","1","Updated <b>Christopher Gomez Nabalacan</b>","2023-02-13 17:15:59");
INSERT INTO tbl_logs VALUES("235","1","Logged Out","2023-02-13 18:03:25");
INSERT INTO tbl_logs VALUES("236","1","Logged In","2023-02-13 17:18:25");
INSERT INTO tbl_logs VALUES("237","1","Logged Out","2023-02-13 18:03:41");
INSERT INTO tbl_logs VALUES("238","1","Logged In","2023-02-13 17:07:53");
INSERT INTO tbl_logs VALUES("239","1","Updated the status of Entry No.: <b>004-2023</b>","2023-02-13 17:08:54");
INSERT INTO tbl_logs VALUES("240","1","Appointed a schedule for Entry No: <b>012-2023</b>","2023-02-13 17:10:30");
INSERT INTO tbl_logs VALUES("241","1","Logged In","2023-02-15 13:58:22");
INSERT INTO tbl_logs VALUES("242","1","Logged In","2023-02-15 13:16:41");
INSERT INTO tbl_logs VALUES("243","1","Appointed Pangkat to handle Entry No: <b>001-2023</b>","2023-02-15 13:31:42");
INSERT INTO tbl_logs VALUES("244","1","Appointed a schedule for Entry No: <b>001-2023</b>","2023-02-15 13:31:43");
INSERT INTO tbl_logs VALUES("245","1","Appointed a schedule for Entry No: <b>002-2023</b>","2023-02-15 13:33:28");
INSERT INTO tbl_logs VALUES("246","1","Appointed Pangkat to handle Entry No: <b>002-2023</b>","2023-02-15 13:33:50");
INSERT INTO tbl_logs VALUES("247","1","Appointed a schedule for Entry No: <b>002-2023</b>","2023-02-15 13:33:50");
INSERT INTO tbl_logs VALUES("248","1","Updated the schedule of Entry No.: <b>008-2023</b>","2023-02-15 13:34:24");
INSERT INTO tbl_logs VALUES("249","1","Logged Out","2023-02-15 13:45:19");
INSERT INTO tbl_logs VALUES("250","1","Logged In","2023-02-21 09:24:34");
INSERT INTO tbl_logs VALUES("251","1","Logged Out","2023-02-21 09:31:33");
INSERT INTO tbl_logs VALUES("252","1","Logged In","2023-02-21 09:39:26");
INSERT INTO tbl_logs VALUES("253","1","Logged Out","2023-02-21 09:42:42");
INSERT INTO tbl_logs VALUES("254","2","Logged In","2023-02-21 09:42:47");
INSERT INTO tbl_logs VALUES("255","2","Logged Out","2023-02-21 09:46:32");
INSERT INTO tbl_logs VALUES("256","1","Logged In","2023-02-21 09:46:46");
INSERT INTO tbl_logs VALUES("257","1","Logged Out","2023-02-21 09:53:51");
INSERT INTO tbl_logs VALUES("258","2","Logged In","2023-02-21 09:53:56");
INSERT INTO tbl_logs VALUES("259","2","Appointed a schedule for Entry No: <b>010-2023</b>","2023-02-21 09:44:38");
INSERT INTO tbl_logs VALUES("260","2","Logged Out","2023-02-21 08:59:59");
INSERT INTO tbl_logs VALUES("261","1","Logged In","2023-02-21 09:00:05");
INSERT INTO tbl_logs VALUES("262","1","Logged In","2023-02-21 09:02:58");
INSERT INTO tbl_logs VALUES("263","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-21 09:07:31");
INSERT INTO tbl_logs VALUES("264","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-21 09:07:42");
INSERT INTO tbl_logs VALUES("265","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-21 09:07:48");
INSERT INTO tbl_logs VALUES("266","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-21 09:08:01");
INSERT INTO tbl_logs VALUES("267","1","Updated the schedule of Entry No.: <b>006-2023</b>","2023-02-21 09:08:10");
INSERT INTO tbl_logs VALUES("268","1","Logged In","2023-02-23 08:58:22");
INSERT INTO tbl_logs VALUES("269","1","Logged In","2023-03-01 22:37:01");
INSERT INTO tbl_logs VALUES("270","1","Logged In","2023-03-01 23:26:43");
INSERT INTO tbl_logs VALUES("271","1","Logged In","2023-03-01 22:51:11");
INSERT INTO tbl_logs VALUES("272","0","Tried to access the content of the System.","2023-03-05 17:57:39");
INSERT INTO tbl_logs VALUES("273","1","Logged In","2023-03-05 17:57:48");
INSERT INTO tbl_logs VALUES("274","1","Logged Out","2023-03-05 17:57:02");
INSERT INTO tbl_logs VALUES("275","1","Logged In","2023-03-05 17:57:08");
INSERT INTO tbl_logs VALUES("276","1","Logged Out","2023-03-05 17:57:18");
INSERT INTO tbl_logs VALUES("277","1","Logged In","2023-03-06 12:13:51");
INSERT INTO tbl_logs VALUES("278","1","Logged In","2023-03-08 13:40:16");
INSERT INTO tbl_logs VALUES("279","1","Added new position: <b>Sample Position 5</b>.","2023-03-08 14:04:35");
INSERT INTO tbl_logs VALUES("280","0","Logged Out","2023-03-08 13:51:07");
INSERT INTO tbl_logs VALUES("281","1","Logged In","2023-03-08 13:59:41");
INSERT INTO tbl_logs VALUES("282","1","Logged In","2023-03-08 14:00:01");
INSERT INTO tbl_logs VALUES("283","1","Logged In","2023-03-08 14:01:49");
INSERT INTO tbl_logs VALUES("284","1","Logged Out","2023-03-08 14:02:46");
INSERT INTO tbl_logs VALUES("285","1","Logged In","2023-03-08 14:02:52");
INSERT INTO tbl_logs VALUES("286","1","Logged Out","2023-03-08 14:03:37");
INSERT INTO tbl_logs VALUES("287","1","Logged In","2023-03-08 14:03:45");
INSERT INTO tbl_logs VALUES("288","1","Logged Out","2023-03-08 14:05:13");
INSERT INTO tbl_logs VALUES("289","1","Logged In","2023-03-08 14:05:55");
INSERT INTO tbl_logs VALUES("290","1","Logged Out","2023-03-08 14:07:09");
INSERT INTO tbl_logs VALUES("291","3","Logged In","2023-03-08 14:08:10");
INSERT INTO tbl_logs VALUES("292","3","Logged Out","2023-03-08 14:08:17");
INSERT INTO tbl_logs VALUES("293","1","Logged In","2023-03-08 14:14:06");
INSERT INTO tbl_logs VALUES("294","1","Logged Out","2023-03-08 14:16:06");
INSERT INTO tbl_logs VALUES("295","1","Logged In","2023-03-08 14:16:13");
INSERT INTO tbl_logs VALUES("296","1","Logged Out","2023-03-08 14:17:33");
INSERT INTO tbl_logs VALUES("297","1","Logged In","2023-03-08 14:17:39");
INSERT INTO tbl_logs VALUES("298","1","Logged Out","2023-03-08 14:18:33");
INSERT INTO tbl_logs VALUES("299","1","Logged In","2023-03-08 14:18:41");
INSERT INTO tbl_logs VALUES("300","1","Logged Out","2023-03-08 14:19:32");
INSERT INTO tbl_logs VALUES("301","1","Logged In","2023-03-08 14:19:38");
INSERT INTO tbl_logs VALUES("302","1","Logged Out","2023-03-08 14:20:23");
INSERT INTO tbl_logs VALUES("303","1","Logged In","2023-03-08 14:20:28");
INSERT INTO tbl_logs VALUES("304","1","Logged Out","2023-03-08 14:22:54");
INSERT INTO tbl_logs VALUES("305","1","Logged In","2023-03-08 14:23:00");
INSERT INTO tbl_logs VALUES("306","1","Logged Out","2023-03-08 14:23:45");
INSERT INTO tbl_logs VALUES("307","1","Logged In","2023-03-08 14:02:22");
INSERT INTO tbl_logs VALUES("308","1","Logged Out","2023-03-08 14:03:27");
INSERT INTO tbl_logs VALUES("309","1","Logged In","2023-03-08 14:03:32");
INSERT INTO tbl_logs VALUES("310","1","Logged Out","2023-03-08 14:04:17");
INSERT INTO tbl_logs VALUES("311","1","Logged In","2023-03-08 14:04:24");
INSERT INTO tbl_logs VALUES("312","1","Logged Out","2023-03-08 14:04:53");
INSERT INTO tbl_logs VALUES("313","1","Logged In","2023-03-08 14:05:06");
INSERT INTO tbl_logs VALUES("314","1","Logged Out","2023-03-08 14:05:47");
INSERT INTO tbl_logs VALUES("315","1","Logged In","2023-03-08 14:06:27");
INSERT INTO tbl_logs VALUES("316","1","Logged Out","2023-03-08 14:07:10");
INSERT INTO tbl_logs VALUES("317","1","Logged In","2023-03-08 14:07:48");
INSERT INTO tbl_logs VALUES("318","1","Logged Out","2023-03-08 14:10:25");
INSERT INTO tbl_logs VALUES("319","1","Logged In","2023-03-08 14:10:29");
INSERT INTO tbl_logs VALUES("320","1","Logged Out","2023-03-08 14:10:51");
INSERT INTO tbl_logs VALUES("321","1","Logged In","2023-03-08 14:10:56");
INSERT INTO tbl_logs VALUES("322","1","Logged Out","2023-03-08 14:12:43");
INSERT INTO tbl_logs VALUES("323","1","Logged In","2023-03-08 14:12:53");
INSERT INTO tbl_logs VALUES("324","1","Logged Out","2023-03-08 14:13:33");
INSERT INTO tbl_logs VALUES("325","1","Logged In","2023-03-08 14:13:38");
INSERT INTO tbl_logs VALUES("326","1","Logged Out","2023-03-08 14:14:35");
INSERT INTO tbl_logs VALUES("327","1","Logged In","2023-03-08 14:14:39");
INSERT INTO tbl_logs VALUES("328","1","Logged Out","2023-03-08 14:15:04");
INSERT INTO tbl_logs VALUES("329","1","Logged In","2023-03-08 14:15:08");
INSERT INTO tbl_logs VALUES("330","1","Logged Out","2023-03-08 14:16:56");
INSERT INTO tbl_logs VALUES("331","1","Logged In","2023-03-08 14:17:06");
INSERT INTO tbl_logs VALUES("332","1","Logged Out","2023-03-08 14:17:33");
INSERT INTO tbl_logs VALUES("333","1","Logged In","2023-03-08 14:19:17");
INSERT INTO tbl_logs VALUES("334","1","Logged Out","2023-03-08 14:19:21");
INSERT INTO tbl_logs VALUES("335","1","Logged In","2023-03-12 13:02:50");
INSERT INTO tbl_logs VALUES("336","1","Logged Out","2023-03-12 13:05:16");
INSERT INTO tbl_logs VALUES("337","1","Logged In","2023-03-12 13:05:22");
INSERT INTO tbl_logs VALUES("338","1","Logged Out","2023-03-12 13:05:33");
INSERT INTO tbl_logs VALUES("339","1","Logged In","2023-03-12 13:14:03");
INSERT INTO tbl_logs VALUES("340","1","Logged Out","2023-03-12 13:14:13");
INSERT INTO tbl_logs VALUES("341","1","Logged In","2023-03-12 13:14:35");
INSERT INTO tbl_logs VALUES("342","1","Logged Out","2023-03-12 13:16:36");
INSERT INTO tbl_logs VALUES("343","1","Logged In","2023-03-12 13:16:44");
INSERT INTO tbl_logs VALUES("344","1","Logged Out","2023-03-12 13:17:29");
INSERT INTO tbl_logs VALUES("345","1","Logged In","2023-03-12 13:17:34");
INSERT INTO tbl_logs VALUES("346","1","Logged Out","2023-03-12 13:17:50");
INSERT INTO tbl_logs VALUES("347","1","Logged In","2023-03-12 13:18:16");
INSERT INTO tbl_logs VALUES("348","1","Logged Out","2023-03-12 13:18:59");
INSERT INTO tbl_logs VALUES("349","1","Logged In","2023-03-12 13:22:52");
INSERT INTO tbl_logs VALUES("350","1","Logged Out","2023-03-12 13:33:12");
INSERT INTO tbl_logs VALUES("351","1","Logged In","2023-03-12 13:33:43");
INSERT INTO tbl_logs VALUES("352","1","Logged Out","2023-03-12 13:40:08");
INSERT INTO tbl_logs VALUES("353","1","Logged In","2023-03-12 13:49:30");
INSERT INTO tbl_logs VALUES("354","1","Logged Out","2023-03-12 13:49:48");
INSERT INTO tbl_logs VALUES("355","1","Logged In","2023-03-12 13:49:55");
INSERT INTO tbl_logs VALUES("356","1","Logged Out","2023-03-12 13:50:03");
INSERT INTO tbl_logs VALUES("357","1","Logged In","2023-03-12 13:50:48");
INSERT INTO tbl_logs VALUES("358","1","Logged Out","2023-03-12 13:53:10");
INSERT INTO tbl_logs VALUES("359","1","Logged In","2023-03-12 13:54:10");
INSERT INTO tbl_logs VALUES("360","1","Logged Out","2023-03-12 13:54:20");
INSERT INTO tbl_logs VALUES("361","1","Logged In","2023-03-12 13:56:47");
INSERT INTO tbl_logs VALUES("362","1","Logged Out","2023-03-12 13:59:29");
INSERT INTO tbl_logs VALUES("363","1","Logged In","2023-03-12 14:02:14");
INSERT INTO tbl_logs VALUES("364","1","Logged Out","2023-03-12 14:05:25");
INSERT INTO tbl_logs VALUES("365","1","Logged In","2023-03-12 14:06:04");
INSERT INTO tbl_logs VALUES("366","1","Logged Out","2023-03-12 14:07:05");
INSERT INTO tbl_logs VALUES("367","1","Logged In","2023-03-12 16:37:33");
INSERT INTO tbl_logs VALUES("368","1","Logged Out","2023-03-12 17:03:26");
INSERT INTO tbl_logs VALUES("369","1","Logged In","2023-03-12 17:03:31");
INSERT INTO tbl_logs VALUES("370","1","Logged Out","2023-03-12 17:03:38");
INSERT INTO tbl_logs VALUES("371","1","Logged In","2023-03-12 17:04:31");
INSERT INTO tbl_logs VALUES("372","1","Logged Out","2023-03-12 17:06:31");
INSERT INTO tbl_logs VALUES("373","4","Logged In","2023-03-12 17:06:39");
INSERT INTO tbl_logs VALUES("374","4","Logged Out","2023-03-12 17:07:34");
INSERT INTO tbl_logs VALUES("375","1","Logged In","2023-03-12 17:07:39");
INSERT INTO tbl_logs VALUES("376","1","Logged Out","2023-03-12 17:26:58");
INSERT INTO tbl_logs VALUES("377","1","Logged In","2023-03-12 17:28:45");
INSERT INTO tbl_logs VALUES("378","1","Logged In","2023-03-12 17:22:28");
INSERT INTO tbl_logs VALUES("379","1","Added <b>Isagi  Yoichi</b> to the resident record.","2023-03-12 16:54:43");
INSERT INTO tbl_logs VALUES("380","1","Added <b>Honey Yamet Labadon</b> to the resident record.","2023-03-12 17:03:52");
INSERT INTO tbl_logs VALUES("381","1","Logged Out","2023-03-12 17:08:43");
INSERT INTO tbl_logs VALUES("382","1","Logged In","2023-03-12 16:43:56");
INSERT INTO tbl_logs VALUES("383","1","Added <b>Kimberly Lastims Manalo</b> to the resident record.","2023-03-12 16:46:04");
INSERT INTO tbl_logs VALUES("384","1","Updated resident detail of <b>Marvin  Balatano</b>","2023-03-12 16:45:35");
INSERT INTO tbl_logs VALUES("385","1","Updated resident detail of <b>Marvin  Balatano</b>","2023-03-12 16:47:02");
INSERT INTO tbl_logs VALUES("386","1","Updated resident detail of <b>Balatano, Marvin </b>","2023-03-12 16:51:01");
INSERT INTO tbl_logs VALUES("387","1","Updated resident detail of <b>Balat, Christian </b>","2023-03-12 16:53:24");
INSERT INTO tbl_logs VALUES("388","1","Updated resident details and changed the name of <b>Balat, Christian  </b> to <b>Balat, Christians  </b>","2023-03-12 17:03:14");
INSERT INTO tbl_logs VALUES("389","1","Updated resident details and changed the name of <b>Balat, Christians  </b> to <b>Balats, Christian  </b>","2023-03-12 17:03:53");
INSERT INTO tbl_logs VALUES("390","1","Updated resident details and changed the name of <b>Balats, Christian  </b> to <b>Balats, Christians  </b>","2023-03-12 17:04:30");
INSERT INTO tbl_logs VALUES("391","1","Logged Out","2023-03-12 17:05:30");
INSERT INTO tbl_logs VALUES("392","1","Logged In","2023-03-12 17:05:35");
INSERT INTO tbl_logs VALUES("393","1","Updated resident details and changed the name of <b>Balats, Christians  </b> to <b>Balat, Christian  </b>","2023-03-12 17:06:09");
INSERT INTO tbl_logs VALUES("394","1","Updated resident detail of <b>Balat, Christian  </b>","2023-03-12 17:07:41");
INSERT INTO tbl_logs VALUES("395","1","Updated resident details and changed the name of <b>Balat, Christian  </b> to <b>Balat, Christian Macabalag </b>","2023-03-12 17:11:24");
INSERT INTO tbl_logs VALUES("396","1","Updated resident detail of <b>Balat, Christian Macabalag </b>","2023-03-12 16:46:54");
INSERT INTO tbl_logs VALUES("397","1","Updated resident detail of <b>Balat, Christian Macabalag </b>","2023-03-12 16:47:12");
INSERT INTO tbl_logs VALUES("398","1","Updated resident detail of <b>Balatano, Marvin  </b>","2023-03-12 16:53:40");
INSERT INTO tbl_logs VALUES("399","1","Logged Out","2023-03-12 16:44:22");
INSERT INTO tbl_logs VALUES("400","1","Logged In","2023-03-12 16:44:26");
INSERT INTO tbl_logs VALUES("401","1","Logged Out","2023-03-12 17:13:34");
INSERT INTO tbl_logs VALUES("402","1","Logged In","2023-03-12 17:13:39");
INSERT INTO tbl_logs VALUES("403","1","Updated resident details and changed the name of <b>Balat, Christian Macabalag </b> to <b>Balat, Christians Macabalag </b>","2023-03-12 17:13:26");
INSERT INTO tbl_logs VALUES("404","1","Updated resident details and changed the name of <b>Balat, Christians Macabalag </b> to <b>Balat, Christian Macabalag </b>","2023-03-12 17:15:39");
INSERT INTO tbl_logs VALUES("405","1","Logged Out","2023-03-12 16:46:36");
INSERT INTO tbl_logs VALUES("406","1","Logged In","2023-03-12 16:46:43");



CREATE TABLE `tbl_lupon` (
  `lupon_id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(15) NOT NULL,
  `pos_id` int(15) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `lupon_regdatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`lupon_id`),
  KEY `res_id` (`res_id`,`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_lupon VALUES("1","10","2","0","2023-03-08 13:37:52");
INSERT INTO tbl_lupon VALUES("2","5","2","1","2023-02-01 10:28:30");
INSERT INTO tbl_lupon VALUES("3","2","1","1","2023-02-04 00:54:46");
INSERT INTO tbl_lupon VALUES("4","16","4","1","2023-02-01 10:28:39");
INSERT INTO tbl_lupon VALUES("5","9","2","1","2023-02-01 10:35:54");
INSERT INTO tbl_lupon VALUES("6","17","4","1","2023-02-01 10:28:45");
INSERT INTO tbl_lupon VALUES("7","19","2","1","2023-02-04 01:02:53");
INSERT INTO tbl_lupon VALUES("8","23","2","1","2023-02-04 00:49:38");
INSERT INTO tbl_lupon VALUES("9","15","2","1","2023-02-04 00:51:07");
INSERT INTO tbl_lupon VALUES("10","22","3","1","2023-02-13 17:15:59");
INSERT INTO tbl_lupon VALUES("11","24","2","1","2023-02-04 00:58:01");
INSERT INTO tbl_lupon VALUES("12","25","2","1","2023-02-04 00:58:37");
INSERT INTO tbl_lupon VALUES("13","1","2","1","2023-02-04 01:23:06");
INSERT INTO tbl_lupon VALUES("14","14","6","1","2023-02-09 12:23:15");
INSERT INTO tbl_lupon VALUES("15","29","2","1","2023-02-09 12:26:43");
INSERT INTO tbl_lupon VALUES("16","21","2","1","2023-02-09 12:33:10");



CREATE TABLE `tbl_non_residents` (
  `nres_id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `nres_fname` varchar(50) NOT NULL,
  `nres_mname` varchar(50) NOT NULL,
  `nres_lname` varchar(50) NOT NULL,
  `nres_suffix` varchar(5) NOT NULL,
  `nres_birthday` date NOT NULL,
  `nres_age` int(3) NOT NULL,
  `nres_gender` text NOT NULL,
  `citizenship_id` int(11) NOT NULL,
  `nres_cstatus` text NOT NULL,
  `nres_zone` text NOT NULL,
  `nres_barangay` text NOT NULL,
  `nres_city` text NOT NULL,
  `nres_province` text NOT NULL,
  `nres_zcode` text NOT NULL,
  `nres_contact` varchar(11) NOT NULL,
  `nres_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `nres_moddatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`nres_id`),
  KEY `citizenship_id` (`citizenship_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_non_residents VALUES("1","Crist","Blue","Brown","","1995-11-25","27","Male","1","Single","Zone","Barangay","City","Province","9000","09123456789","2023-01-03 20:31:35","2023-02-04 01:27:04");
INSERT INTO tbl_non_residents VALUES("2","Reynaldo","Lapira","Espinosa","Jr","1998-02-01","25","Male","1","Single","Zone","Barangay","City","Province","9000","09161970254","2023-01-09 18:47:59","2023-02-09 12:12:29");
INSERT INTO tbl_non_residents VALUES("3","Ivy","","Aguas","","2007-05-23","15","Female","1","Single","Zone","Barangay","City","Province","9000","09123456789","2023-01-09 22:58:31","2023-01-24 13:37:04");
INSERT INTO tbl_non_residents VALUES("4","Kurt Ryan","Lasvegas","Pando","","1990-06-24","32","Male","1","Single","Zone 1","Barangay 23","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-24 13:40:07","2023-01-24 13:40:07");
INSERT INTO tbl_non_residents VALUES("5","Micheal","","Batok","","1995-06-27","27","Male","1","Single","Zone 4","Barangay 21","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-27 10:59:04","2023-01-27 10:59:04");
INSERT INTO tbl_non_residents VALUES("6","Leonardo","Balot","Macapagal","Jr","2004-01-31","19","Male","1","Single","Zone 2","Barangay 22","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-31 16:35:06","2023-01-31 16:46:58");
INSERT INTO tbl_non_residents VALUES("7","Nancy","Lavega","Gabot","","1995-07-31","27","Female","1","Married","Zone 3","Barangay 23","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-31 16:37:20","2023-01-31 16:48:28");
INSERT INTO tbl_non_residents VALUES("8","Messy Babe","","Montero","","1990-05-24","32","Female","1","Single","Zone 1","Barangay 19","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-31 16:53:10","2023-01-31 16:53:10");
INSERT INTO tbl_non_residents VALUES("9","Mary Princess","Aguilar","Ocampo","","2000-05-20","22","Female","1","Single","Zone 1","Barangay 30","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-02-03 01:02:37","2023-02-03 01:02:37");
INSERT INTO tbl_non_residents VALUES("10","Xander","","Bord","","1990-01-20","33","Male","1","Single","Zone 3","Barangay 11","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-02-04 00:36:13","2023-02-04 00:36:13");
INSERT INTO tbl_non_residents VALUES("11","Ovaltine","","Nido","","2000-09-01","22","Male","1","Single","Zone 1 ","Barangay 11","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-02-09 12:00:13","2023-02-09 12:00:13");



CREATE TABLE `tbl_positions` (
  `pos_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(50) DEFAULT NULL,
  `pos_description` text NOT NULL,
  `pos_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_positions VALUES("1","Administrator","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("2","Lupon Member","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("3","Chairman","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("4","Secretary","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("5","Barangay Captain","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("6","Sample Position 1","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("7","Sample Position 2","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("8","Sample Position 3","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("9","Sample Position 4","Lorem Lorem Sinta Buko ng papaya","2023-03-08 13:57:58");
INSERT INTO tbl_positions VALUES("10","Sample Position 5","Lorem my friend.","2023-03-08 14:04:35");



CREATE TABLE `tbl_remarks` (
  `remark_id` int(11) NOT NULL AUTO_INCREMENT,
  `remark_name` varchar(50) NOT NULL,
  `remark_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`remark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_remarks VALUES("1","Settled","2023-02-01 10:01:49");
INSERT INTO tbl_remarks VALUES("2","Not Settled","2023-02-01 10:01:49");
INSERT INTO tbl_remarks VALUES("3","Complainant failed to appear (Reschedule)","2023-02-01 10:01:49");
INSERT INTO tbl_remarks VALUES("4","Respondent failed to appear (Reschedule)","2023-02-01 10:01:49");



CREATE TABLE `tbl_residents` (
  `res_id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `res_fname` varchar(50) NOT NULL,
  `res_mname` varchar(50) NOT NULL,
  `res_lname` varchar(50) NOT NULL,
  `res_suffix` varchar(5) NOT NULL,
  `res_birthday` date NOT NULL,
  `res_age` int(3) NOT NULL,
  `res_gender` text NOT NULL,
  `res_cstatus` text NOT NULL,
  `zone_id` int(11) NOT NULL,
  `res_contact` varchar(11) NOT NULL,
  `res_regDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `res_moddatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`res_id`),
  KEY `zone_id` (`zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_residents VALUES("1","Johns","Dee","Doe","Jr","2000-01-01","23","Male","Single","1","09123456789","2023-01-06 13:18:02","2023-01-16 00:19:30");
INSERT INTO tbl_residents VALUES("2","Edgie","Llagas","Ocariza","","2000-01-14","23","Male","Single","3","09659970076","2023-01-03 20:01:23","2023-02-04 01:17:17");
INSERT INTO tbl_residents VALUES("3","Mario","Gomez","Stone","III","2000-01-01","23","Male","Single","1","09123456789","2022-12-30 22:37:14","2023-01-06 13:41:28");
INSERT INTO tbl_residents VALUES("4","Charles Miguel","Roa","Valdez","","1997-03-02","25","Male","Single","2","09123456789","2022-12-30 22:36:00","2023-02-04 01:26:25");
INSERT INTO tbl_residents VALUES("5","Christian","Villanueva","Lavender","","2000-01-01","23","Male","Single","3","09123456789","2023-01-01 00:06:21","2023-01-06 13:41:28");
INSERT INTO tbl_residents VALUES("6","Tristan","Manalo","Toloto","","1987-05-13","35","Male","Single","8","09123456789","2022-12-30 22:11:40","2023-01-16 00:15:45");
INSERT INTO tbl_residents VALUES("7","Naruto","","Uzumaki","","2000-01-01","23","Male","Married","4","09123456789","2023-01-01 00:41:08","2023-01-06 13:41:28");
INSERT INTO tbl_residents VALUES("8","Chochi","Llagas","Ocariza","","1960-12-04","62","Female","Single","3","09123456789","2023-01-01 00:40:30","2023-01-09 23:00:29");
INSERT INTO tbl_residents VALUES("9","Bryan","Melencio","Bayani","","1978-03-20","44","Male","Single","1","09123456789","2023-02-01 10:12:06","2023-02-04 00:30:15");
INSERT INTO tbl_residents VALUES("10","Arthur","","Very","","2000-01-01","23","Male","Single","8","09123456789","2023-01-03 20:02:04","2023-01-06 13:41:28");
INSERT INTO tbl_residents VALUES("11","Sharper","","Knife","","2000-01-01","23","Male","Single","1","09123456789","2023-01-02 12:36:01","2023-01-06 13:41:28");
INSERT INTO tbl_residents VALUES("12","Rogue","","Portugas","","2000-01-01","23","Female","Married","6","09982128644","2023-01-06 13:11:48","2023-01-09 00:57:32");
INSERT INTO tbl_residents VALUES("13","Luffy","","Ocariza","","2000-01-01","23","Male","Married","1","09161970254","2023-01-09 18:45:25","2023-01-09 18:46:20");
INSERT INTO tbl_residents VALUES("14","Tristan","Lopez","Strange","","2005-07-28","17","Male","Single","1","09161970254","2023-01-09 23:24:37","2023-01-15 23:24:30");
INSERT INTO tbl_residents VALUES("15","Christian","Macabalag","Balat","","1987-02-01","36","Male","Single","6","0912-345-67","2023-01-09 23:27:24","2023-03-12 17:15:39");
INSERT INTO tbl_residents VALUES("16","John Paul","Libo","Mahulog","","2000-01-01","23","Male","Single","1","09123456789","2023-01-09 23:30:59","2023-01-09 23:30:59");
INSERT INTO tbl_residents VALUES("17","John","","Malata","","2000-01-01","23","Male","Single","1","0912345678","2023-01-09 22:39:21","2023-02-04 00:55:01");
INSERT INTO tbl_residents VALUES("18","Kayle","","Flores","","1997-02-14","25","Male","Married","6","09123456789","2023-01-09 22:42:21","2023-01-09 22:42:21");
INSERT INTO tbl_residents VALUES("19","Joshua","Balboa","Mansan","Jr.","1995-09-20","27","Male","Single","3","09123456789","2023-01-12 13:00:13","2023-01-12 13:00:13");
INSERT INTO tbl_residents VALUES("20","Martina","","Guanzon","","1978-10-12","44","Female","Married","6","09123456789","2023-01-12 13:03:51","2023-01-12 13:03:51");
INSERT INTO tbl_residents VALUES("21","Marvin","","Balatano","","1997-06-14","25","Male","Single","1","09123456789","2023-01-27 10:42:34","2023-03-12 16:53:40");
INSERT INTO tbl_residents VALUES("22","Christopher","Gomez","Nabalacan","","1998-09-23","24","Male","Single","6","09123456789","2023-02-03 01:30:38","2023-02-03 01:30:38");
INSERT INTO tbl_residents VALUES("23","Kurt Noah","","Gueverro","","1978-05-07","44","Male","Single","3","09123456789","2023-02-03 01:35:01","2023-02-03 01:35:01");
INSERT INTO tbl_residents VALUES("24","Edgardo","Lopez","Colenaser","","1991-10-12","31","Male","Married","9","09123456789","2023-02-03 00:45:13","2023-02-03 00:45:13");
INSERT INTO tbl_residents VALUES("25","John David","Nabacalan","Lim","","1987-04-12","35","Male","Single","7","09123456789","2023-02-03 00:51:35","2023-02-03 00:51:35");
INSERT INTO tbl_residents VALUES("26","Bernardino","Balat","Nabalacan","Jr","1997-09-20","25","Male","Single","7","09123456789","2023-02-04 01:17:15","2023-02-04 01:17:15");
INSERT INTO tbl_residents VALUES("27","Bryan Dave","Banal","Bultan","","1999-08-02","23","Male","Single","7","09123456789","2023-02-04 01:02:15","2023-02-04 01:02:15");
INSERT INTO tbl_residents VALUES("28","Natashia","Velez","Macasana","","1998-09-01","24","Female","Single","7","09123456789","2023-02-04 01:23:07","2023-02-09 11:54:26");
INSERT INTO tbl_residents VALUES("29","Fernando","Boe","Jumama","","1998-12-20","24","Male","Single","4","09123456789","2023-02-09 10:29:47","2023-02-09 10:29:47");
INSERT INTO tbl_residents VALUES("30","Mary Joy","Nabalacan","Tumama","","1996-12-15","26","Female","Married","8","09123456789","2023-02-09 12:24:57","2023-02-09 12:24:57");
INSERT INTO tbl_residents VALUES("31","Isagi","","Yoichi","","1997-09-20","25","Male","Single","3","09123456789","2023-03-12 16:54:43","2023-03-12 16:54:43");
INSERT INTO tbl_residents VALUES("32","Honey","Yamet","Labadon","","2000-01-20","23","Female","Single","11","09123456789","2023-03-12 17:03:52","2023-03-12 17:03:52");
INSERT INTO tbl_residents VALUES("33","Kimberly","Lastims","Manalo","","1998-06-06","24","Female","Married","6","09123456789","2023-03-12 16:46:04","2023-03-12 16:46:04");



CREATE TABLE `tbl_schedules` (
  `fc_id` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL DEFAULT 5,
  `sched_details` text NOT NULL,
  `start_date` date NOT NULL,
  KEY `fc_id` (`fc_id`,`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_schedules VALUES("001-2023","2","","2023-02-06");
INSERT INTO tbl_schedules VALUES("001-2023","3","","2023-02-20");
INSERT INTO tbl_schedules VALUES("002-2023","2","","2023-02-07");
INSERT INTO tbl_schedules VALUES("004-2023","2","","2023-02-08");
INSERT INTO tbl_schedules VALUES("003-2023","2","","2023-02-09");
INSERT INTO tbl_schedules VALUES("","2","","0000-00-00");
INSERT INTO tbl_schedules VALUES("","2","","0000-00-00");
INSERT INTO tbl_schedules VALUES("","1","","0000-00-00");
INSERT INTO tbl_schedules VALUES("005-2023","2","","2023-02-08");
INSERT INTO tbl_schedules VALUES("006-2023","2","","2023-02-10");
INSERT INTO tbl_schedules VALUES("006-2023","3","","2023-02-20");
INSERT INTO tbl_schedules VALUES("007-2023","1","","2023-02-17");
INSERT INTO tbl_schedules VALUES("007-2023","3","","2023-02-21");
INSERT INTO tbl_schedules VALUES("008-2023","1","","2023-02-16");
INSERT INTO tbl_schedules VALUES("009-2023","2","","2023-02-13");
INSERT INTO tbl_schedules VALUES("008-2023","2","","2023-02-27");
INSERT INTO tbl_schedules VALUES("012-2023","2","","2023-02-28");
INSERT INTO tbl_schedules VALUES("001-2023","4","","2023-02-28");
INSERT INTO tbl_schedules VALUES("002-2023","3","","2023-02-20");
INSERT INTO tbl_schedules VALUES("002-2023","4","","2023-02-28");
INSERT INTO tbl_schedules VALUES("010-2023","1","","2023-03-01");



CREATE TABLE `tbl_selected_lupon` (
  `sl_id` int(15) NOT NULL AUTO_INCREMENT,
  `lupon_id` int(15) NOT NULL,
  `fc_id` varchar(15) NOT NULL,
  `sl_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`sl_id`),
  KEY `lupon_id` (`lupon_id`,`fc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_selected_lupon VALUES("1","3","12","2023-02-01 10:30:18");
INSERT INTO tbl_selected_lupon VALUES("2","1","12","2023-02-01 10:30:18");
INSERT INTO tbl_selected_lupon VALUES("3","4","12","2023-02-01 10:30:18");
INSERT INTO tbl_selected_lupon VALUES("4","2","8","2023-02-01 10:02:34");
INSERT INTO tbl_selected_lupon VALUES("5","4","8","2023-02-01 10:02:34");
INSERT INTO tbl_selected_lupon VALUES("6","6","8","2023-02-01 10:02:34");
INSERT INTO tbl_selected_lupon VALUES("7","1","10","2023-02-01 10:04:56");
INSERT INTO tbl_selected_lupon VALUES("8","6","10","2023-02-01 10:04:56");
INSERT INTO tbl_selected_lupon VALUES("9","4","10","2023-02-01 10:04:56");
INSERT INTO tbl_selected_lupon VALUES("10","1","13","2023-02-01 10:06:20");
INSERT INTO tbl_selected_lupon VALUES("11","3","13","2023-02-01 10:06:20");
INSERT INTO tbl_selected_lupon VALUES("12","2","13","2023-02-01 10:06:20");
INSERT INTO tbl_selected_lupon VALUES("13","1","18","2023-02-01 10:15:08");
INSERT INTO tbl_selected_lupon VALUES("14","2","18","2023-02-01 10:15:08");
INSERT INTO tbl_selected_lupon VALUES("15","3","18","2023-02-01 10:15:08");
INSERT INTO tbl_selected_lupon VALUES("16","1","15","2023-02-01 10:15:52");
INSERT INTO tbl_selected_lupon VALUES("17","4","15","2023-02-01 10:15:52");
INSERT INTO tbl_selected_lupon VALUES("18","6","15","2023-02-01 10:15:52");
INSERT INTO tbl_selected_lupon VALUES("19","1","21","2023-02-03 00:13:02");
INSERT INTO tbl_selected_lupon VALUES("20","4","21","2023-02-03 00:13:02");
INSERT INTO tbl_selected_lupon VALUES("21","6","21","2023-02-03 00:13:02");
INSERT INTO tbl_selected_lupon VALUES("22","0","22","2023-02-03 01:05:59");
INSERT INTO tbl_selected_lupon VALUES("23","0","22","2023-02-03 01:05:59");
INSERT INTO tbl_selected_lupon VALUES("24","0","22","2023-02-03 01:05:59");
INSERT INTO tbl_selected_lupon VALUES("25","2","25","2023-02-03 01:15:22");
INSERT INTO tbl_selected_lupon VALUES("26","5","25","2023-02-03 01:15:22");
INSERT INTO tbl_selected_lupon VALUES("27","7","25","2023-02-03 01:15:22");
INSERT INTO tbl_selected_lupon VALUES("28","1","001-2023","2023-02-15 13:31:42");
INSERT INTO tbl_selected_lupon VALUES("29","5","001-2023","2023-02-15 13:31:42");
INSERT INTO tbl_selected_lupon VALUES("30","7","001-2023","2023-02-15 13:31:42");
INSERT INTO tbl_selected_lupon VALUES("31","3","002-2023","2023-02-15 13:33:50");
INSERT INTO tbl_selected_lupon VALUES("32","7","002-2023","2023-02-15 13:33:50");
INSERT INTO tbl_selected_lupon VALUES("33","11","002-2023","2023-02-15 13:33:50");



CREATE TABLE `tbl_status` (
  `status_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL,
  `status_description` text NOT NULL,
  `status_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_status VALUES("1","Ongoing","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-01-16 23:41:07");
INSERT INTO tbl_status VALUES("2","Mediated","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-01-16 23:41:07");
INSERT INTO tbl_status VALUES("3","Concelieted","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-01-16 23:41:07");
INSERT INTO tbl_status VALUES("4","Pending","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-01-16 23:41:07");
INSERT INTO tbl_status VALUES("5","Withdrawn","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-01-16 23:41:07");
INSERT INTO tbl_status VALUES("6","Dismissed","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-01-16 23:41:07");



CREATE TABLE `tbl_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lupon_id` int(11) NOT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `role` int(2) DEFAULT 0,
  `user_regDateTime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`user_id`),
  KEY `lupon_id` (`lupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_users VALUES("1","3","admin","password","1","2023-01-26 12:19:21");
INSERT INTO tbl_users VALUES("2","1","user","password","0","2023-01-26 12:19:24");
INSERT INTO tbl_users VALUES("3","5","bryan_bayani","password","0","2023-02-04 01:00:58");
INSERT INTO tbl_users VALUES("4","4","john_paul","password","0","2023-02-04 01:19:07");
INSERT INTO tbl_users VALUES("5","11","edgardo_colenaser","password","0","2023-02-09 12:46:28");
INSERT INTO tbl_users VALUES("6","7","joshua_mansan","password","0","2023-02-09 12:46:21");



CREATE TABLE `tbl_zone` (
  `zone_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(50) NOT NULL,
  `zone_description` text NOT NULL,
  `zone_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_zone VALUES("1","Accreation","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("2","Barra New Road","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("3","Barra Proper","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("4","Barra Riverside","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("5","Barra Shoreline","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("6","Cilrai","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("7","Mulmac","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("8","Parola","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("9","Piaping Itum","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("10","Piaping Puti","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("11","Punta","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("13","Purok 1","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-04 00:49:24");
INSERT INTO tbl_zone VALUES("14","Sample Zone 1","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed arcu non odio euismod lacinia at quis risus sed.","2023-02-09 10:40:59");

