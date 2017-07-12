<?php 
@session_start();
$mission_id=$_SESSION['idMission'];
if (is_uploaded_file($_FILES['file_bal_auxN1']['tmp_name']))
{ 
	$NameFileko=$_FILES['file_bal_auxN1']['name'];
	//echo $NameFileko;
?>	
	
<?php	
	$loader=$_SERVER['DOCUMENT_ROOT']."/RA/archive/".$NameFileko;
	$sourceDoc="/RA/archive/".$NameFileko;
	$result= move_uploaded_file($_FILES['file_bal_auxN1']['tmp_name'],$loader);
	if ($result != 1)
   { 
     die("Error uploading file.  Please try again");
   }
}
?>
<?php 
		
	error_reporting(E_ALL ^ E_NOTICE);
	require_once '../excel/bibliotheque/excel_reader2.php';
	$data = new Spreadsheet_Excel_Reader();
	$data->setOutputEncoding('CP1251');
	$data->read($loader);

?>
	<html>
		<head>
			<link rel="stylesheet" href="../excel/cssexcel.css"/>
			<script type = "text/javascript" src="../js/jquery.js"></script>
			<script type="text/javascript">

				function enregistrer(){
					cpt1=$('#cpt1').val();
					cpt2=$('#cpt2').val();
					cpt3=$('#cpt3').val();
					cpt4=$('#cpt4').val();
					cpt5=$('#cpt5').val();
					cpt6=$('#cpt6').val();
					cpt7=$('#cpt7').val();
					mission_id=$('#mission_id').val();
					annee=document.getElementById("annee").value;
					fileName=document.getElementById("fileName").value;
						/*$.ajax({
							type:'POST',
							url:'entreprise_balaux.php',
							data:{mission_id:mission_id},
							success:function(e){
								entrepriseId=e;*/
								$.ajax({
									type:'POST',
									url:'enregistrement_bal_auxN1.php',
									data:{cpt1:cpt1,cpt2:cpt2,cpt3:cpt3,cpt4:cpt4,cpt5:cpt5,cpt6:cpt6,cpt7:cpt7,annee:annee,fileName:fileName},
									success:function(e1){
										$.get("Enreg_sommebal_aux.php",function(res)
										{
											//alert(res);
											alert("Le document est enregistré dans la base");
											window.location.href="_fenetre_uploadifram.php";
										});
									
									}
								});
							//}
						
						//});
				}
				function supprimer(){
					annee=document.getElementById("annee").value;
					mission_id1=$('#mission_id').val();
					$.ajax({
						type:'POST',
						url:'supprimerBalAuxN1.php',
						data:{mission_id1:mission_id1,annee:annee}, 
						success:function(e1){
						alert("Le document est supprimé dans la base");
						 window.location.href="_fenetre_uploadifram.php";
						}
					});
				}
				$(function(){
					$('#id_enregistrer').click(function(){
						$('#progressbarDFin').show();
					});
					$('#id_suppr').click(function(){
						$('#progressbarDFin').show();
					});
				});
			</script>
		</head>
		<body>
		<div id="nomfichier"></div>
			<div id="nomfichier2"></div>
			Exercice:<select id = "annee" onchange="choix_annee()">
			<option value = "N-1">N-1
				<?php
					include '../connexion.php';
						$reponse2=$bdd->query('SELECT BAL_AUXN1_CHOIX_ANNEE FROM tab_bal_auxn1 WHERE BAL_AUXN1_CHOIX_ANNEE="N-1" AND MISSION_ID='.$mission_id);
							$res2=$reponse2->fetch();
								$data2=$res2['BAL_AUXN1_CHOIX_ANNEE'];
								if($data2!=" " && $data2=="N-1"){ 
									echo("<script>

									var annee2= $('#annee').val();
										if(annee2='N-1'){
											alert('Attention fichier balance auxiliare existe déjà,supprimer ancien et enregistrer nouveau!');
											//$('#nomfichier2').html('Attention fichier balance générale existe déjà!');
										}
									
									</script>");
								}
				?>
			</option>
			</select>
			<input type = "button" id = "id_suppr" value="Supprimer Ancien" onclick="supprimer()" style = "float:right;width:150px;height:30px"/><br/><br/>
			<input type = "button" id = "id_enregistrer" value="Enregistrer Nouveau" onclick="enregistrer()" style = "float:right;width:150px;height:30px"/> 
			<center>
					<?php echo $data->dump(true,true);
					
						for ($x=2; $x <=count($data->sheets[0]["cells"]); $x++) {
							$compte = $data->sheets[0]["cells"][$x][1];
							$compte1.=$compte.',';
							$intituler = $data->sheets[0]["cells"][$x][2];
							$compte2.=$intituler.',';
							$debit = $data->sheets[0]["cells"][$x][3];
							$compte3.=$debit.',';
							$credit = $data->sheets[0]["cells"][$x][4];
							$compte4.=$credit.',';
							$solde = $data->sheets[0]["cells"][$x][5];
							$compte5.=$solde.',';
							$cycle = $data->sheets[0]["cells"][$x][6];
							$compte6.=$cycle.',';
							$cycle = $data->sheets[0]["cells"][$x][7];
							$compte7.=$cycle.',';
							
						}
					
					?>
					<input type="text" id="cpt1" value="<?php echo $compte1;?>" style="display:none;" />
					<input type="text" id="cpt2" value="<?php echo $compte2;?>" style="display:none;" />
					<input type="text" id="cpt3" value="<?php echo $compte3;?>" style="display:none;" />
					<input type="text" id="cpt4" value="<?php echo $compte4;?>" style="display:none;" />
					<input type="text" id="cpt5" value="<?php echo $compte5;?>" style="display:none;" />
					<input type="text" id="cpt6" value="<?php echo $compte6;?>" style="display:none;" />
					<input type="text" id="cpt7" value="<?php echo $compte7;?>" style="display:none;" />
					<input type="text" id="mission_id" value="<?php echo $mission_id;?>" style="display:none;" />
					<input type = "text" id="fileName" value="<?php echo $NameFileko;?>" style="display:none;" />	
			</center>
			<div id="progressbarDFin" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
	</div>
		</body>
	</html>



