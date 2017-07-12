<div class="conteneur_table">
	<table  id="tabl_2" cellpadding="0" cellspacing="0" >
			<td width="10%" align="center">Ann&eacute;e</td>
			<td width="18%" align="center">Type</td>
			<td width="22%" align="center">Date d expiration</td>
			<td width="10%"> </td>
			<td width="20%">Entreprise</td>
			
	</table> 
	<div style="overflow:auto" width="100%">
		<table cellpadding="0" cellspacing="0"  id="tabl_1" style="font-size:12px" >
<?php 
	$sqlMission = "SELECT DISTINCT a.MISSION_ID,a.MISSION_DATE_DEBUT, a.MISSION_DATE_CLOTURE, a.MISSION_ANNEE, a.MISSION_TYPE ,a.ENTREPRISE_ID
		FROM  tab_mission a,tab_distribution_tache b
		where a.MISSION_ID = b.MISSION_ID
		and   b.UTIL_ID    = '".$id_utilisateur."'
		order by MISSION_ID desc";
		
	$repMiss    = $bdd->query($sqlMission);
	$compt      = 0;
	while($donneeMiss = $repMiss->fetch()) {
		$MissID       = $donneeMiss['MISSION_ID'];
		$MissDateDeb  = $donneeMiss['MISSION_DATE_DEBUT'];
		$MissDateClot = $donneeMiss['MISSION_DATE_CLOTURE'];
		$MissAnnée    = $donneeMiss['MISSION_ANNEE'];
		$MissType     = $donneeMiss['MISSION_TYPE'];
		$IdEntr       = $donneeMiss['ENTREPRISE_ID'];
		
		$sqlNomE      = "SELECT ENTREPRISE_CODE FROM tab_entreprise WHERE ENTREPRISE_ID=".$IdEntr;
		$repN         = $bdd->query($sqlNomE);
		while($donN = $repN->fetch()) {
			$NomEntreprise = $donN["ENTREPRISE_CODE"];
		}
	
?>
			<tbody>
				<tr id="<?php echo $MissID;?>" onClick="select(this.id,<?php  echo $compt; ?>);PositionProcess('<?php echo $IdEntr; ?>','<?php echo $MissAnnée; ?>','<?php echo $MissType; ?>')" class="cl_Mission" onMouseOver="afficheStatut(<?php echo $IdEntr; ?>);affiche_tache(<?php echo $MissID;?>);" >
					<td width="10%" align="center"><?php echo $MissAnnée ;?></td>
					<td width="20%" align="center"><?php echo $MissType ;?></td>
					<td width="15%" align="center"><?php echo $MissDateDeb ;?></td>
					<td width="10%" align="center"> </td>
					<td width="20%" align="center"><?php echo $MissDateClot ;?></td>
					<td width="5%"><?php echo $NomEntreprise ;?></td>
				</tr>
		
<?php 
		$compt++;
	}
?> 
			</tbody>
		</table><!--fin liste mission-->
	</div>
</div>
