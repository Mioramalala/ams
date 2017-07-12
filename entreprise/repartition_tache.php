<?php
@session_start();
$idMission = $_POST["idMission"];
$_SESSION["idMission"] = $idMission;
require "../connexion.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap-select.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/datepicker.css">
        <link rel="stylesheet" type="text/css" href="../css/new-mission.css">
        <script type="text/javascript" src="../css/bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="../css/bootstrap/js/jquery-ui.js"></script>
        <script type="text/javascript" src="../css/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="../css/bootstrap/js/bootstrap-select.js"></script>
        <script type="text/javascript" src="../css/bootstrap/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../css/bootstrap/js/locales/bootstrap-datepicker.fr.js" charset="UTF-8"></script>

        <script type="text/javascript" src="../js/repartition_tache.js"></script>
    </head>

    <body>
        <div class="row col-md-offset-2">
            <div id="repartition-tache" class="row midina" style="height: 430px">
                <input id="idMission" type="hidden" value="<?php echo $idMission; ?>">
                <h3>Répartition des tâches </h3>
                <div class="trait"></div>


                <div style="text-align:left">

                    <label>ETENDU DE LA MISSION</label>
                    <br>

                    <?php
                    $selectlistTache = "";
                    $checkRSCI = "";
                    $checkRA = "";
                    $checkRDC = "";
                    $checkRAPFINAL = "";

                    //CHECK REPARTITION 
                    $sqlCHECKrepart = "select * from tab_repartionEtendue where id_mission='$idMission'";
                    //print ($sqlCHECKrepart);


                    $req = $bdd->query($sqlCHECKrepart);
                    while ($res = $req->fetch()) {
                        global $checkRSCI, $checkRAPFINAL, $selectlistTache;
                        if ($res['id_tache'] == "RSCI") {
                            //print "CHEKECTfff";
                            $checkRSCI = "checked";
                            if ($selectlistTache == "")
                                $selectlistTache = "'RSCI'";
                        }else if ($res['id_tache'] == "RA") {
                            $checkRA = "checked";
                            if ($selectlistTache == "")
                                $selectlistTache = "'RA'";
                            else
                                $selectlistTache = $selectlistTache . ",'RA'";
                        }else if ($res['id_tache'] == "RDC") {
                            $checkRDC = "checked";
                            if ($selectlistTache == "")
                                $selectlistTache = "'RDC'";
                            else
                                $selectlistTache = $selectlistTache . ",'RDC'";
                        }


                        else if ($res['id_tache'] == "RF") {
                            $checkRAPFINAL = "checked";
                            if ($selectlistTache == "")
                                $selectlistTache = "'RF'";
                            else
                                $selectlistTache = $selectlistTache . ",'RF'";
                        }
                    }


                    //print "selectlistTache:".$selectlistTache;
                    ?>
                    <form id="Frm_tacheETEND">
                        <input  type="checkbox" value="RSCI" class="tacheETEND"  name="tacheETEND[]"  <?php if ($checkRSCI == "checked") { ?> checked <?php } ?> >  RSCI   <input   value="RA" type="checkbox" class="tacheETEND" name="tacheETEND[]" <?php if ($checkRA == "checked") { ?> checked <?php } ?>  >  RA    <input value="RDC" type="checkbox" class="tacheETEND" name="tacheETEND[]" <?php if ($checkRDC == "checked") { ?> checked <?php } ?>  >  RDC  <input value="RF" type="checkbox" class="tacheETEND" name="tacheETEND[]" <?php if ($checkRAPFINAL == "checked") { ?> checked <?php } ?>  >  RAP FINAL
                    </form>
                    <?php
                    //DEBUT SCROLL AVANCEMENT  REPARTITION DES TACHES
                    /* 	@session_start();
                      $nom_table      = array('tab_balance_general','tab_bal_aux','tab_commentaire_ra','tab_conclusion_ra','tab_gl_aux','tab_gl_gen','tab_incidence_ra','tab_planification_ra','tab_planif_gen_ra','tab_ra','tab_structure_pcg_ra','tab_synthese_ra','tab_importer','tab_synthese_rsci_ra');
                      $nom_table_rdc  = array('tab_echantillon_bal_aux','tab_cadrage_salaire','tab_c1','tab_cad_salaire_cnaps','tab_cad_salaire_irsa','tab_cad_salaire_smids','tab_d6','tab_e5','tab_e6','tab_e7','tab_elt_annexe','tab_elt_annexe_dcd','tab_f1','tab_f6','tab_f9_2','tab_g1','tab_g2','tab_g3','tab_g4','tab_g6','tab_g7','tab_i3','tab_i4','tab_j2','tab_j3','tab_observation_rdc','tab_rap_cpbl','tab_rap_irsa_cnaps','tab_rap_person_budget','tab_rdc','	tab_rdc_cf_f3','tab_rdc_cf_f7','tab_rdc_cf_f9','tab_rdc_cf_f10','tab_rdc_st_d2','tab_rdc_st_d3','tab_recapassurance','tab_reeval_emprunt','tab_reslt_fiscal','tab_risque_lie_systeme','tab_somme_gl_aux','tab_somme_gl_gen','tab_synthese_feuille_rdc','tab_validation_synthese_rdc','tab_rdc_cf_f2','tab_rdc_cf_f4_1','tab_rdc_cf_f4_2','tab_rdc_cf_f5','tab_rdc_st_d4','tab_rdc_st_d5','tab_suivi_export_fichier');
                      $nom_table_rdc1 = array('tab_bal_gen_mission','tab_echantillon_bl','tab_ehantillon_gl','tab_frais_accessoire','tab_rdc_cf_f8');

                      $req_miss   = "select MISSION_ID,ENTREPRISE_ID,MISSION_DEADLINE,MISSION_ANNEE,MISSION_TYPE,DATE_NOW from tab_mission where MISSION_ID='$idMission'";
                      $rep_miss   = $bdd->query($req_miss);
                      $don_miss = $rep_miss->fetch();



                      $MissDeadline  = $don_miss['MISSION_DEADLINE'];
                      $IntDeadline   = (int)$MissDeadline;
                      $date_now      = $don_miss["DATE_NOW"];
                      $IntDateNow    = (int) $date_now;

                      $id_mission    = $don_miss["MISSION_ID"];
                      $id_entreprise = $don_miss["ENTREPRISE_ID"];
                      $mission_type  = $don_miss["MISSION_TYPE"];
                      $mission_annee = $don_miss["MISSION_ANNEE"];


                      /////////////////////////progressbar RA//////////////////////////////////////
                      $compteur=0;
                      foreach($nom_table as $valeur)
                      {
                      $sql_recup_ra = "select count(MISSION_ID) as recup_nbr_ra from ".$valeur." where MISSION_ID=".$id_mission;
                      $recup_ra     = $bdd->query($sql_recup_ra);
                      $don_recup_ra = $recup_ra->fetch();
                      $x            = $don_recup_ra['recup_nbr_ra'];
                      if($x > 0) {
                      $compteur++;
                      }
                      }
                      $poucentage_ra = ($compteur*14)/20;

                      //print "poucentage_ra/".$poucentage_ra."/20<br>";
                      //FIN SCROLLL AVANCEMENT  REPARTITION DES TACHES
                      $pourcentageRA=$poucentage_ra*100/20;
                      ?>
                      <label>%  RA:</label>
                      <br>
                      <meter style="width:320px" value="<?php echo $pourcentageRA;?>" max="100"></meter>
                      <br><?php






                      /////////////////////////progressbar RDC MISSION_ID//////////////////////////////////////
                      $compteur_rdc  = 0;
                      foreach($nom_table_rdc as $valeur_rdc) {
                      $sql_recup_rdc = "select count(MISSION_ID) as recup_nbr_rdc from ".$valeur_rdc." where MISSION_ID =".$id_mission;
                      $recup_rdc     = $bdd->query($sql_recup_rdc);
                      $don_recup_rdc = $recup_rdc->fetch();
                      $y             = $don_recup_rdc['recup_nbr_rdc'];
                      if($y > 0) {
                      $compteur_rdc++;
                      }
                      }
                      $poucentage_rdc = ($compteur_rdc*51)/52;
                      //print "poucentage_rdc/".$poucentage_rdc."/52<br>";

                      $poucentage_rdc=$poucentage_rdc*100/52;

                      ?>
                      <label>% RDC:</label>
                      <br>
                      <meter style="width:320px" value="<?php echo $$poucentage_rdc;?>" max="100"></meter>
                      <br>
                      <?php









                      /////////////////////////progressbar RSCI id_mission//////////////////////////////////////
                      $compteur_rdc1  = 0;
                      foreach($nom_table_rdc1 as $valeur_rdc1) {
                      $sql_recup_rdc1 = "select count(id_mission) as recup_nbr_rdc1 from ".$valeur_rdc1." where id_mission=".$id_mission;
                      $recup_rdc1     = $bdd->query($sql_recup_rdc1);
                      $don_recup_rdc1 = $recup_rdc1->fetch();
                      $z              = $don_recup_rdc1['recup_nbr_rdc1'];
                      if($z > 0) {
                      $compteur_rdc1++;
                      }
                      }
                      $poucentage_rdc1 = ($compteur_rdc1*5)/3;


                      //print "RSCI/".$poucentage_rdc1."/3<br>";


                      $poucentage_rdc1=$poucentage_rdc1*100/3;
                      ?>
                      <label>% RSCI:</label>
                      <br>
                      <meter style="width:320px;" value="<?php echo $poucentage_rdc1;?>" max="100"></meter>

                     */
                    ?>

                </div>








                    <?php
                    $sql_ = "";
                    $listeFonction = array();
                    //$processus_tache=@$_GET["processus_tache"];

                    if ($selectlistTache != "") {
                        global $sql_;
                        $sql = "select distinct fonction_tache from tab_tache where  processus_tache in($selectlistTache)";
                        //print $sql;


                        $sql_ = "select distinct t.processus_tache, t.formulation_tache, t.id_tache, t1.tache_id
						from tab_tache t
						left join 
							(	select td.tache_id, td.statut
								from tab_distribution_tache td 
								where td.mission_id =" . $idMission . " 
								and td.statut = 'actif' 
							) as t1 
						on t.id_tache = t1.tache_id 
						where t.processus_tache in($selectlistTache) and t1.tache_id is null  	
						and t.fonction_tache = :fonction";

                        $req = $bdd->query($sql);
                        while ($res = $req->fetch()) {
                            $listeFonction[] = $res['fonction_tache'];
                        }
                    } else {
                        global $sql_;
                        $sql = "select distinct fonction_tache from tab_tache";
                        //print $sql;

                        $sql_ = "select distinct t.processus_tache, t.formulation_tache, t.id_tache, t1.tache_id
						from tab_tache t
						left join 
							(	select td.tache_id, td.statut
								from tab_distribution_tache td 
								where td.mission_id =" . $idMission . " 
								and td.statut = 'actif' 
							) as t1 
						on t.id_tache = t1.tache_id 
						where   t1.tache_id is null  	
						and t.fonction_tache = :fonction";

                        $req = $bdd->query($sql);
                        while ($res = $req->fetch()) {
                            $listeFonction[] = $res['fonction_tache'];
                        }
                    }




                    //affichage par fonction de chaque tache
                    //print  "<BR>".$sql_;		
                    $req = $bdd->prepare($sql_);
                    ?>

                <div class="col-xs-5 panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tâches</h3>
                    </div>
                    <div id="liste-tache" class="panel-body">
                <?php
                foreach ($listeFonction as $nomFonction) {
                    ?>
                            <h4><a href="#"><?php echo $nomFonction; ?></a></h4>
                            <div class="liste-accordion">
                                <ul nav nav-tabs nav-stacked>
                    <?php
                    $req->execute(array('fonction' => $nomFonction));
                    while ($res = $req->fetch()) {
                        ?>
                                        <li idTache="<?php echo $res['id_tache'] ?>"><?php echo $res['formulation_tache'] ?></li>	
                    <?php } ?>
                                </ul>
                            </div>
                    <?php
                }
                ?>
                    </div>
                </div>

                <div class="col-xs-5 panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Superviseur</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        //recupère le superviseur
                        echo "idMission=".$idMission  ."zay";
                        $sql = "select util_id, superviseur_nom from tab_superviseur where mission_id =" . $idMission;
                        $req = $bdd->query($sql);
                        $res = $req->fetch();
                        ?>
                        <h4>
                            <img src="icone/superviseur.png" alt="">
                            <a href="#"><?php echo $res['superviseur_nom']; ?></a>
                        </h4>
                    </div>
                    <div class="panel-footer">
                        <select class="selectpicker" name="superviseur" id="selectSuperviseur">
                            <option selected="selected">Selectionnez un intervenant</option>
                        <?php
                        $sql = "select t.util_nom, t.util_id, t1.collab_util_id, t.util_statut
									from tab_utilisateur t
									left join (
										select tc.collab_util_id, tc.collab_statut
										from tab_collaborateur tc
										where tc.collab_mission_id =" . $idMission . "
									) as t1
									on t.util_id = t1.collab_util_id
									where (t1.collab_util_id is null or t1.collab_statut = 'actif')
									and t.util_statut = 0";
                        $req = $bdd->query($sql);
                        while ($res = $req->fetch()) {
                            $nomUtilisateur = $res["util_nom"];
                            $idUtilisateur = $res["util_id"];
                            ?>
                                <option value="<?php echo $idUtilisateur; ?>"><?php echo $nomUtilisateur; ?></option>
    <?php
}
?>
                        </select>
                        <button id="modifSuperviseur" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                    </div>
                </div>

                <div class="col-xs-5 panel panel-primary" id="accordion-resizer">
                    <div class="panel-heading">
                        <h3 class="panel-title">Auditeurs</h3>
                    </div>
                    <div id="liste-auditeur" class="panel-body" style="height: 200px">
                            <?php
                            //recupere les taches déja attribuées
                            $smtn = "	select t.formulation_tache, t.id_tache, t1.tache_id, t1.util_id 
									from tab_tache t
									left join 
										(	select td.tache_id, td.util_id, td.statut
											from tab_distribution_tache td 
											where td.mission_id =" . $idMission . "
											and td.util_id = :idAuditeur 
										) as t1 
									on t.id_tache = t1.tache_id 
									where t1.tache_id is not null and t1.statut = 'actif'";
                            $reqTache = $bdd->prepare($smtn);


                            //recupere la liste des intervenant pour cette mission
                            $sql = "select collab_util_nom, collab_util_id from tab_collaborateur where collab_mission_id =" . $idMission . " and collab_statut = 'actif'";
                            $req = $bdd->query($sql);

                            while ($res = $req->fetch()) {
                                ?>	
                            <h4>
                                    <img src="icone/auditeur.png" alt=""><!-- <span class="badge">4</span> -->
                                <a href="#"><?php echo $res['collab_util_nom']; ?></a>
                                <span idAuditeur="<?php echo $res['collab_util_id']; ?>" class="glyphicon glyphicon-remove" style="float:right;"></span>
                            </h4>
                            <div class="liste-accordion"  >
                                <ul idAuditeur = "<?php echo $res['collab_util_id']; ?>" nav nav-tabs nav-stacked>
                            <?php
                            $reqTache->execute(array('idAuditeur' => $res['collab_util_id']));
                            //echo $reqTache->rowCount();
                            while ($resTache = $reqTache->fetch()) {
                                ?>
                                        <li idTache="<?php echo $resTache['tache_id']; ?>" class="ui-draggable" idAuditeur="<?php echo $resTache['util_id']; ?>"><?php echo $resTache['formulation_tache'] ?></li>
                                <?php
                            }
                            ?>
                                    <!-- <li class="placeholder">Déplacer les tâches ici</li> -->
                                </ul>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="panel-footer">
                        <select class="selectpicker" name="auditeur">
                            <option selected="selected">Selectionnez un intervenant</option>
<?php
$sql = "select t.util_nom, t.util_id, t1.collab_util_id, t.util_statut
									from tab_utilisateur t
									left join (
										select tc.collab_util_id, tc.collab_statut
										from tab_collaborateur tc
										where tc.collab_mission_id =" . $idMission . "
									) as t1
									on t.util_id = t1.collab_util_id
									where (t1.collab_util_id is null or t1.collab_statut = 'inactif')
									and t.util_statut = 0";
$req = $bdd->query($sql);
while ($res = $req->fetch()) {
    $nomUtilisateur = $res["util_nom"];
    $idUtilisateur = $res["util_id"];
    ?>
                                <option value="<?php echo $idUtilisateur; ?>"><?php echo $nomUtilisateur; ?></option>
                            <?php
                        }
                        ?>
                        </select>
                        <button id="addAuditeur" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter</button>
                    </div>

                </div>
            </div>
            <div class="trait" style="width:80%;"></div>
            <div class="row midina">
                <button class="btn btn-primary" id="btnValider">Enregistrer la répartition des tâches</button>
                <button class="btn btn-default" id="btnAnnuler">Annuler</button>
            </div>
        </div>
    </body>
</html>
