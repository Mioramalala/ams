<?php 
@session_start();
$mission_id=$_SESSION['idMission'];

if (is_uploaded_file($_FILES['file_gl_genC2']['tmp_name']))
{ 
	$NameFileko=$_FILES['file_gl_genC2']['name'];
	//echo $NameFileko;
?>	

<?php	
	
	$loader=$_SERVER['DOCUMENT_ROOT']."/RA/archive/".$NameFileko;
	$sourceDoc="/RA/archive/".$NameFileko;
	set_time_limit(-1);
	$result= move_uploaded_file($_FILES['file_gl_genC2']['tmp_name'],$loader);
	//die(ici);
	if ($result != 1)
   { 
     die("Error uploading file.try again");
   }
}

?>
<?php 
		set_time_limit(-1);
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
					var cpt1=$('#cpt1').val();
					var cpt2=$('#cpt2').val();
					var cpt3=$('#cpt3').val();
					var cpt4=$('#cpt4').val();
					var cpt5=$('#cpt5').val();
					var cpt6=$('#cpt6').val();
					var cpt7=$('#cpt7').val();
					var cpt8=$('#cpt8').val();
					var cpt9=$('#cpt9').val();
					var cpt10=$('#cpt10').val();
					var mission_id=$('#mission_id').val();
					var annee=document.getElementById("annee").value;
					var fileName=document.getElementById("fileName").value;
					//alert("ok");

						$.ajax({
							type:'POST',
							url:'entreprise_gl_aux.php',
							data:{mission_id:mission_id},

							success:function(e){
							    //alert(e);
								entrepriseId=e;
								$.ajax({
									type:'POST',
									url:'enregistrement_gl_genC2.php',
									//data:{cpt1:"cc"},
									data:{cpt1:cpt1,cpt2:cpt2,cpt3:cpt3,cpt4:cpt4,cpt5:cpt5,cpt6:cpt6,cpt7:cpt7,cpt8:cpt8,cpt9:cpt9,cpt10:cpt10,mission_id:mission_id,entrepriseId:entrepriseId,annee:annee,fileName:fileName},
									
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
					mission_id1=$('#mission_id').val();
					annee=document.getElementById("annee").value;
					$.ajax({
						type:'POST',
						url:'supprimerGlGenC2.php',
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
			<option value = "N">N
				<?php
					include '../connexion.php';
						$reponse=$bdd->query('SELECT GL_GENC2_CHOIX_ANNEE FROM tab_gl_genc2 WHERE GL_GENC2_CHOIX_ANNEE="N" AND MISSION_ID='.$mission_id);
							$res=$reponse->fetch();
								$data1=$res['GL_GENC2_CHOIX_ANNEE'];
								if($data1!=" " && $data1=="N"){ 
									echo("<script>
									var annee= $('#annee').val();
										if(annee='N'){
											alert('Attention fichier grand livre générale existe déjà,supprimer ancien et enregistrer nouveau!');
											// $('#nomfichier').html('Attention fichier grand livre générale existe déjà!');
											
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
							$cycle = $data->sheets[0]["cells"][$x][7];
							$compte7.=$cycle.'#';
							$cycle = $data->sheets[0]["cells"][$x][8];
							$compte8.=$cycle.'#';
							$cycle = $data->sheets[0]["cells"][$x][9];
							$compte9.=$cycle.'#';
							$cycle = $data->sheets[0]["cells"][$x][10];
							$compte10.=$cycle.'#';
							
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
					<input type="text" id="mission_id" value="<?php echo $mission_id;?>" style="display:none;" />
					<input type = "text" id="fileName" value="<?php echo $NameFileko;?>" style="display:none;" />	
			</center>
			<div id="progressbarDFin" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
				<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
			</div>
		</body>
	</html>



