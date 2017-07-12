<!DOCTYPE html>
<?php
@session_start();
$mission_id=$_SESSION['idMission'];
$documents_autres=@$_POST['documents_autres'];
include '../connexion.php';
/////////////////////////////////bal gen N//////////////////////////////////////////////////////////////////
$reponse=$bdd->query('SELECT IMPORT_DOCUMENT,IMPORT_CHOIX_ANNEE FROM tab_importer WHERE MISSION_ID='.$mission_id);
$res=$reponse->fetch();
$data=$res['IMPORT_DOCUMENT'];
$data1=$res['IMPORT_CHOIX_ANNEE'];
/////////////////////////////////bal gen N-1//////////////////////////////////////////////////////////////////
$reponse=$bdd->query('SELECT IMPORTN1_DOCUMENT,IMPORTN1_CHOIX_ANNEE FROM tab_importern1 WHERE MISSION_ID='.$mission_id);
$res=$reponse->fetch();
$data=$res['IMPORTN1_DOCUMENT'];
$data1=$res['IMPORTN1_CHOIX_ANNEE'];
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
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript">

/////Check Role function by Sitraka/////
		$(function(){
			// checkRole(1000);
		})
		function checkRole(tache_id){
								
									var data =  $.ajax(
								  	{ 
								  		"data":{
								  			tache_id: tache_id,
									  	  	util_id: <?php echo $_SESSION["id"]; ?>,
									  	   	mission_id: <?php echo $_SESSION["idMission"]; ?>
								  		},
								  		"success":function(data){
								  			// data = JSON.parse(data);
								       		return data;
								  		},
								  		"url":"../checkRole.php",
								  		async: false,
								  		type: "POST"
								  		
								  	});
								  
								  	var data = JSON.parse(data.responseText);
								  	if(data.admin || data.superviseur){
								  		
								  	}else{
								  		$(".td_upload").html('');
								  	}
								  
		}

			
			function fileinputVeriftaille(fileinput)
			{
				//alert(taillefile+">"+184000);
				taillefile=fileinput.files[0].size;
				if(taillefile>184000)
				{
					fileinput.value="";
					alert("Vous ne pouvez pas uploader se fichier , essayer de decouper , la taille dois être <184ko");
				return false
				}
				return true
				
			}
			$(function(){



				$('#dv_autres').click(function(){
					$("#autre_documents").fadeIn("slow");
					// parent.window.$('#contenue').load('./RA/autres_document.php?mission_id='+<?php echo $mission_id;?>);
				});
				
				$('#dv_controle').click(function(){
					parent.window.$('#contenue').load('./RA/controle_coherence.php?mission_id='+<?php echo $mission_id; ?>);	
				});
				////////////////////////////PROGRESSBAR BAL GEN N//////////////////////////
				$('#id_impotdoc').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR BAL GEN N-1//////////////////////////
				$('#id_impotdocN1').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR BAL AUX N//////////////////////////
				$('#id_bal_auxdoc').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR BAL AUX N-1//////////////////////////
				$('#id_bal_auxdocN1').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL GEN classe 1//////////////////////////
				$('#id_gl_gen').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL GEN classe 2//////////////////////////
				$('#id_gl_genC2').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL GEN classe 3//////////////////////////
				$('#id_gl_genC3').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL GEN classe 4//////////////////////////
				$('#id_gl_genC4').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL GEN classe 5//////////////////////////
				$('#id_gl_genC5').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL GEN classe 6//////////////////////////
				$('#id_gl_genC6').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL GEN classe 7//////////////////////////
				$('#id_gl_genC7').click(function(){
					$('#progressbarDFin').show();
				});
				
				////////////////////////////PROGRESSBAR GEL AUX classe 1//////////////////////////
				$('#id_gl_aux').click(function(){
					$('#progressbarDFin').show();
				});
				
				////////////////////////////PROGRESSBAR GEL AUX classe 2//////////////////////////
				$('#id_gl_auxC2').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL AUX classe 3//////////////////////////
				$('#id_gl_auxC3').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL AUX classe 4//////////////////////////
				$('#id_gl_auxC4').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL AUX classe 5//////////////////////////
				$('#id_gl_auxC5').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL AUX classe 6//////////////////////////
				$('#id_gl_auxC6').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR GEL AUX classe 7//////////////////////////
				$('#id_gl_auxC7').click(function(){
					$('#progressbarDFin').show();
				});
				////////////////////////////PROGRESSBAR CONTROLE COHERENCE N//////////////////////////
				$('#dv_controle').click(function(){
					$('#progressbarDFin').show();
				});
				
				////////////////////////////message GL GEN N//////////////////////////
				$('#file_Import').change(function()
				{

					if(fileinputVeriftaille(document.getElementById("file_Import"))==false);
						return false;

					var parc =$('#file_Import').val();
					var nb=parc.length;
					var res = parc.substr(nb-3,3);
					
					if (res!="xls"){
						$('#nomfichier1').html("<div id='nomfichier'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_impotdoc").setAttribute("disabled","disabled");
					}
			
				});
				////////////////////////////message GL GEN N-1//////////////////////////
				$('#file_ImportN1').change(function(){

					if(fileinputVeriftaille(document.getElementById("file_ImportN1"))==false);
						return false;

					var parcN1 =$('#file_ImportN1').val();
					var nbN1=parcN1.length;
					var resN1 = parcN1.substr(nbN1-3,3);
					
					if (resN1!="xls"){
						$('#nomfichier1N1').html("<div id='nomfichier111'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_impotdocN1").setAttribute("disabled","disabled");
					}
			
				});
				////////////////////////////message BAL AUX N//////////////////////////
				$('#file_bal_aux').change(function(){



					if(fileinputVeriftaille(document.getElementById("file_bal_aux"))==false);
						return false;

					var parc2 = $('#file_bal_aux').val();
					 var nb2=parc2.length;
					 var res2 = parc2.substr(nb2-3,3);
					 //alert(res2)
					  if (res2!="xls"){
						  $('#nomfichier2').html("<div id='nomfichier22'>Le fichier choisi n'est pas pris en charge!</div>");
						  document.getElementById("id_bal_auxdoc").setAttribute("disabled","disabled");

					  } 
				});
				////////////////////////////message BAL AUX N-1//////////////////////////
				$('#file_bal_auxN1').change(function(){


					if(fileinputVeriftaille(document.getElementById("file_bal_auxN1"))==false);
						return false;

					var parc2N1 = $('#file_bal_auxN1').val();
					 var nb2N1=parc2N1.length;
					 var res2N1 = parc2N1.substr(nb2N1-3,3);
					 //alert(res2N1)
					  if (res2N1!="xls"){
						  $('#nomfichier2N1').html("<div id='nomfichier222'>Le fichier choisi n'est pas pris en charge!</div>");
						  document.getElementById("id_bal_auxdocN1").setAttribute("disabled","disabled");

					  } 
				});
				////////////////////////////message GL GEN classe 1//////////////////////////
				$('#file_gl_gen').change(function(){

					if(fileinputVeriftaille(document.getElementById("file_gl_gen"))==false);
						return false;

					var parc3 = $('#file_gl_gen').val();
					var nb3=parc3.length;
					 var res3 = parc3.substr(nb3-3,3);
					 //alert(res3);
					  if (res3!="xls"){
						$('#nomfichier3').html("<div id='nomfichier33'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_gen").setAttribute("disabled","disabled");
					} 
				});
				////////////////////////////message GL GEN classe 2//////////////////////////
				$('#file_gl_genC2').change(function(){
					if(fileinputVeriftaille(document.getElementById("file_gl_genC2"))==false);
						return false;

					var parc3C2 = $('#file_gl_genC2').val();
					var nb3C2=parc3C2.length;
					 var res3C2 = parc3C2.substr(nb3C2-3,3);
					 //alert(res3C2);
					  if (res3C2!="xls"){
						$('#nomfichier3C2').html("<div id='nomfichier33C2'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_genC2").setAttribute("disabled","disabled");
					} 
				});
				////////////////////////////message GL GEN classe 3//////////////////////////
				$('#file_gl_genC3').change(function(){
					if(fileinputVeriftaille(document.getElementById("file_gl_genC3"))==false);
						return false;

					var parc3C3 = $('#file_gl_genC3').val();
					var nb3C3=parc3C3.length;
					 var res3C3 = parc3C3.substr(nb3C3-3,3);
					 //alert(res3C3);
					  if (res3C3!="xls"){
						$('#nomfichier3C3').html("<div id='nomfichier33C3'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_genC3").setAttribute("disabled","disabled");
					} 
				});
				////////////////////////////message GL GEN classe 4//////////////////////////
				$('#file_gl_genC4').change(function(){

					if(fileinputVeriftaille(document.getElementById("file_gl_genC4"))==false);
						return false;

					var parc3C4 = $('#file_gl_genC4').val();
					var nb3C4=parc3C4.length;
					 var res3C4 = parc3C4.substr(nb3C4-3,3);
					 //alert(res3C4);
					  if (res3C4!="xls"){
						$('#nomfichier3C4').html("<div id='nomfichier33C4'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_genC4").setAttribute("disabled","disabled");
					} 
				});
				////////////////////////////message GL GEN classe 5//////////////////////////
				$('#file_gl_genC5').change(function(){

					if(fileinputVeriftaille(document.getElementById("file_gl_genC5"))==false);
						return false;

					var parc3C5 = $('#file_gl_genC5').val();
					var nb3C5=parc3C5.length;
					 var res3C5 = parc3C5.substr(nb3C5-3,3);
					 //alert(res3C5);
					  if (res3C5!="xls"){
						$('#nomfichier3C5').html("<div id='nomfichier33C5'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_genC5").setAttribute("disabled","disabled");
					} 
				});
				////////////////////////////message GL GEN classe 6//////////////////////////
				$('#file_gl_genC6').change(function(){
					if(fileinputVeriftaille(document.getElementById("file_gl_genC6"))==false);
						return false;

					var parc3C6 = $('#file_gl_genC6').val();
					var nb3C6=parc3C6.length;
					 var res3C6 = parc3C6.substr(nb3C6-3,3);
					 //alert(res3C6);
					  if (res3C6!="xls"){
						$('#nomfichier3C6').html("<div id='nomfichier33C6'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_genC6").setAttribute("disabled","disabled");
					} 
				});
				////////////////////////////message GL GEN classe 7//////////////////////////
				$('#file_gl_genC7').change(function(){
					if(fileinputVeriftaille(document.getElementById("file_gl_genC7"))==false);
						return false;

					var parc3C7 = $('#file_gl_genC7').val();
					var nb3C7=parc3C7.length;
					 var res3C7 = parc3C7.substr(nb3C7-3,3);
					 //alert(res3C7);
					  if (res3C7!="xls"){
						$('#nomfichier3C7').html("<div id='nomfichier33C7'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_genC7").setAttribute("disabled","disabled");
					} 
				});
				////////////////////////////message GL AUX classe 1//////////////////////////
				$('#file_gl_aux').change(function(){
					if(fileinputVeriftaille(document.getElementById("file_gl_aux"))==false);
						return false;

					var parc4 = $('#file_gl_aux').val();
					var nb4=parc4.length;
					var res4 = parc4.substr(nb4-3,3);
					
					if (res4!="xls"){
						$('#nomfichier4').html("<div id='nomfichier44'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_aux").setAttribute("disabled","disabled");
					} 
					
				});
				////////////////////////////message GL AUX classe 2//////////////////////////
				$('#file_gl_auxC2').change(function(){
					if(fileinputVeriftaille(document.getElementById("file_gl_auxC2"))==false);
						return false;

					var parc4C2 = $('#file_gl_auxC2').val();
					var nb4C2=parc4C2.length;
					var res4C2 = parc4C2.substr(nb4C2-3,3);
					
					if (res4C2!="xls"){
						$('#nomfichier4C2').html("<div id='nomfichier44C2'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_auxC2").setAttribute("disabled","disabled");
					} 
					
				});
				////////////////////////////message GL AUX classe 3//////////////////////////
				$('#file_gl_auxC3').change(function(){
						if(fileinputVeriftaille(document.getElementById("file_gl_auxC3"))==false);
						return false;

					var parc4C3 = $('#file_gl_auxC3').val();
					var nb4C3=parc4C3.length;
					var res4C3 = parc4C3.substr(nb4C3-3,3);
					
					if (res4C3!="xls"){
						$('#nomfichier4C3').html("<div id='nomfichier44C3'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_auxC3").setAttribute("disabled","disabled");
					} 
					
				});
				////////////////////////////message GL AUX classe 4//////////////////////////
				$('#file_gl_auxC4').change(function(){
					if(fileinputVeriftaille(document.getElementById("file_gl_auxC4"))==false);
						return false;

					var parc4C4 = $('#file_gl_auxC4').val();
					var nb4C4=parc4C4.length;
					var res4C4 = parc4C4.substr(nb4C4-3,3);
					
					if (res4C4!="xls"){
						$('#nomfichier4C4').html("<div id='nomfichier44C4'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_auxC4").setAttribute("disabled","disabled");
					} 
					
				});
				////////////////////////////message GL AUX classe 5//////////////////////////
				$('#file_gl_auxC5').change(function(){
					if(fileinputVeriftaille(document.getElementById("file_gl_auxC5"))==false);
						return false;

					var parc4C5 = $('#file_gl_auxC5').val();
					var nb4C5=parc4C5.length;
					var res4C5 = parc4C5.substr(nb4C5-3,3);
					
					if (res4C5!="xls"){
						$('#nomfichier4C5').html("<div id='nomfichier44C5'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_auxC5").setAttribute("disabled","disabled");
					} 
					
				});
				////////////////////////////message GL AUX classe 6//////////////////////////
				$('#file_gl_auxC6').change(function(){
						if(fileinputVeriftaille(document.getElementById("file_gl_auxC6"))==false);
						return false;


					var parc4C6 = $('#file_gl_auxC6').val();
					var nb4C6=parc4C6.length;
					var res4C6 = parc4C6.substr(nb4C6-3,3);
					
					if (res4C6!="xls"){
						$('#nomfichier4C6').html("<div id='nomfichier44C6'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_auxC6").setAttribute("disabled","disabled");
					} 
					
				});
				////////////////////////////message GL AUX classe 7//////////////////////////
				$('#file_gl_auxC7').change(function(){

					if(fileinputVeriftaille(document.getElementById("file_gl_auxC7"))==false);
						return false;

					var parc4C7 = $('#file_gl_auxC7').val();
					var nb4C7=parc4C7.length;
					var res4C7 = parc4C7.substr(nb4C7-3,3);
					
					if (res4C7!="xls"){
						$('#nomfichier4C7').html("<div id='nomfichier44C7'>Le fichier choisi n'est pas pris en charge!</div>");
						document.getElementById("id_gl_auxC7").setAttribute("disabled","disabled");
					} 
					
				});
			});
		
			
		</script>	
	</head>
	<body>
	<?php 
			///////////////////////requette selection pour tt bal gen//////////////////////////////////
			$balgenN2="";
				$reponse=$bdd->query("SELECT IMPORT_DOCUMENT FROM tab_importer WHERE MISSION_ID=".$mission_id);
				$balgenN="";
				while($res=$reponse->fetch()){
				$balgenN=$res['IMPORT_DOCUMENT'];
				}	
				
				$reponse1=$bdd->query("SELECT IMPORTN1_DOCUMENT FROM tab_importern1 WHERE MISSION_ID=".$mission_id);			
				while($res1=$reponse1->fetch()){
				$balgenN2=$res1['IMPORTN1_DOCUMENT'];
				}
			///////////////////////requette selection pour tt bal aux//////////////////////////////////
			$balauxN2="";
			$c='N';
				$reponse2 = $bdd->query("SELECT BAL_AUX_DOCUMENT FROM tab_bal_aux WHERE MISSION_ID=".$mission_id);
				$balauxN  = "";
				while($res2 = $reponse2->fetch()){
					$balauxN=$res2['BAL_AUX_DOCUMENT'];
				}

			$d='N-1';
				$reponse3=$bdd->query("SELECT BAL_AUXN1_DOCUMENT FROM  tab_bal_auxn1 WHERE MISSION_ID=".$mission_id);			
				while($res3=$reponse3->fetch()){
				$balauxN2=$res3['BAL_AUXN1_DOCUMENT'];
				}
			
				//////////////////requette selection pour gen classe 1///////////////////
			$e='N';
				$reponse4=$bdd->query("SELECT GL_GEN_DOCUMENT FROM tab_gl_gen WHERE MISSION_ID=".$mission_id);
				$glgenN1="";
				while($res4=$reponse4->fetch()){
				$glgenN1=$res4['GL_GEN_DOCUMENT'];
				}
				
				//////////////////requette selection gl gen classe 2///////////////////
				$reponse44=$bdd->query("SELECT GL_GENC2_DOCUMENT FROM tab_gl_genc2 WHERE MISSION_ID=".$mission_id);
				$glgenN2="";
				while($res44=$reponse44->fetch()){
				$glgenN2=$res44['GL_GENC2_DOCUMENT'];
				}
				
				//////////////////requette selection gl gen classe 3///////////////////
				$reponse444=$bdd->query("SELECT GL_GENC3_DOCUMENT FROM tab_gl_genc3 WHERE MISSION_ID=".$mission_id);
				$glgenN3="";
				while($res444=$reponse444->fetch()){
				$glgenN3=$res444['GL_GENC3_DOCUMENT'];
				}
				
				//////////////////requette selection gl gen classe 4///////////////////
				$glGenclasse4=array();
				$reponse4444=$bdd->query("SELECT DISTINCT GL_GENC4_DOCUMENT FROM tab_gl_genc4 WHERE MISSION_ID=".$mission_id);
				$glgenN4="";
				while($res4444=$reponse4444->fetch()){
				array_push($glGenclasse4, $res4444['GL_GENC4_DOCUMENT']);
				$glgenN4=$res4444['GL_GENC4_DOCUMENT'];
				}
				
				//////////////////requette selection gl gen classe 5///////////////////
				$glGenclasse5=array();
				$reponse44444=$bdd->query("SELECT DISTINCT GL_GENC5_DOCUMENT FROM tab_gl_genc5 WHERE MISSION_ID=".$mission_id);
				$glgenN5="";
				while($res44444=$reponse44444->fetch()){
				array_push($glGenclasse5, $res44444['GL_GENC5_DOCUMENT']);
				$glgenN5=$res44444['GL_GENC5_DOCUMENT'];
				}
				//////////////////requette selection gl gen classe 6///////////////////
				$glGenclasse6=array();
				$reponse444444=$bdd->query("SELECT DISTINCT GL_GENC6_DOCUMENT FROM tab_gl_genc6 WHERE MISSION_ID=".$mission_id);
				$glgenN6="";
				while($res444444=$reponse444444->fetch()){
				array_push($glGenclasse6, $res444444['GL_GENC6_DOCUMENT']);
				$glgenN6=$res444444['GL_GENC6_DOCUMENT'];
				}
				//////////////////requette selection gl gen classe 7///////////////////
				$reponse4444444=$bdd->query("SELECT GL_GENC7_DOCUMENT FROM tab_gl_genc7 WHERE MISSION_ID=".$mission_id. " group by GL_GENC7_DOCUMENT ");
				$glgenN7=array();
				while($res4444444=$reponse4444444->fetch()){
				$glgenN7[]=$res4444444['GL_GENC7_DOCUMENT'];
				}
				/////////////////////requette selection pour tt gl aux classe 1//////////////////////
			$g='N';
				$reponse6=$bdd->query("SELECT GL_AUX_DOCUMENT FROM tab_gl_aux WHERE MISSION_ID=".$mission_id);
				$glauxN1=""; 
				while($res6=$reponse6->fetch()){
				$glauxN1=$res6['GL_AUX_DOCUMENT'];
				}
				/////////////////////requette selection pour tt gl aux classe 2//////////////////////
				$reponse66=$bdd->query("SELECT GL_AUXC2_DOCUMENT FROM tab_gl_auxc2 WHERE MISSION_ID=".$mission_id);
				$glauxN2="";
				while($res66=$reponse66->fetch()){
				$glauxN2=$res66['GL_AUXC2_DOCUMENT'];
				}
				
				/////////////////////requette selection pour tt gl aux classe 3//////////////////////
				$reponse666=$bdd->query("SELECT GL_AUXC3_DOCUMENT FROM tab_gl_auxc3 WHERE MISSION_ID=".$mission_id);
				$glauxN3="";
				while($res666=$reponse666->fetch()){
				$glauxN3=$res666['GL_AUXC3_DOCUMENT'];
				}
				
				/////////////////////requette selection pour tt gl aux classe 4//////////////////////
				$reponse6666=$bdd->query("SELECT GL_AUXC4_DOCUMENT FROM tab_gl_auxc4 WHERE MISSION_ID=".$mission_id);
				$glauxN4="";
				while($res6666=$reponse6666->fetch()){
				$glauxN4=$res6666['GL_AUXC4_DOCUMENT'];
				}
				
				/////////////////////requette selection pour tt gl aux classe 5//////////////////////
				$reponse66666=$bdd->query("SELECT GL_AUXC5_DOCUMENT FROM tab_gl_auxc5 WHERE MISSION_ID=".$mission_id);
				$glauxN5="";
				while($res66666=$reponse66666->fetch()){
				$glauxN5=$res66666['GL_AUXC5_DOCUMENT'];
				}
				
				/////////////////////requette selection pour tt gl aux classe 6//////////////////////
				$reponse666666=$bdd->query("SELECT GL_AUXC6_DOCUMENT FROM tab_gl_auxc6 WHERE MISSION_ID=".$mission_id);
				$glauxN6="";
				while($res666666=$reponse666666->fetch()){
				$glauxN6=$res666666['GL_AUXC6_DOCUMENT'];
				}
				
				/////////////////////requette selection pour tt gl aux classe 7//////////////////////
				$reponse6666666=$bdd->query("SELECT GL_AUXC7_DOCUMENT FROM tab_gl_auxc7 WHERE MISSION_ID=".$mission_id);
				$glauxN7="";
				while($res6666666=$reponse6666666->fetch()){
				$glauxN7=$res6666666['GL_AUXC7_DOCUMENT'];
				}
			?>
		<table class="table_upload">
			<!-------------------------------Bal gen N------------------------------------------------>	
			<tr>
				<td>
					<label style="font-size: 115%; font-weight:bold; ">Balance générale N</label>
				</td>
				
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "import_Excel.php?mission_id=<?php echo $mission_id;?>">
						<input class="uploadfile" type = "file" onchange="" accept="application/vnd.ms-excel" id = "file_Import"  name = "file_Import"/>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
						<input type="submit" class="bouton-flat" name="Importer2" value="Upload" id = "id_impotdoc"/>
					</form>
					<div id="nomfichier1"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$balgenN.'" target="_blank">'.$balgenN.'</a>'; ?></td>
			</tr>
			<!-------------------------------------------------------------------------------------------->	
			<!-------------------------------Bal gen N-1-------------------------------------------------->
			<tr>
				<td>
					<label style="font-size: 115%; font-weight:bold; ">Balance générale N-1</label>
				</td>
				
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "importN1_Excel.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange="" accept="application/vnd.ms-excel" id = "file_ImportN1"  name = "file_ImportN1"/>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
						<input type="submit" class="bouton-flat" name="ImporterN1" value="Upload" id = "id_impotdocN1"/>
					</form>
					<div id="nomfichier1N1"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$balgenN2.'" target="_blank">'.$balgenN2.'</a>'; ?></td>
			</tr>
			<!-------------------------------------------------------------------------------------------->	
			<!-------------------------------Bal aux N-------------------------------------------------->
			<tr>
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Balance auxiliaire N</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "bal_aux_Excel.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange="" accept="application/vnd.ms-excel" id = "file_bal_aux" name = "file_bal_aux"/>
						 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
						<input type="submit" class="bouton-flat" name="bal_aux2" value="Upload" id = "id_bal_auxdoc"/>
					</form>
					<div id="nomfichier2"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$balauxN.'" target="_blank">'.$balauxN.'</a>'; ?></td>
			</tr>
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------Bal aux N-1-------------------------------------------------->
			<tr>
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Balance auxiliaire N-1</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "bal_aux_ExcelN1.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange="" accept="application/vnd.ms-excel" id = "file_bal_auxN1" name = "file_bal_auxN1"/>
						 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" class="bouton-flat" name="bal_aux22" value="Upload" id = "id_bal_auxdocN1"/>
					</form>
					<div id="nomfichier2N1"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$balauxN2.'" target="_blank">'.$balauxN2.'</a>'; ?>
			</tr>
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL GEN classe 1---------------------------------------------->		
			<tr>
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Grand livre gen classe 1</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_gen_Excel.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange="" id = "file_gl_gen" accept="application/vnd.ms-excel"  name = "file_gl_gen"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;				
						<input type="submit" class="bouton-flat" name="gl_gen2" value="Upload" id = "id_gl_gen"/>
					</form>
					<div id="nomfichier3"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glgenN1.'" target="_blank">'.$glgenN1.'</a>'; ?></td>
			</tr>
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL GEN classe 2---------------------------------------------->	
			<tr>
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Grand livre gen classe 2</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_gen_ExcelC2.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange="" id = "file_gl_genC2" accept="application/vnd.ms-excel"  name = "file_gl_genC2"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;				
						<input type="submit" class="bouton-flat" name="gl_gen2C2" value="Upload" id = "id_gl_genC2"/>
					</form>
					<div id="nomfichier3C2"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glgenN2.'" target="_blank">'.$glgenN2.'</a>'; ?></td>
			</tr>
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL GEN classe 3---------------------------------------------->	
			<tr>
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Grand livre gen classe 3</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_gen_ExcelC3.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange="" id = "file_gl_genC3" accept="application/vnd.ms-excel"  name = "file_gl_genC3"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;				
						<input type="submit" class="bouton-flat" name="gl_gen2C3" value="Upload" id = "id_gl_genC3"/>
					</form>
					<div id="nomfichier3C3"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glgenN3.'" target="_blank">'.$glgenN3.'</a>'; ?></td>
			</tr>
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL GEN classe 4---------------------------------------------->	
			<tr>
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Grand livre gen classe 4</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_gen_ExcelC4.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange="" id = "file_gl_genC4" accept="application/vnd.ms-excel"  name = "file_gl_genC4"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;				
						<input type="submit" class="bouton-flat" name="gl_gen2C4" value="Upload" id = "id_gl_genC4"/>
					</form>
					<div id="nomfichier3C4"></div>
				</td>
				<td><?php //echo '<a class="lien_upload" href="archive/'.$glgenN4.'" target="_blank">'.$glgenN4.'</a>'; ?>
				
				<?php
					foreach ($glGenclasse4 as $lien) {
						echo '<a class="lien_upload" href="archive/'.$lien.'" target="_blank">'.$lien.'</a><br/>';
					}
				?>
				</td>
			</tr>
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL GEN classe 5---------------------------------------------->	
			<tr>
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Grand livre gen classe 5</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_gen_ExcelC5.php?mission_id=<?php echo $mission_id;?>">
						<input class="uploadfile" type = "file" onchange="" id = "file_gl_genC5" accept="application/vnd.ms-excel"  name = "file_gl_genC5"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;				
						<input type="submit" class="bouton-flat" name="gl_gen2C5" value="Upload" id = "id_gl_genC5"/>
					</form>
					<div id="nomfichier3C5"></div>
				</td>
				<td><?php //echo '<a class="lien_upload" href="archive/'.$glgenN5.'" target="_blank">'.$glgenN5.'</a>'; ?>
				<?php
					foreach ($glGenclasse5 as $lien) {
						echo '<a class="lien_upload" href="archive/'.$lien.'" target="_blank">'.$lien.'</a><br/>';
					}
				?>

				</td>
			</tr>
			<!-------------------------------GL GEN classe 6---------------------------------------------->	
			<tr>
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Grand livre gen classe 6</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_gen_ExcelC6.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange="" id = "file_gl_genC6" accept="application/vnd.ms-excel"  name = "file_gl_genC6"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;				
						<input type="submit" class="bouton-flat" name="gl_gen2C6" value="Upload" id = "id_gl_genC6"/>
					</form>
					<div id="nomfichier3C6"></div>
				</td>
				<td><?php //echo '<a class="lien_upload" href="archive/'.$glgenN6.'" target="_blank">'.$glgenN6.'</a>'; ?>
				<?php
					foreach ($glGenclasse6 as $lien) {
						echo '<a class="lien_upload" href="archive/'.$lien.'" target="_blank">'.$lien.'</a><br/>';
					}
				?>
				</td>
			</tr>
			<!------------------------------- GL GEN classe 7 ---------------------------------------------->	
			<tr>
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Grand livre gen classe 7</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_gen_ExcelC7.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange="" id = "file_gl_genC7" accept="application/vnd.ms-excel"  name = "file_gl_genC7"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;				
						<input type="submit" class="bouton-flat" name="gl_gen2C7" value="Upload" id = "id_gl_genC7"/>
					</form>
					<div id="nomfichier3C7"></div>
				</td>
				<td><?php 
				foreach ($glgenN7 as $lien) 
				{
					echo '<a class="lien_upload" href="archive/'.$lien.'" target="_blank">'.$lien.'</a><br>';
				}
				  ?></td>
			</tr>
			<!-------------------------------GL AUX classe 1---------------------------------------------->	
<!-- 			<tr>				
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Grand livre aux classe 1</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_aux_Excel.php">
						<input type = "file" onchange=""accept="application/vnd.ms-excel"id = "file_gl_aux" name = "file_gl_aux"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
						<input type="submit" class="bouton-flat" name="gl_aux2" value="Upload" id = "id_gl_aux"/>
					</form>
					<div id="nomfichier4"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glauxN1.'" target="_blank">'.$glauxN1.'</a>'; ?></td>
			</tr> -->		
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL AUX classe 2---------------------------------------------->	
<!-- 			<tr>				
				<td width="220px">
					<label style="font-size: 115%; font-weight:bold; ">Grand livre aux classe 2</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_aux_ExcelC2.php">
						<input type = "file" onchange=""accept="application/vnd.ms-excel"id = "file_gl_auxC2" name = "file_gl_auxC2"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
						<input type="submit" class="bouton-flat" name="gl_aux2C2" value="Upload" id = "id_gl_auxC2"/>
					</form>
					<div id="nomfichier4C2"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glauxN2.'" target="_blank">'.$glauxN2.'</a>'; ?></td>
			</tr>	 -->
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL AUX classe 3---------------------------------------------->	
<!-- 			<tr>				
				<td>
					<label style="font-size: 115%; font-weight:bold; ">Grand livre aux classe 3</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_aux_ExcelC3.php">
						<input type = "file" onchange=""accept="application/vnd.ms-excel"id = "file_gl_auxC3" name = "file_gl_auxC3"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
						<input type="submit" class="bouton-flat" name="gl_aux2C3" value="Upload" id = "id_gl_auxC3"/>
					</form>
					<div id="nomfichier4C3"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glauxN3.'" target="_blank">'.$glauxN3.'</a>'; ?></td>
			</tr>	 -->			
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL AUX classe 4---------------------------------------------->	
			<tr>				
				<td>
					<label style="font-size: 115%; font-weight:bold; ">Grand livre aux Client</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_aux_ExcelC4.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange=""accept="application/vnd.ms-excel"id = "file_gl_auxC4" name = "file_gl_auxC4"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
						<input type="submit" class="bouton-flat" name="gl_aux2C4" value="Upload" id = "id_gl_auxC4"/>
					</form>
					<div id="nomfichier4C4"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glauxN4.'" target="_blank">'.$glauxN4.'</a>'; ?></td>
			</tr>	
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL AUX classe 5---------------------------------------------->	
			<tr>				
				<td>
					<label style="font-size: 115%; font-weight:bold; ">Grand livre aux Fournisseurs</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_aux_ExcelC5.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange=""accept="application/vnd.ms-excel"id = "file_gl_auxC5" name = "file_gl_auxC5"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
						<input type="submit" class="bouton-flat" name="gl_aux2C5" value="Upload" id = "id_gl_auxC5"/>
					</form>
					<div id="nomfichier4C5"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glauxN5.'" target="_blank">'.$glauxN5.'</a>'; ?></td>
			</tr>		
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL AUX classe 6---------------------------------------------->	
			<tr>				
				<td>
					<label style="font-size: 115%; font-weight:bold; ">Grand livre aux Personnel</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_aux_ExcelC6.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange=""accept="application/vnd.ms-excel"id = "file_gl_auxC6" name = "file_gl_auxC6"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
						<input type="submit" class="bouton-flat" name="gl_aux2C6" value="Upload" id = "id_gl_auxC6"/>
					</form>
					<div id="nomfichier4C6"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glauxN6.'" target="_blank">'.$glauxN6.'</a>'; ?></td>
			</tr>	
			<!-------------------------------------------------------------------------------------------->
			<!-------------------------------GL AUX classe 7---------------------------------------------->	
			<tr>				
				<td>
					<label style="font-size: 115%; font-weight:bold; ">Grand livre aux Debiteurs et crediteurs divers</label>
				</td>
				<td class="td_upload">
					<form method = "post" enctype="multipart/form-data" action = "gl_aux_ExcelC7.php?mission_id=<?php echo $mission_id;?>">
						<input type = "file" onchange=""accept="application/vnd.ms-excel"id = "file_gl_auxC7" name = "file_gl_auxC7"/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
						<input type="submit" class="bouton-flat" name="gl_aux2C7" value="Upload" id = "id_gl_auxC7"/>
					</form>
					<div id="nomfichier4C7"></div>
				</td>
				<td><?php echo '<a class="lien_upload" href="archive/'.$glauxN7.'" target="_blank">'.$glauxN7.'</a>'; ?></td>
			</tr>
			<!-------------------------------------------------------------------------------------------->
			<tr>
				<td>
					<input type = "button" id = "dv_autres" class="btn_autres" value = "Autres Documents" onclick="autre()"/>
				</td>
				<td>
				 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				
				<input type = "button" id = "dv_controle" class="btn_autres" value = "Contr&ocirc;le Coh&eacute;rence"/>	
				</td>
			</tr>
			
		</table>

<div id="autre_documents" style="display:none">
	<table class="table_upload">
		<tr>
			<td>
				<label>Balance âgée :</label>
			</td>
			<td>
				<form method = "post" enctype="multipart/form-data" action = "import_Excel.php?mission_id=<?php echo $mission_id;?>">
					<input type = "file"  accept="application/vnd.ms-excel" id = "file_Import" name = "file_Import"/>
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc1"    class="bouton-flat" />
					<br/><br/>
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<label>Bilan :</label>
			</td>
								
			<td>
				<form method = "post" enctype="multipart/form-data" action = "import_Excel.php?mission_id=<?php echo $mission_id;?>">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import" name = "file_Import"/>
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc2" onclick=" uploader()"   class="bouton-flat" />
					<br/><br/>
				</form>
			</td>
		</tr>
		
		<tr>
			<td>
				<label>Compte de résultats :</label>
			</td>
			<td>
				<form method = "post" enctype="multipart/form-data" action = "import_Excel.php?mission_id=<?php echo $mission_id;?>">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import" name = "file_Import"/>
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc3"  class="bouton-flat" />
					<br/><br/>
				</form>
			</td>
		</tr>
		
		<tr>
			<td>
				<label>Tableau d’amortissement :</label>
			</td>
			<td>
				<form method = "post" enctype="multipart/form-data" action = "import_Excel.php?mission_id=<?php echo $mission_id;?>">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import" name = "file_Import"/>
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc4" class="bouton-flat" />
					<br/><br/>
				</form>
			</td>
		</tr>
		
		<tr>
			<td>
				<input type = "button" id = "dv_autres" value = "Autres" />
				<input type = "button" id = "dv_retour1" value = "Retour"/>							
			</td>
		</tr>
		</table>
		<div id="progressbarDFin" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
		</div>
</div>
			
		<label style="color:blue; font-size: 115%;" class="table_upload"><b>Autres documents de la mission</b></label>
		<table border = "1" class="table_upload">	
			<tr>
				<td width="300px;">Balance âgée</td>
				<td width="500px;"></td>
			</tr>
			<tr>
				<td width="300px;">Bilan</td>
				<td width="500px;"></td>
			</tr>
			<tr>
				<td width="300px;">Compte de résultats</td>
				<td width="500px;"></td>
			</tr>
			<tr>
				<td width="300px;">Tableau d’amortissement</td>
				<td width="500px;"></td>
			</tr>
			<tr>
				<td width="300px;">Autres</td>
				<td width="500px;"><?php echo $documents_autres;?></td>
			</tr>
		</table>	
	<div id="progressbarDFin" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/Loader.gif" /><br />Veuillez patienter s'il vous plaît</center>
	</div>
				
	</body>
<html>