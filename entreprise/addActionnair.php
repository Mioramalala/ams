
<?php
	global $nbr;
	// if(isset($_POST['a'])){
	
	$nbr=$_POST['a'];
	
	
	// }
	
	$i=0;
	
	
?>
<html>
	<head>
		<!--link rel="stylesheet" href="../css/cssEntreprise.css"/-->
		<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
		<link href="../facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
		<script src="../facebox/facebox.js" type="text/javascript"></script> 
		<script>
			$(function(){
			
				jQuery(document).ready(function($) {
				  $('a[rel*=facebox]').facebox();
				});
			
				var i=0;
				$("#engAct").click(function(){
					$("#formAct").hide();
					//jQuery.facebox({ ajax: '../alert/engEntrOk.php' });
					var NomAct=[];
					var PartAct=[];
					var nbr=$("#nbrAct").val();
					//alert(nbr);
					var trantsfer="nbr="+nbr;
					tot=0;
					for(i=0;i<nbr;i++){
						
						NomAct=$("#txtNomAct"+i).val();
						
						PartAct=$("#txtPartAct"+i).val();
						// tot=(int)tot + (int)PartAct;
						trantsfer=trantsfer+"&NomAct[]="+NomAct+"&PartAct[]="+PartAct;
						
					}
					// alert('IO'+tot);
					
					$.ajax({
							type:"POST",
							url:"entreprise/engAct.php",
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
		<input type value="<?php echo $nbr;?>" id="nbrAct" style="display:none;" />
			
		<div id="formAct">
			<br><br>
			<b>Actionnaires :</b>
			<table style="border:1px solid #ccc;margin-top:10px;padding:5px 5px 5px 5px; border-radius:5px 5px 5px 5px;">
				<?php for ($i=0; $i < $nbr ; $i++){ ?>
				
				<tr style="margin-left:65px; ">
					<td>Nom</td>
					<td><input type="text" id="txtNomAct<?php echo $i?>" /></td>
					<td>Parts</td>
					<td><input type="text" id="txtPartAct<?php echo $i?>" /></td>
					</tr>
				<?php } ?>
			</table>
			<div style="display:none"><input type="button" value="Enregistrer actionnaires" id="engAct"/></div>
		</div>

	</body>
</html>
			
