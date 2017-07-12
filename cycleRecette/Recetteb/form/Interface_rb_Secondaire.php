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
	$('#Int_Synthese_rb').draggable();
	$('#Question_rb_235').draggable();
	$('#Question_rb_236').draggable();
	$('#Question_rb_237').draggable();
	$('#Question_rb_238').draggable();
	$('#Question_rb_239').draggable();
	$('#Question_rb_240').draggable();
	$('#Question_rb_241').draggable();
	$('#Question_rb_242').draggable();
	$('#Question_rb_243').draggable();
	$('#Question_rb_244').draggable();
	$('#Question_rb_245').draggable();
	$('#Question_rb_246').draggable();
	$('#Question_rb_247').draggable();
	$('#Question_rb_248').draggable();
	$('#Question_rb_249').draggable();
	$('#Question_rb_250').draggable();
	$('#Question_rb_251').draggable();
	$('#Question_rb_252').draggable();
	$('#Question_rb_253').draggable();
	$('#Question_rb_254').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjrb(){
	document.getElementById("int_rb_Retour").disabled=false;
	document.getElementById("Int_rb_Continuer").disabled=false;
	document.getElementById("Int_rb_Synthese").disabled=false;
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
<div id="interface_rb" align="center"><?php include 'Interface_rb.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>