<?php
	require_once '../connexion.php';
	@session_start();

?>

<head>
<link rel="stylesheet" href="../css/Rap_int.css"/>
<script text="javascript" src="../js/RapInt.js"></script>
<script type="text/javascript" src="Rap_Inter/notesAnnexes/assets/js/main.js"></script>


<script text="javascript">
	$(document).ready(function (){
		$("#form_rapport_general").hide();
		$("#btn_upload_rapport_general").click(function(){
			$("#form_rapport_general").show();
		});

		$("#form_rapport_special").hide();
		$("#btn_upload_rapport_special").click(function(){
			$("#form_rapport_special").show();
		});

	});
</script>

 <style type="text/css">
#contenue_RA {
	height: 90%;
	overflow: auto;
}
	.Rapp_rond{
	text-align:center;
	font-size:16px;
	height:40px;
	width:85px;
	background-color:#48D1CC;
	color:#fff;


		vertical-align:middle;	
	   border-radius: 100px;
	   padding: 4px;
	   margin-right: 15px;
	   
	   transition: box-shadow 0.4s, color 0.4s,padding 0.4s; 
	   -webkit-transition: box-shadow 0.4s, color 0.4s,padding 0.4s; 
	   -moz-transition: box-shadow 0.4s, color 0.4s,padding 0.4s; 
	   -o-transition: box-shadow 0.4s, color 0.4s,padding 0.4s;
	}

	.Rapp_rond:hover{
	cursor:pointer;

	box-shadow: 0 0 0 3px #1e91ad;

	  animation:animRoule 0.5s linear;
	   -webkit-animation:animRoule 0.5s linear; 
	   -moz-animation:animRoule 0.5s linear;
	   -o-animation:animRoule 0.5s linear;
	}
	.head {
		background-color:#2da4f4;
		
	    }

	.slash:hover {
	background-color: #fff;

	}
	.s_slash:hover {
	background-color: #fff; /*eee*/

	}

	#zone_telechargement{
		float: left;
		
	position:absolute;
	top: 10px;
	height: 300px;
	width: 300px;
	left: 455px;
	/*margin-top: -195px;*/
	}
	#Menu_rapport_inter{
	float: left;
	left: 250px;
	top: 100px;
	position: absolute;

	}

	.Sous_rdc{
		display: none;
	}

	.cah2{
	display: none;
	}

	#cahe1 :hover { 
	background-image:url(Dossier_Rapport/img/btn2.png);
	background-repeat:no-repeat;
	}
	.cahe2:hover:before { 
	content:" » ";
	}

	#zone_telechargement strong:hover { 
	 cursor:  pointer;
	color: #2da4f4;
	background-repeat:no-repeat;
	}
	#zone_telechargement strong:hover:before {
	 cursor:  pointer; 
	content:" » ";
	}
	strong{
		color: #ccc;
	}

	#Rapport_definitif{
	float: left;
	left: 250px;
	top: 45px;
	position: absolute;

	}
	.entete{
	position: fixed;
	}

	.zone_telechargement_rapport{


		float: left;
		
	position:absolute;
	top: 10px;
	left:90px;
	height: 300px;
	width: 300px;
	left: 455px;

	}

	#Global #gauche {
	    float:left;
	    width:40%;
	}
	#Global #droite {
	    margin-left:60%   
	}
	#Tete{
		top:120px;
		float:100px;
		}
		#shad{
			width:1088px;
	height:30px;
	background-color:fff;
	box-shadow: 10px 10px 5px #888888;
			}
			.td:hover{
				background-color:#3e515f;
				 cursor:  pointer; 
				background-repeat:no-repeat;
				/*border-color: #333;
		transform: rotate(1080deg);
		border-radius: 50%;*/
				}
				.tr:hover{
					background-color:#eee
					}
					.a:active { color: #fff }
					div{/*width: 90px; height: 90px;
		margin: 3em;
		background: #fff;
		border: 20px solid #aaa;
		border-radius: 30px;
		transition: all 2s;*/}
		
		/* ================STYLE UPLOAD=================*/
		.edt
	  {
	    background:#ffffff; 
	    border:3px double #aaaaaa; 
	    -moz-border-left-colors:  #aaaaaa #ffffff #aaaaaa; 
	    -moz-border-right-colors: #aaaaaa #ffffff #aaaaaa; 
	    -moz-border-top-colors:   #aaaaaa #ffffff #aaaaaa; 
	    -moz-border-bottom-colors:#aaaaaa #ffffff #aaaaaa; 
	    width: 350px;
	  }
	  .edt_30
	  {
	    background:#ffffff; 
	    border:3px double #aaaaaa; 
	    font-family: Courier;
	    -moz-border-left-colors:  #aaaaaa #ffffff #aaaaaa; 
	    -moz-border-right-colors: #aaaaaa #ffffff #aaaaaa;
	    -moz-border-top-colors:   #aaaaaa #ffffff #aaaaaa; 
	    -moz-border-bottom-colors:#aaaaaa #ffffff #aaaaaa; 
	    width: 30px;
	  }
/*========fenetre======*/


/*=========fentre==========*/

</style>
</head>
<body>
<div id="contenue_RA">
<div id="Tete">


	   <div id="gauche" >
	     <table width="1000" border="0">
	       <tr bgcolor="#eee" style=" box-shadow:#960">
	         <td colspan="2"><div id="shad"><span style="float:left" >
	           <table width="711" border="0">
	             <tr>
	               <td width="34" height="27"><span style="float:left;heigth:50px"><img src="../Dossier_Rapport/img/btn.png" width="30" height="23" /></span></td>
	               <td width="667"><font color="#999"><b>RAPPORTS DEFINITIFS    </b></font> <font size="+2"> ></font> </td>
                 </tr>
               </table>
	         </div></td>
           </tr>
	       <tr>
	         <td colspan="2" ><table width="1088" border="0">
	           <tr >
	             <td height="21"><div align="center"><font color="999999"><b>-</b></font></div></td>
	             <td colspan="2" ><b><font color="999999">TITRE</font></b></td>
	             <td  ><div align="center"><b><font color="999999">Document</font></b></div></td>
	             <td> <div align="center"><b><font color="999999">#</font></b></div></td>
               </tr>
	           <tr class="tr">
	             <td><img src="../Dossier_Rapport/img/R.png" width="59" height="103" /></td>
	             <td width="339" ><div align="left"><b><font color="#999999">Rapport general</font></b></div></td>                        
	             <td width="443">
          <div align="center"   >  

    <div id="form_rapport_general" >
    <form enctype="multipart/form-data" action="Rap_Inter/fileupload_general.php" method="post">
      <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
      <input type="file" name="monfichier" />
      <input type="submit" />
    </form>
    </div>
    
    </div>
          <div class="Afficher"></div></td>
	             <td bgcolor="#eee" class="td">
	             <div align="center" >
	             <!-- Modification by Niaina -->
	             	<a id="btn_upload_rapport_general" title="Upload" class="label_upoad"> <img src="../img/up.png" height="24" width="24"/></a><br><br>
	             	<a title="Generer" class="a" id="btn_rapport_general"> <img src="../img/down.png" height="24" width="24"/></a>
	             </div>
	             </td>
	            <!-- VERIFICATION D'UN FICHIER RAPPORT GENERAL DEJA EXISTANT BY NIAINA -->
	            <!-- Upload -->
	            <td><div align="center" id="rapport_general">
	            <?php	           		
				    $fichier1 = '../uploads/Rapport_general.pdf';
				    $fichier2 = '../uploads/Rapport_general.jpg';
				    $fichier3 = '../uploads/Rapport_general.jpeg';
				    $fichier4 = '../uploads/Rapport_general.gif';
					if (file_exists($fichier1) || file_exists($fichier2) || file_exists($fichier3) || file_exists($fichier4)) {
	           	?>
	             
	            <?php
	             	$sql = 'SELECT * FROM tab_rapport WHERE ID_MISSION='.$_SESSION['idMission'].' AND TYPE_GENERATION = "upload_rapport_general"';
					$req = $bdd->query($sql);
					$tab = $req->fetch();					
	             	echo '<a href="../uploads/'.$tab['NAME'].'" TARGET="_BLANK"><img src="../img/file.png" height="28px" width="28px"/></a>';
	             ?>

	            <?php
	            	} 
	            ?>
	            <!-- Generer -->
	           	<?php	           		
	           		$fichier = glob('../Dossier_Rapport/Sauvegarde_sortie/Word/RAPPORT_GENERAL*.docx');
					if ($fichier) {
	           	?>
	            <br>
	            <?php
	             	$sql = 'SELECT * FROM tab_rapport WHERE ID_MISSION='.$_SESSION['idMission'].' AND TYPE_GENERATION = "rapport_general"';
					$req = $bdd->query($sql);
					$tab = $req->fetch();					
	             	echo '<a href="../Dossier_Rapport/Sauvegarde_sortie/Word/RAPPORT_GENERAL ('.$tab['DATE_GENERATION'].').docx" TARGET="_BLANK"><img src="../Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';
	             ?>
	             </div>
	             </td>
	            <?php
	            	} 
	            ?>

	             <td align="center" id="rapport_general">&nbsp;</td>

               </tr>

	           <tr class="tr">
	             <td><img src="../Dossier_Rapport/img/R.png" width="59" height="103" /></td>
	             <td width="339" ><div align="left"><b><font color="#999999">Rapport spécial</font></b></div></td>                        
	             <td width="443">
          <div align="center"   >  

    <div id="form_rapport_special" >
    <form enctype="multipart/form-data" action="Rap_Inter/fileupload_special.php" method="post">
      <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
      <input type="file" name="monfichier" />
      <input type="submit" />
    </form>
    </div>
    
    </div>
          <div class="Afficher"></div></td>
	             <td bgcolor="#eee" class="td">
	             <div align="center" >
	             <!-- Modification by Niaina -->
	             	<a id="btn_upload_rapport_special" title="Upload" class="label_upload"> <img src="../img/up.png" height="24" width="24"/></a><br><br>
	             	<a title="Generer" class="a" id="btn_rapport_special"> <img src="../img/down.png" height="24" width="24"/></a>
	             	</div>
	             </td>
	            <!-- VERIFICATION D'UN FICHIER RAPPORT SPECIAL DEJA EXISTANT BY NIAINA -->
	            <!-- Upload -->
	            <td><div align="center" id="rapport_special">
	            <?php	           		
				    $fichier1 = '../uploads/Rapport_special.pdf';
				    $fichier2 = '../uploads/Rapport_special.jpg';
				    $fichier3 = '../uploads/Rapport_special.jpeg';
				    $fichier4 = '../uploads/Rapport_special.gif';
					if (file_exists($fichier1) || file_exists($fichier2) || file_exists($fichier3) || file_exists($fichier4)) {
	           	?>
	             
	            <?php
	             	$sql = 'SELECT * FROM tab_rapport WHERE ID_MISSION='.$_SESSION['idMission'].' AND TYPE_GENERATION = "upload_rapport_special"';
					$req = $bdd->query($sql);
					$tab = $req->fetch();					
	             	echo '<a href="../uploads/'.$tab['NAME'].'" TARGET="_BLANK"><img src="../img/file.png" height="28px" width="28px"/></a>';
	             ?>

	            <?php
	            	} 
	            ?>
	            <!-- Generer -->
	           	<?php	           		
	           		$fichier = glob('../Dossier_Rapport/Sauvegarde_sortie/Word/RAPPORT_SPECIAL*.docx');
					if ($fichier) {
	           	?>
	            <br>
	            <?php
	             	$sql = 'SELECT * FROM tab_rapport WHERE ID_MISSION='.$_SESSION['idMission'].' AND TYPE_GENERATION = "rapport_special"';
					$req = $bdd->query($sql);
					$tab = $req->fetch();					
	             	echo '<a href="../Dossier_Rapport/Sauvegarde_sortie/Word/RAPPORT_SPECIAL ('.$tab['DATE_GENERATION'].').docx" TARGET="_BLANK"><img src="../Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';
	             ?>
	             </div>
	             </td>
	            <?php
	            	}
	            ?>
	             <td align="center" id="rapport_special">&nbsp;</td>

	             <!-- Fin Modification -->
               </tr>
	           <tr class="tr">
	             <td><img src="../Dossier_Rapport/img/N.png" width="59" height="103" /></td>
	             <td colspan="2" ><div align="left"><b><font color="#999999">Notes annexes</font></b></div></td>
	             <td bgcolor="#eee" class="td"><div align="center" >
	             <a href="#" title="Preparer" class="label_upoad" id="id_preparer"> <img src="../img/prepare.png" height="24" width="24"/></a><br><br>
	             <a title="Générer" class="a" id="Generer"> <img src="../img/down.png" height="24" width="24"/></a>
	             </div></td>
	             <td><div align="center" id="notes_annexes">&nbsp;</div></td>
               </tr>
	          
             </table></td>
           </tr>
         </table>
  </div>


</div>
 </div>
</body>
<!--</center> -->

 <script type="text/javascript" src="../Dossier_Rapport/js_telechargement/all_js_telechargement.js" ></script>
	
  <script src="../Dossier_Rapport/js_telechargement/jquery.form.js"></script> 
	 <script type="text/javascript" src="../Dossier_Rapport/js_telechargement/Event_page.js" ></script>
	 <script type="text/javascript">
	 <!--
	 
	 	$("#id_preparer").click(function(){
	 		chemin = "Rap_Inter/notesAnnexes/choix_etat_fi.php";
	 		$.get(chemin,
	 			function(res){
	 				$("#contenue_RA").html(res);
	 				$('#nom_cycle span').html('<strong>Notes annexes</strong>');
	 		});
	 		// $("#contenue_RA").load(chemin);
	 	});
	 //-->
	 </script>
