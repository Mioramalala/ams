<?php

@session_start();

$mission_id = @$_SESSION['idMission'];

include '../../../connexion.php';
// include '../../../test_acces.php';

$reponse1 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID=' . $mission_id . ' and RDC_RANG=8');

$donnees = $reponse1->fetch();

$commentaire1 = $donnees['RDC_COMMENTAIRE'];
$qcm1 = $donnees['RDC_REPONSE'];

$reponse2 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="A" and MISSION_ID=' . $mission_id . ' and RDC_RANG=9');

$donnees2 = $reponse2->fetch();

$commentaire2 = $donnees2['RDC_COMMENTAIRE'];
$qcm2 = $donnees2['RDC_REPONSE'];

?>

<html>
<head>


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
                    $("#comment1").attr('disabled',result);
                    $("#comment2").attr('disabled',result);
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
                $('#bt_retour_1').hide();
                $('#contenue_rdc').show();
                $('#contenue_question').show();
                $('#contenue_travail').load("RDC/charge_fournisseur/A_coherence/table_F40.php");
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
                    add_Data(reponse1,commentaire1,'charge_fournisseur','A',8,<?php echo $mission_id; ?>);
                    add_Data(reponse2,commentaire2,'charge_fournisseur','A',9,<?php echo $mission_id; ?>);
                    addDataTableF4();
                    $('#contenue').load("RDC/charge_fournisseur/A_coherence/coherence6.php");
                }
            });

            $('#resaisirF4').click(function () {
                $('#erreurSaisie4').hide();
            });

            $('#bt_oui').click(function () {

            });

            $('#bt_precedent').click(function () {
                $("#contenue").load("RDC/charge_fournisseur/A_coherence/coherence4.php");
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
        function addDataTableF4() {
            var tab_vente = new Array();
            var tab_ventemarch = new Array();
            var tab_coutmarch = new Array();
            var tab_stockinit = new Array();
            var tab_stockfin = new Array();
            var tab_margebrute = new Array();
            var tab_margevente = new Array();
            var tab_margeachat = new Array();

            for (i = 0; i < 5; i++) {
                tab_vente[i] = $('#venteN' + i).val();
                tab_ventemarch[i] = $('#ventemarchN' + i).val();
                tab_coutmarch[i] = $('#coutmarchN' + i).val();
                tab_stockinit[i] = $('#stockinitN' + i).val();
                tab_stockfin[i] = $('#stockfinN' + i).val();
                tab_margebrute[i] = $('#margebruteN' + i).val();
                tab_margevente[i] = $('#margeventeN' + i).val();
                tab_margeachat[i] = $('#margeachatN' + i).val();
            }
            $.ajax({
                type: 'POST',
                url: 'RDC/charge_fournisseur/A_coherence/addDataTableF4.php',
                data: {
                    tab_vente: tab_vente,
                    tab_ventemarch: tab_ventemarch,
                    tab_coutmarch: tab_coutmarch,
                    tab_stockinit: tab_stockinit,
                    tab_stockfin: tab_stockfin,
                    tab_margebrute: tab_margebrute,
                    tab_margevente: tab_margevente,
                    tab_margeachat: tab_margeachat,
                    mission_id:<?php echo $mission_id;?>},
                success: function (e) {
                }
            });
            //addDataFraisAcces(compteF4);
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
</head>
<body>
<table width="100%" bgcolor="#00698d">
    <tr>
        <td class="grand_Titre">
            <center><label>A- COHERENCES ET PRINCIPES COMPTABLES PARTIE : V</label></center>
        </td>
    </tr>
</table>
<!--div style="overflow:auto;"-->
<table width="100%" height="430px">
    <tr>
        <td width="72.5%">
            <div id="contenue_travail" style="overflow:auto;height:410px;">
                <label><strong>Travaux à faire :</strong>
                    <br/><br/>Analyser les marges brutes sur matières et/ou marchandises.</label><br/><br/><br/><br/>
                <label><strong>Documents et infos à obtenir</strong></label><br/><br/>
                <label><strong>.</strong>Compte de résultat par fonction</label><br/><br/><br/><br/>
                <label><strong>Question 1 :</strong></label><br/><br/>
                <label>A-t-on calculé les marges brutes ?</label><br/><br/><br/><br/>
                <label><strong>Question 2 :</strong></label><br/><br/>
                <label>Les a-t-on analysé ?</label><br/><br/><br/><br/>
                <label><strong>Feuille de travail :</strong></label><label id="revue" style="cursor:pointer;color:red;">
                    &nbsp;Analyse de la marge brute</label>
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
            <div id="contenue_question" style="overflow:auto;height:410px;">
                <div id="contenue_rdc" <?php
                if (@$_GET["coherence_visible"] != 'OK')
                    print 'style="display:none;"'
                ?> >
                    <label><strong>Question 1 :</strong></label><br/>
                    <label>A-t-on calculé les marges brutes ?</label>
                    <select id="qcm1" onchange="choixqcm1()">
                        <option value=""></option>
                        <option value="oui" <?php if ($qcm1 == "oui") echo 'selected'; ?> >Oui</option>
                        <option value="N/A" <?php if ($qcm1 == "N/A") echo 'selected'; ?> >N/A</option>
                        <option value="non" <?php if ($qcm1 == "non") echo 'selected'; ?> >Non</option>
                    </select><br/>
                    <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                    <textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1; ?></textarea><br/>
                    <label><strong>Question 2 :</strong></label><br/>
                    <label>Les a-t-on analysé ?</label>
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
<div id="progressbarF4"
     style="width:300px;height:60px;position:absolute;top:350px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
    <center><img src="img/progressbar.gif"/><br/>Veuillez patienter s'il vous plaît</center>
</div>
<div id="erreurSaisie4"
     style="width:300px;height:60px;position:absolute;top:350px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
    <center>Veuillez resaisir les données s'il vous plaît<br/>
        <input type="Button" value="Ok" id="resaisirF4" class="bouton"/>
    </center>
</div>
</body>
</html>
