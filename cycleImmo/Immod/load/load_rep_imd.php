<?php
	include '../../../connexion.php';
	@session_start();
	$mission_id=$_SESSION['idMission'];


	$verif=$bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=9 AND MISSION_ID='.$mission_id);
	$resultat=$verif->fetch();
	$dataD=$resultat['nb'];

?>


<script>
	
	//tinay editer

	$(function(){
		// tinay editer: bloquer edition des radios et textarea après validation: 
		var dataD=parseInt(<?php echo $dataD;?>);
		if(dataD==1) {
			alert('misy conclusion load rep');
			$('textarea').attr('disabled',true);
			$(':input[type=radio]').attr('disabled',true);
			$('#Synthese_imd_Terminer').attr('disabled',true);
		};
	});

	function select_tabimd(id, cpt, mission_id, cptFrm){
		quest_id="#Question_imd_"+cpt;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immod/php/getRepimd.php',
			data:{cpt:cpt, mission_id:mission_id},
			success:function(e){
				doc=e.split(',');
				idcomment="#commentaire_Question_imd"+cptFrm;
				idrisqueoui="rad_Question_Oui_imd_"+cptFrm;
				idrisquena="rad_Question_NA_imd_"+cptFrm;
				idrisquenon="rad_Question_Non_imd_"+cptFrm;
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
				/*document.getElementById("int_imd_Retour").disabled=true;
				document.getElementById("Int_imd_Continuer").disabled=true;
				document.getElementById("Int_imd_Synthese").disabled=true;*/
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

//tinay editer
$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=9');


$couleur="#fff";
$cpt=106;
$cptFrm=1;

while($donnees= $reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabimd(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
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