<?php session_start();
	include '../../../connexion.php';
	$sql = "SELECT IMPORT_COMPTES,IMPORT_INTITULES, SUM(IMPORT_SOLDE) AS SOLDE,trc.CPBL_OBS obs,trc.CPBL_CP cp,trc.CPBL_ECART ecartCp,trc.ID trc_id FROM tab_importer ti LEFT JOIN tab_rap_cpbl trc ON trc.CPBL_COMPTE = ti.IMPORT_COMPTES AND trc.MISSION_ID = ti.MISSION_ID WHERE ti.IMPORT_CYCLE='H- Paie et Personnel'  AND ti.MISSION_ID=".$_SESSION['idMission']." GROUP BY IMPORT_COMPTES ORDER BY IMPORT_COMPTES ASC";
	$rep = $bdd->query($sql);
	$rowCount = $rep->rowCount();

	if ($rowCount != 0){
	
		$i = 0;
		$compte = "";
		$libelle = "";
		$soldeBL = 0;
		$observation = "";

		echo "<table class='h5'>";
		while( $don = $rep->fetch() ){
				$compte = $don['IMPORT_COMPTES'];
				$id=$don['trc_id'];
				$libelle = $don['IMPORT_INTITULES'];
				$soldeBL = number_format($don['SOLDE'],2,'.',' ');
				$observation =  $don['obs'];
				$cp =  $don['cp'];
				$ecartCp = number_format($don['ecartCp'],2,'.',' ');;

				$i++; // Pour compter le nombre d'affichage

				echo '
					<tr>
						<td width="200px" id="compte'.$i.'">'.$compte.'</td>
						<td width="200px">'.$libelle.'</td>
						<td width="200px" id="soldeBL'.$i.'">'.$soldeBL.'</td>
						<td width="200px"><input type="text" id="soldeCP'.$i.'" onkeyup="calculEcart(this)" onkeydwn="calculEcart(this)" value="'.$cp.'"/></td>
						<td width="200px" id="ecart'.$i.'">'.$ecartCp.'</td>
						<td width="200px"><textarea  id="obs'.$i.'">'.$observation.'</textarea></td>
						<td width="200px">
							<iframe style="display:none;" name="uploadFrame'.$i.'"></iframe>
							<form enctype="multipart/form-data" action="RDC/paie/paieC/envoi.php" method="POST" id="form'.$i.'" target="uploadFrame'.$i.'">
								<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
								<input type="file" id="fichier'.$i.'" name="fichier"/>
								<input style="display:none;" id="submit'.$i.'" type="submit" value="Upload" />
							</form>
						</td>
						<input type="hidden" value="'.$id.'" id="import_id'.$i.'"/>
						
					</tr>';
		}
		echo' </table>;
		<input type="hidden" value="'.$i.'" id="compteur"/>';
	}
?>

<script type="text/javascript">

var compteur=$('#compteur').val();




	
	
    function iterI(){
           for (var i = 1; i < compteur; i++) {
           	     calcul(i);
           	     
           }
          
       
       

    }

  function calcul(i){

    var soldeCP=$('#soldeCP'+i).val(),
        ecart=parseFloat($('#ecart'+i).html()),
        observation=$('#obs'+i).val(),
       // id=$('#import_id'+i).val(),
       compte = parseFloat($("#compte"+i).html()),
       	soldeBL = parseFloat($("#soldeBL"+i).html());		
     

      $.ajax({
             type:"POST",
             url:"RDC/paie/paieC/saveC2b.php",
             data:{
             	observation:observation,ecart:ecart,soldeCP:soldeCP,compte:compte,soldeBL:soldeBL
             },
             success:function(response){
                    console.log('obs:'+observation+' - '+'ecart: '+ecart+'- soldeCP: '+soldeCP+' - soldeBL: '+soldeBL+'compte: '+compte);
             }
 
      });
	



    
       
  }

</script>

