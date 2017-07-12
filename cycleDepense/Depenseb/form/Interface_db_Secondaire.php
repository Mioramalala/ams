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
	$('#Int_Synthese_db').draggable();
	$('#Question_db_280').draggable();
	$('#Question_db_281').draggable();
	$('#Question_db_282').draggable();
	$('#Question_db_283').draggable();
	$('#Question_db_284').draggable();
	$('#Question_db_285').draggable();
	$('#Question_db_286').draggable();
	$('#Question_db_287').draggable();
	$('#Question_db_288').draggable();
	$('#Question_db_289').draggable();
	$('#Question_db_290').draggable();
	$('#Question_db_291').draggable();
	$('#Question_db_292').draggable();
	$('#Question_db_293').draggable();
	$('#Question_db_249').draggable();
	$('#Question_db_250').draggable();
	$('#Question_db_251').draggable();
	$('#Question_db_252').draggable();
	$('#Question_db_253').draggable();
	$('#Question_db_294').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjdb(){
	document.getElementById("int_db_Retour").disabled=false;
	document.getElementById("Int_db_Continuer").disabled=false;
	document.getElementById("Int_db_Synthese").disabled=false;
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
<label id="image_Bleu_b">B.Exhaustivité.</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_db" align="center"><?php include 'Interface_db.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>