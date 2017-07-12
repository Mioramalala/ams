<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
?>
<script>
var maxprogress = 100;   // total à atteindre
var actualprogress25 = 25;  // valeur courante
var actualprogress45 = 45;
var actualprogress95 = 95;
var itv = 0;  // id pour setinterval
function prog()
{
  if(actualprogress25 >= maxprogress) 
  {
    clearInterval(itv);   	
    return;
  }	
  var progressnum25 = document.getElementById("progressnum25");
  var indicator = document.getElementById("indicator");
  actualprogress25 += 1;	
  indicator.style.width=actualprogress25 + "px";
  progressnum25.innerHTML = actualprogress25;
  if(actualprogress25 == maxprogress) clearInterval(itv);   
}
</script>
<style>
#pwidget
{
  background-color:white;
  width:254px;
  padding:2px;
  -moz-border-radius:3px;
  border-radius:3px;
  text-align:left;
  border:1px solid gray;	
}
#progressbar_green
{
  width:180px;
  padding:1px;
  background-color:green;
  border:1px solid black;
  height:15px;
}
#progressbar_red
{
  width:180px;
  padding:1px;
  background-color:red;
  border:1px solid black;
  height:15px;
}
#indicator
{
  width:0px;
  background-image:url("shaded-green.png");
  height:28px;
  margin:0;
}
#progressnum25
{
  text-align:center;
  width:250px;
}
#progressnum50
{
  text-align:center;
  width:250px;
}
</style>
<div class="conteneur_table">
	<table cellpadding="4" cellspacing="0">
		<caption class="titre_liste" id="titre_statut_mission">Missions en cours</caption>
		
			<tr id="titre_tabstat" style=''>
				<td style="width:63%;">Entreprise</td>
				<td style="width:auto;">Cours de progression</td>
			</tr>
		<?php
		$sqlMission="SELECT MISSION_ID,MISSION_DATE_DEBUT, MISSION_DATE_CLOTURE, MISSION_ANNEE, MISSION_TYPE ,ENTREPRISE_ID,MISSION_DEADLINE
		FROM tab_mission order by MISSION_ID desc";
		$repMiss=$bdd->query($sqlMission);
		$compt=0;
		while($donneeMiss=$repMiss->fetch())
			{
			$MissDeadline=$donneeMiss['MISSION_DEADLINE'];
			$IntDeadline=(int)$MissDeadline;
			$IdEntr=$donneeMiss['ENTREPRISE_ID'];
			$sqlNomE="SELECT ENTREPRISE_CODE, ENTREPRISE_RAISON_SOCIAL FROM tab_entreprise WHERE ENTREPRISE_ID=".$IdEntr;
			$repN=$bdd->query($sqlNomE);
			while($donN=$repN->fetch()){
				$NomEntreprise=$donN["ENTREPRISE_CODE"];
				$Raison_Sos=$donN['ENTREPRISE_RAISON_SOCIAL'];
			}
			$sqlCycle="SELECT MISSION_ID,QUESTION_ID FROM tab_objectif where MISSION_ID=".$mission_id;
			$repCycle=$bdd->query($sqlCycle);
			while($donN=$repCycle->fetch()){
				$question=$donN['QUESTION_ID'];
			}
			$sqlra="SELECT MISSION_ID,RA_CYCLE FROM tab_ra where MISSION_ID=".$mission_id;
			$repra=$bdd->query($sqlra);
			while($donN=$repN->fetch()){
				$ra_cycle=$donN['RA_CYCLE'];
			}
			$sqlrdc="SELECT MISSION_ID,RDC_CYCLE FROM tab_rdc where MISSION_ID=".$mission_id;
			$repra=$bdd->query($sqlCycle);
			while($donN=$repN->fetch()){
				$ra_cycle=$donN['RDC_CYCLE'];
			}
		?>
			<tr>
				<td><?php  echo $NomEntreprise.'  '.$Raison_Sos;?></td>
				<?php
				if($question=235){
				$comparaisonDeadline=19;
					if($comparaisonDeadline>$IntDeadline){
				?>
					
					<td><!--meter id="avancement" max="200" value="<?php //$i=19; echo $i; $i++;?>"></meter-->
						<!--progress id="avancement" value="25%" max="100"></progress-->
							<div id="progressbar_green">
								<div id="progressnum25">25%</div>
								<!--div id="progressnum45">45%</div-->
								<div id="indicator"></div>
							</div>
					</td>
					<td>
							<input type="button" name="Submit" value="Lancer" onclick="itv = setInterval(prog, 100)" />
							<input type="button" name="Submit" value="Stopper" onclick="clearInterval(itv)" />
					</td>
					
				<?php
					}
					else{
				?>
					<td>
						<div id="progressbar_red">
							<div id="progressnum25">25%</div>
							<div id="indicator"></div>
						</div>
					</td>
					<td>
							<input type="button" name="Submit" value="Lancer" onclick="itv = setInterval(prog, 100)" />
							<input type="button" name="Submit" value="Stopper" onclick="clearInterval(itv)" />
					</td>
				<?php
					}
				}
					else if($ra_cycle="fond" && $ra_cycle="immo" && $ra_cycle="immofi" && $ra_cycle="stock" && $ra_cycle="tresorerie" && $ra_cycle="charge" && $ra_cycle="vente" && $ra_cycle="paie" && $ra_cycle="impot" && $ra_cycle="emprunt" && $ra_cycle="dcd"){
					$comparaisonDeadline=19;
					if($comparaisonDeadline>$IntDeadline){
				?>
				
						<td>
							<div id="progressbar_green">
								<div id="progressnum45">45%</div>
								<div id="indicator"></div>
							</div>
					</td>
					<td>
							<input type="button" name="Submit" value="Lancer" onclick="itv = setInterval(prog, 100)" />
							<input type="button" name="Submit" value="Stopper" onclick="clearInterval(itv)" />
					</td>
					
				<?php
					}
					else{
				?>
					<td>
						<div id="progressbar_red">
							<div id="progressnum45">45%</div>
							<div id="indicator"></div>
						</div>
					</td>
					<td>
							<input type="button" name="Submit" value="Lancer" onclick="itv = setInterval(prog, 100)" />
							<input type="button" name="Submit" value="Stopper" onclick="clearInterval(itv)" />
					</td>
				<?php
					}
				}
				else if($rdc_cycle="Fond propre" && $ra_cycle="immobilisation corporelle et incorporelle" && $ra_cycle="immofi" && $ra_cycle="stock" && $ra_cycle="tresorerie" && $ra_cycle="charge_fournisseur" && $ra_cycle="prod_client" && $ra_cycle="paie" && $ra_cycle="impot_taxe" && $ra_cycle="emprunt" && $ra_cycle="DCD"){
					$comparaisonDeadline=19;
					if($comparaisonDeadline>$IntDeadline){
				?>
						<td>
							<div id="progressbar_green">
								<div id="progressnum95">95%</div>
								<div id="indicator"></div>
							</div>
					</td>
					<td>
							<input type="button" name="Submit" value="Lancer" onclick="itv = setInterval(prog, 100)" />
							<input type="button" name="Submit" value="Stopper" onclick="clearInterval(itv)" />
					</td>
					
				<?php
					}
					else{
				?>
					<td>
						<div id="progressbar_red">
							<div id="progressnum95">95%</div>
							<div id="indicator"></div>
						</div>
					</td>
					<td>
							<input type="button" name="Submit" value="Lancer" onclick="itv = setInterval(prog, 100)" />
							<input type="button" name="Submit" value="Stopper" onclick="clearInterval(itv)" />
					</td>
				<?php
					
					}
				}
				?>
			</tr>
			<?php 
				$compt++;
				}
				?>
	</table><!--fin liste mission-->
</div>