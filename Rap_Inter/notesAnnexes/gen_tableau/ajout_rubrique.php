<?php 
	session_start();
	include_once "../../../connexion.php";
	//requiert
	$mission_id = $_SESSION['idMission'];
	//$mission_id = 18;
	$rb_cycle = @$_GET['p'];
	$titre = @$_GET['titre'];

	$sql = "SELECT `ENTREPRISE_ID`
			FROM `tab_mission`
			WHERE `MISSION_ID` =".$mission_id ;
	$req = $bdd->query($sql) or die($sql);
	$i=1;
	$data = $req->fetch();
	$identreprise = $data['ENTREPRISE_ID'];

	
?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>


<!-- ================== Ajout rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
		<div id="GrandTitre"><?php echo $titre; ?></div><br>
	<div class="lstrubrique">
	<table class="table">
		<tr><td>
		<h4 style="line-height:24px;">Ajout rubrique</h4>
			<div class="input-group">
			    <input type="text" class="form-control" placeholder="Saisir ici..." id="rubrique">
			    <span class="input-group-btn">
			        <button class="btn btn-primary" type="button" id="ajoutrub">Ajouter</button>&nbsp;#&nbsp;
			    </span>
			</div>
			<br/>
		<div class=" panel panel-default" >
			<div id="lstrub" class="tableau panel-body">
				<table class="table table-hover">
					<thead>
						<th>Rubrique</th>
						<th>&nbsp;</th>
					</thead>
					<tbody>
						<?php 
							$sql = "select rubrique_id, rubrique_libelle
							FROM `tab_rubrique_notes_annexes` 
							WHERE `rubrique_cycle` LIKE '".$rb_cycle."' AND `ENTREPRISE_ID` =".$identreprise;
							$req = $bdd->query($sql) or die($sql);
							$i=1;
							while($data = $req->fetch())
							{
						 ?>
						 <input type="hidden" id="<?php echo $data["rubrique_id"]; ?>" name="<?php echo $data["rubrique_id"]; ?>">
						<tr id='<?php echo "remove".$data["rubrique_id"]; ?>'>
						 	<td ><?php echo $data["rubrique_libelle"]; ?></td>
						 	<td width="50em" >
							<button class="btn btn-danger remove" index="<?php echo $data['rubrique_id']; ?>" title="Supprimer cette rubrique">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
							</td>
						</tr>
						<?php
						$i++;
							}
						  ?>
					</tbody>
				</table>
			</div>
		</div>
		</td>
		<td id="sous_rubrique" style="display:none;">
		<h5>Ajouter un sous rubrique dans &nbsp;<select id="rubrique_id">
							<option value=""></option>

						<?php 
							$sql = "select rubrique_id, rubrique_libelle
							FROM `tab_rubrique_notes_annexes` 
							WHERE `rubrique_cycle` LIKE '".$rb_cycle."' AND `ENTREPRISE_ID` =".$identreprise;
							$req = $bdd->query($sql) or die($sql);
							// $i=1;
							while($data = $req->fetch())
							{
								?>
								<option value="<?php echo $data['rubrique_id']; ?>"><?php echo $data["rubrique_libelle"]; ?></option>

							<?php
						}
						?>
						</select></h5>
			<div class="input-group">
			    <input type="text" class="form-control" placeholder="sous rubrique..." id="sousrubrique">
			    <span class="input-group-btn">
			        <button class="btn btn-primary" type="button" id="ajoutsousrub">Ajouter</button>
			    </span>
			</div>
			<br/>
		<div class=" panel panel-default" >
			<div id="lstsousrub"  class="tableau panel-body">
				<table class="table table-hover">
					<thead>
						<th>Sous rubrique</th>
						<th width="50em">&nbsp;
						</th>
					</thead>
					<tbody>
					<!-- alaina anaty js ny ato anatiny ty e !-->
					</tbody>
				</table>
			</div>
		</div>
		</td>

		</tr>
		</table>
	</div>
		<div class="panel-footer">
			<button class="btn btn-default" id="affsousRubrique">Ajouter un sous rubrique</button>
			<button id="btn-preview" class="btn btn-default">Retour</button>
		</div>
</div>
<input type="hidden" id="cycle" value="<?php echo $rb_cycle; ?>">
<input type="hidden" id="idMission" value="<?php echo $mission_id; ?>">
<input type="hidden" id="entreprise" value="<?php echo $identreprise; ?>">

<input type="hidden" id="indexi" value="<?php echo $i; ?>">
<script type="text/javascript">
	<!--
	function retour(c){

		switch (c){
			case 'immoinco':
			case 'immoco':
			case 'immofi':
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_immo.php?p="+c);
				break;
			case 'charge':
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_creance.php?p="+c);
				break;
			case 'stock':
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_stock.php?p="+c);
				break;
			case 'tresorerie':
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_tresorerie.php?p="+c);
				break;
			case 'passifco':
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_passifco.php?p="+c);
				break;
			case 'provision':
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_provision.php?p="+c);
				break;
			case 'fond':
			case 'chiffreaf':
			case 'achatsco':
			case 'srvext':
			case 'chrgpers':
			case 'impottax':
			case 'autrespdx':
			case 'autreschrgope':
			case 'pdxfi':
			case 'chrgfi':
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p="+c);
				break;

			default:
			alert("Page introuvalble."); $("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_etat_fi.php");
			break;
		}
	}

$(function(){

	var	cycle = $("#cycle").val();
	var	entreprise = $("#entreprise").val();
	var idMission = $("#idMission").val();
	var	indexi = $("#indexi").val();
	// retour ajout rubrique
	$("#btn-preview").click(function(){
		retour(cycle);
	});
	// retour ajout rubrique
	$("#ajoutrub").click(function(){
	libelle = $("#rubrique").val();
	// console.log(libelle);
		if(libelle != ""){
			$.ajax({
				type: "post",
				url: "Rap_Inter/notesAnnexes/php/ajoutRubrique.php",
				data: { libelle: libelle, cycle:cycle, entreprise:entreprise },
				dataType: "json" ,
				success: function(e){
					if(e.error=="ok"){
					$("#lstrub table tbody").append("<tr id='remove"+e.num+"'><td>"+e.libelle+"</td><td><button class='btn btn-danger remove' index='"+e.num+"' title='Supprimer cette rubrique'><span class='glyphicon glyphicon-remove'></span></button></td></tr>");
					$("#rubrique_id").append("<option value='"+e.num+"'>"+e.libelle+"</option>");
					$("#rubrique").val("");
					$(".remove").click(function(){
						ligne = $(this).attr("index");
						supprimer(ligne,1);
					});
					}else{
						alert(e.error);
					}

				},
				error: function(){
					alert("error: inattendue!");
				}
			});
		} else alert("Veuillez renseigner ce champ");
	});

	// ajout sous rubrique
	$("#affsousRubrique").click(function(){
			$("#sous_rubrique").css('display','');
			$("#sous_comment").css('display','none');
			// $("#affsousRubrique").css('display','none');
	});

	// ajout sous rubrique
	$("#btn-comment").click(function(){
			$("#sous_comment").css('display','');
			$("#sous_rubrique").css('display','none');
			// $("#affsousRubrique").css('display','none');
	});

	$("#rubrique_id").change(function(){
		id=$("#rubrique_id option:selected").val();
		$("#lstsousrub table tbody").load("Rap_Inter/notesAnnexes/gen_tableau/ajout_sous_rubrique.php?rubrique="+id);
		// alert("success: "+id);
	});

	$("#ajoutsousrub").click(function(){
	// var idMission = $("#idMission").val();
		libelle = $("#sousrubrique").val();
		var rubrique   =$("#rubrique_id option:selected").val();

		console.log(libelle);
		if(libelle != "" && rubrique !=""){
			$.ajax({
				type: "post",
				url: "Rap_Inter/notesAnnexes/php/ajoutsousRubrique.php",
				data: { libelle: libelle, rubrique:rubrique },
				dataType: "json" ,		
				success: function(e){
					if(e.error=="ok"){
					$("#lstsousrub table tbody").append("<tr id='remove"+e.num+"'><td>"+e.libelle+"</td><td><button class='btn btn-danger remove' index='"+e.num+"' title='Supprimer cette rubrique'><span class='glyphicon glyphicon-remove'></span></button></td></tr>");
					$("#sousrubrique").val("");
					$(".remove").click(function(){
						ligne = $(this).attr("index");
						supprimer(ligne,2);
					});
					$("#sousrubrique").val("");
					}else{
						alert(e.error);
					}

				},
				error: function(){
					alert("error: inattendue!");
				}
			});
		} else alert("Veuillez selectionner le rubrique et renseigner le champ sous rubrique");
	});
	$("#rubrique_id_com").change(function(){
		id=$("#rubrique_id_com option:selected").val();
		$("#textcomment").load("Rap_Inter/notesAnnexes/php/aff_passifco.php?rubrique="+id);
		
		$("#resultat").html("&nbsp;");
		// alert("success: "+id);
	});

	$(".remove").click(function(){
		ligne = $(this).attr("index");
		supprimer(ligne,1);
	});

	// function sous_rub(id_rub){
	// 	alert(id_rub);
	// }

});

function supprimer(ligne,tab){
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/removerubrique.php",
			data: { ide:ligne, rubtyp: tab},				
			success: function(e){
				 if(e == 0)
					$("#remove"+ligne).hide("slow");
				else
					alert("Il y a une erreur!");
			},
			error: function(){
				alert("error");
			}
		});
}
	//-->
</script>
	