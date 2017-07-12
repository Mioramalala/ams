<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];
	include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';

	// tinay editer: 16 pour paie E.
	//$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=16 AND MISSION_ID='.$mission_id;
	$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=17 AND MISSION_ID='.$mission_id;

	$verif=$bdd->query($sql);
	$res_=$verif->fetch();
	$validPaieE=$res_["nb"];

?>

<script>

$(function()
{


	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validPaieE==1)
	{

	?>
	$('#contpe textarea').attr('disabled',true);
	$('#contpe:input[type=radio]').attr('disabled',true);
	$('#contpe #Synthese_pe_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>
});

function select_tabpe(id, cpt, mission_id, cptFrm){
	quest_id="#Question_pe_"+cpt;
	$.ajax({
		type:'POST',
		url:'cyclePaie/Paiee/php/getReppe.php',
		data:{cpt:cpt, mission_id:mission_id},
		success:function(e){
			doc=e.split(',');
			idcomment="#commentaire_Question_pe"+cptFrm;
			idrisqueoui="rad_Question_Oui_pe_"+cptFrm;
			idrisquena="rad_Question_NA_pe_"+cptFrm;
			idrisquenon="rad_Question_Non_pe_"+cptFrm;
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
			document.getElementById("int_pe_Retour").disabled=true;
			document.getElementById("Int_pe_Continuer").disabled=true;
			document.getElementById("Int_pe_Synthese").disabled=true;
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

$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=17');

$couleur="#fff";
$cpt=227;
$cptFrm=1;
while($donnees=$reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabpe(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
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