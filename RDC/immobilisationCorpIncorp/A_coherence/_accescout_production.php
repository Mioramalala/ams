<?php
/**
 * Created by PhpStorm.
 * User: herenoch
 * Date: 31/08/2016
 * Time: 14:41
 */
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
$mission_id=@$_SESSION['idMission'];


include "$project_path/connexion.php";
?>



<script>
		$(".checkfrais_acc").unbind();
		/*
		La fonction est rappellé plusieurs fois, ainsi il est necessaire d'enlever cette partie
		*/
		$(".checkfrais_acc").click(function (e)
		{

				idfrais_acc=$(this).val();
				cout=$("#cout").val();
				transfertdata="idfrais_acc="+idfrais_acc+"&cout="+cout;


				if(!$(this).is(":checked"))
				{

					$.get("RDC/immobilisationCorpIncorp/A_coherence/supprime_fraixacc.php",transfertdata,function (res)
					{


					});
				}

		});
		// SUPPRESSION FRAIX ACCESSOIRE EXISTANT
		$(".SupprimerFraixacc").unbind();
		/*
		La fonction est rappellé plusieurs fois, ainsi il est necessaire d'enlever cette partie
		*/
		$("#SupprimerFraixacc").click(function (e)
		{

				if(confirm("Êtes vous sure de vouloir supprimer les fraix accessoires selectionner ?"))
				{
					datatransfert=$("#frmFraixacc").serialize();
					$.get("RDC/immobilisationCorpIncorp/A_coherence/suppression_fraixacc.php",datatransfert,function (res_)
					{
						$(".checkfrais_acc:checked").parent().remove();
						alert("La suppression a été faite avec succée");
					});
				}
		});


</script>

<div class="row" style="margin-left: 10px">

        <div id="frais_accessoir" class="col-md-3 panel_Fraixacc">
                    <div class="row">
                        <label for="texte">Ajouter des frais accessoires</label>
                        <input type="text" id="txtaccessoire" placeholder="Saisir ici...">
                        <button class="btn btn-primary" id="btnFraiAcc"><span class="glyphicon glyphicon-plus"></span></button>
                    </div>

                    <form id="frmFraixacc">
                        <input type="hidden" id="cout" name="cout" value="production">
                        <div id="listFraiAcc">
                            <label>Liste des frais accessoires</label>
                            <ul>
                                <?php
                                    $reponse=$bdd->query("select nom_frais_acc,id_frais_acc from tab_Frais_Accessoire where id_mission=".$mission_id);
                                    while($donnees=$reponse->fetch())
                                    {
                                        $idfraix=$donnees["id_frais_acc"];
                                        $sql1="select count(*) as 'nbr_'  from tbl_detaillefraix_acc where id_frais_acc='$idfraix' and type_fraixacc='production'";
                                        $req=$bdd->query($sql1);
                                        $res_=$req->fetch();


                                        ?>
                                        <li><input <?php if($res_["nbr_"]!=0){?> checked <?php } ?> type="checkbox" name="checkfrais_acc[]" class="checkfrais_acc" value="<?php echo $donnees['id_frais_acc'] ; ?>" ><?php echo $donnees['nom_frais_acc'] ;?></li>
                                        <?php
                                    }
                                ?>
        </ul>
        </div>
        <input type="button" value="Supprimer" id="SupprimerFraixacc"/>
        </form>
        </div>

        <div  class="col-md-3 panel_Fraixacc" style="padding: 120px 0 0 0">
            <input type="button" value="Sélectionner acquisitions" id="Slectionner_acquisitions"/>
        </div>
        <div id="contenue_travail"  class="col-md-5">
            <label for="texte" style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: bold;">Affichage échantillons coût d'acquisition</label>
            <form id="frmechantillion_type">
                <input type="hidden" id="cout" name="cout_" value="production">
                <div id="listeEchantillion">
                    <?php
                    $_GET["cout"]="production";
                    require_once ("Affichage_fraixacc_echant.php");

                    ?>

                </div>
            </form>
        </div>
        <div class="col-md-1 panel_Fraixacc" style="padding: 120px 0 0 0;float: left;">
            <input type="button" value="Suivant" id="Suivant_8"/>
        </div>

</div>