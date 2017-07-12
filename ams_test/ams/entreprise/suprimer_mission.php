<?php
session_start();
if($_SESSION['nom']!="Administrateur" && $_SESSION['nom']!="Super-Admin")
{
	print "non_autoriser";
	//print "Vous n'êtes pas autorisé!";
	exit();
}

include '../connexion.php';
$id_mission=$_POST["z"];
$id=@$_SESSION["idEntre"];
$bdd->exec("DELETE FROM tab_mission WHERE MISSION_ID=".$id_mission."");

?>

<table id="listMission">
			<?php
				$sqlMission="SELECT MISSION_ID,MISSION_DATE_DEBUT, MISSION_DATE_CLOTURE, MISSION_ANNEE, MISSION_TYPE 
				FROM   tab_mission WHERE ENTREPRISE_ID='". $id ."' order by MISSION_ID desc";
				$repMiss=$bdd->query($sqlMission);
				$compt=0;
				while($donneeMiss=$repMiss->fetch()){
					$MissId=$donneeMiss['MISSION_ID'];
					$MissDateBed=$donneeMiss['MISSION_DATE_DEBUT'];
					$MissDateClot=$donneeMiss['MISSION_DATE_CLOTURE'];
					$MissAnnée=$donneeMiss['MISSION_ANNEE'];
					$MissType=$donneeMiss['MISSION_TYPE'];
			?>
					<tr id="listE1<?php echo $compt;?>" >
						<td><input type="radio" id="radioId<?php echo $compt;?>" name="radioName" value="<?php echo $MissId;?>" onclick="PreProcess('<?php echo $id; ?>','<?php echo $MissAnnée; ?>','<?php echo $MissType; ?>')"/></td>
						<td > <?php echo $MissAnnée ?></td>
						<td > <?php echo $MissType ?></td>
						<td> <?php echo $MissDateBed ?></td>
						<td> <?php echo $MissDateClot ?></td>
					</tr>
				<?php 
					$compt++;
				}
				?>
	</table>


