<?php 
	include 'connexion.php';
	$search=$_POST["a"];

?>

<div id="plusieurs_entreprise">
		<?php
			
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////
						$sqlCompt="SELECT COUNT(ENTREPRISE_ID) AS cmp FROM tab_entreprise";
						$repC=$bdd->query($sqlCompt);
						$donneC=$repC->fetch();
						$cmp=$donneC['cmp'];
					
						$sqlListEntreprise='SELECT ENTREPRISE_ID,ENTREPRISE_DENOMINATION_SOCIAL,ENTREPRISE_CODE,ENTREPRISE_DATE_CREATION,
						ENTREPRISE_RAISON_SOCIAL , LOGO FROM  tab_entreprise WHERE ENTREPRISE_DENOMINATION_SOCIAL LIKE "%'.$search.'%"
						OR ENTREPRISE_CODE LIKE "%'.$search.'%" OR ENTREPRISE_RAISON_SOCIAL LIKE "%'.$search.'%"' ;
						
						 $reponseList=$bdd->query($sqlListEntreprise);
						 while($donnee_list=$reponseList->fetch()){
						 
						 $denom=$donnee_list['ENTREPRISE_DENOMINATION_SOCIAL'];
						 $Code=$donnee_list['ENTREPRISE_CODE'];
						 $ID=$donnee_list['ENTREPRISE_ID'];
						 $date_cre=$donnee_list['ENTREPRISE_DATE_CREATION'];
						 $Raison_Sos=$donnee_list['ENTREPRISE_RAISON_SOCIAL'];
						$logo=$donnee_list['LOGO'];
		
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////
		
			?>
				<div id="entreprise-<?php echo $ID; ?>" class="un_entreprise" onMouseOver="afficheStatut(<?php echo $ID; ?>)" onclick="doubleclicker(this,<?php  echo $ID;?>);NameProcess('<?php echo $ID; ?>')" >
					<div class="logo_entreprise">
						<img src="../<?php if(@$logo!=""){echo $logo;} else{ echo "icone/logo_ams_blanc.png";}?>" height="100%" width="100%" />
					</div>
					<div class="info_entreprise">
						<div class="nom_entreprise"><?php  echo $Code.'  '.$Raison_Sos;?> </div>
						<div class="date_existe_entreprise"><?php  echo $date_cre ;?></div>
					</div>
				</div>
			<?php
			}
			?>
	</div>