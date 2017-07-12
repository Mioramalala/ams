<?php
	include '../../../connexion.php';
	$mission_id=$_SESSION['idMission'];
	$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=8 AND MISSION_ID= "'.$mission_id .'"' );
	$resultat=$verif->fetch();
	$dataC=$resultat['nb'];

?>
<script>

	$(function(){
		// tinay editer: bloquer edition des radios et textarea après validation: 
		var dataC=parseInt(<?php echo $dataC;?>);
		if(dataC==1) {
			alert('misy conclusion load rep');
			$('textarea').attr('disabled',true);
			$(':input[type=radio]').attr('disabled',true);
			$('#Synthese_imc_Terminer').attr('disabled',true);
		};
	});

	function select_tabimc(id, cpt, mission_id, cptFrm){
		quest_id="#Question_imc_"+cpt;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immoc/php/getRepimc.php',
			data:{cpt:cpt, mission_id:mission_id},
			success:function(e){
				doc=e.split(',');
				idcomment="#commentaire_Question_imc"+cptFrm;
				idrisqueoui="rad_Question_Oui_imc_"+cptFrm;
				idrisquena="rad_Question_NA_imc_"+cptFrm;
				idrisquenon="rad_Question_Non_imc_"+cptFrm;
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
				/*document.getElementById("int_imc_Retour").disabled=true;
				document.getElementById("Int_imc_Continuer").disabled=true;
				document.getElementById("Int_imc_Synthese").disabled=true;*/
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

$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=8');

$couleur="#fff";
$cpt=93;
$cptFrm=1;

while($donnees=$reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabimc(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
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