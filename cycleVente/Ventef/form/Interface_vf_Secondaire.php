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
	$('#Int_Synthese_vf').draggable();
	$('#Question_vf_393').draggable();
	$('#Question_vf_394').draggable();
	$('#Question_vf_395').draggable();
	$('#Question_vf_396').draggable();
	$('#Question_vf_397').draggable();
	$('#Question_vf_398').draggable();
	$('#Question_vf_399').draggable();
	$('#Question_vf_400').draggable();
	$('#Question_vf_401').draggable();
	$('#Question_vf_402').draggable();
	$('#Question_vf_403').draggable();
	$('#Question_vf_404').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjvf(){
	document.getElementById("int_vf_Retour").disabled=false;
	document.getElementById("Int_vf_Continuer").disabled=false;
	document.getElementById("Int_vf_Synthese").disabled=false;
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
<label id="image_Bleu_b">F.Imputation.</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_vf" align="center"><?php include 'Interface_vf.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>