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
	$('#Int_Synthese_pd').draggable();
	$('#Question_pd_222').draggable();
	$('#Question_pd_223').draggable();
	$('#Question_pd_224').draggable();
	$('#Question_pd_225').draggable();
	$('#Question_pd_226').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjpd(){
	document.getElementById("int_pd_Retour").disabled=false;
	document.getElementById("Int_pd_Continuer").disabled=false;
	document.getElementById("Int_pd_Synthese").disabled=false;
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
<label id="image_Bleu_b">D.Evaluation.</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_pd" align="center"><?php include 'Interface_pd.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>