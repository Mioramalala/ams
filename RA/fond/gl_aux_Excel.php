<?php 
@session_start();
$mission_id=$_SESSION['idMission'];
if (is_uploaded_file($_FILES['file_gl_aux']['tmp_name']))
{ 
	$NameFileko=$_FILES['file_gl_aux']['name'];
	//echo $NameFileko;
?>	
	
<?php	
	$loader=$_SERVER['DOCUMENT_ROOT']."/RA/archive/".$NameFileko;
	$sourceDoc="/RA/archive/".$NameFileko;
	$result= move_uploaded_file($_FILES['file_gl_aux']['tmp_name'],$loader);
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
				// set_time_limit (50);
				//alert("aio");
					cpt1=$('#cpt1').val();
					cpt2=$('#cpt2').val();
					cpt3=$('#cpt3').val();
					cpt4=$('#cpt4').val();
					cpt5=$('#cpt5').val();
					cpt6=$('#cpt6').val();
					cpt7=$('#cpt7').val();
					cpt8=$('#cpt8').val();
					cpt9=$('#cpt9').val();
					cpt10=$('#cpt10').val();
					cpt11=$('#cpt11').val();
					cpt12=$('#cpt12').val();
					cpt13=$('#cpt13').val();
					mission_id=$('#mission_id').val();
					annee=document.getElementById("annee").value;
					fileName=document.getElementById("fileName").value;
					// alert(cpt1);
					// alert(mission_id);
						$.ajax({
							type:'POST',
							url:'entreprise_gl_aux.php',
							data:{mission_id:mission_id},
							success:function(e){
								entrepriseId=e;
								$.ajax({
									type:'POST',
									url:'enregistrement_gl_aux.php',
									data:{cpt1:cpt1,cpt2:cpt2,cpt3:cpt3,cpt4:cpt4,cpt5:cpt5,cpt6:cpt6,cpt7:cpt7,cpt8:cpt8,cpt9:cpt9,cpt10:cpt10,cpt11:cpt11,cpt12:cpt12,cpt13:cpt13,mission_id:mission_id,entrepriseId:entrepriseId,annee:annee,fileName:fileName},
									success:function(e1){
									//alert(e1);
									alert("Le document est enregistré dans la base");
									window.location.href="_fenetre_uploadifram.php";
									//parent.window.$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id; ?>);
									}
								});
							}
						
						});
				}
				$(function(){
					$('#id_enregistrer').click(function(){
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
						$reponse=$bdd->query('SELECT GL_AUX_CHOIX_ANNEE FROM tab_importer WHERE GL_AUX_CHOIX_ANNEE="N" AND MISSION_ID='.$mission_id);
							$res=$reponse->fetch();
								$data1=$res['GL_AUX_CHOIX_ANNEE'];
								if($data1!=" " && $data1=="N"){ 
									echo("<script>
									var annee= $('#annee').val();
										if(annee='N'){
											alert('Attention fichier grand livre auxiliaire existe déjà!');
										}
									</script>");
								}
				?>
			</option>
			<option value = "N-1">N-1
				<?php
					include '../connexion.php';
						$reponse2=$bdd->query('SELECT GL_AUX_CHOIX_ANNEE FROM tab_importer WHERE GL_AUX_CHOIX_ANNEE="N-1" AND MISSION_ID='.$mission_id);
							$res2=$reponse2->fetch();
								$data2=$res2['GL_AUX_CHOIX_ANNEE'];
								if($data2!=" " && $data2=="N-1"){ 
									echo("<script>
									function choix_annee(){
									var annee2= $('#annee').val();
										if(annee2='N-1'){
											alert('Attention fichier grand livre auxiliaire existe déjà!');
										}
									}
									</script>");
								}
				?>
			</option>
			</select>
		<input type = "button" id = "id_enregistrer" value="Enregistrer" onclick="enregistrer()" style = "float:right"/> 
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
							$cycle = $data->sheets[0]["cells"][$x][8];
							$compte8.=$cycle.',';
							$cycle = $data->sheets[0]["cells"][$x][9];
							$compte9.=$cycle.',';
							$cycle = $data->sheets[0]["cells"][$x][10];
							$compte10.=$cycle.',';
							$cycle = $data->sheets[0]["cells"][$x][11];
							$compte11.=$cycle.',';
							$cycle = $data->sheets[0]["cells"][$x][12];
							$compte12.=$cycle.',';
							$cycle = $data->sheets[0]["cells"][$x][13];
							$compte13.=$cycle.',';
							
						}
					
					?>
					<input type="text" id="cpt1" value="<?php echo $compte1;?>" style="display:none;" />
					<input type="text" id="cpt2" value="<?php echo $compte2;?>" style="display:none;" />
					<input type="text" id="cpt3" value="<?php echo $compte3;?>" style="display:none;" />
					<input type="text" id="cpt4" value="<?php echo $compte4;?>" style="display:none;" />
					<input type="text" id="cpt5" value="<?php echo $compte5;?>" style="display:none;" />
					<input type="text" id="cpt6" value="<?php echo $compte6;?>" style="display:none;" />
					<input type="text" id="cpt7" value="<?php echo $compte7;?>" style="display:none;" />
					<input type="text" id="cpt8" value="<?php echo $compte8;?>" style="display:none;" />
					<input type="text" id="cpt9" value="<?php echo $compte9;?>" style="display:none;" />
					<input type="text" id="cpt10" value="<?php echo $compte10;?>" style="display:none;" />
					<input type="text" id="cpt11" value="<?php echo $compte11;?>" style="display:none;" />
					<input type="text" id="cpt12" value="<?php echo $compte12;?>" style="display:none;" />
					<input type="text" id="cpt13" value="<?php echo $compte13;?>" style="display:none;" />
					<input type="text" id="mission_id" value="<?php echo $mission_id;?>" style="display:none;" />
					<input type = "text" id="fileName" value="<?php echo $NameFileko;?>" style="display:none;" />	
			</center>
			<div id="progressbarDFin" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
	</div>
		</body>
	</html>



