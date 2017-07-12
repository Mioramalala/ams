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
	$('#Int_Synthese_rc').draggable();
	$('#Question_rc_255').draggable();
	$('#Question_rc_256').draggable();
	$('#Question_rc_257').draggable();
	$('#Question_rc_258').draggable();
	$('#Question_rc_259').draggable();
	$('#Question_rc_260').draggable();
	$('#Question_rc_261').draggable();
	$('#Question_rc_262').draggable();
	$('#Question_rc_189').draggable();
	$('#Question_rc_190').draggable();
	$('#Question_rc_191').draggable();
	$('#Question_rc_192').draggable();
	$('#Question_rc_193').draggable();
	$('#Question_rc_194').draggable();
	$('#Question_rc_263').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjrc(){
	document.getElementById("int_rc_Retour").disabled=false;
	document.getElementById("Int_rc_Continuer").disabled=false;
	document.getElementById("Int_rc_Synthese").disabled=false;
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
			<label id="image_Bleu_b">D.Réalité</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_rc" align="center"><?php include 'Interface_rc.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>