<link rel="stylesheet" href="../../../class/css.css"/>
<?php

include '../../connexion.php';
@session_start();
$mission_id=$_SESSION['idMission'];

//--------------Get the name in the enterprise----------------------------//
$req_Entreprise=$bdd->query('select ENTREPRISE_DENOMINATION_SOCIAL,ENTREPRISE_CODE from  tab_entreprise inner join  tab_mission on tab_entreprise.ENTREPRISE_ID=tab_mission.ENTREPRISE_ID where MISSION_ID='.$mission_id);
$reponse_Entreprise=$req_Entreprise->fetch();
$name_Entreprise=$reponse_Entreprise['ENTREPRISE_DENOMINATION_SOCIAL'];
$ref_Entreprise=$reponse_Entreprise['ENTREPRISE_CODE'];

//-------------Get the days end in the mission by $mission_id-------------//
$req_Days=$bdd->query('select MISSION_DATE_CLOTURE from  tab_mission where MISSION_ID='.$mission_id);
$reponse_Days=$req_Days->fetch();
$days_End=$reponse_Days['MISSION_DATE_CLOTURE'];

?>
		<script>
			$(function(){
								
				$("#btn_retD11ST").click(function(){
					
					$("#CohGauche").css("background-color","#dcdcdc");
					
					// $("#CohGauche").html("#CG");
					$("#contenue").load("RDC/stock/cohPrCom21ST.php");
				});
			
			});
		
		</script>

<input type="button" id="btn_retD11ST" value="Retour" class="bouton"/>
<table>
	<tr>
		<td width="200"><label>Nom de l'entreprise :</label></td>
		<td width="200"><label><?php echo $name_Entreprise; ?></label></td>
		<td width="200"><label>Réference :</label></td>
		<td width="200"><label><?php echo $ref_Entreprise; ?></label></td>
	</tr>
	<tr>
		<td width="200"><label>Audit de comptes :</label></td>
		<td width="200"><label></label></td>
		<td width="200"><label>Collaborateur :</label></td>
		<td width="200"><label></label></td>
	</tr>
	<tr>
		<td width="200"><label>Exercices clos le :</label></td>
		<td width="200"><label><?php echo $days_End; ?></label></td>
		<td width="200"><label>Feuille Maîtresse :</label></td>
		<td width="200"><label>D</label></td>
	</tr>
</table>
<label>REVUE ANALYTIQUE	ET VERIFICATION DE LA VARIATION DES STOCKS</label>						
<table width="100%">
	<tr>
		<td  style="border:2px solid #efefef;"><label>Compte</label></td>
		<td style="border:2px solid #efefef;"><label>Libellé</label></td>
		<td style="border:2px solid #efefef;"><label>Débit</label></td>
		<td style="border:2px solid #efefef;"><label>Crédit</label></td>
		<td style="border:2px solid #efefef;"><label>Solde N</label></td>
		<td style="border:2px solid #efefef;"><label>Solde N-1</label></td>
		<td style="border:2px solid #efefef;"><label>Variation</label></td>
		<td style="border:2px solid #efefef;"><label>% de variation</label></td>
		<td style="border:2px solid #efefef;"><label>Commentaires</label></td>
		<td style="border:2px solid #efefef;"><label>Solde 603XX/713XX</label></td>
		<td style="border:2px solid #efefef;"><label>Ecart</label></td>
	</tr>
</table>
		