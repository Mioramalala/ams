<?php 
	session_start();
	include_once "../../../connexion.php";
	//requiert
	$identreprise = $_SESSION['ENTREPRISE_ID'];
	$mission_id = $_SESSION['idMission'];
	$N          = $_SESSION['A'];
	$N1         = $_SESSION['A1'];
	$dateN = $_SESSION['N'];
	$texte = "Cette rubrique s'analyse comme suit aux ".$dateN." et ".$N1." (en Ariary) :";
	// $mission_id = 5;
	$rb_cycle = @$_GET['p'];
	$cycle = $rb_cycle;
	
	switch ($rb_cycle) {
		case 'immofi':
			$titre = "Immobilisations financières";
			break;
		case 'immoco':
			$titre = "Immobilisations corporelles";
			break;
		case 'immoinco':
			$titre = "Immobilisations incorporelles";
			break;
		case 'stock':
			$titre = "STOCK";
			break;
		
		default:
			echo '<script>alert("Page introuvalble."); $("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_etat_fi.php");</script>';
			break;
	}
?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>

<!-- ================== Tableau d'attribution de rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
		<div id="GrandTitre"><?php echo $titre; ?></div><br>
	<div class="lstrubrique">
	<?php
				//echo "<p>".$texte."</p>";
	?>
		<div class="panel panel-default" >
			<div class="tableau ">
				<table class="table table-hover">
					<thead>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th style="text-align: right"><?php echo $N ?></th>
						<th style="text-align: right;padding-right:2%;"><?php echo $N1 ?></th>
					</thead>
					<thead>
						<th >Rubrique</th>
						<th width="15%" style="text-align: right">Valeur brute</th>
						<th width="15%" style="text-align: right">Amortissement</th>
						<th width="15%" style="text-align: right">Valeur nette</th>
						<th width="15%" style="text-align: right;padding-right:2%;">Valeur nette</th>
					</thead>
					<tbody>
						<?php 

						$sql = "SELECT * FROM tab_rubrique_notes_annexes where rubrique_cycle like '".$cycle."' AND ENTREPRISE_ID =".$identreprise." ORDER BY rubrique_libelle ASC ";
							$req = $bdd->query($sql) or die("error:    ".$sql);
							$j = 0;
							$enreg = array();
							$t1=$t2=$t3=$t4=0;
							while($rub = $req->fetch())
							{
								//============= N ==================================//
								$sql_debit = "SELECT sum(RA_SOLDE_N) as d FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id='".$rub['rubrique_id']."' AND Type='B'";									
								$sql_credit = "SELECT sum(RA_SOLDE_N) as c FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id='".$rub['rubrique_id']."' AND Type='A'";
								$req_debit = $bdd->query($sql_debit) or die("error:    ".$sql_debit);
								$debit = $req_debit->fetch();
								$d=$debit['d'];
								$req_credit = $bdd->query($sql_credit) or die("error:    ".$sql_credit);
								$credit = $req_credit->fetch();
								$c=$credit['c'];
								$n=$d+$c;
								//=============N-1==================================//

								$sql_debit = "SELECT sum(RA_SOLDE_N1) as d FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id='".$rub['rubrique_id']."' AND Type='B'";									
								$sql_credit = "SELECT sum(RA_SOLDE_N1) as c FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id='".$rub['rubrique_id']."' AND Type='A'";
								$req_debit = $bdd->query($sql_debit) or die("error:    ".$sql_debit);
								$debit = $req_debit->fetch();
								$d1=$debit['d'];
								$req_credit = $bdd->query($sql_credit) or die("error:    ".$sql_credit);
								$credit = $req_credit->fetch();
								$c1=$credit['c'];
								$n1=$d1+$c1;

							//mandingana ref zero (tsisy val n rubrik)
						 	$t=$n+$n1+$d+$c;		
						 	if($n==0 && $n1==0 && $d==0 && $c==0) continue ;
								$t1 += $d;	
								$t2 += $c;	
								$t3 += $n;	
								$t4 += $n1;	 
							?>
							<tr>
							 	<td id="vrub-<?php  echo $j;?>" idRubrique="<?php echo $rub['rubrique_id'] ?>"><?php echo $rub["rubrique_libelle"]; ?></td>
							 	<td width="15%" style="text-align: right;"><?php echo number_format($d, 2, ',', ' '); ?></td>
								 	<input type="hidden" id="vd-<?php  echo $j;?>" value="<?php echo $d; ?>">
							 	<td width="15%" style="text-align: right;"><?php echo number_format($c, 2, ',', ' '); ?></td>
								 	<input type="hidden" id="vc-<?php  echo $j;?>" value="<?php echo $c; ?>">
							 	<td width="15%" style="text-align: right;"><?php echo number_format($n, 2, ',', ' '); ?></td>
								 	<input type="hidden" id="vn-<?php  echo $j;?>" value="<?php echo $n; ?>">
							 	<td width="15%" style="text-align: right;padding-right:2%;"><?php echo number_format($n1, 2, ',', ' '); ?></td>
								 	<input type="hidden" id="vn1-<?php  echo $j;?>" value="<?php echo $n1; ?>">
							</tr>
						<?php 
							$j++;
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
					 	<td id="" width="15%" style="text-align: right;"><?php echo number_format($t1, 2, ',', ' '); ?></td>
					 	<td id="" width="15%" style="text-align: right;"><?php echo number_format($t2, 2, ',', ' '); ?></td>
					 	<td id="" width="15%" style="text-align: right;"><?php echo number_format($t3, 2, ',', ' '); ?></td>
					 	<td id="" width="15%" style="text-align: right;padding-right:2%;"><?php echo number_format($t4, 2, ',', ' '); ?></td>
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
<input type="hidden" id="cycle" value="<?php echo $rb_cycle; ?>">
<input type="hidden" id="idMission" value="<?php echo $mission_id; ?>">

<script type="text/javascript">
	<!--
	var	cycle = $("#cycle").val();
	var idmission = $("#idMission").val();
	var j = $("#rowCount").val();
	var vrub= new Array();
	var vd  = new Array();
	var vc  = new Array();
	var vn  = new Array();
	var vn1 = new Array();
	for (var i = 0; i < j; i++) {  
		vrub[i] = $("#vrub-"+i).text();
		vd[i] = $("#vd-"+i).val();
		vc[i] = $("#vc-"+i).val();
		vn[i] = $("#vn-"+i).val();
		vn1[i] = $("#vn1-"+i).val();
	}
	//suivant attribution rubrique
	$("#btn-preview").click(function(){
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_immo.php?p="+cycle);
	});
	//enregistre le tableau pour notes annexes
	$("#enregistrer").click(function(){
		//genere le tableau
	for (var i = 0; i < j; i++) {  
		// alert(vrub[i]+" | "+vd[i]+" | "+vc[i]+" | "+vn[i]+" | "+vn1[i]);
		$.ajax({
			type: "post",
			url : "Rap_Inter/notesAnnexes/php/enreg_recap.php",
			data: { idm: idmission, cycle:cycle, rubrique: vrub[i], d:vd[i], c:vc[i], n:vn[i], n1:vn1[i] },
			success: function(reponse){
				//alert(reponse);
				if(reponse!="ok")
				{
					alert(reponse);
				}
			},
			error: function(){ alert('oups...'); }
		});
	}
		alert('Enregistrement réussi');
		// alert('Enregistrement réussi');
		if(cycle=='immoco')$("#contenue_RA").load("Rap_Inter/notesAnnexes/immoco.php?p="+cycle);
		else $("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_cycle.php?p="+cycle);

	});

	//-->
</script>

