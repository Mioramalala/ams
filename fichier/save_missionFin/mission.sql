DELETE FROM `tab_conclusion` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_conclusion`(`CONCLUSION_COMMENTAIRE`,`CONCLUSION_RISQUE`,`MISSION_ID`,`CYCLE_ACHAT_ID`,`UTIL_ID`) VALUES("dsqdfsq","moyen","46","100000000","16"),("fdgqgq q","faible","46","32","16"),("dgqgdqgdq dgsq","moyen","46","33","16"),("efdq","moyen","46","34","16");
DELETE FROM `tab_conclusion_ra` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_conclusion_ra`(`CONCLUSION`,`CONCLUSION_OBJECTIF`,`MISSION_ID`,`UTIL_ID`) VALUES("SDQFGJGKJFH gaege ","stock","46","16"),("dsfdg dfsf qfea a","charge","46","16");
DELETE FROM `tab_distribution_tache` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_distribution_tache`(`tache_id`,`UTIL_ID`,`MISSION_ID`,`TACHE_SUPERVISEUR`,`STATUT`) VALUES("1","16","46","non","actif"),("2","16","46","non","actif"),("3","16","46","non","actif"),("5","16","46","non","actif"),("6","16","46","non","actif"),("16","16","46","non","actif"),("17","16","46","non","actif"),("19","16","46","non","actif"),("20","16","46","non","actif"),("43","16","46","non","actif"),("44","16","46","non","actif"),("45","16","46","non","actif"),("46","16","46","non","actif"),("61","16","46","non","actif"),("62","16","46","non","actif");
DELETE FROM `tab_fonct_a` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_fonct_a`(`FONCT_A_LIGNE`,`FONCT_A_RESULT`,`MISSION_ID`,`POSTE_CYCLE_ID`,`FONCT_A_NOM`,`UTIL_ID`) VALUES("1","1","46","267","achat","16"),("2","1","46","268","achat","16"),("1","1","46","275","achat","16"),("3","1","46","269","achat","16"),("3","1","46","275","achat","16"),("4","1","46","270","achat","16"),("5","1","46","269","achat","16"),("6","1","46","268","achat","16"),("7","1","46","267","achat","16"),("8","1","46","268","achat","16"),("9","1","46","269","achat","16"),("10","1","46","270","achat","16"),("11","1","46","269","achat","16"),("11","1","46","275","achat","16"),("12","1","46","268","achat","16"),("13","1","46","267","achat","16"),("14","1","46","268","achat","16"),("15","1","46","269","achat","16"),("16","1","46","270","achat","16"),("17","1","46","269","achat","16"),("18","1","46","268","achat","16"),("18","1","46","275","achat","16"),("19","1","46","267","achat","16"),("20","1","46","268","achat","16"),("21","1","46","269","achat","16"),("22","1","46","270","achat","16"),("20","1","46","275","achat","16"),("1","1","46","271","stock","16"),("1","1","46","271","stock","16"),("2","1","46","272","stock","16"),("2","1","46","272","stock","16"),("3","1","46","273","stock","16"),("3","1","46","273","stock","16"),("1","1","46","271","stock","16"),("1","1","46","271","stock","16"),("2","1","46","272","stock","16"),("2","1","46","272","stock","16"),("3","1","46","273","stock","16"),("3","1","46","273","stock","16"),("1","1","46","271","stock","16"),("1","1","46","271","stock","16"),("2","1","46","272","stock","16"),("2","1","46","272","stock","16"),("3","1","46","273","stock","16"),("3","1","46","273","stock","16"),("4","1","46","274","stock","16"),("5","1","46","273","stock","16"),("6","1","46","272","stock","16"),("7","1","46","271","stock","16"),("8","1","46","272","stock","16"),("9","1","46","273","stock","16"),("10","1","46","274","stock","16"),("11","1","46","273","stock","16"),("12","1","46","272","stock","16"),("13","1","46","271","stock","16");
DELETE FROM `tab_niveau_risque_a` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_niveau_risque_a`(`NIVEAU_RISQUE_NOM`,`POSTE_CYCLE_ID`,`MISSION_ID`,`UTIL_ID`) VALUES("moyen","267","46","16"),("eleve","268","46","16"),("moyen","269","46","16"),("moyen","270","46","16"),("faible","271","46","16"),("faible","272","46","16"),("eleve","274","46","16"),("moyen","273","46","16");
DELETE FROM `tab_objectif` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_objectif`(`OBJECTIF_COMMENTAIRE`,`OBJECTIF_QCM`,`CYCLE_ACHAT_ID`,`MISSION_ID`,`QUESTION_ID`,`OBJECTIF_RISQUE`,`UTIL_ID`) VALUES("ds :;t ","OUI","2","46","22","","16"),("ds","N/A","2","46","1","","16"),("dsqf","NON","2","46","2","","16"),("dsqf","N/A","2","46","3","","16"),("sd","NON","2","46","4","","16"),("sdqf","OUI","2","46","5","","16"),("dsf","N/A","2","46","6","","16"),("dfd","OUI","2","46","7","","16"),("dfd","OUI","2","46","8","","16"),("df","NON","2","46","9","","16"),("dsq","N/A","2","46","10","","16"),("das","OUI","2","46","11","","16"),("dsds","N/A","2","46","12","","16"),("dsq","NON","2","46","13","","16"),("dsdsq","OUI","2","46","14","","16"),("za","N/A","2","46","15","","16"),("fra","NON","2","46","16","","16"),("a","N/A","2","46","17","","16"),("dfq d","OUI","2","46","18","","16"),("d fe","N/A","2","46","19","","16"),("fdsz ","OUI","2","46","20","","16"),(",;:y  k j ","N/A","2","46","21","","16"),("dfsq","N/A","3","46","23","","16"),("sqdf","NON","3","46","24","","16"),("dsf","OUI","3","46","25","","16"),("sdf","N/A","3","46","26","","16"),("dsf gfd","NON","3","46","27","","16"),("fdsd ","OUI","3","46","28","","16"),("fd sd","N/A","3","46","29","","16"),("fds","NON","3","46","30","","16"),("fds a","OUI","3","46","31","","16"),("fs f","N/A","3","46","32","","16"),("dfsg","NON","3","46","33","","16"),("dsqf","N/A","4","46","34","","16"),("dsfsq dfqs","OUI","4","46","35","","16"),("dsqf qsdfq s","NON","4","46","36","","16"),("dsqf dfsqf","N/A","4","46","37","","16"),("sdffqds dq ","NON","4","46","38","","16"),("dqf","NON","4","46","39","","16"),("dfa adf","N/A","4","46","40","","16"),("dfs sdq","NON","4","46","41","","16"),("sdfq","OUI","4","46","42","","16"),("dsfdaz  azf","OUI","4","46","43","","16"),("dsqfdf azfza","OUI","4","46","44","","16"),("dfsq  h ","N/A","4","46","45","","16"),("fdfsqf fd","OUI","5","46","46","","16"),("dsfddfsq","N/A","5","46","47","","16"),("df hr","NON","5","46","48","","16"),("fdsz g","N/A","5","46","49","","16"),("fds ggf ","NON","5","46","50","","16"),("fgdfdsd15f26 fds","N/A","5","46","51","","16"),("fdgz ","OUI","5","46","52","","16"),("gf dgz","NON","5","46","53","","16"),("fdge ","NON","5","46","54","","16"),("fdfg","N/A","6","46","55","","16"),("fd","OUI","6","46","56","","16"),("ssssss","OUI","6","46","57","","16"),("gokk kgpem4 /-*+<br>2  ge5+::g e;m:mam g<br>eakok;l","OUI","6","46","58","","16"),("dsq dge ze","OUI","6","46","59","","16"),("gzg126 1ge5","NON","6","46","60","","16"),("fd a","N/A","6","46","61","","16"),("eag ","OUI","6","46","62","","16"),("hbj","N/A","6","46","63","","16"),("fgdf","OUI","6","46","64","","16"),("fds<br><br><br><br>fgd","N/A","6","46","65","","16"),("fdgf","N/A","6","46","66","","16"),("fgde 326","OUI","6","46","67","","16"),("geaa ger-_è-(é","OUI","6","46","68","","16"),("fds fdgd","OUI","6","46","69","","16"),("dsfq dfsqd","N/A","11","46","117","","16"),("dsfda d","OUI","11","46","118","","16"),("dsfd qs","N/A","11","46","119","","16"),("dsqfzaf","NON","11","46","120","","16"),("dfa eza ","OUI","11","46","121","","16"),("dffa rrg","NON","11","46","122","","16"),("dsqsa","N/A","11","46","123","","16"),("dsf adf","OUI","11","46","124","","16"),("faz rre ","N/A","11","46","125","","16"),("egaargaera rga  ga","OUI","11","46","126","","16"),("dsf a","NON","11","46","127","","16"),("dsfa dzfa","OUI","11","46","128","","16"),("dsfa a f","N/A","11","46","129","","16"),("dsfa a ","NON","11","46","130","","16"),("dfza ge56 <br> gre","N/A","11","46","131","","16"),("faz a","OUI","11","46","132","","16"),("dfza zfa","NON","11","46","133","","16"),("fza af  a","OUI","11","46","134","","16"),("zzge ","N/A","12","46","135","","16"),("fdg f","OUI","12","46","136","","16"),("fdsgdsf ","OUI","12","46","137","","16"),("fdsg ","N/A","12","46","138","","16"),("fdg egz","N/A","12","46","139","","16"),("eg htr","NON","12","46","140","","16"),("fdzgzg","OUI","12","46","141","","16"),("fgdsgsd","OUI","12","46","142","","16"),("fdsg dssdf","OUI","12","46","143","","16"),("fdsgdfs ","OUI","12","46","144","","16"),("fddsggds df s","OUI","12","46","145","","16"),("ezg gz","N/A","12","46","146","","16"),("fdsg d","N/A","12","46","147","","16"),("fgez hje ","N/A","12","46","148","","16"),("dfsq","N/A","12","46","149","","16"),("dsfq","N/A","12","46","150","","16"),("dsfq","OUI","12","46","151","","16"),("dsf","OUI","13","46","152","","16"),("d","OUI","13","46","153","","16"),("dsfq fdsfsfqfdqs","NON","13","46","154","","16"),("dfqssfsqsfff","OUI","13","46","155","","16"),("dsz feza","OUI","13","46","156","","16"),("gggg","N/A","13","46","157","","16"),("gccgggdcsds f","N/A","13","46","158","","16"),("dfa efaz","OUI","13","46","159","","16"),("daf ","N/A","13","46","160","","16"),("dsdfa afz","NON","13","46","161","","16"),("ffazfeaz zfaef","OUI","13","46","162","","16"),("hre jre","NON","13","46","163","","16"),("gdhd","N/A","13","46","164","","16"),("ghdd","OUI","13","46","165","","16"),("gez op^ù ^^ z^!^! z ","N/A","13","46","166","","16"),("fgds zgkùùù%%%","N/A","13","46","167","","16"),("fgds zgkùùù%%%","N/A","13","46","168","","16"),("dsfqds sagasa","N/A","13","46","169","","16"),("fgd ","NON","13","46","170","","16"),("fdgz ","OUI","13","46","171","","16"),("fdsg zd","N/A","13","46","172","","16"),("fds fgdzfgd","OUI","13","46","173","","16"),("fds","OUI","13","46","174","","16"),("dsqf","OUI","13","46","175","","16"),("dsqfd qsf","OUI","13","46","176","","16"),("dsqf","N/A","13","46","177","","16"),("ddfddf","N/A","13","46","178","","16"),("fdfd","OUI","13","46","179","","16"),("dfdf","OUI","13","46","180","","16"),("dsqfsq ","OUI","31","46","405","","16"),("dsqfdsq","N/A","31","46","406","","16"),("dsfqdsq","OUI","31","46","407","","16"),("dsfqdsqf","OUI","31","46","408","","16"),("dsqfdq","OUI","31","46","409","","16"),("dsqfdqsfsq","NON","31","46","410","","16"),("dsfq dfqs","N/A","31","46","411","","16"),("dsfeeg","OUI","31","46","412","","16"),("dqs dsq","OUI","31","46","413","","16"),("fhj","N/A","31","46","414","","16"),("fgj hg","NON","31","46","415","","16"),("jhjjj","NON","31","46","416","","16"),("h","OUI","31","46","417","","16"),("hgdy ry","N/A","31","46","418","","16"),("reh hre","OUI","31","46","419","","16"),("tre thre","N/A","31","46","420","","16"),("eeee","OUI","31","46","421","","16"),("hhhh","NON","31","46","422","","16"),("lollo","OUI","31","46","423","","16"),("olpolo","OUI","31","46","424","","16"),("m;jhhg","N/A","31","46","425","","16"),("fdsg","OUI","31","46","426","","16"),("fdzgz","OUI","31","46","427","","16"),("fdds d","N/A","31","46","428","","16"),("fds sdf","OUI","31","46","429","","16"),("fez","OUI","31","46","451","f","16"),("fez","OUI","31","46","430","","16"),("","OUI","32","46","432","","16"),("","OUI","32","46","431","e","16"),("","OUI","32","46","433","e","16"),("","OUI","32","46","434","","16"),("","OUI","32","46","435","m","16"),("","OUI","32","46","436","","16"),("","OUI","32","46","437","m","16"),("","OUI","32","46","438","m","16"),("","OUI","32","46","439","","16"),("","OUI","32","46","440","e","16"),("","OUI","32","46","445","m","16"),("","OUI","32","46","441","m","16"),("","OUI","32","46","446","","16"),("","OUI","32","46","442","","16"),("","OUI","32","46","443","","16"),("","OUI","32","46","444","","16"),("","OUI","32","46","447","e","16"),("","OUI","33","46","449","","16"),("","OUI","33","46","448","","16"),("","OUI","33","46","450","f","16"),("","OUI","33","46","452","","16"),("","OUI","33","46","453","m","16"),("","OUI","33","46","454","","16"),("","OUI","33","46","455","","16"),("","OUI","33","46","456","m","16"),("","OUI","33","46","457","","16"),("","OUI","33","46","459","m","16"),("","OUI","33","46","458","","16"),("","OUI","33","46","460","","16"),("","OUI","33","46","461","","16"),("","OUI","33","46","462","e","16"),("","NON","34","46","463","f","16"),("","NON","34","46","464","f","16"),("","NON","34","46","465","f","16"),("","NON","34","46","466","f","16"),("","NON","34","46","467","f","16"),("","NON","34","46","468","f","16"),("","NON","34","46","469","f","16"),("","NON","34","46","470","f","16"),("","NON","34","46","471","f","16"),("","NON","34","46","472","f","16"),("","NON","34","46","474","f","16"),("","NON","34","46","473","f","16"),("","NON","34","46","476","f","16"),("","NON","34","46","475","f","16"),("","NON","34","46","477","f","16"),("","NON","34","46","478","f","16"),("","NON","34","46","479","f","16"),("","NON","34","46","480","f","16");
DELETE FROM `tab_planification_ra` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_planification_ra`(`PLANIF_FONCT`,`PLANIF_COMPTE`,`PLANIF_GEN`,`SEUIL_SIGN`,`TAUX_SONDAGE`,`PLANIF_CYCLE`,`MISSION_ID`,`UTIL_ID`) VALUES("","","																			DJF																										","														100																									","															100%																								","stock","46","16");
DELETE FROM `tab_poste_cycle` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_poste_cycle`(`POSTE_CYCLE_NOM`,`POSTE_CLE_ID`,`MISSION_ID`,`ENTREPRISE_ID`,`UTIL_ID`) VALUES("achat","73","46","33","16"),("achat","74","46","33","16"),("achat","75","46","33","16"),("achat","76","46","33","16"),("stock","73","46","33","16"),("stock","74","46","33","16"),("stock","75","46","33","16"),("stock","77","46","33","16");
DELETE FROM `tab_rdc` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_rdc`(`RDC_CYCLE`,`RDC_COMMENTAIRE`,`RDC_REPONSE`,`RDC_OBJECTIF`,`RDC_RANG`,`MISSION_ID`,`UTIL_ID`) VALUES("stock","dfssqd","oui","A","1","46","16"),("stock","dsffdsq","N/A","A","2","46","16"),("stock","hgfgdqg","oui","A","3","46","16"),("stock","fge g","N/A","A","4","46","16"),("stock","lkjhkgd","oui","A","5","46","16"),("stock","fgd gz","non","A","7","46","16"),("stock","fgdg fdg","oui","A","6","46","16"),("stock","fdsfgd","oui","A","8","46","16"),("stock","fgddfs","oui","B","1","46","16"),("stock","gg gz","oui","B","2","46","16"),("stock","dsdfsqfds q","oui","B","3","46","16"),("stock","dfsqdfsq","N/A","B","4","46","16"),("stock","dsff","non","B","5","46","16"),("stock","dsqdfs","oui","C","1","46","16"),("stock","dsfdsq","oui","C","3","46","16"),("stock","dsqdq","oui","C","2","46","16"),("stock","dssd","N/A","C","4","46","16"),("stock","dsfff fd","oui","C","5","46","16"),("stock","ùmlkjhh","oui","C","6","46","16"),("stock","fdsg gds","oui","C","7","46","16"),("stock","kjhg","oui","C","8","46","16"),("stock","kjhg","oui","C","9","46","16"),("stock","ddfdf","N/A","C","10","46","16"),("stock","dsfqfdsq","oui","D","1","46","16"),("stock","dsqffsq dfq","oui","D","2","46","16"),("stock","dfqf","oui","D","3","46","16"),("stock","dfsqfsqdf dsqfq","oui","E","1","46","16"),("stock","dfsqf qdfsq","oui","F","1","46","16"),("stock","dsfd fdsf","non","F","2","46","16"),("charge_fournisseur","dsfdf","N/A","A","2","46","16"),("charge_fournisseur","dsfqsdfq","oui","A","1","46","16"),("charge_fournisseur","kh","oui","A","3","46","16"),("charge_fournisseur","rhh","oui","A","4","46","16"),("charge_fournisseur","rzhhz","oui","A","5","46","16"),("charge_fournisseur","fdgs","N/A","A","7","46","16"),("charge_fournisseur","ijhhg","N/A","A","6","46","16"),("charge_fournisseur","fdgs fdsgss","N/A","A","9","46","16"),("charge_fournisseur","poiuy","oui","A","8","46","16"),("charge_fournisseur","fgdgsf","oui","B","1","46","16"),("charge_fournisseur","dsq","non","D","1","46","16"),("charge_fournisseur","dsf","non","D","2","46","16"),("charge_fournisseur","dsdsfq","oui","D","3","46","16"),("charge_fournisseur","dsfds","oui","D","5","46","16"),("charge_fournisseur","dsfdqsd","oui","D","4","46","16"),("charge_fournisseur","dsfq","oui","E","1","46","16"),("charge_fournisseur","dsf","oui","E","2","46","16"),("charge_fournisseur","dsf dsf","oui","E","4","46","16"),("charge_fournisseur","dsqffds dfqs","oui","E","3","46","16"),("charge_fournisseur","dsfdsf dsf","N/A","G","1","46","16"),("charge_fournisseur","dsfq","oui","G","2","46","16"),("charge_fournisseur","dsf","N/A","G","3","46","16"),("charge_fournisseur","dsfsq","N/A","G","4","46","16"),("charge_fournisseur","sdfqfsq  dsq","oui","G","5","46","16"),("charge_fournisseur","sdqf","oui","H","1","46","16"),("charge_fournisseur","dsqfd sqdsq","oui","H","2","46","16"),("charge_fournisseur","dsqf sqfdqs","N/A","H","3","46","16"),("charge_fournisseur","ds gef","N/A","H","4","46","16");
DELETE FROM `tab_rdc_cf_f10` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_rdc_cf_f10`(`NATURE`,`ANNEXE`,`COMMENTAIRE`,`MISSION_ID`,`UTIL_ID`) VALUES("Détails des indemnités de départ à la retraite","oui","dsqfqs f","46","16"),("Mode de calcul des indemnités de départ à la retraite","N/A","dsfq dsq","46","16"),("Rénumérations des dirigeants","oui","dsqf","46","16"),("Effectif du personnel","oui","dsfq ","46","16"),("dsqf dfsq fdsq","oui","dsqf","46","16");
DELETE FROM `tab_rdc_cf_f3` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_rdc_cf_f3`(`L1_C1`,`L1_C2`,`L2_C1`,`L2_C2`,`L3_C1`,`L3_C2`,`L4_C1`,`L4_C2`,`L5_C1`,`L5_C2`,`L6_C1`,`L6_C2`,`MISSION_ID`,`REFERENCE`,`UTIL_ID`) VALUES("10000","15000","4000","100","2000","1200","120","125","130","510","12","15","46","F3","16"),("0","0","0","0","0","0","0","0","0","0","0","0","46","F31","16");
DELETE FROM `tab_rdc_cf_f4_1` WHERE `mission_id` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_rdc_cf_f4_1`(`libelle`,`N0`,`N1`,`N2`,`N3`,`N4`,`mission_id`,`UTIL_ID`) VALUES("vente","120","123","2201","1200","100","46","16"),("vente_marchandise","21","212","12550","780","130","46","16"),("cout_marchandise","1255","15220","1200","4500","1223","46","16"),("stock_initiaux","4220","42","1240","12001","12","46","16");
DELETE FROM `tab_rdc_st_d2` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_rdc_st_d2`(`T1_L1_N1`,`T1_L1_N2`,`T1_L1_N3`,`T1_L2_N1`,`T1_L2_N2`,`T1_L2_N3`,`T1_L3_N1`,`T1_L3_N2`,`T1_L3_N3`,`T1_L4_N1`,`T1_L4_N2`,`T1_L4_N3`,`T1_L5_N1`,`T1_L5_N2`,`T1_L5_N3`,`T2_L1_N1`,`T2_L1_N2`,`T2_L1_N3`,`T2_L2_N1`,`T2_L2_N2`,`T2_L2_N3`,`T2_L3_N1`,`T2_L3_N2`,`T2_L3_N3`,`T2_L4_N1`,`T2_L4_N2`,`T2_L4_N3`,`T2_L5_N1`,`T2_L5_N2`,`T2_L5_N3`,`T3_L1_N1`,`T3_L1_N2`,`T3_L1_N3`,`T3_L2_N1`,`T3_L2_N2`,`T3_L2_N3`,`T3_L3_N1`,`T3_L3_N2`,`T3_L3_N3`,`T3_L4_N1`,`T3_L4_N2`,`T3_L4_N3`,`T3_L5_N1`,`T3_L5_N2`,`T3_L5_N3`,`T4_L1_N1`,`T4_L1_N2`,`T4_L1_N3`,`T4_L2_N1`,`T4_L2_N2`,`T4_L2_N3`,`T4_L3_N1`,`T4_L3_N2`,`T4_L3_N3`,`T4_L4_N1`,`T4_L4_N2`,`T4_L4_N3`,`T4_L5_N1`,`T4_L5_N2`,`T4_L5_N3`,`MISSION_ID`,`UTIL_ID`) VALUES("1522","2101","33310","10434","4342","444.0","44","55","4345","240.29","505.11","-213.03","264.82","-718.14","652","11120","11.","377","115","677","588","1533","5435","554","-213.5","20.3","227.06","233.8","206.76","5776","7964","4500","12500","800","3000","4500","400","4600","2400","-233.22","435.48","-546.43","668.7","-981.91","2400","4200","4500","3200","1330","5460","720","1700","4500","24000","-850.77","328.35","32.79","1179.12","-295.56","12.00","46","16");
DELETE FROM `tab_rdc_st_d3` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_rdc_st_d3`(`L1_C1`,`L1_C2`,`L1_C3`,`L1_C4`,`L2_C1`,`L2_C2`,`L2_C3`,`L2_C4`,`L3_C1`,`L3_C2`,`L3_C3`,`L3_C4`,`L4_C1`,`L4_C2`,`L4_C3`,`L4_C4`,`L5_C1`,`L5_C2`,`L5_C3`,`L5_C4`,`L1_C5`,`L1_C6`,`L1_C7`,`L2_C5`,`L2_C6`,`L2_C7`,`L3_C5`,`L3_C6`,`L3_C7`,`L4_C5`,`L4_C6`,`L4_C7`,`L5_C5`,`L5_C6`,`L5_C7`,`MISSION_ID`,`UTIL_ID`) VALUES("dfsfqdf","1221000","8000","11200","dsfqdfa","1255000","90000","2100","dzaffdzvdza","8000","75000","1120","ehrgh","101000","24300","7000","fdsg ","12000","12000","53000","","","","","","","","","","","","","","","","46","16");
DELETE FROM `tab_rdc_st_d4` WHERE `mission_id` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_rdc_st_d4`(`categorie`,`produit`,`designation`,`etat_theorique`,`etat_inventaire`,`ecart`,`observation`,`mission_id`,`cpt`,`UTIL_ID`) VALUES("dfsdsqf","12000","5000","10000","800","9200","kjhgfdg","46","2","16");
DELETE FROM `tab_rdc_st_ra` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_rdc_st_ra`(`SYNTHESE`,`CONCLUSION`,`MISSION_ID`,`OBJECTIF`,`CYCLE`,`REFERENCE`,`UTIL_ID`) VALUES("","","46","A","stock","D1","16"),("","","46","A","stock","D11","16"),("","","46","A","stock","D12","16");
DELETE FROM `tab_risque_lie_systeme` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_risque_lie_systeme`(`RISQUE`,`MISSION_ID`,`UTIL_ID`) VALUES("undefined","46","16");
DELETE FROM `tab_synthese` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_synthese`(`SYNTHESE_COMMENTAIRE`,`SYNTHESE_RISQUE`,`SCORE`,`CYCLE_ACHAT_ID`,`MISSION_ID`,`UTIL_ID`) VALUES("dsqfsqf dsq","faible","","1","46","16"),("dsqda ad daf <br>fa","eleve","15/23","3","46","16"),("dsqf da fa36115 f<br>f za5","faible","17/27","4","46","16"),("fd g fge g","moyen","13/21","5","46","16"),("ds fa ","moyen","33/36","6","46","16"),("dsf geze zgez","faible","","111","46","16"),("rddsq","faible","48/51","31","46","16"),("dsqdfsq","moyen","","100000000","46","16"),("fdgqgq q","faible","21/21","32","46","16"),("dgqgdqgdq dgsq","moyen","29/32","33","46","16"),("efdq","moyen","0/22","34","46","16");
DELETE FROM `tab_synthese_feuille_rdc` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_synthese_feuille_rdc`(`SYNTHESE_OBS`,`SYNTHESE_RISQUE`,`SYNTHESE_RECOM`,`MISSION_ID`,`SYNTHESE_CYCLE`,`UTIL_ID`) VALUES("dsqf dqf","dfsq","dsfq","46","stock","16"),("dsfqdsfq","dsq dfsq","dsqf fdqs","46","stock","16"),("dsqf q","fdsdqf","fsdq","46","charge","16");
DELETE FROM `tab_synthese_rsci` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_synthese_rsci`(`CYCLE`,`SYNTHESE`,`RISQUE`,`MISSION_ID`,`UTIL_ID`) VALUES("stocks","fgd efgezeg","Faible","46","16"),("achat","dsq fdggaa","Faible","46","16"),("info","efdsfda adf","Moyen","46","16");
DELETE FROM `tab_synthese_rsci_ra` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_synthese_rsci_ra`(`DOMAINE`,`CARACTERE`,`EXHAUSTIVITE`,`REALITE`,`PROPRIETE`,`EVALUATION_CORRECTE`,`ENREGISTREMENT_BP`,`IMPUTATION_CORRECTE`,`TOTALISATION`,`BONNE_INFORMATION`,`RISQUE_GF`,`MISSION_ID`,`UTIL_ID`) VALUES("IMMOBILISATIONS Corporelles, incorporelles, financi�res","","","","","","","","Faible","","","46","16"),("STOCK","","","","","","","","Faible","","","46","16"),("VENTES - CLIENTS","","","","","","","","Faible","","","46","16"),("TRESORERIE","","","","","","","","Faible","","","46","16"),("ACHATS - FOURNISSEURS","faible","","eleve","","faible","moyen","moyen","Moyen","faible","moyen","46","16"),("PAIE - PERSONNEL","","","","","","","","Faible","","","46","16"),("SOUS TRAITANCE","","","","","","","","Faible","","","46","16");
DELETE FROM `tab_sys_info` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_sys_info`(`NOM_CYCLE`,`COMPLEXITE`,`ID_INFO`,`MISSION_ID`,`UTIL_ID`) VALUES("achat","s","25","46","16"),("vente","c","26","46","16"),("tresorerie","t","27","46","16"),("paie","c","28","46","16"),("comptabilite","c","29","46","16"),("stock","s","30","46","16");
DELETE FROM `tab_sys_info1` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_sys_info1`(`VAL`,`MISSION_ID`,`UTIL_ID`) VALUES("2","46","16"),("100","46","16"),("100000","46","16");
DELETE FROM `tab_validation_synthese_rdc` WHERE `MISSION_ID` = 46 AND `UTIL_ID` = 16;
INSERT INTO `tab_validation_synthese_rdc`(`SYNTHESE_ID_RDC`,`SYNTHESE_RDC`,`SYNTHESE_CYCLE_RDC`,`MISSION_ID`,`UTIL_ID`) VALUES("13","dsqf q<br><br>","charge","46","16");
