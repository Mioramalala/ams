<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<style>
#RA{
border-collapse:collapse;
font-size:12px;
}
#RA td{
border:1px solid;
}
.ttr{
background-color:#6495ED;
color:#fff;
height:10px;
}
.cldiv{
width:500px;
height:150px;
border:1px solid #6495ED;
}
.cltxt{
width:450px;
height:90px;
}
#syntCon{
background-color:#6495ED;
}
.chiffre {
	text-align: right;
}
td {
	padding-right : 10px;
}
</style>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
<div width="100%" height="70%">
		<label>REVUE ANALYTIQUE ET VERIFICATION DE LA VALIDATION DES FOURNISSEURS A SOLDE DEBITEUR</label>
		<div style="width:100%; height:230px; overflow:auto;">
			<table width="100%" id="RA">
				<tr class="ttr">
					<td align="center">Compte</td>
					<td align="center">Libellé</td>
					<td align="center">Débit</td>
					<td align="center">Crédit</td>
					<td align="center">Solde N</td>
					<td align="center">Solde N-1</td>
					<td align="center">Variation</td>
					<td align="center">Pourcentage</td>
					<td align="center">Commentaire</td>
				</tr>

		
			<?php
				include '../../../connexion.php';
				// include '/RA/fonctions_requetes.php';
		
				$reponse=$bdd->query("select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where RA_CYCLE='charge' AND MISSION_ID=".$mission_id." ORDER BY RA_COMPTE");
		
				while($donnees=$reponse->fetch()){
			?>
					<tr bgcolor="white">
						<td width="3%"><?php echo $donnees['RA_COMPTE'];?></td>
						<td><?php echo $donnees['RA_LIBELLE']?></td>
						<td class="chiffre"><?php echo number_format((double)$donnees['RA_D'],2,","," ");?></td>
						<td class="chiffre"><?php echo number_format((double)$donnees['RA_C'],2,","," ");?></td>
						<td class="chiffre"><?php echo number_format((double)$donnees['RA_SOLDE_N'],2,","," ");?></td>
						<td class="chiffre"><?php echo number_format((double)$donnees['RA_SOLDE_N1'],2,","," ");?></td>
						<td class="chiffre"><?php echo number_format((double)$donnees['RA_VARIATION'],2,","," ");?></td>
						<td class="chiffre"><?php echo number_format((double)$donnees['RA_POURCENTAGE'],2,","," ");?>%</td>
						<td><?php echo $donnees['RA_COMMENTAIRE'];?></td>
					</tr>
			<?php
				}
			?>
			</table>
		</div>
			<?php
				$reponseS=$bdd->query("select SYNTHESE  from tab_synthese_ra where SYNTHESE_OBJECTIF='charge' AND MISSION_ID=".$mission_id);
		
				$Synt=$reponseS->fetch();
				
				$reponseC=$bdd->query("select CONCLUSION from tab_conclusion_ra where CONCLUSION_OBJECTIF='charge' AND MISSION_ID=".$mission_id);
		
				$Conc=$reponseC->fetch();
			?>
		
		<div id="syntCon">
		<center>
			<table >
				<tr>
					<td>
						<div  div="synth" class="cldiv">
							<table>
								<tr>
									<td height="15px"><center><label>Synthèse</label></center></td>
								</tr>
								<tr>
									<td><textarea id="txtsynth" class="cltxt" readonly><?php echo $Synt["SYNTHESE"] ?></textarea></td>
								</tr>
							</table>
						</div>
					</td>
					<td>
						<div id="con" class="cldiv">
							<table>
								<tr>
									<td height="15px"><center><label>Conclusion</label></center></td>
								</tr>
								<tr>
									<td><textarea id="txtcon" class="cltxt" readonly><?php echo $Conc["CONCLUSION"] ?></textarea></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</center>
		</div>
		</div>
	