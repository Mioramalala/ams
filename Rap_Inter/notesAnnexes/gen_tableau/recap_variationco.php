<?php 
	session_start();
	include_once "../../../connexion.php";
	//requiert
	$identreprise = $_SESSION['ENTREPRISE_ID'];
	$mission_id   = $_SESSION['idMission'];
	$N        = $_SESSION['N'];
	$N1        = $_SESSION['N1'];
	$dateN = $_SESSION['N'];
	$texte = "Cette rubrique s'analyse comme suit aux ".$dateN." et ".$N1." (en Ariary) :";
	// $mission_id = 5;
	// $rb_cycle = @$_GET['p'];
	$rb_cycle = 'immoco';
	$cycle    = 'variation';
	$titre    = 'Variations des immobilisations corporelles';
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
			<div class="tableau ">
				<table class="table table-hover">
					<thead>
						<th >Rubrique</th>
						<th width="17%" style="text-align: right">Valeur brute au <?php echo $N1; ?></th>
						<th width="17%" style="text-align: right">Acquisition</th>
						<th width="17%" style="text-align: right">Cession</th>
						<th width="17%" style="text-align: right">Valeur nette au <?php echo $N; ?></th>
					</thead>
					<tbody>
						<?php 
						$sql = "SELECT * FROM tab_rubrique_notes_annexes where rubrique_cycle like '".$rb_cycle."' AND ENTREPRISE_ID =".$identreprise." ORDER BY rubrique_libelle ASC ";

							$req = $bdd->query($sql) or die("error:    ".$sql);
							$j = 0;
							$t1=$t2=$t3=$t4=0;
							while($rub = $req->fetch())
							{
							// 	//=============N-1==================================//

							$vbruten1 = "SELECT sum(RA_SOLDE_N1) as vn1 FROM tab_ra WHERE MISSION_ID=".$mission_id."  AND rubrique_cycle='".$rb_cycle."' AND rubrique_id=".$rub['rubrique_id']." AND Type='B'";	
							$req_vb = $bdd->query($vbruten1) or die("error:    ".$vbruten1);
							$vb = $req_vb->fetch();
							/*============VN1========*/
									$VN1=$vb['vn1'];
							/*============VN1========*/

							$sql_acqui = "SELECT sum(GL_GENC2_DEBIT) as d,sum(GL_GENC2_CREDIT) as c FROM tab_gl_genc2 WHERE MISSION_ID=".$mission_id."  AND rubrique_id=".$rub['rubrique_id']." AND Type='AC'";	
							$req_acqui = $bdd->query($sql_acqui) or die("error:    ".$sql_acqui);
							$acqui = $req_acqui->fetch();
							$D=$acqui['d'];
							$C=$acqui['c'];
							/*=======ACQUISITION========*/
										$ACQUI=$D-$C;
							/*=======ACQUISITION========*/
							$sql_cession = "SELECT sum(GL_GENC2_DEBIT) as d,sum(GL_GENC2_CREDIT) as c FROM tab_gl_genc2 WHERE MISSION_ID=".$mission_id."  AND rubrique_id=".$rub['rubrique_id']." AND Type='CE'";	
							$req_cession = $bdd->query($sql_cession) or die("error:    ".$sql_cession);
							$cession = $req_cession->fetch();
							$D1=$cession['d'];
							$C1=$cession['c'];
							/*=======CESSION========*/
										$CESS=$C1-$D1;
							/*=======CESSION========*/
							/*=======TotalN========*/
										$VN=$VN1+$ACQUI+$CESS;
							/*=======TotalN========*/


						//mandingana ref zero (tsisy val n rubrik)
						 // $t=$VN+$n1;				 
						 if($VN1==0) continue ;
						 
							$t1+=$VN1;
							$t2+=$ACQUI;
							$t3+=$CESS;
							$t4+=$VN;
							?>
								<tr>
								 	<td><?php echo $rub["rubrique_libelle"]; ?></td>
								 	<input type="hidden"  id="vrub-<?php  echo $j;?>">
			 						<td width="17%" style="text-align: right;"><?php echo number_format($VN1, 2, ',', ' '); ; ?></td>
								 	<input type="hidden" id="vd-<?php  echo $j;?>" value="<?php echo $VN1; ?>">
								 	<td width="17%" style="text-align: right;"><?php echo number_format($ACQUI, 2, ',', ' '); ?></td>
								 	<input type="hidden" id="vc-<?php  echo $j;?>" value="<?php echo $ACQUI; ?>">
								 	<td width="17%" style="text-align: right;"><?php echo number_format($CESS, 2, ',', ' '); ?></td>
								 	<input type="hidden"  id="vn-<?php  echo $j;?>" value="<?php echo $CESS; ?>">
								 	<td width="17%" style="text-align: right;padding-right:2%;"><?php echo number_format($VN, 2, ',', ' '); ?></td>
								 	<input type="hidden" id="vn1-<?php  echo $j;?>" value="<?php echo $VN; ?>">
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
					 	<td id="" width="17%" style="text-align: right;"><?php echo number_format($t1, 2, ',', ' '); ?></td>
					 	<td id="" width="17%" style="text-align: right;"><?php echo number_format($t2, 2, ',', ' '); ?></td>
					 	<td id="" width="17%" style="text-align: right;"><?php echo number_format($t3, 2, ',', ' '); ?></td>
					 	<td id="" width="17%" style="text-align: right;"><?php echo number_format($t4, 2, ',', ' '); ?></td>
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
<input type="hidden" id="cycle" value="<?php echo $cycle; ?>">
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
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/variation_immoco.php?p="+cycle);
	});
	//enregistre le tableau pour notes annexes
	$("#enregistrer").click(function(){
		//genere le tableau
	for (var i = 0; i < j; i++) {
		$.ajax({
			type: "post",
			url : "Rap_Inter/notesAnnexes/php/enreg_recap.php",
			data: { idm: idmission, cycle:cycle, rubrique: vrub[i], d:vd[i], c:vc[i], n:vn[i], n1:vn1[i] },
			success: function(reponse){

				if(reponse!="ok")
				{
					alert(reponse);
				}
			},
			error: function(){ alert('oups...'); }
		});
	}
		// getOutput();
		alert('Enregistrement réussi');
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_cycle.php?p="+cycle);

	});

	//-->
</script>

