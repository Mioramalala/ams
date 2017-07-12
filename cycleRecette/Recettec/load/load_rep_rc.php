
<?php
	include $_SERVER["DOCUMENT_ROOT"]."/connexion.php";
	@session_start();
	$mission_id=$_SESSION['idMission'];

	$verif_=$bdd->query("SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID='19' AND MISSION_ID='$mission_id'");

	$resultat=$verif_->fetch();
	$validRecetteC=$resultat['nb'];
?>

<script>

$(function(){

	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validRecetteC==1)
	{

	?>
	$('#contrc textarea').attr('disabled',true);
	$('#contrc #Synthese_rc_Terminer').attr('disabled',true);
	$('#contrc :input[type=radio]').attr('disabled',true); // tinay editer
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>

	// ajout de filtre droit ecriture et validation
	var nom= $("#makaNom").val();
	var mission_id= document.getElementById("mission_id_index").value;
	$.ajax({
		type:"POST",
		url:"droitAccUtil.php", 
		data:{nom:nom,mission_id:mission_id},
		success:function(e){
			if(e==0){
				$('#contrc textarea').attr('disabled',true);
				$('#contrc #Synthese_rc_Terminer').attr('disabled',true);
				$('#contrc :input[type=radio]').attr('disabled',true); // tinay editer
			}
		}
	});


});


function select_tabrc(id, cpt, mission_id, cptFrm){
	quest_id="#Question_rc_"+cpt;
	$.ajax({
		type:'POST',
		url:'cycleRecette/Recettec/php/getReprc.php',
		data:{cpt:cpt, mission_id:mission_id},
		success:function(e){
			doc=e.split(',');
			idcomment="#commentaire_Question_rc"+cptFrm;
			idrisqueoui="rad_Question_Oui_rc_"+cptFrm;
			idrisquena="rad_Question_NA_rc_"+cptFrm;
			idrisquenon="rad_Question_Non_rc_"+cptFrm;
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
			document.getElementById("int_rc_Retour").disabled=true;
			document.getElementById("Int_rc_Continuer").disabled=true;
			document.getElementById("Int_rc_Synthese").disabled=true;
			$(idcomment).val(doc[0]);
			$(quest_id).show();			
		}
	});
}

</script>

<table width="100%" class="label">
<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=19');

$couleur="#fff";
$cpt=255;
$cptFrm=1;
$donnees= "";
while($donnees=$reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabrc(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
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