<?php
$mission_id = $_POST['mission_id'];
?>
<html>
    <head>
        <title>AMS | Cycle achat</title>

<!--<script type="text/javascript" src="../cycleAchat/plugins/jquery.js"></script>
<script type="text/javascript" src="../cycleAchat/plugins/jquery.easyui.min.js"></script>

<link a href="stylesheet" src="../cycleAchat/cycle_achat_b/css/class.css">
<link a href="stylesheet" src="../cycleAchat/cycle_achat_b/css/div.css">
<link a href="stylesheet" src="../cycleAchat/cycle_achat_b/css/div_acb.css">
<link a href="stylesheet" src="../cycleAchat/cycle_achat_b/css/div_fermer_quest_objectif_acb.css">

<link href="../cycle_achat_css/class.css" rel="stylesheet" type="text/css">
<link href="cycleAchat/cycle_achat_css/div_fermer_quest_objectif_B.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/div.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_b.js"></script-->
        <script>
            $(document).ready(function () {
                // Formulaire draggable

                //tinay editer

                //? à verifier si existe
                $('#Int_Synthese_acb').draggable();

                // à changer par dragg_numQuestion??

                $('#Question_acb_1').draggable();
                $('#Question_acb_2').draggable();
                $('#Question_acb_3').draggable();
                $('#Question_acb_4').draggable();
                $('#Question_acb_5').draggable();
                $('#Question_acb_6').draggable();
                $('#Question_acb_7').draggable();
                $('#Question_acb_8').draggable();
                $('#Question_acb_9').draggable();
                $('#Question_acb_10').draggable();
                $('#Question_acb_11').draggable();
                $('#Question_acb_12').draggable();
                $('#Question_acb_13').draggable();
                $('#Question_acb_14').draggable();
                $('#Question_acb_15').draggable();
                $('#Question_acb_16').draggable();
                $('#Question_acb_17').draggable();
                $('#Question_acb_18').draggable();
                $('#Question_acb_19').draggable();
                $('#Question_acb_20').draggable();
                $('#Question_acb_21').draggable();
                $('#Question_acb_22').draggable();
                $('#Question_acb_23').draggable();

                // $('#dragg_1').draggable();
                // $('#dragg_2').draggable();
                // $('#dragg_3').draggable();
                // $('#dragg_4').draggable();
                // $('#dragg_5').draggable();
                // $('#dragg_6').draggable();
                // $('#dragg_7').draggable();
                // $('#dragg_8').draggable();
                // $('#dragg_9').draggable();
                // $('#dragg_10').draggable();
                // $('#dragg_11').draggable();
                // $('#dragg_12').draggable();
                // $('#dragg_13').draggable();
                // $('#dragg_14').draggable();
                // $('#dragg_15').draggable();
                // $('#dragg_16').draggable();
                // $('#dragg_17').draggable();
                // $('#dragg_18').draggable();
                // $('#dragg_19').draggable();
                // $('#dragg_20').draggable();
                // $('#dragg_21').draggable();
                // $('#dragg_22').draggable();
                // $('#dragg_23').draggable();
            });
            function openButtObjacb() {
                document.getElementById("int_acb_Retour").disabled = false;
                document.getElementById("Int_acb_Continuer").disabled = false;
                document.getElementById("Int_acb_Synthese").disabled = false;
            }
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>
    <body>
        <div id="fond_Sous_Titre" class="menu_Titre"><label class="marge_Titre">Evaluation du contrôle des fournisseurs</label><label class="margin_Code">Code : FC1</label>
        </div>
        <!--div id="fond_Question"-->
        <table width="100%">
            <tr>
                <td class="titre" id="image_bleu" align="center"><!--label id="image_Bleu_A"> A. S’assurer que les séparations de fonctions sont suffisantes.</label-->
                    <label id="image_Bleu_b">B.Exhaustivité.</label>
                </td>
            </tr>
        </table>
        <!--/div-->
        <!--**************************************Affichage de Atreto.************************************************-->
        <div id="interface_acb1" align="center">
            <?php include 'Interface_acb.php'; ?>
        </div>
        <!--*****************************************************************************************************-->
    </body>
</html>