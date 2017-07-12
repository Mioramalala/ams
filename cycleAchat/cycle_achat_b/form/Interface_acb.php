<?php
include '../../../connexion.php';
@session_start();
$mission_id = $_SESSION['idMission'];

$reponse2 = $bdd->query('SELECT count(*) as nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=2 AND MISSION_ID=' . $mission_id);
$donnees2 = $reponse2->fetch();
$nb = $donnees2['nb'];
?>



<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



<link rel="stylesheet" type="text/css" href="cycleAchat/cycle_achat_b/css/div.css">

<link rel="stylesheet" type="text/css" href="cycleAchat/cycle_achat_b/css/div_acb.css">

<link rel="stylesheet" type="text/css" href="cycleAchat/cycle_achat_b/css/class.css">

<link rel="stylesheet" type="text/css" href="cycleAchat/cycle_achat_b/css/div_fermer_quest_objectif_acb.css">



<script language="javascript">
    var StID = "";

// Droit cycle by Tolotra
// Page : RSCI -> Cycle achat
// Tâche : Revue Contrôles Achats, numéro 1
    $.ajax({
        type: 'POST',
        url: 'droitCycle.php',
        data: {task_id: 1},
        success: function (e) {
            $("#Int_acb_Continuer").attr('disabled', 0 === Number(e));
            $("#Int_acb_Synthese").attr('disabled', 0 === Number(e));
        }
    });

    $(function () {

        /*
         * FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETREs  LORsQUE L'OBJECTIF EST DEJA VALIDE
         */

        var nb = parseInt(<?php echo $nb; ?>);
        if (nb == 1) {

            $('textarea').attr('disabled', true);
            $(':input[type=radio]').attr('disabled', true);
            $('#Synthese_acb_Terminer').attr('disabled', true);
        }

        /*
         * FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA
         */


        $('#int_acb_Retour').click(function () {
            $('#message_fermeture_acb').show();
            $('#fancybox_acb').show();

        });

        //Continuer la question

        $('#Int_acb_Continuer').click(function () {
            mission_id = document.getElementById("txt_mission_id_acb").value;
            $.ajax({
                type: 'POST',
                url: 'cycleAchat/cycle_achat_b/php/aff_quest_fin_acb.php',
                data: {mission_id: mission_id},
                /*success:function(e){
                 
                 quetion_acb="#Question_acb_"+e;
                 
                 $(quetion_acb).fadeIn(500);
                 
                 acb=e;
                 
                 $.ajax({
                 
                 type:'POST',
                 
                 url:'cycleAchat/cycle_achat_b/php/getRepContinuer.php',
                 
                 data:{mission_id:mission_id, questId:e, cycleId:2},
                 
                 success:function(e1){
                 
                 eo=""+e1+"";
                 
                 doc=eo.split(',');
                 
                 cpt=1;
                 
                 for(i=1; i<23; i++){ 
                 
                 if(i==acb){
                 
                 acbId="acb_"+cpt;
                 
                 acbIdCom="acb"+cpt;
                 
                 afficheReponseQuest(acbId,acbIdCom);
                 
                 break;
                 
                 }
                 
                 cpt++;
                 
                 }	
                 
                 }
                 
                 });
                 
                 
                 
                 $('#dv_table_acb').show();
                 
                 $('#lb_veuillez_aff_acb').hide();
                 
                 $('#fancybox_acb').show();
                 
                 }*/

                success: function (e) {

                    StID = e;
                    quetion_acb = "#Question_acb_" + e;

                    $(quetion_acb).fadeIn(500);

                    $('#dv_table_acb').show();

                    $('#lb_veuillez_aff_acb').hide();

                    $('#fancybox_acb').show();

                }

            });

        });



        //la synthèse de acb

        $('#Int_acb_Synthese').click(function () {

            mission_id = document.getElementById("txt_mission_id_acb").value;

            // se rediriger vers calcul score
            $.ajax({
                type: 'POST',
                url: 'cycleAchat/cycle_achat_b/php/select_score_b.php',
                data: {mission_id: mission_id},
                success: function (e) {
                    $("#echo_score").html(e);
                }
            });

            $.ajax({
                type: 'POST',
                url: 'cycleAchat/cycle_achat_b/php/cpt_acb.php',
                data: {mission_id: mission_id},
                success: function (e) {

                    if (e == 22) {

                        $.ajax({
                            type: 'POST',
                            url: 'cycleAchat/cycle_achat_b/php/getSynth.php',
                            data: {mission_id: mission_id, cycleId: 2},
                            success: function (e) {

                                eo = "" + e + "";

                                doc = eo.split(',');

                                /*document.getElementById("rd_Synthese_acb_Faible").checked=false;
                                 
                                 document.getElementById("rd_Synthese_acb_Moyen").checked=false;
                                 
                                 document.getElementById("rd_Synthese_acb_Eleve").checked=false;*/

                                document.getElementById("txt_Synthese_acb").value = doc[0];

                                if (doc[1] == 'faible') {

                                    document.getElementById("rd_Synthese_acb_Faible").checked = true;

                                } else if (doc[1] == 'moyen') {

                                    document.getElementById("rd_Synthese_acb_Moyen").checked = true;

                                } else if (doc[1] == 'eleve') {

                                    document.getElementById("rd_Synthese_acb_Eleve").checked = true;

                                }

                            }

                        });

                        $('#Int_Synthese_acb').show();

                        $('#fancybox_acb').show();

                    } else {

                        $('#fancybox_acb').show();

                        $('#mess_vide_obj_acb').show();

                    }

                }

            });

        });

    });



    function afficheReponseQuest(acbId, acbIdCom) {

        document.getElementById("rad_Question_Oui_" + acbId).checked = false;
        document.getElementById("rad_Question_NA_" + acbId).checked = false;
        document.getElementById("rad_Question_Non_" + acbId).checked = false;

        //alert(doc[1]);

        if (doc[0] == 0) {

            //document.getElementById("commentaire_Question_"+acbIdCom).value="";

        } else
            document.getElementById("commentaire_Question_" + acbIdCom).value = doc[0];

        if (doc[1] == 'OUI') {

            document.getElementById("rad_Question_Oui_" + acbId).checked = true;

        } else if (doc[1] == 'N/A') {

            document.getElementById("rad_Question_NA_" + acbId).checked = true;

        } else if (doc[1] == 'NON') {

            document.getElementById("rad_Question_Non_" + acbId).checked = true;

        }

    }

</script>


<div id="int_acb"><label class="lb_veuillez" id="lb_veuillez_aff_acb"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />

    <input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_acb" style="display:none;" />


    <!-- Tinay : affiche la liste questionnaire à gauche sans le popup e saisi de reposne -->
    <div id="Interface_Question_acb"><?php include '../../../cycleAchat/cycle_achat_b/load/load_quest_acb.php'; ?></div>



    <div id="dv_table_acb" style="float:left;display:none;width:80%;">

        <table class="label" id="lb_acb">

            <tr>

                <td width="60%">Question</td>

                <td width="10%">Commentaire</td>

            </tr>

        </table>

    </div>

    <!-- CHARGEMENT DES REPONSES -->

    <div id="frm_tab_res_b">
        <!-- Default -->
<?php //include '../../../cycleAchat/cycle_achat_load/load_b/load_rep_b.php';  ?>

        <!-- tinay editer -->
<?php include '../../../cycleAchat/cycle_achat_b/load/load_rep_acb.php'; ?>
    </div>

    <div id="Int_Droite_acb">
        <input type="button" class="bouton" value="Retour" id="int_acb_Retour" /><br />
        <input type="button" class="bouton" value="Continuer" id="Int_acb_Continuer" /><br />
        <input type="button" class="bouton" value="Synthèse" id="Int_acb_Synthese" /><br />
        <span class="label">
            Pour modifier la réponse à une question, veuillez cliquer sur la liste		
        </span>
    </div>

    <!--**********************************Interface du fancybox****************************-->

    <div id="fancybox_acb"></div>

    <!--***********************************************************************************-->
    <!--div id="int_Bouton_Interface_B" align="center">
    </div-->

    <!-- tinay editer: ??? question_acb_num -> dragg_1 to 22 -->
    <div id="Question_acb_1" data-options="handle:'#dragg_1'" align="center"> 
        <div id="dragg_1" >
            <table width="500">
                <tr>
                    <td class="td_Titre_Question" align="center">QUESTION N°01/22
                        <input type="button" style="width:10px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:210px;height:15px;background-color:#efefef" />
                    </td>
                </tr>
            </table>
        </div>
        <!-- Tinay: affiche le popu questionnaires oui/non avec les formulaire -->
<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_1.php'; ?>
    </div>

    <div id="Question_acb_2" data-options="handle:'#dragg_2'" align="center">

        <div id="dragg_2" >

            <table width="500">
                <tr>
                    <td class="td_Titre_Question" align="center">QUESTION N°02/22
                        <input type="button" style="width:20px;height:15px;background-color:#ccc" />
                        <input type="button" style="width:200px;height:15px;background-color:#efefef" />
                    </td>
                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_2.php'; ?></div>

    <div id="Question_acb_3" data-options="handle:'#dragg_3'" align="center">

        <div id="dragg_3" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°03/22

                        <input type="button" style="width:30px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:190px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_3.php'; ?></div>

    <div id="Question_acb_4" data-options="handle:'#dragg_4'" align="center">

        <div id="dragg_4" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°04/22

                        <input type="button" style="width:40px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:180px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_4.php'; ?></div>

    <div id="Question_acb_5" data-options="handle:'#dragg_5'" align="center">

        <div id="dragg_5" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°05/22

                        <input type="button" style="width:50px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:170px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_5.php'; ?></div>

    <div id="Question_acb_6" data-options="handle:'#dragg_6'" align="center">

        <div id="dragg_6" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°06/22

                        <input type="button" style="width:60px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:160px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_6.php'; ?></div>

    <div id="Question_acb_7" data-options="handle:'#dragg_7'" align="center">

        <div id="dragg_7" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°07/22

                        <input type="button" style="width:70px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:150px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_7.php'; ?></div>

    <div id="Question_acb_8" data-options="handle:'#dragg_8'" align="center">

        <div id="dragg_8" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°08/22

                        <input type="button" style="width:80px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:140px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_8.php'; ?></div>

    <div id="Question_acb_9" data-options="handle:'#dragg_9'" align="center">

        <div id="dragg_9" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°09/22

                        <input type="button" style="width:90px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:130px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_9.php'; ?></div>

    <div id="Question_acb_10" data-options="handle:'#dragg_10'" align="center">

        <div id="dragg_10" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°10/22

                        <input type="button" style="width:100px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:120px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_10.php'; ?></div>

    <div id="Question_acb_11" data-options="handle:'#dragg_11'" align="center">

        <div id="dragg_11" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°11/22

                        <input type="button" style="width:110px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:110px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_11.php'; ?></div>

    <div id="Question_acb_12" data-options="handle:'#dragg_12'" align="center">

        <div id="dragg_12" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°12/22

                        <input type="button" style="width:120px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:100px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_12.php'; ?></div>

    <div id="Question_acb_13" data-options="handle:'#dragg_13'" align="center">

        <div id="dragg_13" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°13/22

                        <input type="button" style="width:130px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:90px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_13.php'; ?></div>

    <div id="Question_acb_14" data-options="handle:'#dragg_14'" align="center">



        <div id="dragg_14" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°14/22

                        <input type="button" style="width:140px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:80px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_14.php'; ?></div>

    <div id="Question_acb_15" data-options="handle:'#dragg_15'" align="center">





        <div id="dragg_15" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°15/22

                        <input type="button" style="width:150px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:70px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_15.php'; ?></div>

    <div id="Question_acb_16" data-options="handle:'#dragg_16'" align="center">

        <div id="dragg_16" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°16/22

                        <input type="button" style="width:160px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:60px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_16.php'; ?></div>

    <div id="Question_acb_17" data-options="handle:'#dragg_17'" align="center">

        <div id="dragg_17" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°17/22

                        <input type="button" style="width:170px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:50px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_17.php'; ?></div>

    <div id="Question_acb_18" data-options="handle:'#dragg_18'" align="center">

        <div id="dragg_18" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°18/22

                        <input type="button" style="width:180px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:40px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_18.php'; ?></div>

    <div id="Question_acb_19" data-options="handle:'#dragg_19'" align="center">

        <div id="dragg_19" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°19/22

                        <input type="button" style="width:190px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:30px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_19.php'; ?></div>

    <div id="Question_acb_20" data-options="handle:'#dragg_20'" align="center">

        <div id="dragg_20" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°20/22

                        <input type="button" style="width:200px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:20px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_20.php'; ?></div>

    <div id="Question_acb_21" data-options="handle:'#dragg_21'" align="center">

        <div id="dragg_21" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°21/22

                        <input type="button" style="width:210px;height:15px;background-color:#ccc" />

                        <input type="button" style="width:10px;height:15px;background-color:#efefef" />

                    </td>

                </tr>

            </table></div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_21.php'; ?></div>

    <div id="Question_acb_22" data-options="handle:'#dragg_22'" align="center">

        <div id="dragg_22" >

            <table width="500">

                <tr>

                    <td class="td_Titre_Question" align="center">QUESTION N°22/22

                        <input type="button" style="width:220px;height:15px;background-color:#ccc" />

                    </td>

                </tr>

            </table></div>

        <?php include '../../../cycleAchat/cycle_achat_b/form/Interface_Question_acb_22.php'; ?></div>

    <!--****************************************Interface B Synthese conclusion********************************-->

    <div id="Int_Synthese_acb" data-options="handle:'#dragg_acb'" align="center">

        <div id="dragg_acb" class="td_Titre_Question"><br />SYNTHESE</div>

<?php include '../../../cycleAchat/cycle_achat_b/form/Interface_acb_Synthese.php'; ?></div>

    <!--*******************************************************************************************************-->



    <!--***********************************Message de slide de la question terminer****************************-->

    <div id="message_Slide_terminer_Question_acb"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message slide question terminer acb.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de la page B***********************************-->

    <div id="message_fermeture_acb"><?php include '../../../cycleAchat/cycle_achat_b/sms/messRetacb.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--**********************************Interface de terminaison de question 22 A****************************-->

    <div id="message_Terminer_question_acb"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message terminer question acb.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--*************************************Message de terminaison de la synthese B***************************-->

    <div id="message_Terminer_Synthese_acb"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message terminer synthese acb.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--************************************Message d'enregistrement de la synthese B**************************-->

    <div id="message_Synthese_Slide_acb"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message slide acb Synthese.php'; ?></div>

    <!--*******************************************************************************************************-->





    <!--*************************************Message vide de synthese******************************************-->

    <div id="mess_vide_synthese_acb"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_vide_synth_acb.php'; ?></div>

    <!--*******************************************************************************************************-->





    <!--**********************************Interface de fermeture de synthese B*********************************-->

    <div id="message_Donnees_Perdu_acb"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message donnees perdues acb.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message annulation question acb.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb2"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb2.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb3"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb3.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb4"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb4.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb5"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb5.php'; ?></div>

    <!--*******************************************************************************************************-->





    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb6"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb6.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb7"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb7.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb8"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb8.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb9"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb9.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb10"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb10.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb11"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb11.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb12"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb12.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb13"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb13.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb14"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb14.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb15"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb15.php'; ?></div>

    <!--*******************************************************************************************************-->

    <div id="message_fermeture_question_acb16"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb16.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb17"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb17.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb18"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb18.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb19"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb19.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb20"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb20.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb21"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb21.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message de fermeture de toutes les question*************************-->

    <div id="message_fermeture_question_acb22"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_enregistre_question_acb22.php'; ?></div>

    <!--*******************************************************************************************************-->





    <!--**********************************Message d'ouverture de l'objectif B**********************************-->

<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php'; ?></div-->

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide***********************************************-->

    <div id="mess_quest_vide_acb1"><?php include '../../../cycleAchat/cycle_achat_b/sms/Message_question_vide.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb2"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb2.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb3"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb3.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb4"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb4.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb5"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb5.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb6"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb6.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb7"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb7.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb8"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb8.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb9"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb9.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb10"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb10.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb11"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb11.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb12"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb12.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb13"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb13.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb14"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb14.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb15"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb15.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb16"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb16.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb17"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb17.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb18"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb18.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb19"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb19.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb20"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb20.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb21"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb21.php'; ?></div>

    <!--*******************************************************************************************************-->

    <!--***********************************Message question vide B2***********************************************-->

    <div id="mess_quest_vide_acb22"><?php include '../../../cycleAchat/cycle_achat_b/sms/sms_empty/Mess_quest_vide_acb22.php'; ?></div>

    <!--*******************************************************************************************************-->



    <!--*************************************Message vide resultat b*******************************************-->

    <div id="mess_vide_obj_acb"><?php include '../../../cycleAchat/cycle_achat_b/sms/mess_vid_aud_acb.php'; ?></div>

    <!--*******************************************************************************************************-->







</div>