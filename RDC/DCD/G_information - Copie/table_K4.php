<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<script>
$(function(){

		var ligne = document.getElementById('nbLignes').value;

		$('#bt_supp').click(function(){
			if(parseInt(ligne)>1){
				var nature = document.getElementById("nature_"+ligne).value;
				var annexe = document.getElementById("annexe_"+ligne).value;
				delete_Input(nature, annexe, <?php echo $mission_id; ?>);

				deleterow('tab_annexe');
				ligne = parseInt(ligne)-1;
				document.getElementById('nbLignes').value = ligne;
			}
		});
		
		$('#bt_ajout').click(function(){
			ligne = parseInt(ligne)+1;

			var tableau = document.getElementById('tab_annexe');
			var tr = document.createElement("tr");
			var td1 = document.createElement("td");
			var td2 = document.createElement("td");
			var td3 = document.createElement("td");
			var text1 = document.createElement("textarea");
			var text2 = document.createElement("textarea");

			tr.style.backgroundColor = "white";

			text1.cols = "48";
			text2.cols = "48";

			text1.id = "nature_"+ligne;
			text2.id = "annexe_"+ligne;

			td1.appendChild(text1);
			td2.appendChild(text2);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tableau.appendChild(tr);

			document.getElementById('nbLignes').value = ligne;

		});
});
	function delete_Input(nature, note ,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/DCD/G_information/delete_Input_K4.php',
			data:{nature:nature, note:note, mission_id:mission_id},
			success:function(){
			}
		});	
	}
	function deleterow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    table.deleteRow(rowCount -1);
	}

</script>
<div align="center">
<label>ELEMENTS EN ANNEXE</label>
<div style="overflow:auto;height:360px;">
<table width="100%" id="tab_annexe">
	<tr bgcolor="#ccc">
		<td align="center">Nature</td>
		<td align="center">Notes annexes</td>
	</tr>

	<?php
				include '../../../connexion.php';
		
				$reponse=$bdd->query('select * FROM tab_elt_annexe_dcd where MISSION_ID='.$mission_id);

				(int)$ligne=1;

				while($donnees=$reponse->fetch()){
	?>

	<tr bgcolor="white">
		<td><textarea cols="48" id="<?php echo "nature_".$ligne ?>"><?php echo $donnees['NATURE'] ;?></textarea></td>
		<td><textarea cols="48" id="<?php echo "annexe_".$ligne ?>"><?php echo $donnees['NOTE'] ;?></textarea></td>	
	</tr>
	<?php
			$ligne = $ligne +1;
		}
	?>
</table>
<div style="float:left;">
	<input type="button" id="bt_ajout" value="+" class="bouton" /><br/>
	<input type="button" id="bt_supp" value="-" class="bouton"  />
	<input type="hidden" id="nbLignes" value="<?php echo ($ligne-1)?>"/>
</div>

</div>
</div>