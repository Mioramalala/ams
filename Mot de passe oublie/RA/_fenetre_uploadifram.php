<!DOCTYPE html>
<?php
@session_start();
$mission_id=$_SESSION['idMission'];
$documents_autres=@$_POST['documents_autres'];
include '../connexion.php';
/////////////////////////////////bal gen//////////////////////////////////////////////////////////////////
$reponse=$bdd->query('SELECT IMPORT_DOCUMENT,IMPORT_CHOIX_ANNEE FROM tab_importer WHERE MISSION_ID='.$mission_id);
$res=$reponse->fetch();
$data=$res['IMPORT_DOCUMENT'];
$data1=$res['IMPORT_CHOIX_ANNEE'];
/////////////////////////////////bal aux//////////////////////////////////////////////////////////////////
$reponse2=$bdd->query('SELECT BAL_AUX_DOCUMENT,BAL_AUX_CHOIX_ANNEE FROM tab_bal_aux WHERE MISSION_ID='.$mission_id);
$res2=$reponse2->fetch();
$aux=$res2['BAL_AUX_DOCUMENT'];
$aux1=$res2['BAL_AUX_CHOIX_ANNEE'];
//////////////////////////////////gl gen//////////////////////////////////////////////////////////////////
$reponse3=$bdd->query('SELECT GL_GEN_DOCUMENT,GL_GEN_CHOIX_ANNEE FROM tab_gl_gen WHERE MISSION_ID='.$mission_id);
$res3=$reponse3->fetch();
$gl=$res3['GL_GEN_DOCUMENT'];
$gl1=$res3['GL_GEN_CHOIX_ANNEE'];
///////////////////////////////////gl aux//////////////////////////////////////////////////////////////////
$reponse4=$bdd->query('SELECT GL_AUX_DOCUMENT,GL_AUX_CHOIX_ANNEE FROM tab_gl_aux WHERE MISSION_ID='.$mission_id);
$res4=$reponse4->fetch();
$glaux=$res4['GL_AUX_DOCUMENT'];
$glaux=$res4['GL_AUX_CHOIX_ANNEE'];
//
?>             
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<script type="text/javascript" src="js/js_menue.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
			
			$(function(){
				$('#dv_autres').click(function(){
					//alert('autres');
					parent.window.$('#contenue').load('./RA/autres_document.php?mission_id='+<?php echo $mission_id;?>);			
				});
			});
		</script>	
	</head>
	<body>
		<table>
			<tr>
				<td>
					<label>Balance générale :</label>
				</td>
				<td>
					<form method = "post" enctype="multipart/form-data" action = "import_Excel.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" accept="application/vnd.ms-excel" id = "file_Import" name = "file_Import"/>
						<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc"/>
						<!--label style="color:red;">Attention fichier balance générale existe déjà!</label--><br/><br/>
					</form>
				</td>
			</tr>
							
			<tr>
				<td>
					<label>Balance auxiliaire:</label>
				</td>
				<td>
					<form method = "post" enctype="multipart/form-data" action = "bal_aux_Excel.php">
						<input type = "file"  accept="application/vnd.ms-excel" id = "file_bal_aux" name = "file_bal_aux"/>
						<input type="submit" name="bal_aux2" value="Upload" id = "id_bal_auxdoc"/><br/><br/>
					</form>
				</td>
			</tr>
							
			<tr>
				<td>
					<label>Grand livre générale:</label>
				</td>
				<td>
					<form method = "post" enctype="multipart/form-data" action = "gl_gen_Excel.php">
						<input type = "file" id = "file_gl_gen" accept="application/vnd.ms-excel"  name = "file_gl_gen"/> 
						<input type="submit" name="gl_gen2" value="Upload" id = "id_gl_gen"/><br/><br/>
					</form>
				</td>
			</tr>
			<tr>				
				<td>
					<label>Grand livre auxiliaire:</label>
				</td>
				<td>
					<form method = "post" enctype="multipart/form-data" action = "gl_aux_Excel.php">
						<input type = "file"  accept="application/vnd.ms-excel"id = "file_gl_aux" name = "file_gl_aux"/>
						<input type="submit" name="gl_aux2" value="Upload" id = "id_gl_aux"/><br/><br/>
					</form>
				</td>
			</tr>
							
			<tr>
				<td>
					<input type = "button" id = "dv_autres" value = "Autres Documents" onclick="autre()"/>
				</td>
			</tr>
			
		</table>
			<?php 
				///////////////////////requette selection pour tt bal gen//////////////////////////////////
				$balgenN2="";
				// if($data1=='N'){
				$b='N';
					$reponse=$bdd->query("SELECT IMPORT_DOCUMENT FROM tab_importer WHERE IMPORT_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id);
					$balgenN="";
					while($res=$reponse->fetch()){
					$balgenN=$res['IMPORT_DOCUMENT'];
					}

				// }
				// else if($data1=='N-1'){
				$a='N-1';
					$reponse1=$bdd->query("SELECT IMPORT_DOCUMENT FROM tab_importer WHERE IMPORT_CHOIX_ANNEE='N-1'AND MISSION_ID=".$mission_id);			
					while($res1=$reponse1->fetch()){
					$balgenN2=$res1['IMPORT_DOCUMENT'];
					}
				// }
				///////////////////////requette selection pour tt bal aux//////////////////////////////////
				$balauxN2="";
				$c='N';
					$reponse2=$bdd->query("SELECT BAL_AUX_DOCUMENT FROM  tab_bal_aux WHERE BAL_AUX_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id);
					$balauxN="";
					while($res2=$reponse2->fetch()){
					$balauxN=$res2['BAL_AUX_DOCUMENT'];
					}

				$d='N-1';
					$reponse3=$bdd->query("SELECT BAL_AUX_DOCUMENT FROM  tab_bal_aux WHERE BAL_AUX_CHOIX_ANNEE='N-1'AND MISSION_ID=".$mission_id);			
					while($res3=$reponse3->fetch()){
					$balauxN2=$res3['BAL_AUX_DOCUMENT'];
					}
				
					///////////////////////requette selection pour tt gl gen//////////////////////////////////
				$glgenN2="";
				$e='N';
					$reponse4=$bdd->query("SELECT GL_GEN_DOCUMENT FROM tab_gl_gen WHERE GL_GEN_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id);
					$glgenN="";
					while($res4=$reponse4->fetch()){
					$glgenN=$res4['GL_GEN_DOCUMENT'];
					}

				$f='N-1';
					$reponse5=$bdd->query("SELECT GL_GEN_DOCUMENT FROM  tab_gl_gen WHERE GL_GEN_CHOIX_ANNEE='N-1'AND MISSION_ID=".$mission_id);			
					while($res5=$reponse5->fetch()){
					$glgenN2=$res5['GL_GEN_DOCUMENT'];
					}
					///////////////////////requette selection pour tt gl aux//////////////////////////////////
				$glauxN2="";
				$g='N';
					$reponse6=$bdd->query("SELECT GL_AUX_DOCUMENT FROM tab_gl_aux WHERE GL_AUX_CHOIX_ANNEE='N' AND MISSION_ID=".$mission_id);
					$glauxN="";
					while($res6=$reponse6->fetch()){
					$glgenN=$res6['GL_AUX_DOCUMENT'];
					}

				$h='N-1';
					$reponse7=$bdd->query("SELECT GL_AUX_DOCUMENT FROM tab_gl_aux WHERE GL_AUX_CHOIX_ANNEE='N-1'AND MISSION_ID=".$mission_id);			
					while($res7=$reponse7->fetch()){
					$glauxN2=$res7['GL_AUX_DOCUMENT'];
					}
			?>
		<label style="color:blue;"><b>Listes des documents de la mission</b></label>
		<table border = "1">
			<tr>
				<td>Balance générale N</td>
				<td><?php echo $balgenN;?></td>
			</tr>
			<tr>
				<td>Balance générale N-1</td>
				<td><?php echo $balgenN2;?></td>
			</tr>
			<tr>
				<td>Balance auxiliaire N</td>
				<td><?php echo $balauxN;?></td>
			</tr>
			<tr>
				<td>Balance auxiliaire N-1</td>
				<td><?php echo $balauxN2;?></td>
			</tr>
			<tr>
				<td>Grand livre générale N</td>
				<td><?php echo $glgenN;?></td>
			</tr>
			<tr>
				<td>Grand livre générale N-1</td>
				<td><?php echo $glgenN2;?></td>
			</tr>
			<tr>
				<td>Grand livre auxiliaire N</td>
				<td><?php echo $glauxN;?></td>
			</tr>
			<tr>
				<td>Grand livre auxiliaire N-1</td>
				<td><?php echo $glauxN2;?></td>
			</tr>
			<tr>
				<td>Balance âgée</td>
				<td></td>
			</tr>
			<tr>
				<td>Bilan</td>
				<td></td>
			</tr>
			<tr>
				<td>Compte de résultats</td>
				<td></td>
			</tr>
			<tr>
				<td>Tableau d’amortissement</td>
				<td></td>
			</tr>
			<tr>
				<td>Autres</td>
				<td><?php echo $documents_autres;?></td>
			</tr>
		</table>		
	</body>
<html>