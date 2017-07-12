<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=24 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$validDepenseD=$res_["nb"];

?>
<script>

$(function(){
	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validDepenseD==1)
	{

	?>
	$('#contdd textarea').attr('disabled',true);
	$('#contdd :input[type=radio]').attr('disabled',true);
	$('#contdd #Synthese_dd_Terminer').attr('disabled',true);
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
				$('#contdd textarea').attr('disabled',true);
				$('#contdd :input[type=radio]').attr('disabled',true);
				$('#contdd #Synthese_dd_Terminer').attr('disabled',true);
			}
		}
	});
});


function select_tabdd(id, cpt, mission_id, cptFrm){
	quest_id="#Question_dd_"+cpt;
	$.ajax({
		type:'POST',
		url:'cycleDepense/Depensed/php/getRepdd.php',
		data:{cpt:cpt, mission_id:mission_id},
		success:function(e){
			doc=e.split(',');
			iddomment="#commentaire_Question_dd"+cptFrm;
			idrisqueoui="rad_Question_Oui_dd_"+cptFrm;
			idrisquena="rad_Question_NA_dd_"+cptFrm;
			idrisquenon="rad_Question_Non_dd_"+cptFrm;
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
			document.getElementById("int_dd_Retour").disabled=true;
			document.getElementById("Int_dd_Continuer").disabled=true;
			document.getElementById("Int_dd_Synthese").disabled=true;
			$(iddomment).val(doc[0]);
			$(quest_id).show();			
		}
	});
}

</script>

<table width="100%" class="label">
<?php

include '../../../connexion.php';

$mission_id=$_POST['mission_id'];

$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=24');

$couleur="#fff";
$cpt=304;
$cptFrm=1;
while($donnees=$reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabdd(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
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