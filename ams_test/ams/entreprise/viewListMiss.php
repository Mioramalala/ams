<doctype html!>
<?php include'../connexion.php';?>
<html>
	<head>
		
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../css/cssEntreprise.css"/>
		<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
		
		<script>
		
			function select(idtr,cpt){
			var idrqdio="radioId"+cpt;
			document.getElementById(idrqdio).checked=true;
			 // alert(idtr);
			 $("#Acc").load("traitement.php");
			
			}

		
		
			
		</script>
	</head>
	<body>
		
			
		
			
		
		<center>
			<div id="info_entreprise" style="border-top:1px solid;">
				<table id="listMission">
					<th colspan="6" style="color:#fff;"> Liste de toutes les missions</th>
					<tr style="background-color:#00698d;">
						<td> </td>
						<td>Année</td>
						<td>Type</td>
						<td>Date debut</td>
						<td>Date cloture</td>
						<td>Entreprise</td>
					</tr>	
					
						<!--  requet select mission -->
							<?php
							$sqlMission="SELECT MISSION_ID,MISSION_DATE_DEBUT, MISSION_DATE_CLOTURE, MISSION_ANNEE, MISSION_TYPE ,ENTREPRISE_ID
							FROM   tab_mission order by MISSION_ID desc";
							$repMiss=$bdd->query($sqlMission);
							$compt=0;
							while($donneeMiss=$repMiss->fetch()){
							$MissID=$donneeMiss['MISSION_ID'];
							$MissDateBed=$donneeMiss['MISSION_DATE_DEBUT'];
							$MissDateClot=$donneeMiss['MISSION_DATE_CLOTURE'];
							$MissAnnée=$donneeMiss['MISSION_ANNEE'];
							$MissType=$donneeMiss['MISSION_TYPE'];
							$IdEntr=$donneeMiss['ENTREPRISE_ID'];
								
								$sqlNomE="SELECT ENTREPRISE_DENOMINATION_SOCIAL FROM tab_entreprise WHERE ENTREPRISE_ID=".$IdEntr;
								$repN=$bdd->query($sqlNomE);
								while($donN=$repN->fetch()){
									$NomEntreprise=$donN["ENTREPRISE_DENOMINATION_SOCIAL"];
								
								}
							?>
								
				
						<!--finnnn req-->
					
					<tr id="listE1<?php echo $compt;?>"  ondblclick="select(this.id,<?php  echo $compt; ?>)">
						<td><input type="radio" id="radioId<?php echo $compt;?>" name="radioName" value="<?php echo $MissID;?>"/></td>
						<td> <?php echo $MissAnnée ;?></td>
						<td> <?php echo $MissType ;?></td>
						<td> <?php echo $MissDateBed ;?></td>
						<td> <?php echo $MissDateClot ;?></td>
						<td> <?php echo $NomEntreprise ;?></td>
					</tr>
							<?php 
							$compt++;
							} ?>
				</table>
			</div>
		</center>
	</div>
	</body>
</html>