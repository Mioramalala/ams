<?php 
//////////////////////// POST MAKA ID SY CYCLE ////////////////////////
	include '../connexion.php';
	$IdUser=$_POST['envoi'];
	$listeChecked=Array();
	$listeChecked=$_POST['listvalChecked'];

	//echo $listeChecked[0];
	//exit();
	/////////////////get id Mission//////////////////////
		$sql="SELECT MAX(MISSION_ID) AS idMAX  FROM tab_mission";
		$rep=$bdd->query($sql);
		
		$donnee=$rep->fetch();
		$idmission=$donnee['idMAX'];
	////////////////////////////////////////////////////////	
		$ListTach= $listeChecked[0];
		$ListTach_tab=@split('[,]',$ListTach);
		$ListTach="";
		for($i=0;$i<count($ListTach_tab);$i++)
		{
		   if($i==count($ListTach_tab)-1)
			$ListTach=$ListTach."'".$ListTach_tab[$i]."'";
		   else
			$ListTach=$ListTach."'".$ListTach_tab[$i]."',";
		}
		
		//////////////////////////////////////req insert///////////////////////////
		$nbrTac=count($ListTach_tab);
		  
		  for($i=0;$i<$nbrTac;$i++){
		   $typefiche=$ListTach_tab[$i];
		 	   $reqInsertMiss=$bdd->prepare("INSERT INTO  tab_distribution_tache ( nom_tache, 
				UTIL_ID, MISSION_ID) VALUE (:a,:z,:e)");
				$reqInsertMiss->execute(array(
				'a'=>$typefiche,
				'z'=>$IdUser ,
				'e'=>$idmission 
				
				));

		 ///////////////////////////////////////////////////////////////////////////////////////////////////////////
			}		
	
	
	$sqlenoch="SELECT nom_tache FROM tab_distribution_tache WHERE MISSION_ID=".$idmission." AND UTIL_ID=".$IdUser ;
	$valiny=$bdd->query($sqlenoch);?>
	
	<ul id="listSel">
	
		<?php while($data=$valiny->fetch()){
			$nomTache=$data['nom_tache'];
			///////////////////////////select pouravoir l'id du tache////////////////////////////
			$selid="SELECT id_cycle FROM tab_cycle WHERE nom_tache='".$nomTache."'";
			$valId=$bdd->query($selid);
			$val=$valId->fetch();
			$dataId=$val['id_cycle'];
			
			?>
			
				<li><input type="checkbox" name="chackNam[]" multiple='multiple' id="<?php echo $dataId;?>"> <?php echo $nomTache;?> </li>
		
			
		<?php }
			//////////////////////////////////////////////////////////////////////////////
			exit();
		
		/////////////////////////////////////////////filtrage tache deja acqui///////////////////////////////////////////////
			?>
	</ul>
		<?php 
			$sqlCompte="SELECT COUNT(nom_tache) AS COMPTE FROM tab_distribution_tache";
			
			$rep0=$bdd->query($sqlCompte);
			
			$donnees=$rep0->fetch();
			$nombre=$donnees['COMPTE'];
			$tab_array=Array($nombre);
		
			$sqlCycleD="SELECT DISTINCT nom_tache FROM  tab_distribution_tache  WHERE MISSION_ID=".$idmission;
			$i=0;
			$concatDis='';
			$rep=$bdd->query($sqlCycleD)or die(mysql.error());
			while($donnCycl=$rep->fetch()){
				$tab_array[$i]="'".$donnCycl['nom_tache']."'";
				$concatDis=$concatDis.",'".$donnCycl['nom_tache']."'";
				
				$i++;
				
			}
			
			$izy=substr($concatDis,1,strlen($concatDis)-1);
			
			exit();
			
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	///////////////////////////////////////////////filtrage affichage tache/////////////////////////////////////////////////////
	?>
	
	<div id="list_tache_cycle2">
		<table id="list_tach">
			
					<?php 
						$sqlCycle="SELECT id_cycle,nom_tache FROM  tab_cycle WHERE nom_tache NOT IN ($izy)  ORDER BY id_cycle asc";
						
						$rep=$bdd->query($sqlCycle);
						while($donnCycl=$rep->fetch()){
						
							$leCycle=$donnCycl["nom_tache"];
							$leCycle=$donnCycl["nom_tache"];
							$id_cycle=$donnCycl["id_cycle"];
					
					?>
		
			<tr>
				<td> <input type="checkbox" name="radCyclName[]" multiple='multiple' id="<?php echo $id_cycle;?>" value="<?php echo $leCycle;?>"/> </td>
				<td> <?php echo'le cycle'.$leCycle; ?> </td>
			</tr>
			<?php }?>
		</table>	
	</div>
