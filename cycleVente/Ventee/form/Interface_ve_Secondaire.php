<html>
<head>
<title>AMS | Cycle achat</title>

<!-- <script type="text/javascript" src="../cycleAchat/plugins/jquery.js"></script>
<script type="text/javascript" src="../cycleAchat/plugins/jquery.easyui.min.js"></script> -->

<!--link href="../cycle_achat_css/class.css" rel="stylesheet" type="text/css" /-->
<!--link href="cycleAchat/cycle_achat_css/div_fermer_quest_objectif_B.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/div.css" rel="stylesheet" type="text/css" /> 

<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_b.js"></script-->
<script>
$(document).ready(function() {
	// Formulaire draggable
	$('#Int_Synthese_ve').draggable();
	$('#Question_ve_386').draggable();
	$('#Question_ve_387').draggable();
	$('#Question_ve_388').draggable();
	$('#Question_ve_389').draggable();
	$('#Question_ve_390').draggable();
	$('#Question_ve_391').draggable();
	$('#Question_ve_324').draggable();
	$('#Question_ve_325').draggable();
	$('#Question_ve_326').draggable();
	$('#Question_ve_327').draggable();
	$('#Question_ve_328').draggable();
	$('#Question_ve_329').draggable();
	$('#Question_ve_330').draggable();
	$('#Question_ve_331').draggable();
	$('#Question_ve_332').draggable();
	$('#Question_ve_333').draggable();
	$('#Question_ve_133').draggable();
	$('#Question_ve_392').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjve(){
	document.getElementById("int_ve_Retour").disabled=false;
	document.getElementById("Int_ve_Continuer").disabled=false;
	document.getElementById("Int_ve_Synthese").disabled=false;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="fond_Sous_Titre" class="menu_Titre"><label class="marge_Titre">Evaluation du contrôle des fournisseurs</label><label class="margin_Code">Code : FC1</label>
</div>
<div id="fond_Question">
<table width="100%">
	<tr>
		<td class="titre" id="image_bleu" align="center"><!--label id="image_Bleu_A"> A. S’assurer que les séparations de fonctions sont suffisantes.</label-->
<label id="image_Bleu_b">E.Bonne Période.</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_ve" align="center"><?php include 'Interface_ve.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>