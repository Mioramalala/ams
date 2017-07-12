<?php
include './../../../connexion.php';
@session_start();
$mission_id = @$_SESSION['idMission'];

$sql = "SELECT MISSION_DATE_CLOTURE FROM tab_mission WHERE MISSION_ID = " . $mission_id;
$reponse = $bdd->query($sql);
if ($reponse) {
    $donnees = $reponse->fetch();
    $date = $donnees['MISSION_DATE_CLOTURE'];
}

$sql2 = "SELECT * FROM tab_circularisation_fichier WHERE fileCategory= 'frns' AND fileIdMission = " . $mission_id;
$reponseFrns = $bdd->query($sql2);
?>
<script>
    function lettreFrns(self) {

        var id = $(self).parent().parent().attr('id');
        var nom = $(self).parent().parent().find('.nom').val();
        var coord = $(self).parent().parent().find('.coord').val();
        var dateCloture = '<?= $date ?>';
        var bal_aux_id = $(self).attr('id');

        // alert(bal_aux_id);

        data = {nomFrns: nom,CoordFrns: coord,dateCloture: dateCloture,bal_aux_id: bal_aux_id};
        $.ajax({
            type: "POST",
            url: "/RA/circularisation/frns/exportgatway.php",
            data: data,
            success: function (e) {
                // alert(e);
                $("#" + id + " .down").html('<a href="RA/circularisation/frns/' + e + '"><img src="../icone/les_words.png" /></a>');
            }
        });
    }

    function ajout() {
        $(".ajout").hide();
        var nbr = $("#nombreFrns").val();
        nbr = parseInt(nbr);
        nbr++;
        $("#nombreFrns").val(nbr);
        var newForm = "<tr id='frns" + nbr + "'>";
        newForm += "<td><input class='entree nom' type='text' name='nomFrns'/></td>";
        newForm += "<td><input class='entree coord' type='text' name='CoordFrns'/></td>";
        newForm += "<td><input class='generer' type='button' value='Generer'></td>";
        newForm += "<td><input class='ajout' type='button' onclick='ajout()' value='+'></td><td class='down'></td></tr>";
        $('#listeFrns tbody').append(newForm);
        $(".generer").bind("click",lettreFrns(this));
    }

    $(function () {
        $(".btn_retour").click(function () {
            $('#contenue').load("RA/circularisation/circularisation.php");
        });

        $(".btn_list_a_circulariser").click(function () {
            $('#contenue').load('/RA/circularisation/frns/frns.php?mission_id=' +<?php echo $mission_id ?>);
        });

        // $( ".generer" ).bind( "click", lettreFrns(this));
        //$("#formulaire_lettre .generer" ).click(lettreFrns);

        $("#btn_tel").click(function () {
            // $('#progressbarRA').show();
            var idChecked = [];
            $("#tbl_ech").find("tr input[type='checkbox']:checked").each(
                function () {
                    idChecked.push($(this).attr('alt'));
                });
            // alert(idChecked);
            var valTransfert = new Array();
            valTransfert = "valTransfert=true";
            valTransfert = valTransfert + '&listId[]=' + idChecked;
            // alert(valTransfert);
            $.ajax({
                type: "POST",
                // url:"RA/circularisation/frns/GetEchant_GL.php",
                url: "RA/circularisation/frns/table_new_frns.php",
                data: {listId: idChecked},
                success: function (e) {
                    // alert(e);
                    $('#contenue').html(e);
                }
            });
        });
    });
</script>
<style>
    #tbl_ech {
        border-collapse: collapse;
    }

    #tbl_ech td {
        border: 1px solid;
        background-color: #FFFAFA;

    }

    #echant_GL {
        overflow: auto;
        height: 220px;
        width: 800px;
    }

    #btn_tel, .btn_retour, .btn_circularisation, .btn_list_a_circulariser {
        border: 1px solid #ccc;
        background-color: #efefef;
        border-radius: 8px;
        width: 300px;
        height: auto;
    }

    #btn_tel:hover, .btn_retour:hover, .btn_circularisation:hover, .btn_list_a_circulariser:hover {
        cursor: pointer;
        background-color: #0074bf;
        color: #fff;
    }

    .btn_list_a_circulariser {
        display: none;
    }

    .tet {
        /*margin-left:-17px;*/
        margin-top: 20px;
    }

    .tet td {
        border: 1px solid #black;
        background-color: #0074bf;
        color: #fff;
    }

</style>
<div width="100%" style="height:530px; overflow:auto" ;>
    <table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
        <tr>
            <td style="color:white">
                <center>FOURNISSEURS : Comptes 40</center>
            </td>
        </tr>
    </table>
    <center>
        <table width="100%" height="50" style="text-align:left;">
            <tr>
                <td>
                    <center><b><label style="color:blue;">Sélectionner fournisseurs à circulariser</label></b></center>
                </td>
            </tr>
        </table>
        <table>
            <div style="max-height:300px;width:900px;overflow:auto;">
                <table id="tbl_ech" style="width:900px;">
                    <tr>
                        <td width="20px"></td>
                        <td width="100px">Compte</td>
                        <td width="200px">Code Tiers</td>
                        <td width="200px">Annexe</td>
                        <td width="200px">Solde</td>
                    </tr>
                    <?php
                    $tab_bal_aux_id = array();
                    $reponse = $bdd->query("SELECT tab_bal_aux.BAL_AUX_ID,BAL_AUX_CODE,BAL_AUX_COMPTE,BAL_AUX_LIBELLE,BAL_AUX_SOLDE,idFile
				 					  FROM tab_bal_aux LEFT JOIN tab_circularisation_fichier ON tab_bal_aux.BAL_AUX_ID = tab_circularisation_fichier.bal_aux_id where BAL_AUX_COMPTE like '40%' AND MISSION_ID=" . $mission_id);
                    if ($reponse) {
                        while ($donnees = $reponse->fetch()) {
                            $id = $donnees['BAL_AUX_ID'];
                            array_push($tab_bal_aux_id, $id);
                            $Comp = $donnees['BAL_AUX_COMPTE'];
                            $annexe = $donnees['BAL_AUX_LIBELLE'];
                            $code = $donnees['BAL_AUX_CODE'];
                            $sold = number_format((double)$donnees['BAL_AUX_SOLDE'], 2, ',', ' ');
                            $idFile = $donnees['idFile'];
                            ?>
                            <tr>
                                <td width="20px"><input type="checkbox" class="compte_a_circulariser"
                                                        id="<?php echo $id; ?>" value="<?php echo $id; ?>"
                                                        multiple='multiple' alt='<?php echo $annexe; ?>'
                                                        name="chackGL[]" <?php echo $idFile != null ? 'checked' : "" ?>/>
                                </td>
                                <td width="100px"><?php echo $Comp; ?></td>
                                <td width="200px"><?php echo $code; ?></td>
                                <td width="200px"><?php echo $annexe; ?></td>
                                <td width="200px"><?php echo $sold; ?></td>
                            </tr>
                            <?php
                        }
                    } ?>
                </table>
            </div>
        </table>
    </center>

    <p class="btn_circularisation" id="confirme_circularisation">Circulariser</p>
    <p class="btn_list_a_circulariser">Voir la liste</p>
    <p class="btn_retour">Retour</p>
    <div id="progressbarRA"
         style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
        <center><img src="../img/progressbar.gif"/><br/>Veuillez patienter s'il vous plaît</center>
    </div>
</div>
<script>
    $(function () {
        $("#confirme_circularisation").click(function () {
            var tab_id = [];
            var table_html = "";

            var checked = $("input.compte_a_circulariser:checked");
            if (checked.length == 1) {
                tab_id.push($(checked).attr('id'));
                table_html += '<tr id="frns' + 1 + '">'
                    + '<td><input class="entree nom" type="text" name="nomFrns"  /></td>'
                    + '<td><input class="entree coord" type="text" name="CoordFrns"/></td>'
                    + '<td><input class="generer" id="' + $(checked[0]).attr('id')
                    + '" type="button" value="Generer" onclick="lettreFrns(checked[0])"></td>'
                    + '<td class="down"></td>'
                    + '</tr>';
            }
            else {
                checked.each(function (i,elmt) {
                    tab_id.push($(elmt).attr('id'));
                    table_html += '<tr id="frns' + i + '">'
                        + '<td><input class="entree nom" type="text" name="nomFrns"  /></td>'
                        + '<td><input class="entree coord" type="text" name="CoordFrns"/></td>'
                        + '<td><input class="generer" id="' + $(elmt).attr('id')
                        + '" type="button" value="Generer" onclick="lettreFrns(this)"></td>'
                        + '<td class="down"></td>'
                        + '</tr>';
                });
            }
            // alert(table_html);

            if (tab_id.length > 0) {
                $.ajax({
                    type: "POST",
                    url: "RA/circularisation/frns/circularisation.php",
                    data: {'tab_id': tab_id},
                    success: function (e) {
                        $("#tbl_ech").html(e);
                        if ($("#listefrns").find('#frns0').length == 0) {
                            $("#listefrns").append(table_html);
                        }
                        $("#confirme_circularisation").hide();
                        //$("#formulaire_lettre").show();
                    }
                });
            }
            else {
                alert("Veuillez séléctionner au moins un compte avant de circulariser");
            }
            $('.btn_list_a_circulariser').css('display','block');
        });
    });
</script>