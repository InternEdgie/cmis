

CREATE TABLE `tbl_citizenship` (
  `citizenship_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `citizenship_name` varchar(50) NOT NULL,
  `citizenship_description` text NOT NULL,
  `citizenship_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`citizenship_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_citizenship VALUES("1","Filipino","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Faucibus in ornare quam viverra orci sagittis eu.","2023-01-12 12:40:19");



CREATE TABLE `tbl_complaint_type` (
  `com_id` int(15) NOT NULL AUTO_INCREMENT,
  `com_name` varchar(100) NOT NULL,
  `com_details` text NOT NULL,
  `com_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO tbl_complaint_type VALUES("24","Rumors","Rumors","2023-01-09 19:28:50");
INSERT INTO tbl_complaint_type VALUES("25","Family Conflicts","Family Conflicts","2023-01-09 19:29:21");
INSERT INTO tbl_complaint_type VALUES("26","Noisy Neighbor","Noisy Neighbor","2023-01-09 19:00:58");
INSERT INTO tbl_complaint_type VALUES("27","Blackmail","Blackmain","2023-01-09 19:05:10");
INSERT INTO tbl_complaint_type VALUES("28","Hurtful Words","Hurtful Words","2023-01-27 11:27:18");
INSERT INTO tbl_complaint_type VALUES("29","Catcall","Catcall","2023-02-01 10:14:55");



CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(50) NOT NULL,
  `event_color` varchar(50) NOT NULL,
  `event_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_events VALUES("1","Notice of Hearing (1st Mediation)","#FFD700","2023-02-04 00:58:13");
INSERT INTO tbl_events VALUES("2","Notice of Hearing (2nd Mediation)","#FF8C00","2023-02-04 00:58:13");
INSERT INTO tbl_events VALUES("3","Notice of Hearing (Conciliation)","#FF0000","2023-02-04 00:58:13");



CREATE TABLE `tbl_file_complaint` (
  `fc_id` varchar(50) NOT NULL,
  `comp_id` int(15) NOT NULL,
  `resp_id` int(15) NOT NULL,
  `com_id` int(15) NOT NULL,
  `fc_statement` text NOT NULL,
  `status_id` tinyint(3) NOT NULL DEFAULT 1,
  `fc_type` tinyint(3) NOT NULL DEFAULT 0 COMMENT '[0] = Resident\r\n[1] = Non Resident',
  `fc_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `fc_moddatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`fc_id`),
  KEY `comp_id` (`comp_id`,`resp_id`,`com_id`,`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `tbl_invitation` (
  `inv_id` varchar(50) NOT NULL,
  `comp_id` int(15) NOT NULL,
  `resp_id` int(15) NOT NULL,
  `inv_statement` text NOT NULL,
  `inv_type` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0 = Resident ; 1 = Non-Resident',
  `inv_status` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0 = Ongoing ; 1 = Settled; 2 = Withdrawn; 3 = Summon',
  `inv_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `inv_moddatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_invitation VALUES("001-2023","24","15","","0","0","2023-08-12 17:01:22","2023-08-12 17:01:22");
INSERT INTO tbl_invitation VALUES("002-2023","9","27","","0","2","2023-08-12 17:11:30","2023-08-13 18:25:01");
INSERT INTO tbl_invitation VALUES("003-2023","34","1","","0","0","2023-08-13 17:38:49","2023-08-13 17:38:49");



CREATE TABLE `tbl_logs` (
  `log_id` int(50) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `log_action` text DEFAULT NULL,
  `log_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_logs VALUES("1","1","Logged In","2023-07-22 12:19:34");
INSERT INTO tbl_logs VALUES("2","1","Updated <b>Dog Bites</b> to <b>Dog Bitess</b>.","2023-07-22 14:12:50");
INSERT INTO tbl_logs VALUES("3","1","Updated <b>Dog Bitess</b> to <b>Dog Bites</b>.","2023-07-22 14:12:59");
INSERT INTO tbl_logs VALUES("4","1","Updated <b>Notice of Hearing (Conciliation)</b> to <b>Notice of Hearing (Conciliation1)</b>.","2023-07-22 14:24:05");
INSERT INTO tbl_logs VALUES("5","1","Updated <b>Notice of Hearing (Conciliation1)</b> to <b>Notice of Hearing (Conciliation)</b>.","2023-07-22 14:24:20");
INSERT INTO tbl_logs VALUES("6","1","Updated details of event: <b>Notice of Hearing (Conciliation)</b>.","2023-07-22 14:24:36");
INSERT INTO tbl_logs VALUES("7","1","Logged In","2023-08-12 11:09:53");
INSERT INTO tbl_logs VALUES("8","1","Added new invitation with Entry No: <b>001-2023</b>","2023-08-12 12:08:24");
INSERT INTO tbl_logs VALUES("9","1","Appointed a schedule for Entry No: <b>011-2023</b>","2023-08-12 12:12:59");
INSERT INTO tbl_logs VALUES("10","1","Filed new complaint with Entry No: <b>013-2023</b>","2023-08-12 14:54:03");
INSERT INTO tbl_logs VALUES("11","1","Added new invitation with Entry No: <b>001-2023</b>","2023-08-12 16:06:22");
INSERT INTO tbl_logs VALUES("12","1","Added new invitation with Entry No: <b>001-2023</b>","2023-08-12 16:10:48");
INSERT INTO tbl_logs VALUES("13","1","Appointed a schedule for Entry No: <b>001-2023</b>","2023-08-12 16:33:31");
INSERT INTO tbl_logs VALUES("14","1","Added new invitation with Entry No: <b>002-2023</b>","2023-08-12 16:51:43");
INSERT INTO tbl_logs VALUES("15","1","Added new invitation with Entry No: <b>003-2023</b>","2023-08-12 16:52:26");
INSERT INTO tbl_logs VALUES("16","1","Added new invitation with Entry No: <b>004-2023</b>","2023-08-12 16:52:50");
INSERT INTO tbl_logs VALUES("17","1","Added new invitation with Entry No: <b>005-2023</b>","2023-08-12 16:53:17");
INSERT INTO tbl_logs VALUES("18","1","Added new invitation with Entry No: <b>006-2023</b>","2023-08-12 16:53:38");
INSERT INTO tbl_logs VALUES("19","1","Added new invitation with Entry No: <b>007-2023</b>","2023-08-12 16:53:57");
INSERT INTO tbl_logs VALUES("20","1","Added new invitation with Entry No: <b>008-2023</b>","2023-08-12 16:58:58");
INSERT INTO tbl_logs VALUES("21","1","Added new invitation with Entry No: <b>009-2023</b>","2023-08-12 16:59:39");
INSERT INTO tbl_logs VALUES("22","1","Added new invitation with Entry No: <b>001-2023</b>","2023-08-12 17:01:22");
INSERT INTO tbl_logs VALUES("23","1","Added new invitation with Entry No: <b>002-2023</b>","2023-08-12 17:11:30");
INSERT INTO tbl_logs VALUES("24","1","Logged In","2023-08-13 12:20:22");
INSERT INTO tbl_logs VALUES("25","1","Added new invitation with Entry No: <b>003-2023</b>","2023-08-13 17:38:49");
INSERT INTO tbl_logs VALUES("26","1","Invitation No: 002-2023 - Changed status to Withdrawn","2023-08-13 18:25:01");



CREATE TABLE `tbl_lupon` (
  `lupon_id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `res_id` int(15) NOT NULL,
  `pos_id` int(15) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `lupon_regdatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`lupon_id`),
  KEY `res_id` (`res_id`,`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO tbl_lupon VALUES("16","21","2","1","2023-05-01 23:18:59");
INSERT INTO tbl_lupon VALUES("17","3","2","1","2023-05-01 22:59:13");
INSERT INTO tbl_lupon VALUES("18","44","2","1","2023-05-01 23:02:43");
INSERT INTO tbl_lupon VALUES("19","7","2","1","2023-05-01 23:12:53");



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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_non_residents VALUES("1","Crist","Blue","Brown","","1995-11-25","27","Male","1","Single","Zone","Barangay","City","Province","9000","09123456789","2023-01-03 20:31:35","2023-02-04 01:27:04");
INSERT INTO tbl_non_residents VALUES("2","Reynaldo","Lapira","Espinosa","Jr","1998-02-01","25","Male","1","Single","Zone","Barangay","City","Province","9000","09161970254","2023-01-09 18:47:59","2023-02-09 12:12:29");
INSERT INTO tbl_non_residents VALUES("3","Ivy","","Agua","","2000-05-23","22","Female","1","Single","Zone","Barangay","City","Province","9000","09123456789","2023-01-09 22:58:31","2023-05-01 19:29:21");
INSERT INTO tbl_non_residents VALUES("4","Kurt Ryan","Lasvegas","Pando","","1990-06-24","32","Male","1","Single","Zone 1","Barangay 23","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-24 13:40:07","2023-01-24 13:40:07");
INSERT INTO tbl_non_residents VALUES("5","Micheal","","Batok","","1995-06-27","27","Male","1","Single","Zone 4","Barangay 21","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-27 10:59:04","2023-01-27 10:59:04");
INSERT INTO tbl_non_residents VALUES("6","Leonardo","Balot","Macapagal","Jr","2004-01-31","19","Male","1","Single","Zone 2","Barangay 22","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-31 16:35:06","2023-01-31 16:46:58");
INSERT INTO tbl_non_residents VALUES("7","Nancy","Lavega","Gabot","","1995-07-31","27","Female","1","Married","Zone 3","Barangay 23","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-31 16:37:20","2023-01-31 16:48:28");
INSERT INTO tbl_non_residents VALUES("8","Messy Babe","","Montero","","1990-05-24","32","Female","1","Single","Zone 1","Barangay 19","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-01-31 16:53:10","2023-01-31 16:53:10");
INSERT INTO tbl_non_residents VALUES("9","Mary Princess","Aguilar","Ocampo","","2000-05-20","22","Female","1","Single","Zone 1","Barangay 30","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-02-03 01:02:37","2023-02-03 01:02:37");
INSERT INTO tbl_non_residents VALUES("10","Xander","","Bord","","1990-01-20","33","Male","1","Single","Zone 3","Barangay 11","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-02-04 00:36:13","2023-02-04 00:36:13");
INSERT INTO tbl_non_residents VALUES("11","Ovaltine","","Nido","","2000-09-01","22","Male","1","Single","Zone 1 ","Barangay 11","Cagayan de Oro City","Misamis Oriental","9000","09123456789","2023-02-09 12:00:13","2023-02-09 12:00:13");
INSERT INTO tbl_non_residents VALUES("12","Chaplain","","Down","","2023-05-03","0","Male","1","Single","Zone 2","Barangay 3","Cagayan de Oro City","Misamis Oriental","9000","09231231233","2023-05-01 19:11:37","2023-05-01 19:11:37");
INSERT INTO tbl_non_residents VALUES("13","Jonquil","","Widget","","1997-05-02","25","Female","1","Married","Zone 2","Barangay 3","Cagayan de Oro City","Misamis Oriental","9000","09670089023","2023-05-01 19:16:19","2023-05-01 19:16:19");
INSERT INTO tbl_non_residents VALUES("14","Manuel","Doe","Meringue","","1990-12-13","32","Male","1","Single","Zone1","Barangay 1","Cagayan de Oro City","Misamis Oriental","9000","09129982657","2023-05-01 19:20:37","2023-05-01 19:20:37");



CREATE TABLE `tbl_positions` (
  `pos_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(50) DEFAULT NULL,
  `pos_description` text NOT NULL,
  `pos_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_positions VALUES("1","Administrator","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("2","Lupon Member","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("3","Chairman","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("4","Secretary","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");
INSERT INTO tbl_positions VALUES("5","Barangay Captain","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac sollicitudin lorem, consectetur gravida neque. Sed convallis, erat eget fermentum convallis, mi dolor imperdiet ligula, sed vehicula risus tellus ut nibh. In et felis ex.","2023-03-08 13:58:25");



CREATE TABLE `tbl_remarks` (
  `remark_id` int(11) NOT NULL AUTO_INCREMENT,
  `remark_name` varchar(50) NOT NULL,
  `remark_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`remark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO tbl_residents VALUES("15","Christian","Macabalag","Balat","","1987-02-01","36","Male","Single","3","09251925543","2023-01-09 23:27:24","2023-05-01 19:28:56");
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
INSERT INTO tbl_residents VALUES("34","Dianne","De Castro","Mondover","","2000-02-02","23","Female","Single","3","09123451123","2023-05-01 18:14:32","2023-05-01 18:14:32");
INSERT INTO tbl_residents VALUES("35","Cecil","Doe","Ravenclaw","","1987-05-22","35","Female","Married","11","09659982345","2023-05-01 18:16:29","2023-05-01 18:32:24");
INSERT INTO tbl_residents VALUES("36","Brian","","Séchen","","1999-02-20","24","Male","Single","9","09231231233","2023-05-01 18:54:06","2023-05-01 18:54:06");
INSERT INTO tbl_residents VALUES("37","Jake","","Doe","","1980-01-25","43","Male","Married","7","09123123121","2023-05-01 23:02:43","2023-05-01 23:08:46");



CREATE TABLE `tbl_schedules` (
  `fc_id` varchar(50) NOT NULL,
  `event_id` int(11) NOT NULL DEFAULT 0,
  `sched_details` text NOT NULL,
  `start_date` date NOT NULL,
  `sched_type` tinyint(3) NOT NULL DEFAULT 0 COMMENT '0 = Summon; 1 = Invitation',
  `remarks` tinyint(6) NOT NULL DEFAULT 0,
  KEY `fc_id` (`fc_id`,`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_schedules VALUES("001-2023","0","Invitation","2023-08-22","1","0");
INSERT INTO tbl_schedules VALUES("002-2023","0","asd","2023-08-12","1","0");
INSERT INTO tbl_schedules VALUES("003-2023","0","Hello","2023-08-14","1","0");



CREATE TABLE `tbl_selected_lupon` (
  `sl_id` int(15) NOT NULL AUTO_INCREMENT,
  `lupon_id` int(15) NOT NULL,
  `fc_id` varchar(15) NOT NULL,
  `sl_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`sl_id`),
  KEY `lupon_id` (`lupon_id`,`fc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `tbl_status` (
  `status_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL,
  `status_description` text NOT NULL,
  `status_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_users VALUES("1","3","admin","password","1","2023-01-26 12:19:21");



CREATE TABLE `tbl_zone` (
  `zone_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(50) NOT NULL,
  `zone_description` text NOT NULL,
  `zone_regdatetime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

