<?php
include '../../../connexion.php';

$reponse = $bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE MISSION_ID=' . $mission_id . ' AND CYCLE_ACHAT_ID=6');

$donnees = $reponse->fetch();

$conclusionIdf = $donnees['CONCLUSION_COMMENTAIRE'];




$reponse = $bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE MISSION_ID=' . $mission_id . ' AND CYCLE_ACHAT_ID=6');
$donnees = $reponse->fetch();
$nb = $donnees['nb'];
?>



<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="cycleAchat/cycle_achat_f/css/div.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_f/css/div_f.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_f/css/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_f/css/div_fermer_quest_objectif_f.css" rel="stylesheet" type="text/css" />

<script>


    $(function ()
    {



<?php
//OBJ CYCLE DEJA VALIDER
if ($nb == 1) {
    ?>
            $('textarea').attr('disabled', true);
            $(':input[type=radio]').attr('disabled', true);
            $('#Synthese_f_Terminer').attr('disabled', true);
    <?php
}
?>


        // Droit cycle by Tolotra
        // Page : RSCI -> Cycle achat
        // Tâche : Revue Contrôles Achats, numéro 1
        $.ajax({
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 1},
            success: function (e) {
                $("#Int_f_Continuer").attr('disabled', 0 === Number(e));
                $("#Int_f_Synthese").attr('disabled', 0 === Number(e));

            }
        });

        // Bouton retour menu achat
        $('#int_f_Retour').click(function () {
            $('#message_fermeture_f').show();
            $('#fancybox_f').show();
        });
        //Con$tinuer la question
        $('#Int_f_Continuer').click(function () {
            mission_id = document.getElementById("txt_mission_id_f").value;
            $.ajax({
                type: 'POST',
                url: 'cycleAchat/cycle_achat_f/php/aff_quest_fin_f.php',
                data: {mission_id: mission_id},
                success: function (e) {
                    if (e == 69) {
                        $('#message_Terminer_question_f').show();
                    } else if (e == 1) {
                        $('#Question_f_55').fadeIn(500);
                    } else {
                        quetion_f = "#Question_f_" + e;
                        $(quetion_f).fadeIn(500);
                    }
                    $('#dv_table_f').show();
                    $('#lb_veuillez_aff_f').hide();
                    $('#fancybox_f').show();
                }
            });
        });
        //la synthèse de f
        $('#Int_f_Synthese').click(function () {
            mission_id = document.getElementById("txt_mission_id_f").value;
            // se rediriger vers calcul score
            $.ajax({
                type: 'POST',
                url: 'cycleAchat/cycle_achat_f/php/select_score_f.php',
                data: {mission_id: mission_id},
                success: function (e) {
                    $("#echo_score_f").html(e);
                }
            });
            $.ajax({
                type: 'POST',
                url: 'cycleAchat/cycle_achat_f/php/cpt_f.php',
                data: {mission_id: mission_id},
                success: function (e) {
                    if (e == 15) {
                        $.ajax({
                            type: 'POST',
                            url: 'cycleAchat/cycle_achat_c/php/getSynth.php',
                            data: {mission_id: mission_id, cycleId: 6},
                            success: function (e) {
                                eo = "" + e + "";
                                doc = eo.split('*');
                                document.getElementById("txt_Synthese_f").value = doc[0];
                                if (doc[1] == 'faible') {
                                    document.getElementById("rd_Synthese_f_Faible").checked = true;
                                } else if (doc[1] == 'moyen') {
                                    document.getElementById("rd_Synthese_f_Moyen").checked = true;
                                } else if (doc[1] == 'eleve') {
                                    document.getElementById("rd_Synthese_f_Eleve").checked = true;
                                }
                            }
                        });
                        $('#Int_Synthese_f').show();
                        $('#fancybox_f').show();
                    } else {
                        $('#fancybox_f').show();
                        $('#mess_vide_obj_f').show();
                    }
                }
            });
        });
    });
    function afficheReponseQuestacf(imbId, imbIdCom) {
        document.getElementById("rad_Question_Oui_" + imbId).checked = false;
        document.getElementById("rad_Question_NA_" + imbId).checked = false;
        document.getElementById("rad_Question_Non_" + imbId).checked = false;
        if (doc[0] == 0) {
            document.getElementById("commentaire_Question_" + imbIdCom).value = "";
        } else
            document.getElementById("commentaire_Question_" + imbIdCom).value = doc[0];
        if (doc[1] == 'OUI') {
            document.getElementById("rad_Question_Oui_" + imbId).checked = true;
        } else if (doc[1] == 'N/A') {
            document.getElementById("rad_Question_NA_" + imbId).checked = true;
        } else if (doc[1] == 'NON') {
            document.getElementById("rad_Question_Non_" + imbId).checked = true;
        }
    }
</script>

<div id="int_f"><label class="lb_veuillez" id="lb_veuillez_aff_f"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
    <div id="Interface_Question_f"><?php include '../../../cycleAchat/cycle_achat_f/load/load_quest_f.php'; ?></div>
    <div id="dv_table_f" style="float:left;display:none;width:80%;">
        <table class="label" id="lb_f">
            <tr>
                <td width="60%">Question</td>
                <td width="10%">Commentaire</td>
            </tr>
        </table>
    </div>
    <div id="frm_tab_res_f"><?php include '../../../cycleAchat/cycle_achat_f/load/load_rep_f.php'; ?></div>
    <input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_f" style="display:none;" />
    <div id="Int_Droite_f">
        <input type="button" class="bouton" value="Retour" id="int_f_Retour" /><br />
        <input type="button" class="bouton" value="Continuer" id="Int_f_Continuer" /><br />
        <input type="button" class="bouton" value="Synthèse" id="Int_f_Synthese" /><br />
        <span class="label">
            Pour modifier la réponse à une question, veuillez cliquer sur la liste		
        </span>

    </div>
    <!--**********************************Interface du fancybox****************************-->
    <div id="fancybox_f"></div>
    <!--***********************************************************************************-->
    <!--div id="int_Bouton_Interface_B" align="center">

    </div-->
    <div id="Question_f_55" data-options="handle:'#dragg_55'" align="center">
        <div id="dragg_55" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°01/15
                        <input type="button" style="width:10px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:140px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_1.php'; ?></div>
    <div id="Question_f_56" data-options="handle:'#dragg_56'" align="center">
        <div id="dragg_56" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°02/15
                        <input type="button" style="width:20px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:130px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_2.php'; ?></div>
    <div id="Question_f_57" data-options="handle:'#dragg_57'" align="center">
        <div id="dragg_57" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°03/15
                        <input type="button" style="width:30px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:120px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_3.php'; ?></div>
    <div id="Question_f_58" data-options="handle:'#dragg_58'" align="center">
        <div id="dragg_58" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°04/15
                        <input type="button" style="width:40px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:110px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_4.php'; ?></div>
    <div id="Question_f_59" data-options="handle:'#dragg_59'" align="center">
        <div id="dragg_59" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°05/15
                        <input type="button" style="width:50px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:100px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_5.php'; ?></div>
    <div id="Question_f_60" data-options="handle:'#dragg_60'" align="center">
        <div id="dragg_60" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°06/15
                        <input type="button" style="width:60px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:90px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_6.php'; ?></div>
    <div id="Question_f_61" data-options="handle:'#dragg_61'" align="center">
        <div id="dragg_61" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°07/15
                        <input type="button" style="width:70px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:80px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_7.php'; ?></div>
    <div id="Question_f_62" data-options="handle:'#dragg_62'" align="center">
        <div id="dragg_62" >
            <table width="500">
                <tr>
                    <td class="td_Titre_Question" align="center">QUESTION N°08/15
                        <input type="button" style="width:80px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:70px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_8.php'; ?></div>
    <div id="Question_f_63" data-options="handle:'#dragg_63'" align="center">
        <div id="dragg_63" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°09/15
                        <input type="button" style="width:90px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:60px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_9.php'; ?></div>
    <div id="Question_f_64" data-options="handle:'#dragg_64'" align="center">
        <div id="dragg_64" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°10/15
                        <input type="button" style="width:100px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:50px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_10.php'; ?></div>
    <div id="Question_f_65" data-options="handle:'#dragg_65'" align="center">
        <div id="dragg_65" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°11/15
                        <input type="button" style="width:110px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:40px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_11.php'; ?></div>
    <div id="Question_f_66" data-options="handle:'#dragg_66'" align="center">
        <div id="dragg_66" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°12/15
                        <input type="button" style="width:120px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:30px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_12.php'; ?></div>
    <div id="Question_f_67" data-options="handle:'#dragg_67'" align="center">
        <div id="dragg_67" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°13/15
                        <input type="button" style="width:130px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:20px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_13.php'; ?></div>
    <div id="Question_f_68" data-options="handle:'#dragg_68'" align="center">
        <div id="dragg_68" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°14/15
                        <input type="button" style="width:140px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:10px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_14.php'; ?></div>
    <div id="Question_f_69" data-options="handle:'#dragg_69'" align="center">
        <div id="dragg_69" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°15/15
                        <input type="button" style="width:150px;height:15px;background-color:#ccc" />
                        <!--input type="button" style="width:30px;height:15px;background-color:#efefef" /-->
                    </td>
                </tr>
            </table></div>
        <?php include 'Interface_Question_f_15.php'; ?></div>
    <!--****************************************Interface B Synthese conclusion********************************-->
    <div id="Int_Synthese_f" data-options="handle:'#dragg_f'" align="center">
        <div id="dragg_f" class="td_Titre_Question"><br />SYNTHESE</div>
        <?php include '../../../cycleAchat/cycle_achat_f/form/Interface_f_Synthese.php'; ?></div>
    <!--*******************************************************************************************************-->





    <!--***********************************Message de slide de la question terminer****************************-->
    <div id="message_Slide_terminer_Question_f"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message slide question terminer f.php' ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de la page B***********************************-->
    <div id="message_fermeture_f"><?php include '../../../cycleAchat/cycle_achat_f/sms/messRetf.php' ?></div>
    <!--*******************************************************************************************************-->
    <!--**********************************Interface de terminaison de question 22 A****************************-->
    <div id="message_Terminer_question_f"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message terminer question f.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--*************************************Message de terminaison de la synthese B***************************-->
    <div id="message_Terminer_Synthese_f"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message terminer synthese f.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--************************************Message d'enregistrement de la synthese B**************************-->
    <div id="message_Synthese_Slide_f"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message slide f Synthese.php'; ?></div>
    <!--*******************************************************************************************************-->


    <!--*************************************Message vide de synthese******************************************-->
    <div id="mess_vide_synthese_f"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_vide_synth_f.php'; ?></div>
    <!--*******************************************************************************************************-->


    <!--**********************************Interface de fermeture de synthese B*********************************-->
    <div id="message_Donnees_Perdu_f"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message donnees perdues f.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message annulation question f.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f2"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f2.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f3"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f3.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f4"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f4.php'; ?></div>
    <!--*******************************************************************************************************-->



    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f6"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f6.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f7"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f7.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f8"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f8.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f9"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f9.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f10"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f10.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f11"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f11.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f12"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f12.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f13"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f13.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f14"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f14.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f15"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f15.php'; ?></div>
    <!--*******************************************************************************************************-->


    <!--**********************************Message d'ouverture de l'objectif B**********************************-->
    <!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';  ?></div-->
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide***********************************************-->
    <div id="mess_quest_vide_f1"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_question_vide.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f2"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f2.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f3"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f3.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f4"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f4.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f5"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f5.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f6"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f6.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f7"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f7.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f8"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f8.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f9"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f9.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f10"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f10.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f11"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f11.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f12"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f12.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f13"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f13.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f14"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f14.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_f15"><?php include '../../../cycleAchat/cycle_achat_f/sms/sms_empty/Mess_quest_vide_f15.php'; ?></div>
    <!--*******************************************************************************************************-->


    <!--*************************************Message vide resultat b*******************************************-->
    <div id="mess_vide_obj_f"><?php include '../../../cycleAchat/cycle_achat_f/sms/mess_vid_aud_f.php'; ?></div>
    <!--*******************************************************************************************************-->



    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_f5"><?php include '../../../cycleAchat/cycle_achat_f/sms/Message_enregistre_question_f5.php'; ?></div>
    <!--*******************************************************************************************************-->



</div>

