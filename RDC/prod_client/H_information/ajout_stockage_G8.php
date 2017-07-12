<?php
include '../../../connexion.php';

$UTIL_ID = $_SESSION['UTIL_ID'];

$tab0=array();
$tab1=array();
$tab2=array();
$tab3=array();
$tab4=array();
$tab5=array();
$tab6=array();
$tab7=array();
$tab8=array();
$tab9=array();
$tab10=array();
$tab11=array();
$tab12=array();
$tab13=array();
$tab14=array();
$tab15=array();
$tab16=array();
$tab17=array();
$tab18=array();
$tab19=array();
$tab20=array();
$tab21=array();
$tab2=array();
$tab22=array();
$tab23=array();
$tab24=array();
$tab25=array();
$tab26=array();
$tab27=array();
$tab28=array();
$tab29=array();
$tab30=array();
$tab31=array();

$tab0=$_POST['tab0'];
$tab1=$_POST['tab1'];
$tab2=$_POST['tab2'];
$tab3=$_POST['tab3'];
$tab4=$_POST['tab4'];
$tab5=$_POST['tab5'];
$tab6=$_POST['tab6'];
$tab7=$_POST['tab7'];
$tab8=$_POST['tab8'];
$tab9=$_POST['tab9'];
$tab10=$_POST['tab10'];
$tab11=$_POST['tab11'];
$tab12=$_POST['tab12'];
$tab13=$_POST['tab13'];
$tab14=$_POST['tab14'];
$tab15=$_POST['tab15'];
$tab16=$_POST['tab16'];
$tab17=$_POST['tab17'];
$tab18=$_POST['tab18'];
$tab19=$_POST['tab19'];
$tab20=$_POST['tab20'];
$tab21=$_POST['tab21'];
$tab22=$_POST['tab22'];
$tab23=$_POST['tab23'];
$tab24=$_POST['tab24'];
$tab25=$_POST['tab25'];
$tab26=$_POST['tab26'];
$tab27=$_POST['tab27'];
$tab28=$_POST['tab28'];
$tab29=$_POST['tab29'];
$tab30=$_POST['tab30'];
$tab31=$_POST['tab31'];

$total=$_POST['periode'];
/////////////////////////////////////////////////////ligne 0//////////////////////////////////////////////////////////////////
	$query0='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab0[1].'","'.$tab0[2].'","'.$tab0[3].'","'.$tab0[4].'","'.$tab0[5].'","'.$tab0[6].'","'.$tab0[7].'","'.$tab0[8].'","'.$tab0[9].'","'.$tab0[10].'","'.$tab0[11].'", "'.$tab0[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse0=$bdd->exec($query0);
	
	$req0='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab0[1].'","'.$tab0[2].'","'.$tab0[3].'","'.$tab0[4].'","'.$tab0[5].'","'.$tab0[6].'","'.$tab0[7].'","'.$tab0[8].'","'.$tab0[9].'","'.$tab0[10].'","'.$tab0[11].'", "'.$tab0[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req0.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 1//////////////////////////////////////////////////////////////
	$query1='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab1[1].'","'.$tab1[2].'","'.$tab1[3].'","'.$tab1[4].'","'.$tab1[5].'","'.$tab1[6].'","'.$tab1[7].'","'.$tab1[8].'","'.$tab1[9].'","'.$tab1[10].'","'.$tab1[11].'", "'.$tab1[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse1=$bdd->exec($query1);
	
	$req1='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab1[1].'","'.$tab1[2].'","'.$tab1[3].'","'.$tab1[4].'","'.$tab1[5].'","'.$tab1[6].'","'.$tab1[7].'","'.$tab1[8].'","'.$tab1[9].'","'.$tab1[10].'","'.$tab1[11].'", "'.$tab1[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 2//////////////////////////////////////////////////////////////
	$query2='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab2[1].'","'.$tab2[2].'","'.$tab2[3].'","'.$tab2[4].'","'.$tab2[5].'","'.$tab2[6].'","'.$tab2[7].'","'.$tab2[8].'","'.$tab2[9].'","'.$tab2[10].'","'.$tab2[11].'", "'.$tab2[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse2=$bdd->exec($query2);
	
	$req2='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab2[1].'","'.$tab2[2].'","'.$tab2[3].'","'.$tab2[4].'","'.$tab2[5].'","'.$tab2[6].'","'.$tab2[7].'","'.$tab2[8].'","'.$tab2[9].'","'.$tab2[10].'","'.$tab2[11].'", "'.$tab2[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req2.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 3///////////////////////////////////////////////////////////////
	$query3='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab3[1].'","'.$tab3[2].'","'.$tab3[3].'","'.$tab3[4].'","'.$tab3[5].'","'.$tab3[6].'","'.$tab3[7].'","'.$tab3[8].'","'.$tab3[9].'","'.$tab3[10].'","'.$tab3[11].'", "'.$tab3[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse3=$bdd->exec($query3);
	
	$req3='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab3[1].'","'.$tab3[2].'","'.$tab3[3].'","'.$tab3[4].'","'.$tab3[5].'","'.$tab3[6].'","'.$tab3[7].'","'.$tab3[8].'","'.$tab3[9].'","'.$tab3[10].'","'.$tab3[11].'", "'.$tab3[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req3.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 4///////////////////////////////////////////////////////////////
	$query4='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab4[1].'","'.$tab4[2].'","'.$tab4[3].'","'.$tab4[4].'","'.$tab4[5].'","'.$tab4[6].'","'.$tab4[7].'","'.$tab4[8].'","'.$tab4[9].'","'.$tab4[10].'","'.$tab4[11].'", "'.$tab4[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse4=$bdd->exec($query4);
	
	$req4='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab4[1].'","'.$tab4[2].'","'.$tab4[3].'","'.$tab4[4].'","'.$tab4[5].'","'.$tab4[6].'","'.$tab4[7].'","'.$tab4[8].'","'.$tab4[9].'","'.$tab4[10].'","'.$tab4[11].'", "'.$tab4[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req4.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 5///////////////////////////////////////////////////////////////
	$query5='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab5[1].'","'.$tab5[2].'","'.$tab5[3].'","'.$tab5[4].'","'.$tab5[5].'","'.$tab5[6].'","'.$tab5[7].'","'.$tab5[8].'","'.$tab5[9].'","'.$tab5[10].'","'.$tab5[11].'", "'.$tab5[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse5=$bdd->exec($query5);
	
	$req5='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab5[1].'","'.$tab5[2].'","'.$tab5[3].'","'.$tab5[4].'","'.$tab5[5].'","'.$tab5[6].'","'.$tab5[7].'","'.$tab5[8].'","'.$tab5[9].'","'.$tab5[10].'","'.$tab5[11].'", "'.$tab5[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req5.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////ligne 6//////////////////////////////////////////////////////////////////
	$query6='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab6[1].'","'.$tab6[2].'","'.$tab6[3].'","'.$tab6[4].'","'.$tab6[5].'","'.$tab6[6].'","'.$tab6[7].'","'.$tab6[8].'","'.$tab6[9].'","'.$tab6[10].'","'.$tab6[11].'", "'.$tab6[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse6=$bdd->exec($query6);
	
	$req6='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab6[1].'","'.$tab6[2].'","'.$tab6[3].'","'.$tab6[4].'","'.$tab6[5].'","'.$tab6[6].'","'.$tab6[7].'","'.$tab6[8].'","'.$tab6[9].'","'.$tab6[10].'","'.$tab6[11].'", "'.$tab6[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req6.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 7//////////////////////////////////////////////////////////////
	$query7='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab7[1].'","'.$tab7[2].'","'.$tab7[3].'","'.$tab7[4].'","'.$tab7[5].'","'.$tab7[6].'","'.$tab7[7].'","'.$tab7[8].'","'.$tab7[9].'","'.$tab7[10].'","'.$tab7[11].'", "'.$tab7[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse7=$bdd->exec($query7);
	
	$req7='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab7[1].'","'.$tab7[2].'","'.$tab7[3].'","'.$tab7[4].'","'.$tab7[5].'","'.$tab7[6].'","'.$tab7[7].'","'.$tab7[8].'","'.$tab7[9].'","'.$tab7[10].'","'.$tab7[11].'", "'.$tab7[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req7.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 8//////////////////////////////////////////////////////////////
	$query8='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab8[1].'","'.$tab8[2].'","'.$tab8[3].'","'.$tab8[4].'","'.$tab8[5].'","'.$tab8[6].'","'.$tab8[7].'","'.$tab8[8].'","'.$tab8[9].'","'.$tab8[10].'","'.$tab8[11].'", "'.$tab8[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse8=$bdd->exec($query8);
	
	$req8='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab8[1].'","'.$tab8[2].'","'.$tab8[3].'","'.$tab8[4].'","'.$tab8[5].'","'.$tab8[6].'","'.$tab8[7].'","'.$tab8[8].'","'.$tab8[9].'","'.$tab8[10].'","'.$tab8[11].'", "'.$tab8[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req8.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 9///////////////////////////////////////////////////////////////
	$query9='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab9[1].'","'.$tab9[2].'","'.$tab9[3].'","'.$tab9[4].'","'.$tab9[5].'","'.$tab9[6].'","'.$tab9[7].'","'.$tab9[8].'","'.$tab9[9].'","'.$tab9[10].'","'.$tab9[11].'", "'.$tab9[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse9=$bdd->exec($query9);
	
	$req9='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab9[1].'","'.$tab9[2].'","'.$tab9[3].'","'.$tab9[4].'","'.$tab9[5].'","'.$tab9[6].'","'.$tab9[7].'","'.$tab9[8].'","'.$tab9[9].'","'.$tab9[10].'","'.$tab9[11].'", "'.$tab9[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req9.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 10//////////////////////////////////////////////////////////////
	$query10='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab10[1].'","'.$tab10[2].'","'.$tab10[3].'","'.$tab10[4].'","'.$tab10[5].'","'.$tab10[6].'","'.$tab10[7].'","'.$tab10[8].'","'.$tab10[9].'","'.$tab10[10].'","'.$tab10[11].'", "'.$tab10[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse10=$bdd->exec($query10);
	
	$req10='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab10[1].'","'.$tab10[2].'","'.$tab10[3].'","'.$tab10[4].'","'.$tab10[5].'","'.$tab10[6].'","'.$tab10[7].'","'.$tab10[8].'","'.$tab10[9].'","'.$tab10[10].'","'.$tab10[11].'", "'.$tab10[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req10.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 11///////////////////////////////////////////////////////////////
	$query11='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab11[1].'","'.$tab11[2].'","'.$tab11[3].'","'.$tab11[4].'","'.$tab11[5].'","'.$tab11[6].'","'.$tab11[7].'","'.$tab11[8].'","'.$tab11[9].'","'.$tab11[10].'","'.$tab11[11].'", "'.$tab11[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse11=$bdd->exec($query11);
	
	$req11='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab11[1].'","'.$tab11[2].'","'.$tab11[3].'","'.$tab11[4].'","'.$tab11[5].'","'.$tab11[6].'","'.$tab11[7].'","'.$tab11[8].'","'.$tab11[9].'","'.$tab11[10].'","'.$tab11[11].'", "'.$tab11[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req11.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 12//////////////////////////////////////////////////////////////
	$query12='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab12[1].'","'.$tab12[2].'","'.$tab12[3].'","'.$tab12[4].'","'.$tab12[5].'","'.$tab12[6].'","'.$tab12[7].'","'.$tab12[8].'","'.$tab12[9].'","'.$tab12[10].'","'.$tab12[11].'", "'.$tab12[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse12=$bdd->exec($query12);
	
	$req12='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab12[1].'","'.$tab12[2].'","'.$tab12[3].'","'.$tab12[4].'","'.$tab12[5].'","'.$tab12[6].'","'.$tab12[7].'","'.$tab12[8].'","'.$tab12[9].'","'.$tab12[10].'","'.$tab12[11].'", "'.$tab12[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req12.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 13///////////////////////////////////////////////////////////////
	$query13='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab13[1].'","'.$tab13[2].'","'.$tab13[3].'","'.$tab13[4].'","'.$tab13[5].'","'.$tab13[6].'","'.$tab13[7].'","'.$tab13[8].'","'.$tab13[9].'","'.$tab13[10].'","'.$tab13[11].'", "'.$tab13[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse13=$bdd->exec($query13);
	
	$req13='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab13[1].'","'.$tab13[2].'","'.$tab13[3].'","'.$tab13[4].'","'.$tab13[5].'","'.$tab13[6].'","'.$tab13[7].'","'.$tab13[8].'","'.$tab13[9].'","'.$tab13[10].'","'.$tab13[11].'", "'.$tab13[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req13.";", FILE_APPEND | LOCK_EX);
	/////////////////////////////////////////////////////////ligne 14//////////////////////////////////////////////////////////
	$query14='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab14[1].'","'.$tab14[2].'","'.$tab14[3].'","'.$tab14[4].'","'.$tab14[5].'","'.$tab14[6].'","'.$tab14[7].'","'.$tab14[8].'","'.$tab14[9].'","'.$tab14[10].'","'.$tab14[11].'", "'.$tab14[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse14=$bdd->exec($query14);
	
	$req14='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab14[1].'","'.$tab14[2].'","'.$tab14[3].'","'.$tab14[4].'","'.$tab14[5].'","'.$tab14[6].'","'.$tab14[7].'","'.$tab14[8].'","'.$tab14[9].'","'.$tab14[10].'","'.$tab14[11].'", "'.$tab14[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req14.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 15///////////////////////////////////////////////////////////////
	$query15='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab15[1].'","'.$tab15[2].'","'.$tab15[3].'","'.$tab15[4].'","'.$tab15[5].'","'.$tab15[6].'","'.$tab15[7].'","'.$tab15[8].'","'.$tab15[9].'","'.$tab15[10].'","'.$tab15[11].'", "'.$tab15[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse15=$bdd->exec($query15);
	
	$req15='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab15[1].'","'.$tab15[2].'","'.$tab15[3].'","'.$tab15[4].'","'.$tab15[5].'","'.$tab15[6].'","'.$tab15[7].'","'.$tab15[8].'","'.$tab15[9].'","'.$tab15[10].'","'.$tab15[11].'", "'.$tab15[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req15.";", FILE_APPEND | LOCK_EX);
	/////////////////////////////////////////////////////////ligne 16/////////////////////////////////////////////////////////
	$query16='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab16[1].'","'.$tab16[2].'","'.$tab16[3].'","'.$tab16[4].'","'.$tab16[5].'","'.$tab16[6].'","'.$tab16[7].'","'.$tab16[8].'","'.$tab16[9].'","'.$tab16[10].'","'.$tab16[11].'", "'.$tab16[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse16=$bdd->exec($query16);
	
	$req16='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab16[1].'","'.$tab16[2].'","'.$tab16[3].'","'.$tab16[4].'","'.$tab16[5].'","'.$tab16[6].'","'.$tab16[7].'","'.$tab16[8].'","'.$tab16[9].'","'.$tab16[10].'","'.$tab16[11].'", "'.$tab16[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req16.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 17///////////////////////////////////////////////////////////////
	$query17='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab17[1].'","'.$tab17[2].'","'.$tab17[3].'","'.$tab17[4].'","'.$tab17[5].'","'.$tab17[6].'","'.$tab17[7].'","'.$tab17[8].'","'.$tab17[9].'","'.$tab17[10].'","'.$tab17[11].'", "'.$tab17[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse17=$bdd->exec($query17);
	
	$req17='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab17[1].'","'.$tab17[2].'","'.$tab17[3].'","'.$tab17[4].'","'.$tab17[5].'","'.$tab17[6].'","'.$tab17[7].'","'.$tab17[8].'","'.$tab17[9].'","'.$tab17[10].'","'.$tab17[11].'", "'.$tab17[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req17.";", FILE_APPEND | LOCK_EX);
	/////////////////////////////////////////////////////////ligne 18//////////////////////////////////////////////////////////
	$query18='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value("'.$tab18[1].'","'.$tab18[2].'","'.$tab18[3].'","'.$tab18[4].'",
	"'.$tab18[5].'","'.$tab18[6].'","'.$tab18[7].'","'.$tab18[8].'","'.$tab18[9].'","'.$tab18[10].'","'.$tab18[11].'",
	"'.$tab18[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse18=$bdd->exec($query18);
	
	$req18='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value("'.$tab18[1].'","'.$tab18[2].'","'.$tab18[3].'","'.$tab18[4].'",
	"'.$tab18[5].'","'.$tab18[6].'","'.$tab18[7].'","'.$tab18[8].'","'.$tab18[9].'","'.$tab18[10].'","'.$tab18[11].'",
	"'.$tab18[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req18.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 19///////////////////////////////////////////////////////////////
	$query19='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab19[1].'","'.$tab19[2].'","'.$tab19[3].'","'.$tab19[4].'","'.$tab19[5].'","'.$tab19[6].'","'.$tab19[7].'","'.$tab19[8].'","'.$tab19[9].'","'.$tab19[10].'","'.$tab19[11].'", "'.$tab19[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse19=$bdd->exec($query19);
	
	$req19='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab19[1].'","'.$tab19[2].'","'.$tab19[3].'","'.$tab19[4].'","'.$tab19[5].'","'.$tab19[6].'","'.$tab19[7].'","'.$tab19[8].'","'.$tab19[9].'","'.$tab19[10].'","'.$tab19[11].'", "'.$tab19[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req19.";", FILE_APPEND | LOCK_EX);
/////////////////////////////////////////////////////////ligne 20//////////////////////////////////////////////////////////////
	$query20='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab20[1].'","'.$tab20[2].'","'.$tab20[3].'","'.$tab20[4].'","'.$tab20[5].'","'.$tab20[6].'","'.$tab20[7].'","'.$tab20[8].'","'.$tab20[9].'","'.$tab20[10].'","'.$tab20[11].'", "'.$tab20[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse20=$bdd->exec($query20);
	
	$req20='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab20[1].'","'.$tab20[2].'","'.$tab20[3].'","'.$tab20[4].'","'.$tab20[5].'","'.$tab20[6].'","'.$tab20[7].'","'.$tab20[8].'","'.$tab20[9].'","'.$tab20[10].'","'.$tab20[11].'", "'.$tab20[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req20.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 21///////////////////////////////////////////////////////////////
	$query21='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab21[1].'","'.$tab21[2].'","'.$tab21[3].'","'.$tab21[4].'","'.$tab21[5].'","'.$tab21[6].'","'.$tab21[7].'","'.$tab21[8].'","'.$tab21[9].'","'.$tab21[10].'","'.$tab21[11].'", "'.$tab21[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse21=$bdd->exec($query21);
	
	$req21='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab21[1].'","'.$tab21[2].'","'.$tab21[3].'","'.$tab21[4].'","'.$tab21[5].'","'.$tab21[6].'","'.$tab21[7].'","'.$tab21[8].'","'.$tab21[9].'","'.$tab21[10].'","'.$tab21[11].'", "'.$tab21[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req21.";", FILE_APPEND | LOCK_EX);
	/////////////////////////////////////////////////////////ligne 22//////////////////////////////////////////////////////////
	$query22='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab22[1].'","'.$tab22[2].'","'.$tab22[3].'","'.$tab22[4].'","'.$tab22[5].'","'.$tab22[6].'","'.$tab22[7].'","'.$tab22[8].'","'.$tab22[9].'","'.$tab22[10].'","'.$tab22[11].'", "'.$tab22[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse22=$bdd->exec($query22);
	
	$req22='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab22[1].'","'.$tab22[2].'","'.$tab22[3].'","'.$tab22[4].'","'.$tab22[5].'","'.$tab22[6].'","'.$tab22[7].'","'.$tab22[8].'","'.$tab22[9].'","'.$tab22[10].'","'.$tab22[11].'", "'.$tab22[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req22.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 23///////////////////////////////////////////////////////////////
	$query23='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab23[1].'","'.$tab23[2].'","'.$tab23[3].'","'.$tab23[4].'","'.$tab23[5].'","'.$tab23[6].'","'.$tab23[7].'","'.$tab23[8].'","'.$tab23[9].'","'.$tab23[10].'","'.$tab23[11].'", "'.$tab23[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse23=$bdd->exec($query23);
	
	$req23='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab23[1].'","'.$tab23[2].'","'.$tab23[3].'","'.$tab23[4].'","'.$tab23[5].'","'.$tab23[6].'","'.$tab23[7].'","'.$tab23[8].'","'.$tab23[9].'","'.$tab23[10].'","'.$tab23[11].'", "'.$tab23[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req23.";", FILE_APPEND | LOCK_EX);
	/////////////////////////////////////////////////////////ligne 24/////////////////////////////////////////////////////////
	$query24='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab24[1].'","'.$tab24[2].'","'.$tab24[3].'","'.$tab24[4].'","'.$tab24[5].'","'.$tab24[6].'","'.$tab24[7].'","'.$tab24[8].'","'.$tab24[9].'","'.$tab24[10].'","'.$tab24[11].'", "'.$tab24[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse24=$bdd->exec($query24);
	
	$req24='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab24[1].'","'.$tab24[2].'","'.$tab24[3].'","'.$tab24[4].'","'.$tab24[5].'","'.$tab24[6].'","'.$tab24[7].'","'.$tab24[8].'","'.$tab24[9].'","'.$tab24[10].'","'.$tab24[11].'", "'.$tab24[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req24.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 25///////////////////////////////////////////////////////////////
	$query25='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab25[1].'","'.$tab25[2].'","'.$tab25[3].'","'.$tab25[4].'","'.$tab25[5].'","'.$tab25[6].'","'.$tab25[7].'","'.$tab25[8].'","'.$tab25[9].'","'.$tab25[10].'","'.$tab25[11].'", "'.$tab25[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse25=$bdd->exec($query25);
	
	$req25='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab25[1].'","'.$tab25[2].'","'.$tab25[3].'","'.$tab25[4].'","'.$tab25[5].'","'.$tab25[6].'","'.$tab25[7].'","'.$tab25[8].'","'.$tab25[9].'","'.$tab25[10].'","'.$tab25[11].'", "'.$tab25[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req25.";", FILE_APPEND | LOCK_EX);
	///////////////////////////////////////////////////////ligne 26////////////////////////////////////////////////////////////
	$query26='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab26[1].'","'.$tab26[2].'","'.$tab26[3].'","'.$tab26[4].'","'.$tab26[5].'","'.$tab26[6].'","'.$tab26[7].'","'.$tab26[8].'","'.$tab26[9].'","'.$tab26[10].'","'.$tab26[11].'", "'.$tab26[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse26=$bdd->exec($query26);
	
	$req26='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab26[1].'","'.$tab26[2].'","'.$tab26[3].'","'.$tab26[4].'","'.$tab26[5].'","'.$tab26[6].'","'.$tab26[7].'","'.$tab26[8].'","'.$tab26[9].'","'.$tab26[10].'","'.$tab26[11].'", "'.$tab26[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req26.";", FILE_APPEND | LOCK_EX);
	/////////////////////////////////////////////////////////ligne 27//////////////////////////////////////////////////////////
	$query27='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab27[1].'","'.$tab27[2].'","'.$tab27[3].'","'.$tab27[4].'","'.$tab27[5].'","'.$tab27[6].'","'.$tab27[7].'","'.$tab27[8].'","'.$tab27[9].'","'.$tab27[10].'","'.$tab27[11].'", "'.$tab27[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse27=$bdd->exec($query27);
	
	$req27='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab27[1].'","'.$tab27[2].'","'.$tab27[3].'","'.$tab27[4].'","'.$tab27[5].'","'.$tab27[6].'","'.$tab27[7].'","'.$tab27[8].'","'.$tab27[9].'","'.$tab27[10].'","'.$tab27[11].'", "'.$tab27[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req27.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 28///////////////////////////////////////////////////////////////
	$query28='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab28[1].'","'.$tab28[2].'","'.$tab28[3].'","'.$tab28[4].'","'.$tab28[5].'","'.$tab28[6].'","'.$tab28[7].'","'.$tab28[8].'","'.$tab28[9].'","'.$tab28[10].'","'.$tab28[11].'", "'.$tab28[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse28=$bdd->exec($query28);
	
	$req28='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab28[1].'","'.$tab28[2].'","'.$tab28[3].'","'.$tab28[4].'","'.$tab28[5].'","'.$tab28[6].'","'.$tab28[7].'","'.$tab28[8].'","'.$tab28[9].'","'.$tab28[10].'","'.$tab28[11].'", "'.$tab28[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req28.";", FILE_APPEND | LOCK_EX);
	/////////////////////////////////////////////////////////ligne 29/////////////////////////////////////////////////////////
	$query29='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab29[1].'","'.$tab29[2].'","'.$tab29[3].'","'.$tab29[4].'","'.$tab29[5].'","'.$tab29[6].'","'.$tab29[7].'","'.$tab29[8].'","'.$tab29[9].'","'.$tab29[10].'","'.$tab29[11].'", "'.$tab29[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse29=$bdd->exec($query29);
	
	$req29='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab29[1].'","'.$tab29[2].'","'.$tab29[3].'","'.$tab29[4].'","'.$tab29[5].'","'.$tab29[6].'","'.$tab29[7].'","'.$tab29[8].'","'.$tab29[9].'","'.$tab29[10].'","'.$tab29[11].'", "'.$tab29[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req29.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 30///////////////////////////////////////////////////////////////
	$query30='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab30[1].'","'.$tab30[2].'","'.$tab30[3].'","'.$tab30[4].'","'.$tab30[5].'","'.$tab30[6].'","'.$tab30[7].'","'.$tab30[8].'","'.$tab30[9].'","'.$tab30[10].'","'.$tab30[11].'", "'.$tab30[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse30=$bdd->exec($query30);
	
	$req30='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab30[1].'","'.$tab30[2].'","'.$tab30[3].'","'.$tab30[4].'","'.$tab30[5].'","'.$tab30[6].'","'.$tab30[7].'","'.$tab30[8].'","'.$tab30[9].'","'.$tab30[10].'","'.$tab30[11].'", "'.$tab30[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req30.";", FILE_APPEND | LOCK_EX);
////////////////////////////////////////////////////////ligne 31///////////////////////////////////////////////////////////////
	$query31='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab31[1].'","'.$tab31[2].'","'.$tab31[3].'","'.$tab31[4].'","'.$tab31[5].'","'.$tab31[6].'","'.$tab31[7].'","'.$tab31[8].'","'.$tab31[9].'","'.$tab31[10].'","'.$tab31[11].'", "'.$tab31[12].'","'.$total.'",'.$UTIL_ID.')';
	$reponse31=$bdd->exec($query31);
	
	$req31='insert into tab_g8 (G8_MOIS1, G8_MOIS2, G8_MOIS3, G8_MOIS4, G8_MOIS5, G8_MOIS6, G8_MOIS7, G8_MOIS8, G8_MOIS9, G8_MOIS10, G8_MOIS11, G8_MOIS12, G8_PERIODE,UTIL_ID) value
	("'.$tab31[1].'","'.$tab31[2].'","'.$tab31[3].'","'.$tab31[4].'","'.$tab31[5].'","'.$tab31[6].'","'.$tab31[7].'","'.$tab31[8].'","'.$tab31[9].'","'.$tab31[10].'","'.$tab31[11].'", "'.$tab31[12].'","'.$total.'",'.$UTIL_ID.')';
		
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req31.";", FILE_APPEND | LOCK_EX);

?>