<?php 
	session_start();
	include_once "../../../connexion.php";
	//requiert
	$mission_id = $_SESSION['idMission'];
	$rb_cycle = $_GET['p'];
	// $mission_id = 5;
	// // $re_cycle = "immoco";

	$identreprise = $_SESSION['ENTREPRISE_ID'];
	$N        = $_SESSION['A'];
	$N1        = $_SESSION['A1'];

	$cycle ="'emprunt','charge','vente','dcdivers','impot','paie'";
	$titre = "Passifs courants";
?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>

<!-- ================== Tableau d'attribution de rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
		<div id="GrandTitre"><?php echo $titre; ?></div><br>
		<h4>Assignations sous rubriques</h4><br>
	<div class="lstattrubrique" style="">
		<div class=" row panel panel-default" >
			<div class="tableau ">
				<table class="table table-hover">
					<thead>
					<th>N° Compte</th>
					<th width="130em">Intitulés</th>
					<th  style="text-align: right">Solde <?php echo $N ?></th>
					<th  style="text-align: right">Solde <?php echo $N1 ?></th>
					<!-- <th>Cycle</th> -->
					<th align="right">Rubrique</th>
					<th align="right">Sous rubrique</th>
					<!-- <th align="right">Type</th> -->
					<th>Ajouter</th>
					</thead>
					<tbody>
					<?php 
						$sql = "select RA_ID, RA_COMPTE, RA_LIBELLE,RA_SOLDE_N, RA_SOLDE_N1, MISSION_ID, RA_CYCLE,  rubrique_id, sous_rubrique, Type
								from tab_ra
								WHERE MISSION_ID = ".$mission_id ." AND RA_CYCLE IN (".$cycle.") AND rubrique_cycle NOT like 'charge' ORDER BY RA_COMPTE ASC";
						$req = $bdd->query($sql) or die($sql);
						$i = 0;
						$oui=0;
						while($ra = $req->fetch()){
							 $idra = $ra["RA_ID"];
					 ?>
					<tr id="<?php echo "ligne".$idra; ?>">
						<td id="numero_compte<?php echo $idra; ?>"><?php echo $ra["RA_COMPTE"] ?></td>
						<td id="intitule<?php echo $idra; ?>" width="150em"><?php echo $ra["RA_LIBELLE"] ?></td>
						<td id="vn<?php echo $idra; ?>" align="right"><?php echo number_format($ra["RA_SOLDE_N"], 2, ',', ' '); ?></td>
						<td id="vn1<?php echo $idra; ?>" align="right"><?php echo number_format($ra["RA_SOLDE_N1"], 2, ',', ' '); ?></td>
						<td>
							<select name="rubrique_id" id="<?php echo "rubrique".$idra; ?>" class="select_rubrique" index="<?php echo $idra; ?>" title="Laisser vide pour retirer d'une rubrique/Modifier">
							<option value="">&nbsp;</option>
							<?php 
								$sql = "SELECT `rubrique_id`, `rubrique_libelle`, `rubrique_cycle` FROM `tab_rubrique_notes_annexes` WHERE `rubrique_cycle` like 'passifco' ORDER BY `rubrique_cycle` ASC ";
								$req1 = $bdd->query($sql) or die($sql);
								while($no = $req1->fetch()){
							 ?>
								<option value="<?php echo $no['rubrique_id'] ?>" <?php if($no['rubrique_id']==$ra['rubrique_id']){$oui=1;echo "selected";} ?>><?php echo $no["rubrique_libelle"]; ?></option>
							<?php 
								}
							 ?>
							</select>
						</td>
						<td>
							<select name="sous_rubrique<?php echo $idra; ?>" id="sous_rubrique<?php echo $idra; ?>" class="select_sous_rubrique" title="Sous rubrique">
							<option value="">&nbsp;</option>
							<?php
							$sql = "SELECT `sous_id`, `rubrique_libelle`, `rubrique_id` FROM `tab_rubrique_sous` WHERE `rubrique_id`=".$ra['rubrique_id']." ORDER BY `rubrique_libelle` ASC ";
								$req1 = $bdd->query($sql) or die($sql);
								while($no = $req1->fetch()){
							 ?>
								<option value="<?php echo $no['sous_id'] ?>" <?php if($no['sous_id']==$ra['sous_rubrique']){$oui=1;echo "selected";} ?>><?php echo $no["rubrique_libelle"]; ?></option>
							<?php 
								}
							 ?>
							</select></td>
						<td> 
						<?php if($oui==0): ?>
							<button class="btn btn-primary plus" id="plus<?php echo $idra; ?>" index="<?php echo $idra; ?>" title="Ajouter ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
							<button class="btn btn-danger remove cacher" id="remove<?php echo $idra; ?>" index="<?php echo $idra; ?>" title="Supprimer ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						<?php else: ?>
							<button class="btn btn-primary plus cacher" id="plus<?php echo $idra; ?>" index="<?php echo $idra; ?>" title="Ajouter ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
							<button class="btn btn-danger remove" id="remove<?php echo $idra; ?>" index="<?php echo $idra; ?>" title="Supprimer ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-remove"></span>
							</button>							
						<?php endif; ?>
						</td>
					</tr>
					 <input type="hidden" id="idra<?php echo $idra; ?>" value="<?php echo $idra; ?>">
				<?php 
						$oui=0;
					$i++;
					}
				 ?>	
					</tbody>
				</table>
			</div>
			<input type="hidden" id="rowCount" value="<?php echo $i; ?>">
		<div class="panel-footer">
			<button id="btn-preview" class="btn btn-default">Retour</button>
			<button id="addrub" class="btn btn-primary"  height="40px">Ajout rubrique</button>
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
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_bilan.php");
	});

	//suos rubrique
	$(".select_rubrique").change(function(){
		var index    = $(this).attr("index");
		var rubrique = $("#rubrique" + index + " option:selected").val();
// alert(rubrique);
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/select_sous_rubrique.php",
			data: { idM: index, rubrique: rubrique },
			success: function(reponse){
				// alert(lien);
				if(reponse!="error")
				{
					$("#sous_rubrique"+index).html("<option value=''>&nbsp;</option>");
					$("#sous_rubrique"+index).append(reponse);
				}else
				{
					// alert("Il y a une erreur lors de la récupération.");
					alert(reponse);
				}
			},
			error: function(){ alert('error'); }
		});

	});

// 	//ajoute la ligne input on click plus
	$(".plus").click(function(){
		var index    =$(this).attr("index");
		var rubrique =$("#rubrique" + index + " option:selected").val();
		var sous_rubrique = $("#sous_rubrique" + index + " option:selected").val();
		var	cycle    =$("#cycle").val();
		var typeba   ="";
		alert("rub: "+rubrique +" idra: "+index+" type: "+typeba+" sous_rubrique: "+sous_rubrique);
		if(rubrique!="" && sous_rubrique!=""){
		// //envoi ajax
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/maj_ra.php",
			data: { idM: index, rubrique: rubrique, typeba: typeba,rub:cycle,surub:sous_rubrique },
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
	}else 
		alert("Choissiser une rubrique et une sous rubrique.");
	});

// 	//ajoute la ligne input on click plus
	$(".remove").click(function(){
		var index    =$(this).attr("index");
		var rubrique ="";
		var sous_rubrique = "";
		var	cycle    ="";
		var typeba   ="";
		// //envoi ajax
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/maj_ra.php",
			data: { idM: index, rubrique: rubrique, typeba: typeba,rub:cycle,surub:sous_rubrique },
			success: function(lien){
				// alert(lien);
				if(lien=="ok")
				{
					// alert("Bien enregistré.");
					// $("#ligne" + index).hide();
					$("#rubrique" + index).get(0).selectedIndex = 0;
					$("#sous_rubrique"+index).html("<option value=''>&nbsp;</option>");
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
	$("#addrub").click(function(){
		var t = $("#GrandTitre").text();
		var chemin = 'Rap_Inter/notesAnnexes/gen_tableau/ajout_rubrique.php?p='+cycle+'&titre='+t;
		$.get(chemin,
	 			function(res){
	 				$("#contenue_RA").html(res);
	 		});
	});

// 	//suivant attribution rubrique
	$("#generer").click(function(){
		if(rowCount > 0){
			$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/recap_N_N1passifco.php?p="+cycle);
		} else {
			alert("Aucun tableau à générer");
		}
	});
});

	//->
</script>