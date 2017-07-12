<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];
	include '../../../connexion.php';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type:"post",
			url:"RDC/charge_fournisseur/H_information/requetF10.php",
			data:{},
			success:function(e){
				$("#resultat").html(e);
			}				
		});	
	});
	function ajout(){
		var compteur = parseInt($("#ajout").attr('alt'));
		var i = compteur + 1;
		$("#ajout").attr('alt',i);
		$('#ajout').append('<tr class="tr_table_text_champ"><td><textarea id="nat'+i+'" placeholder="Autre à mentioner"></textarea></td><td><textarea id="na'+i+'" placeholder="Notes annexes"></textarea></td><td><textarea id="cmnt'+i+'" placeholder="Vos commentaires"></textarea></td></tr>');
	}
	function supp(){
		var compteur = parseInt($("#ajout").attr('alt'));
		if (compteur != 0){
			var i = compteur - 1;
			var nature = $('#nat'+compteur).text();
			if( nature != "" ){
				$.ajax({
					type:"post",
					url:"RDC/charge_fournisseur/H_information/suppElmtF10.php",
					data:{nature:nature},
					success:function(e){
					}
				});
			}

			$("#ajout").attr('alt',i);
			$('table#ajout tr:last-child').remove();// Efface la dernière ligne
		}
	}
</script>
<div align="center">
<div style="width:99.8%;">
	<center><label style="font-size:14pt;font-weight:bold;">ELEMENTS EN ANNEXE</label></center>
</div>
	<span id="resultat"></span>
</div>