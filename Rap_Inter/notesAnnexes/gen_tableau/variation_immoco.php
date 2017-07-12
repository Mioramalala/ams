<?php 
	session_start();
	include_once "../../../connexion.php";
	//requiert
	$mission_id = $_SESSION['idMission'];
	$rb_cycle = $_GET['p'];
	// $mission_id = 5;
	// // $re_cycle = "immoco";

	$identreprise = $_SESSION['ENTREPRISE_ID'];

	$cycle = $rb_cycle;
	$titre = "Variations des immobilisations corporelles";
?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>

<!-- ================== Tableau d'attribution de rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
		<div id="GrandTitre"><?php echo $titre; ?></div><br>
		<h4>Assignation rubrique</h4><br>
	<div class="lstattrubrique">
		<div class=" row panel panel-default" >
			<div class="tableau ">
				<table class="table table-hover" width="100%">
					<thead>
					<th width="30em">N° Compte</th>
					<th  >Intitulés</th>
					<th width="30em" >Journal</th>
					<th width="30em" style="text-align: right">Débit</th>
					<th width="30em" style="text-align: right">Credit</th>
					<th width="30em" style="text-align: center">Type</th>
					<th width="30em" style="text-align: center">Ajouter</th>
					</thead>
					<tbody>
					<?php 
					$sql = "SELECT GL_GENC2_ID as id, g2.GL_GENC2_COMPTES as compte, g2.GL_GENC2_LIBELLE as lib,g2.GL_GENC2_JL as jl, g2.GL_GENC2_DEBIT as debit, g2.GL_GENC2_CREDIT as credit, g2.type, ra.rubrique_id as rub
							FROM tab_gl_genc2 g2
							INNER JOIN tab_ra ra ON ra.RA_COMPTE = g2.GL_GENC2_COMPTES
							WHERE ra.Type = 'B'
							AND ra.rubrique_cycle = 'immoco'
							AND g2.MISSION_ID=".$mission_id." ORDER BY compte";
						$req = $bdd->query($sql) or die($sql);
						$i = 0;
						$oui=0;
						while($g2 = $req->fetch()){
						 	 $idra = $g2["id"];
						 	 $rub  = $g2["rub"];
					 ?>
					<tr id="<?php echo "ligne".$idra; ?>">
						<td id="<?php echo "numero_compte".$idra; ?>"><?php echo $g2["compte"] ?></td>
						<td id="<?php echo "intitule".$idra; ?>" width="150em"><?php echo $g2["lib"] ?></td>
						<td id="<?php echo "journal".$idra; ?>" ><?php echo $g2["jl"] ?></td>
						<td id="<?php echo "debit".$idra; ?>" align="right"><?php echo $g2["debit"] ?></td>
						<td id="<?php echo "debit".$idra; ?>" align="right"><?php echo $g2["credit"] ?></td>
						<td align="center"><select name="typeBA" id="<?php echo "typeBA".$idra; ?>">
							<option value="">&nbsp;</option>
							<option value="AC" <?php if($g2['type']=="AC"){$oui=1;echo "selected";} ?>>Acquisition</option>
							<option value="CE" <?php if($g2['type']=="CE"){$oui=1;echo "selected";} ?>>Cession</option>
							</select>
						</td>
						<td align="center">
						<?php if($oui==0): ?>
							<button class="btn btn-primary plus" id="<?php echo "plus".$idra; ?>" index="<?php echo $idra; ?>" title="Ajouter ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
							<button class="btn btn-danger remove cacher" id="<?php echo "remove".$idra; ?>" index="<?php echo $idra; ?>" title="Supprimer ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						<?php else: ?>
							<button class="btn btn-primary plus cacher" id="<?php echo "plus".$idra; ?>" index="<?php echo $idra; ?>" title="Ajouter ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-plus"></span>
							</button>
							<button class="btn btn-danger remove " id="<?php echo "remove".$idra; ?>" index="<?php echo $idra; ?>" title="Supprimer ce compte dans cette rubrique">
								<span class="glyphicon glyphicon-remove"></span>
							</button>							
						<?php endif; ?>
						</td>
					</tr>
					 <input type="hidden" id="<?php echo "rub".$idra; ?>" value="<?php echo $rub; ?>">
					 <input type="hidden" id="<?php echo "idra".$idra; ?>" value="<?php echo $idra; ?>">
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
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/immoco.php?p="+cycle);
	});

// 	//ajoute la ligne input on click plus
	$(".plus").click(function(){
		var index    =$(this).attr("index");
		var rubrique =$("#rub" + index).val();
		var typeba   =$("#typeBA"+ index + " option:selected").val();
		if(typeba !=""){
		// //envoi ajax
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/maj_g2.php",
			data: { idM: index, rubrique: rubrique,typeba: typeba },
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
					alert(lien);
				}
			},
			error: function(){ alert('error'); }
		});
	}else 
		alert("Choissiser un type.");
	});

// 	//ajoute la ligne input on click plus
	$(".remove").click(function(){
		var index    =$(this).attr("index");
		var rubrique ="";
		var typeba   ="";
		// //envoi ajax
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/maj_g2.php",
			data: { idM: index, rubrique: rubrique,typeba: typeba },
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
					alert(lien);
				}
			},
			error: function(){ alert('error'); }
		});
	});


// 	//suivant attribution rubrique
	$("#generer").click(function(){
		if(rowCount > 0){
			$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/recap_variationco.php");
		} else {
			alert("Aucun tableau à générer");
		}
	});
});

	//->
</script>