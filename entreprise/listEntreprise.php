<div id="liste_entreprise">
									
	<?php 
		$sqlCompt="SELECT COUNT(ENTREPRISE_ID) AS cmp FROM tab_entreprise";
		$repC=$bdd->query($sqlCompt);
		$donneC=$repC->fetch();
		$cmp=$donneC['cmp'];
	
		$sqlListEntreprise='SELECT ENTREPRISE_DENOMINATION_SOCIAL,ENTREPRISE_CODE 
		 FROM  tab_entreprise';
		 $reponseList=$bdd->query($sqlListEntreprise);
		
		 while($donnee_list=$reponseList->fetch()){
		 
		 $denom=$donnee_list['ENTREPRISE_DENOMINATION_SOCIAL'];
		 $Code=$donnee_list['ENTREPRISE_CODE'];
		 
		
	
	?>
	
				<div id="Entrep" class="clAcc">
						<?php  echo $Code ;?>
				</div>
		
		<?php }?>
	
</div>