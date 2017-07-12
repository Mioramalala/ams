<?php 
	include 'connexion.php';
	if(isset($_POST['a'])){
		$rech=$_POST['a'];?>
		
		<div id="liste_entreprise">
									
									<?php 
										$sqlCompt="SELECT COUNT(ENTREPRISE_ID) AS cmp FROM tab_entreprise";
										$repC=$bdd->query($sqlCompt);
										$donneC=$repC->fetch();
										$cmp=$donneC['cmp'];
									
										$sqlListEntreprise='SELECT ENTREPRISE_ID,ENTREPRISE_DENOMINATION_SOCIAL,ENTREPRISE_CODE  
										 FROM  tab_entreprise';
										 
										 $sql_search='SELECT sales_id,customer_name,sales_description,sales_status FROM tab_sales_mark,tab_customer
													WHERE   tab_customer.customer_id = tab_sales_mark.customer_id AND (sales_description LIKE "%'.$rech.'%" or sales_id LIKE "%'.$rech.'%"
													or customer_name LIKE "%'.$rech.'%" or sales_status LIKE "%'.$rech.'%")
													order by sales_id desc';
										 
										 $reponseList=$bdd->query($sqlListEntreprise);
										 while($donnee_list=$reponseList->fetch()){
										 
										 $denom=$donnee_list['ENTREPRISE_DENOMINATION_SOCIAL'];
										 $Code=$donnee_list['ENTREPRISE_CODE'];
										 $ID=$donnee_list['ENTREPRISE_ID'];
										
									?>
									
												<div id="Entrep" class="clAcc" onclick="doubleclicker(this,<?php  echo $ID;?>)" onMouseOver="clicker(this,<?php  echo $ID;?>)" onMouseOut="miala()">
														
													<center>	
														<p style="height:25px; border-radius: 0 0 5px 5px; margin-top:49px; border-top:1px solid #ccc; background-color:#ccc;">
															<?php  echo $Code ;?>
														</p>
													</center>
												</div>
										
										<?php }?>
									
								</div>
		
		
		
		
		
		
		
<?php		
		}

?>