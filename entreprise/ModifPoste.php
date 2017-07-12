<script>
$(function(){
	$("#enrModPost").click(function(){
		//alert("azertyuiop");
		var idEntre=$("#idEntre").val();
		var id=$("#id").val();
		var nom=$("#ModNomPost").val();
		var titulaire=$("#ModTitulaire").val();
		
		if (nom){
			$.ajax({
				type:"POST",
				url:"entreprise/enrgPostMod.php",
				data:{d:idEntre,i:id,a:nom,b:titulaire},
				success:function(e){
					////////////////////////////////////////alert(e);
					$("#infopost").html(e);
					jQuery.facebox({ ajax: '../alert/EnrEntrModifOk.php' });
					$.fancybox.close();
					
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
$IdPost=$_POST['a'];
$IdEntre=$_POST['b'];
//echo $IdAct.''.$IdEntre;ENTREPRISE_ID=".$idEntre." AND
$sql="SELECT POSTE_CLE_NOM, POSTE_CLE_TITULAIRE	 FROM  tab_poste_cle 
	WHERE  POSTE_CLE_ID=".$IdPost;
				
					
				 $reponse=$bdd->query($sql);
				 $donnee=$reponse->fetch();
				 
				 $nom=$donnee['POSTE_CLE_NOM'];
				 $titulaire=$donnee['POSTE_CLE_TITULAIRE'];
				 
?>

<!--------------------------------modification poste----------------------------------------->
		<input type="text" id="id" value="<?php echo $IdPost;?>" style="display:none;"/>
		<input type="text" id="idEntre" value="<?php echo $IdEntre;?>" style="display:none;"/>
		<div id="modifAct">
			<table>
				<th colspan="2">Modification poste</th>
				<tr>
					<td> Poste</td>
					<td><input type="text" id="ModNomPost" value="<?php echo  $nom; ?>"></td>
				</tr>
				<tr>
					<td> Titulaire</td>
					<td><input type="text" id="ModTitulaire" value="<?php echo $titulaire; ?>"></td>
				</tr>
				
				<tr>
					<td><input type="button" value="Enregistrer" id="enrModPost"></td>
				</tr>
			</table>
		</div>