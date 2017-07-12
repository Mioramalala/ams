<?php

$rb_cycle=$_GET['p'];
?>
		<link rel = "stylesheet" href = "RA/css_RA.css"/>
	<body>
		<div  id="id_immoco">
		<br/>
			<table >
				<tr >
					<td class="td_Image" width="100%" id="valeur" style="float:left;padding-top:22px;cursor:pointer;text-align:center;padding-left:3%"><span> Valeur des Immobilisations corporelles</span>
					</td>
				</tr>
				<tr>
					<td  class="td_Image" width="100%" id="variation" style="float:left;padding-top:22px;cursor:pointer;text-align:center;padding-left:3%"><span>Variation des Immobilisations corporelles</span>
					</td>
				</tr>
			</table>
			<input type ="button" class="bouton-flat" name= "btRetour" value= "Retour" id = "btn-preview">
		</div>	
	</body>
<input type="hidden" id="cycle" value="<?php echo $rb_cycle; ?>">

	<script type="text/javascript">
<!--
$(function(){
	var	cycle = $("#cycle").val();
	// retour ajout rubrique
	$("#btn-preview").click(function(){
		// alert("aaaa");
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_cycle.php");
	});
	// Valeur
	$("#valeur").click(function(){
		// alert("aaaa");
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_immo.php?p="+cycle);
	});

	// Variation
	$("#variation").click(function(){
		// alert("aaaa");
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/variation_immoco.php?p="+cycle);
	});
});
//-->
	</script>