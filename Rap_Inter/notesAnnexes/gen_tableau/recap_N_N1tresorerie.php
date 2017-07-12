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
	$titre = "Trésorerie";

?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>

<!-- ================== Tableau d'attribution de rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
	<div id="GrandTitre"><?php echo $titre; ?></div><br>
		<div  class="lstsousrubrique">
		<?php 
		$sql = "SELECT * FROM tab_rubrique_notes_annexes 
		where rubrique_cycle like '".$rb_cycle."' AND ENTREPRISE_ID =".$identreprise;
			$res = $bdd->query($sql) or die("error:    ".$sql);
			$j = 0;
			while($rub = $res->fetch())
			{ 
				echo $rub['rubrique_libelle'];
				$id = $rub['rubrique_id'];
				//echo "<p>".$texte."</p>";

				?>
	<!-- <div class="lstrubrique" style=""> -->
		<div class="panel panel-default" >
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
						<th width="25%" style="text-align: right;">Valeur nette</th>
						<th width="25%" style="text-align: right;padding-right:2%;">Valeur nette</th>
					</thead>
					<tbody>
					<?php
								$sql = "SELECT * FROM tab_rubrique_sous	where rubrique_id=".$rub['rubrique_id']." ORDER BY rubrique_libelle ASC ";
								$req = $bdd->query($sql) or die("error:    ".$sql);
								// $j = 0;
								$t1=$t2=0;
								while($sous = $req->fetch())
								{
									//=============N==================================//
									// $sql_debit = "SELECT sum(RA_SOLDE_N) as d FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id=".$sous['sous_id'];
									$sql_debit = "SELECT sum( RA_SOLDE_N ) AS d FROM tab_ra WHERE MISSION_ID =".$mission_id." AND rubrique_cycle = '".$rb_cycle."' AND sous_rubrique =".$sous['sous_id'];
									$req_debit = $bdd->query($sql_debit) or die("error:    ".$sql_debit);
									$debit = $req_debit->fetch();
									$d=$debit['d'];	

									//=============N-1==================================//
									$sql_debit = "SELECT sum( RA_SOLDE_N1 ) as c FROM tab_ra WHERE MISSION_ID =".$mission_id."  AND rubrique_cycle = '".$rb_cycle."' AND sous_rubrique=".$sous['sous_id'];
									$req_debit = $bdd->query($sql_debit) or die("error:    ".$sql_debit);
									$debit = $req_debit->fetch();
									$c=$debit['c'];


									//mandingana ref zero (tsisy val n rubrik)
									 $ts1=$d+$c;
									 $ts2=$d-$c;				 
									 if($ts1==0 && $ts2==0) continue ;
									$t1+=$d;
									$t2+=$c;
								 
									?>
									<tr>
									 	<td id="output-rubrique<?php  echo $j;?>" idRubrique="<?php echo $rub['rubrique_id'] ?>"><?php echo $sous["rubrique_libelle"]; ?></td>
				 						<td id="v_brute<?php  echo $j;?>" width="25%" style="text-align: right;"><?php echo number_format($d, 2, ',', ' '); ?></td>
									 	<td id="amortissement<?php  echo $j;?>" width="25%" style="text-align: right;"><?php echo number_format($c, 2, ',', ' '); ?></td>
									</tr>
						<?php 
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
	<!-- </div> -->
<!-- COMMENTAIRE -->
		<div class="panel panel-default" >
			<div class="rescomment">
				<h5 style="text-align:left;">&nbsp;Commenter cette rubrique :&nbsp;&nbsp;<input type="checkbox" id="affichercom<?php echo $id; ?>" name="affichercom<?php echo $id; ?>" checked>&nbsp;<label for="affichercom<?php echo $id; ?>">Afficher</label></h5>
				<?php
				$sql = "SELECT * FROM tab_rubrique_com
					where rubrique_id=".$rub['rubrique_id'];
					$req = $bdd->query($sql) or die("error:    ".$sql);
					$com = $req->fetch();
				?>
				<textarea class="form-control" id="textcomment<?php echo $id; ?>"><?php echo stripslashes($com['commentaire']); ?></textarea>

				<div class="panel-footer">
					<button class="btn btn-default enregcomment" index="<?php echo $id; ?>" type="button">Enregistrer le commentaire</button>
				</div>
			</div>
		</div>
<br>
	<?php
					$totalrubN[$j] = $t1;
					$totalrubN1[$j] = $t2;
					$libelle[$j] = $rub['rubrique_libelle'];
		$j++;
		}
		?>
</div>
<!-- tableau recap //-->
<div class="lstrecap" >
<H3><?php echo $titre; ?></H3>
	<div class="panel panel-default" >
		<div class="tableau ">
			<table class="table table-hover">
				<thead>
					<th>Intitulé</th>
					<th width="25%" style="text-align: right;"><?php echo $N; ?></th>
					<th width="25%" style="text-align: right;"><?php echo $N1; ?></th>
				</thead>
				<tbody>
				<?php 
				$tN=0;
				$tN1=0;
				$lim =  count($libelle);

				for($i=0;$i<$lim;$i++)
				{
				?>				
					<tr>
					 	<td id="" idRubrique=""><?php echo $libelle[$i]; ?></td>
						<td id="" width="20%" style="text-align: right;"><?php echo number_format($totalrubN[$i], 2, ',', ' ') ; ?></td>
					 	<td id="" width="20%" style="text-align: right;padding-right:2%;"><?php echo number_format($totalrubN1[$i], 2, ',', ' ') ; ?></td>
					</tr>
					<?php 
					$tN += $totalrubN[$i] ;
					$tN1 += $totalrubN1[$i] ;

				} ?>
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
		<table style="width:100%;">
			
					<tr>
					 	<td id="" idRubrique="">TOTAL</td>
						<td id="" width="25%" style="text-align: right;"><?php echo number_format($tN , 2, ',', ' '); ?></td>
					 	<td id="" width="25%" style="text-align: right;padding-right:2%;"><?php echo number_format($tN1, 2, ',', ' '); ?></td>
					</tr>
		</table>
		</div>
	</div>
	</div>
</div>
<!-- tableau recap //-->

		<div class="panel-footer">
			<button id="btn-preview" class="btn btn-default">Retour</button>
			<button id="enregistrer" class="btn btn-primary">Enregistrer</button>
		</div>
<br/>
<br/>
</div>
<input type="hidden" id="cycle" value="<?php echo $rb_cycle; ?>">
<input type="hidden" id="idMission" value="<?php echo $mission_id; ?>">
<script type="text/javascript">
	<!--
	var	cycle = $("#cycle").val();
	var idMission = $("#idMission").val();
	//suivant attribution rubrique
	$("#btn-preview").click(function(){
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_tresorerie.php?p="+cycle);
	});
	//enregistre le tableau pour notes annexes
	$("#enregistrer").click(function(){
		//genere le tableau
		// getOutput();
		alert('Enregistrement réussi');
		if(cycle=='immoco')$("#contenue_RA").load("Rap_Inter/notesAnnexes/immoco.php?p="+cycle);
		else $("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_cycle.php?p="+cycle);

	});
	$(".enregcomment").click(function(){

		var idrub = $(this).attr("index");
		var	libelle   = $("#textcomment" + idrub).val();
		var affichage = $("#affichercom"+ idrub).is(":checked");

		console.log(libelle);
		if(libelle !=""){
			$.ajax({
				type: "post",
				url: "Rap_Inter/notesAnnexes/php/ajoutcomment.php",
				data: { libelle: libelle, rubrique:idrub, affichage:affichage },				
				success: function(e){
					alert(e);
					// $("#resultat" +  idrub).html(e);
				},
				error: function(){
					alert("aaaayyyy!");
				}
			});
		} else alert("Veuillez remplir le commentaire");
	});


	//-->
</script>

