<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];
	include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



	$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id;
	//print ($sql);
	$verif=$bdd->query($sql);
	$res_=$verif->fetch();
	$validVenteB=$res_["nb"];

?>
<script>

$(function(){
	// tinay editer
	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validVenteB==1)
	{

	?>
	$('#contvb textarea').attr('disabled',true);
	$('#contvb :input[type=radio]').attr('disabled',true);
	$('#contvb #Synthese_vb_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>
});


function select_tabvb(id, cpt, mission_id, cptFrm){
	quest_id="#Question_vb_"+cpt;
	$.ajax({
		type:'POST',
		url:'cycleVente/Venteb/php/getRepvb.php',
		data:{cpt:cpt, mission_id:mission_id},
		success:function(e){
			doc=e.split(',');
			idcomment="#commentaire_Question_vb"+cptFrm;
			idrisqueoui="rad_Question_Oui_vb_"+cptFrm;
			idrisquena="rad_Question_NA_vb_"+cptFrm;
			idrisquenon="rad_Question_Non_vb_"+cptFrm;
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
			document.getElementById("int_vb_Retour").disabled=true;
			document.getElementById("Int_vb_Continuer").disabled=true;
			document.getElementById("Int_vb_Synthese").disabled=true;
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

$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=26');

$couleur="#fff";
$cpt=318;
$cptFrm=1;
while($donnees=$reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabvb(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
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