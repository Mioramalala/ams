<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
<script>
<?php
if(isset($_GET["saved"])){
	?>
	alert("logo enregistré");
	<?php
	}
?>
	$(function(){
				
				$("#logoNom").change(function(){
					$("#div_logo").html('');
					var fileInput=document.querySelector('#logoNom');
					for(i=0;i<fileInput.files.length;i++){
						var reader=new FileReader();
						reader.readAsDataURL(fileInput.files[i]);
						reader.onload=function(event){
							image=document.createElement('img');
							image.src=event.target.result;
							//console.log(image.src);
							$("#div_logo").html(image);
							$("#div_logo img").css("width","100px");
							$("#div_logo img").css("heigth","100px");
						};
						//enregistrer image
						
					}
				});
				$("#enreg_logo").click(function(){
				// parcourir l'image
				$("#btnInserer").click();
										
		});
		$("#add_logo").click(function(){
						// parcourir l'image
						$("#logoNom").click();
				
				// $("#load").show();
				
		});
		});
		/*
			$("#frm_").submit(function() {
			s = $(this).serialize(); 
			$.ajax({
					type: "POST",
					data: s,
					url: "./entreprise/insertLogo.php",
					success: function(){ 
						alert("Le fichier est bien enregistre");
					}
				});
			return false;
		 });
		*/
		
</script>
<?php 
	include '../connexion.php';
	$req="select LOGO from tab_entreprise where entreprise_id=".$_GET['identreprise'];
	$result=$bdd->query($req) or die(mysql_error());
	$donnee1=$result->fetch();
	
	$logo=$donnee1['LOGO'];
	//$_logo="../logo/lougr.jpg";
	 /*while($donnee=$result->fetch()){
			$logo_=$donnee['logo'];
	}*/
?>
</head>
<body>
	<table>
							<tr>
								<td><div id="div_logo" style="border:2px solid #000000"><img src="<?php echo '../'.$logo;  ?>" width="100" height="100" id="img_logo"/></div></td>
								<td style="padding-left: 50px;">
									<p id="add_logo" style="cursor:pointer; background-color:#FFFFFF ; color:#000000" >&nbsp;&nbsp;Inserer&nbsp;&nbsp;</p>
									<p id="enreg_logo" style="cursor:pointer; background-color:#FFFFFF; color:#000000">&nbsp;&nbsp;Enregistrer&nbsp;&nbsp;</p>
								</td>
								<td>
								<form method="post" enctype="multipart/form-data" action="insertLogo.php" style="display:none" >
										<p><input type="file" id="logoNom" name="logoNom" accept="image/*" /></p>
										<input type="text" value="<?php echo $_GET['identreprise'];?>" name="txt_identre"/>
										<input type="submit" value="Save doc" id="btnInserer" name="btnRecDocName" />
								</form>
								</td>
							</tr>
							
						</table>
</body>
</html>
