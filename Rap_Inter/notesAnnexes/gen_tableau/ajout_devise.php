<?php
	// session_start();
	include_once "../../../connexion.php";
?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>


<!-- ================== Ajout rubrique ======================================= -->
<div id="contenue_ajout_rubrique">
		<div id="GrandTitre">AJOUT DEVISE</div><br>
	<div class="lstrubrique">
			<!-- <div class="input-group"> -->
			<table width="50%" >
				<tr height="40"><td><label for="libelle">Monnaie : </label></td><td><input type="text" class="form-control" placeholder="Devise ici..." id="libelle"></td></tr>
				<tr height="40"><td><label for="symbole">Symbole: </label></td><td><input type="text" class="form-control" placeholder="symbole ici..." id="symbole"></td></tr>
				<tr height="40"><td>&nbsp;</td><td align="right">
				<span class="panel">
			        <button class="btn btn-primary" type="button" id="enreg">Ajouter</button>
			    </span></td></tr>
			</table>
			<!-- </div> -->
			<br/>
		<div class=" panel panel-default" style="width:50%" >
			<div id="lstrub" class="tableau panel-body">
				<table class="table table-hover">
					<thead>
						<th>Devise</th>
						<th>Symbole</th>
						<th  width="50em">&nbsp;</th>
					</thead>
					<tbody>
						<?php 
							$sql = "select * FROM `tab_rubrique_devise` ";
							$req = $bdd->query($sql) or die($sql);
							// $i=1;
							while($data = $req->fetch())
							{
						 ?>
						<tr id='<?php echo "remove".$data["id"]; ?>'>
						 	<td ><?php echo $data["monnaie"]; ?></td>
						 	<td ><?php echo $data["symbole"]; ?></td>
						 	<td >
							<button class="btn btn-primary plus" index="<?php echo $data['id']; ?>" title="Supprimer cette devise">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
							</td>
						</tr>
						<?php
						// $i++;
							}
						  ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
		<div class="panel-footer">
			<button id="btn-preview" class="btn btn-default">Retour</button>
		</div>
</div>
<script type="text/javascript">
	<!--

$(function(){

	// retour ajout rubrique
	$("#btn-preview").click(function(){
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/statefiscale.php");
	});

	$("#enreg").click(function(){
	libelle = $("#libelle").val();
	symbole = $("#symbole").val();

	// console.log(libelle);
		if(libelle != "" && symbole !=""){
			$.ajax({
				type: "post",
				url: "Rap_Inter/notesAnnexes/php/ajoutdevise.php",
				data: { libelle: libelle,symbole:symbole,action:1},
				dataType: "json" ,
				success: function(e){
					if(e.error=="ok"){
					$("#lstrub table tbody").append("<tr id='remove"+e.num+"'><td>"+e.libelle+"</td><td>"+e.symbole+"</td><td><button class='btn btn-primary plus' index='"+e.num+"' title='Supprimer cette devise'><span class='glyphicon glyphicon-remove'></span></button></td></tr>");
					$("#libelle").val("");
					$("#symbole").val("");
					$("#libelle").focus();
					$(".plus").click(function(){
						ligne = $(this).attr("index");
						supprimer(ligne);
					});	
					}else{
						alert(e.error);
					}
				},
				error: function(){
					alert("error: inattendue!");
				}
			});
		} else{
			alert("Veuillez renseigner les champs");
			if($("#libelle").val()=="")$("#libelle").focus();
			else $("#symbole").focus();
		}
	});

	$(".plus").click(function(){
		ligne = $(this).attr("index");
		supprimer(ligne);
	});	

});
function supprimer(ligne){
		$.ajax({
			type: "post",
			url: "Rap_Inter/notesAnnexes/php/ajoutdevise.php",
			data: { id:ligne, action: 2},
			dataType: "json" ,			
			success: function(e){
				 if(e.error == "ok")
					$("#remove"+ligne).hide("slow");
				else
					alert(e.error);
			},
			error: function(){
				alert("error: inattendue!");
			}
		});
}
</script>