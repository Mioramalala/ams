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
	$('#Int_Synthese_re').draggable();
	$('#Question_re_273').draggable();
	$('#Question_re_274').draggable();
	$('#Question_re_275').draggable();
	$('#Question_re_276').draggable();
	$('#Question_re_277').draggable();
	$('#Question_re_278').draggable();
	$('#Question_re_261').draggable();
	$('#Question_re_262').draggable();
	$('#Question_re_189').draggable();
	$('#Question_re_190').draggable();
	$('#Question_re_191').draggable();
	$('#Question_re_192').draggable();
	$('#Question_re_193').draggable();
	$('#Question_re_194').draggable();
	$('#Question_re_279').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjre(){
	document.getElementById("int_re_Retour").disabled=false;
	document.getElementById("Int_re_Continuer").disabled=false;
	document.getElementById("Int_re_Synthese").disabled=false;
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
<label id="image_Bleu_b">E.Evaluation</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_re" align="center"><?php include 'Interface_re.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>