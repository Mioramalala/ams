<?php

@session_start();

$mission_id = @$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';
$reponse1 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and MISSION_ID=' . $mission_id . ' and RDC_RANG=1');

$donnees = $reponse1->fetch();

$commentaire1 = $donnees['RDC_COMMENTAIRE'];
$qcm1 = $donnees['RDC_REPONSE'];

$reponse2 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="prod_client" and RDC_OBJECTIF="D" and MISSION_ID=' . $mission_id . ' and RDC_RANG=2');

$donnees2 = $reponse2->fetch();

$commentaire2 = $donnees2['RDC_COMMENTAIRE'];
$qcm2 = $donnees2['RDC_REPONSE'];

?>

<html>
<head>

</head>
<link rel="stylesheet" href="../RDC/prod_client/css.css">
<script>

    (function (window) {
        window.calculerEcart = function (element) {
            var soldeCircularise = Number(element.value);
            var row = element.parentNode.parentNode;
            var solde = row.querySelectorAll('td')[2];
            var ecart = row.querySelector('.ecart');
            var soldeCompt = 0;

            if (solde && solde.innerText !== '') {
                soldeCompt = Number(strRemove(',', solde.innerText));
            }

            var result = (soldeCompt - soldeCircularise);
            if (typeof result === 'number') {
                ecart.value = result.format(2, 3, ',', '.');
            }
        }

        window.strRemove = function (search, subject) {
            if (subject) {
                var escaped = '';
                for (var i = 0, length = subject.length; i < length; i++) {
                    if (subject.charAt(i) !== search) {
                        escaped += subject.charAt(i);
                    }
                }
                return escaped;
            }
            return false;
        }

        Number.prototype.format = function (decimal, digit, separator, point) {
            var re = '\\d(?=(\\d{' + (digit || 3) + '})+' + (decimal > 0 ? '\\D' : '$') + ')',
                num = this.toFixed(Math.max(0, ~~decimal));
            return (point ? num.replace('.', point) : num).replace(new RegExp(re, 'g'), '$&' + (separator || ','));
        };

    })(window);

    $(function () {
        $('#bt_retour_pc').click(function () {
            $("#contenue").load("RDC/prod_client/index.php");
        });

        $('#revue').click(function () {
            $('#contenue_rdc').show();
            $('#bt_suivant').show();
            $('#contenue_rdc').show();
            $('#contenue_travail').load("RDC/prod_client/D_existence/table_G5.php");
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
                add_Data(reponse1, commentaire1, 'prod_client', 'D', 1, <?php echo $mission_id; ?>);
                add_Data(reponse2, commentaire2, 'prod_client', 'D', 2, <?php echo $mission_id; ?>);
                $('#contenue').load("RDC/prod_client/D_existence/existence2.php");
            }
        });

        $('#bt_non').click(function () {
            $("#contenue").load("RDC/prod_client/index.php");
        });

        $('#bt_oui').click(function () {
            alert("ok");
        });
    });
    function add_Data(reponse, commentaire, cycle, objectif, rang, mission_id) {
        $.ajax({
            type: 'POST',
            url: 'RDC/prod_client/D_existence/add_Data.php',
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
    function enregistrerSynthese() {
        var synthese = $('#syntheseG1').val();
        $.ajax({
            type: 'POST',
            url: 'RDC/prod_client/D_existence/addSyntheseRa.php',
            data: {
                synthese: synthese,
                mission_id:<?php echo $mission_id;?>,
                cycle: 'prod_client',
                objectif: 'D',
                reference: 'G1'
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
        <td>
            <center><label class="grand_Titre">D - EXISTENCE DES SOLDES PARTIE :I</label></center>
        </td>
    </tr>
</table>
<div style="overflow:auto;">
    <table width="100%" height="470">
        <tr>
            <td width="72.5%">
                <div id="contenue_travail" style="height:450px;overflow:auto;width:900px;">
                    <label><strong>Travaux à faire :</strong>
                        <br/>Confirmer directement auprès des clients les soldes des comptes dans les livres de la
                        société.</label><br/><br/><br/>

                    <label><strong>Documents et infos à obtenir</strong></label><br/>
                    <label>Tableau récapitulant les résultats des travaux de circularisation.</label><br/><br/><br/>

                    <label><strong>Question 1 :</strong></label><br/>
                    <label>A-t-on effectué des confirmations directes auprès des clients ?</label><br/><br/><br/>

                    <label><strong>Question 2 :</strong></label><br/>
                    <label>Assurez-vous que les résultats de ces confirmations directes ont été
                        exploités?</label><br/><br/><br/>

                    <label><strong>Feuille de travail :</strong></label><label id="revue"
                                                                               style="cursor:pointer;color:red;">Suivi
                        de la circularisation des comptes clients</label>
                </div>
            </td>
            <td width="27.5%">
                <div id="contenue_question" style="overflow;height:450px;">
                    <input type="button" id="bt_suivant" value=">" class="bouton" style="display:none;float:right;"/>
                    <input type="button" id="bt_retour_pc" value="<" class="bouton" style="float:right;"/>

                    <div id="contenue_rdc"
                        <?php
                        if (@$_GET["existence_visible"] != 'OK')
                            print 'style="display:none;"'
                        ?> >
                        <label><strong>Question 1 :</strong></label><br/>
                        <label>A-t-on effectué des confirmations directes auprès des clients ?</label>
                        <select id="qcm1" onchange="choixqcm1()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm1 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="na" <?php if ($qcm1 == "na") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm1 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1; ?></textarea><br/>

                        <label><strong>Question 2 :</strong></label><br/>
                        <label>Assurez-vous que les résultats de ces confirmations directes ont été exploités?</label>
                        <select id="qcm2" onchange="choixqcm2()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm2 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="na" <?php if ($qcm2 == "na") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm2 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment2" cols="35" rows="10"><?php echo $commentaire2; ?></textarea>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div id="boite_retour" style="display:none;top:-18px">
        <table border="1">
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
