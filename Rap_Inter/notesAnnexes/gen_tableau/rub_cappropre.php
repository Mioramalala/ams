<?php 
	session_start();
	include_once "../../../connexion.php";
	//requiert
	$mission_id = $_SESSION['idMission'];
	$rb_cycle = $_GET['p'];

	$identreprise = $_SESSION['ENTREPRISE_ID'];
	$N        = $_SESSION['A'];
	$N1        = $_SESSION['A1'];

	$cycle = $rb_cycle;
	switch ($cycle) {
		case 'chiffreaf':
			$cycle = 'vente';
			$titre = "CHIFFRES D'AFFAIRES";
			break;
		case 'fond':
			$cycle = 'fond';
			$titre = "CAPITAUX PROPRES";
			break;
		case 'achatsco':
			$cycle = 'charge';
			$titre = "ACHAT CONSOMMES";
			break;
		case 'srvext':
			$cycle = 'charge';
			$titre = "SERVICES EXTERIEURS ET AUTRES CONSOMMATIONS";
			break;
		case 'chrgpers':
			$cycle = 'paie';
			$titre = "CHARGES DE PERSONNEL";
			break;
		case 'autrespdx':
			$cycle = 'vente';
			$titre = "AUTRES PRODUITS OPERATIONNELS";
			break;
		case 'autreschrgope':
			$cycle = 'charge';
			$titre = "AUTRES CHARGES OPERATIONNELLES";
			break;
		case 'pdxfi':
			$cycle = 'vente';
			$titre = "PRODUITS FINANCIERS";
			break;
		case 'chrgfi':
			$cycle = 'charge';
			$titre = "CHARGES FINANCIERES";
			break;
		case 'impottax':
			$cycle = 'impot';
			$titre = "IMPOTS ET TAXES";
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
		<h4>Assignations rubriques</h4><br>
	<div class="lstattrubrique" style="">
		<div class=" row panel panel-default" >
			<div class="tableau ">
				<table class="table table-hover">
					<thead>
					<th>N° Compte</th>
					<th >Intitulés</th>
					<th  style="text-align: right">Solde <?php echo $N ?></th>
					<th  style="text-align: right">Solde <?php echo $N1 ?></th>
					<th align="right">Rubrique</th>
					<th>Ajouter</th>
					</thead>
					<tbody>
					<?php 
						$sql = "select RA_ID, RA_COMPTE, RA_LIBELLE,RA_SOLDE_N, RA_SOLDE_N1, MISSION_ID, RA_CYCLE,  rubrique_id,sous_rubrique, Type
								from tab_ra
								WHERE MISSION_ID = ".$mission_id ." AND RA_CYCLE like '".$cycle."' ORDER BY RA_COMPTE ASC";
						$req = $bdd->query($sql) or die($sql);
						$i = 0;
						$oui=0;
						while($ra = $req->fetch()){
							 $idra = $ra["RA_ID"];
					 ?>
					<tr id="<?php echo "ligne".$idra; ?>">
						<td id="<?php echo "numero_compte".$idra; ?>"><?php echo $ra["RA_COMPTE"] ?></td>
						<td id="<?php echo "intitule".$idra; ?>" width="150em"><?php echo $ra["RA_LIBELLE"] ?></td>
						<td id="<?php echo "solden".$idra; ?>" align="right"><?php echo number_format($ra["RA_SOLDE_N"], 2, ',', ' '); ?></td>
						<td id="<?php echo "solden1".$idra; ?>" align="right"><?php echo number_format($ra["RA_SOLDE_N1"], 2, ',', ' '); ?></td>
						<td>
							<select name="rubrique_id" id="<?php echo "rubrique".$idra; ?>" class="select_rubrique" title="Laisser vide pour retirer d'une rubrique/Modifier">
							<option value="">&nbsp;</option>
							<?php 
								$sql1 = "select rubrique_id, rubrique_libelle
								FROM `tab_rubrique_notes_annexes` 
								WHERE `rubrique_cycle` LIKE '".$rb_cycle."' AND `ENTREPRISE_ID` =".$identreprise;
								$req1 = $bdd->query($sql1);
								while($no = $req1->fetch()){
							 ?>
								<option value="<?php echo $no['rubrique_id'] ?>" <?php if($no['rubrique_id']==$ra['rubrique_id']){$oui=1;echo "selected";} ?>><?php echo $no["rubrique_libelle"]; ?></option>
							<?php 
								}
							 ?>
							</select>
						</td>
						<td>
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
		if(cycle == 'chiffreaf' || cycle == 'autrespdx'|| cycle == 'pdxfi')
			$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_produit.php");
		else if(cycle == 'achatsco'  || cycle == 'srvext' || cycle == 'chrgpers' || cycle == 'impottax' || cycle == 'autreschrgpers' || cycle == 'chrgfi')
			$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_charge.php");
		else
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_bilan.php");
	});

// 	//ajoute la ligne input on click plus
	$(".plus").click(function(){
		var index    =$(this).attr("index");
		var idra     =$("#idra"+ index).val();
		var rubrique =$("#rubrique" + index + " option:selected").val();
		var	cycle    = $("#cycle").val();
		var typeba   ="";
		// alert(typeba);
		// alert("rub: "+rubrique +" idra: "+idra+" type: "+typeba);
		// //envoi ajax
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/maj_ra.php",
			data: { idM: idra, rubrique: rubrique, typeba: typeba, rub:cycle },
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
			$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/recap_N_N1cappropre.php?p="+cycle);
		} else {
			alert("Aucun tableau à générer");
		}
	});
});

	//->
</script>