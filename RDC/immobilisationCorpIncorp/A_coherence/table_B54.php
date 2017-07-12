<?php
@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
include "$project_path/connexion.php";
$mission_id=@$_SESSION['idMission'];

///////////////////////////compt accessoires/////////////
$reponse=$bdd->query("select count(tab_Frais_Accessoire.id_frais_acc) As nbr_Acc from tab_Frais_Accessoire,tbl_detaillefraix_acc where   	type_fraixacc='production' and  tab_Frais_Accessoire.id_frais_acc=tbl_detaillefraix_acc.id_frais_acc AND  tab_Frais_Accessoire.id_mission=".$mission_id);
$donnees=$reponse->fetch();
$nbr_Acc=(int)$donnees['nbr_Acc'];
// echo $nbr_Acc;
///////////////////////////////////////////////////////
$reponse=$bdd->query("select nom_frais_acc from tab_Frais_Accessoire,tbl_detaillefraix_acc where  type_fraixacc='production' and  tab_Frais_Accessoire.id_frais_acc=tbl_detaillefraix_acc.id_frais_acc and  tab_Frais_Accessoire.id_mission=".$mission_id);

?>
<style>
    #tb td{
        border:1px solid;
    }


</style>

<script type="text/javascript" src="js/automatic-calculation.js"></script>
<script type="text/javascript">

    $(function()
    {
        var formule = "";
        var nbLignes = $("#tb > tbody > tr").get().length;
        var nbr_Acc = <?php echo $nbr_Acc; ?>;

        for(var i = 0; i < nbLignes; i++) {
            if(i > 0) formule += ";";
            formule += "{" + (5 + nbr_Acc) + "," + i + "} = {" + (3 + nbr_Acc) + "," + i + "} - {" + (4 + nbr_Acc) + "," + i + "}";
        }
        //alert(formule)

        $("#tb").automaticCalculation({
            expressions : formule
        });



        $(".prix_").keypress(calculecout_echant);
        $(".prix_").keyup(calculecout_echant);

        $(".Fraixacc").keypress(calculecout_echant);
        $(".Fraixacc").keyup(calculecout_echant);


        $(".montant").keypress(calculecout_echant);
        $(".montant").keyup(calculecout_echant);
        $(".cout").keypress(calculecout_echant);
        $(".cout").keyup(calculecout_echant);


        function calculecout_echant()
        {
            var cout=0;
            var montant=0;
            var ecart=0;
            eltechantillongl=$(this).parent().parent();

            eltprix=eltechantillongl.find(".prix_");
            if(eltprix.val()=="")
                prix=0;
            else
                prix=eval(eltprix.val());


            eltFraixacc=eltechantillongl.find(".Fraixacc");



            for (var i = 0; i < eltFraixacc.length; i++)
            {
                if(eltFraixacc.eq(i).val()=="")
                    Fraixacc=0;
                else
                    Fraixacc=eval(eltFraixacc.eq(i).val());

                cout=cout+Fraixacc;;



            };


            eltCout=eltechantillongl.find(".cout");
            cout=cout+prix;
            eltCout.val(cout);

            eltecart=eltechantillongl.find(".ecart");
            eltmontant=eltechantillongl.find(".montant");
            montant=eval(eltmontant.val());

            ecart=cout-montant;

            eltecart.val(ecart);


        }//FIN function calculecout_echant



        $("#Retourlstfraisaccessoires").click(function ()
        {
            $("#contenue_question").hide();
            $("#contenue_rdc").hide();
            $('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/_accescout_production.php");
            //$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence7.php");
        });


        $("#Enregistrmentcoutacquisition").click(function (res)
        {


            $(".ecart").removeAttr("disabled");
            // datatransfert=$("#frmfraisaccessoires").serialize();
			datatransfert=new FormData(document.getElementById("frmfraisaccessoires"));
            $.ajax({
                type:"POST",
                url:"RDC/immobilisationCorpIncorp/A_coherence/Enregfraisaccessoires.php",
                data:datatransfert,
				cache       : false,
				contentType : false,
				processData : false,
                success:function(e)
                {
                    alert("OK Enregistrement ");

                }

            });


        });

        /*function addEnreg_table()
         {

         }*/

    });

</script>
<input type="button" value="Retour" id="Retourlstfraisaccessoires" style="width:100px;heigth:60px;background: rgb(0, 105, 141) none repeat scroll 0% 0%;font-size: 18px;float: left;text-align: center;color: rgb(255, 255, 255)">
<input type="button" value="Enregistrement coût de production" id="Enregistrmentcoutacquisition" style="width:378px;heigth:60px;background: rgb(0, 105, 141) none repeat scroll 0% 0%;font-size: 18px;float: left;text-align: center;color: rgb(255, 255, 255)">
<div  style="width:100%">

    <center><label>Détermination du coût de production </label></center>
    <div style="width:100%; overflow:scroll; height:500px">

        <form id="frmfraisaccessoires">
            <table id="tb" style="border-collapse:collapse;">
                <thead>
                <tr bgcolor="#ccc">
                    <th width="7%" rowspan="2"></th>
                    <th width="7%" rowspan="2">Renvoi</th>
                    <th width="7%" rowspan="2">Prix d'achat</th>

                    <th colspan="<?php echo $nbr_Acc;?>"><center>Frais accessoires</center></th>

                    <th width="7%" rowspan="2">Coût </th>
                    <th width="7%" rowspan="2">Montant comptabilisé</th>


                    <th width="7%" rowspan="2">Ecart</th>
                    <th width="7%" rowspan="2">Observations</th>
                </tr>
                <tr>
                    <?php while($donnees=$reponse->fetch())
                    {
                        $rubrique=$donnees['nom_frais_acc'];?>

                        <td style="border:1px solid;"><?php echo $rubrique;?></td>

                    <?php } ?>
                </tr>

                </thead>
                <tbody>

                <input type="hidden" name="nbr_FraixAcc" value="<?php print($nbr_Acc); ?>">
                <?php

                $i=0;
                $Frai_acc=array();

                $reponse=$bdd->query("select * from tab_Frais_Accessoire where id_mission=".$mission_id);
                while($donnees=$reponse->fetch())
                {
                    $Frai_acc[$i]=$donnees["id_frais_acc"];
                    $i++;
                    //print_r($Frai_acc[$i]."<br>");
                }


                $sql="select id_echantillon_GL,compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,debit_ech_gl,crd_ech_gl,sold_ech_gl
						
				from tab_ehantillon_gl_fraixacc 
				where id_mission='$mission_id' AND objectif='A5' AND type_fraixacc='production' and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles'" ;

                //$sqll_echant="SELECT * FROM tbl_fraixAcc_coutacquisition_immocorp  where id_echantillon_GL='$idechant_GL' AND id_mission='$mission_id'";
                $reponse=$bdd->query($sql);
                while($donnees=$reponse->fetch())
                {

					$sqlEchant="select
					prix_achat,
					cout,
					prix_achat,
					ec,
					tbl_fraixAcc_coutacquisition_immocorp.renvoi as renvoi,
					tbl_fraixAcc_coutacquisition_immocorp.observation as observation
					from tbl_fraixAcc_coutacquisition_immocorp 
								where id_mission='$mission_id' AND id_echantillon_GL='".$donnees["id_echantillon_GL"]."'";
					$rps=$bdd->query($sqlEchant);
					$don=$rps->fetch();


                    ?>
                    <input type="hidden" name="idechant_GL[]" value="<?php  print ($donnees["id_echantillon_GL"]);?>">
                    <tr class="echantillongl">
                        <td><?php echo $donnees['libelle_ech_gl'];?></td>
						<td> <input type="file" name="renvoi[]"/>
							<a href="RDC/renvoi/<?php echo $don["renvoi"]; ?>">
								<?php echo $don["renvoi"]; ?>
							</a>
						</td>
                        <td><input name="prix_achat[]" value="<?php print (number_format((double)$don["prix_achat"], 2, '.', ' ')); ?>" class="prix_" id="prix"></td>
                        <?php

                        for ($j=0;$j<$nbr_Acc;$j++)
                        {


                            $sqlechant="SELECT * FROM tbl_echant_fraixAcc_coutacquisition_immocorp,tbl_fraixAcc_coutacquisition_immocorp 
											where 
											tbl_echant_fraixAcc_coutacquisition_immocorp.id_echantillon_GL=tbl_fraixAcc_coutacquisition_immocorp.id_echantillon_GL 
											AND   tbl_fraixAcc_coutacquisition_immocorp.id_echantillon_GL='".$donnees["id_echantillon_GL"]."' AND id_mission='$mission_id' AND id_frais_acc='".$Frai_acc[$j]."'";
                            //print($sqlechant);
                            $rps_echant=$bdd->query($sqlechant);
                            $don_echant=$rps_echant->fetch();


                            ?>
                            <td><input name="Fraixacc[]" value="<?php print(number_format((double)$don_echant["prix_fraix"], 2, '.', ' '));   ?>"  class="Fraixacc" ></td>


                            <?php


                        }
                        ?>


                        <td><input name="cout[]" class="cout"  value="<?php print (number_format((double)$don["cout"], 2, '.', ' ')); ?>"  id="cout"></td>
                        <td><input name="montant[]"  class="montant" value="<?php print (number_format((double)$donnees["sold_ech_gl"], 2, '.', ' ')); ?>"></td>
                        <td><input  name="ecart_[]" class="ecart" value="<?php print (number_format((double)$don["ec"], 2, '.', ' ')); ?>" ></td>
                        <td><input name="observation[]" value="<?php print ($don["observation"]); ?>" id="observation"></td>
                    </tr>

                    <?php
                } ?>
                </tbody>
            </table>

        </form>

    </div>
</div>