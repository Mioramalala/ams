<?php 
	include'../connexion.php';
	$idEntreprise=$_POST['a'];
	
	// Droit d'utilisateur (autorisé seulement aux administrateurs) by Niaina
	@session_start();
	$userName=$_SESSION["nom"];
	if (($userName != "Administrateur") && ($userName != "Super-Admin")) {
?>

<script>
	alert("Vous n'avez pas le droit d'ouvrir la création d'une mission");
	window.location.href="../accueil.php";
</script>

<?php
	}
	// Fin Droit d'utilisateur
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	
	<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/new-mission.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap-select.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/datepicker.css">
	
	<script type="text/javascript" src="../css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="../css/bootstrap/js/jquery-ui.js"></script>
	<script type="text/javascript" src="../css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../css/bootstrap/js/bootstrap-select.js"></script>
	<script type="text/javascript" src="../css/bootstrap/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../css/bootstrap/js/locales/bootstrap-datepicker.fr.js" charset="UTF-8"></script>
	<script type="text/javascript">
		$(function(){
			$('.selectpicker').selectpicker();
			$('.datepicker').datepicker({
    			format: "dd/mm/yyyy",
    			language:"fr"
			});
			$('#results').hide();
		});
	</script>
</head>
<body>
	<div class="col-md-4"></div>
	<div id="new-mission-wrapper" class="col-md-8">
		<div class="row">
			<h2>Création d'une mission</h2>
		</div>
		<!-- Details de la mission -->
		<div id="detail-mission" class="row">
			<form id="form-data" method="post">
				<h3>Détails de la mission</h3>
				<div class="trait"></div>
				<div class="midina">
					<label class="col-xs-3 control-label">Type de mission</label>
					<select class="selectpicker" name="type-mission">
						<option value="Final">Final</option>
						<option value="Intérimaire">Intérimaire</option>
					</select>
				</div>
				<div class="midina">
					<label class="col-xs-3 control-label">Exercice audité</label>
					<select class="selectpicker" name="exercice-audite">
						<option value="2010">2010</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2015">2016</option>
						<option value="2015">2017</option>
					</select>
				</div>
				<div id="date-range" class="midina">
					<input id="dateDebut" type="text" class="form-control datepicker" placeholder="Début de l'exercice" name="dateDebut" required="required">
					<input id="dateFin" type="text" class="form-control datepicker" placeholder="Fin de l'exercice" name="dateFin" required="required">
				</div>
				
				<div class="midina">
					<label class="col-xs-3 control-label">Deadline</label>
					<input type="text" class="form-control datepicker" name="deadline" required="required">
				</div>
				<div class="midina">
					<label class="col-xs-3 control-label">Selection des superviseurs</label>
					<select id="supeviseur" class="selectpicker" name="superviseur" required="required">
						<!-- SCRIPT RECUPERANT LA LISTE DES UTILISATEURS -->
						<?php
							$sql = "SELECT UTIL_NOM,UTIL_ID FROM tab_utilisateur WHERE UTIL_STATUT=0";
							$req = $bdd->query($sql); 
							while($res = $req->fetch()){
							$nomUtilisateur = $res["UTIL_NOM"];
							$idUtilisateur = $res["UTIL_ID"];
						?>
						<option value="<?php echo $idUtilisateur; ?>"> <?php echo $nomUtilisateur;?></option>
						<?php
	                     	}
	                    ?>
					</select>
				</div>
				<div class="midina">
					<label class="col-xs-3 control-label">Désignation des intervenants</label>
					<select class="selectpicker" multiple name="intervenant[]" required="required">
						<!-- SCRIPT RECUPERANT LA LISTE DES UTILISATEURS -->
						<?php
							$sql = "SELECT UTIL_NOM,UTIL_ID FROM tab_utilisateur WHERE UTIL_STATUT=0";
							$req = $bdd->query($sql); 
							while($res = $req->fetch()){
							$nomUtilisateur = $res["UTIL_NOM"];
							$idUtilisateur = $res["UTIL_ID"];
						?>
						<option value="<?php echo $idUtilisateur; ?>"> <?php echo $nomUtilisateur;?></option>
						<?php
	                     	}
	                    ?>
					</select>
				</div>
				<!-- RECUPERATION DE L'ID DE L'ENTREPRISE -->
				<input type="hidden" name="idEntreprise" id="idEntreprise" value="<?php echo $idEntreprise; ?>">
				<div id="btn-wrapper" class="form-group midina">    
					<button type ="submit" id="valider" class="btn btn-primary">Continuer vers la réparition des tâches</button>
			    </div>
			</form>
			<button id="annuler" class="btn btn-default">Annuler</button>
			<div id="results"></div>	
		</div>
	</div>

	<script type="text/javascript">
		$(function(){
			/*script creation mission*/
				$("form").on("submit",function(e){
					e.preventDefault();
					if(!confirm('Enregistrer les détails de la mission et passer à la répartition des tâches?')){
						console.log("annulé");
					} else {
						console.log("confirmé");
						$.ajax({
							type:'POST',
							url:'entreprise/action_creation_mission.php',
							data:$("#results").text(),
							success:function(idMission){
								console.log("idMission = ".idMission);
								//renvoi le contenu de la repartition de tache;
									$.ajax({
										type: "post",
										url: "entreprise/repartition_tache.php",
										data: {idMission: idMission},
										success: function(e) {
											$("#Acc").html(e).show();
										}
									});
							}
						});
					}
				});

				function showValues() {
		    		var str = $( "form" ).serialize();
		    		$( "#results" ).text( str );
		  		}

		  		$("form select").on("change",showValues);
		  		$("form input").on("change",showValues);

		  		$("#annuler").click(function(){
		  			$("form")[0].reset();
		  			location.reload();
		  		});
		  	/*fin script creation mission*/
		});
	</script>
</body>
</html>











