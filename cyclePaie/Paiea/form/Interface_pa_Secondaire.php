<?php
$mission_id=@$_POST['mission_id'];
$entrepiseId=@$_POST['entrepiseId'];
?>

<html>
<head>
<title>AMS | Cycle achat</title>

<!--link href="cycleAchat/cycle_achat_css/class_a/div_a.css" rel="stylesheet" type="text/css" />

<!-------------Ts azo supprimena---------------------------->
<!--script type="text/javascript" src="../Plugins/jquery.js"></script>
<script type="text/javascript" src="../Plugins/jquery.easyui.min.js"></script>
<!---------------------------------------------------------->

<!--script type="text/javascript" src="cycleAchat/cycle_achat_js/js.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_event.js"></script-->

<!--script type="text/javascript" src="cycleAchat/cycle_achat_js/js_a.js"></script-->

<link href="../facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="../facebox/facebox.js" type="text/javascript"></script>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="fond_Sous_Titre" class="menu_Titre"><label class="marge_Titre">Evaluation du contrôle des paies
</label><input type="text" id="txt_mission_id_int_pa" value="<?php echo $mission_id; ?>" style="margin-left:300;width:20px;margin-top:7px;text-align:center;display:none;" readonly /><label class="margin_Code">Code : FC2 </label>
</div>
<div id="fond_Question">
<table width="100%">
	<tr>
		<td class="titre" id="image_bleu" align="center"><label> A. S’assurer que les séparations de fonctions sont suffisantes.</label>
		<!--label id="image_Bleu_B">B. S'assurer que tous les achats (retours) sont saisis et enregistrés (exhaustivité).</label>
		<label id="image_Bleu_C">C. S'assurer que toutes les factures (avoirs) enregistrées correspondent à des achats réels de l'entreprise.</label>
		<label id="image_Bleu_D">D. S'assurer que tous les achats enregistrés sont correctement évalués.</label>
		<label id="image_Bleu_E">E. S'assurer que tous les achats, ainsi que les produits et charges connexes sont enregistrés dans la bonne période.</label>
		<label id="image_Bleu_F">F. S'assurer que tous les achats, ainsi que les charges et produits connexes sont correctement imputés, totalisés et centralisés.</label-->
		</td>
	</tr>
</table>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_pa" align="center"><?php include 'Interface_pa.php'; ?></div>
<!--*****************************************************************************************************-->
</div>
</body>
</html>