<?php 
	session_start();
	require("../../connexion.php");
	//requiert
	$mission_id = 18;
	$cycle = "variationImmo";
?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Générer</title>
	<link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<script type="text/javascript" src="../../css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="../../css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</head>
<body>
	<input type="hidden" value="<?php echo $mission_id; ?>" id="idMission">
	<input type="hidden" value="<?php echo $cycle; ?>" id="cycle">

	<div id="content-wrapper">
	<h1>Génerer le tableau</h1>
		<div class="row" id="fonction">
			<h4>Ajouter une rubrique</h4>
			<a id="download" target="_BLANK">
				<button class="btn btn-default" id="btn-download">Télécharger	
				</button>
			</a>
			<div class="input-group col-md-4">
			    <input type="text" class="form-control" placeholder="Saisir ici..." id="rubrique">
			    <span class="input-group-btn">
			        <button class="btn btn-primary" type="button" id="ajout">Ajouter</button>
			    </span>
			</div>
		</div>
		
		<div class="row panel panel-default" id="input">
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
		
		<div class="row panel panel-default" id="output">
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
							while($data = $req->fetch()){
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
		</div>
	</div>
</body>
</html>
