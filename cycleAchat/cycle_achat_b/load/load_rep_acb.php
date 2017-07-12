
<script>

	function select_tabacb(id, cpt, mission_id, cptFrm){
		quest_id="#Question_acb_"+cpt;
		
		$.ajax({
			
			type:'POST',
			url:'cycleAchat/cycle_achat_b/php/getRepacb.php',
			data:{cpt:cpt, mission_id:mission_id},
			
			success:function(e){

				doc=e.split(',');
				idcomment="#commentaire_Question_acb"+cptFrm;
				idrisqueoui="rad_Question_Oui_acb_"+cptFrm;
				idrisquena="rad_Question_NA_acb_"+cptFrm;
				idrisquenon="rad_Question_Non_acb_"+cptFrm;
				risque=doc[1];

				if(risque=="OUI") {
					document.getElementById(idrisqueoui).checked=true;

				}else if(risque=="N/A") {
					document.getElementById(idrisquena).checked=true;

				}else if(risque=="NON") {
					document.getElementById(idrisquenon).checked=true;
				}
				
				//tinay editer : on desactive les menu de droite.
				document.getElementById("int_acb_Retour").disabled=true;
				document.getElementById("Int_acb_Continuer").disabled=true;
				document.getElementById("Int_acb_Synthese").disabled=true;

				
				$(idcomment).val(doc[0]);
				$(quest_id).show();			
			}
		});
	}

</script>
<table width="100%" class="label">

	<?php

		@session_start();
		include '../../../connexion.php';

		$mission_id=$_SESSION['idMission'];
		//$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE CYCLE_ACHAT_ID=2  AND MISSION_ID= "'.$mission_id .'"  ');
		$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE CYCLE_ACHAT_ID=2  AND MISSION_ID= "'.$mission_id .'" ORDER BY tab_question.QUESTION_ID ASC');

		$couleur="#fff";
		$cpt=1;
		$cptFrm=1;
		while($donnees=$reponse->fetch()){
	?>
			<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabacb(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
				<td width="60%"><?php echo utf8_encode($donnees['QUESTION_LIBELLE']); ?></td>
				<td width="10%"><?php echo $donnees['OBJECTIF_QCM']; ?></td>
				<td width="40%"><?php echo utf8_encode($donnees['OBJECTIF_COMMENTAIRE']); ?> 	
					<input type="text" id="tx<?php echo $cpt;?>"  value="<?php echo $donnees['OBJECTIF_ID']; ?>" style="display:none;"/>
				</td>

			</tr>
	
	<?php
			$cpt++;
			$cptFrm++;
		}
	?>

</table>