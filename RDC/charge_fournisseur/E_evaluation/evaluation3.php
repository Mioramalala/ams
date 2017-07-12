<?php
@session_start();
$mission_id = @$_SESSION['idMission'];
include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and MISSION_ID=' . $mission_id . ' and RDC_RANG=5');
$donnees = $reponse1->fetch();
$commentaire1 = $donnees['RDC_COMMENTAIRE'];
$qcm1 = $donnees['RDC_REPONSE'];

$reponse2 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and MISSION_ID=' . $mission_id . ' and RDC_RANG=6');
$donnees2 = $reponse2->fetch();
$commentaire2 = $donnees2['RDC_COMMENTAIRE'];
$qcm2 = $donnees2['RDC_REPONSE'];

$reponse3 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="E" and MISSION_ID=' . $mission_id . ' and RDC_RANG=7');
$donnees3 = $reponse3->fetch();
$commentaire3 = $donnees3['RDC_COMMENTAIRE'];
$qcm3 = $donnees3['RDC_REPONSE'];
?>

<html>
<head>
    <link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
    <link rel="stylesheet" href="../RDC/charge_fournisseur/E_evaluation/table_F9.css">
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
                $("#qcm3").attr('disabled',result);
                $("#comment1").attr('disabled',result);
                $("#comment2").attr('disabled',result);
                $("#comment3").attr('disabled',result);
            }
        }
    );
    $(function () {
        $('#bt_precedent').click(function () {
            $('#contenue_question').hide();
            $('#contenue_aprouve').show();

            var tabNum = [];
            var nbrLigneTab = parseInt($('#tabPostChecked').attr('alt'));

            for (var i = 1; i <= nbrLigneTab; i++) {
                var numNum = $('#compte' + i).attr('alt');

                tabNum.push(numNum);
            }

            $.post("RDC/charge_fournisseur/E_evaluation/table_F9.php")
                .done(function (data) {
                    $('#contenue_travail').html(data);
                    for (var i = 1; i <= nbrLigneTab; i++) {
                        $('input#check' + tabNum[i - 1]).attr('checked','checked');
                    }
                    stopWaiting();
                });
        });
        $('#bt_retour_1').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/E_evaluation/evaluation2.php");
        });
        $('#bt_retour_a').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/E_evaluation/evaluation3.php");
        });
        $('#btn_approuver').click(function () {
            waiting();
            var compteur = 0;
            var tabCompte = [];
            var tabLibelle = [];
            var tabNum = [];//Tableau contenant le numero des lignes cochées
            var nbrLigneTab = parseInt($('#tabPostChecked').attr('alt'));

            for (var i = 1; i <= nbrLigneTab; i++) {
                var testChecked = $('#check' + i).is(':checked');

                if (testChecked) {
                    compteur++; // compte le nombre de check
                    var numCompte = $('#compte' + i).text();
                    var numLibelle = $('#libelle' + i).text();

                    tabCompte.push(numCompte);
                    tabNum.push('' + i);
                }
            }
            //Envoi du tableau
            $.post("RDC/charge_fournisseur/E_evaluation/requetCheckF9.php",{'tabCompte': tabCompte,'tabNum': tabNum})
                .done(function (data) {
                    $('#contenue_aprouve').hide();
                    $('#contenue_question').show();
                    $('#contenue_travail').html(data);
                    stopWaiting();
                });
        });
        $('#revue').click(function () {
            $('#contenue_rdc').show();
            $('#bt_retour_1').hide();
            $('#contenue_aprouve').show();
            $('#contenue_travail').load("RDC/charge_fournisseur/E_evaluation/table_F9.php");
        });

        $('#bt_suivant').click(function () {
            var reponse1 = $('#qcm1').val();
            var commentaire1 = $('#comment1').val();
            var reponse2 = $('#qcm2').val();
            var commentaire2 = $('#comment2').val();
            var reponse3 = $('#qcm3').val();
            var commentaire3 = $('#comment3').val();
            var nbrLigneTab = parseInt($('#tabPostChecked').attr('alt'));

            if ((reponse1 == "non" && commentaire1 == "") || (reponse2 == "non" && commentaire2 == "") || (reponse3 == "non" && commentaire3 == "") || reponse1 == "" || reponse2 == "" || reponse3 == "") {
                alert('Des réponses obligatoires ont été omises!');
            }
            else {
                add_Data(reponse1,commentaire1,'charge_fournisseur','E',5,<?php echo $mission_id; ?>);
                add_Data(reponse2,commentaire2,'charge_fournisseur','E',6,<?php echo $mission_id; ?>);
                add_Data(reponse3,commentaire3,'charge_fournisseur','E',7,<?php echo $mission_id; ?>);

                for (var i = 1; i <= nbrLigneTab; i++) {
                    var numCompte = $('#compte' + i).text();
                    var obs = $('#obs' + i).val();

                    $.post("RDC/charge_fournisseur/E_evaluation/saveF9.php",{'compte': numCompte,'obs': obs});

                }
                $("#contenue").load("RDC/charge_fournisseur/index.php");
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
            url: 'RDC/charge_fournisseur/E_evaluation/add_Data.php',
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
            <center><label style="font-weight:bold;">E - EVALUATION DES SOLDES : Partie III</label></center>
        </td>
    </tr>
</table>
<div style="overflow:auto;">
    <table width="100%" height="470">
        <tr>
            <td width="72.5%">
                <div id="contenue_travail" style="overflow:auto;height:450px;width:100%;">
                    <label><strong>Travaux à faire :</strong></label>
                    <p style="margin-left:15px;margin-top:5px;">Recenser les dettes libellés en devises et vérifier leur
                        correcte réévaluation à la clôture.</p>
                    <label><strong>Documents et infos à obtenir</strong></label>
                    <ul>
                        <li>Etat récapitulatif des dettes en devises permettant de calculer les gains ou pertes de
                            change
                        </li>
                        <li>GL des fournisseurs libellés en devises</li>
                        <li>Taux devise/monnaie locale utilisés</li>
                    </ul>
                    <label><strong>Questions :</strong></label>
                    <ul>
                        <li>Tous les fournisseurs en devises ont-ils été réévalués aux taux de clôture ?</li>
                        <li>Les écarts résultant de la réévaluation ont-ils été correctement comptabilisés ?</li>
                        <li>Les taux utilisés correspondent-ils aux taux indiqués par la BCM ou d'autres taux pouvant
                            être admis (rationnels et objectifs et respectant le principe de la permanence des méthodes)
                            ?
                        </li>
                    </ul>
                    <label><strong>Feuille de travail :</strong></label><label id="revue"
                                                                               style="cursor:pointer;color:red;font-weight:bold;">
                        Réevaluation des dettes libellées en devises</label>
                </div>
            </td>
            <td width="27.5%">
                <input type="button" id="bt_retour_1" value="Retour" class="bouton"
                       style="display:block;top:-210px;float:right;position:relative;"/>
                <!--div id="contenue_aprouve" style="overflow:auto;height:450px;display:none;">
                    <input type="button" value="Approuver" id="btn_approuver" class="bouton" style="float:right;" />
                    <input type="button" id="bt_retour_a" value="Retour" class="bouton" style="float:right;" /-->
</div>
<div id="contenue_question" style="margin-top:-24px;overflow:auto;height:400px;float:right;">
    <input type="button" id="bt_suivant" value=">|" class="bouton" style="float:right;"/>
    <input type="button" id="bt_precedent" value="<" class="bouton" style="float:right;"/><br/>
    <div id="contenue_rdc"
        <?php
        if (@$_GET["evaluation_visible"] != 'OK')
            print 'style="display:none;"'
        ?> >
        <label><strong>Question 1 :</strong></label><br/>
        <label>Tous les fournisseurs en devises ont-ils été réévalués aux taux de clôture ? </label>
        <select id="qcm1" onchange="choixqcm1()">
            <option value=""></option>
            <option value="oui" <?php if ($qcm1 == "oui") echo 'selected'; ?> >Oui</option>
            <option value="N/A" <?php if ($qcm1 == "N/A") echo 'selected'; ?> >N/A</option>
            <option value="non" <?php if ($qcm1 == "non") echo 'selected'; ?> >Non</option>
        </select><br/>
        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
        <textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1; ?></textarea><br/>
        <label><strong>Question 2 :</strong></label><br/>
        <label>Les écarts résultant de la réévaluation ont-ils été correctement comptabilisés ?</label>
        <select id="qcm2" onchange="choixqcm2()">
            <option value=""></option>
            <option value="oui" <?php if ($qcm2 == "oui") echo 'selected'; ?> >Oui</option>
            <option value="N/A" <?php if ($qcm2 == "N/A") echo 'selected'; ?> >N/A</option>
            <option value="non" <?php if ($qcm2 == "non") echo 'selected'; ?> >Non</option>
        </select><br/>
        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
        <textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2; ?></textarea><br/>
        <label><strong>Question 3 :</strong></label><br/>
        <label>Les taux utilisés correspondent-ils aux taux indiqués par la BCM ou d'autres taux pouvant être admis
            (rationnels et objectifs et respectant le principe de la permanence des méthodes) ?</label>
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
