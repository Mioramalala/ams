<?php

@session_start();

$mission_id = @$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID=' . $mission_id . ' and RDC_RANG=11');

$donnees = $reponse1->fetch();

$commentaire1 = $donnees['RDC_COMMENTAIRE'];
$qcm1 = $donnees['RDC_REPONSE'];

$reponse2 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID=' . $mission_id . ' and RDC_RANG=12');

$donnees2 = $reponse2->fetch();

$commentaire2 = $donnees2['RDC_COMMENTAIRE'];
$qcm2 = $donnees2['RDC_REPONSE'];

$reponse3 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID=' . $mission_id . ' and RDC_RANG=13');

$donnees3 = $reponse3->fetch();

$commentaire3 = $donnees3['RDC_COMMENTAIRE'];
$qcm3 = $donnees3['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
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
                $("#qcm3").attr('disabled',result);
                $("#comment1").attr('disabled',result);
                $("#comment2").attr('disabled',result);
                $("#comment3").attr('disabled',result);
            }
        }
    );
    $(function () {
        $('#bt_retour').click(function () {
            $('#sms_retour').show();
        });
        $('#bt_retour_1').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/index.php");
        });
        $('#revue').click(function () {
            $('#feuille').hide();
            $('#contenue_rdc').show();
            $('#bt_retour_1').hide();
            $('#contenue_question').show();
            $('#revue').hide();
            $('#upload').show();
            // $('#contenue_travail').load("RDC/charge_fournisseur/A_coherence/table_F51.php");
        });

        $('#bt_suivant').click(function () {
            var reponse1 = $('#qcm1').val();
            var commentaire1 = $('#comment1').val();
            var reponse2 = $('#qcm2').val();
            var commentaire2 = $('#comment2').val();
            var reponse3 = $('#qcm3').val();
            var commentaire3 = $('#comment3').val();
            if ((reponse1 == "non" && commentaire1 == "") || (reponse2 == "non" && commentaire2 == "") || (reponse3 == "non" && commentaire3 == "") || reponse1 == "" || reponse2 == "" || reponse3 == "") {
                alert('Des réponses obligatoires ont été omises!');
            }
            else {
                add_Data(reponse1,commentaire1,'charge_fournisseur','A',11,<?php echo $mission_id; ?>);
                add_Data(reponse2,commentaire2,'charge_fournisseur','A',12,<?php echo $mission_id; ?>);
                add_Data(reponse3,commentaire3,'charge_fournisseur','A',13,<?php echo $mission_id; ?>);
                $("#contenue").load("RDC/charge_fournisseur/index.php");
            }
        });

        $('#bt_non').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/index.php");
        });

        $('#bt_oui').click(function () {

        });

        $('#bt_precedent').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/A_coherence/coherence6.php");
        });
    });
    function add_Data(reponse,commentaire,cycle,objectif,rang,mission_id) {
        $.ajax({
            type: 'POST',
            url: 'RDC/charge_fournisseur/A_coherence/add_Data.php',
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
    function choixqcm3() {
        var reponse3 = $('#qcm3').val();
        var commentaire3 = $('#comment3').val();
        if (reponse3 == "non" && commentaire3 == "") {
            alert('Des commentaires obligatoires ont été omis!');
        }
    }
</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
    <tr>
        <td class="grand_Titre">
            <center><label>A- COHERENCES ET PRINCIPES COMPTABLES PARTIE : VII</label></center>
        </td>
    </tr>
</table>
<div style="overflow:auto;">
    <table width="100%" height="420">
        <tr>
            <td width="72.5%">
                <div id="contenue_travail" style="overflow:auto;height:400px;">
                    <label><strong>Travaux à faire :</strong>
                        <br/><br/>Examiner les principes de comptabilisation :
                        Suivi et concordance du mode de comptabilisation des opérations avec les normes applicables (PCG
                        05, IAS/IFRS, norme du Groupe, guide sectoriel).</label><br/><br/><br/><br/>
                    <label><strong>Documents et infos à obtenir</strong></label><br/><br/>
                    <label><strong>.</strong>Prise de connaissance du système comptable</label><br/><br/><br/>
                    <label><strong>.</strong>Critères d'affectation en
                        charges/immobilisations</label><br/><br/><br/><br/>
                    <label><strong>Question 1 :</strong></label><br/><br/>
                    <label>Les principes comptables appliqués par la société sont-ils cohérents avec le secteur dans
                        lequel la société exerce ?</label><br/><br/><br/><br/>
                    <label><strong>Question 2 :</strong></label><br/><br/>
                    <label>Confirmez-vous l'existence d'une note définissant les critères d'affectation en charges/immo
                        ?</label><br/><br/><br/><br/>
                    <label><strong>Question 3 :</strong></label><br/><br/>
                    <label>Avez-vous contrôlé sa mise en application ?</label><br/><br/><br/><br/>
                    <label id="feuille"><strong>Feuille de travail :</strong></label><label id="revue"
                                                                                            style="cursor:pointer;color:red;">
                        &nbsp;Questionnaires</label>
                    <div id="upload" style="display:none;">
                        <form method="post" enctype="multipart/form-data"
                              action="RDC/charge_fournisseur/uploader_fichier.php">
                            <label style="color:blue;"><strong>Pièce justificative :</strong></label><br/>
                            <input type="file" id="file_upload" name="file_upload"/>
                            <input type="submit" name="import" value="Upload" id="id_impotdoc"/>
                            <br/><br/>
                        </form>
                    </div>
                </div>
            </td>
            <td width="27.5%">
                <input type="button" id="bt_retour_1" value="Retour" class="bouton"
                       style="display:none;top:-210px;float:right;position:relative;"/>
                <div style="position:absolute;top:110px;right:0px;">
                    <input type="button" id="bt_precedent" value="<" class="bouton"/>
                    <input type="button" id="bt_suivant" value=">I" class="bouton"/>
                </div>
                <br/><br/>
                <div id="contenue_question" style="overflow:auto;height:400px;">
                    <div id="contenue_rdc"
                        <?php
                        if (@$_GET["coherence_visible"] != 'OK')
                            print 'style="display:none;"'
                        ?> >
                        <label><strong>Question 1 :</strong></label><br/>
                        <label>Les principes comptables appliqués par la société sont-ils cohérents avec le secteur dans
                            lequel la société exerce ?</label>
                        <select id="qcm1" onchange="choixqcm1()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm1 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="N/A" <?php if ($qcm1 == "N/A") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm1 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1; ?></textarea><br/>
                        <label><strong>Question 2 :</strong></label><br/>
                        <label>Confirmez-vous l'existence d'une note définissant les critères d'affectation en
                            charges/immo ?</label>
                        <select id="qcm2" onchange="choixqcm2()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm2 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="N/A" <?php if ($qcm2 == "N/A") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm2 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2; ?></textarea><br/>
                        <label><strong>Question 3 :</strong></label><br/>
                        <label>Avez-vous contrôlé sa mise en application ?</label>
                        <select id="qcm3" onchange="choixqcm3()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm3 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="N/A" <?php if ($qcm3 == "N/A") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm3 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment3" cols="35" rows="10"><?php echo $commentaire3; ?></textarea><br/>
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
