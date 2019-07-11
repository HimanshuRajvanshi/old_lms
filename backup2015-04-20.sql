DROP TABLE IF EXISTS balance;

CREATE TABLE `balance` (
  `balid` int(11) unsigned NOT NULL auto_increment,
  `empid` int(11) unsigned NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `balance` decimal(5,2) NOT NULL,
  `availed` decimal(5,2) NOT NULL,
  PRIMARY KEY  (`balid`),
  UNIQUE KEY `empid_2` (`empid`),
  KEY `empid` (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=307 DEFAULT CHARSET=latin1;

INSERT INTO balance VALUES("290","49","25.78","24.78","1.00");
INSERT INTO balance VALUES("289","48","44.20","44.20","0.00");
INSERT INTO balance VALUES("288","46","17.50","17.50","0.00");
INSERT INTO balance VALUES("287","44","28.80","9.80","19.00");
INSERT INTO balance VALUES("286","43","18.00","18.00","0.00");
INSERT INTO balance VALUES("285","42","35.40","35.40","0.00");
INSERT INTO balance VALUES("284","40","28.80","23.30","5.50");
INSERT INTO balance VALUES("283","39","27.20","25.20","2.00");
INSERT INTO balance VALUES("282","38","48.60","47.10","1.50");
INSERT INTO balance VALUES("281","37","30.63","24.13","6.50");
INSERT INTO balance VALUES("280","36","32.30","20.80","11.50");
INSERT INTO balance VALUES("279","35","18.70","17.20","1.50");
INSERT INTO balance VALUES("278","34","23.70","23.20","0.50");
INSERT INTO balance VALUES("277","33","27.00","27.00","0.00");
INSERT INTO balance VALUES("276","32","14.70","11.20","3.50");
INSERT INTO balance VALUES("275","31","46.40","34.40","12.00");
INSERT INTO balance VALUES("274","30","23.20","20.20","3.00");
INSERT INTO balance VALUES("273","29","17.80","16.30","1.50");
INSERT INTO balance VALUES("272","28","10.20","4.20","6.00");
INSERT INTO balance VALUES("271","27","54.00","38.00","16.00");
INSERT INTO balance VALUES("270","26","41.80","38.80","3.00");
INSERT INTO balance VALUES("269","25","40.80","32.80","8.00");
INSERT INTO balance VALUES("268","24","25.20","23.70","1.50");
INSERT INTO balance VALUES("267","23","29.00","28.00","1.00");
INSERT INTO balance VALUES("266","22","22.20","18.20","4.00");
INSERT INTO balance VALUES("265","21","35.20","29.20","6.00");
INSERT INTO balance VALUES("264","20","17.20","15.20","2.00");
INSERT INTO balance VALUES("263","19","21.70","19.70","2.00");
INSERT INTO balance VALUES("262","18","21.20","21.20","0.00");
INSERT INTO balance VALUES("261","17","32.20","29.20","3.00");
INSERT INTO balance VALUES("260","16","37.20","35.20","2.00");
INSERT INTO balance VALUES("259","15","27.40","27.40","0.00");
INSERT INTO balance VALUES("258","14","37.20","35.20","2.00");
INSERT INTO balance VALUES("257","12","37.20","31.20","6.00");
INSERT INTO balance VALUES("256","11","50.90","40.40","10.50");
INSERT INTO balance VALUES("291","50","13.20","6.70","6.50");
INSERT INTO balance VALUES("292","51","11.70","10.70","1.00");
INSERT INTO balance VALUES("293","52","11.20","11.20","0.00");
INSERT INTO balance VALUES("294","53","14.20","3.20","11.00");
INSERT INTO balance VALUES("295","54","11.00","11.00","0.00");
INSERT INTO balance VALUES("296","55","7.20","0.20","7.00");
INSERT INTO balance VALUES("297","56","12.20","11.20","1.00");
INSERT INTO balance VALUES("298","57","7.70","6.20","1.50");
INSERT INTO balance VALUES("299","58","4.92","-2.08","7.00");
INSERT INTO balance VALUES("300","59","35.40","35.40","0.00");
INSERT INTO balance VALUES("301","60","35.40","35.40","0.00");
INSERT INTO balance VALUES("302","61","2.64","0.64","2.00");
INSERT INTO balance VALUES("303","62","1.98","-0.02","2.00");
INSERT INTO balance VALUES("304","63","1.98","0.48","1.50");
INSERT INTO balance VALUES("305","64","0.66","-0.34","1.00");
INSERT INTO balance VALUES("306","65","0.66","0.66","0.00");



DROP TABLE IF EXISTS books;

CREATE TABLE `books` (
  `bookid` int(11) unsigned NOT NULL auto_increment,
  `bookname` text NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`bookid`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

INSERT INTO books VALUES("28","CSS - The Definitive Guide","2014-02-07 14:26:20");
INSERT INTO books VALUES("29","UML Toolkit","2014-02-07 14:26:33");
INSERT INTO books VALUES("30","Struts 2 for Beginners","2014-02-07 14:27:05");
INSERT INTO books VALUES("31","Hibernate","2014-02-07 14:27:16");
INSERT INTO books VALUES("32","Spring Framework 2","2014-02-07 14:27:28");
INSERT INTO books VALUES("33","Java SCJP","2014-02-07 14:27:40");
INSERT INTO books VALUES("34","Java 6 Programming - Black Book","2014-02-07 14:27:58");
INSERT INTO books VALUES("35","Head First Java","2014-02-07 14:28:10");
INSERT INTO books VALUES("36","Head First Servlets and JSP","2014-02-07 14:28:27");
INSERT INTO books VALUES("37","SQL, PL/SQL","2014-02-07 14:28:47");
INSERT INTO books VALUES("38","Definitive Guide to iReport-1","2014-02-07 14:29:08");
INSERT INTO books VALUES("39","Definitive Guide to iReport-2","2014-02-07 14:29:24");



DROP TABLE IF EXISTS datacard;

CREATE TABLE `datacard` (
  `datacardid` int(11) unsigned NOT NULL auto_increment,
  `datacardname` text NOT NULL,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`datacardid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO datacard VALUES("14","Tata Photon 2","2014-02-05 11:41:23");
INSERT INTO datacard VALUES("13","Tata Photon 1","2014-02-04 15:35:30");



DROP TABLE IF EXISTS department;

CREATE TABLE `department` (
  `depid` int(11) unsigned NOT NULL auto_increment,
  `depname` varchar(200) NOT NULL,
  PRIMARY KEY  (`depid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO department VALUES("1","Development");
INSERT INTO department VALUES("2","Testing");
INSERT INTO department VALUES("3","GUI");
INSERT INTO department VALUES("4","Business Analysis");
INSERT INTO department VALUES("5","Reports");
INSERT INTO department VALUES("6","Admin/HR");
INSERT INTO department VALUES("7","Management");
INSERT INTO department VALUES("8","IT/Network");
INSERT INTO department VALUES("9","DBA");



DROP TABLE IF EXISTS docs;

CREATE TABLE `docs` (
  `docid` int(11) unsigned NOT NULL auto_increment,
  `empid` int(11) NOT NULL,
  `doctype` varchar(100) NOT NULL,
  `document` varchar(200) NOT NULL,
  PRIMARY KEY  (`docid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO docs VALUES("2","12","pancard","840750pan.jpg");
INSERT INTO docs VALUES("3","53","PAN Card","244576SHALINI .jpg");
INSERT INTO docs VALUES("4","17","PAN Card","179686Sangeeta-PanCard.jpg");
INSERT INTO docs VALUES("5","17","Passport","161965SANGEETA DWIVEDI (PASSPORT).jpg");
INSERT INTO docs VALUES("6","39","Passport","932736passport2.jpg");
INSERT INTO docs VALUES("7","21","PAN Card","18386Dilip Pan Card.jpg");
INSERT INTO docs VALUES("8","51","PAN Card","622936passportsize.jpg");
INSERT INTO docs VALUES("9","18","PAN Card","33581Pan_Card_0011.jpg");
INSERT INTO docs VALUES("10","18","Voter Card","352373Sunil 001.jpg");
INSERT INTO docs VALUES("11","29","PAN Card","374214Picture 037.jpg");
INSERT INTO docs VALUES("12","56","Passport","662935Passport.jpg");
INSERT INTO docs VALUES("13","56","PAN Card","6347Pan Card.jpg");
INSERT INTO docs VALUES("14","56","Aadhar Card","12463adhaar.jpg");
INSERT INTO docs VALUES("15","44","PAN Card","408623PAN (1).jpg");
INSERT INTO docs VALUES("16","51","PAN Card","508524Page1.jpg");
INSERT INTO docs VALUES("17","50","PAN Card","211462Page1.jpg");
INSERT INTO docs VALUES("18","58","PAN Card","84514pancrd1.jpg");
INSERT INTO docs VALUES("19","58","PAN Card","499210pancrd2.jpg");
INSERT INTO docs VALUES("20","56","Voter Card","433356Voter Card.jpg");
INSERT INTO docs VALUES("21","19","PAN Card","172617PanCard.jpg");
INSERT INTO docs VALUES("22","19","Aadhar Card","400410eaadhaar-card.jpg");
INSERT INTO docs VALUES("23","34","Aadhar Card","8722aadharcard.png");
INSERT INTO docs VALUES("24","61","Aadhar Card","39007312 001.jpg");
INSERT INTO docs VALUES("25","30","Aadhar Card","175595AAdhar.png");



DROP TABLE IF EXISTS employee;

CREATE TABLE `employee` (
  `empid` int(11) unsigned NOT NULL auto_increment,
  `empcode` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `doj` datetime NOT NULL,
  `supemail` varchar(100) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `coraddress` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `emergencyno` varchar(20) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `dob` datetime NOT NULL,
  `photo` varchar(200) NOT NULL,
  `department` int(11) unsigned NOT NULL,
  `status` varchar(255) NOT NULL,
  `userstatus` varchar(100) NOT NULL default 'active',
  PRIMARY KEY  (`empid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`),
  KEY `department` (`department`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

INSERT INTO employee VALUES("11","","0","Roopa","4ba7be0bae8d91b1014cda8b8ffb93cb","2012-06-15 00:00:00","gmitra@trilasoft.com","Roopa","Chauarasia","rchaurasia@trilasoft.com","M-20, SF-3, Pratap Vihar,\nVijay Nagar, Ghaziabad.-102009","","9555514008","9555703353","Asst. Manager-HR","1983-12-09 00:00:00","","6","conf","inactive");
INSERT INTO employee VALUES("12","TS032","3","rbanerjee","06750459c90710966689499551dabc07","2008-11-26 00:00:00","gmitra@trilasoft.com","Rahul","Banerjee","rbanerjee@trilasoft.com","46-b, pocket-b, vikaspuri extn. new delhi","46-b, pocket-b, vikaspuri extn. new delhi","9810479108","9958937057","GUI Lead","1978-08-18 00:00:00","180696mypic.jpg","3","conf","active");
INSERT INTO employee VALUES("14","TS/022","4","gmitra","0339ea2eb7f5f5f818d4166c8e4decb2","2008-02-01 00:00:00","rjain@redskymobility.com","Giten","Mitra","gmitra@trilasoft.com","927, Riverbights Apartment, Rajnagar Extn, Ghaziabad, U.P","927, Riverbights Apartment, Rajnagar Extn, Ghaziabad, U.P","9818124114","8800644114","Project Manager","1975-01-16 00:00:00","238537giten.jpg","6","conf","active");
INSERT INTO employee VALUES("15","TS/087","2","ssrivastava","cc03e747a6afbbcbf8be7668acfebee5","2012-05-01 00:00:00","amishra@trilasoft.com","Surya Prakash","Srivastava","ssrivastava@trilasoft.com","C-10 Rana Niwas, Gali no 10\n Pratap Nagar Mayur Vihar Phase 1\nNew Delhi","C-10 Rana Niwas, Gali no 10\n Pratap Nagar Mayur Vihar Phase 1\nNew Delhi","8745879989","7388144067","Sr. Software Engineer","1986-08-07 00:00:00","323531111.jpg","1","conf","inactive");
INSERT INTO employee VALUES("16","TS/02","2","mkashyap","202cb962ac59075b964b07152d234b70","2007-05-14 00:00:00","gmitra@trilasoft.com","Mamta","Kumar","mkashyap@trilasoft.com","Flat No - 268, M.I.G Flats ,  Prasad Nagar , New Delhi","Flat No - 268, M.I.G Flats ,  Prasad Nagar , New Delhi","01120300268","9891941093","Business Analyst","1982-11-04 00:00:00","916505D1-1.jpg","4","conf","active");
INSERT INTO employee VALUES("17","TS/05","3","sdwivedi","53e4b726be6b228f12016784213aaed1","2007-06-01 00:00:00","gmitra@trilasoft.com","Sangeeta","Dwivedi","sdwivedi@trilasoft.com","WZ - 161 Dashghara , New Delhi - 110012","WZ - 161 Dashghara , New Delhi - 110012","9871291711","9968236236","Module Lead","1973-12-14 00:00:00","305692Sangeeta-Photo.jpg","5","conf","active");
INSERT INTO employee VALUES("18","TS/06","3","ssingh","205d4a49f3934fca68012b87c8e839ae","2007-06-01 00:00:00","gmitra@trilasoft.com","Sunil Kumar","Singh","ssingh@trilasoft.com","Flat No - 769 , Sector - 37 , Noida U.P","Flat No - 769 , Sector - 37 , Noida U.P","9911674085","9990434606","Module Lead","1982-02-14 00:00:00","524968IMG_20141105_143557605[1].jpg","1","conf","active");
INSERT INTO employee VALUES("19","TS/013","2","adash","7407408ede3cb173d85de9aae513f2ed","2007-09-17 00:00:00","rbanerjee@trilasoft.com","Arabinda","Dash","adash@trilasoft.com","F-204, Kataria  Sarai, Hauz Khas, New Delhi- 16","F-204, Kataria  Sarai, Hauz Khas, New Delhi- 16","9891692769","9971219416","Sr. GUI","1976-10-05 00:00:00","993771arbind.jpg","3","conf","active");
INSERT INTO employee VALUES("20","TS/018","3","amishra","ca43feecd3306f92a737c0aff812890b","2007-11-27 00:00:00","gmitra@trilasoft.com","Ashish","Mishra","amishra@trilasoft.com","863 - Sector 37, Noida","863 - Sector 37, Noida","9560226060","9415510992","Module Lead","1983-01-15 00:00:00","651112IMG_5108.jpg","1","conf","active");
INSERT INTO employee VALUES("21","TS/049","3","dkumar","56d2755ee8bd3e16db4c9e41f07c6a12","2010-09-08 00:00:00","amishra@trilasoft.com","Dilip","Kumar","dkumar@trilasoft.com","325/2A , Saraswati Gali , Budha Marg, Mandawali ,     \nDelhi - 92","325/2A , Saraswati Gali , Budha Marg, Mandawali ,     \nDelhi - 92","9891657253","9015021458","Sr. Software Engineer","1984-01-30 00:00:00","818897myPhoto.jpeg","1","conf","active");
INSERT INTO employee VALUES("22","TS/054","3","mgaur","37821c2dead3d671471f0b13a9ccfe82","2010-12-01 00:00:00","gmitra@trilasoft.com","Manish Kumar","Gaur","mgaur@trilasoft.com","Rz 7/2 806 A, Gali No 5, Main Sagarpur, Delhi - 46","Rz 7/2 806 A, Gali No 5, Main Sagarpur, Delhi - 46","8826019601","9001255320","Sr. QA Engineer","1987-01-10 00:00:00","464778514995photo.jpg","2","conf","active");
INSERT INTO employee VALUES("23","","2","rbalaji","4e994cac57e98608bb5f1b3eed440432","2010-12-16 00:00:00","mkhepran@trilasoft.com","Rajesh","Balaji","rbalaji@trilasoft.com","D - 237 Sarojni Nagar , Delhi - 110023","","9953390229","9958154349","Sr. QA engineer/BA","1987-07-03 00:00:00","","2","conf","inactive");
INSERT INTO employee VALUES("24","TS/062","3","ssandha","a248f0d841321eda1bb673048d99ee76","2011-03-01 00:00:00","ssingh@trilasoft.com","Subrat Kumar","Sandha","ssandha@trilasoft.com","57D , DDA Flats , Pandav Nagar, Shadipur , New Delhi","57D , DDA Flats , Pandav Nagar, Shadipur , New Delhi","9013787669","9555937109","Sr. Software Engineer","1985-03-14 00:00:00","496971427631photo.jpg","1","conf","inactive");
INSERT INTO employee VALUES("25","","3","gverma","e8851f05451f515c94d1eb4bd4701277","2012-03-01 00:00:00","gmitra@trilasoft.com","Gautam","Verma","gverma@trilasoft.com","C/O Pawan Medical Store, G.T Road, Bus Stand","","9911787453","9990780948","Module Lead","1985-01-03 00:00:00","","1","conf","inactive");
INSERT INTO employee VALUES("26","","2","tpant","52e9afe73350fd9be24d9d5d37af4212","2011-12-01 00:00:00","sdwivedi@trilasoft.com","Tarun","Pant","tpant@trilasoft.com","Hans Enclave, Near Rajiv chauk , Gurgaon","","9911892744","9911892744","Software Engineer","1988-12-17 00:00:00","","5","prob","active");
INSERT INTO employee VALUES("27","","2","karora","303dbd7585d295193ceef24c906b7f9e","2011-06-22 00:00:00","mkhepran@trilasoft.com","Karishma","Arora","karora@trilasoft.com","5776, St No 14, Balbir Nagar Shahadra Delhi - 82","","9210714148","8506007771","QA Engineer","1981-12-11 00:00:00","","2","conf","inactive");
INSERT INTO employee VALUES("28","TS/068","2","rchandra","1bf6f67413cd1b951f1d36fa65345d9b","2011-08-01 00:00:00","ssingh@trilasoft.com","Ravi","Chandra","rchandra@trilasoft.com","C - 208 , 3rd Floor , Pandav Nagar , Opposite Mother Dairy , Delhi - 92","C - 208 , 3rd Floor , Pandav Nagar , Opposite Mother Dairy , Delhi - 92","9999505979","9871343727","Software Engineer","1978-07-30 00:00:00","397677ravi-pasport1.jpg","1","conf","active");
INSERT INTO employee VALUES("29","TS/068","2","kkumar","bba53f327bfb25305dc3618e30439aeb","2011-08-25 00:00:00","dkumar@trilasoft.com","Kundan","Kumar","kkumar@trilasoft.com","D - 43, Shakarpur, New Delhi - 110092","D - 43, Shakarpur, New Delhi - 110092","9868718636","9560061374","Software Engineer","1984-08-21 00:00:00","161289photo.jpg","1","conf","active");
INSERT INTO employee VALUES("30","TS/074","2","pray","639ee02cb4f0cd1415da0ad0dff8623d","2011-09-26 00:00:00","gmitra@trilasoft.com","Pramod Kumar","Ray","pray@trilasoft.com","A - 22, Gali No - 6, West Vinod Nagar, New Delhi","A - 22, Gali No - 6, West Vinod Nagar, New Delhi","9873797161","9971990570","Sr. System Administrator","1982-04-01 00:00:00","754452pramod1.jpg","8","conf","active");
INSERT INTO employee VALUES("31","","3","mkhepran","1fe2afe45c0f4547cb70737f2c6bff20","2011-12-12 00:00:00","gmitra@trilasoft.com","Mukesh Kumar","Khepran","mkhepran@trilasoft.com","C - 34, NTPC, Ghaziabad U.P","C - 34, NTPC, Ghaziabad U.P","8587067872","8585960765","Test Lead","1981-11-02 00:00:00","570569a.png","2","conf","inactive");
INSERT INTO employee VALUES("32","TS/079","2","tshivajee","9bbb03ccc5ed26ca944af7cc78dc81e8","2011-12-15 00:00:00","sdwivedi@trilasoft.com","Tej Bahadur","Shivajee","tshivajee@trilasoft.com","S - 383 , 2nd Floor , Flat No - SF1 , School Block , Shakarpur , New Delhi - 110092","S - 383 , 2nd Floor , Flat No - SF1 , School Block , Shakarpur , New Delhi - 110092","9210325868","9810009795","Software Engineer","1983-12-19 00:00:00","478359shiva.jpg","5","conf","active");
INSERT INTO employee VALUES("33","","2","amohanty","7945ff32978d89dc5ecdc23a44251700","2012-12-28 00:00:00","ssingh@trilasoft.com","Ashis Kumar","Mohanty","amohanty@trilasoft.com","B1 - 213, Yamuna Vihar, Delhi - 110053","","9873396355","9968876327","Software Engineer","1985-07-02 00:00:00","","1","conf","inactive");
INSERT INTO employee VALUES("34","TS/083","2","nkumar","16d7a4fca7442dda3ad93c9a726597e4","2012-02-21 00:00:00","gmitra@trilasoft.com","Naveen","Kumar","nkumar@trilasoft.com","SH/A - 336 , Shashtri Nagar , Ghaziabad","SH/A - 336 , Shashtri Nagar , Ghaziabad","9990423776","9818078387","DBA","1989-08-03 00:00:00","720210599110_480706008611796_1289185715_n.jpg","9","conf","active");
INSERT INTO employee VALUES("35","TS/104","3","ygautam","34fb382763a18c3674530a8b110abde3","2012-03-12 00:00:00","gmitra@trilasoft.com","Yogesh Kumar","Gautam","ykumar@trilasoft.com","118 , New Arya Nagar , Patel Nagar , Meerut Road , Ghaziabad - 201001","118 , New Arya Nagar , Patel Nagar , Meerut Road , Ghaziabad - 201001","9811456099","8802789157","QA Engineer","1981-05-21 00:00:00","536920yogesh.jpg","2","conf","active");
INSERT INTO employee VALUES("36","","2","kgupta","81dc9bdb52d04dc20036dbd8313ed055","2012-06-14 00:00:00","mkhepran@trilasoft.com","Khushboo","Gupta","kgupta@trilasoft.com","C- 254, New Ashok Nagar , Delhi - 6","","9716803525","9719614289","QA Engineer","1989-02-08 00:00:00","","2","conf","inactive");
INSERT INTO employee VALUES("37","","2","vtyagi","b52cb4d50467af65d9b5ba2fa43da863","2012-07-30 00:00:00","gmitra@trilasoft.com","Vishu","Tyagi","vtyagi@trilasoft.com","4D/3 , 3rd Floor Old Rajinder Nagar, New Delhi - 110060","","9654397652","9410391524","Business Analyst","1987-03-20 00:00:00","","4","conf","inactive");
INSERT INTO employee VALUES("38","","2","dmaurya","f16157427450da16a7c6d7ce2254c38b","2012-04-12 00:00:00","ssingh@trilasoft.com","Dileep Kumar","Maurya","dmaurya@trilasoft.com","B - 154, Noida SEC - 14","","9560160208","9001139033","Software Engineer","1984-07-10 00:00:00","","1","conf","inactive");
INSERT INTO employee VALUES("39","TS/094","2","kkapoor","a3a8fc5e79bc6cab3fc1d92781dbb734","2012-09-10 00:00:00","gmitra@trilasoft.com","Kush","Kapoor","kkapoor@trilasoft.com","HP 27 - C Maurya Enclave Pitampura - New Delhi","HP 27 - C Maurya Enclave Pitampura - New Delhi","9891263314","9136135615","QA Engineer","1988-12-22 00:00:00","713250vx.jpg","2","conf","active");
INSERT INTO employee VALUES("40","","2","rgoyal","eb9e92762ad27158843e6eacf6e95180","2013-03-04 00:00:00","gmitra@trilasoft.com","Rahul","Goyal","rgoyal@trilasoft.com","J 4/13 , Back Side , 2nd Floor , Khidki Extn , Malviya Nagar , New Delhi - 17","","9891799252","9319154510","Business Analyst","1985-09-10 00:00:00","","4","conf","inactive");
INSERT INTO employee VALUES("46","","4","pmishra","0933050b49bd52a614dbe6ee90b5d072","2013-04-08 00:00:00","sawasthi@trilasoft.com","Poonam","Mishra","pmishra@trilasoft.com","J - 796, Kali Badi Marg,\nNew Delhi","","9971390142","9953214994","Office Assistant","1990-07-14 00:00:00","","6","prob","inactive");
INSERT INTO employee VALUES("44","","2","kssaxena","e20d22c48f4bbe42644bfc9750260534","2013-04-01 00:00:00","gmitra@trilasoft.com","Kshruty","Saxena","kssaxena@trilasoft.com","G-99, B, Ramesh Nagar\nNew Delhi","Flat no. 491 The excellence apartment Dwarka Sector -18","7506388648","9891336945","Business Analyst","1985-11-25 00:00:00","715552again.jpg","4","conf","");
INSERT INTO employee VALUES("42","","4","rjain","42a02102ded5546119a4e2310b6d6934","2007-06-01 00:00:00","rjain@redskymobility.com","Rajeev","Jain","","aa","","1","1","Director","1961-05-21 00:00:00","","7","conf","active");
INSERT INTO employee VALUES("58","TS/105","2","srajkhowa","3cd2c3a42d775d46da1b96163acd083a","2014-08-19 00:00:00","gmitra@trilasoft.com","Sukanya","Rajkhowa","srajkhowa@trilasoft.com","B -27 / F1 first floor , Freedom Fighter enclave, Gate no -3 Neb Sarai 110068","B -27 / F1 first floor , Freedom Fighter enclave, Gate no -3 Neb Sarai 110068","9953297223","9654179223","QA Enfgineer Cum Business Analyst","1987-10-27 00:00:00","13653501.jpg","2","conf","active");
INSERT INTO employee VALUES("48","","2","testuser","098f6bcd4621d373cade4e832627b4f6","0000-00-00 00:00:00","rbanerjee@trilasoft.com","Test","User","rahulorama@gmail.com","a","","a","a","a","0000-00-00 00:00:00","620724Winter Leaves.jpg","3","conf","inactive");
INSERT INTO employee VALUES("57","TS/104","2","vawasthi","d8578edf8458ce06fbc5bb76a58c5ca4","2013-12-16 00:00:00","gmitra@trilasoft.com","Vaibhav","Awasthi","vawasthi@trilasoft.com","Flat no- 726, Top Floor Sector -37\n\nNoida -201301","Flat no- 726, Top Floor Sector -37\n\nNoida -201301","7838586734","9838811888","Business Analyst","1990-06-26 00:00:00","298283Untitled.jpg","4","conf","inactive");
INSERT INTO employee VALUES("50","TS/099","2","kkunal","50fdba900924b0a9714882278abe1e44","2013-07-02 00:00:00","dkumar@trilasoft.com","Kishore","Kunal","kkunal@trilasoft.com","kishore kunal\nS/O Mahendra Prasad Sharma,Sharda Ashram,West of Court Station,Jehanabad\n kishore kunal: PinCode:-804408","kishore kunal: U-3,Shakarpur Main market Road,Shakarpur,Delhi-92","7503706620","9934698160","Software Engineer","1988-02-25 00:00:00","475150DSC_0008.JPG","1","conf","active");
INSERT INTO employee VALUES("51","TS/98","2","asingh","62944b7545f4338aa219ad78d2617e2d","2013-07-01 00:00:00","dkumar@trilasoft.com","Abhishek","kumar singh","asingh@trilasoft.com","B 43/21 Sanjay Apartment cotton Mil,\nChoka Ghat Varanasi \nPin code -221002","G1/265 1st Floor Dalmill Road, \nUttam Nagar West \nPin code - 110059","8882938404","8882938404","Software Engineer","1987-06-08 00:00:00","196895passportsize.jpg","1","conf","active");
INSERT INTO employee VALUES("52","TS/100","2","achakraborty","1bb4efa0378e3c3a179bcc3565d6efd1","2013-10-01 00:00:00","gmitra@trilasoft.com","Arunima","Chakraborty","achakraborty@trilasoft.com","Flat no 909, Roby - 1 , Gardenia Glamour, Sector - 3 ,Vasundhra, Ghaziabad (up)- 201010","Flat no 909, Roby - 1 , Gardenia Glamour, Sector - 3 ,Vasundhra, Ghaziabad (up)- 201010","09038585948","9711061963","QA Engineer","1985-09-13 00:00:00","463913aa.jpg","2","conf","active");
INSERT INTO employee VALUES("53","TS/101","4","sawasthi","7eccda006d08768301799911b5c98e33","2013-11-18 00:00:00","gmitra@trilasoft.com","Shalini","Awasthi","sawasthi@trilasoft.com","119/30 Type-II, Parichha Jhansi\nPin-284305","12/6 2nd Floor East Patel Nagar New Delhi -110008","9833718507","9833718532","Manager-Human Resources","2013-10-01 00:00:00","82699324e5ef1.jpg","6","conf","active");
INSERT INTO employee VALUES("54","","2","ibatra","3cd2c3a42d775d46da1b96163acd083a","2013-12-10 00:00:00","sawasthi@trilasoft.com","Indu","Batra","ibatra@trilasoft.com","T-2391,Faiz Road \nKarol Bagh \nNew Delhi.\nPin -110005","","8447399484","9873839198","Office Coodinator","1986-08-01 00:00:00","","6","prob","inactive");
INSERT INTO employee VALUES("55","TS/102","4","gautam","3cd2c3a42d775d46da1b96163acd083a","2013-12-20 00:00:00","sawasthi@trilasoft.com","Gautam","Kumar","gkumar@trilasoft.com","43/1 Golden enclave Part 1 Najafgarh New Delhi -110043","43/1 Golden enclave Part 1 Najafgarh New Delhi -110043","8743999031","8809458135","Office Coodinator","1990-06-08 00:00:00","513641GAUTAM_1.jpg","6","conf","active");
INSERT INTO employee VALUES("56","TS/103","2","msinha","a0033bf4765d7341c3fef95ff0e11dfe","2014-01-27 00:00:00","gmitra@trilasoft.com","Mintu","Sinha","msinha@trilasoft.com","H.N. 1159 , C/12 Main Road GovindPuri Kalkaji \nNew Delhi - 110019","H.N. 1159 , C/12 Main Road GovindPuri Kalkaji \nNew Delhi - 110019","7827676606","8588805854","QA Engineer","1989-05-18 00:00:00","254766IMG_20140517_144614.jpg","2","conf","inactive");
INSERT INTO employee VALUES("59","TS/027","2","govind","3cd2c3a42d775d46da1b96163acd083a","2008-03-13 00:00:00","sawasthi@trilasoft.com","Govind","Chand","hr@trilasoft.com","H.n. 3977 B Bolck Gali no 110/106 Sant Nagar. Burari. Pin - 110084","H.n. 3977 B Bolck Gali no 110/106 Sant Nagar. Burari. Pin - 110084","9999466216","9999655238","Office Boy","1986-03-08 00:00:00","","6","conf","active");
INSERT INTO employee VALUES("60","TS/102","2","aram","1bb4efa0378e3c3a179bcc3565d6efd1","2007-05-18 00:00:00","sawasthi@trilasoft.com","Anand","Ram","aram@trilasoft.com","Maharani Bagh","Maharani Bagh","9999466216","9999466216","Office Boy","1985-02-20 00:00:00","","6","conf","active");
INSERT INTO employee VALUES("61","TS/106","2","abhardwaj","a847d2d2750747ebbd4629769504b6fc","2014-12-17 00:00:00","gmitra@trilasoft.com","Abhishek","Bhardwaj","abhardwaj@trilasoft.com","C/o Manikant Jha Professoer colony Sahhganj Mahandru Patna - 800006","C/o Manikant Jha Professoer colony Sahhganj Mahandru Patna - 800006","9650613404","9835428874","Business Analyst","1990-02-07 00:00:00","187891653298_10202901685841247_1171350277_n.jpg","4","prob","inactive");
INSERT INTO employee VALUES("62","TS/107","2","rwadhwa","cb3bae31bb1c443fbf3db8889055f2fe","2015-01-20 00:00:00","mgaur@trilasoft.com","Rahul","Wadhwa","rwadhwa@trilasoft.com","E 2 /136 Shastri Nagar Delhi -110052","E 2 /136 Shastri Nagar Delhi -110052","9999431502","011 -23640779","Qa Engineer","1990-07-08 00:00:00","978104001.jpg","2","prob","active");
INSERT INTO employee VALUES("63","TS/108","2","shobhana","129cdd6213714e6ae2977cde2a326a4e","2015-02-11 00:00:00","ykumar@trilasoft.com","Shobhana","Singh","shobhana@trilasoft.com","A-36, new Anand Vihar, Ghaziabad, 201001","","9958111508","9873581101","Qa Engineer","1989-04-10 00:00:00","2959032012-06-01 14.23.30.jpg","2","prob","active");
INSERT INTO employee VALUES("64","TS/109","2","gsharma","991b38a970942f72d282613c3195772f","2015-04-02 00:00:00","amishra@trilasoft.com","Ganesh","Kumar Sharma","gsharma@trilasoft.com","H.n. -207, Sector 4 , Chiranjeev Vihar , Ghaziabad Up. 201002","","8826358742, 78386717","09415356312","Software Engineer","1992-08-06 00:00:00","262113gsharma.jpg","1","prob","active");
INSERT INTO employee VALUES("65","TS/110","2","ngupta","a3ef3a8ea3564ac32f43b6f5281c6160","2015-04-06 00:00:00","gmitra@trilasoft.com","Nikhil","Gupta","ngupta@trilasoft.com","B544 , 5 th floor 4 th Avenue Gaur City Greater Noida","","9582824876","7838500376","Business Analyst","1986-03-01 00:00:00","726209Nik.jpeg","4","prob","active");



DROP TABLE IF EXISTS issue;

CREATE TABLE `issue` (
  `issueid` bigint(11) NOT NULL auto_increment,
  `issue` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `date` date NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `empid` int(11) unsigned NOT NULL,
  `issuestatus` varchar(100) NOT NULL default 'pending',
  `comment` text NOT NULL,
  PRIMARY KEY  (`issueid`),
  KEY `empid` (`empid`)
) ENGINE=MyISAM AUTO_INCREMENT=1150 DEFAULT CHARSET=latin1;

INSERT INTO issue VALUES("1006","Equipment/Accessory Request","asa","2013-03-22","2013-03-22 12:44:18","24","resolved","");
INSERT INTO issue VALUES("1005","Logon Problem","test","2013-03-22","2013-03-22 11:19:51","24","resolved","");
INSERT INTO issue VALUES("1004","Printing Problem","printer","2013-03-21","2013-03-21 15:35:56","12","resolved","");
INSERT INTO issue VALUES("1003","Local Network Problem","No internet","2013-03-21","2013-03-21 15:32:27","12","resolved","");
INSERT INTO issue VALUES("1007","Hardware Purchase Request","Need one Headphone.","2013-03-22","2013-03-22 12:52:24","40","resolved","Resolved");
INSERT INTO issue VALUES("1008","Email Issue","I sent mail to team but no one received mail there is problem in mail. please solve issue","2013-04-02","2013-04-02 11:41:40","38","resolved","");
INSERT INTO issue VALUES("1009","Email Issue","I sent mail to team but no one received mail there is problem in mail. please solve issue","2013-04-02","2013-04-02 11:42:02","38","resolved","");
INSERT INTO issue VALUES("1010","Email Issue","I sent mail to team but no one received mail there is problem in mail. please solve issue","2013-04-02","2013-04-02 11:42:26","38","resolved","");
INSERT INTO issue VALUES("1011","Email Issue","I sent mail to team but no one received mail there is problem in mail. please solve issue","2013-04-02","2013-04-02 11:42:45","38","resolved","");
INSERT INTO issue VALUES("1012","Email Issue","I sent mail to team but no one received mail there is problem in mail. please solve issue .","2013-04-02","2013-04-02 11:43:12","38","resolved","");
INSERT INTO issue VALUES("1013","Email Issue","I sent mail to team but no one received mail there is problem in mail. please solve issue","2013-04-02","2013-04-02 11:43:28","38","resolved","");
INSERT INTO issue VALUES("1014","Email Issue","I sent mail to team but no one received mail there is problem in mail. please solve issue","2013-04-02","2013-04-02 11:44:09","38","resolved","");
INSERT INTO issue VALUES("1015","Email Issue","I sent mail to team but no one received mail there is problem in mail. please solve issue","2013-04-02","2013-04-02 11:44:37","38","resolved","");
INSERT INTO issue VALUES("1016","Email Issue","I sent mail to team but no one received mail there is problem in mail. please solve issue","2013-04-02","2013-04-02 11:44:56","38","resolved","");
INSERT INTO issue VALUES("1017","General","System is very slow.Debuging in eclipse creating problem.","2013-04-04","2013-04-04 19:09:03","29","resolved","Closed.");
INSERT INTO issue VALUES("1018","Internet Access Issue","internet issue is frequently coming since last Friday ( like on  off  on  off  and  on and on and on... )","2013-04-05","2013-04-05 11:27:33","33","resolved","Resolved.");
INSERT INTO issue VALUES("1019","Email Issue","Delete mail is not working properly since last 2 months","2013-04-05","2013-04-05 14:36:03","17","resolved","Email transfer to windows live mail.");
INSERT INTO issue VALUES("1020","Hardware Fault","My system restart 12:00 AM every night if power plug is not removed","2013-04-05","2013-04-05 14:38:11","17","resolved","After trouble shooting found problem with hardware,\nPrepared new system with required application in replacement,Waiting for data transfer approval form user. \n\n\n");
INSERT INTO issue VALUES("1021","Equipment/Accessory Request","Required a head phone, due to attend calls from Heena.","2013-04-15","2013-04-15 18:27:02","32","resolved","Issue New Headphone.");
INSERT INTO issue VALUES("1022","Hardware Fault","System become slow in process.","2013-04-16","2013-04-16 10:51:17","34","resolved","Delete Cookies,temp files,remove unwanted software,run c cleaner.");
INSERT INTO issue VALUES("1023","Hardware Fault","Some times mouse does not work it shows the message \"One of the USB device is not recognized.\"","2013-04-16","2013-04-16 18:19:46","39","resolved","Replace Mouse..");
INSERT INTO issue VALUES("1024","Software Update Request","Free trial version of MS Office is going to expire in 4 days. Please fix it.","2013-04-24","2013-04-24 14:06:01","11","resolved","");
INSERT INTO issue VALUES("1025","Printing Problem","printer is not connecting.","2013-04-25","2013-04-25 15:29:04","11","resolved","");
INSERT INTO issue VALUES("1026","General","Headphone required for Skype calling.","2013-05-08","2013-05-08 13:01:21","35","resolved","");
INSERT INTO issue VALUES("1027","Equipment/Accessory Request","Hi,\n\nI am facing problem with my mouse. It\'s not working properly. Please replace it and kindly provide me a Headphone ASAP. \n\nThanks & Regards,\nKarishma","2013-05-24","2013-05-24 11:10:03","27","resolved","Mouse Replaced");
INSERT INTO issue VALUES("1028","Hardware Purchase Request","Please arrange mouse.","2013-05-27","2013-05-27 16:43:11","34","resolved","Mouse Replced");
INSERT INTO issue VALUES("1029","General","Headphone required for Skype calling.\nPlease arrange it ASAP.","2013-05-27","2013-05-27 17:57:30","35","resolved","Resolved");
INSERT INTO issue VALUES("1030","Software Problem","System  gets slow down.Please Format it.","2013-06-03","2013-06-03 14:21:02","15","resolved","");
INSERT INTO issue VALUES("1031","Software Update Request","Please update and map eclipse on my system.","2013-06-05","2013-06-05 12:26:44","35","resolved","");
INSERT INTO issue VALUES("1032","Hardware Replacement","Problem with mike,\n\nplease change it, some time its create problem","2013-06-05","2013-06-05 16:37:32","18","resolved","Resolved");
INSERT INTO issue VALUES("1033","General","Please arrange Headphone for skype calling on my system.","2013-06-11","2013-06-11 17:44:19","35","resolved","");
INSERT INTO issue VALUES("1034","Printing Problem","Printer not connected.","2013-06-14","2013-06-14 11:42:07","11","resolved","");
INSERT INTO issue VALUES("1035","Equipment/Accessory Request","Headphone\'s mic is not working.\nHeadphone ID -  TS - 06","2013-06-20","2013-06-20 17:19:00","22","resolved","Replace");
INSERT INTO issue VALUES("1036","Equipment/Accessory Request","Headphone is not working.","2013-07-11","2013-07-11 10:37:09","40","resolved","Resolved..");
INSERT INTO issue VALUES("1037","Hardware Replacement","Battery of Laptop not working. Request you to get it replaced.","2013-07-15","2013-07-15 13:15:22","31","resolved","We are looking for replace laptop..");
INSERT INTO issue VALUES("1038","Email Issue","Windows live mail issue still persist as shown to Pramod on 11th July 2013","2013-07-17","2013-07-17 18:28:36","17","resolved","Install Thunderbird,Reinstall Open Office and internet Explorer..");
INSERT INTO issue VALUES("1039","Equipment/Accessory Request","Please change my laptop bag","2013-07-26","2013-07-26 16:42:40","18","resolved","");
INSERT INTO issue VALUES("1040","General","My system working.","2013-08-30","2013-08-30 10:14:32","24","resolved","");
INSERT INTO issue VALUES("1041","General","My system not working.","2013-08-30","2013-08-30 10:14:46","24","resolved","");
INSERT INTO issue VALUES("1042","General","My system not working.","2013-08-30","2013-08-30 10:14:48","24","resolved","");
INSERT INTO issue VALUES("1043","General","My system not working.","2013-08-30","2013-08-30 10:14:50","24","resolved","Resolved");
INSERT INTO issue VALUES("1044","Hardware Fault","My system is not starting it happens often,\nPlease rectify this problem.","2013-08-30","2013-08-30 10:23:17","21","resolved","Resolved,under observation..");
INSERT INTO issue VALUES("1045","Equipment/Accessory Request","Need to replace my headphone.As it is broken and not working properly","2013-09-02","2013-09-02 11:10:41","44","resolved","");
INSERT INTO issue VALUES("1046","Equipment/Accessory Request","Mouse is not working properly.","2013-09-23","2013-09-23 18:19:53","51","resolved","");
INSERT INTO issue VALUES("1047","General","I am not getting deployment mail from last two \nweeks","2013-09-30","2013-09-30 12:27:15","17","resolved","");
INSERT INTO issue VALUES("1048","General","I am not getting deployment mail from last two \nweeks","2013-09-30","2013-09-30 12:27:19","17","resolved","");
INSERT INTO issue VALUES("1049","Hardware Replacement","Mouse is not working","2013-11-05","2013-11-05 12:09:53","44","resolved","");
INSERT INTO issue VALUES("1050","Hardware Replacement","My mouse not working properly","2013-11-13","2013-11-13 12:20:45","24","resolved","");
INSERT INTO issue VALUES("1051","Hardware Replacement","My mouse not working properly","2013-11-13","2013-11-13 12:20:45","24","resolved","");
INSERT INTO issue VALUES("1052","Printing Problem","Hi Pramod,\n\nPlease do printer set up in my laptop.","2013-11-25","2013-11-25 12:04:36","53","resolved","");
INSERT INTO issue VALUES("1053","Printing Problem","Hi Pramod,\n\nPlease do printer set up in my laptop.","2013-11-25","2013-11-25 12:04:50","53","resolved","");
INSERT INTO issue VALUES("1054","Hardware Replacement","My Mouse is not working properly.","2013-11-26","2013-11-26 11:16:24","31","resolved","Change Mouse");
INSERT INTO issue VALUES("1055","General","The cubicle joints of the Reports Section has got loose and dislodged from its place. Its a request if someone could address to this and provide a fix.","2013-11-29","2013-11-29 11:33:48","26","resolved","Try to make contact with concern person for the same..");
INSERT INTO issue VALUES("1056","Telephone Problem","Some unwanted sound (line disturbance sound) is coming from handset in the phone line 107.","2013-12-02","2013-12-02 14:36:48","32","resolved","");
INSERT INTO issue VALUES("1057","General","This is a test for issue tracking mail.","2013-12-05","2013-12-05 14:22:39","12","resolved","");
INSERT INTO issue VALUES("1058","Hardware Replacement","My Mouse right click button is not working. Kindly change the mouse.","2013-12-10","2013-12-10 14:01:48","39","resolved","Change Mouse");
INSERT INTO issue VALUES("1059","General","Testing From Email in Issue Mailer.","2013-12-10","2013-12-10 16:17:49","12","resolved","Resolved");
INSERT INTO issue VALUES("1060","Equipment/Accessory Request","Need a new mouse for Vaibhav (new joine).","2013-12-18","2013-12-18 19:08:32","40","resolved","");
INSERT INTO issue VALUES("1061","SVN Issue","Error occurred during initialization of VM\nCould not reserve enough space for object heap\nError: Could not create the Java Virtual Machine.\nError: A fatal exception has occurred. Program will exit.","2013-12-19","2013-12-19 14:31:36","29","resolved","");
INSERT INTO issue VALUES("1062","Electrical Power Problem","Tube Light of my work station not working","2013-12-20","2013-12-20 16:45:53","21","resolved","");
INSERT INTO issue VALUES("1063","Equipment/Accessory Request","I need a head phone.","2014-01-03","2014-01-03 11:11:48","26","resolved","Please share with shivajee");
INSERT INTO issue VALUES("1064","Equipment/Accessory Request","I need a head phone.","2014-01-03","2014-01-03 11:11:52","26","resolved","Please share with shivajee");
INSERT INTO issue VALUES("1065","Hardware Fault","Mic is not working of my head phone, please look into & provide best solution.\nthanks you in advance.","2014-01-03","2014-01-03 11:16:56","32","resolved","");
INSERT INTO issue VALUES("1066","General","testing the redirection","2014-01-08","2014-01-08 11:13:21","12","pending","");
INSERT INTO issue VALUES("1067","General","testing redirection","2014-01-08","2014-01-08 11:18:29","12","pending","");
INSERT INTO issue VALUES("1068","General","testing redirection","2014-01-08","2014-01-08 11:31:51","12","pending","");
INSERT INTO issue VALUES("1069","General","redirection testing","2014-01-08","2014-01-08 11:34:44","12","pending","");
INSERT INTO issue VALUES("1070","Email Issue","I am not getting mail of applied leave by abhishek.","2014-01-08","2014-01-08 11:35:32","25","resolved","");
INSERT INTO issue VALUES("1071","Software Problem","System is getting slow.","2014-01-13","2014-01-13 13:46:37","15","resolved","");
INSERT INTO issue VALUES("1072","General","Please Format the PC.","2014-01-13","2014-01-13 14:19:20","50","resolved","");
INSERT INTO issue VALUES("1073","General","Please Format the PC.","2014-01-13","2014-01-13 14:19:21","50","resolved","");
INSERT INTO issue VALUES("1074","General","Please Format the PC.","2014-01-13","2014-01-13 14:19:25","50","resolved","");
INSERT INTO issue VALUES("1075","Hardware Fault","My laptop battery icon show \"X\" and showing massage: Consider replacing your battery","2014-01-15","2014-01-15 18:48:45","20","resolved","");
INSERT INTO issue VALUES("1076","Telephone Problem","Some unwanted sound (line disturbance sound) is coming from handset in the phone line 107.","2014-01-23","2014-01-23 10:38:31","32","resolved","");
INSERT INTO issue VALUES("1077","Hardware Replacement","Problem in Headfone","2014-01-23","2014-01-23 18:48:53","15","resolved","");
INSERT INTO issue VALUES("1078","General","testing general issue","2014-01-24","2014-01-24 10:46:14","12","resolved","");
INSERT INTO issue VALUES("1079","Hardware Fault","Problem in Headphone.","2014-01-24","2014-01-24 11:58:17","15","resolved","");
INSERT INTO issue VALUES("1080","Hardware Fault","Headphone Mike is not working. .","2014-01-27","2014-01-27 10:57:18","36","resolved","");
INSERT INTO issue VALUES("1081","Hardware Fault","Headphone Mike is not working. .","2014-01-27","2014-01-27 10:57:22","36","resolved","");
INSERT INTO issue VALUES("1082","Hardware Replacement","Headphone assigned to me has been damaged.","2014-02-03","2014-02-03 14:57:39","22","resolved","");
INSERT INTO issue VALUES("1083","Software Problem","System is working slow. Reformatting is required.","2014-02-05","2014-02-05 18:07:09","12","resolved","Reformated..");
INSERT INTO issue VALUES("1084","Hardware Fault","Hi Pramod,\n\nMy system is very slow. Its shows only 10 GB free out of 50-55 GB. Please do the needful.","2014-02-10","2014-02-10 18:34:14","31","resolved","Deleted unusual data");
INSERT INTO issue VALUES("1085","Hardware Purchase Request","please provide me a headset in order to discuss things via skype.","2014-02-12","2014-02-12 15:53:21","56","resolved","Please share with kush");
INSERT INTO issue VALUES("1086","Hardware Purchase Request","Request for New Head set as i am not having it and creates problem to arrange when there are calls through skype.","2014-02-13","2014-02-13 15:10:47","39","resolved","");
INSERT INTO issue VALUES("1087","Telephone Problem","Some unwanted sound (line disturbance sound) is coming in the phone line 107.","2014-03-12","2014-03-12 15:59:38","32","resolved","");
INSERT INTO issue VALUES("1088","Local Network Problem","Hi,\n\nPlease replace the LAN cable pinlock of my network.Currently is not working properly.\n\nThanks.","2014-03-21","2014-03-21 13:23:22","35","resolved","");
INSERT INTO issue VALUES("1089","Equipment/Accessory Request","Headphone not working.","2014-04-02","2014-04-02 16:49:47","16","resolved","");
INSERT INTO issue VALUES("1090","Equipment/Accessory Request","Head phone not working.","2014-04-03","2014-04-03 19:24:18","40","resolved","");
INSERT INTO issue VALUES("1091","Hardware Replacement","Headphone damaged from long time.\nI am using my personal headphone","2014-04-04","2014-04-04 10:31:37","44","resolved","");
INSERT INTO issue VALUES("1092","Equipment/Accessory Request","HeadPhone is not working.","2014-04-04","2014-04-04 14:17:18","15","resolved","");
INSERT INTO issue VALUES("1093","Hardware Replacement","Laptop battery is not working properly","2014-04-24","2014-04-24 11:37:36","18","resolved","Replace power adapter ");
INSERT INTO issue VALUES("1094","Telephone Problem","Extension 111 is not working.","2014-04-24","2014-04-24 14:48:07","16","resolved","");
INSERT INTO issue VALUES("1095","Hardware Replacement","Please replace mouse as it clicks multiple times when i press single.","2014-04-29","2014-04-29 16:58:36","34","resolved","Replace Mouse");
INSERT INTO issue VALUES("1096","Hardware Purchase Request","I need to headphone for skype calling purpose.","2014-04-29","2014-04-29 17:30:35","29","resolved","Share with dilip or me when it require..");
INSERT INTO issue VALUES("1097","Equipment/Accessory Request","Please arrange to change my computer mouse, it is not functioning properly.\n\nThanx!","2014-04-30","2014-04-30 17:21:49","37","resolved","Replaced mouse");
INSERT INTO issue VALUES("1098","Hardware Fault","The laptop has started showing signs of ware n tear.The Monitor/Screen has developed a crack also. Please get it rectified before it gets too large.","2014-05-09","2014-05-09 14:55:59","31","resolved","");
INSERT INTO issue VALUES("1099","Hardware Fault","The laptop has started showing signs of ware n tear.The Monitor/Screen has developed a crack also. Please get it rectified before it gets too large.","2014-05-09","2014-05-09 14:56:00","31","resolved","");
INSERT INTO issue VALUES("1100","General","There is some sound coming from AC in the jasper room. it is already noticed to admin on friday.","2014-05-12","2014-05-12 18:16:46","32","resolved","");
INSERT INTO issue VALUES("1101","Hardware Purchase Request","Need headphone for Vaibhav","2014-06-17","2014-06-17 18:02:43","44","resolved","");
INSERT INTO issue VALUES("1102","Hardware Fault","My laptop keyboard\'s key is not working","2014-06-20","2014-06-20 12:07:01","20","resolved","");
INSERT INTO issue VALUES("1103","General","Cubicle separator hanging, Please fix it before it falls to the ground..","2014-06-20","2014-06-20 17:27:50","31","resolved","");
INSERT INTO issue VALUES("1104","Hardware Replacement","Mouse is not proper work.","2014-06-24","2014-06-24 11:01:36","29","resolved","");
INSERT INTO issue VALUES("1105","Hardware Replacement","My Mouse is not working","2014-06-24","2014-06-24 14:26:41","20","resolved","");
INSERT INTO issue VALUES("1106","Hardware Replacement","My Mouse is not working","2014-06-24","2014-06-24 14:26:41","20","resolved","");
INSERT INTO issue VALUES("1107","Hardware Fault","Headphone Mic is not working.","2014-07-24","2014-07-24 16:56:05","36","resolved","");
INSERT INTO issue VALUES("1108","Hardware Fault","Hi Pramod,\nMouse is not Working.\n\nPlease rectify","2014-07-24","2014-07-24 19:49:55","31","resolved","");
INSERT INTO issue VALUES("1109","Hardware Replacement","Mic not working.","2014-08-18","2014-08-18 12:45:34","34","resolved","");
INSERT INTO issue VALUES("1110","Hardware Replacement","Head phone not working properly.Kindly replace it as soon as possible.","2014-08-18","2014-08-18 16:40:14","57","resolved","");
INSERT INTO issue VALUES("1111","Hardware Fault","Mic is not working of my head phone, please look into & provide some solution.","2014-08-28","2014-08-28 17:45:30","32","resolved","");
INSERT INTO issue VALUES("1112","Equipment/Accessory Request","Hi,\nthere is problem in laptop bag!!!","2014-09-10","2014-09-10 10:56:41","18","resolved","");
INSERT INTO issue VALUES("1113","Hardware Fault","Hi Pramod,\n\nAs I shown you my mouse is not working properly.\n\nPlease do it well.","2014-09-12","2014-09-12 11:07:16","18","resolved","");
INSERT INTO issue VALUES("1114","Hardware Fault","Right click of mouse is creating problem . it is accessible by clicking multiple times. please look into and replace it.","2014-09-15","2014-09-15 15:37:17","32","resolved","");
INSERT INTO issue VALUES("1115","Software Update Request","Hi Pramod, please install SOAP UI in my system as i need it for testing purpose.","2014-09-22","2014-09-22 15:07:23","39","resolved","");
INSERT INTO issue VALUES("1116","Hardware Fault","Hi Pramod, Please format my system as its been very slow from few days.","2014-09-30","2014-09-30 15:28:11","39","resolved","");
INSERT INTO issue VALUES("1117","Software Problem","System is not working properly.Sometimes it\'s very slow. Please format it.","2014-10-06","2014-10-06 17:45:24","51","pending","");
INSERT INTO issue VALUES("1118","Hardware Fault","As already stated in previous issues, the laptop has started showing signs of wear n tear.After Every few days, it develops some problem. Like Screen has developed Gap, Keyboard Keys are also getting dismantled..","2014-10-07","2014-10-07 19:31:43","31","resolved","Replaced laptop with Dell inspiron 1540 which we were using as stand-bye,we will repair the damage part of the HP laptop and use as stand-bye..");
INSERT INTO issue VALUES("1119","Equipment/Accessory Request","Requesting for an Head Phone","2014-10-15","2014-10-15 17:06:30","58","resolved","Issue new headphone..");
INSERT INTO issue VALUES("1120","Hardware Fault","When I try to connect calls on skype, no sound is received through my headphone. However, my voice remains audible to the caller. Please fix this","2014-10-22","2014-10-22 18:40:41","52","resolved","Hardware issue,replaced headphone..");
INSERT INTO issue VALUES("1121","Equipment/Accessory Request","Required a headphone to attend calls on skype","2014-10-22","2014-10-22 18:41:38","52","resolved","Resolved");
INSERT INTO issue VALUES("1122","Hardware Replacement","Head Phone","2014-10-29","2014-10-29 16:47:31","18","resolved","Hardware issue found,Replaced with new one..");
INSERT INTO issue VALUES("1123","Hardware Replacement","Mouse is not working properly.","2014-11-17","2014-11-17 12:22:20","35","resolved","Replace Mouse");
INSERT INTO issue VALUES("1124","General","Please provide me Head Phone.","2014-11-21","2014-11-21 18:39:45","51","resolved","");
INSERT INTO issue VALUES("1125","General","Today (27-Nov-2014) I am not able to complete my attendance through \"Biometric Attendance System \".","2014-11-27","2014-11-27 14:21:36","17","pending","");
INSERT INTO issue VALUES("1126","General","eHour does not have \"CMLK\", \"PUTT\"","2014-11-27","2014-11-27 15:29:46","17","pending","");
INSERT INTO issue VALUES("1127","General","eHour does not have \"KOTA\"","2014-11-27","2014-11-27 15:42:00","17","pending","");
INSERT INTO issue VALUES("1128","Hardware Replacement","Please provide me Head Phone.","2014-12-01","2014-12-01 11:20:42","51","resolved","Resolved,issue new headphone");
INSERT INTO issue VALUES("1129","Hardware Replacement","My head phone is not working","2014-12-01","2014-12-01 12:13:56","20","resolved","Replace headphone ");
INSERT INTO issue VALUES("1130","General","Please provide a blower for testing team","2014-12-22","2014-12-22 11:34:31","56","pending","");
INSERT INTO issue VALUES("1134","General","Please provide heater for testing team.","2014-12-26","2014-12-26 14:30:30","35","resolved","done");
INSERT INTO issue VALUES("1133","General","testing issue","2014-12-26","2014-12-26 14:26:30","48","pending","");
INSERT INTO issue VALUES("1135","Equipment/Accessory Request","Need headphone.","2015-01-12","2015-01-12 10:36:10","14","resolved","Hi Giten,\n\nRajeev will get for you from US.");
INSERT INTO issue VALUES("1136","General","One room heater is Idle at our end, as switch is not working,  utilizable some where else","2015-01-13","2015-01-13 12:31:21","17","resolved","Dear Sangeeta je,\n\nSwitch is working now. You can use it.");
INSERT INTO issue VALUES("1137","Hardware Replacement","Hi Sir,\nMy system is working slow when ruing some application like RS10. Please upgrade ram up to 8 GB","2015-01-19","2015-01-19 12:48:58","24","resolved","Upgraded Ram");
INSERT INTO issue VALUES("1138","Hardware Replacement","Please upgrade my RAM","2015-01-20","2015-01-20 11:46:19","21","resolved","Upgraded Ram");
INSERT INTO issue VALUES("1139","Hardware Replacement","As my system is getting very slow after installing RS-10,\nso it needs more Ram.","2015-01-20","2015-01-20 11:46:40","28","resolved","Upgraded Ram");
INSERT INTO issue VALUES("1140","Hardware Fault","broken wire box","2015-01-27","2015-01-27 16:38:09","61","pending","");
INSERT INTO issue VALUES("1141","Hardware Replacement","Headphone is not working","2015-02-03","2015-02-03 17:44:46","18","resolved","Replaced with new headphone..");
INSERT INTO issue VALUES("1142","Hardware Purchase Request","Please provide headphone for me.","2015-02-04","2015-02-04 15:32:42","29","resolved","Issue new headphone..");
INSERT INTO issue VALUES("1143","Hardware Purchase Request","Please Issue the Headphone.","2015-02-04","2015-02-04 15:54:27","50","resolved","Issue new headphone");
INSERT INTO issue VALUES("1144","SVN Issue","SVN commit is taking too much time since last week.","2015-02-26","2015-02-26 20:03:03","17","pending","");
INSERT INTO issue VALUES("1145","Equipment/Accessory Request","Request for issuing the headphone","2015-03-03","2015-03-03 11:56:07","62","pending","");
INSERT INTO issue VALUES("1146","Server Access Problem","Mysql at dev1 is very slow","2015-03-10","2015-03-10 18:45:56","17","pending","");
INSERT INTO issue VALUES("1147","Hardware Replacement","my system is very slow.","2015-04-02","2015-04-02 18:43:21","29","pending","");
INSERT INTO issue VALUES("1148","General","Headphone are not working properly.","2015-04-14","2015-04-14 18:16:33","35","pending","");
INSERT INTO issue VALUES("1149","Telephone Problem","No Dial Tone most of the time at Ext.- 110","2015-04-15","2015-04-15 15:41:48","22","pending","");



DROP TABLE IF EXISTS leave;

;




DROP TABLE IF EXISTS nominations;

CREATE TABLE `nominations` (
  `nomid` int(11) unsigned NOT NULL auto_increment,
  `sentby` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `awardtype` varchar(200) NOT NULL,
  `quarter` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  `result` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY  (`nomid`),
  KEY `empid` (`empid`),
  KEY `sentby` (`sentby`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO nominations VALUES("5","12","19","Pat on the Back","Quarter 3 (Jul - Sep)","Arbind worked very hard on Bootstrap CSS and took good initiative to prepare all the forms for demo purpose.","","2014-10-28");
INSERT INTO nominations VALUES("6","18","24","Employee of the Quarter","Quarter 3 (Jul - Sep)","","","2014-10-28");
INSERT INTO nominations VALUES("7","31","56","Pat on the Back","Quarter 3 (Jul - Sep)","Nominated for quarter 3","","2014-10-28");
INSERT INTO nominations VALUES("8","18","24","Employee of the Quarter","Quarter 3 (Jul - Sep)","","","2014-10-28");
INSERT INTO nominations VALUES("9","31","52","Employee of the Quarter","Quarter 3 (Jul - Sep)","Nominated for Quarter 3","","2014-10-28");
INSERT INTO nominations VALUES("17","14","35","Employee of the Quarter","Quarter 1 (Jan - Mar)","He is taking lot of initiative to finished the task and assign ticket to the jr. He is a silent worker. I have started working with him for last 3-4 months and never found that he is saying no to any work.\nNot a significant achievement for this quarter but we never recognize him. So its worth to recognize him.","","2015-03-19");
INSERT INTO nominations VALUES("10","21","51","Pat on the Back","Quarter 4 (Oct - Dec)","Good Idea for apply logic.\nSmart Work.","","2014-12-18");
INSERT INTO nominations VALUES("11","18","28","Pat on the Back","Quarter 4 (Oct - Dec)","Worked as good team player and worked on new forwarding tab enhancement and completed.","Selected","2014-12-18");
INSERT INTO nominations VALUES("12","20","15","Pat on the Back","Quarter 4 (Oct - Dec)","he is working for RS 10 we found good progress in RS 10, he is also done good work for performance of CF and So.","","2014-12-19");
INSERT INTO nominations VALUES("13","20","21","Employee of the Quarter","Quarter 4 (Oct - Dec)","he had done good job for Quality and he is always ready to help  every one.","","2014-12-19");
INSERT INTO nominations VALUES("14","14","56","Employee of the Quarter","Quarter 4 (Oct - Dec)","She has done very good job in KOTA implementation and still doing support other than her testing. She took extra responsibility to do this.\n\nTesting also she is doing good job.","Selected","2014-12-22");
INSERT INTO nominations VALUES("15","14","58","Pat on the Back","Quarter 4 (Oct - Dec)","Within few months she has picked up RS very well and she is supporting few big clients. She has done good job in implementation of CMLK. Took extra responsibility to stream line basic setup and did a good job.","Selected","2014-12-22");
INSERT INTO nominations VALUES("16","14","34","Pat on the Back","Quarter 4 (Oct - Dec)","Last quarter he did god job on basic setup and two implementation very quick. Did good job on UTSI extract and update few query..","","2014-12-22");
INSERT INTO nominations VALUES("18","18","28","Pat on the Back","Quarter 1 (Jan - Mar)","I am nominating him because of good work in this quarter on RS-10","","2015-03-23");
INSERT INTO nominations VALUES("19","21","51","Pat on the Back","Quarter 1 (Jan - Mar)","Good Work.","","2015-04-13");
INSERT INTO nominations VALUES("20","21","29","Pat on the Back","Quarter 1 (Jan - Mar)","Increasing potential.","","2015-03-23");



DROP TABLE IF EXISTS request;

CREATE TABLE `request` (
  `requestid` int(11) NOT NULL auto_increment,
  `bookid` int(11) NOT NULL,
  `issuetype` varchar(300) NOT NULL,
  `comments` text NOT NULL,
  `empid` int(11) NOT NULL,
  `reqdate` date NOT NULL,
  `dateofissue` date NOT NULL,
  `dateofreturn` date NOT NULL,
  `reqstatus` varchar(100) NOT NULL default 'pending',
  PRIMARY KEY  (`requestid`),
  KEY `empid` (`empid`),
  KEY `bookid` (`bookid`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

INSERT INTO request VALUES("26","30","book","Please issue a book.","29","2014-02-13","2014-02-17","2014-05-14","returned");
INSERT INTO request VALUES("30","37","book","Please issue me SQL Book.","34","2014-03-10","2014-03-10","2014-05-15","returned");
INSERT INTO request VALUES("31","28","datacard","Need a data card for call purpose.","56","2014-03-20","2014-03-20","2014-03-24","returned");
INSERT INTO request VALUES("32","28","datacard","Need data card for call","56","2014-03-21","2014-03-24","2014-03-24","returned");
INSERT INTO request VALUES("22","28","datacard","i need Data card","53","2014-02-07","2014-02-19","2014-02-26","returned");
INSERT INTO request VALUES("27","28","datacard","Talk with sandeep sir.","24","2014-02-26","2014-02-26","2014-02-28","returned");
INSERT INTO request VALUES("28","28","datacard","issue data card for office propose","24","2014-02-28","2014-02-28","2014-03-03","returned");
INSERT INTO request VALUES("29","28","datacard","issue data card for office propose","24","2014-03-04","2014-03-04","2014-03-07","returned");
INSERT INTO request VALUES("33","28","datacard","plz issued data card for official work","18","2014-03-24","2014-03-24","2014-05-09","returned");
INSERT INTO request VALUES("34","28","ipad","Need iPad for office work.","40","2014-04-08","2014-04-09","2014-04-24","returned");
INSERT INTO request VALUES("35","28","ipad","Need iPad for the office use.","40","2014-04-09","0000-00-00","2014-04-24","returned");
INSERT INTO request VALUES("36","28","datacard","issue data card for office propose talk with nitin and sandeep regarding Drag and drop","24","2014-04-09","2014-04-09","2014-04-16","returned");
INSERT INTO request VALUES("37","28","ipad","need ipad to test move pluse","25","2014-04-11","0000-00-00","2014-04-16","returned");
INSERT INTO request VALUES("38","28","ipad","for testing of MM","25","2014-04-23","2014-04-23","2014-04-24","returned");
INSERT INTO request VALUES("39","28","ipad","Need iPad for office use.","40","2014-04-24","0000-00-00","2014-04-24","returned");
INSERT INTO request VALUES("40","28","ipad","ipad for testing MM","25","2014-04-30","0000-00-00","2014-05-01","returned");
INSERT INTO request VALUES("41","28","ipad","Please provide me i-pad for testing purpose. Thanks!","56","2014-04-30","0000-00-00","2014-05-01","returned");
INSERT INTO request VALUES("42","28","ipad","testing with jan vos of mm","25","2014-05-01","2014-05-01","2014-05-01","returned");
INSERT INTO request VALUES("43","28","ipad","testing","25","2014-05-01","2014-05-01","2014-05-06","returned");
INSERT INTO request VALUES("44","28","ipad","MM testing","25","2014-05-06","0000-00-00","2014-05-06","returned");
INSERT INTO request VALUES("45","28","ipad","MM testing","25","2014-05-07","0000-00-00","2014-05-07","returned");
INSERT INTO request VALUES("46","28","ipad","MM testing","25","2014-05-08","0000-00-00","2014-05-08","returned");
INSERT INTO request VALUES("47","28","ipad","mm testing","25","2014-05-09","2014-05-09","2014-05-09","returned");
INSERT INTO request VALUES("48","28","ipad","Need i-pad for testing","56","2014-05-09","2014-05-09","2014-05-09","returned");
INSERT INTO request VALUES("49","28","ipad","need i-pad for testing","56","2014-05-12","2014-05-12","2014-05-13","returned");
INSERT INTO request VALUES("50","28","datacard","please assign me the datacard","18","2014-05-12","2014-05-12","2014-05-14","returned");
INSERT INTO request VALUES("51","28","ipad","need i-pad for testing","56","2014-05-13","2014-05-13","2014-05-14","returned");
INSERT INTO request VALUES("52","28","ipad","mm testing","25","2014-05-13","0000-00-00","2014-05-28","returned");
INSERT INTO request VALUES("53","37","book","Hi Mam,\ni need PL/SQL BOOK","55","2014-05-15","2014-05-15","2014-06-19","returned");
INSERT INTO request VALUES("54","30","book","issue struts2 book","29","2014-05-16","2014-05-16","2015-02-04","returned");
INSERT INTO request VALUES("55","28","ipad","Need i pad for testing.","56","2014-05-19","2014-05-19","2014-05-20","returned");
INSERT INTO request VALUES("56","28","ipad","Need ipad for testing..","56","2014-05-28","0000-00-00","2014-05-28","returned");
INSERT INTO request VALUES("57","28","datacard","need  data card for testing","56","2014-05-28","2014-05-29","2014-06-19","returned");
INSERT INTO request VALUES("58","28","ipad","for mm testing","25","2014-05-29","2014-05-29","2014-05-29","returned");
INSERT INTO request VALUES("59","28","ipad","MM testing","25","2014-05-29","2015-02-04","2015-02-04","returned");
INSERT INTO request VALUES("60","33","book","Please issue the Book","18","2014-06-02","2015-02-04","2015-02-04","returned");
INSERT INTO request VALUES("61","35","book","i need this book for study","55","2014-06-19","2015-02-04","2015-02-04","returned");
INSERT INTO request VALUES("62","28","ipad","Training Purpose","15","2014-08-04","2015-02-04","2015-02-04","returned");
INSERT INTO request VALUES("63","28","ipad","Please issue ipad for office use.","16","2014-08-13","2015-02-04","2015-02-04","returned");
INSERT INTO request VALUES("64","28","ipad","Need IPAD to test Voxme for CMLK","44","2014-08-27","2015-02-04","2015-02-04","returned");
INSERT INTO request VALUES("65","28","datacard","Please assin","18","2014-08-29","2015-02-04","2015-02-04","returned");
INSERT INTO request VALUES("66","28","datacard","Please Issue need to follow up on imp issues","18","2014-09-30","0000-00-00","2015-02-04","returned");
INSERT INTO request VALUES("67","28","ipad","Please assign IPAD, I need this to check voxmy data.","16","2014-11-24","0000-00-00","0000-00-00","pending");
INSERT INTO request VALUES("68","28","ipad","Please provide I-Pad for KT","56","2015-02-02","0000-00-00","0000-00-00","pending");



DROP TABLE IF EXISTS usergroup;

CREATE TABLE `usergroup` (
  `groupid` int(11) unsigned NOT NULL auto_increment,
  `groupname` varchar(200) NOT NULL,
  PRIMARY KEY  (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO usergroup VALUES("1","admin");
INSERT INTO usergroup VALUES("2","user");
INSERT INTO usergroup VALUES("3","rm");
INSERT INTO usergroup VALUES("4","hr");



