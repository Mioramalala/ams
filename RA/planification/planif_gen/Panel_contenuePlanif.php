<?php
	session_start();
	$_SESSION['fonction']='Planification';
	include './../../../connexion.php';
	$mission_id=$_SESSION['idMission']; 
	$PLANIF_CYCLE=$_GET["PLANIF_CYCLE"];
?>

<div id="planif_stock" style="margin-left:0;">
			<div id="dv_fond_planif_gen">
						<div id="dv_fond_planif_gen1">
							<table id="tab_planif_gen" border="2">
								<tr>
									<td>
										<table border="1">
											
												<?php 

												$reponse_stock=$bdd->query("select count(*) as nb from tab_planif_gen_ra where PLANIF_CYCLE='$PLANIF_CYCLE' and VALIDER='1' and MISSION_ID='$mission_id'");
												$resultat_stock= $reponse_stock->fetch();
												$SQL_="";
												$nb_stock = $resultat_stock['nb'];
												if($nb_stock==0)
												{
													$SQL_="select PLANIF_GEN,SEUIL_SIGN as 'PLANIF_SEUIL_SIGN',TAUX_SONDAGE as 'PLANIF_TAUX_SONDAGE' from  tab_planification_ra where PLANIF_CYCLE='$PLANIF_CYCLE' AND MISSION_ID='$mission_id'";
												}else
												{
													$SQL_="select PLANIF_GEN_ID,PLANIF_GEN,PLANIF_SEUIL_SIGN ,PLANIF_TAUX_SONDAGE,VALIDER from  tab_planif_gen_ra where PLANIF_CYCLE='$PLANIF_CYCLE'  AND MISSION_ID='$mission_id'";
												}


														
													$reponse=$bdd->query($SQL_);
													$donnees=$reponse->fetch();
																
													$SEUIL_SIGN=$donnees['PLANIF_SEUIL_SIGN'];
													$TAUX_SONDAGE=$donnees['PLANIF_TAUX_SONDAGE'];
													$PLANIF_GEN=$donnees['PLANIF_GEN'];
													$PLANIF_GEN_ID=@$donnees['PLANIF_GEN_ID'];
												
													$Valider=@$donnees['VALIDER'];	
												?>
												<input type="hidden" name="PLANIF_CYCLE" value="<?php print ($PLANIF_CYCLE); ?>">
												<input type="hidden" name="PLANIF_GEN_ID" value="<?php print ($PLANIF_GEN_ID); ?>">
												  <tr>
													<td>
														<p style="color:blue;">Seuil de signification</p><br/>
														<textarea name="SEUIL_SIGN" rows="3px" cols="30px" id="fonct44" <?php  if($Valider==1){?> disabled="true" <?php }  ?>><?php echo $SEUIL_SIGN;?></textarea>
													</td>
													<td>
														<p style="color:blue;">Taux de sondage</p><br/>
														<textarea name="TAUX_SONDAGE" rows="3px" cols="30px" id="fonct444" <?php  if($Valider==1){?>  disabled="true" <?php }  ?> ><?php echo $TAUX_SONDAGE;?></textarea>
													</td>
															
													 <td>
														<p style="color:blue;">Planification</p><br/>
														<textarea name="PLANIF_GEN" rows="3px" cols="55px" id="fonct4" <?php  if($Valider==1){?>  disabled="true" <?php }  ?> ><?php echo $PLANIF_GEN;?></textarea>
													 </td>
											     </tr>		
												
										</table>
									</td>
								</tr>
								
							</table>
					</div>
			</div>
			<div id="id_btn_planif_gen" style="top:10px;margin-left:500px;">
				<table>
					<tr>
						<td>
							<?php if($nb_stock>0)
								  {
									?>
									<div class="btn_planif" style="background-color:#65c122; float:left; width:37px;"> <img src="RA/image/Check.png" width="35px" height="35px" alt="Valider"></div>
									<?php
							       }else
							       {
							      	?>
										<input class="btn_planif" type="button" value="Valider" id="btn_valideplanif" >
										<?php
									 } ?>
									<input class="btn_planif" type="button" value="Retour" id="btn_retour">
						</td>
					</tr>
				</table>
			 </div>
		</div>