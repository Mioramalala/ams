
<script>
function select_tabstb(id, cpt, mission_id, cptFrm){
	quest_id="#Question_stb_"+cpt;
	$.ajax({
		type:'POST',
		url:'cycleStock/Stockb/php/getRepstb.php',
		data:{cpt:cpt, mission_id:mission_id},
		success:function(e){
			doc=e.split(',');
			idcomment="#commentaire_Question_stb"+cptFrm;
			idrisqueoui="rad_Question_Oui_stb_"+cptFrm;
			idrisquena="rad_Question_NA_stb_"+cptFrm;
			idrisquenon="rad_Question_Non_stb_"+cptFrm;
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
			document.getElementById("int_stb_Retour").disabled=true;
			document.getElementById("Int_stb_Continuer").disabled=true;
			document.getElementById("Int_stb_Synthese").disabled=true;
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

$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=11');

$couleur="#fff";
$cpt=117;
$cptFrm=1;
while($donnees=$reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabstb(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
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