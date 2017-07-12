<?php
	@session_start();
	$mission_id= $_SESSION['idMission'];
	include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



	$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=15 AND MISSION_ID= "'.$mission_id .'"' ;
	//print ($sql);
	$verif=$bdd->query($sql);
	$res_=$verif->fetch();
	$validPaieC=$res_["nb"];

?>


<script>


$(function(){

	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validPaieC==1)
	{

	?>
	$('#contpc textarea').attr('disabled',true);
	$('#contpc :input[type=radio]').attr('disabled',true);
	$('#contpc #Synthese_pc_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>

});


function select_tabpc(id, cpt, mission_id, cptFrm){
	quest_id="#Question_pc_"+cpt;
	$.ajax({
		type:'POST',
		url:'cyclePaie/Paiec/php/getReppc.php',
		data:{cpt:cpt, mission_id:mission_id},
		success:function(e){
			doc=e.split(',');
			idcomment="#commentaire_Question_pc"+cptFrm;
			idrisqueoui="rad_Question_Oui_pc_"+cptFrm;
			idrisquena="rad_Question_NA_pc_"+cptFrm;
			idrisquenon="rad_Question_Non_pc_"+cptFrm;
			risque=doc[1];
			if(risque=="OUI"){
				document.getElementById(idrisqueoui).checked=true;
			}
			else if(risque=="N/A"){
				document.getElementById(idrisquena).checked=true;
			}
			else if(risque=="NON"){
				document.getElementById(idrisquenon).checked=true;
			}
			document.getElementById("int_pc_Retour").disabled=true;
			document.getElementById("Int_pc_Continuer").disabled=true;
			document.getElementById("Int_pc_Synthese").disabled=true;
			$(idcomment).val(doc[0]);
			$(quest_id).show();			
		}
	});
}

</script>

<table width="100%" class="label">
<?php

include '../../../connexion.php';
$mission_id= $_SESSION['idMission'];

//$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=15');
$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID="'.$mission_id.'" AND CYCLE_ACHAT_ID=15');

$couleur="#fff";
$cpt=196;
$cptFrm=1;
while($donnees=$reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabpc(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
	<td width="60%"><?php echo $donnees['QUESTION_LIBELLE']; ?></td>
	<td width="10%"><?php echo $donnees['OBJECTIF_QCM']; ?></td>
	<td width="40%"><?php echo $donnees['OBJECTIF_COMMENTAIRE']; ?> 	
		<input type="text" id="tx<?php echo $cpt;?>"  value="<?php echo $donnees['OBJECTIF_ID']; ?>" style="display:none;"/>
	</td>

</tr>
<?php
$cpt++;
$cptFrm++;
}
?>
</table>