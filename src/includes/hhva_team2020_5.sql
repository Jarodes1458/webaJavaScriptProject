--Drop Maxime
drop table 'ely_client';
drop table 'ely_service';

--Connexion Maxime 

CREATE TABLE `ely_service` (
  `SER_ID` int(3) NOT NULL,
  `SER_NOM` varchar(100) NOT NULL,
  `SER_TYPE` varchar(50) DEFAULT NULL,
  `SER_PRIX` int(5) NOT NULL,
  `SER_DESCRIPTION` varchar(500) NOT NULL,
  `SER_TEMPS_ESTIMATION` int(5) NOT NULL,
  `SER_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(1, 'Femme', 'Coupe', 85, 'Coupe de cheveux pour les femmes', 100, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(2, 'Homme', 'Coupe', 45, 'Coupe de cheveux pour les hommes', 45, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(3, 'Enfant', 'Coupe', 30, 'Coupe de cheveu pour enfant', 30, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(4, 'Coloration des racines', 'Beaute des cheveux', 80, 'Coloration des racines', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(5, 'Meche', 'Beaute des cheveux', 150, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(6, 'Balayage', 'Beaute des cheveux', 150, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(9, 'Shatush', 'Beaute des cheveux', 150, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(11, 'Nika', 'Autre', 100, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(12, 'Pastel', 'Beaute des cheveux', 60, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(14, 'Lebel', 'Soin', 100, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES
(15, 'Joyko', 'Soin', 50, '', 100, 'ACTIF');




CREATE TABLE `ely_client` (
  `CLI_ID` int(9) NOT NULL,
  `CLI_NOM` varchar(30) NOT NULL,
  `CLI_PRENOM` varchar(30) NOT NULL,
  `CLI_EMAIL` varchar(70) DEFAULT NULL,
  `CLI_TEL` varchar(20) NOT NULL,
  `CLI_DESCRIPTION` varchar(500) DEFAULT NULL,
  `CLI_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (1, 'Assimua', 'Jarod', 'Jarod@togomail.mail2', '+41 343 34 32', 'Client sympathique et souriant', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (2, 'Wathell', 'Hamel', 'hwathell1@weebly.com', '565 144 2796', 'Agalactia', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (3, 'Welchman', 'Nicki', 'nwelchman2@tiny.cc', '178 967 5004', 'Other fracture of upper end of unspecified radius, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with routine healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (4, 'Snedden', 'Emilio', 'esnedden3@wordpress.org', '782 863 8551', 'Pre-existing secondary hypertension complicating pregnancy', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (5, 'Butterwick', 'Bert', 'bbutterwick4@deviantart.com', '106 334 4725', 'Poisoning by other nonopioid analgesics and antipyretics, not elsewhere classified, assault, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (6, 'Schultheiss', 'Irwinn', 'ischultheiss5@usa.gov', '988 935 7822', 'Other embolism in pregnancy, first trimester', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (7, 'Jansky', 'Itch', 'ijansky6@google.pl', '647 971 4268', 'Displaced fracture of cuboid bone of right foot', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (8, 'Noods', 'Rose', 'rnoods7@slideshare.net', '511 146 4070', 'Encounter for surgical aftercare following surgery on the circulatory system', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (9, 'Faulder', 'Bjorn', 'bfaulder8@cbslocal.com', '325 592 7693', 'Poisoning by, adverse effect of and underdosing of unspecified psychodysleptics [hallucinogens]', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (10, 'Ellesworthe', 'Brade', 'bellesworthe9@theguardian.com', '334 162 3392', 'Nodular lymphocyte predominant Hodgkin lymphoma, intra-abdominal lymph nodes', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (11, 'Maudling', 'Cherilyn', 'cmaudlinga@japanpost.jp', '994 671 9485', 'Toxic effect of contact with other venomous fish, intentional self-harm', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (12, 'Brashaw', 'Hubert', 'hbrashawb@forbes.com', '488 825 4065', 'Car driver injured in collision with pick-up truck in nontraffic accident, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (13, 'Savatier', 'Simon', 'ssavatierc@canalblog.com', '280 545 4246', 'Unspecified injury of unspecified blood vessel at hip and thigh level, right leg, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (14, 'Kemsley', 'Alfie', 'akemsleyd@techcrunch.com', '137 296 2874', 'Person injured while boarding or alighting from special agricultural vehicle, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (15, 'Impy', 'Etan', 'eimpye@ted.com', '421 915 4355', 'Nondisplaced fracture of neck of other metacarpal bone, subsequent encounter for fracture with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (16, 'Ringsell', 'Keary', 'kringsellf@cdbaby.com', '831 532 4109', 'Toxic effect of copper and its compounds, accidental (unintentional); initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (17, 'Aynold', 'Will', 'waynoldg@facebook.com', '389 391 6174', 'Other specified injury of greater saphenous vein at lower leg level, left leg, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (18, 'Philippeaux', 'Giavani', 'gphilippeauxh@imdb.com', '153 219 4699', 'Corrosion of unspecified degree of unspecified site of unspecified lower limb, except ankle and foot', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (19, 'Rosberg', 'Kelcey', 'krosbergi@google.it', '187 440 3824', 'Other fracture of other metacarpal bone', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (20, 'Rault', 'Dev', 'draultj@rambler.ru', '109 462 3998', 'Other sprain of left shoulder joint, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (21, 'Hinze', 'Henka', 'hhinzek@whitehouse.gov', '733 717 9488', 'Displaced fracture of right tibial spine, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with nonunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (22, 'Hughlock', 'Stephine', 'shughlockl@geocities.jp', '326 752 4417', 'Unstable burst fracture of second lumbar vertebra, initial encounter for open fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (23, 'Bratcher', 'Doroteya', 'dbratcherm@bandcamp.com', '714 832 4268', 'Sprain of jaw, unspecified side, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (24, 'Hurndall', 'Marion', 'mhurndalln@dion.ne.jp', '644 510 1697', 'Panuveitis, right eye', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (25, 'Bartczak', 'Ula', 'ubartczako@artisteer.com', '867 810 1387', 'Adverse effect of antithrombotic drugs', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (26, 'Pimblett', 'Fransisco', 'fpimblettp@bbb.org', '551 183 3594', 'Open bite of abdominal wall, left lower quadrant with penetration into peritoneal cavity, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (27, 'Bastiman', 'Corie', 'cbastimanq@alexa.com', '160 962 6040', 'Occupant of animal-drawn vehicle injured in collision with fixed or stationary object', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (28, 'Van Son', 'Langsdon', 'lvansonr@ted.com', '719 201 0842', 'Corrosion of third degree of unspecified ear [any part, except ear drum], subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (29, 'Leithgoe', 'Bethany', 'bleithgoes@washingtonpost.com', '185 790 3759', 'Intentional self-harm by jumping or lying in front of motor vehicle, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (30, 'Watford', 'Ashton', 'awatfordt@stanford.edu', '281 773 0974', 'Laceration without foreign body of left lesser toe(s) with damage to nail, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (31, 'Snar', 'Gwenette', 'gsnaru@4shared.com', '964 611 7075', 'Other fracture of shaft of right ulna, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (32, 'Herries', 'Mehetabel', 'mherriesv@shareasale.com', '691 954 9013', 'Laceration of muscle(s) and tendon(s) of anterior muscle group at lower leg level, right leg, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (33, 'Maryan', 'Pamelina', 'pmaryanw@twitter.com', '954 260 8383', 'Nondisplaced lateral mass fracture of first cervical vertebra', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (34, 'Coldwell', 'Arvin', 'acoldwellx@mail.ru', '259 338 4851', 'Transection (partial) of abdomen, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (35, 'Guard', 'Fredrick', 'fguardy@jugem.jp', '762 664 4682', 'Superficial foreign body, unspecified ankle', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (36, 'Strotton', 'Vera', 'vstrottonz@prweb.com', '515 370 1588', 'Dislocation of metacarpophalangeal joint of left thumb, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (37, 'Zamorano', 'Jordan', 'jzamorano10@163.com', '121 156 0796', 'Combined immunodeficiencies', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (38, 'Scarasbrick', 'Jennee', 'jscarasbrick11@google.ca', '916 739 7557', 'Pneumonia due to staphylococcus', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (39, 'West', 'Warner', 'wwest12@example.com', '529 855 4348', 'Laceration of intrinsic muscle and tendon at ankle and foot level, right foot', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (40, 'Santarelli', 'Drugi', 'dsantarelli13@hugedomains.com', '313 818 1324', 'Other superficial bite of throat', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (41, 'Iuorio', 'Torrin', 'tiuorio14@php.net', '242 300 9133', 'Mechanical ectropion of eyelid', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (42, 'Jonsson', 'Gertrud', 'gjonsson15@shareasale.com', '424 877 7560', 'Other articular cartilage disorders, right elbow', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (43, 'Winnister', 'Colleen', 'cwinnister16@dion.ne.jp', '258 353 2612', 'Penetrating wound with foreign body of unspecified eyeball, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (44, 'Laidler', 'Heddie', 'hlaidler17@webeden.co.uk', '638 870 6276', 'Unspecified occupant of bus injured in collision with other nonmotor vehicle in nontraffic accident, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (45, 'Sommerton', 'Niven', 'nsommerton18@ft.com', '739 365 2968', 'Pedestrian on roller-skates injured in collision with two- or three-wheeled motor vehicle, unspecified whether traffic or nontraffic accident, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (46, 'Attoc', 'Geralda', 'gattoc19@nbcnews.com', '178 456 8075', 'Traumatic hemorrhage of cerebrum, unspecified, with loss of consciousness of any duration with death due to brain injury prior to regaining consciousness, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (47, 'Learned', 'Kirstin', 'klearned1a@meetup.com', '550 191 5486', 'Cystic eyeball', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (48, 'Tollemache', 'Christoper', 'ctollemache1b@google.ru', '701 766 5160', 'Pathological fracture, right ankle', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (49, 'Greatbatch', 'Tressa', 'tgreatbatch1c@sciencedirect.com', '210 601 2704', 'Epilepsy, unspecified, not intractable, without status epilepticus', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (50, 'Pol', 'Wayland', 'wpol1d@jiathis.com', '133 164 2519', 'Military operations involving other explosions and fragments, military personnel, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (51, 'Beels', 'Craig', 'cbeels1e@gmpg.org', '648 698 5413', 'Displaced transcondylar fracture of right humerus, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (52, 'Leipnik', 'Wandis', 'wleipnik1f@wisc.edu', '732 525 8552', 'Causalgia of unspecified upper limb', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (53, 'Derl', 'Karel', 'kderl1g@indiegogo.com', '803 843 3515', 'Complete traumatic amputation of unspecified great toe, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (54, 'Gosford', 'Else', 'egosford1h@issuu.com', '820 374 0361', 'Varicella [chickenpox]', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (55, 'McCarter', 'Selma', 'smccarter1i@engadget.com', '979 340 0311', 'Toxic effect of ethanol, undetermined, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (56, 'Yeatman', 'Odele', 'oyeatman1j@timesonline.co.uk', '651 965 7634', 'Other instability, hand', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (57, 'St. Hill', 'Emilee', 'esthill1k@yolasite.com', '891 528 5356', 'Unspecified injury of heart without hemopericardium, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (58, 'Habden', 'Nikolaus', 'nhabden1l@statcounter.com', '438 226 8369', 'Acute myeloid leukemia with 11q23-abnormality in remission', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (59, 'Ackroyd', 'Blaire', 'backroyd1m@comcast.net', '916 900 8076', 'Unspecified intracapsular fracture of left femur, initial encounter for open fracture type IIIA, IIIB, or IIIC', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (60, 'Angus', 'Merci', 'mangus1n@adobe.com', '489 782 8647', 'Nondisplaced fracture of unspecified ulna styloid process, subsequent encounter for open fracture type I or II with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (61, 'Menco', 'Linzy', 'lmenco1o@house.gov', '441 736 1944', 'Driver of heavy transport vehicle injured in collision with pedal cycle in nontraffic accident, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (62, 'Housaman', 'Pauli', 'phousaman1p@dailymail.co.uk', '811 907 0237', 'Hit or struck by falling object due to accident to water-skis', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (63, 'Hampstead', 'Torin', 'thampstead1q@wordpress.org', '246 673 9315', 'Polyhydramnios, unspecified trimester, fetus 3', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (64, 'McCorry', 'Sherlocke', 'smccorry1r@cdc.gov', '246 445 4969', 'Displaced fracture of proximal phalanx of unspecified thumb, subsequent encounter for fracture with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (65, 'Garford', 'Noelyn', 'ngarford1s@army.mil', '657 738 0489', 'Unspecified physeal fracture of phalanx of left toe', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (66, 'Woollhead', 'Deeanne', 'dwoollhead1t@goo.ne.jp', '469 657 4872', 'Displaced intertrochanteric fracture of right femur, subsequent encounter for closed fracture with delayed healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (67, 'Newson', 'Lynnell', 'lnewson1u@sfgate.com', '748 232 8283', 'Maternal care for unstable lie', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (68, 'Stienham', 'Gretal', 'gstienham1v@opera.com', '863 587 6912', 'Stable burst fracture of T9-T10 vertebra, subsequent encounter for fracture with routine healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (69, 'Aspital', 'Agustin', 'aaspital1w@hp.com', '707 195 1672', 'Other fracture of lower end of unspecified femur, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (70, 'O''Currigan', 'Hana', 'hocurrigan1x@yahoo.co.jp', '338 627 4740', 'Tubulo-interstitial nephropathy in systemic lupus erythematosus', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (71, 'Ager', 'Richmond', 'rager1y@nytimes.com', '547 651 0506', 'Burn of first degree of left toe(s) (nail); sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (72, 'O''Curran', 'Karalynn', 'kocurran1z@nasa.gov', '501 137 1885', 'Assault by paintball gun discharge, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (73, 'Cudiff', 'Maryann', 'mcudiff20@pinterest.com', '929 997 5135', 'Nondisplaced fracture of proximal phalanx of unspecified lesser toe(s); initial encounter for closed fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (74, 'Gothrup', 'Haleigh', 'hgothrup21@wisc.edu', '938 522 0139', 'Car driver injured in collision with other type car in traffic accident, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (75, 'Heller', 'Gabe', 'gheller22@uol.com.br', '420 404 5957', 'Unspecified physeal fracture of lower end of ulna, left arm, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (76, 'Durning', 'Nye', 'ndurning23@wikipedia.org', '937 174 5567', 'Nondisplaced intertrochanteric fracture of left femur, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with delayed healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (77, 'Graeber', 'Melania', 'mgraeber24@wp.com', '555 293 2480', 'Contaminated medical or biological substance administered by other means', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (78, 'Allison', 'Kenn', 'kallison25@telegraph.co.uk', '956 694 6197', 'Displaced fracture of neck of unspecified talus, initial encounter for open fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (79, 'Beardshall', 'Stevana', 'sbeardshall26@oracle.com', '182 825 5920', 'Military operations involving explosion of unspecified marine weapon, civilian', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (80, 'Flieg', 'Dean', 'dflieg27@dmoz.org', '233 660 4991', 'Other fracture of fourth lumbar vertebra, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (81, 'Edinburough', 'Gilbertine', 'gedinburough28@admin.ch', '393 641 8491', 'Plica syndrome', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (82, 'MacGaffey', 'Cherise', 'cmacgaffey29@liveinternet.ru', '362 766 0462', 'Toxic effect of carbon monoxide from unspecified source, accidental (unintentional); subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (83, 'Cleynman', 'Billie', 'bcleynman2a@4shared.com', '778 455 0459', 'Displaced fracture of proximal third of navicular [scaphoid] bone of left wrist', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (84, 'Casson', 'Emogene', 'ecasson2b@yolasite.com', '304 702 5955', 'Puncture wound without foreign body of lower back and pelvis with penetration into retroperitoneum, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (85, 'Gammidge', 'Fawn', 'fgammidge2c@ed.gov', '487 495 9506', 'Nondisplaced midcervical fracture of right femur, initial encounter for closed fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (86, 'Martinets', 'Phil', 'pmartinets2d@deviantart.com', '927 114 9489', 'Displaced fracture of hook process of hamate [unciform] bone, right wrist, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (87, 'Cussons', 'Hildegarde', 'hcussons2e@dailymotion.com', '735 773 1672', 'Maternal care for disproportion of mixed maternal and fetal origin, fetus 2', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (88, 'Alforde', 'Elnar', 'ealforde2f@sbwire.com', '330 605 4726', 'Primary blast injury of sigmoid colon, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (89, 'Duffy', 'Kassi', 'kduffy2g@vkontakte.ru', '319 378 1552', 'Pathological fracture in other disease, left shoulder, initial encounter for fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (90, 'Portal', 'Kienan', 'kportal2h@economist.com', '757 819 3456', 'Injury of cutaneous sensory nerve at hip and thigh level, left leg, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (91, 'Belliard', 'Milissent', 'mbelliard2i@ucla.edu', '754 614 9821', 'Acute bronchitis due to streptococcus', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (92, 'Alsford', 'Adina', 'aalsford2j@ft.com', '429 404 2441', 'Person on outside of three-wheeled motor vehicle injured in collision with railway train or railway vehicle in nontraffic accident', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (93, 'Dopson', 'Jacki', 'jdopson2k@flickr.com', '597 250 5697', 'Unspecified sprain of left foot, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (94, 'Margeram', 'Killian', 'kmargeram2l@ed.gov', '874 263 5805', 'Low-tension glaucoma, bilateral, moderate stage', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (95, 'Loreit', 'Kendrick', 'kloreit2m@360.cn', '113 202 4161', 'Person boarding or alighting a pedal cycle injured in collision with two- or three-wheeled motor vehicle', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (96, 'MacMeekan', 'Chrissy', 'cmacmeekan2n@friendfeed.com', '703 556 7073', 'Stress fracture, left femur, subsequent encounter for fracture with delayed healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (97, 'Cotterell', 'Dix', 'dcotterell2o@netlog.com', '647 583 3969', 'Nondisplaced fracture of base of third metacarpal bone, right hand, subsequent encounter for fracture with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (98, 'Joutapaitis', 'Melosa', 'mjoutapaitis2p@state.gov', '152 913 0766', 'Unspecified injury of ascending [right] colon, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (99, 'Coughan', 'Katleen', 'kcoughan2q@umn.edu', '152 960 8535', 'Nondisplaced osteochondral fracture of unspecified patella, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with routine healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (100, 'Garforth', 'Jeannie', 'jgarforth2r@mediafire.com', '448 913 6393', 'Continuing pregnancy after intrauterine death of one fetus or more, second trimester, not applicable or unspecified', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (101, 'Taborre', 'Robinett', 'rtaborre2s@nasa.gov', '199 222 4454', 'Open bite of other finger with damage to nail, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (102, 'Pree', 'Willow', 'wpree2t@uol.com.br', '480 941 3330', 'Other infections specific to the perinatal period', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (103, 'Tremblot', 'Tomlin', 'ttremblot2u@domainmarket.com', '509 877 3630', 'War operations involving unspecified fire, conflagration and hot substance, civilian, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (104, 'Pampling', 'Brnaba', 'bpampling2v@who.int', '462 171 4197', 'Foreign body in other and multiple parts of external eye, unspecified eye, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (105, 'Ciciari', 'Tommie', 'tciciari2w@youtu.be', '851 524 0237', 'Traumatic cerebral edema with loss of consciousness greater than 24 hours with return to pre-existing conscious level', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (106, 'Andriuzzi', 'Willis', 'wandriuzzi2x@wordpress.com', '850 368 2024', 'Contusion and laceration of cerebrum, unspecified, without loss of consciousness, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (107, 'Winteringham', 'Hebert', 'hwinteringham2y@multiply.com', '950 338 8105', 'Burn due to localized fire on board sailboat, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (108, 'Donner', 'Siward', 'sdonner2z@usatoday.com', '964 207 2574', 'Vesical fistula, not elsewhere classified', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (109, 'Francesconi', 'Sukey', 'sfrancesconi30@latimes.com', '550 482 5827', 'Transient synovitis, left ankle and foot', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (110, 'McFayden', 'Aimil', 'amcfayden31@wired.com', '706 663 2752', 'Other specified injury of unspecified blood vessel at shoulder and upper arm level', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (111, 'Camamill', 'Stephan', 'scamamill32@cdbaby.com', '233 590 1574', 'Other osteoporosis with current pathological fracture, left forearm, subsequent encounter for fracture with delayed healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (112, 'Corde', 'Willy', 'wcorde33@aboutads.info', '139 385 9422', 'Other injury of inferior vena cava, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (113, 'Soper', 'Marybeth', 'msoper34@utexas.edu', '151 301 3630', 'Displaced comminuted fracture of shaft of humerus, unspecified arm, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (114, 'Hollingshead', 'Halimeda', 'hhollingshead35@digg.com', '570 795 4612', 'Unspecified external cause status', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (115, 'Rapinett', 'Maggee', 'mrapinett36@multiply.com', '574 248 9096', 'Nondisplaced dome fracture of right talus, subsequent encounter for fracture with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (116, 'Bezants', 'Chico', 'cbezants37@scientificamerican.com', '778 612 7864', 'Passenger in pick-up truck or van injured in collision with unspecified motor vehicles in traffic accident', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (117, 'Halm', 'Stephi', 'shalm38@geocities.jp', '335 746 4066', 'Other specified noninflammatory disorders of vulva and perineum', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (118, 'Di Napoli', 'Audrie', 'adinapoli39@cam.ac.uk', '233 475 4891', 'Laceration with foreign body of unspecified front wall of thorax without penetration into thoracic cavity, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (119, 'Bouzek', 'Tyrus', 'tbouzek3a@chron.com', '652 267 9333', 'Strain of flexor muscle, fascia and tendon of unspecified thumb at forearm level', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (120, 'Bestwall', 'Abby', 'abestwall3b@shop-pro.jp', '597 444 1554', 'Partial traumatic transmetacarpal amputation of unspecified hand, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (121, 'D''Ambrosi', 'Forester', 'fdambrosi3c@umich.edu', '913 140 5460', 'Large plaque parapsoriasis', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (122, 'Bevar', 'Franz', 'fbevar3d@sitemeter.com', '200 113 9844', 'Pedal cycle driver injured in collision with other pedal cycle in nontraffic accident', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (123, 'Neilan', 'Luce', 'lneilan3e@addtoany.com', '661 448 7679', 'Unspecified injury of inferior mesenteric vein, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (124, 'Mayhow', 'Thaddus', 'tmayhow3f@newsvine.com', '793 337 5722', 'Dietary selenium deficiency', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (125, 'Swyre', 'Addia', 'aswyre3g@jalbum.net', '955 916 3727', 'Other female genital tract fistulae', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (126, 'Staresmeare', 'Truda', 'tstaresmeare3h@sourceforge.net', '548 397 0639', 'Blister (nonthermal); left knee, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (127, 'Brydson', 'Evelyn', 'ebrydson3i@nytimes.com', '682 673 2136', 'Nondisplaced fracture of lateral condyle of left humerus, subsequent encounter for fracture with routine healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (128, 'Jandourek', 'Clarke', 'cjandourek3j@imdb.com', '125 323 2584', 'External constriction, unspecified knee, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (129, 'Hydes', 'Torey', 'thydes3k@slideshare.net', '664 760 1813', 'Toxic effect of venom of other snake, accidental (unintentional); sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (130, 'Etteridge', 'Errick', 'eetteridge3l@nationalgeographic.com', '951 664 0545', 'Other intervertebral disc degeneration, thoracic region', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (131, 'Yateman', 'Tuesday', 'tyateman3m@aol.com', '492 287 3647', 'Necrosis of amputation stump, right upper extremity', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (132, 'Rubartelli', 'Byrle', 'brubartelli3n@deliciousdays.com', '154 181 4286', 'Nondisplaced oblique fracture of shaft of unspecified ulna, subsequent encounter for closed fracture with nonunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (133, 'Wigfield', 'Maddy', 'mwigfield3o@pbs.org', '520 193 7165', 'Activities involving climbing, rappelling and jumping off', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (134, 'O''Sheilds', 'Orel', 'oosheilds3p@1688.com', '213 748 7625', 'Unspecified injury of left thigh, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (135, 'Houldey', 'Charline', 'chouldey3q@noaa.gov', '705 356 9045', 'Bitten by pig, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (136, 'Snibson', 'Davine', 'dsnibson3r@nationalgeographic.com', '380 692 0896', 'Unspecified war operations occurring after cessation of hostilities, military personnel, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (137, 'Beagan', 'Henka', 'hbeagan3s@squarespace.com', '959 140 3225', 'Corrosion of first degree of right toe(s) (nail); subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (138, 'Meryett', 'Emelda', 'emeryett3t@abc.net.au', '819 419 5760', 'Displaced fracture of proximal phalanx of right lesser toe(s)', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (139, 'Blaiklock', 'Luelle', 'lblaiklock3u@alexa.com', '649 547 6388', 'Type 1 diabetes mellitus with circulatory complications', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (140, 'Cadwallader', 'Baxie', 'bcadwallader3v@ca.gov', '733 453 5690', 'Unspecified exotropia', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (141, 'Marchello', 'Cinnamon', 'cmarchello3w@livejournal.com', '529 480 8161', 'Corrosion of second degree of thigh', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (142, 'Esparza', 'Belinda', 'besparza3x@amazon.com', '783 776 1277', 'Salter-Harris Type IV physeal fracture of upper end of humerus, unspecified arm, subsequent encounter for fracture with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (143, 'Blasetti', 'Rosamund', 'rblasetti3y@patch.com', '532 438 9952', 'Congenital absence of ovary, unilateral', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (144, 'Orcas', 'Ado', 'aorcas3z@arizona.edu', '313 376 6451', 'Parachutist injured on landing, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (145, 'Orpen', 'Lola', 'lorpen40@un.org', '225 603 1629', 'Pedal cycle passenger injured in collision with other motor vehicles in traffic accident, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (146, 'Maypowder', 'Fidole', 'fmaypowder41@dell.com', '297 591 6355', 'Hallucinogen dependence', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (147, 'Bein', 'Shelden', 'sbein42@dropbox.com', '411 774 4668', 'Unspecified open wound of abdominal wall, left upper quadrant with penetration into peritoneal cavity', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (148, 'Charrington', 'Liane', 'lcharrington43@cyberchimps.com', '937 436 1232', 'Papyraceous fetus, unspecified trimester, fetus 3', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (149, 'Wilsee', 'Hinze', 'hwilsee44@yale.edu', '827 292 9059', 'Laceration of intercostal blood vessels', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (150, 'Portwain', 'Lettie', 'lportwain45@simplemachines.org', '482 208 6551', 'Sprain of unspecified part of right wrist and hand, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (151, 'Barbisch', 'Cathyleen', 'cbarbisch46@goo.gl', '413 350 5934', 'Felty''s syndrome, right hand', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (152, 'Heikkinen', 'Millicent', 'mheikkinen47@oracle.com', '494 230 5653', 'Unspecified fracture of the lower end of right radius, subsequent encounter for closed fracture with nonunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (153, 'Ottosen', 'Abran', 'aottosen48@stanford.edu', '282 507 8327', 'Laceration without foreign body of abdominal wall, epigastric region with penetration into peritoneal cavity', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (154, 'Millin', 'Elisha', 'emillin49@si.edu', '526 991 6260', 'Other injury of esophagus (thoracic part)', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (155, 'Cogman', 'Davon', 'dcogman4a@yahoo.com', '272 999 8056', 'Penetrating wound of orbit with or without foreign body, right eye, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (156, 'Stearndale', 'Gertrud', 'gstearndale4b@abc.net.au', '619 339 2317', 'Other lesions of median nerve, unspecified upper limb', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (157, 'Holhouse', 'Tobit', 'tholhouse4c@latimes.com', '573 406 1667', 'Corrosion of second degree of scapular region', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (158, 'Bolzmann', 'Gordie', 'gbolzmann4d@dyndns.org', '634 173 0122', 'Nondisplaced bimalleolar fracture of unspecified lower leg, subsequent encounter for open fracture type I or II with routine healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (159, 'Iuorio', 'Maggy', 'miuorio4e@lulu.com', '944 939 8909', 'Exotropia', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (160, 'Rickett', 'Ramonda', 'rrickett4f@xrea.com', '809 181 1739', 'Drug or chemical induced diabetes mellitus with severe nonproliferative diabetic retinopathy without macular edema, right eye', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (161, 'Featenby', 'Raffarty', 'rfeatenby4g@miitbeian.gov.cn', '220 193 3575', 'Poisoning by other laxatives, undetermined, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (162, 'Fennell', 'Francene', 'ffennell4h@wisc.edu', '493 408 5086', 'Deep vascularization of cornea, right eye', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (163, 'Menier', 'Elliot', 'emenier4i@miibeian.gov.cn', '475 117 7598', 'False labor, unspecified', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (164, 'Larmouth', 'Violet', 'vlarmouth4j@dyndns.org', '884 895 0838', 'Acute myringitis, unspecified ear', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (165, 'Dedden', 'Filbert', 'fdedden4k@mayoclinic.com', '720 775 7521', 'Unspecified dislocation of right sternoclavicular joint, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (166, 'Daintier', 'Kellia', 'kdaintier4l@oaic.gov.au', '751 266 8727', 'Breakdown (mechanical) of internal fixation device of bone of left lower leg, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (167, 'Pfeffle', 'Jamie', 'jpfeffle4m@google.nl', '119 701 3085', 'Cholera, unspecified', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (168, 'Breeze', 'Ulberto', 'ubreeze4n@slideshare.net', '225 946 7885', 'Chronic nephritic syndrome with diffuse mesangial proliferative glomerulonephritis', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (169, 'Podmore', 'Carmina', 'cpodmore4o@jiathis.com', '423 783 5544', 'Displaced fracture of neck of scapula, unspecified shoulder, subsequent encounter for fracture with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (170, 'Eastby', 'Skipper', 'seastby4p@wix.com', '519 329 5976', 'Toxic effect of other insecticides, undetermined, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (171, 'Utteridge', 'Becka', 'butteridge4q@canalblog.com', '281 900 7070', 'Displaced fracture of epiphysis (separation) (upper) of left femur, subsequent encounter for closed fracture with delayed healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (172, 'Maeer', 'Boone', 'bmaeer4r@shop-pro.jp', '716 515 1531', 'Congenital partial dislocation of hip, unilateral', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (173, 'Winspear', 'Aurore', 'awinspear4s@hp.com', '675 198 0021', 'Poisoning by other anti-common-cold drugs, accidental (unintentional); sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (174, 'Belleny', 'Norene', 'nbelleny4t@infoseek.co.jp', '939 182 5310', 'Displaced fracture of medial condyle of right humerus, subsequent encounter for fracture with nonunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (175, 'Neary', 'Clarabelle', 'cneary4u@unesco.org', '479 152 0400', 'Toxic reaction to local anesthesia during pregnancy, third trimester', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (176, 'Braben', 'Ilyse', 'ibraben4v@telegraph.co.uk', '877 645 8539', 'Laceration without foreign body of vocal cord, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (177, 'Veelers', 'Jarret', 'jveelers4w@archive.org', '120 163 5034', 'Corrosion of first degree of right thigh', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (178, 'Cudd', 'Pegeen', 'pcudd4x@ucoz.ru', '954 112 9571', 'Poisoning by centrally-acting and adrenergic-neuron-blocking agents, intentional self-harm, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (179, 'Rowthorn', 'Constanta', 'crowthorn4y@vkontakte.ru', '790 238 6187', 'Pedestrian on roller-skates injured in collision with railway train or railway vehicle in nontraffic accident, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (180, 'Gentry', 'Randy', 'rgentry4z@opera.com', '888 434 7419', 'Displaced fracture of lateral condyle of unspecified femur, subsequent encounter for closed fracture with routine healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (181, 'Meneer', 'Caressa', 'cmeneer50@histats.com', '643 396 3626', 'Other fascicular block', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (182, 'Baggaley', 'Kamillah', 'kbaggaley51@cdbaby.com', '261 909 7581', 'Nondisplaced fracture of coronoid process of right ulna, subsequent encounter for closed fracture with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (183, 'Low', 'Donia', 'dlow52@miitbeian.gov.cn', '210 340 0804', 'Continuing pregnancy after spontaneous abortion of one fetus or more, second trimester', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (184, 'Kinsman', 'Corly', 'ckinsman53@webeden.co.uk', '276 659 9318', 'Abnormal results of other function studies of central nervous system', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (185, 'Loweth', 'Emelina', 'eloweth54@narod.ru', '354 628 9650', 'Displaced segmental fracture of shaft of right tibia, subsequent encounter for closed fracture with nonunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (186, 'Feenan', 'Dolorita', 'dfeenan55@creativecommons.org', '835 472 6737', 'Sedative, hypnotic or anxiolytic dependence with intoxication delirium', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (187, 'Rushsorth', 'Langston', 'lrushsorth56@hugedomains.com', '197 952 8879', 'Cocaine dependence with intoxication with perceptual disturbance', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (188, 'Merrigan', 'Gordie', 'gmerrigan57@archive.org', '387 382 4748', 'Inhalant dependence', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (189, 'Penddreth', 'Georgeta', 'gpenddreth58@unc.edu', '695 312 2243', 'Burn of first degree of back of unspecified hand, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (190, 'Schukert', 'Melanie', 'mschukert59@biblegateway.com', '113 434 5859', 'Nondisplaced fracture of olecranon process without intraarticular extension of left ulna, subsequent encounter for open fracture type I or II with routine healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (191, 'O''Kuddyhy', 'Isiahi', 'iokuddyhy5a@paginegialle.it', '201 116 5845', 'Diabetes mellitus due to underlying condition without complications', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (192, 'Ollington', 'Dion', 'dollington5b@princeton.edu', '205 370 5767', 'Pedestrian on foot injured in collision with heavy transport vehicle or bus in nontraffic accident, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (193, 'Meekins', 'Elisabeth', 'emeekins5c@4shared.com', '134 390 2559', 'Benign neoplasm of bronchus and lung', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (194, 'Sampson', 'Lib', 'lsampson5d@ed.gov', '337 676 6716', 'Tobacco abuse counseling', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (195, 'Keefe', 'Ashley', 'akeefe5e@cbsnews.com', '675 815 0204', 'Poisoning by other antidysrhythmic drugs, intentional self-harm, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (196, 'Tatterton', 'Berkie', 'btatterton5f@geocities.jp', '780 226 8876', 'Postthrombotic syndrome with inflammation of bilateral lower extremity', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (197, 'Ruddin', 'Micah', 'mruddin5g@netlog.com', '795 580 4741', 'Personal history of malignant neoplasms of other organs and systems', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (198, 'Tripean', 'Michel', 'mtripean5h@comsenz.com', '279 428 4851', 'Pathological fracture, right radius, subsequent encounter for fracture with delayed healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (199, 'McPartling', 'Ronica', 'rmcpartling5i@bing.com', '303 792 6288', 'Rheumatoid lung disease with rheumatoid arthritis of right knee', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (200, 'Willoughby', 'Prent', 'pwilloughby5j@123-reg.co.uk', '313 355 0728', 'Burn of third degree of multiple sites of right lower limb, except ankle and foot, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (201, 'Argontt', 'Glynis', 'gargontt5k@amazonaws.com', '928 807 0741', 'Nondisplaced fracture of greater trochanter of unspecified femur, subsequent encounter for closed fracture with delayed healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (202, 'Labusquiere', 'Hephzibah', 'hlabusquiere5l@archive.org', '681 739 4612', 'LeFort III fracture, subsequent encounter for fracture with delayed healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (203, 'Dudhill', 'Lyn', 'ldudhill5m@nyu.edu', '128 385 0622', 'Pressure ulcer of other site, unstageable', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (204, 'Tofanini', 'Myrtice', 'mtofanini5n@businesswire.com', '476 782 7861', 'Lymphocyte depleted Hodgkin lymphoma, lymph nodes of axilla and upper limb', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (205, 'McGettigan', 'Carolyne', 'cmcgettigan5o@soundcloud.com', '655 844 3152', 'Displacement of urinary electronic stimulator device', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (206, 'Jacobovitz', 'Teodora', 'tjacobovitz5p@bloglovin.com', '347 381 8049', 'Embryonic cyst of cervix', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (207, 'Kennealy', 'Pren', 'pkennealy5q@si.edu', '135 315 3814', 'Exposure to other animate mechanical forces', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (208, 'Shaw', 'Karlyn', 'kshaw5r@mac.com', '316 731 6138', 'Personal history of (corrected) congenital malformations of eye', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (209, 'Malzard', 'Emmet', 'emalzard5s@washington.edu', '988 305 9610', 'Laceration of unspecified urinary and pelvic organ', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (210, 'Twelftree', 'Bentlee', 'btwelftree5t@sfgate.com', '247 894 9814', 'Moderate laceration of head of pancreas, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (211, 'Spellard', 'Gabi', 'gspellard5u@ow.ly', '160 395 1044', 'Other mechanical complication of other internal orthopedic devices, implants and grafts', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (212, 'Ricardo', 'Kristin', 'kricardo5v@odnoklassniki.ru', '528 821 0289', 'Coxa plana, unspecified hip', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (213, 'MacKeig', 'Merry', 'mmackeig5w@sciencedirect.com', '954 433 8346', 'Toxic effect of petroleum products, accidental (unintentional)', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (214, 'Pennicott', 'Benjy', 'bpennicott5x@examiner.com', '775 427 6627', 'Injury of left internal carotid artery, intracranial portion, not elsewhere classified with loss of consciousness of any duration with death due to brain injury prior to regaining consciousness, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (215, 'Gray', 'Wylie', 'wgray5y@list-manage.com', '624 404 6023', 'Contracture of muscle, left thigh', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (216, 'Corrin', 'Inesita', 'icorrin5z@sakura.ne.jp', '946 725 1942', 'Other contact with other nonvenomous reptiles', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (217, 'Ramelot', 'Dorise', 'dramelot60@hexun.com', '165 106 3316', 'Maternal care for viable fetus in abdominal pregnancy, unspecified trimester, fetus 2', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (218, 'Tewkesberrie', 'Elisabetta', 'etewkesberrie61@i2i.jp', '328 313 3911', 'Puncture wound with foreign body of left wrist, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (219, 'Buttler', 'Royce', 'rbuttler62@unesco.org', '943 490 1337', 'Pathological fracture, unspecified hand, subsequent encounter for fracture with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (220, 'Pickvance', 'Ivan', 'ipickvance63@example.com', '117 942 8770', 'Age-related osteoporosis with current pathological fracture, right forearm, subsequent encounter for fracture with nonunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (221, 'Hurkett', 'Gorden', 'ghurkett64@ted.com', '777 375 3710', 'Nondisplaced fracture of anterior process of left calcaneus, subsequent encounter for fracture with malunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (222, 'Georgiev', 'Cindelyn', 'cgeorgiev65@washington.edu', '261 385 0179', 'Minor laceration of right internal jugular vein, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (223, 'Drayson', 'Hershel', 'hdrayson66@tripod.com', '365 808 2532', 'Galeazzi''s fracture of left radius', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (224, 'Wohlers', 'Joeann', 'jwohlers67@zdnet.com', '269 972 2027', 'Unspecified infantile and juvenile cataract', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (225, 'Gringley', 'Louella', 'lgringley68@senate.gov', '337 997 4652', 'Poisoning by pertussis vaccine, including combinations with a pertussis component, accidental (unintentional); initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (226, 'Klempke', 'Farris', 'fklempke69@independent.co.uk', '612 614 5812', 'Articular disc disorder of left temporomandibular joint', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (227, 'O''Donoghue', 'Berry', 'bodonoghue6a@independent.co.uk', '397 241 6597', 'Crepitant synovitis (acute) (chronic); unspecified wrist', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (228, 'Rowden', 'Wandis', 'wrowden6b@ucla.edu', '437 133 7625', 'Nondisplaced unspecified fracture of left great toe, initial encounter for open fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (229, 'Morriss', 'Pascale', 'pmorriss6c@amazon.co.jp', '325 244 9108', 'Poisoning by anthelminthics, accidental (unintentional)', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (230, 'Cordero', 'Stafford', 'scordero6d@reddit.com', '702 916 1297', 'Unspecified fracture of T11-T12 vertebra, subsequent encounter for fracture with nonunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (231, 'Chadderton', 'Kendall', 'kchadderton6e@tripod.com', '495 707 8454', 'War operations involving biological weapons, military personnel, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (232, 'Robins', 'Lotty', 'lrobins6f@blog.com', '269 193 0456', 'Major laceration of internal jugular vein', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (233, 'Womersley', 'Leonidas', 'lwomersley6g@godaddy.com', '483 750 9124', 'Other fracture of upper end of left tibia, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with delayed healing', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (234, 'Gilbanks', 'Goraud', 'ggilbanks6h@nhs.uk', '420 533 4682', 'Child psychological abuse, confirmed, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (235, 'Brickner', 'Shayne', 'sbrickner6i@nationalgeographic.com', '263 584 0124', 'Adverse effect of other antihypertensive drugs, subsequent encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (236, 'Kinkaid', 'Joeann', 'jkinkaid6j@opera.com', '554 871 5589', 'Nondisplaced comminuted fracture of shaft of right femur', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (237, 'Mathonnet', 'Adoree', 'amathonnet6k@netlog.com', '540 304 0968', 'Infections of urethra in pregnancy', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (238, 'Stert', 'Vina', 'vstert6l@freewebs.com', '280 860 2836', 'Nondisplaced longitudinal fracture of unspecified patella, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with nonunion', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (239, 'Choat', 'Lotty', 'lchoat6m@apache.org', '414 515 5168', 'Unspecified choroidal hemorrhage, left eye', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (240, 'Mattingson', 'Gordan', 'gmattingson6n@mlb.com', '408 866 4377', 'Other fracture of upper end of unspecified radius, initial encounter for closed fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (241, 'Alberti', 'Mame', 'malberti6o@w3.org', '708 575 8804', 'Interstitial myositis, left ankle and foot', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (242, 'Traill', 'Lars', 'ltraill6p@disqus.com', '875 915 0027', 'Poisoning by unspecified agents primarily acting on the respiratory system, intentional self-harm', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (243, 'Joplin', 'Agnella', 'ajoplin6q@devhub.com', '730 418 1339', 'Anisocoria', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (244, 'Seignior', 'Cash', 'cseignior6r@springer.com', '962 500 7758', 'Asphyxiation due to mechanical threat to breathing due to other causes, intentional self-harm, initial encounter', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (245, 'Facer', 'Florrie', 'ffacer6s@dedecms.com', '192 820 9887', 'Fracture of unspecified metatarsal bone(s); left foot, initial encounter for closed fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (246, 'Clegg', 'Swen', 'sclegg6t@yahoo.com', '783 656 9209', 'Nondisplaced fracture of anterior column [iliopubic] of left acetabulum, initial encounter for open fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (247, 'de Villier', 'Lana', 'ldevillier6u@addtoany.com', '279 242 7875', 'Nondisplaced fracture of shaft of fifth metacarpal bone, right hand', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (248, 'Rydzynski', 'Francois', 'frydzynski6v@usa.gov', '683 401 8672', 'Other mechanical complication of other cardiac electronic device, sequela', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (249, 'Meadowcroft', 'Aida', 'ameadowcroft6w@meetup.com', '901 423 6154', 'Other traumatic nondisplaced spondylolisthesis of sixth cervical vertebra, initial encounter for open fracture', 'ACTIF');
INSERT INTO `ely_client` (`CLI_ID`, `CLI_NOM`, `CLI_PRENOM`, `CLI_EMAIL`, `CLI_TEL`, `CLI_DESCRIPTION`, `CLI_STATUT`) VALUES (250, 'Rockhall', 'Perri', 'prockhall6x@pbs.org', '785 306 1927', 'Displaced fracture of distal phalanx of left middle finger, subsequent encounter for fracture with delayed healing', 'ACTIF');


-- Fin Maxime

--Connexion Victor
CREATE TABLE `ely_image` (
  `IMG_ID` int(6) NOT NULL,
  `ART_ID` int(3) DEFAULT NULL,
  `IMG_CHEMIN` varchar(1500) NOT NULL,
  `IMG_NAME` varchar(255) DEFAULT NULL,
  `IMG_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_image`
--

INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(4, 7, 'Ressources/Boutique/1602659135-Palmolive Healthy & Smooth-1.png', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(9, 5, 'Ressources/Boutique/1602658929-Pantene Pro-V-1.png', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(13, 1, 'Ressources/Boutique/1602658348-Head & Shoulders Cool menthol-1.png', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(22, 3, 'Ressources/Boutique/1602658689-Colo Rista Hair Mekeup-1.jpg', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(25, 2, 'Ressources/Boutique/1602658498-Kerastase Nutritive-1.png', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(27, 6, 'Ressources/Boutique/1602659066-Nivea-1.png', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(31, 5, 'Ressources/Boutique/1602658929-Pantene Pro-V-2.jpg', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(33, 8, 'Ressources/Boutique/1602659216-Fahrenheit-1.png', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(40, 2, 'Ressources/Boutique/1602658564-Kerastase Nutritive-1.png', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(41, 3, 'Ressources/Boutique/1602658689-Colo Rista Hair Mekeup-2.jpg', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(76, 4, 'Ressources/Boutique/1602658812-Bain d\'huires de fleurs multi-usages-1.jpg', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(77, 4, 'Ressources/Boutique/1602658812-Bain d\'huires de fleurs multi-usages-2.jpg', '', 'ACTIF');
INSERT INTO `ely_image` (`IMG_ID`, `ART_ID`, `IMG_CHEMIN`, `IMG_NAME`, `IMG_STATUT`) VALUES
(78, 6, 'Ressources/Boutique/1602659066-Nivea-1.png', '', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_article`
--

CREATE TABLE `ely_article` (
  `ART_ID` int(3) NOT NULL,
  `ART_NOM` varchar(30) NOT NULL,
  `ART_PRIX` int(5) NOT NULL,
  `ART_MARQUE` varchar(50) NOT NULL,
  `ART_QTE_STOCK` int(5) NOT NULL,
  `ART_DESCRIPTION` varchar(500) NOT NULL,
  `ART_CATEGORIE` varchar(50) NOT NULL,
  `ART_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_article`
--

INSERT INTO `ely_article` (`ART_ID`, `ART_NOM`, `ART_PRIX`, `ART_MARQUE`, `ART_QTE_STOCK`, `ART_DESCRIPTION`, `ART_CATEGORIE`, `ART_STATUT`) VALUES
(1, 'Head & Shoulders Cool menthol', 15, 'Head & Shoulders', 20, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen', 'Shampooing', 'ACTIF');
INSERT INTO `ely_article` (`ART_ID`, `ART_NOM`, `ART_PRIX`, `ART_MARQUE`, `ART_QTE_STOCK`, `ART_DESCRIPTION`, `ART_CATEGORIE`, `ART_STATUT`) VALUES
(2, 'Kerastase Nutritive', 20, 'Bain Satin 2', 5, 'Unspecified fracture of shaft of left tibia, subsequent encounter for closed fracture with malunion', 'Shampooing', 'ACTIF');
INSERT INTO `ely_article` (`ART_ID`, `ART_NOM`, `ART_PRIX`, `ART_MARQUE`, `ART_QTE_STOCK`, `ART_DESCRIPTION`, `ART_CATEGORIE`, `ART_STATUT`) VALUES
(3, 'Colo Rista Hair Mekeup', 12, 'L\'Oreal Paris', 20, 'Other infective (teno)synovitis, hip', 'Teinture', 'ACTIF');
INSERT INTO `ely_article` (`ART_ID`, `ART_NOM`, `ART_PRIX`, `ART_MARQUE`, `ART_QTE_STOCK`, `ART_DESCRIPTION`, `ART_CATEGORIE`, `ART_STATUT`) VALUES
(4, 'Quebec Uniform', 23, 'Hayes-Hilpert', 19, 'Chronic inflammation of postmastoidectomy cavity', 'Soin des cheveux', 'ACTIF');
INSERT INTO `ely_article` (`ART_ID`, `ART_NOM`, `ART_PRIX`, `ART_MARQUE`, `ART_QTE_STOCK`, `ART_DESCRIPTION`, `ART_CATEGORIE`, `ART_STATUT`) VALUES
(5, 'Pantene Pro-V', 34, 'Panetene', 3, 'Displacement of other prosthetic devices, implants and grafts of genital tract', 'Shampooing', 'ACTIF')
INSERT INTO `ely_article` (`ART_ID`, `ART_NOM`, `ART_PRIX`, `ART_MARQUE`, `ART_QTE_STOCK`, `ART_DESCRIPTION`, `ART_CATEGORIE`, `ART_STATUT`) VALUES
(6, 'Nivea', 50, 'Strong Power', 10, 'Subluxation of radiocarpal joint of right wrist', 'Shampooing', 'ACTIF');
INSERT INTO `ely_article` (`ART_ID`, `ART_NOM`, `ART_PRIX`, `ART_MARQUE`, `ART_QTE_STOCK`, `ART_DESCRIPTION`, `ART_CATEGORIE`, `ART_STATUT`) VALUES
(7, 'Palmolive Healthy & Smooth', 21, 'Palmolive', 5, 'Unspecified injury of muscle(s) and tendon(s) of anterior muscle group at lower leg level, right leg, initial encounter', 'Soin des cheveux', 'ACTIF');
INSERT INTO `ely_article` (`ART_ID`, `ART_NOM`, `ART_PRIX`, `ART_MARQUE`, `ART_QTE_STOCK`, `ART_DESCRIPTION`, `ART_CATEGORIE`, `ART_STATUT`) VALUES
(8, 'Fahrenheit', 60, 'Fahrenheit', 14, 'Corrosion of first degree of left scapular region, sequela', 'Soin des cheveux', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_client`
--


-- --------------------------------------------------------

--
-- Structure de la table `ely_coiffeur`
--

CREATE TABLE `ely_coiffeur` (
  `COI_ID` int(2) NOT NULL,
  `COI_NOM` varchar(30) NOT NULL,
  `COI_PRENOM` varchar(30) NOT NULL,
  `COI_MAIL` varchar(70) NOT NULL,
  `COI_MDP` varchar(50) NOT NULL,
  `COI_NUMTEL` varchar(20) NOT NULL,
  `COI_PHOTO` varchar(500) DEFAULT NULL,
  `COI_POSTE` varchar(25) DEFAULT NULL,
  `COI_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_coiffeur`
--

INSERT INTO `ely_coiffeur` (`COI_ID`, `COI_NOM`, `COI_PRENOM`, `COI_MAIL`, `COI_MDP`, `COI_NUMTEL`, `COI_PHOTO`, `COI_POSTE`, `COI_STATUT`) VALUES
(1, 'Perrod', 'Maxime', 'elv-maxime.prrd@eduge.ch', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '07812912818', 'Ressources/Photo de profil/1602657671-Perrod.png', 'Patronne', 'ACTIF');
INSERT INTO `ely_coiffeur` (`COI_ID`, `COI_NOM`, `COI_PRENOM`, `COI_MAIL`, `COI_MDP`, `COI_NUMTEL`, `COI_PHOTO`, `COI_POSTE`, `COI_STATUT`) VALUES
(2, 'De Sousa', 'Victor', 'victor.dss@eduge.ch', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '791234567', 'Ressources/Photo de profil/1602657680-De Sousa.png', 'Coiffeur superieur', 'ACTIF');
INSERT INTO `ely_coiffeur` (`COI_ID`, `COI_NOM`, `COI_PRENOM`, `COI_MAIL`, `COI_MDP`, `COI_NUMTEL`, `COI_PHOTO`, `COI_POSTE`, `COI_STATUT`) VALUES
(3, 'Jarod', 'Komivi', 'jarodmanuel5@gmail.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '791234567', 'Ressources/Photo de profil/1602657688-Jarod.png', 'Coiffeur', 'ACTIF');
INSERT INTO `ely_coiffeur` (`COI_ID`, `COI_NOM`, `COI_PRENOM`, `COI_MAIL`, `COI_MDP`, `COI_NUMTEL`, `COI_PHOTO`, `COI_POSTE`, `COI_STATUT`) VALUES
(4, 'Becky', 'Wells', '\r\nBeckyCWells@teleworm.us', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '0799912341', 'Ressources/Photo de profil/1602657695-Becky.png', 'Coiffeur', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_coiffeur_tranchesh`
--

CREATE TABLE `ely_coiffeur_tranchesh` (
  `coi_id` int(255) NOT NULL,
  `tra_id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_coiffeur_tranchesh`
--

INSERT INTO `ely_coiffeur_tranchesh` (`coi_id`, `tra_id`) VALUES(1, 1);
INSERT INTO `ely_coiffeur_tranchesh` (`coi_id`, `tra_id`) VALUES(1, 2);
INSERT INTO `ely_coiffeur_tranchesh` (`coi_id`, `tra_id`) VALUES(1, 3);
INSERT INTO `ely_coiffeur_tranchesh` (`coi_id`, `tra_id`) VALUES(1, 4);
INSERT INTO `ely_coiffeur_tranchesh` (`coi_id`, `tra_id`) VALUES(1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `ely_diplome`
--

CREATE TABLE `ely_diplome` (
  `DIP_ID` int(3) NOT NULL,
  `COI_ID` int(2) NOT NULL,
  `DIP_NOM` varchar(30) NOT NULL,
  `DIP_DATE_OBTENTION` date NOT NULL,
  `DIP_PHOTO` varchar(500) NOT NULL,
  `DIP_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_diplome`
--

INSERT INTO `ely_diplome` (`DIP_ID`, `COI_ID`, `DIP_NOM`, `DIP_DATE_OBTENTION`, `DIP_PHOTO`, `DIP_STATUT`) VALUES(11, 1, 'Certificat - Jungle fever', '2012-05-21', 'Ressources/Diplome/1600239901-Certificat - Jungle fever.jpg', 'ACTIF');
INSERT INTO `ely_diplome` (`DIP_ID`, `COI_ID`, `DIP_NOM`, `DIP_DATE_OBTENTION`, `DIP_PHOTO`, `DIP_STATUT`) VALUES(12, 1, 'Diplome Dudenko', '2001-08-17', 'Ressources/Diplome/1600239926-Diplome Dudenko.jpg', 'ACTIF');
INSERT INTO `ely_diplome` (`DIP_ID`, `COI_ID`, `DIP_NOM`, `DIP_DATE_OBTENTION`, `DIP_PHOTO`, `DIP_STATUT`) VALUES(13, 1, 'Diplome Painting Spotlight', '2015-09-11', 'Ressources/Diplome/1600239952-Diplome Painting Spotlight.jpg', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_para_descrip`
--

CREATE TABLE `ely_para_descrip` (
  `DES_ID` int(5) NOT NULL,
  `COI_ID` int(2) NOT NULL,
  `DES_TITRE` varchar(25) NOT NULL,
  `DES_TEXTE` varchar(500) NOT NULL,
  `DES_ORDRE` int(2) NOT NULL,
  `DES_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_para_descrip`
--

INSERT INTO `ely_para_descrip` (`DES_ID`, `COI_ID`, `DES_TITRE`, `DES_TEXTE`, `DES_ORDRE`, `DES_STATUT`) VALUES
(2, 1, 'Lorem ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sh', 3, 'ACTIF');
INSERT INTO `ely_para_descrip` (`DES_ID`, `COI_ID`, `DES_TITRE`, `DES_TEXTE`, `DES_ORDRE`, `DES_STATUT`) VALUES
(3, 1, 'Lorem ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was ', 1, 'ACTIF');
INSERT INTO `ely_para_descrip` (`DES_ID`, `COI_ID`, `DES_TITRE`, `DES_TEXTE`, `DES_ORDRE`, `DES_STATUT`) VALUES
(27, 1, 'Lorem ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem', 2, 'ACTIF');
INSERT INTO `ely_para_descrip` (`DES_ID`, `COI_ID`, `DES_TITRE`, `DES_TEXTE`, `DES_ORDRE`, `DES_STATUT`) VALUES
(31, 2, 'Lorem ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Let', 1, 'ACTIF');
INSERT INTO `ely_para_descrip` (`DES_ID`, `COI_ID`, `DES_TITRE`, `DES_TEXTE`, `DES_ORDRE`, `DES_STATUT`) VALUES
(32, 3, 'Lorem', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Let', 1, 'ACTIF');
INSERT INTO `ely_para_descrip` (`DES_ID`, `COI_ID`, `DES_TITRE`, `DES_TEXTE`, `DES_ORDRE`, `DES_STATUT`) VALUES
(33, 2, 'Lorem ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Let', 2, 'ACTIF');
INSERT INTO `ely_para_descrip` (`DES_ID`, `COI_ID`, `DES_TITRE`, `DES_TEXTE`, `DES_ORDRE`, `DES_STATUT`) VALUES
(35, 4, 'Lorem', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Let', 1, 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_pause_periode`
--

CREATE TABLE `ely_pause_periode` (
  `PER_ID` int(255) NOT NULL,
  `COI_ID` int(255) NOT NULL,
  `PAU_DESCRIPTION` varchar(50) NOT NULL,
  `PAU_STATUT` varchar(10) NOT NULL DEFAULT 'ACTIF'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_pause_periode`
--

INSERT INTO `ely_pause_periode` (`PER_ID`, `COI_ID`, `PAU_DESCRIPTION`, `PAU_STATUT`) VALUES(3, 1, 'Absent', 'ACTIF');
INSERT INTO `ely_pause_periode` (`PER_ID`, `COI_ID`, `PAU_DESCRIPTION`, `PAU_STATUT`) VALUES(4, 1, 'Absent', 'ACTIF');
INSERT INTO `ely_pause_periode` (`PER_ID`, `COI_ID`, `PAU_DESCRIPTION`, `PAU_STATUT`) VALUES(15, 2, 'test', 'ACTIF');
INSERT INTO `ely_pause_periode` (`PER_ID`, `COI_ID`, `PAU_DESCRIPTION`, `PAU_STATUT`) VALUES(16, 2, 'fd', 'ACTIF');
INSERT INTO `ely_pause_periode` (`PER_ID`, `COI_ID`, `PAU_DESCRIPTION`, `PAU_STATUT`) VALUES(17, 2, 'test', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_periode`
--

CREATE TABLE `ely_periode` (
  `PER_ID` int(20) NOT NULL,
  `PER_DATE` date NOT NULL,
  `PER_HEURE_MIN_DEBUT` time NOT NULL,
  `PER_HEURE_MIN_FIN` time NOT NULL,
  `PER_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_periode`
--

INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(1, '2020-10-05', '08:30:00', '09:30:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(2, '2020-10-05', '09:45:00', '10:30:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(3, '2020-10-06', '09:30:00', '10:45:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(4, '2020-10-05', '10:30:00', '11:30:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(6, '2020-10-10', '17:45:00', '19:45:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(7, '2020-10-10', '17:45:00', '19:45:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(8, '2020-10-10', '12:00:00', '12:30:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(9, '2020-10-10', '12:00:00', '12:30:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(15, '2020-10-12', '11:30:00', '12:00:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(16, '2020-10-12', '09:00:00', '09:30:00', 'ACTIF');
INSERT INTO `ely_periode` (`PER_ID`, `PER_DATE`, `PER_HEURE_MIN_DEBUT`, `PER_HEURE_MIN_FIN`, `PER_STATUT`) VALUES(17, '2020-10-12', '13:00:00', '13:30:00', 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_recupmdp`
--

CREATE TABLE `ely_recupmdp` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_recupmdp`
--

INSERT INTO `ely_recupmdp` (`id`, `mail`, `code`, `confirme`) VALUES(16, 'jarodmanuel5@gmail.com', 151049774, 1);
INSERT INTO `ely_recupmdp` (`id`, `mail`, `code`, `confirme`) VALUES(15, 'elv-maxime.prrd@eduge.ch', 455420302, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ely_rendezvous`
--

CREATE TABLE `ely_rendezvous` (
  `RDV_ID` int(10) NOT NULL,
  `COI_ID` int(2) NOT NULL,
  `CLI_ID` int(6) NOT NULL,
  `RDV_DESCRIPTION` varchar(500) DEFAULT NULL,
  `RDV_PRIX` int(5) NOT NULL,
  `RDV_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_rendezvous`
--

INSERT INTO `ely_rendezvous` (`RDV_ID`, `COI_ID`, `CLI_ID`, `RDV_DESCRIPTION`, `RDV_PRIX`, `RDV_STATUT`) VALUES(1, 1, 1, '123123212', 1232, 'ACTIF');
INSERT INTO `ely_rendezvous` (`RDV_ID`, `COI_ID`, `CLI_ID`, `RDV_DESCRIPTION`, `RDV_PRIX`, `RDV_STATUT`) VALUES(2, 1, 1, 'TEST', 21, 'ACTIF');
INSERT INTO `ely_rendezvous` (`RDV_ID`, `COI_ID`, `CLI_ID`, `RDV_DESCRIPTION`, `RDV_PRIX`, `RDV_STATUT`) VALUES(3, 1, 23, NULL, 30, 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_service`
--

CREATE TABLE `ely_service` (
  `SER_ID` int(3) NOT NULL,
  `SER_NOM` varchar(100) NOT NULL,
  `SER_TYPE` varchar(50) DEFAULT NULL,
  `SER_PRIX` int(5) NOT NULL,
  `SER_DESCRIPTION` varchar(500) NOT NULL,
  `SER_TEMPS_ESTIMATION` int(5) NOT NULL,
  `SER_STATUT` varchar(25) NOT NULL DEFAULT 'ACTIF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_service`
--

INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(1, 'Femme', 'Coupe', 85, 'Coupe de cheveux pour les femmes', 100, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(2, 'Homme', 'Coupe', 45, 'Coupe de cheveux pour les hommes', 45, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(3, 'Enfant', 'Coupe', 30, 'Coupe de cheveu pour enfant', 30, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(4, 'Coloration des racines', 'Beaute des cheveux', 80, 'Coloration des racines', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(5, 'Meche', 'Beaute des cheveux', 150, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(6, 'Balayage', 'Beaute des cheveux', 150, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(9, 'Shatush', 'Beaute des cheveux', 150, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(11, 'Nika', 'Autre', 100, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(12, 'Pastel', 'Beaute des cheveux', 60, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(14, 'Lebel', 'Soin', 100, '', 120, 'ACTIF');
INSERT INTO `ely_service` (`SER_ID`, `SER_NOM`, `SER_TYPE`, `SER_PRIX`, `SER_DESCRIPTION`, `SER_TEMPS_ESTIMATION`, `SER_STATUT`) VALUES(15, 'Joyko', 'Soin', 50, '', 100, 'ACTIF');

-- --------------------------------------------------------

--
-- Structure de la table `ely_trancheshoraires`
--

CREATE TABLE `ely_trancheshoraires` (
  `tra_id` int(10) NOT NULL,
  `coi_id` int(11) NOT NULL,
  `tra_jour` varchar(255) NOT NULL,
  `tra_heureDebutMatin` time DEFAULT NULL,
  `tra_heureFinMatin` time DEFAULT NULL,
  `tra_heureDebutAprem` time DEFAULT NULL,
  `tra_heureFinAprem` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ely_trancheshoraires`
--

INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(1, 1, 'Lundi', '08:00:00', '12:30:00', '13:00:00', '17:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(2, 1, 'Mardi', '09:00:00', '13:00:00', NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(3, 1, 'Jeudi', '08:00:00', '11:30:00', '13:30:00', '20:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(4, 1, 'Vendredi', '08:00:00', '12:00:00', '13:00:00', '17:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(5, 1, 'Samedi', NULL, NULL, '12:00:00', '18:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(6, 1, 'Dimanche', NULL, NULL, NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(7, 1, 'Mercredi', NULL, NULL, NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(8, 2, 'Lundi', '09:00:00', '12:00:00', '13:00:00', '16:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(9, 2, 'Mardi', '08:00:00', '11:30:00', '13:30:00', '17:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(10, 2, 'Mercredi', '09:30:00', '12:45:00', '14:00:00', '18:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(11, 2, 'Jeudi', NULL, NULL, NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(12, 2, 'Vendredi', '09:30:00', '12:30:00', NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(13, 2, 'Samedi', NULL, NULL, '13:30:00', '17:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(14, 2, 'Dimanche', NULL, NULL, NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(15, 3, 'Lundi', NULL, NULL, NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(16, 3, 'Mardi', '08:00:00', '13:00:00', '14:00:00', NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(17, 3, 'Mercredi', '08:00:00', '12:00:00', '13:00:00', '17:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(18, 3, 'Jeudi', NULL, NULL, NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(19, 3, 'Vendredi', '09:30:00', '13:00:00', NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(20, 3, 'Samedi', '10:00:00', '14:00:00', '16:00:00', '18:00:00');
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(21, 3, 'Dimanche', NULL, NULL, NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(22, 4, 'Lundi', '09:00:00', '12:30:00', '13:00:00', NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(23, 4, 'Mardi', '09:00:00', '12:30:00', '13:00:00', NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(24, 4, 'Mercredi', '09:00:00', '12:30:00', NULL, NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(25, 4, 'Jeudi', '09:00:00', '12:30:00', '13:30:00', NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(26, 4, 'Vendredi', '08:15:00', '12:30:00', '13:30:00', NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(27, 4, 'Samedi', NULL, NULL, '12:30:00', NULL);
INSERT INTO `ely_trancheshoraires` (`tra_id`, `coi_id`, `tra_jour`, `tra_heureDebutMatin`, `tra_heureFinMatin`, `tra_heureDebutAprem`, `tra_heureFinAprem`) VALUES(28, 4, 'Dimanche', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rdv_periode`
--

CREATE TABLE `rdv_periode` (
  `RDV_ID` int(10) NOT NULL,
  `PER_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv_periode`
--

INSERT INTO `rdv_periode` (`RDV_ID`, `PER_ID`) VALUES(1, 1);
INSERT INTO `rdv_periode` (`RDV_ID`, `PER_ID`) VALUES(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `rdv_service`
--

CREATE TABLE `rdv_service` (
  `SER_ID` int(3) NOT NULL,
  `RDV_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv_service`
--

INSERT INTO `rdv_service` (`SER_ID`, `RDV_ID`) VALUES(15, 1);
INSERT INTO `rdv_service` (`SER_ID`, `RDV_ID`) VALUES(12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `service_coiffeur`
--

CREATE TABLE `service_coiffeur` (
  `COI_ID` int(2) NOT NULL,
  `SER_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service_coiffeur`
--

INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(2, 65);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(3, 3);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(1, 4);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(2, 5);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(3, 5);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(1, 2);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(2, 2);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(3, 2);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(4, 2);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(1, 3);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(2, 3);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(4, 3);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(3, 6);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(2, 9);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(1, 12);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(3, 11);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(4, 11);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(2, 14);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(1, 15);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(1, 17);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(1, 18);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(2, 19);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(1, 1);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(2, 1);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(3, 1);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(4, 1);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(3, 4);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(4, 4);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(4, 5);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(2, 6);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(4, 12);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(4, 9);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(4, 14);
INSERT INTO `service_coiffeur` (`COI_ID`, `SER_ID`) VALUES(3, 15);
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coiffeur_periode`
--
ALTER TABLE `coiffeur_periode`
  ADD PRIMARY KEY (`COI_ID`),
  ADD KEY `COI_ID` (`COI_ID`),
  ADD KEY `PER_ID` (`PER_ID`);

--
-- Index pour la table `ely_image`
--
ALTER TABLE `ely_image`
  ADD PRIMARY KEY (`IMG_ID`);

--
-- Index pour la table `ely_article`
--
ALTER TABLE `ely_article`
  ADD PRIMARY KEY (`ART_ID`);

--
-- Index pour la table `ely_client`
--
ALTER TABLE `ely_client`
  ADD PRIMARY KEY (`CLI_ID`),
  ADD UNIQUE KEY `CLI_TEL` (`CLI_TEL`),
  ADD UNIQUE KEY `CLI_EMAIL` (`CLI_EMAIL`);

--
-- Index pour la table `ely_coiffeur`
--
ALTER TABLE `ely_coiffeur`
  ADD PRIMARY KEY (`COI_ID`);

--
-- Index pour la table `ely_diplome`
--
ALTER TABLE `ely_diplome`
  ADD PRIMARY KEY (`DIP_ID`);

--
-- Index pour la table `ely_para_descrip`
--
ALTER TABLE `ely_para_descrip`
  ADD PRIMARY KEY (`DES_ID`);

--
-- Index pour la table `ely_periode`
--
ALTER TABLE `ely_periode`
  ADD PRIMARY KEY (`PER_ID`);

--
-- Index pour la table `ely_recupmdp`
--
ALTER TABLE `ely_recupmdp`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ely_rendezvous`
--
ALTER TABLE `ely_rendezvous`
  ADD PRIMARY KEY (`RDV_ID`);

--
-- Index pour la table `ely_service`
--
ALTER TABLE `ely_service`
  ADD PRIMARY KEY (`SER_ID`);

--
-- Index pour la table `ely_trancheshoraires`
--
ALTER TABLE `ely_trancheshoraires`
  ADD PRIMARY KEY (`tra_id`),
  ADD KEY `coi_id` (`coi_id`);

--
-- Index pour la table `rdv_periode`
--
ALTER TABLE `rdv_periode`
  ADD PRIMARY KEY (`RDV_ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ely_image`
--
ALTER TABLE `ely_image`
  MODIFY `IMG_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `ely_article`
--
ALTER TABLE `ely_article`
  MODIFY `ART_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `ely_client`
--
ALTER TABLE `ely_client`
  MODIFY `CLI_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT pour la table `ely_coiffeur`
--
ALTER TABLE `ely_coiffeur`
  MODIFY `COI_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ely_diplome`
--
ALTER TABLE `ely_diplome`
  MODIFY `DIP_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `ely_para_descrip`
--
ALTER TABLE `ely_para_descrip`
  MODIFY `DES_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `ely_periode`
--
ALTER TABLE `ely_periode`
  MODIFY `PER_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `ely_recupmdp`
--
ALTER TABLE `ely_recupmdp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `ely_rendezvous`
--
ALTER TABLE `ely_rendezvous`
  MODIFY `RDV_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ely_service`
--
ALTER TABLE `ely_service`
  MODIFY `SER_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `ely_trancheshoraires`
--
ALTER TABLE `ely_trancheshoraires`
  MODIFY `tra_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
