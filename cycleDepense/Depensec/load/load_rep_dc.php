<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=23 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$validDepenseC=$res_["nb"];

?>


<script>

$(function()
{

	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($validDepenseC==1)
	{

	?>
	$('#contdc textarea').attr('disabled',true);
	$('#contdc :input[type=radio]').attr('disabled',true);
	$('#contdc #Synthese_dc_Terminer').attr('disabled',true);
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
				// même filtre que en haut !!
				$('#contdc textarea').attr('disabled',true);
				$('#contdc :input[type=radio]').attr('disabled',true);
				$('#contdc #Synthese_dc_Terminer').attr('disabled',true);
			}
		}
	});

});


function select_tabdc(id, cpt, mission_id, cptFrm){
	quest_id="#Question_dc_"+cpt;
	$.ajax({
		type:'POST',
		url:'cycleDepense/Depensec/php/getRepdc.php',
		data:{cpt:cpt, mission_id:mission_id},
		success:function(e){
			doc=e.split(',');
			idcomment="#commentaire_Question_dc"+cptFrm;
			idrisqueoui="rad_Question_Oui_dc_"+cptFrm;
			idrisquena="rad_Question_NA_dc_"+cptFrm;
			idrisquenon="rad_Question_Non_dc_"+cptFrm;
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
			document.getElementById("int_dc_Retour").disabled=true;
			document.getElementById("Int_dc_Continuer").disabled=true;
			document.getElementById("Int_dc_Synthese").disabled=true;
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

$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_QCM, OBJECTIF_COMMENTAIRE, OBJECTIF_ID FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=23');

$couleur="#fff";
$cpt=295;
$cptFrm=1;
while($donnees=$reponse->fetch()){
?>
<tr bgcolor="<?php echo $couleur;?>" <?php if ($couleur=="#fff") echo $couleur="#efefef"; else $couleur="#fff"; ?> onclick="select_tabdc(this.id,<?php echo $cpt; ?>,<?php echo $mission_id;?>,<?php echo $cptFrm;?>)" id="tabc<?php echo $cpt; ?>" height="50">
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