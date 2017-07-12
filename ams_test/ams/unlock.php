<?php
@session_start();
 $connex='localhost';

try {
	$bdd = new PDO('mysql:host='.$connex.';dbname=tmsconsuams','root', 'P2017amsOGpwd');
	//$bdd->exec("set names utf8");
}
catch(PDOException $e)
 {
	echo "Veuillez bien configurer la connection sur votre base donnée sur le fichier unlock.php";
	// echo "Connection failed: " . $e->getMessage();
 }
 if(count($_POST) && isset($_POST["user"])){
	 $user=str_replace("'","\\'",$_POST["user"]);
	 if(!$user){
		 echo 0;
		die(); 
	 }
	 $r=$bdd->query("
		SELECT
			count(*) as c_count
		FROM
		`tab_utilisateur` 
			WHERE
		UTIL_LOGIN='$user';");
	$rs=$r->fetch();
	$count=0;
	if($rs){
		$count=$rs["c_count"];
	}
	if($count){
		$bdd->query("
			UPDATE
				tab_utilisateur
			SET
				STATUT_CONNEXION=0
			WHERE
				UTIL_LOGIN='$user';");
			echo 1;
	}
	else{
		echo 2;
	}
	 
	 
	 die();
 }
 ?>
 
<html>
	<head>
		<title>Debloquage login</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="waiting.css"/>
		<link rel="stylesheet" href="css/styleAut.css"/>
		<script text="javascript" src="js/jquery-1.7.2.js"></script>
		<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
		<script src="facebox/facebox.js" type="text/javascript"></script> 
		<style>
			body{
				width:100%;
				height:100%;
				position:relative;
			}
		</style>
		<script>
		function waiting(){
			$('#Acc').show();
			$('<div id="waiting"></div><div id="loading"><center><img src="RDC/paie/ajax-loader_blue.gif"/><br /><strong style="color: #095487;">Veuillez patienter ...</strong></center></div>').prependTo('#Acc');
		}
		function stopWaiting(){
			$('#Acc').hide();
			$('#waiting').remove();
			$('#loading').remove();
		}
		
            var login="";
		jQuery(document).ready(function($)
		{
			
			$('#Acc').hide();
			  $('a[rel*=facebox]').facebox();

		}) ;
			
		function mialAlert()
		{
				$("#alert").fadeOut(500);
		}



		//************* FONCTION CONNECTION LOGIN **************
		function _connection_login()
		{
					var user= $("#userId").val();
					
					 // alert(user +''+ mdp );
					 if(user==""){
					 jQuery.facebox({ ajax: 'alert/empty_login.php' });
						return false;
					 }
					waiting();
					$.ajax({
							url:"",
							type:"POST",
							data:{user:user},
							success: function(ret)
							{
								stopWaiting();
								if(ret==0)
								{
									jQuery.facebox({ ajax: 'alert/empty_login.php' });
									
								}
								else if(ret==1)
								{
									jQuery.facebox({ ajax: 'alert/success_unlock.php' });
									$("#userId").val("");
								}
								else if(ret==2){
									jQuery.facebox({ ajax: 'alert/error_login.php' });
									$("#userId").val("");
									 
									 				 
								}

								
								
							}
					
					
					});

				 return false;
		}//************* FONCTION CONNECTION LOGIN **************


			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			// AFFICHER POPUP A PROPOS
			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				
			function afficher_propos(){
				
			
				$("#fenetre_propos").show();
				
				}
			function fermer_apropos(){
				$("#fenetre_propos").hide();
				}
			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			
			
		</script>
		
	</head>
	<body>
		
		<div id="rehetra" >	
		       <!--  ++++++++++++++++++++++++POPUP A PROPOS++++++++++++++++++++++++++-->
		  <div id="fenetre_propos"  style="position: absolute; border: ridge; top: 165px; left: 300px; width: 554px;display:none">
		    <div id="btn_fermeture1" align="right" style="position: absolute; left: 542px; top: -14px;"><img src="icone/fermer.png" width="30" height="30" onClick="fermer_apropos()"/></div>
		    <table width="554" height="296" border="0" bgcolor="#FFFFFF">
		      <tr>
		        <td height="111" colspan="2">&nbsp;</td>
		        <td width="101"><div align="center"><img src="icone/defaut_.png" width="100px" height="100px" align="middle"/></div></td> 
		        <td width="210" >&nbsp;</td>
	          </tr>
		      <tr>
		        <td width="66" height="15">&nbsp;</td>
		        <td width="118">&nbsp;</td>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
	          </tr>
		      <tr>
		        <td height="21" colspan="4" align="center"><font color="#999"  >Application Web dévéloppée et conçue</font></td>
	          </tr>
		      <tr>
		        <td colspan="4" height="30"><table width="100%" height="100%" border="0" bgcolor="#999999">
                  
                  
		          <tr>
		            <td colspan="2" align="right"><div align="center" ><font color="#FFF" size="-2"> pour</font></div></td>
		            <td width="21%">&nbsp;</td>
		            <td width="21%" align="center"><font color="#FFF" size="-2">du groupe</font></td>
		            <td width="18%">&nbsp;</td>
		            <td width="22%" align="center"><font color="#FFFFFF" size="-2"> par</font></td>
	              </tr>
		          <tr>
		            <td width="2">&nbsp;</td>
		            <td width="15%"><img src="icone/og.png" width="108px" height="40px"></td>
		            <td></td>
		            <td><img src="icone/bt.jpg" width="108px" height="40px"></td>
		            <td>&nbsp;</td>
		            <td align="center"><img src="logo/TMS-576x352.png" width="108px" height="40px" align="middle"/></td>
	              </tr>
		          <tr>
		            <td height="21">&nbsp;</td>
		            <td>&nbsp;</td>
		            <td>&nbsp;</td>
		            <td>&nbsp;</td>
		            <td>&nbsp;</td>
		            <td><span style="color:#FFFFFF;font-size:12px">www.tmsconsulting.pro</span></td>
	              </tr>
	            </table></td>
	          </tr>
	        </table>
	      </div>
          
           <!--  ++++++++++++++++++++++++POPUP A PROPOS++++++++++++++++++++++++++-->
			<center>
				<div id="cadre">
				<img src="icone/Logo_AMS.png" id="logo"/>
					<div id="styl_soratra">
						
						<center><p style="color:#0682BE; font-size:25px;">  Debockage de login </p></center>
					</div>
				
					<form id="aut" onSubmit="return _connection_login(); " >
						<div id="kely">
							<p class="cl1">Login</p>
							<p><input type="text" name="user" id="userId" class="cazAuth" onKeyUp="mialAlert()" placeholder="Entrer votre mail"/></p>
						</div>
					
							
						
						<input type="submit" id="entertId" value="Debloquer ce login"/>
						<!--<input type="button" name="Quit" id="Quit" value="Quit" onclick=" quitBox();" />-->
					</form>
				</div>
				
				<div id="indexAmbany">
					<p>	<label class="cl4">Mot de passe oublié</label > <label class="cl4" onClick="afficher_propos()">A propos d'AMS </label> <label class="cl4">Aide</label> </p>
				
				
				</div>
				
			</center>
		</div>
		<div id="alert">
			Veuillez entrer un mail
		</div>
		
		<div id="Acc"style="position: fixed; top: 0px; width: 100%; height: 100%;"></div>
		
		
		
	</body>

</html>



<?php 
 
 

 /*
 
$UTIL_ID=@$_SESSION['id'];
$admin=$bdd->query("select STATUT_CONNEXION from tab_utilisateur where UTIL_ID='$UTIL_ID'");
$res_=$admin->fetch();
$UTIL_ACTIF=$res_['STATUT_CONNEXION'];
if($UTIL_ACTIF==1)
{
   $dateMaintenant=date("Y-m-d H:i:s");
   $admin=$bdd->query("UPDATE tab_utilisateur SET date_connect='$dateMaintenant'  WHERE UTIL_ID ='$UTIL_ID'");
}
*/
