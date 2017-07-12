<?php
	global $nbr;
	$nbr=$_POST['a'];
	$i=0;
?>
<html>
	<head>
	<script>
	$(function(){
			
				jQuery(document).ready(function($) {
				  $('a[rel*=facebox]').facebox();
				});
				
				
				$("#engPost").click(function(){
					$("#formPostCle").hide();
					var i=0;
					var NomPost=[];
					var Titulaire=[];
					var nbr=$("#nbrPost").val();
					var trantsfer="nbr="+nbr;
					for(i=0;i<nbr;i++){
						NomPost=$("#txtNomPosre"+i).val();
						Titulaire=$("#txtTituPosre"+i).val();
						trantsfer=trantsfer+"&NomPost[]="+NomPost+"&Titulaire[]="+Titulaire;
					}
						$.ajax({
							type:"POST",
							url:"entreprise/engPoste.php",
							data:trantsfer,
							success:function(e){
								 //jQuery.facebox({ ajax: '../alert/engEntrOkel.php' });
							}
							
						});
				});
			
			});
		
			
	</script>
	
	</head>
	<body>
		<input type="text" value="<?php echo $nbr;?>" id="nbrPost" style="display:none;" />

		<div id="formPostCle">
			<b>Postes clés :</b>
			<table style="border:1px solid #ccc;margin-top:10px;padding:5px 5px 5px 5px; border-radius:5px 5px 5px 5px;">
				<?php for ($i=0; $i < $nbr ; $i++){ ?>
				
				<tr style="margin-left:65px; ">
					<td>Poste</td>
					<td><input type="text" id="txtNomPosre<?php echo $i;?>" /></td>
					<td>Titulaire</td>
					<td><input type="text" id="txtTituPosre<?php echo $i;?>" /></td>
						
					
				</tr>
				<?php } ?>
			</table>
			<div style="display:none"><input type="button" value="Enregistrer postes" id="engPost"/></div>
		</div>
			
	</body>
</html>
			
