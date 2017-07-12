<script>
$(function(){
	$("#enrModAct").click(function(){
		//alert("azertyuiop");
		var idEntre=$("#idEntre").val();
		var id=$("#id").val();
		var nom=$("#ModNomAct").val();
		var part=$("#ModPart").val();
		//var pourC=$("#ModPourC").val();
		// alert(nom+part+pourC);
		if (nom!="" || part!=""){
			$.ajax({
				type:"POST",
				url:"entreprise/enrgActMod.php",
				data:{d:idEntre,i:id,a:nom,b:part},
				success:function(e){
					//alert(e);
					jQuery.facebox({ ajax: '../alert/EnrEntrModifOk.php' });
					$.fancybox.close();
					$("#infoAct").html(e);	
					// document.getElementById("ModNomAct").value="";
					// document.getElementById("ModPart").value="";
					// $("#ModNomAct").val("");
					// $("#ModPart").val("");
					
				}
			
			});
		}
		
		
		});

});

</script>

<?php 
 include '../connexion.php';
$IdAct=$_POST['a'];
$IdEntre=$_POST['b'];
//echo $IdAct.''.$IdEntre;ENTREPRISE_ID=".$idEntre." AND
$sql="SELECT ACTIONNAIRE_NOM, ACTIONNAIRE_PART	 FROM  tab_actionnaire 
	WHERE  ACTIONNAIRE_ID=".$IdAct;
				
					
				 $reponse=$bdd->query($sql);
				 $donnee=$reponse->fetch();
				 
				 $nom=$donnee['ACTIONNAIRE_NOM'];
				 $Part=$donnee['ACTIONNAIRE_PART'];
				 
?>

<!--------------------------------modification actionnaire----------------------------------------->
		<input type="text" id="id" value="<?php echo $IdAct;?>" style="display:none;"/>
		<input type="text" id="idEntre" value="<?php echo $IdEntre;?>" style="display:none;"/>
		<div id="modifAct">
			<table>
				<th colspan="2">Modification actionnaire</th>
				<tr>
					<td> Nom et prénom</td>
					<td><input type="text" id="ModNomAct" value="<?php echo  $nom; ?>"></td>
				</tr>
				<tr>
					<td> Part</td>
					<td><input type="text" id="ModPart" value="<?php echo $Part; ?>"></td>
				</tr>
				
				<tr>
					<td><input type="button" value="Enregistrer" id="enrModAct"></td>
				</tr>
			</table>
		</div>