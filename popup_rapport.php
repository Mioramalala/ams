<!--//===================================== 00 1 RAPPORT==============================================================-->
<style type="text/css">
	li {
	    list-style-type: none;
	    margin-bottom: 5px;
	}
</style>
		<!---//============================tooltip ======================-->
<link rel="stylesheet" href="Dossier_Rapport/page_accueil/jquery.tooltip.css" />
<link rel="stylesheet" href="Dossier_Rapport/page_accueil/screen.css" />

<script src="Dossier_Rapport/page_accueil/lib/jquery.bgiframe.js" type="text/javascript"></script>
<script src="Dossier_Rapport/page_accueil/lib/jquery.dimensions.js" type="text/javascript"></script>
<script src="Dossier_Rapport/page_accueil/jquery.tooltip.js" type="text/javascript"></script>
<script src="Dossier_Rapport/page_accueil/event_accueil.js" type="text/javascript"></script>


<script type="text/javascript">
	$(function() {
		$('#yahoo li').tooltip({
			track: true,
			delay: 0,
			showURL: false,
			showBody: " - ",
			fade: 250
		});

		$('#right li').tooltip({
			track: true,
			delay: 0,
			showURL: false,
			extraClass: "right"
		});

		$('#right2 li').tooltip({ showURL: false, positionLeft: true });
		$("#block").click($.tooltip.block);
	});
</script>

<!--//===========================================================================================-->	
<?php

	session_start(); 
	include"Dossier_Rapport/connex.php"; 

	if (isset($_POST['z'])) {
		
		$ID_mission =$_POST['z'];
		//echo $ID_mission;
		$_SESSION['ID_mission_rapport']=$ID_mission;
						
		$liste = new CL_liste();
		echo '<ul  class="div" id="yahoo" style="margin-top:120px">';
				
		$liste->liste_tab_importer($ID_mission); //2
		$liste->liste_tab_bal_aux($ID_mission);  //3
		$liste->liste_tab_gl_gen($ID_mission);   //4
		$liste->liste_tab_gl_aux($ID_mission);   //5 
		echo'</ul>';

	}else{
		echo "Pas de rapport";
	}


//classe get table 
class CL_liste {
	
	function liste_tab_importer ($ID_mission){
		$req= db_connect ("SELECT DISTINCT(IMPORT_CHOIX_ANNEE),IMPORT_DOCUMENT,MISSION_ID,ENTREPRISE_ID FROM tab_importer WHERE MISSION_ID='$ID_mission' AND ENTREPRISE_ID=0"); //
		foreach ($req as $value) {
			$IMPORT_CHOIX_ANNEE =$value ['IMPORT_CHOIX_ANNEE'];
			$IMPORT_DOCUMENT =$value ['IMPORT_DOCUMENT'];
		    $MISSION_ID =$value ['MISSION_ID'];
			$ENTREPRISE_ID =$value ['ENTREPRISE_ID'];

			if (empty($IMPORT_CHOIX_ANNEE) && empty($IMPORT_DOCUMENT)) {
				echo "Balance g&eacute;n&eacute;rale vide";
			}else{
				echo '<li  title="'.$IMPORT_CHOIX_ANNEE.','.$IMPORT_DOCUMENT.'">  <a href="javascript:ouvre_popup(\'pop_up_fichier.php?page='.$IMPORT_CHOIX_ANNEE.','.$IMPORT_DOCUMENT.',tab_importer\')"  ><img src="icone/logo_societe.png" /></a></li>';
			}

		}

	}

	function liste_tab_bal_aux ($ID_mission){
		$req= db_connect ("SELECT DISTINCT(BAL_AUX_CHOIX_ANNEE),BAL_AUX_DOCUMENT,MISSION_ID,ENTREPRISE_ID FROM tab_bal_aux WHERE MISSION_ID='$ID_mission' AND ENTREPRISE_ID=0 ");
		foreach ($req as $value) {
			$BAL_AUX_CHOIX_ANNEE =$value ['BAL_AUX_CHOIX_ANNEE'];
			$BAL_AUX_DOCUMENT =$value ['BAL_AUX_DOCUMENT'];
			$MISSION_ID =$value ['MISSION_ID'];
				$ENTREPRISE_ID =$value ['ENTREPRISE_ID'];

			if (empty($BAL_AUX_CHOIX_ANNEE) && empty($BAL_AUX_DOCUMENT)) {
				echo "Balance auxiliaire vide";
			}else{
				echo '<li  title="'.$BAL_AUX_CHOIX_ANNEE.','.$BAL_AUX_DOCUMENT.'" ><a href="javascript:ouvre_popup(\'pop_up_fichier.php?page='.$BAL_AUX_CHOIX_ANNEE.','.$BAL_AUX_DOCUMENT.',tab_bal_aux\')"  ><img src="icone/logo_societe.png" /></a></li>';}


		}

	}
	function liste_tab_gl_gen ($ID_mission){

		$req= db_connect ("SELECT DISTINCT(GL_GEN_CHOIX_ANNEE),GL_GEN_DOCUMENT,MISSION_ID,ENTREPRISE_ID FROM tab_gl_gen WHERE MISSION_ID='$ID_mission' AND ENTREPRISE_ID=0");
		foreach ($req as $value) {
			$GL_GEN_CHOIX_ANNEE =$value ['GL_GEN_CHOIX_ANNEE'];
			$GL_GEN_DOCUMENT =$value ['GL_GEN_DOCUMENT'];
			$MISSION_ID =$value ['MISSION_ID'];
				$ENTREPRISE_ID =$value ['ENTREPRISE_ID'];

			if (empty($GL_GEN_CHOIX_ANNEE) && empty($GL_GEN_DOCUMENT)) {
				echo "Grand livre g&eacute;n&eacute;rale vide";
			}else{
				echo '<li   title="'.$GL_GEN_CHOIX_ANNEE.','.$GL_GEN_DOCUMENT.'"><a href="javascript:ouvre_popup(\'pop_up_fichier.php?page='.$GL_GEN_CHOIX_ANNEE.','.$GL_GEN_DOCUMENT.',tab_gl_gen\')" ><img src="icone/logo_societe.png" /></a></li>';}
		}

	}

	function liste_tab_gl_aux ($ID_mission){

		$req= db_connect ("SELECT DISTINCT(GL_AUX_CHOIX_ANNEE),GL_AUX_DOCUMENT,MISSION_ID,ENTREPRISE_ID FROM tab_gl_aux WHERE MISSION_ID='$ID_mission' AND ENTREPRISE_ID=0");
		foreach ($req as $value) {
			$GL_AUX_CHOIX_ANNEE =$value ['GL_AUX_CHOIX_ANNEE'];
			$GL_AUX_DOCUMENT =$value ['GL_AUX_DOCUMENT'];
			$MISSION_ID =$value ['MISSION_ID'];
			$ENTREPRISE_ID =$value ['ENTREPRISE_ID'];

			if (empty($GL_AUX_CHOIX_ANNEE) && empty($GL_AUX_DOCUMENT)) {
				echo "Grand livre auxiliaire vide";
			}else{
				echo '<li  title="'.$GL_AUX_CHOIX_ANNEE.','.$GL_AUX_DOCUMENT.'" ><a href="javascript:ouvre_popup(\'pop_up_fichier.php?page='.$GL_AUX_CHOIX_ANNEE.','.$GL_AUX_DOCUMENT.',tab_gl_aux\')"><img src="icone/logo_societe.png" /></a></li>';
			}
		}

	}


} //fin classe






?>
