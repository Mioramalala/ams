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
            var login="";
            var password="";
            function readCookie(name)
            {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }

		jQuery(document).ready(function($)
		{
			  $('a[rel*=facebox]').facebox();



                $("#userId").blur(function(e)
                {
                    login=$("#userId").val();
                    $.post("getCookie_pass.php",{login:login},function (Respass)
                    {
                        if(Respass!="")
                            $("#pswId").val(Respass);
                    });

                });

		}) ;
		
		function testMail()
		{
			
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
			
		function mialAlert()
		{
				$("#alert").fadeOut(500);
		}



		//************* FONCTION CONNECTION LOGIN **************
		function _connection_login()
		{
					var user= $("#userId").val();
					var mdp= $("#pswId").val();
					
					 // alert(user +''+ mdp );
					 if(user=="" && mdp==""){
					 jQuery.facebox({ ajax: 'alert/diso1.php' });
					 return false;
					 }

					 //alert(Serappeler2moi);
					$.ajax({
							url:"postAuth.php",
							type:"POST",
							data:{a:user,b:mdp,Serappeler2moi:Serappeler2moi},
							success: function(ret)
							{

								//alert(ret);
								
								if(ret==0)
								{
									//alert(ret);
									jQuery.facebox({ ajax: 'alert/diso1.php' });
									$("#userId").val("");
									$("#pswId").val("");
									
								}
								else if(ret==1)
								{
									setTimeout(function (){window.location.href='accueil.php';},1000);
								}
								else if(ret==2){
								// alert(user);
									//alert(ret);
									jQuery.facebox({ ajax: 'alert/diso.php' });
									$("#userId").val("");
									$("#pswId").val("");
									 
									 				 
								}else if(ret=="dejaconnecter")
								{
									alert("Vous n'avez pas d'acces , ce commpte est déja connecter");
									//setTimeout(function (){window.location.href='';},3000);
								}

								
								
							}
					
					
					});

				 return false;
		}//************* FONCTION CONNECTION LOGIN **************



		var Serappeler2moi="";
		$(function()
		{
			$("#caz_id").click(function (e)
			{
				Serappeler2moi="";
				if($(this).is(':checked'))
				{
					Serappeler2moi="OK";
				}

			});
			$('#userId').focus();
		});
		function quitBox()
		{
				alert("etes vous sur de vouloir quitter la page");
		}
			// window.onbeforeunload = quitBox;		
			
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
						
						<center><p style="color:#0682BE; font-size:25px;">  Bienvenue </p></center>
					</div>
				
					<form id="aut" onSubmit="return _connection_login(); " >
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
					<p>	<label class="cl4">Mot de passe oublié</label > <label class="cl4" onClick="afficher_propos()">A propos d'AMS </label> <label class="cl4">Aide</label> </p>
				
				
				</div>
				
			</center>
		</div>
		<div id="alert">
			Veuillez entrer un mail
		</div>
		
		
		
		
		
	</body>

</html>