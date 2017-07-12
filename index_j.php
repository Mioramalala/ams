<?php 
include "connexion.php";
@session_start();
if(@$_SESSION["user"]!=""){
	
	//header.location('accueil.php');
	 include "accueil.php";
	 exit();
}
?>

<html>
	<head>
		<title>authentification</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/styleAut.css"/>
		<script text="javascript" src="js/jquery-1.7.2.js"></script>
		<link href="facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
		<script src="facebox/facebox.js" type="text/javascript"></script> 
		<script>
		jQuery(document).ready(function($) {
			  $('a[rel*=facebox]').facebox();
			}) ;
		
			function testMail(){
			
			var cmtAr=0;
			var cmtMaj=0;
				var mail=$("#userId").val();
				var regMail=/^[A-Z]$/;
				var nbr= mail.length;
				lettre=[];
				 for (i=0; i<=nbr ; i++){
					lettre[i]=mail.substr(i,1);
					if(lettre[i]=='@'){
						cmtAr=cmtAr+1;
					}else if(regMail.test(lettre[i])){
						//alert("mqj");
						cmtMaj=cmtMaj+1;
					}
					}
					
				
				//alert(cmtAr);
				if(cmtAr<1 && cmtMaj<1)
				{
				$("#alert").fadeIn(1000);
				$("#userId").val("");
				$("#pswId").val("");
				}
				
			}
			
			function mialAlert(){
				$("#alert").fadeOut(500);
			
			}
		
			
			
				// $("#entertId").click(function(){
				function miditra(){
					
					var user= $("#userId").val();
					var mdp= $("#pswId").val();
					
					 // alert(user +''+ mdp );
					 if(user=="" && mdp==""){
					 jQuery.facebox({ ajax: 'alert/diso.php' });
					 return false;
					 }
					$.ajax({
							url:"postAuth.php",
							type:"POST",
							data:{a:user,b:mdp},
							success: function(ret){
								
								if(ret<1){
									
									jQuery.facebox({ ajax: 'alert/diso.php' });
									$("#userId").val("");
									$("#pswId").val("");
									
								}
								else{
								// alert(user);
								
									 parent.location = "accueil.php";
									 				 
								}
								
								
							}
					
					
					});
					
				
				 return false;
				}
				
				$(function(){
				
			$('#userId').focus(); 
			// $("input[name='user']").getCursorPosition();
			
			
			});
			function quitBox()
			{   
				alert("etes vous sur de vouloir quitter la page");
					//myWindow.close();
				  
			}
			// window.onbeforeunload = quitBox;		
		</script>
		
	</head>
	<body>
	
		<div id="rehetra" >	
		
			<center>
				<div id="cadre">
				<img src="icone/Logo_AMS.png" id="logo"/>
					<div id="styl_soratra">
						
						<center><p style="color:#0682BE; font-size:25px;">  Bienvenue </p></center>
					</div>
				
					<form id="aut" onSubmit="return miditra(); " >
						<div id="kely">
							<p class="cl1">Login</p>
							<p><input type="text" name="user" id="userId" class="cazAuth" onKeyUp="mialAlert()" placeholder="Entrer votre mail"/></p>
							<p class="cl2">Mot de passe</p>
							<p><input type="password" name="psw" id="pswId" class="cazAuth" onKeyUp="testMail()" placeholder="Mot de passe"/></p>
							<p class="cl3"> <input type="checkbox" name="caz" id="caz_id"/> Se rappeler de moi</p>
						</div>
					
							
						
						<input type="submit" id="entertId" value="Connexion"/>
						<!--<input type="button" name="Quit" id="Quit" value="Quit" onclick=" quitBox();" />-->
					</form>
				</div>
				
				<div id="indexAmbany">
					<p>	<label class="cl4">Mot de passe oublié</label > <label class="cl4">A propos d'AMS </label> <label class="cl4">Aide</label> </p>
				
				
				</div>
				
			</center>
		</div>
		<div id="alert">
			Veuillez entrer un mail
		</div>
		
		
		
		
		
	</body>

</html>