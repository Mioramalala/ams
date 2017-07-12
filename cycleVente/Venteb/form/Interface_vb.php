<?php
@session_start();
$mission_id = @$_SESSION['idMission'];

include $_SERVER["DOCUMENT_ROOT"] . '/connexion.php';

$sql = 'SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID=' . $mission_id;

$verif = $bdd->query($sql);
$res = $verif->fetch();
$validVenteB = $res["nb"];
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />
<script language="javascript">
    var quetion_vb;
// Droit cycle by Tolotra
// Page : RSCI -> Cycle ventes
// Tâche : Revue Cotrôles ventes, numéro 37
    $.ajax({
        type: 'POST',
        url: 'droitCycle.php',
        data: {task_id: 37},
        success: function (e) {
            var result = 0 === Number(e);
            $("#Int_vb_Continuer").attr('disabled', result);
            $("#Int_vb_Synthese").attr('disabled', result);
        }
    });
    $(function () {

<?php
//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
if ($validVenteB == 1) {
    ?>
            $('#contvb textarea').attr('disabled', true);
            $('#contvb :input[type=radio]').attr('disabled', true);
            $('#contvb #Synthese_vb_Terminer').attr('disabled', true);
    <?php
}
//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
?>

        // $("#boo").draggable({
        //containment: $("#contenant").val(),
        // scroll: false
        // });
        // Bouton retour menu achat
        $('#int_vb_Retour').click(function () {
            $('#message_fermeture_vb').show();
            $('#fancybox_vb').show();
        });
        //Con$tinuer la question
        $('#Int_vb_Continuer').click(function () {
            mission_id = document.getElementById("txt_mission_id_vb").value;
            $.ajax({
                type: 'POST',
                url: 'cycleVente/Venteb/php/aff_quest_fin_vb.php',
                data: {mission_id: mission_id},
                success: function (e) {

                    quetion_vb = "#Question_vb_" + e;

                    $(quetion_vb).fadeIn(500);
                    vb = e;
                    $.ajax({
                        type: 'POST',
                        url: 'cycleVente/Venteb/php/getRepContinuer.php',
                        data: {mission_id: mission_id, questId: e, cycleId: 26},
                        success: function (e1) {
                            eo = "" + e1 + "";
                            doc = eo.split(',');
                            cpt = 1;
                            for (i = 318; i < 334; i++) {
                                if (i == vb) {
                                    vbId = "vb_" + cpt;
                                    vbIdCom = "vb" + cpt;
                                    afficheReponseQuest(vbId, vbIdCom);
                                    break;
                                }
                                cpt++;
                            }

                        }
                    });
                    // }
                    $('#dv_table_vb').show();
                    $('#lb_veuillez_aff_vb').hide();
                    $('#fancybox_vb').show();
                }
            });
        });
        //la synthèse de vb
        $('#Int_vb_Synthese').click(function () {
            mission_id = document.getElementById("txt_mission_id_vb").value;

            // se rediriger vers calcul score
            $.ajax({
                type: 'POST',
                url: 'cycleVente/Venteb/php/select_score_vb.php',
                data: {mission_id: mission_id},
                success: function (e) {
                    $("#echo_score_vb").html(e);
                }
            });

            $.ajax({
                type: 'POST',
                url: 'cycleVente/Venteb/php/cpt_vb.php',
                data: {mission_id: mission_id},
                success: function (e) {
                    if (e == 17) {
                        $.ajax({
                            type: 'POST',
                            url: 'cycleVente/Venteb/php/getSynth.php',
                            data: {mission_id: mission_id, cycleId: 26},
                            success: function (e) {
                                eo = "" + e + "";
                                doc = eo.split(',');
                                document.getElementById("rd_Synthese_vb_Faible").checked = false;
                                document.getElementById("rd_Synthese_vb_Moyen").checked = false;
                                document.getElementById("rd_Synthese_vb_Eleve").checked = false;
                                document.getElementById("txt_Synthese_vb").value = doc[0];
                                if (doc[1] == 'faible') {
                                    document.getElementById("rd_Synthese_vb_Faible").checked = true;
                                } else if (doc[1] == 'moyen') {
                                    document.getElementById("rd_Synthese_vb_Moyen").checked = true;
                                } else if (doc[1] == 'eleve') {
                                    document.getElementById("rd_Synthese_vb_Eleve").checked = true;
                                }
                            }
                        });
                        $('#Int_Synthese_vb').show();
                        $('#fancybox_vb').show();
                    } else {
                        $('#fancybox_vb').show();
                        $('#mess_vide_obj_vb').show();
                    }
                }
            });
        });
    });
    function afficheReponseQuest(vbId, vbIdCom) {
        document.getElementById("rad_Question_Oui_" + vbId).checked = false;
        document.getElementById("rad_Question_NA_" + vbId).checked = false;
        document.getElementById("rad_Question_Non_" + vbId).checked = false;
        if (doc[0] == 0) {
            document.getElementById("commentaire_Question_" + vbIdCom).value = "";
        } else
            document.getElementById("commentaire_Question_" + vbIdCom).value = doc[0];
        if (doc[1] == 'OUI') {
            document.getElementById("rad_Question_Oui_" + vbId).checked = true;
        } else if (doc[1] == 'N/A') {
            document.getElementById("rad_Question_NA_" + vbId).checked = true;
        } else if (doc[1] == 'NON') {
            document.getElementById("rad_Question_Non_" + vbId).checked = true;
        }
    }
</script>

<div id="int_vb">



    <label class="lb_veuillez" id="lb_veuillez_aff_vb"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label>
    <br />
    <input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_vb" style="display:none;" />
    <div id="Interface_Question_vb"><?php include 'cycleVente/Venteb/load/load_quest_vb.php'; ?></div>
    <div id="dv_table_vb" style="float:left;display:none;width:80%;">
        <table class="label" id="lb_vb">
            <tr>
                <td width="60%">Question</td>
                <td width="10%">Commentaire</td>
            </tr>
        </table>
    </div>
    <div id="frm_tab_res_vb"></div>
    <div id="Int_Droite_vb">
        <input type="button" class="bouton" value="Retour" id="int_vb_Retour" /><br />
        <input type="button" class="bouton" value="Continuer" id="Int_vb_Continuer" /><br />
        <input type="button" class="bouton" value="Synthèse" id="Int_vb_Synthese" /><br />
        <span class="label">
            Pour modifier la réponse à une question, veuillez cliquer sur la liste		
        </span>

    </div>
    <!--**********************************Interface du fancybox****************************-->
    <div id="fancybox_vb"></div>
    <!--***********************************************************************************-->
    <!--div id="int_Bouton_Interface_B" align="center">
    
    </div-->
    <div id="Question_vb_318" data-options="handle:'#dragg_318'" align="center">
        <div id="dragg_318" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°01/17
                        <input type="button" style="width:10px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:220px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_1.php'; ?></div>
    <div id="Question_vb_319" data-options="handle:'#dragg_319'" align="center">
        <div id="dragg_319" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°02/17
                        <input type="button" style="width:20px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:210px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_2.php'; ?></div>
    <div id="Question_vb_320" data-options="handle:'#dragg_320'" align="center">
        <div id="dragg_320" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°03/17
                        <input type="button" style="width:30px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:200px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_3.php'; ?></div>
    <div id="Question_vb_321" data-options="handle:'#dragg_321'" align="center">
        <div id="dragg_321" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°04/17
                        <input type="button" style="width:40px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:190px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_4.php'; ?></div>
    <div id="Question_vb_322" data-options="handle:'#dragg_322'" align="center">
        <div id="dragg_322" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°05/17
                        <input type="button" style="width:50px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:180px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_5.php'; ?></div>
    <div id="Question_vb_323" data-options="handle:'#dragg_323'" align="center">
        <div id="dragg_323" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°06/17
                        <input type="button" style="width:60px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:170px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_6.php'; ?></div>
    <div id="Question_vb_324" data-options="handle:'#dragg_324'" align="center">
        <div id="dragg_324" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°07/17
                        <input type="button" style="width:70px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:160px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_7.php'; ?></div>
    <div id="Question_vb_325" data-options="handle:'#dragg_325'" align="center">
        <div id="dragg_325" >
            <table width="500">
                <tr>
                    <td class="td_Titre_Question" align="center">QUESTION N°08/17
                        <input type="button" style="width:80px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:150px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_8.php'; ?></div>
    <div id="Question_vb_326" data-options="handle:'#dragg_326'" align="center">
        <div id="dragg_326" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°09/17
                        <input type="button" style="width:90px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:140px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_9.php'; ?></div>
    <div id="Question_vb_327" data-options="handle:'#dragg_327'" align="center">
        <div id="dragg_327" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°10/17
                        <input type="button" style="width:100px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:130px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_10.php'; ?></div>
    <div id="Question_vb_328" data-options="handle:'#dragg_328'" align="center">
        <div id="dragg_328" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°11/17
                        <input type="button" style="width:110px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:120px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_11.php'; ?></div>
    <div id="Question_vb_329" data-options="handle:'#dragg_329'" align="center">
        <div id="dragg_329" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°12/17
                        <input type="button" style="width:120px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:110px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_12.php'; ?></div>
    <div id="Question_vb_330" data-options="handle:'#dragg_330'" align="center">
        <div id="dragg_330" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°13/17
                        <input type="button" style="width:130px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:100px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_13.php'; ?></div>
    <div id="Question_vb_331" data-options="handle:'#dragg_331'" align="center">
        <div id="dragg_331" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°14/17
                        <input type="button" style="width:140px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:90px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_14.php'; ?></div>
    <div id="Question_vb_332" data-options="handle:'#dragg_332'" align="center">
        <div id="dragg_332" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°15/17
                        <input type="button" style="width:150px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:80px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_15.php'; ?></div>
    <div id="Question_vb_333" data-options="handle:'#dragg_333'" align="center">
        <div id="dragg_333" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°16/17
                        <input type="button" style="width:160px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:70px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_16.php'; ?></div>
    <div id="Question_vb_334" data-options="handle:'#dragg_334'" align="center">
        <div id="dragg_334" >
            <table width="500">
                <tr style="height:10px">
                    <td class="td_Titre_Question" align="center">QUESTION N°17/17
                        <input type="button" style="width:180px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:50px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table></div>
<?php include 'Interface_Question_vb_17.php'; ?></div>

    <!--****************************************Interface B Synthese conclusion********************************-->
    <div id="Int_Synthese_vb" data-options="handle:'#dragg_vb'" align="center">
        <div id="dragg_vb" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleVente/Venteb/form/Interface_vb_Synthese.php'; ?></div>
    <!--*******************************************************************************************************-->

    <!--***********************************Message de slide de la question terminer****************************-->
    <div id="message_Slide_terminer_Question_vb"><?php include 'cycleVente/Venteb/sms/Message slide question terminer vb.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de la page B***********************************-->
    <div id="message_fermeture_vb"><?php include 'cycleVente/Venteb/sms/messRetvb.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--**********************************Interface de terminaison de question 22 A****************************-->
    <div id="message_Terminer_question_vb"><?php include 'cycleVente/Venteb/sms/Message terminer question vb.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--*************************************Message de terminaison de la synthese B***************************-->
    <div id="message_Terminer_Synthese_vb"><?php include 'cycleVente/Venteb/sms/Message terminer synthese vb.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--************************************Message d'enregistrement de la synthese B**************************-->
    <div id="message_Synthese_Slide_vb"><?php include 'cycleVente/Venteb/sms/Message slide vb Synthese.php'; ?></div>
    <!--*******************************************************************************************************-->


    <!--*************************************Message vide de synthese******************************************-->
    <div id="mess_vide_synthese_vb"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_vide_synth_vb.php'; ?></div>
    <!--*******************************************************************************************************-->


    <!--**********************************Interface de fermeture de synthese B*********************************-->
    <div id="message_Donnees_Perdu_vb"><?php include 'cycleVente/Venteb/sms/Message donnees perdues vb.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb"><?php include 'cycleVente/Venteb/sms/Message annulation question vb.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb2"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb2.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb3"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb3.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb4"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb4.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb5"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb5.php'; ?></div>
    <!--*******************************************************************************************************-->


    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb6"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb6.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb7"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb7.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb8"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb8.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb9"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb9.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb10"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb10.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb11"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb11.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb12"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb12.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb13"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb13.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb14"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb14.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb15"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb15.php'; ?></div>
    <!--*******************************************************************************************************-->
    <div id="message_fermeture_question_vb16"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb16.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message de fermeture de toutes les question*************************-->
    <div id="message_fermeture_question_vb17"><?php include 'cycleVente/Venteb/sms/Message_enregistre_question_vb17.php'; ?></div>
    <!--*******************************************************************************************************-->

    <!--**********************************Message d'ouverture de l'objectif B**********************************-->
    <!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php'; ?></div-->
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide***********************************************-->
    <div id="mess_quest_vide_vb1"><?php include 'cycleVente/Venteb/sms/Message_question_vide.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb2"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb2.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb3"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb3.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb4"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb4.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb5"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb5.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb6"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb6.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb7"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb7.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb8"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb8.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb9"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb9.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb10"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb10.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb11"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb11.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb12"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb12.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb13"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb13.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb14"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb14.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb15"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb15.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb16"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb16.php'; ?></div>
    <!--*******************************************************************************************************-->
    <!--***********************************Message question vide B2***********************************************-->
    <div id="mess_quest_vide_vb17"><?php include 'cycleVente/Venteb/sms/sms_empty/Mess_quest_vide_vb17.php'; ?></div>

    <!--*************************************Message vide resultat b*******************************************-->
    <div id="mess_vide_obj_vb"><?php include 'cycleVente/Venteb/sms/mess_vid_aud_vb.php'; ?></div>
    <!--*******************************************************************************************************-->

    <!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
    <div id="mess_vide_obj_vb"><?php include 'cycleVente/Venteb/sms/mess_vid_aud_vb.php'; ?></div>
    <!--*******************************************************************************************************-->

</div>