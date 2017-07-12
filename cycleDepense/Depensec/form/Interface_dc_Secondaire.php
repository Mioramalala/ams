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
	$('#Int_Synthese_dc').draggable();
	$('#Question_dc_295').draggable();
	$('#Question_dc_296').draggable();
	$('#Question_dc_297').draggable();
	$('#Question_dc_298').draggable();
	$('#Question_dc_299').draggable();
	$('#Question_dc_300').draggable();
	$('#Question_dc_301').draggable();
	$('#Question_dc_302').draggable();
	$('#Question_dc_288').draggable();
	$('#Question_dc_289').draggable();
	$('#Question_dc_290').draggable();
	$('#Question_dc_291').draggable();
	$('#Question_dc_292').draggable();
	$('#Question_dc_293').draggable();
	$('#Question_dc_249').draggable();
	$('#Question_dc_250').draggable();
	$('#Question_dc_251').draggable();
	$('#Question_dc_252').draggable();
	$('#Question_dc_253').draggable();
	$('#Question_dc_303').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjdc(){
	document.getElementById("int_dc_Retour").disabled=false;
	document.getElementById("Int_dc_Continuer").disabled=false;
	document.getElementById("Int_dc_Synthese").disabled=false;
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
<label id="image_Bleu_b">C. Realite</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_dc" align="center"><?php include 'Interface_dc.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>