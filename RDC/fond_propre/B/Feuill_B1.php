<?php
@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../";
	
	/*
	end #Jimmy
	*/
$mission_id = $_SESSION['idMission'];
// include "../../../connexion.php";
include "$project_path/connexion.php"; #using $project_path

//////////////////////////////////////////////select existance base//////////////////////////////////////////////
$sql = "SELECT  RDC_ID,RDC_COMMENTAIRE, RDC_REPONSE FROM  tab_rdc WHERE RDC_OBJECTIF='B' AND RDC_CYCLE='Fond propre' AND RDC_RANG='1' AND MISSION_ID=$mission_id";
// print $sql;
$rep = $bdd->query($sql);
$don = $rep->fetch();
$reponseRDC = $don["RDC_REPONSE"];
$coment1 = $don["RDC_COMMENTAIRE"];
$idRdc = $don["RDC_ID"];


?>

<html>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../../../css/RDC.css"/>
    <script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
    <script>
        // Droit cycle by Tolotra
        // Page : RDC -> Fonds propres
        // Tâche : A-Fonds propres, 47
        $.ajax(
            {
                type: 'POST',
                url: 'droitCycle.php',
                data: {task_id: 47},
                success: function (e) {
                    var result = 0 === Number(e);
                    editable = !result;

                    $("#repA").attr('disabled', result);
                    $("#repA2").attr('disabled', result);
                    $("#CmtA").attr('disabled', result);
                }
            }
        );
        // $(document).ready(function(e){
        function deleterow(tblpiece) {

            if (confirm("Êtes vous sûre de vouloir supprimer ce commentaire ?")) {

                var table = document.getElementById(tblpiece);
                var rowCount = table.rows.length;


                //alert();
                if (rowCount > 2) {
                    idcomt = table.rows.item(rowCount - 1).id;
                    url = "RDC/fond_propre/B/sup_commentaire.php?idcomt=" + idcomt;
                    $.get(url, function (resup) {

                        if (resup == "SUPOK")
                            table.deleteRow(rowCount - 1);

                    })


                }//FIN IF
            }//FIN IF

        }
        // }

        $(function () {

            $("#btn_ret").click(function () {

                $("#contenue").load("RDC/fond_propre/B/B_Reg_Eng.php");
            });

            $("#plus").click(function () {
                $("#tblpiece").append("<tr ><td><input type='hidden' name='idcomment[]' value='' /><textarea name='pv[]' class='Cl_B1' id='Sit_Pv_Ag'></textarea></td><td><textarea name='point[]' class='Cl_B1' id='Po1_Imp_B1'></textarea></td><td><textarea name='cmt[]' class='Cl_B1' id='Cmt_B1'></textarea></td></tr>");


            });

        });


    </script>

    <script>


        $(function () {

            $("#enregistre").click(function () {

                //datacommmentaire=$("#frmcommetaire").serialize()+;
                var rep1 = $("#repA").val();
                var cmt1 = $("#CmtA").val();
                //alert(cmt1+rep1);
                datatransfert = $("#frmenvoyersynthese").serialize();
                datatransfert = datatransfert + "&rep1=" + rep1 + "&cmt1=" + cmt1;
                //alert(datatransfert);			
                // alert(cmt1);
                if ((rep1 == "non" && cmt1 == "") || rep1 == "") {
                    alert('Des réponses obligatoires ont été omises!');
                }
                else {

                    //alert("TRANSFERT ITO OHH"+datatransfert);
                    //alert("commentaire"+datacommmentaire);
                    $.ajax({
                        type: "GET",
                        url: "RDC/fond_propre/B/B1Post1.php",
                        data: datatransfert,
                        success: function (e) {
                            //alert(e);
                            //alert(e);
                            // $("#CohGauche").load("RDC/fond_propre/B/B_REG2.php");
                            $("#contenue").load("RDC/fond_propre/B/B_REG2.php");
                        }

                    });
                }

            });

        });
        function choixrep1() {
            var rep1 = $("#repA").val();
            var cmt1 = $("#CmtA").val();
            if (rep1 == "non" && cmt1 == "") {
                alert('Des commentaires obligatoires ont été omis!');
            }
        }
    </script>
</head>
<body>

<style>
    .Cl_B1 {
        width: 250px;
        height: 50px;

    }

    .aj {
        width: 150px;
        height: 15px;
        border: 1px solid;
        background-color: #fff;
    }

    .aj:hover {
        cursor: pointer;
    }
</style>
<div>
    <label class="btn" id="enregistre">></label>
    <label class="btn" id="btn_ret"><</label>
</div>


<form method="post" id="frmenvoyersynthese">
    <table>

        <tr>
            <td>
                <div id="B1_gauche">
                    <div id="G1">
                        <center>
                            <label>Sitation du capital social <?php //echo $_SESSION["id_Entre"];?></label>
                            <table id="B1_act">
                                <tr style="background-color:#B0C4DE">

                                    <td><b>Noms<b></td>
                                    <td><b>Parts</b></td>
                                    <td><b>Nombre d'action</b></td>
                                    <td><b>V. nominal</b></td>

                                </tr>

                                <?php


                                ////////////////////////////////////////////////////////////////////////////////////////////////////////						
                                $sqlNbrAct = 'SELECT ENTREPRISE_NOMBRE_ACTION,ENTREPRISE_VALEUR_NOMINAL FROM  tab_entreprise WHERE ENTREPRISE_ID=' . $_SESSION["id_Entre"];
                                $reponseNbrAct = $bdd->query($sqlNbrAct);
                                $donnee = $reponseNbrAct->fetch();
                                $nbrAct = $donnee["ENTREPRISE_NOMBRE_ACTION"];
                                $valNom = $donnee["ENTREPRISE_VALEUR_NOMINAL"];

                                ////////////////////////////////////////////////////////////////////////////////////////////////////////


                                $sqlListAct = 'SELECT ACTIONNAIRE_ID,ACTIONNAIRE_NOM,ACTIONNAIRE_PART FROM  tab_actionnaire WHERE ENTREPRISE_ID=' . $_SESSION["id_Entre"];

                                $reponseAct = $bdd->query($sqlListAct);

                                ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                while ($donneeAct = $reponseAct->fetch()) {
                                    $IdAc = $donneeAct["ACTIONNAIRE_ID"];
                                    $nomAc = $donneeAct["ACTIONNAIRE_NOM"];
                                    $partAc = $donneeAct["ACTIONNAIRE_PART"];


                                    ?>

                                    <tr>
                                        <td><?php echo $nomAc; ?> </td>

                                        <td><?php
                                            if ($nbrAct == 0) {
                                                $poucenrage = 0;
                                            } else {
                                                $poucenrage = ($partAc * 100) / $nbrAct;

                                                echo substr($poucenrage, 0, 5);
                                            }
                                            ?></td>
                                        <td><?php echo $partAc; ?></td>

                                        <td><?php echo $valNom ?></td>
                                    </tr>

                                    <?php

                                }
                                ?>

                                <tr>
                                    <td colspan="2"><b>TOTAL</b></td>
                                    <td><?php echo $nbrAct ?></td>
                                    <td><?php echo $valNom ?></td>

                                </tr>
                            </table>

                            <table id="tblpiece" style="margin-top:50px;">
                                <tr style="background-color:#B0C4DE">
                                    <td>SITUATION DES PV CA/AG</td>
                                    <td>POINTS IMPORTANTS</td>
                                    <td>COMMENTAIRES</td>
                                </tr>
                                <?php
                                //include '../../connexion.php';
                                $reponse = $bdd->query("select * FROM tbl_rdc_fond_propre_commentaire where RDC_OBJECTIF='B' and MISSION_ID='$mission_id'");
                                (int)$ligne = 1;
                                while ($donnees = $reponse->fetch()) {
                                    ?>
                                    <input name="idcomment[]" type="hidden" value="<?php print ($donnees['id']); ?>">

                                    <tr id="<?php print ($donnees['id']); ?>">
                                        <td><textarea class="Cl_B1" name="pv[]"
                                                      id="Sit_Pv_Ag<?php echo $ligne ?>"><?php echo $donnees['situation_PV']; ?></textarea>
                                        </td>
                                        <td><textarea class="Cl_B1" name="point[]"
                                                      id="Po1_Imp_B1<?php echo $ligne ?>"><?php echo $donnees['point_important']; ?></textarea>
                                        </td>
                                        <td><textarea class="Cl_B1" name="cmt[]"
                                                      id="Cmt_B1<?php echo $ligne ?>"><?php echo $donnees['commentaire']; ?></textarea>
                                        </td>

                                    </tr>
                                    <?php
                                    $ligne = $ligne + 1;
                                }
                                ?>
                            </table>
                            <table>
                                <tr>
                                    <td><label id="plus" class="aj">+</label></td>
                                    <td><label id="moin" class="aj" onclick="deleterow('tblpiece')">-</label></td>
                                </tr>
                            </table>

                        </center>
                    </div>

                </div>
            </td>

            <td>
                <div id="B1_droit">


                    <input type="hidden" name="idRdc" value="<?php print ($idRdc); ?>">
                    <h5><u>Question 1</u></h5>
                    <p>Les formalités légales et statutaires d'approbation des comptes sont-elles bien respectées?</p>
                    <select name="rep1" id="repA" onchange="choixrep1()">
                        <option value=""></option>
                        <option value="oui" <?php if ($reponseRDC == "oui") echo 'selected'; ?> >Oui</option>
                        <option value="N/A" <?php if ($reponseRDC == "N/A") echo 'selected'; ?>>N/A</option>
                        <option value="non" <?php if ($reponseRDC == "non") echo 'selected'; ?>> Non</option>
                    </select>

                    <h5>Commentaires (obligatoire si réponse négative)</h5>
                    <textarea name="cmt1" id="CmtA"><?php echo $coment1; ?></textarea>


                </div>

            </td>
        </tr>

    </table>


</form>
</body>
</html>