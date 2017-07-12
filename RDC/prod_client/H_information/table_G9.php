<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<style>
#tet{
  margin-left:-17px;
  margin-top:20px;
  border-collapse:collapse;
  }
#tettd{
   border:1px solid #ccc;
   background-color:#0074bf;
   color:#fff;
  }
 </style>
<script>
$(function(){
		var ligne = document.getElementById('nbLignes').value;

		$('#bt_supp').click(function(){
		// alert("autre_nature_"+ligne);
		// alert("autre_note_"+ligne);
			if(parseInt(ligne)>1){
				var nature = document.getElementById("autre_nature_"+ligne).value;
				var annexe = document.getElementById("autre_note_"+ligne).value;
				// alert();
				delete_Input(nature, annexe, <?php echo $mission_id; ?>);

				deleterow('tab_annexe');
				ligne = parseInt(ligne)-1;
				document.getElementById('nbLignes').value = ligne;
			}
			
		});
		
		$('#bt_ajout').click(function(){
			ligne = parseInt(ligne);
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

			text1.id = "autre_nature_"+ligne;
			text2.id = "autre_note_"+ligne;

			td1.appendChild(text1);
			td2.appendChild(text2);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tableau.appendChild(tr);

			document.getElementById('nbLignes').value = ligne;
			ligne=ligne+1;
			//console.log("Il y a "+ligne+" lignes");
		});
});
	function delete_Input(nature, note ,mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/prod_client/H_information/delete_Input_G9.php',
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

<?php
	$rempli = false;
	function echoEltAnnexe($nom,$nature,$annexe,$num=""){
		echo "
		<tr>
		<td width='50%'><label id='".$nom."_nature_".$num."'>".$nature."</label></td>
		<td width='50%'><textarea cols='48' id='".$nom."_note_".$num."'>".$annexe."</textarea></td>
		</tr>";
	}

	$tab_elt_annexe = array("Ventilation des dettes"=>"",
		"Engagements de crédit-bail" => "",
		"Clause de réserve de propriété" => "",
		"Opérations avec des entreprises liées" => "",
		"Effets à payer" => "");

	include '../../../connexion.php';	
	$reponse=$bdd->query('select * FROM tab_g9 where MISSION_ID='.$mission_id);

	while($data=$reponse->fetch()){
		$nature = $data['G9_NATURE'];
		$annexe = $data['G9_ANNEXE'];
		$tab_elt_annexe[$nature] = $annexe;
	}

?>

	<tr id="tettd">
		<td align="center">Nature</td>
		<td align="center">Notes annexes</td>
	</tr>
 
<!-- 		<tr>
			<td width="50%"><label id="ventil_nature_">Ventilation des dettes</label></td>
			<td width="50%"><textarea cols="48" id="ventil_note_"></textarea></td>
		</tr>
		<tr>
			<td width="50%"><label id="engag_nature_">Engagements de crédit-bail</label></td>
			<td width="50%"><textarea cols="48" id="engage_note_"></textarea></td>
		</tr>
		<tr>
			<td width="50%"><label id="clause_nature_">Clause de réserve de propriété</label></td>
			<td width="50%"><textarea cols="48" id="clause_note_"></textarea></textarea></td>
		</tr>
		<tr>
			<td width="50%"><label id="op_nature_">Opérations avec des entreprises liées</label></td>
			<td width="50%"><textarea cols="48" id="op_note_"></textarea></textarea></td>
		</tr>

		<tr>
			<td width="50%"><label id="effet_nature_">Effets à payer</label></td>
			<td width="50%"><textarea cols="48" id="effet_note_"></textarea></td>
		</tr>
		<tr>
			<td width="50%"><textarea cols="48" id="autre_nature_"></textarea></td>
			<td width="50%"><textarea cols="48" id="autre_note_"></textarea></td>
		</tr>
 -->
 <?php
 	$ligne=1;

 	foreach ($tab_elt_annexe as $nature => $annexe) {
		switch ($nature) {
			case "Ventilation des dettes":
				echoEltAnnexe("ventil",$nature,$annexe);
				break;
			case "Engagements de crédit-bail":
				echoEltAnnexe("engage",$nature,$annexe);
				break;
			case "Clause de réserve de propriété":
				echoEltAnnexe("clause",$nature,$annexe);
				break;
			case "Opérations avec des entreprises liées":
				echoEltAnnexe("op",$nature,$annexe);
				break;
			case "Effets à payer":
				echoEltAnnexe("effet",$nature,$annexe);
				break;
			default:
				echoEltAnnexe("autre",$nature,$annexe,$ligne);
				$ligne++;
				break;
		}
	}
	echo "<input type='hidden' id='nbLignes' value=".$ligne."/>";
?>
	
</table>
<div style="float:left;">
	<input type="button" id="bt_ajout" value="+" class="bouton" /><br/>
	<input type="button" id="bt_supp" value="-" class="bouton"  />
	<!-- <input type="hidden" id="nbLignes" value="0"/> -->
</div>

</div>
</div>