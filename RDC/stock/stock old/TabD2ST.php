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
								
				$("#btn_retD2ST").click(function(){
					
					$("#CohGauche").css("background-color","#dcdcdc");
					
					// $("#CohGauche").html("#CG");
					$("#contenue").load("RDC/stock/cohPrCom2ST.php");
				});
			
			});
		
		</script>
<style>
.td_Exercice{
border:2px solid #efefef;
}
</style>
<input type="button" id="btn_retD2ST" value="Retour" class="bouton"/>
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
<label>EXAMEN DES PRINCIPAUX RATIOS</label>	<br />
<label><u>1. Rotation des stocks de matières premières</u></label>
<table width="100%">
	<tr>
		<td class="td_Exercice"><label>Exercice</label></td>
		<td class="td_Exercice"><label>N</label></td>
		<td class="td_Exercice"><label>N-1</label></td>
		<td class="td_Exercice"><label>N-2</label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Stock initial (brut)</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Stock final (brut)</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Achats de matières premières (HT)</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Ratio (en nombre de jours) *</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Evolution du ratio</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
</table>
<label><u>2. Rotation des stocks de marchandises</u></label>
<table width="100%">
	<tr>
		<td class="td_Exercice"><label>Exercice</label></td>
		<td class="td_Exercice"><label>N</label></td>
		<td class="td_Exercice"><label>N-1</label></td>
		<td class="td_Exercice"><label>N-2</label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Stock initial (brut)</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Stock final (brut)</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Achats de marchandises (HT)</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Ratio (en nombre de jours) *</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
	<tr>
		<td class="td_Exercice"><label>Evolution du ratio</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
	</tr>
</table>
<label><u>3. Rotation des stocks des produits finis</u></label>
<table width="100%">
	<tr>
		<td class="td_Exercice"><label>Exercice</label></td>
		<td class="td_Exercice"><label>N</label></td>
		<td class="td_Exercice"><label>N-1</label></td>
		<td class="td_Exercice"><label>N-2</label></td>		
	</tr>
	<tr>
		<td class="td_Exercice"><label>Stock initial (brut)</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>		
	</tr>
	<tr>
		<td class="td_Exercice"><label>Stock final (brut)</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>		
	</tr>
	<tr>
		<td class="td_Exercice"><label>Ventes de produits (HT)</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>		
	</tr>
	<tr>
		<td class="td_Exercice"><label>Ratio (en nombre de jours) *</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>		
	</tr>
	<tr>
		<td class="td_Exercice"><label>Evolution du ratio</label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>
		<td class="td_Exercice"><label></label></td>		
	</tr>
</table>
		