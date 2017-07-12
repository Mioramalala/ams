<?php 
	session_start();
	include_once "../../../connexion.php";
	//requiert
	$mission_id = $_SESSION['idMission'];
	$rb_cycle = $_GET['p'];
	// $mission_id = 5;
	// // $re_cycle = "immoco";

	$identreprise = $_SESSION['ENTREPRISE_ID'];

	//$cycle = $rb_cycle;
	$cycle = "immo";
	$titre = "Immobilisations en cours";

?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>

<!-- ================== Tableau d'attribution de rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
		<div id="GrandTitre"><?php echo $titre; ?></div><br>
		<h4>&nbsp;</h4><br>
	<div class="lstattrubrique" style="">
		<div class=" row panel panel-default" >
			<div class="tableau ">
				<table class="table table-hover">
					<thead>
					<th>N° Compte</th>
					<th width="130em">Intitulés</th>
					<th  style="text-align: right">Solde N</th>
					<th  style="text-align: right">Solde N-1</th>
					<th>Ajouter</th>
					</thead>
					<tbody>
					<?php 
						$sql = "select RA_ID, RA_COMPTE, RA_LIBELLE,RA_SOLDE_N, RA_SOLDE_N1, MISSION_ID, RA_CYCLE,  rubrique_id, Type,rubrique_cycle
								from tab_ra
								WHERE MISSION_ID = ".$mission_id ." AND RA_CYCLE like '".$cycle."' ORDER BY RA_COMPTE ASC";
						$req = $bdd->query($sql) or die($sql);
						$i = 0;
						while($ra = $req->fetch()){
							 $idra = $ra["RA_ID"];
					 ?>
					<tr id="<?php echo "ligne".$idra; ?>">
						<td id="<?php echo "numero_compte".$idra; ?>"><?php echo $ra["RA_COMPTE"] ?></td>
						<td id="<?php echo "intitule".$idra; ?>" width="150em"><?php echo $ra["RA_LIBELLE"] ?></td>
						<td id="<?php echo "solden".$idra; ?>" align="right"><?php echo number_format($ra["RA_SOLDE_N"], 2, ',', ' '); ?></td>
						<td id="<?php echo "solden1".$idra; ?>" align="right"><?php echo number_format($ra["RA_SOLDE_N1"], 2, ',', ' '); ?></td>
						<td id="<?php echo "td".$idra; ?>">
					 <?php if($ra['rubrique_cycle'] == 'immocours'){ ?>
							<button class="btn btn-danger remove" id="<?php echo "remove".$idra; ?>" index="<?php echo $idra; ?>" title="Supprimer ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
							<button class="btn btn-primary plus cacher" id="<?php echo "plus".$idra; ?>" index="<?php echo $idra; ?>" title="Ajouter ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
							<?php }else{ ?>
							<button class="btn btn-primary plus" id="<?php echo "plus".$idra; ?>" index="<?php echo $idra; ?>" title="Ajouter ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
							<button class="btn btn-danger remove cacher" id="<?php echo "remove".$idra; ?>" index="<?php echo $idra; ?>" title="Supprimer ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
							<?php } ?>
						</td>
					</tr>
					 <input type="hidden" id="<?php echo "idra".$idra; ?>" value="<?php echo $idra; ?>">
				<?php 
					$i++;
					}
				 ?>	
					</tbody>
				</table>
			</div>
			<input type="hidden" id="rowCount" value="<?php echo $i; ?>">
		<div class="panel-footer">
			<button id="btn-preview" class="btn btn-default">Retour</button>
			<button id="generer" class="btn btn-primary">Générer le tableau correspondant</button>
		</div>
		</div>
	</div>
</div>

</div>
<input type="hidden" id="cycle" value="<?php echo $rb_cycle; ?>">
<input type="hidden" id="idMission" value="<?php echo $mission_id; ?>">

<script type="text/javascript">
	<!--
$(function(){

	var	cycle = $("#cycle").val();
	var idMission = $("#idMission").val();
	var	rowCount = $("#rowCount").val(); 
// 	//suivant attribution rubrique
	$("#btn-preview").click(function(){
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_cycle.php");
	});

// 	//ajoute la ligne input on click plus
	$(".plus").click(function(){
		var index    =$(this).attr("index");
		// var idra     =$("#idra"+ index).val();
		var rubrique ="";
		var	cycle    = $("#cycle").val();
		var typeba   ="";
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/maj_ra.php",
			data: { idM: index, rubrique: rubrique, typeba: typeba,rub:cycle },
			success: function(lien){
				// alert(lien);
				if(lien=="ok")
				{
					// alert("Bien enregistré.");
					// $("#ligne" + index).hide();
					$("#plus"+index).hide("slow");
					$("#remove"+index).show("slow");

				}else
				{
					alert("Il y a une erreur lors de l'enregistrement.");
				}
			},
			error: function(){ alert('error'); }
		});
	});
// 	//ajoute la ligne input on click plus
	$(".remove").click(function(){
		var index    =$(this).attr("index");
		// var idra     =$("#idra"+ index).val();
		var rubrique ="";
		var	cycle    ="";
		var typeba   ="";
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/maj_ra.php",
			data: { idM: index, rubrique: rubrique, typeba: typeba,rub:cycle },
			success: function(lien){
				// alert(lien);
				if(lien=="ok")
				{
					// alert("Bien enregistré.");
					// $("#ligne" + index).hide();
					$("#remove"+index).hide("slow");
					$("#plus"+index).show("slow");


				}else
				{
					alert("Il y a une erreur lors de l'enregistrement.");
				}
			},
			error: function(){ alert('error'); }
		});
	});

// 	//suivant attribution rubrique
	$("#generer").click(function(){
		if(rowCount > 0){
			$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/recap_N_N1cours.php?p="+cycle);
		} else {
			alert("Aucun tableau à générer");
		}
	});
});

	//->
</script>