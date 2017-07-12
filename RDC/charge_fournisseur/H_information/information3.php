<?php

@session_start();
$mission_id = @$_SESSION['idMission'];
include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="H" and MISSION_ID=' . $mission_id . ' and RDC_RANG=3');
$donnees = $reponse1->fetch();

$commentaire1 = $donnees['RDC_COMMENTAIRE'];
$qcm1 = $donnees['RDC_REPONSE'];
?>

<html>
<head>
    <link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
    <style type="text/css">
        textarea {
            width: 100%;
            height: 70px;
            font-size: 9pt;
            font-family: calibri;
        }
    </style>
</head>
<script>
    // Droit cycle by Tolotra
    // Page : RDC ->  F-Charges Fournisseurs
    // Tâche :  Revue comptes Charges Fournisseurs, 37
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 6},
            success: function (e) {
                var result = 0 === Number(e);
                $("#qcm1").attr('disabled',result);
                $("#comment1").attr('disabled',result);
            }
        }
    );
    $(function () {
        $('#bt_precedent').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/H_information/information3.php");
        });
        $('#bt_retour_1').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/H_information/information2.php");
        });
        $('#revue').click(function () {
            $('#contenue_rdc').show();
            $('#bt_retour_1').hide();
            $('#contenue_question').show();
            $('#contenue_travail').load("RDC/charge_fournisseur/H_information/table_F10.php");
        });

        $('#bt_suivant').click(function () {
            waiting();
            var reponse1 = $('#qcm1').val();
            var commentaire1 = $('#comment1').val();
            if ((reponse1 == "non" && commentaire1 == "") || reponse1 == "") {
                alert('Des réponses obligatoires ont été omises!');
            }
            else {
                add_Data(reponse1,commentaire1,'charge_fournisseur','H',3,<?php echo $mission_id; ?>);
                var compteur = parseInt($('#ajout').attr('alt'));//Début d'enregistrelent du Feuille de travail

                for (var i = 1; i <= compteur; i++) {
                    var nat = ($("#nat" + i).text() != "") ? $("#nat" + i).text() : $("#nat" + i).val();
                    var na = $("#na" + i).val();
                    var cmnt = $("#cmnt" + i).val();

                    $.ajax({
                        type: "post",
                        url: "RDC/charge_fournisseur/H_information/saveF10.php",
                        data: {nat: nat,na: na,cmnt: cmnt},
                        success: function (e) {
                            stopWaiting();
                        }
                    });
                }
                ;
                if (compteur == 0) stopWaiting;

                $("#contenue").load("RDC/charge_fournisseur/H_information/information4.php");
            }
        });

        $('#bt_non').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/index.php");
        });

        $('#bt_oui').click(function () {

        });
    });
    function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id) {
        $.ajax({
            type: 'POST',
            url: 'RDC/charge_fournisseur/G_juridique/add_Data.php',
            data: {
                reponse: reponse,
                commentaire: commentaire,
                cycle: cycle,
                objectif: objectif,
                rang: rang,
                mission_id: mission_id
            },
            success: function () {
            }
        });
    }
    function choixqcm1() {
        var reponse1 = $('#qcm1').val();
        var commentaire1 = $('#comment1').val();
        if (reponse1 == "non" && commentaire1 == "") {
            alert('Des commentaires obligatoires ont été omis!');
        }
    }
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
    <tr>
        <td class="grand_Titre">
            <center><label style="font-weight:bold;">H - INFORMATION ET PRESENTATION PARTIE : III</label></center>
        </td>
    </tr>
</table>
<div style="overflow:auto;">
    <table width="100%" height="470">
        <tr>
            <td width="72.5%">
                <div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
                    <label><strong>Travaux à faire :</strong></lable>
                        <p style="margin-left:15px;margin-top:5px;">Informations données en annexes : ventilation des
                            dettes, engagements de crédit-bail, clause de réserve de propriété, opérations avec des
                            entreprises liées, effets à payer, ...</p>
                        <label><strong>Documents et infos à obtenir</strong></label><br/>
                        <ul>
                            <li>Etats financiers et notes annexes</li>
                        </ul>
                        <label><strong>Question :</strong></label><br/>
                        <p style="margin-left:15px;margin-top:5px;">Confirmez-vous que tous les détails des états
                            financiers ainsi que toutes les informations devant figurer dans les annexes aux états
                            financiers y sont </p>
                        <label><strong>Feuille de travail :</strong></label><label id="revue"
                                                                                   style="cursor:pointer;color:red;font-weight:bold;">
                            Elements en annexe</label>
                </div>
            </td>
            <td width="27.5%">
                <input type="button" id="bt_retour_1" value="Retour" class="bouton"
                       style="display:block;top:-210px;float:right;position:relative;"/>
                <div id="contenue_question" style="overflow:auto;height:450px;">
                    <input type="button" id="bt_suivant" value=">" class="bouton" style="float:right;"/>
                    <input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;"/>
                    <div id="contenue_rdc"
                        <?php
                        if (@$_GET["information_visible"] != 'OK')
                            print 'style="display:none;"'
                        ?> >
                        <label><strong>Question :</strong></label><br/>
                        <label>Confirmez-vous que tous les détails des états financiers ainsi que toutes les
                            informations devant figurer dans les annexes aux états financiers y sont </label>
                        <select id="qcm1" onchange="choixqcm1()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm1 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="N/A" <?php if ($qcm1 == "N/A") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm1 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment1"><?php echo $commentaire1; ?></textarea><br/>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
