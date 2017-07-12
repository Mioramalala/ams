<?php session_start();
	include '../../../connexion.php';
	$sql = "SELECT * FROM tab_importer WHERE IMPORT_COMPTES REGEXP '^(64)' AND MISSION_ID=".$_SESSION['idMission']." ORDER BY IMPORT_COMPTES ASC";
	$rep = $bdd->query($sql);
	$rowCount = $rep->rowCount();
/*SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
2FROM proprietaires p
3LEFT JOIN jeux_video j
4ON j.ID_proprietaire = p.ID*/
	if ($rowCount != 0){
	
		$i = 0;
		$compte = "";
		$libelle = "";
		$motant = 0;
		$budget = 0;
		$ecart = 0;
		$commentaire = "";

		echo "<table class='h2'>";
		while( $don = $rep->fetch() ){
			if($i == 0){
				$id= $don['IMPORT_ID'];
				$compte = $don['IMPORT_COMPTES'];
				$libelle = $don['IMPORT_INTITULES'];
				$motant = $don['IMPORT_SOLDE'];
				$budget = $don['IMPORT_BUDGET'];
				$ecart = $don['IMPORT_ECART'];
				$commentaire = $don['IMPORT_COMMENTAIRE']; /*$don['RA_COMMENTAIRE'];*/
				$i++;
			}
			else{
				if($don['IMPORT_COMPTES'] == $compte ){
					$id= $don['IMPORT_ID'];
					$libelle = $don['IMPORT_INTITULES'];
					$motant = $don['IMPORT_SOLDE'];
					$budget = $don['IMPORT_BUDGET'];
					$ecart = $don['IMPORT_ECART'];
					$commentaire = $don['IMPORT_COMMENTAIRE']; /*$don['RA_COMMENTAIRE'];*/;
				}
				else{
					echo '
						<tr>
							<td width="200px" id="compte'.$i.'">'.$compte.'</td>
							<td width="200px" id="libelle'.$i.'">'.$libelle.'</td>
							<td width="200px" id="montant'.$i.'">'.(double)$motant.'</td>
							<td width="200px"><input id="budget'.$i.'" onKeydown="calculEcart(this,'.$i.')" onKeyup="calculEcart(this,'.$i.')" value='.$budget.'></td>
							<td width="200px" id="ecart'.$i.'">'.(double)$ecart.'</td>
							<td width="200px"><textarea id="cmt'.$i.'">'.$commentaire.'</textarea></td>
							<input type="hidden" id="valId'.$i.'"  value='.$id.' style:"display:none;" />
						</tr>';
						$id= $don['IMPORT_ID'];
						$compte = $don['IMPORT_COMPTES'];
						$libelle = $don['IMPORT_INTITULES'];
						$motant = $don['IMPORT_SOLDE'];
						$budget = $don['IMPORT_BUDGET'];
						$ecart = $don['IMPORT_ECART'];
						$commentaire = $don['IMPORT_COMMENTAIRE']; /*$don['RA_COMMENTAIRE'];*/
						$i++;
				}
			}
		}
		echo '
			<tr>
				<td width="200px" id="compte'.$i.'">'.$compte.'</td>
				<td width="200px" id="libelle'.$i.'">'.$libelle.'</td>
				<td width="200px" id="montant'.$i.'">'.(double)$motant.'</td>
				<td width="200px"><input id="budget'.$i.'" onKeydown="calculEcart(this,'.$i.')" onKeyup="calculEcart(this,'.$i.')" /></td>
				<td width="200px" id="ecart'.$i.'">'.(double)$ecart.'</td>
				<td width="200px"><textarea id="cmt'.$i.'">'.$commentaire.'</textarea></td>
			</tr>
		</table>
		<span id="compteur" alt="'.$i.'"></span>;
		<span id="nblign" style:"display:none;">'.$rowCount.'</span>';
		

	}
?>

<script type="text/javascript">

   
    var nbLigne=$('#nblign').html();
 	
 	console.log("hello njary");
  
   function iterI(){
	   for( var i=1; i<nbLigne;  i++){
	   	  calcul(i);
	   	  
	   };
	 }

     


    function calcul(i){
		

		 	 var budget_id='#budget'+i,
		 	     budget=$(budget_id).val(),
		 	     valId='#valId'+i,
		 	     id=$(valId).val(),
		 	     ecart_id='#ecart'+i,
		 	     ecart=parseFloat($(ecart_id).html()),
		 	     commentaire_id='#cmt'+i,
		 	     commentaire=$(commentaire_id).val();

	            if(!budget) budget=0;
	            if(!ecart) ecart=0;
	            if(!commentaire) commentaire="";

            if(id){
		        $.ajax({
		               type:"post",
		               url:"RDC/paie/paieA/saveA23.php",
		               data:{
		               	id:id,budget:budget,ecart:ecart,commentaire:commentaire
		               },
		               success:function(response){
		               		console.log("rep.server: "+response);
		               }	              
		                 
		          });
		      }

		 
	}
	//setTimeout(iterI);
  
</script>