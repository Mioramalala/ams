<?php

@session_start();

$mission_id = @$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and MISSION_ID=' . $mission_id . ' and RDC_RANG=1');

$donnees = $reponse1->fetch();

$commentaire1 = $donnees['RDC_COMMENTAIRE'];
$qcm1 = $donnees['RDC_REPONSE'];

$reponse2 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and MISSION_ID=' . $mission_id . ' and RDC_RANG=2');

$donnees2 = $reponse2->fetch();

$commentaire2 = $donnees2['RDC_COMMENTAIRE'];
$qcm2 = $donnees2['RDC_REPONSE'];

?>

<html>
<head>
    <link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
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
                $("#qcm2").attr('disabled',result);
                $("#comment1").attr('disabled',result);
                $("#comment2").attr('disabled',result);
            }
        }
    );

    $(function () {
        $('#bt_retour').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/index.php");
        });

        $('#bt_retour_1').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/index.php");
        });

        $('#revue').click(function () {
            $('#contenue_rdc').show();
            $('#bt_retour_1').hide();
            $('#revue,#feuilT').fadeOut();
            $('#contenue_question').show();
            // $('#contenue_travail').load("RDC/charge_fournisseur/E_evaluation/table_F81.php");
        });

        $('#bt_suivant').click(function () {
            var reponse1 = $('#qcm1').val();
            var commentaire1 = $('#comment1').val();
            var reponse2 = $('#qcm2').val();
            var commentaire2 = $('#comment2').val();
            if ((reponse1 == "non" && commentaire1 == "") || (reponse2 == "non" && commentaire2 == "") || reponse1 == "" || reponse2 == "") {
                alert('Des réponses obligatoires ont été omises!');
            }
            else {
                add_Data(reponse1,commentaire1,'charge_fournisseur','E',1,<?php echo $mission_id; ?>);
                add_Data(reponse2,commentaire2,'charge_fournisseur','E',2,<?php echo $mission_id; ?>);
                $("#contenue").load("RDC/charge_fournisseur/E_evaluation/evaluation2.php");
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
            url: 'RDC/charge_fournisseur/B_exhaustivite/add_Data.php',
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

    function choixqcm2() {
        var reponse2 = $('#qcm2').val();
        var commentaire2 = $('#comment2').val();
        if (reponse2 == "non" && commentaire2 == "") {
            alert('Des commentaires obligatoires ont été omis!');
        }
    }
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
    <tr>
        <td class="grand_Titre">
            <center><label style="font-weight:bold;">E - EVALUATION DES SOLDES : Partie I</label></center>
        </td>
    </tr>
</table>
<div style="overflow:auto;">
    <table width="100%" height="470">
        <tr>
            <td width="72.5%">
                <div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
                    <label><strong>Travaux à faire :</strong></label>
                    <p style="margin-left:15px;margin-top:5px;">Contrôler l’ancienneté des soldes fournisseurs.</p>
                    <label><strong>Documents et infos à obtenir</strong></label>
                    <ul>
                        <li>Balance âgée des comptes fournisseurs</li>
                        <li>Justificatif des comptes fournisseurs à plus d'un an</li>
                    </ul>
                    <label><strong>Questions :</strong></label>
                    <ul>
                        <li>Les soldes des comptes fournisseurs datant de plus d'un an sont-ils tous justifiés?</li>
                        <li>A-t-on vérifié que les dettes anciennes n'ont pas de caractère litigieux ?</li>
                    </ul>
                    <label><strong id="feuilT">Feuille de travail :</strong></label><label id="revue"
                                                                                           style="cursor:pointer;color:red;font-weight:bold;">
                        Questionnaires</label>
                </div>
            </td>
            <td width="27.5%">
                <input type="button" id="bt_retour_1" value="Retour" class="bouton"
                       style="display:block;top:-210px;float:right;position:relative;"/>
                <div id="contenue_question" style="margin-top:-24px;overflow:auto;height:400px;float:right">

                    <input type="button" id="bt_suivant" value=">" class="bouton"
                           style="float:right;;margin-right:15px;"/>
                    <input type="button" id="bt_retour" value="Retour" class="bouton"
                           style="float:right;;margin-right:15px;"/><br/>
                    <div id="contenue_rdc"
                        <?php
                        if (@$_GET["evaluation_visible"] != 'OK')
                            print 'style="display:none;"'
                        ?> >
                        <label><strong>Question 1 :</strong></label><br/>
                        <label>Les soldes des comptes fournisseurs datant de plus d'un an sont-ils tous
                            justifiés?</label>
                        <select id="qcm1" onchange="choixqcm1()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm1 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="N/A" <?php if ($qcm1 == "N/A") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm1 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1; ?></textarea><br/>
                        <label><strong>Question 2 :</strong></label><br/>
                        <label>A-t-on vérifié que les dettes anciennes n'ont pas de caractère litigieux ?</label>
                        <select id="qcm2" onchange="choixqcm2()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm2 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="N/A" <?php if ($qcm2 == "N/A") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm2 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2; ?></textarea><br/>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div id="sms_retour" style="display:none;">
        <table>
            <tr align="center">
                <td height="60">Voulez-vous enregistrer</td>
            </tr>
            <tr>
                <td>
                    <input type="button" id="bt_oui" value="Oui" class="bouton"/>&nbsp;&nbsp;&nbsp;
                    <input type="button" id="bt_non" value="Non" class="bouton"/>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
