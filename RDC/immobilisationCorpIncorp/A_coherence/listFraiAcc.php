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
	include "$project_path/connexion.php";
					$mission_id=@$_SESSION['idMission'];
					
					?>
					
				<!--	
				<label><b>liste des frais accessoires</b></label>
					<p class="grand_Titre" style="color:#fff">Rubrique</p>
					<div style="height:200px;overflow:auto; margin-top:-10px;">
				<table style="border-collapse:collapse; width:100%;">
			-->
					
					
					<label>Liste des frais accessoires</label>
					<ul>
						<?php
							$reponse=$bdd->query("select nom_frais_acc,id_frais_acc from tab_Frais_Accessoire where id_mission=".$mission_id);
							while($donnees=$reponse->fetch())
							{
								$idfraix=$donnees["id_frais_acc"];
								$sql1="select count(*) as 'nbr_'  from tbl_detaillefraix_acc where id_frais_acc='$idfraix' and type_fraixacc='accuisition'";
								$req=$bdd->query($sql1);
								$res_=$req->fetch();


								?>
								<li><input <?php if($res_["nbr_"]!=0){?> checked <?php } ?> type="checkbox" name="checkfrais_acc[]" class="checkfrais_acc" value="<?php echo $donnees['id_frais_acc'] ; ?>" ><?php echo $donnees['nom_frais_acc'] ;?></li>
							<?php
							}
						?>
					</ul>
					
					<?php
					/*
					
						$reponse=$bdd->query("select nom_frais_acc from tab_Frais_Accessoire where id_mission=".$mission_id);
				while($donnees=$reponse->fetch()){
				$rubrique=$donnees['nom_frais_acc'];

					?>
					<tr>
						<td style="height:15px; background-color:#F0FFF0;border:1px solid #778899;"><center><?php echo $rubrique ;?></center></td>
					</tr>
					<?php 
					}
					?>
				</table>
			</div>

*/