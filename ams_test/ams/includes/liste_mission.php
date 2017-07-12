<div class="conteneur_table">
	<table>
		<tr>
			<td>
				<caption class="titre_liste" id="titre_liste_mission">Liste des missions</caption>
			</td>
		</tr>

		<tr id="titre_tab1">
			<td style="width:10%"><center>Année</center></td>
			<td style="width:12%"><center>Type</center></td>
			<td style="width:22%; color:#fff">Debut exercice</td>
			<td style="width:20%"><center>Fin exercice</center></td>

			<td style="width:0%"><center>Entreprise</center></td>
			<td style="width:30%"><center>Deadline</center></td>
		</tr>


<?php 
	$sqlMission = "SELECT MISSION_ID,MISSION_DATE_DEBUT, MISSION_DATE_CLOTURE, MISSION_ANNEE, MISSION_TYPE ,ENTREPRISE_ID,MISSION_DEADLINE
	FROM tab_mission ORDER BY MISSION_ID DESC";
	$repMiss    = $bdd->query($sqlMission);
	$compt      = 0;
	
	while($donneeMiss = $repMiss->fetch())
	{
		
		$MissID       = $donneeMiss['MISSION_ID'];
		$MissDateDeb  = $donneeMiss['MISSION_DATE_DEBUT'];
		$MissDateClot = $donneeMiss['MISSION_DATE_CLOTURE'];
		$MissAnnée    = $donneeMiss['MISSION_ANNEE'];
		$MissType     = $donneeMiss['MISSION_TYPE'];
		$IdEntr       = $donneeMiss['ENTREPRISE_ID'];

		$MISSION_DEADLINE=$donneeMiss['MISSION_DEADLINE'];
			
		$sqlNomE      = "SELECT ENTREPRISE_CODE FROM tab_entreprise WHERE ENTREPRISE_ID=".$IdEntr;
		$repN         = $bdd->query($sqlNomE);
		while($donN = $repN->fetch()){
			$NomEntreprise=$donN["ENTREPRISE_CODE"];
		}
		
		?>
	
			<tr id="<?php echo $MissID ;?>" onclick="select(this.id);PositionProcess('<?php echo $IdEntr; ?>','<?php echo $MissAnnée; ?>','<?php echo $MissType; ?>')" class="cl_Mission" onMouseOver="afficheStatut(<?php echo $IdEntr; ?>);">
				<td><?php echo $MissAnnée ;?></td>
				<td><?php echo $MissType ;?></td>
				<td><?php echo $MissDateDeb ;?></td>
				<td> </td>
				<td><?php echo $MissDateClot ;?></td>
				<td><?php echo $NomEntreprise ;?></td>
				<td><?php echo $MISSION_DEADLINE ;?></td>
			</tr>
	
<?php 
		$compt++;
	}
?>


	</table>
</div>
