<?php 
@session_start();
$mission_id=$_SESSION['idMission'];
if (is_uploaded_file($_FILES['file_gl_genC4']['tmp_name']))
{ 

	$NameFileko=$_FILES['file_gl_genC4']['name'];

	
	$loader=$_SERVER['DOCUMENT_ROOT']."/RA/archive/".$NameFileko;
	$sourceDoc="/RA/archive/".$NameFileko;
	set_time_limit(-1);
	$result= move_uploaded_file($_FILES['file_gl_genC4']['tmp_name'],$loader);
	if ($result != 1)
   { 
     die("Error uploading file.  Please try again");
   }
}

?>
<?php 
//print ("EXEL OK O");
		set_time_limit(-1);
		error_reporting(E_ALL ^ E_NOTICE);
		require_once '../excel/bibliotheque/excel_reader2.php';
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		//set_time_limit(1);
		//print ("EXEL OK 1");
		$data->read($loader); 
//set_time_limit(6);

		//print ("EXEL OK 2");
		//exit();
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
					cpt8=$('#cpt8').val();
					cpt9=$('#cpt9').val();
					cpt10=$('#cpt10').val();
					mission_id=$('#mission_id').val();
					annee=document.getElementById("annee").value;
					fileName=document.getElementById("fileName").value;
					
						//$.ajax({
							//type:'POST',
							//url:'entreprise_gl_aux.php',
							//data:{mission_id:mission_id},
							//success:function(e){
							//	entrepriseId=e;
								$.ajax({
									type:'POST',
									url:'enregistrement_gl_genC4.php',
									data:{cpt1:cpt1,cpt2:cpt2,cpt3:cpt3,cpt4:cpt4,cpt5:cpt5,cpt6:cpt6,cpt7:cpt7,cpt8:cpt8,cpt9:cpt9,cpt10:cpt10,annee:annee,fileName:fileName},
									success:function(e1){
										//alert(e1);
										$.get("Enreg_somme_gl_gen.php",function(res)
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
					mission_id1=$('#mission_id').val();
					annee=document.getElementById("annee").value;
					$.ajax({
						type:'POST',
						url:'supprimerGlGenC4.php',
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
						$reponse=$bdd->query('SELECT GL_GENC4_CHOIX_ANNEE FROM tab_gl_genc4 WHERE GL_GENC4_CHOIX_ANNEE="N" AND MISSION_ID='.$mission_id);
							$res=$reponse->fetch();
								$data1=$res['GL_GENC4_CHOIX_ANNEE'];
								if($data1!=" " && $data1=="N"){ 
									echo("<script>
									var annee= $('#annee').val();
										if(annee='N'){
											alert('Attention fichier grand livre générale existe déjà.\n Supprimer ancien et enregistrer nouveau!');
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
					
						for ($x=2; $x <=count($data->sheets[0]["cells"]); $x++) 
						{

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
					<input type="text" id="cpt1" value="<?php echo addslashes(htmlspecialchars($compte1));?>" style="display:none;" />
					<input type="text" id="cpt2" value="<?php echo addslashes(htmlspecialchars($compte2));?>" style="display:none;" />
					<input type="text" id="cpt3" value="<?php echo addslashes(htmlspecialchars($compte3));?>" style="display:none;" />
					<input type="text" id="cpt4" value="<?php echo addslashes(htmlspecialchars($compte4));?>" style="display:none;" />
					<input type="text" id="cpt5" value="<?php echo addslashes(htmlspecialchars($compte5));?>" style="display:none;" />
					<input type="text" id="cpt6" value="<?php echo addslashes(htmlspecialchars($compte6));?>" style="display:none;" />
					<input type="text" id="cpt7" value="<?php echo addslashes(htmlspecialchars($compte7));?>" style="display:none;" />
					<input type="text" id="cpt8" value="<?php echo addslashes(htmlspecialchars($compte8));?>" style="display:none;" />
					<input type="text" id="cpt9" value="<?php echo addslashes(htmlspecialchars($compte9));?>" style="display:none;" />
					<input type="text" id="cpt10" value="<?php echo addslashes(htmlspecialchars($compte10));?>" style="display:none;" />
					<input type="text" id="mission_id" value="<?php echo addslashes(htmlspecialchars($mission_id));?>" style="display:none;" />
					<input type = "text" id="fileName" value="<?php echo addslashes(htmlspecialchars($NameFileko));?>" style="display:none;" />	
			</center>
			<div id="progressbarDFin" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
				<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
			</div>
		</body>
	</html>



