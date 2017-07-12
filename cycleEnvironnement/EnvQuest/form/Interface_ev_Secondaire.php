<html>
<head>
<title>AMS | Cycle achat</title>
<!-- 
<script type="text/javascript" src="../cycleAchat/plugins/jquery.js"></script>
<script type="text/javascript" src="../cycleAchat/plugins/jquery.easyui.min.js"></script>
 -->
<!--link href="../cycle_achat_css/class.css" rel="stylesheet" type="text/css" /-->
<!--link href="cycleAchat/cycle_achat_css/div_fermer_quest_objectif_B.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/div.css" rel="stylesheet" type="text/css" /> 

<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_b.js"></script-->
<script>
$(document).ready(function() {
	// alert("Interface Ev Secondaire");
	// Formulaire draggable
	$('#Int_Synthese_ev').draggable();
	$('#Question_ev_405').draggable();
	$('#Question_ev_406').draggable();
	$('#Question_ev_407').draggable();
	$('#Question_ev_408').draggable();
	$('#Question_ev_409').draggable();
	$('#Question_ev_410').draggable();
	$('#Question_ev_411').draggable();
	$('#Question_ev_412').draggable();
	$('#Question_ev_413').draggable();
	$('#Question_ev_414').draggable();
	$('#Question_ev_415').draggable();
	$('#Question_ev_416').draggable();
	$('#Question_ev_417').draggable();
	$('#Question_ev_418').draggable();
	$('#Question_ev_419').draggable();
	$('#Question_ev_420').draggable();
	$('#Question_ev_421').draggable();
	$('#Question_ev_422').draggable();
	$('#Question_ev_423').draggable();
	$('#Question_ev_424').draggable();
	$('#Question_ev_425').draggable();
	$('#Question_ev_426').draggable();
	$('#Question_ev_427').draggable();
	$('#Question_ev_428').draggable();
	$('#Question_ev_429').draggable();
	$('#Question_ev_430').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjev(){
	document.getElementById("int_ev_Retour").disabled=false;
	document.getElementById("Int_ev_Continuer").disabled=false;
	document.getElementById("Int_ev_Synthese").disabled=false;
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
<label id="image_Bleu_b">QUESTIONNAIRE PME D’ANALYSE DU CONTRÔLE INTERNE</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_ev" align="center"><?php include 'Interface_ev.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>