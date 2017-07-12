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
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
include "$project_path/connexion.php";

	$listechant_GL=array();
	$prix_achat=array();
	$cout=array();
	$ecart_=array();
	$Fraixacc=array();
	$observation=array();
	$montant=array();
	
	

	$nbr_FraixAcc=$_POST["nbr_FraixAcc"];


	$listechant_GL=$_POST["idechant_GL"];
	$prix_achat=$_POST["prix_achat"];
	$renvois=$_FILES["renvoi"];

	$ecart_=$_POST["ecart_"];
	
	$Fraixacc=$_POST["Fraixacc"];
	$observation=$_POST["observation"];  
	$cout=$_POST["cout"];
	$montant=$_POST["montant"];              

// var_dump($Fraixacc);

	$i=0;
	foreach ($listechant_GL as $idechant_GL) 
	{
				$renvoi_path="";
				$renvoi="";
				if(isset($renvois["name"][$i]) && $renvois["name"][$i]){
					$name=utf8_decode($renvois["name"][$i]);
					
					$renvoi="renv-$mission_id-$idechant_GL-".$name;
					_save_uploaded_file(
						$renvois["tmp_name"][$i],$project_path."/RDC/renvoi/$renvoi"
					);
				}

				$sql_="";
				$sqll_echant="SELECT * FROM tbl_fraixAcc_coutacquisition_immocorp  where id_echantillon_GL='$idechant_GL' AND id_mission='$mission_id'";
				
				//print($sqll_echant);
				$res_=$bdd->query($sqll_echant);
				$donnees=$res_->fetch();
				if($donnees==null)
				{
					
					$sql_="insert into tbl_fraixAcc_coutacquisition_immocorp(id_mission,id_echantillon_GL,prix_achat,cout,montant_compta,ec,observation,renvoi)
						   values(
							'$mission_id','$idechant_GL',
							'"._escape_db($prix_achat[$i])."',
							'"._escape_db($cout[$i])."',
							'"._escape_db($montant[$i])."',
							'"._escape_db($ecart_[$i])."',
							'"._escape_db($observation[$i])."',
							'"._escape_db($renvoi)."'
						)";
				}else
				{
					if(!$renvoi){
						$renvoi=$donnees["renvoi"];
					}
					$sql_="update  tbl_fraixAcc_coutacquisition_immocorp
							SET 
							prix_achat='"._escape_db($prix_achat[$i])."',
							cout='"._escape_db($cout[$i])."',
							montant_compta='"._escape_db($montant[$i])."',
							ec='"._escape_db($ecart_[$i])."',
							renvoi='"._escape_db($renvoi)."',
							observation='"._escape_db($observation[$i])."'
						   	where id_mission='$mission_id'  AND  id_echantillon_GL='$idechant_GL'";

						   
				}

				$req_=$bdd->query($sql_);
				
				$backup_sql.="$sql_;";



		$sqlFraixacc="SELECT * FROM tab_Frais_Accessoire where id_mission='$mission_id'";
		$repsFraixacc=$bdd->query($sqlFraixacc);
		$z=0;
		while ($donnfraix=$repsFraixacc->fetch()) 
		{


			     $sql="SELECT * FROM tbl_echant_fraixAcc_coutacquisition_immocorp
			 	       where id_frais_acc='".$donnfraix["id_frais_acc"]."' AND id_echantillon_GL='$idechant_GL'";

			 	  		$repsFraixdetail=$bdd->query($sql);
						$donnfraix_=$repsFraixdetail->fetch();

						if($donnfraix_==null)
						{

							
							$sql_="insert into tbl_echant_fraixAcc_coutacquisition_immocorp(id_echantillon_GL,id_frais_acc,prix_fraix)
				                   values(
									   '$idechant_GL',
									   '"._escape_db($donnfraix["id_frais_acc"])."',
									   '"._escape_db($Fraixacc[$z])."'
									)";

				                   // print ("insert".$sql_);

						}else
						{
							

							$sql_="update  tbl_echant_fraixAcc_coutacquisition_immocorp
								SET 
								prix_fraix='".$Fraixacc[$z]."'
				   				where id_echantillon_GL='$idechant_GL' AND 
								id_frais_acc='"._escape_db($donnfraix["id_frais_acc"])."'";

				   				 // print ("update requette:     ".$sql_);
						}


						$req_=$bdd->query($sql_);
						$backup_sql.="$sql_;";

						$z++;
		}
		


		



		$i++;
	}



_save_backup();