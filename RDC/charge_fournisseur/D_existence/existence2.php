<?php

@session_start();

$mission_id = @$_SESSION['idMission'];

include '../../../connexion.php';
//include '../../../test_acces.php';

$reponse1 = $bdd->query('select RDC_COMMENTAIRE, RDC_REPONSE from tab_rdc where RDC_CYCLE="charge_fournisseur" and RDC_OBJECTIF="D"
 and MISSION_ID=' . $mission_id . ' and RDC_RANG=3');

$donnees = $reponse1->fetch();

$commentaire1 = $donnees['RDC_COMMENTAIRE'];
$qcm1 = $donnees['RDC_REPONSE'];


////////////////////////////test data ajax over php///////////////////////////////
$sql1 = 'select compt_cf_f8, libelle_cf_f8, solde_cf_f8, date_circ_cf_f8, date_rep_cf_f8,
		solde_circ_cf_f8,ecart_cf_f8,observation_cf_f8 from tab_rdc_cf_f8 where 
		id_mission=' . @$_SESSION['idMission'];
$reponseTest = $bdd->query($sql1);
$donneesTest = $reponseTest->fetch();

if (isset($donneesTest["compt_cf_f8"])) {
    $renvoi = "update_f8.php";
} else {
    $renvoi = "post_donne.php";
}

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
                $("#comment1").attr('disabled',result);
            }
        }
    );
    function calcul_ecart(idtr,cpt) {

        var solde = $('#td_sold' + cpt).html();
        var solde_circ = $('#SoldCirc' + cpt).val();

        ecartAffiche = parseInt(solde) - parseInt(solde_circ);
        $('#Ecart' + cpt).val(ecartAffiche);

    }
    $(function () {
        $('#bt_precedent').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/D_existence/existence1.php");
        });
        $('#bt_retour_1').click(function () {
            $("#contenue").load("RDC/charge_fournisseur/index.php");
        });
        $('#revue').click(function () {
            $('#bt_retour_1').hide();
            $('#contenue_rdc').show();
            $('#contenue_question').show();
            $('#contenue_travail').load("RDC/charge_fournisseur/D_existence/table_F8.php");
        });

        $('#bt_suivant').click(function () {
            var total_Id = $('#compId').html();
            i = 1;
            for (i = 1; i <= total_Id; i++) {
                var compt = $('#td_comp' + i).html();
                var lib = $('#td_lib' + i).html();
                var solde = $('#td_sold' + i).html();
                var dateCirc = $('#dateCirc' + i).val();
                var dateRep = $('#dateRep' + i).val();
                var solde_circ = $('#SoldCirc' + i).val();
                var obs = $('#observation' + i).val();
                ecart = parseInt(solde) - parseInt(solde_circ);

                $.ajax({
                    type: 'post',
                    url: 'RDC/charge_fournisseur/D_existence/<?php echo $renvoi;?>',
                    data: {
                        compt: compt,lib: lib,solde: solde,dateCirc: dateCirc,dateRep: dateRep,
                        solde_circ: solde_circ,ecart: ecart,obs: obs
                    },
                    success: function (e) {

                    }
                });

            }

            var reponse1 = $('#qcm1').val();
            var commentaire1 = $('#comment1').val();

            if ((reponse1 == "non" && commentaire1 == "") || reponse1 == "") {
                alert('Des réponses obligatoires ont été omises!');
            }
            else {
                add_Data(reponse1,commentaire1,'charge_fournisseur','D',3,<?php echo $mission_id; ?>);
                $("#contenue").load("RDC/charge_fournisseur/D_existence/existence3.php");
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

</script>
<body>
<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
    <tr>
        <td class="grand_Titre">
            <center><label>D- EXISTENCE DES SOLDES</label></center>
        </td>
    </tr>
</table>
<div style="overflow:auto;">
    <table width="100%" height="470">
        <tr>
            <td width="72.5%">
                <div id="contenue_travail" style="overflow:auto;height:450px;width:1000px;">
                    <label><strong>Travaux à faire :</strong>
                        <br/><br/>Justifier les soldes des comptes de tiers.</label><br/><br/>
                    <label><strong>Documents et infos à obtenir</strong></label><br/><br/><br/><br/>
                    <label><strong>.</strong>Circularisations des comptes fournisseurs</label><br/><br/><br/>
                    <label><strong>.</strong>Bilan et notes annexes</label><br/><br/><br/>
                    <label><strong>.</strong>Détails des soldes des postes "Fournisseurs et comptes rattachées", "Autres
                        dettes", "Fournisseurs débiteurs"</label><br/><br/><br/><br/>
                    <label><strong>Question 1 :</strong></label><br/>
                    <label>Les résultats de la circularisation correspondent-ils avec les soldes comptables ? Si non,
                        les écarts sont-ils justifiés ?</label><br/><br/><br/><br/>
                    <label><strong>Feuille de travail :</strong></label><label id="revue"
                                                                               style="cursor:pointer;color:red;">
                        &nbsp;Suivi de la circularisation des comptes forunisseurs</label>
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
                        if (@$_GET["existence_visible"] != 'OK')
                            print 'style="display:none;"'
                        ?> >
                        <label><strong>Question 1 :</strong></label><br/>
                        <label>Les résultats de la circularisation correspondent-ils avec les soldes comptables ? Si
                            non, les écarts sont-ils justifiés ?</label>
                        <select id="qcm1" onchange="choixqcm1()">
                            <option value=""></option>
                            <option value="oui" <?php if ($qcm1 == "oui") echo 'selected'; ?> >Oui</option>
                            <option value="N/A" <?php if ($qcm1 == "N/A") echo 'selected'; ?> >N/A</option>
                            <option value="non" <?php if ($qcm1 == "non") echo 'selected'; ?> >Non</option>
                        </select><br/>
                        <label><strong>Commentaires (obligatoire si réponse négative)</strong></label><br/>
                        <textarea id="comment1" cols="35" rows="10"><?php echo $commentaire1; ?></textarea><br/>

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
