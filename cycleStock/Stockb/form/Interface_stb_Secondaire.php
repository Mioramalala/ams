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
	$('#Int_Synthese_stb').draggable();
	$('#Question_stb_117').draggable();
	$('#Question_stb_118').draggable();
	$('#Question_stb_119').draggable();
	$('#Question_stb_120').draggable();
	$('#Question_stb_121').draggable();
	$('#Question_stb_122').draggable();
	$('#Question_stb_123').draggable();
	$('#Question_stb_124').draggable();
	$('#Question_stb_125').draggable();
	$('#Question_stb_126').draggable();
	$('#Question_stb_127').draggable();
	$('#Question_stb_128').draggable();
	$('#Question_stb_129').draggable();
	$('#Question_stb_130').draggable();
	$('#Question_stb_131').draggable();
	$('#Question_stb_132').draggable();
	$('#Question_stb_133').draggable();
	$('#Question_stb_134').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjstb(){
	document.getElementById("int_stb_Retour").disabled=false;
	document.getElementById("Int_stb_Continuer").disabled=false;
	document.getElementById("Int_stb_Synthese").disabled=false;
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
<div id="interface_stb" align="center"><?php include 'Interface_stb.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>