<?php

@session_start();

$mission_id = @$_SESSION['idMission'];

include '../../../connexion.php';
// include '../../../test_acces.php';

$reponse1 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID=' . $mission_id . ' and RDC_RANG=4');

$donnees = $reponse1->fetch();

$commentaire1 = $donnees['RDC_COMMENTAIRE'];
$qcm1 = $donnees['RDC_REPONSE'];

$reponse2 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID=' . $mission_id . ' and RDC_RANG=5');

$donnees2 = $reponse2->fetch();

$commentaire2 = $donnees2['RDC_COMMENTAIRE'];
$qcm2 = $donnees2['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
<script>
    $(function () {
        $('#bt_retour').click(function () {
            $('#sms_retour').show();
        });
        $('#bt_retour_1').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/index.php");
        });
        $('#revue').click(function () {
            //alert("cc");
            $('#bt_retour_1').hide();
            $('#contenue_question').show();
            $('#contenue_rdc').show();
            $('#contenue_travail').load("RDC/charge_fournisseur/A_coherence/table_F2.php");
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
                add_Data(reponse1,commentaire1,'charge_fournisseur','A',4,<?php echo $mission_id; ?>);
                add_Data(reponse2,commentaire2,'charge_fournisseur','A',5,<?php echo $mission_id; ?>);
                addDataF2();
                $('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence4.php");
            }
        });

        $('#bt_non').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/index.php");
        });

        $('#resaisir').click(function () {
            $('#erreurSaisie').hide();
        });

        $('#bt_precedent').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/A_coherence/coherence2.php");
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


    function addDataF2() {

        datatransfert = $("#frmRDCcoherence").serialize() + "&cycle=charges_fournisseurs";
        $.ajax({
            type: 'POST',
            url: 'RDC/charge_fournisseur/A_coherence/addDataTableF2.php',
            data: datatransfert,
            //{compte:compte, labelle:labelle, montant:montant, budget:budget, ecart:ecart, comment:comment, mission_id:<?php echo $mission_id; ?>, cycle:'charges_fournisseurs'},
            success: function (res) {
                alert(res);
            }
        });


        //}

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
            <center><label>A- COHERENCES ET PRINCIPES COMPTABLES PARTIE : III</label></center>
        </td>
    </tr>
</table>
<div style="overflow:auto;">
    <table width="100%" height="400">
        <tr>
            <td width="72.5%">
                <div id="contenue_travail" style="overflow:auto;height:390px;">
                    <label><strong>Travaux à faire :</strong>
                        <br/><br/>Analyser et justifier les écarts entre le budget et les réalisations.
                    </label><br/><br/><br/><br/>
                    <label><strong>Documents et infos à obtenir</strong></label><br/><br/>
                    <label><strong>.</strong>Budget charges N</label><br/><br/><br/>
                    <label><strong>.</strong> Evènements marquants de l'exercice</label><br/><br/><br/><br/>
                    <label><strong>Question 1 :</strong></label><br/><br/>
                    <label>A-t-on effectué une analyse des charges par rapport au budget?</label><br/><br/><br/><br/>
                    <label><strong>Question 2 :</strong></label><br/><br/>
                    <label>Les écarts significatifs sont-ils tous justifiés et expliqués ?</label><br/><br/><br/><br/>
                    <label><strong>Feuille de travail :</strong></label><label id="revue"
                                                                               style="cursor:pointer;color:red;">
                        &nbsp;Rapprochement des dépenses réelles avec le budget00000</label>
                </div>
            </td>
            <td width="27.5%">
                <input type="button" id="bt_retour_1" value="Retour" class="bouton"
                       style="display:none;top:-205px;float:right;position:relative;"/>
                <div style="position:absolute;top:110px;right:0px;">
                    <input type="button" id="bt_precedent" value="<" class="bouton"/>
                    <input type="button" id="bt_suivant" value=">" class="bouton"/>
                </div>
                <br/><br/>
                <div id="contenue_question" style="overflow:auto;height:390px;float:none;">
                    <div id="contenue_rdc" <?php
                    if (@$_GET["coherence_visible"] != 'OK')
                        print 'style="display:none;"'
                    ?> >
                        <label><strong>Question 1 :</strong></label><br/>
                        <label>A-t-on effectué une analyse des charges par rapport au budget?</label>
                        <select id="qcm1" onchange="choixqcm1()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm1 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="N/A" <?php if ($qcm1 == "N/A") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm1 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1; ?></textarea><br/>
                        <label><strong>Question 2 :</strong></label><br/>
                        <label>Les écarts significatifs sont-ils tous justifiés et expliqués ?</label>
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
<div id="progressbarF2"
     style="width:300px;height:60px;position:absolute;top:350px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
    <center><img src="img/progressbar.gif"/><br/>Veuillez patienter s'il vous plaît</center>
</div>
<div id="erreurSaisie"
     style="width:300px;height:60px;position:absolute;top:350px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
    <center>Veuillez resaisir les données s'il vous plaît<br/>
        <input type="Button" value="Ok" id="resaisir" class="bouton"/>
    </center>
</div>
</body>
</html>
