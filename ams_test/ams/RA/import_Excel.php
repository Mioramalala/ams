<?php 
$mission_id=@$_GET['mission_id'];
if (is_uploaded_file($_FILES['file_Import']['tmp_name']))
{ 
	$NameFileko=$_FILES['file_Import']['name'];
?>	

<?php	
	$loader=$_SERVER['DOCUMENT_ROOT']."/RA/archive/".$NameFileko;
	$sourceDoc="/RA/archive/".$NameFileko;
	$result= move_uploaded_file($_FILES['file_Import']['tmp_name'],$loader);
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
					//alert(cpt1);
					cpt2=$('#cpt2').val();
					cpt3=$('#cpt3').val();
					cpt4=$('#cpt4').val();
					cpt5=$('#cpt5').val();
					cpt6=$('#cpt6').val();
					mission_id=$('#mission_id').val();
					var annee= $('#annee').val();
					alert(annee);
					fileName=document.getElementById("fileName").value;
						$.ajax({
							type:'POST',
							url:'entreprise.php',
							data:{mission_id:mission_id},
							success:function(e){
								
								entrepriseId=e;
									$.ajax({
										type:'POST',
										url:'enregistrement.php',
										data:{cpt1:cpt1,cpt2:cpt2,cpt3:cpt3,cpt4:cpt4,cpt5:cpt5,cpt6:cpt6,mission_id:mission_id,entrepriseId:entrepriseId,annee:annee,fileName:fileName},
										success:function(e1){

										//alert(e1);
											alert("Le document est enregistré dans la base");
											window.location.href="_fenetre_uploadifram.php";
										}
									});
								
							}
						});
				}
				
				function supprimer(){
						annee=document.getElementById("annee").value;
						mission_id1=$('#mission_id').val();
					$.ajax({
						type:'POST',
						url:'supprimerBalGen.php',
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
			Exercice:<select id = "annee" onchange="choix_annee()">
			<option value = "N">N
				<?php
					include '../connexion.php';
						$reponse=$bdd->query('SELECT IMPORT_CHOIX_ANNEE FROM tab_importer WHERE IMPORT_CHOIX_ANNEE="N" AND MISSION_ID='.$mission_id);
							$res=$reponse->fetch();
								$data1=$res['IMPORT_CHOIX_ANNEE'];
								if($data1!=" " && $data1=="N"){ 
									echo("<script>
									var annee= $('#annee').val();
										if(annee='N'){
											alert('Attention fichier balance générale existe déjà.\n Supprimer ancien et enregistrer nouveau!');
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
						set_time_limit(1);
							$compte = $data->sheets[0]["cells"][$x][1];
							$compte1.=$compte.'#';
							$intituler = $data->sheets[0]["cells"][$x][2];
							$compte2.=$intituler.'#';
							$debit = $data->sheets[0]["cells"][$x][3];
							$compte3.=$debit.'#';
							$credit = $data->sheets[0]["cells"][$x][4];
							$compte4.=$credit.'#';
							$solde = $data->sheets[0]["cells"][$x][5];
							$compte5.=$solde.'#';
							$cycle = $data->sheets[0]["cells"][$x][6];
							$compte6.=$cycle.'#';
						}
					?>
						<input type="text" id="cpt1" value="<?php echo $compte1;?>" style="display:none;" />
						<input type="text" id="cpt2" value="<?php echo $compte2;?>" style="display:none;" />
						<input type="text" id="cpt3" value="<?php echo $compte3;?>" style="display:none;" />
						<input type="text" id="cpt4" value="<?php echo $compte4;?>" style="display:none;" />
						<input type="text" id="cpt5" value="<?php echo $compte5;?>" style="display:none;" />
						<input type="text" id="cpt6" value="<?php echo $compte6;?>" style="display:none;" />
						<input type="text" id="mission_id" value="<?php echo $mission_id;?>" style="display:none;" />
						<input type = "text" id="fileName" value="<?php echo $NameFileko;?>" style="display:block;" />
			</center>
		<?php	
		?>
			<div id="progressbarDFin" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
				<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
			</div>
		</body>
	</html>



