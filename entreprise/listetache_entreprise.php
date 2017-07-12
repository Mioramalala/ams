<?php
require "../connexion.php";
			@session_start();
			$idMission =@$_SESSION["idMission"];
			$res=array();
			$listeFonction=array();
			$selectlistTache="";
			$list_tacheget=array();
			$list_tacheget=@$_GET['tacheETEND'];

			
			
			

				$sql_="";
				$listeFonction = array();
				//$processus_tache=@$_GET["processus_tache"];




				if(count($list_tacheget)!=0)
				{

					global $sql_,$selectlistTache,$list_tacheget,$listeFonction,$idMission;
					$selectlistTache=implode("','", $list_tacheget);
					$selectlistTache="'".$selectlistTache."'";

					global $sql_,$res;
						$sql = "select distinct fonction_tache from tab_tache where  processus_tache in($selectlistTache)";
					

						//print $sql;

						$sql = "select distinct fonction_tache from tab_tache where  processus_tache in($selectlistTache)";
					
						$sql_ = "select distinct t.processus_tache, t.formulation_tache, t.id_tache, t1.tache_id
						from tab_tache t
						left join 
							(	select td.tache_id, td.statut
								from tab_distribution_tache td 
								where td.mission_id =".$idMission." 
								and td.statut = 'actif' 
							) as t1 
						on t.id_tache = t1.tache_id 
						where t.processus_tache in($selectlistTache) and t1.tache_id is null  	
						and t.fonction_tache = :fonction"; 

						$req = $bdd->query($sql);
						while($res = $req->fetch()){
							$listeFonction[] = $res['fonction_tache'];
						}

						

				}else
				{
						global $sql_,$listeFonction,$idMission,$res;
						
						$sql = "select distinct fonction_tache from tab_tache ";
					

						$sql_ = "select distinct t.processus_tache, t.formulation_tache, t.id_tache, t1.tache_id
						from tab_tache t
						left join 
							(	select td.tache_id, td.statut
								from tab_distribution_tache td 
								where td.mission_id =".$idMission." 
								and td.statut = 'actif' 
							) as t1 
						on t.id_tache = t1.tache_id 
						where   t1.tache_id is null  	
						and t.fonction_tache = :fonction";

						$req = $bdd->query($sql);
						while($res = $req->fetch()){
							$listeFonction[] = $res['fonction_tache'];
						}

						

				}



					$req = $bdd->prepare($sql_);


						foreach ($listeFonction as $nomFonction) 
						{ 
						?>
						<h4><a href="#"><?php echo $nomFonction;?></a></h4>
						<div class="liste-accordion">
				      		<ul nav nav-tabs nav-stacked>
								<?php
									$req->execute(array('fonction' => $nomFonction));
									while ($res = $req->fetch()) {
								?>
								<li idTache="<?php echo $res['id_tache']?>"><?php echo $res['formulation_tache']?></li>	
							<?php	} ?>
							</ul>
				  		</div>
					<?php	
						}
					?>