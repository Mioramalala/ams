<?php  
	include '../../../connexion.php';

	@session_start();
	$mission_id=$_SESSION['idMission'];

	$validStockC = '';
	$verif_=$bdd->query("SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID= '12' AND MISSION_ID='$mission_id'");

	$resultat=$verif_->fetch();
	$validStockC = $resultat['nb'];
?>


<script>
//tinay editer
	$(function(){
		// tinay editer: bloquer edition des radios et textarea après validation: 
		var validStockC= parseInt(<?php echo $validStockC;?>);
		if(validStockC==1) {
			alert('misy conclusion load rep');
			$('#interface_stc:textarea').attr('disabled',true);
			$('#interface_stc:input[type=radio]').attr('disabled',true);
			$('#Synthese_stc_Terminer').attr('disabled',true);
		};
	});
function select_tabstc(id, cpt, mission_id, cptFrm){
	quest_id="#Question_stc_"+cpt;
	$.ajax({
		type:'POST',
		url:'cycleStock/Stockc/php/getRepstc.php',
		data:{cpt:cpt, mission_id:mission_id},
		success:function(e){
			doc=e.split(',');
			idcomment="#commentaire_Question_stc"+cptFrm;
			idrisqueoui="rad_Question_Oui_stc_"+cptFrm;
			idrisquena="rad_Question_NA_stc_"+cptFrm;
			idrisquenon="rad_Question_Non_stc_"+cptFrm;
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
			document.getElementById("int_stc_Retour").disabled=true;
			document.getElementById("Int_stc_Continuer").disabled=true;
			document.getElementById("Int_stc_Synthese").disabled=true;
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

$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=12');

$couleur="#fff";
$cpt= 135;
$cptFrm=1;
while($donnees=$reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabstc(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
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