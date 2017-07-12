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
	$('#Int_Synthese_vc').draggable();
	$('#Question_vc_335').draggable();
	$('#Question_vc_336').draggable();
	$('#Question_vc_337').draggable();
	$('#Question_vc_338').draggable();
	$('#Question_vc_339').draggable();
	$('#Question_vc_340').draggable();
	$('#Question_vc_341').draggable();
	$('#Question_vc_342').draggable();
	$('#Question_vc_343').draggable();
	$('#Question_vc_344').draggable();
	$('#Question_vc_345').draggable();
	$('#Question_vc_346').draggable();
	$('#Question_vc_347').draggable();
	$('#Question_vc_348').draggable();
	$('#Question_vc_349').draggable();
	$('#Question_vc_350').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjvc(){
	document.getElementById("int_vc_Retour").disabled=false;
	document.getElementById("Int_vc_Continuer").disabled=false;
	document.getElementById("Int_vc_Synthese").disabled=false;
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
<label id="image_Bleu_b">C.Existence.</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_vc" align="center"><?php include 'Interface_vc.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>