<?php 
	session_start();
	include_once "../../../connexion.php";
	//requier
	//$mission_id = $_SESSION['idMission'];
	$idrub = $_GET['p'];
	$rb_cycle = $_GET['cycle'];
	$identreprise = $_SESSION['ENTREPRISE_ID'];
	// $mission_id = 5;
	// // $re_cycle = "immoco";

			$sql = "select rubrique_id, rubrique_libelle
			FROM `tab_rubrique_notes_annexes` 
			WHERE `rubrique_cycle` LIKE '".$rb_cycle."' AND `ENTREPRISE_ID` =".$identreprise;
			$req = $bdd->query($sql) or die($sql);

?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css"> 
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
 	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
 <!-- 	// <script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script> -->

<!-- ================== Ajout rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
	<div class="lstrubrique">
	<div id="GrandTitre">Commeter </div><br>
<table>
	<tr>
		<td id="sous_comment">
			<h5>Ajouter un commentaire dans &nbsp;
			<select id="rubrique_id_com">
			<option></option>

			<?php 
			
			while($data = $req->fetch())
			{
				?>
				<option value="<?php echo $data['rubrique_id']; ?>" <?php if($data['rubrique_id']==$idrub)echo "selected"; ?> ><?php echo stripslashes($data["rubrique_libelle"]); ?></option>

				<?php
			}
			$commentaire = "";
			$sql = "SELECT * FROM tab_rubrique_com
				where rubrique_id=".$idrub;
				$req = $bdd->query($sql) or die("error:    ".$sql);
				$com = $req->fetch();
				$commentaire = $com['commentaire'];
			?>
			</select></h5>
			<div id="resultat">&nbsp;</div>
			<br/>
			<div class=" panel panel-default" >

				<div id="lstcomment"  class="tableau panel-body">
					<h5>Commentaire</h5>
					<textarea class="form-control" id="textcomment"><?php echo stripslashes($commentaire); ?></textarea>

					<div class="panel-footer">
					<button class="btn btn-default" type="button" id="enregistrer">Enregistrer</button>
					</div>
				</div>
			</div>
		</td>
	</tr>
</table>
		<div class="panel-footer">
			<button id="btn-preview" class="btn btn-default">Retour</button>
		</div>
	</div> 
</div>
<input type="hidden" id="cycle" value="<?php echo $rb_cycle; ?>">
<script type="text/javascript">

		var cycle = $("#cycle").val();

	$("#btn-preview").click(function(){
		if(cycle == 'passifco')
			$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/recap_N_N1passifco.php?p="+cycle);
		else
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/recap_N_N1cappropre.php?p="+cycle);
	});
$("#enregistrer").click(function(){
		//code pour l'enegistrement mbl ataonao eto
		//---------------------------------------//
		//code pour l'enegistrement mbl ataonao eto
		// alert('Enregistrement réussi');

			// alert(rubrique);
		var	libelle   = $("#textcomment").val();
		var	rubrique  = $("#rubrique_id_com option:selected").val();

			console.log(libelle);
			if(rubrique !=""){
				$.ajax({
					type: "post",
					url: "Rap_Inter/notesAnnexes/php/ajoutcomment.php",
					data: { libelle: libelle, rubrique:rubrique },				
					success: function(e){
						// alert(e);
						$("#resultat").html(e);
					},
					error: function(){
						alert("aaaayyyy!");
					}
				});
			} else alert("Veuillez selectionner le rubrique et renseigner le commentaire");

			//$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p="+cycle);

		});
	</script>