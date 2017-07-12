<html>
<head>
<title>AMS | Cycle achat</title>

<script type="text/javascript" src="../cycleAchat/plugins/jquery.js"></script>
<script type="text/javascript" src="../cycleAchat/plugins/jquery.easyui.min.js"></script>

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
	$('#Int_Synthese_stc').draggable();
	$('#Question_stc_135').draggable();
	$('#Question_stc_136').draggable();
	$('#Question_stc_137').draggable();
	$('#Question_stc_138').draggable();
	$('#Question_stc_139').draggable();
	$('#Question_stc_140').draggable();
	$('#Question_stc_141').draggable();
	$('#Question_stc_142').draggable();
	$('#Question_stc_143').draggable();
	$('#Question_stc_144').draggable();
	$('#Question_stc_145').draggable();
	$('#Question_stc_146').draggable();
	$('#Question_stc_147').draggable();
	$('#Question_stc_148').draggable();
	$('#Question_stc_149').draggable();
	$('#Question_stc_150').draggable();
	$('#Question_stc_151').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjstc(){
	document.getElementById("int_stc_Retour").disabled=false;
	document.getElementById("Int_stc_Continuer").disabled=false;
	document.getElementById("Int_stc_Synthese").disabled=false;
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
<label id="image_Bleu_b">C.Realite</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_stc" align="center"><?php include 'Interface_stc.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>