					<table id="listUser">
						<?php
							include '../connexion.php';
							$sql="SELECT UTIL_ID,UTIL_NOM,UTIL_LOGIN,UTIL_ACTIF,UTIL_STATUT,UTIL_MDP,STATUT_CONNEXION FROM   tab_utilisateur order by UTIL_NOM ASC ";
								$rep=$bdd->query($sql);
								$compt=0;
								while($donnee=$rep->fetch()){
									$idUtil=$donnee['UTIL_ID'];
									$nomU=$donnee['UTIL_NOM'];
									$logU=$donnee['UTIL_LOGIN'];
									$actif=$donnee['UTIL_ACTIF'];
									$statu=$donnee['UTIL_STATUT'];
									$mdp=$donnee['UTIL_MDP'];
									$connex=$donnee['STATUT_CONNEXION'];
						?>
									<tr height="50px" id="ligne<?php echo $compt;?>"  onclick="radier(<?php echo $idUtil;?>)">
										<td width="250px">
											<!--input type="radio" id="radio<?php// echo $compt;?>" name="rdname" value="<?php// echo $idUtil?>" /-->
											<?php echo $nomU ;?>
										</td>
										<td width="200px"><?php echo $logU; ?></td>
										
										<?php
											if($actif=="Actif"){
										?>
												<td width="100px" style="color:#12c300;"><?php echo $actif ;?></td>
										<?php
											}
											else{
										?>
												<td width="100px" style="color:red;"><?php echo $actif ;?></td>
										<?php
											}
										?>
										<td width="150px"><?php echo $mdp ;?></td>
										<?php 
											if($connex=="0"){
										?>
											<td width="150px" style="color:red;"> <?php echo "Hors ligne";?></td>
										<?php }
										else{
										?>
											<td width="150px" style="color:#12c300;"><?php echo "Connecté";?> </td>
										<?php } ?>
										
										<td> <img src="icone/btn_power.png" class="deconUser" alt="<?php echo $idUtil;?>" title="Déconnecter" onclick="decon(<?php echo $idUtil;?>,'<?php echo $nomU;?>')"/> </td>
									</tr>
						<?php	
									$compt++;
								}
				
						?>
					</table>