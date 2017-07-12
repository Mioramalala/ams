<script type="text/javascript">
	$(function(){
		$("#bouton-suppr").click(function(){
			var poste = $("#postes_a_supprimer").val();
			var mission_id = $("#mission_id").val();
			var entrepiseId = $("#idEntreprise").val();
			var cycle = $("#cycle").val();
			var lien = $("#lien").val();
			var conteneur = $("#conteneur").val();
			if(confirm('Etes vous sur de vouloir supprimer cet element?'))
			{

			console.log("suppression de "+poste);
				$.ajax({
					type:'POST',
					url:'postes_concernes/supprimerPoste.php',
					data:{mission_id:mission_id, entrepiseId:entrepiseId, cycle:cycle, poste:poste},
					success:function(e){
						alert("Suppression faite avec succes");
						$(conteneur).load(lien, {mission_id:mission_id, entrepiseId:entrepiseId});
					}
				});

}

		});		
	

		$(".bouton-close").click(function(){
			$(this).parent().fadeOut();
		});
	});
</script>

<?php 

	include '../connexion.php';

	$mission_id=$_POST['mission_id'];
	$entrepiseId=$_POST['entrepiseId'];
	$cycle=$_POST['cycle'];
	$lien=$_POST['lien'];
	$conteneur = $_POST['conteneur'];

	$rep = $bdd->query('SELECT DISTINCT tab_poste_cle.POSTE_CLE_ID,tab_poste_cle.POSTE_CLE_NOM
		FROM tab_poste_cle 
		INNER JOIN tab_poste_cycle 
		ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID 
		WHERE tab_poste_cycle.MISSION_ID='.$mission_id.' 
		AND tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' 
		AND tab_poste_cycle.POSTE_CYCLE_NOM="'.$cycle.'"'	
	);

	echo "<select id='postes_a_supprimer'>";
	while($donnees = $rep->fetch()){
		$poste_cle_id=$donnees['POSTE_CLE_ID'];
		$poste_cle_nom=$donnees['POSTE_CLE_NOM'];
		echo "<option value=".$poste_cle_id.">".$poste_cle_nom."</option>";
	}
	echo "</select>";
	echo "<input type='button' value='Supprimer' id='bouton-suppr'/>";
	echo "<input type='button' value='x' class='bouton-close'/>";


	echo "<input type='hidden' id='idEntreprise' value=".$entrepiseId." />";
	echo "<input type='hidden' id='cycle' value=".$cycle." />";
	echo "<input type='hidden' id='mission_id' value=".$mission_id." />";
	echo "<input type='hidden' id='lien' value=".$lien." />";
	echo "<input type='hidden' id='conteneur' value=".$conteneur." />";
?>
