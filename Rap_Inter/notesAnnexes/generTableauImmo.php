<?php 
	session_start();
	include_once "../../connexion.php";
	//requiert
	$mission_id = $_SESSION['idMission'];
	//$mission_id = 18;
	$cycle = "B- Immobilisations incorporelles et corporelles";
	//$annee = date("Y");
?>

	<meta charset="UTF-8">

	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>

	<style type="text/css">

	#content-wrapper {
		margin:0 auto;
		width: 80%;
		font-size: 12pt;
		text-align: left;
	}
	.tableau {
		height: 280px;
		overflow: auto;
	}

	.row {
		margin-bottom: 30px;
	}

	.panel-footer{
		text-align: right;
	}

	#download {
		/*float: right;*/
	}
	.lstrubrique {
		width: 32%;
	}
	#final {
		width: 62%;
	}
	.annee {
		width: 50%;
	}


	</style>

	<input type="hidden" value="<?php echo $mission_id; ?>" id="idMission">
	<input type="hidden" value="<?php echo $cycle; ?>" id="cycle">

<div id="contenue_prepare">
	<div id="content-wrapper">
	<h1>Génerer le tableau</h1>
<!-- ================== Ajout rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
		<div class="row" id="fonction">
			<h4>Ajouter une rubrique</h4>
			<div class="input-group col-md-4">
			    <input type="text" class="form-control" placeholder="Saisir ici..." id="rubrique">
			    <span class="input-group-btn">
			        <button class="btn btn-primary" type="button" id="ajoutrub">Ajouter</button>
			    </span>
			</div>
		</div>
	<div class="lstrubrique">
		<div class="row panel panel-default" >
				<table class="table panel-heading">
					<thead>
						<th>N°</th>
						<th>Rubrique</th>
					</thead>
				</table>
			<div class="tableau panel-body">
				<table class="table table-hover">
<!-- 					<thead>
						<th>N°</th>
						<th>Rubrique</th>
					</thead> -->
					<tbody>
						<?php 
							$sql = "select rubrique_id, rubrique_libelle 
									from tab_rubrique_notes_annexes 
									where rubrique_mission_id = '".$mission_id."'";
							$req = $bdd->query($sql);
							while($data = $req->fetch())
							{
						 ?>
						<tr>
						 	<td ><?php  echo $data["rubrique_id"];?></td>
						 	<td ><?php echo $data["rubrique_libelle"]; ?></td>
						</tr>
						<?php
							}
						  ?>
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<button id="btn-preview" class="btn btn-default">Retour</button>
				<button id="btn-next" class="btn btn-primary">suivant</button>
			</div>	
		</div>
	</div>
</div>

<!-- ================== Tableau d'attribution de rubrique ======================================= -->
<div id="contenue_attribution_rubrique">
	<div class="row panel panel-default" id="inputm">
		<div class="panel-heading">Attribution Rubrique</div>
		<div class="tableau panel-body">
			<table class="table table-hover table-fixed" id="tableParam">
				<thead>
					<th>N° Compte</th>
					<th>Intitulés</th>
					<th>Solde</th>
					<!-- <th>Cycle</th> -->
					<th>Rubrique</th>
					<th>Type</th>
					<th>Ajouter</th>
				</thead>
				<tbody>
					<?php 
						$sql = "select 	IMPORT_ID,IMPORT_COMPTES, IMPORT_INTITULES, IMPORT_SOLDE, IMPORT_CYCLE
								from tab_importer 
								where mission_id=".$mission_id." and IMPORT_CYCLE like \"".$cycle."\"";
						$req = $bdd->query($sql);
						$i = 0;
						while($data = $req->fetch()){
							 $idimport = $data["IMPORT_ID"];
					 ?>
					<tr id="<?php echo "ligne".$i; ?>">
						<td id="<?php echo "numero_compte".$i; ?>"><?php echo $data["IMPORT_COMPTES"] ?></td>
						<td id="<?php echo "intitule".$i; ?>"><?php echo $data["IMPORT_INTITULES"] ?></td>
						<td id="<?php echo "solde".$i; ?>"><?php echo $data["IMPORT_SOLDE"] ?></td>
						<!-- <td id="<?php echo "amortissement".$i; ?>"><?php echo $data["IMPORT_CYCLE"] ?></td> -->
						<td>
							<select name="rubrique_id" id="<?php echo "rubrique".$i; ?>" class="select_rubrique">
							<option value=""></option>
							<?php 
								$sql1 = "select rubrique_id, rubrique_libelle 
										from tab_rubrique_notes_annexes 
										where	rubrique_mission_id = ".$mission_id;
								$req1 = $bdd->query($sql1);
								while($data1 = $req1->fetch()){
							 ?>
								<option value="<?php echo $data1['rubrique_id'] ?>"><?php echo $data1["rubrique_libelle"]; ?></option>
							<?php 
								}
							 ?>
							</select>
						</td>
						<td><select name="typeBA" id="<?php echo "typeBA".$i; ?>">
							<option value="">&nbsp;</option>
							<option value="B">Brute</option>
							<option value="A">Amortissement</option>
							</select>
						</td>
						<td>
					 <input type="hidden" id="<?php echo "idimport".$i; ?>" value="<?php echo $idimport; ?>">
							<button class="btn btn-primary plus" id="<?php echo "plus".$i; ?>" index="<?php echo $i; ?>" title="Ajouter ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
						</td>
					</tr>
				<?php 
					$i++;
					}
				 ?>	
				</tbody>
			</table>
			<input type="hidden" id="rowCount" value="<?php echo $i; ?>">
			</div>
			<div class="panel-footer">
				<button id="btn-preview2" class="btn btn-default">Retour</button>
				<button id="generer" class="btn btn-primary">Générer le tableau correspondant</button>
			</div>
			</div>
		</div>
	</div>
<!-- ================== Tableau generer par rubrique ======================================= -->
<div id="final">
		<div class="row panel panel-default" id="input">
			<div class="panel-heading">BALANCE</div>
			<div class="tableau panel-body">
				<table class="table table-hover"style="width:60%; float:left;">
					<thead>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>N</th>
					</thead>
					<thead>
						<th>Rubrique</th>
						<th>Valeur brute</th>
						<th>Amortissement</th>
						<th>Valeur nette</th>
					</thead>
					<tbody>
						<?php 
							$sql = "select r.rubrique_id, r.rubrique_libelle, sum(i.IMPORT_DEBIT) as debit, SUM(i.IMPORT_CREDIT) as credit, SUM(i.IMPORT_SOLDE) as solde
							from tab_rubrique_notes_annexes r INNER JOIN tab_importer i ON r.rubrique_id=i.rubrique_id
							where mission_id=".$mission_id." and IMPORT_CYCLE like \"".$cycle."\" and IMPORT_CHOIX_ANNEE = 'N' GROUP BY i.rubrique_id";
							$req = $bdd->query($sql) or die("error:    ".$sql);
							$j = 0;
							while($data = $req->fetch())
							{
								?>
									<tr>
									 	<td id="output-rubrique<?php  echo $j;?>" idRubrique="<?php echo $data['rubrique_id'] ?>"><?php echo $data["rubrique_libelle"]; ?></td>
				 					<td id="output-v_brute<?php  echo $j;?>"><?php echo $data['debit']; ?></td>
									 	<td id="output-amortissement<?php  echo $j;?>"><?php echo $data['credit'] ?></td>
									 	<td id="output-v_netteN<?php  echo $j;?>"><?php echo $data['solde'] ?></td>
									 	</td>
									</tr>
						<?php 
							$j++;
							}
						  ?>
					</tbody>
				</table>
				<table class="table table-hover" style="width:20%; float:right;">
					<thead>
						<th>N-1</th>
					</thead>
					<thead>
						<th>Valeur nette</th>
					</thead>
					<tbody>
						<?php 
							$sql = "select SUM(i.IMPORT_SOLDE) as solde
							from tab_rubrique_notes_annexes r INNER JOIN tab_importer i ON r.rubrique_id=i.rubrique_id
							where mission_id=".$mission_id." and IMPORT_CYCLE like \"".$cycle."\" and IMPORT_CHOIX_ANNEE = 'N-1' GROUP BY i.rubrique_id";
							$req = $bdd->query($sql) or die("error:    ".$sql);
							$j = 0;
							while($data = $req->fetch())
							{
								?>
									<tr>
									 	<td id="output-v_netteN1<?php  echo $j;?>"><?php echo $data['solde'] ?></td>
									</tr>
						<?php 
							$j++;
							}
						  ?>
					</tbody>
				</table>
				<input type="hidden" id="rubriqueCount" value="<?php echo $j; ?>">
			</div>
			<div id="displayerror"></div>
			<div class="panel-footer">
				<button id="annuler" class="btn btn-default">Annuler</button>
				<button id="enregistrer" class="btn btn-primary">Enregistrer</button>
			<a id="download" target="_BLANK">
				<button class="btn btn-default" id="btn-download">Télécharger
				</button>
			</a>
			</div>	
		</div>
	</div>
</div>
 		

<!--<div class="row panel panel-default" id="inputm">
			<div class="panel-heading">Tableau input</div>
			<div class="tableau panel-body">
				<table class="table table-hover table-fixed" id="tableParam">
					<thead>
						<th>N° Compte</th>
						<th>Libelle</th>
						<th>V. brute</th>
						<th>Ammortissement</th>
						<th>V. nette</th>
						<th>Rubrique</th>
						<th>Ajouter</th>
					</thead>
					<tbody>
					<?php 
						$sql = "select numero_compte, libelle, v_brute, amortissement, v_nette
								from tab_rdc_immo_partie2 
								where mission_id=".$mission_id;
						$req = $bdd->query($sql);
						$i = 0;
						while($data = $req->fetch()){
					 ?>
						<tr id="<?php echo "ligne".$i; ?>">
							<td id="<?php echo "numero_compte".$i; ?>"><?php echo $data["numero_compte"] ?></td>
							<td id="<?php echo "libelle".$i; ?>"><?php echo $data["libelle"] ?></td>
							<td id="<?php echo "v_brute".$i; ?>"><?php echo $data["v_brute"] ?></td>
							<td id="<?php echo "amortissement".$i; ?>"><?php echo $data["amortissement"] ?></td>
							<td id="<?php echo "v_nette".$i; ?>"><?php echo $data["v_nette"] ?></td>
							<td>
								<select name="rubrique" id="<?php echo "rubrique".$i; ?>" class="select_rubrique">
								<option value=""></option>
								<?php 
									$sql1 = "select rubrique_id, rubrique_libelle 
											from tab_rubrique_notes_annexes 
											where rubrique_cycle = '".$cycle."'";
									$req1 = $bdd->query($sql1);
									while($data1 = $req1->fetch()){
								 ?>
									<option value="<?php echo $data1['rubrique_id'] ?>"><?php echo utf8_decode($data1["rubrique_libelle"]); ?></option>
								<?php 
									}
								 ?>
								</select>
							</td>
							<td>
								<button class="btn btn-primary plus" id="<?php echo "plus".$i; ?>" index="<?php echo $i; ?>" title="Ajouter ce compte dans cette rubrique">
									<span class="glyphicon glyphicon-plus"></span>
								</button>
							</td>
						</tr>
					<?php 
						$i++;
						}
					 ?>	
					</tbody>
				</table>
				<input type="hidden" id="rowCount" value="<?php echo $i; ?>">
			</div>
			<div class="panel-footer">
				<button id="generer" class="btn btn-primary">Générer le tableau correspondant</button>
			</div>
		</div>
		
		<div class="row panel panel-default" id="input">
			<div class="panel-heading">Tableau output</div>
			<div class="tableau panel-body">
				<table class="table table-hover">
					<thead>
						<th></th>
						<th></th>
						<th>N</th>
						<th></th>
						<th>N-1</th>
					</thead>
					<thead>
						<th>Rubrique</th>
						<th>Valeur brute</th>
						<th>Ammortissement</th>
						<th>Valeur nette</th>
						<th>Valeur nette</th>
					</thead>
					<tbody>
						<?php 
							$sql = "select rubrique_id, rubrique_libelle 
									from tab_rubrique_notes_annexes 
									where rubrique_cycle = '".$cycle."'";
							$req = $bdd->query($sql);
							$j = 0;
							while($data = $req->fetch())
							{
						 ?>
						<tr>
						 	<td id="output-rubrique<?php  echo $j;?>" idRubrique="<?php echo $data['rubrique_id'] ?>"><?php echo utf8_decode($data["rubrique_libelle"]); ?></td>
						 	<td id="output-v_brute<?php  echo $j;?>"></td>
						 	<td id="output-amortissement<?php  echo $j;?>"></td>
						 	<td id="output-v_netteN<?php  echo $j;?>"></td>
						 	<td id="output-v_netteN1<?php  echo $j;?>">
								<input type="text" class="form-control" name="v_netteN1">
						 	</td>
						</tr>
						<?php 
							$j++;
							}
						  ?>
					</tbody>
				</table>
				<input type="hidden" id="rubriqueCount" value="<?php echo $j; ?>">
			</div>
			<div class="panel-footer">
				<button id="enregistrer" class="btn btn-primary">Enregistrer</button>
				<button id="annuler" class="btn btn-default">Annuler</button>
			</div>	
		</div> -->

