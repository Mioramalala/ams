<?php 
	session_start();
	include_once "../../../connexion.php";
	//requiert
	$identreprise = $_SESSION['ENTREPRISE_ID'];
	$mission_id = $_SESSION['idMission'];
	$N        = $_SESSION['A'];
	$N1        = $_SESSION['A1'];
	$dateN = $_SESSION['N'];
	$texte = "Cette rubrique s'analyse comme suit aux ".$dateN." et ".$N1." (en Ariary) :";
	// $mission_id = 5;
	$rb_cycle = @$_GET['p'];
	$titre = "STOCK";

?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>

<!-- ================== Tableau d'attribution de rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
		<div id="GrandTitre"><?php echo $titre; ?></div><br>
	<div class="lstrubrique" style="">
	<?php
				//echo "<p>".$texte."</p>";
	?>

		<div class=" row panel panel-default" >
				<table class="table panel-heading">
				</table>
			<div class="tableau ">
				<table class="table table-hover">
					<thead>
						<th>&nbsp;</th>
						<th width="25%" style="text-align: right;"><?php echo $N ?></th>
						<th width="25%" style="text-align: right;padding-right:2%;"><?php echo $N1 ?></th>
					</thead>
					<thead>
						<th >Rubrique</th>
						<th width="25%" style="text-align: right;padding-right:2%;">Valeur nette</th>
						<th width="25%" style="text-align: right;padding-right:2%;">Valeur nette</th>
					</thead>
					<tbody>
						<?php 
						$sql = "SELECT * FROM tab_rubrique_notes_annexes where rubrique_cycle like '".$rb_cycle."' AND ENTREPRISE_ID =".$identreprise." ORDER BY rubrique_libelle ASC ";
							$req = $bdd->query($sql) or die("error:    ".$sql);
							$j = 0;
							$t1=$t2=0;
							while($rub = $req->fetch())
							{
								$sql_n = "SELECT sum(RA_SOLDE_N) as d FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id=".$rub['rubrique_id']." AND type='S'";
								$req_n = $bdd->query($sql_n) or die("error:    ".$sql_n);
								$debit = $req_n->fetch();
								$d=$debit['d'];
								//=============N-1==================================//

								$sql_n1 = "SELECT sum(RA_SOLDE_N1) as d1 FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id=".$rub['rubrique_id']." AND type='S'";									
								$req_n1 = $bdd->query($sql_n1) or die("error:    ".$sql_n1);
								$debit = $req_n1->fetch();
								$d1=$debit['d1'];




							// //mandingana ref zero (tsisy val n rubrik)
							 $t=$d+$d1;				 
							 if($t==0) continue ;
								$t1+=$d;
								$t2+=$d1;
							 
								?>
									<tr>
									 	<td id="output-rubrique<?php  echo $j;?>" idRubrique="<?php echo $rub['rubrique_id'] ?>"><?php echo $rub["rubrique_libelle"]; ?></td>
									 	<td id="v_netteN-<?php  echo $j;?>" width="20%" style="text-align: right;"><?php echo number_format($d, 2, ',', ' '); ?></td>
									 	<td id="v_netteN1-<?php  echo $j;?>" width="20%" style="text-align: right;padding-right:2%;"><?php echo number_format($d1, 2, ',', ' '); ?></td>
									</tr>
						<?php 
							$j++;
							}
							?>
							<tr><td colspan="3"><i>Provision pour perte de valeur :</i></td></tr>
							<?php
						$sql = "SELECT * FROM tab_rubrique_notes_annexes 
						where rubrique_cycle like '".$rb_cycle."' AND ENTREPRISE_ID =".$identreprise." ORDER BY rubrique_libelle ASC";
							$req = $bdd->query($sql) or die("error:    ".$sql);
							$k=0;
							while($rub = $req->fetch())
							{
								$sql_n = "SELECT sum(RA_SOLDE_N) as d FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id=".$rub['rubrique_id']." AND type='P'";
								$req_n = $bdd->query($sql_n) or die("error:    ".$sql_n);
								$d = $req_n->fetch();
								$d=$d['d'];
								$sql_n1 = "SELECT sum(RA_SOLDE_N1) as d1 FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id=".$rub['rubrique_id']." AND type='P'";
								$req_n1 = $bdd->query($sql_n1) or die("error:    ".$sql_n1);
								$d1 = $req_n1->fetch();
								$d1=$d1['d1'];


								$t=$d+$d1;				 
								if($t==0) continue ;
								$t1+=$d;
								$t2+=$d1;
						  ?>
									<tr>
									 	<td id="p-rubrique<?php  echo $k;?>" idRubrique="<?php echo $rub['rubrique_id'] ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rub["rubrique_libelle"]; ?></td>
									 	<td id="v_pN-<?php  echo $k;?>" width="20%" style="text-align: right;"><?php echo number_format($d, 2, ',', ' '); ?></td>
									 	<td id="v_pN1-<?php  echo $k;?>" width="20%" style="text-align: right;"><?php echo number_format($d1, 2, ',', ' '); ?></td>
									</tr>

						<?php 
						$k++;
							}
							?>

					</tbody>
				</table>
			</div>
			<input type="hidden" id="rowCount" value="<?php echo $j; ?>">
			<div class="panel-footer">
				<table style="width:100%">
					<tr>
					 	<td id="" idRubrique="">TOTAL</td>
					 	<td id="" width="25%" style="text-align: right;"><?php echo number_format($t1, 2, ',', ' '); ?></td>
					 	<td id="" width="25%" style="text-align: right;"><?php echo number_format($t2, 2, ',', ' '); ?></td>
					</tr>			
				</table>
			</div>
		</div>
	</div>
		<div class="panel-footer">
			<button id="btn-preview" class="btn btn-default">Retour</button>
			<button id="enregistrer" class="btn btn-primary">Enregistrer</button>
		</div>
</div>

</div>
<input type="hidden" id="cycle" value="<?php echo $rb_cycle; ?>">
<input type="hidden" id="idMission" value="<?php echo $mission_id; ?>">

<script type="text/javascript">
	<!--
	var	cycle = $("#cycle").val();
	var idMission = $("#idMission").val();
	//suivant attribution rubrique
	$("#btn-preview").click(function(){
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_stock.php?p="+cycle);
	});
	//enregistre le tableau pour notes annexes
	$("#enregistrer").click(function(){
		//genere le tableau
		// getOutput();
		alert('Enregistrement réussi');
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_cycle.php?p="+cycle);

	});

	//-->
</script>

