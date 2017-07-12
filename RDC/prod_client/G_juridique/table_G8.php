<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<style>
</style>
<script src="RDC/js/events.js">
</script>
<script>

	var titreChamp = ['CA tax 0%', 'CA tax 20%', 'CA non tax personnes ass', 'CA tax 18%', 'TOTAL CA TAXABLE', 'CA non taxable', 'TOTAL CA NON TAXABLE', 'CA TOTAL',
		'TVA collectée 20%', 'TVA collectée 18%', 'Autres TVA collectées', 'TOTAL TVA collectée', 'TVA déductible - locaux', 'biens-revente', 'équip/immeuble',
		'autres biens', 'services', 'TVA déductible - imports', 'biens-revente', 'équip/immeuble', 'autres biens', 'services', 'TOTAL TVA DEDUCTIBLES',
		'Taxe déd fins prorata', 'Taux de prorata de déduction', 'TVA déductible prorata', 'TVA déductible pour la période', 'REPORT DE CREDIT',
		'Solde à régulariser', 'TVA à payer', 'Crédit de TVA'];
		
		//alert(titreChamp.length);
		
	function creerTableau() {
	
		var tableau = document.createElement('table');
		//entete
		var entete = document.createElement('thead');
		var corps = document.createElement('tbody');
		var entetetr = document.createElement('tr');
		var cellulePeriode = document.createElement('td');
		entetetr.appendChild(cellulePeriode);
		
		for(var i = 0; i < 12; i++) {
			var celluleEntete = document.createElement('td');
			celluleEntete.innerHTML = 'Mois' + (i+1);
			entetetr.appendChild(celluleEntete);
		}
		
		for(var i = 0; i < titreChamp.length; i++) {
			var ligne = document.createElement('tr');
			var celluleTitre = document.createElement('td');
			celluleTitre.innerHTML = titreChamp[i];
			ligne.appendChild(celluleTitre);
			for(var j = 0; j < 12; j++) {
				var cellule = document.createElement('td');
				var input = document.createElement('input');
				cellule.appendChild(input);
				ligne.appendChild(cellule);
			}
			corps.appendChild(ligne);
		}
		
		entete.appendChild(entetetr);
		
		tableau.appendChild(entete);
		tableau.appendChild(corps);
		
		return tableau;
	}

	var formules = [
		"e4  = e0 + e1 + e2 + e3", 
		"e6  = e5", 
		"e7  = e4 + e6", 
		"e8  = e1 * 20 / 100", 
		"e11 = e8 + e9 + e10", 
		"e22 = (e13 + e14 + e15 + e16) + (e18 + e19 + e20 + e21)", 
		"e23 = (e14 + e15 + e16) + (e19 + e20 + e21)", 
		"e24 = e4 / e7", 
		"e25 = e24 == 0 ? e23 : e23 * e24", 
		"e26 = e13 + e18 + e25", 
		"e28 = e11 - e26 - e27", 
		"e29 = e28 > 0 ? e28 : 0", 
		"e30 = e29 < 0 ? -e29 : 0"
	];
	
	var nombres = ['1','2','3','4','5','6','7','8','9','0']
	
	function elementsMisEnJeu(formule) {
		var result = new Array();
		var n = '';
		var get = false;
		
		for(var i = 0; i < formule.length; i++) {
			var c = formule.charAt(i);
			if(nombres.indexOf(c+'') >= 0) {
				if(get) n += c;
			} else if(c === 'e') {
				get = true;
			} else if(get) {
				result.push(parseInt(n));
				n = "";
				get = false;
			}
		}
		
		if(n !== '') result.push(parseInt(n));
		
		return result;
	}
	
	function traiterFormule(table, formules) {
		for(var i = 0; i < formules.length; i++) {
			var form = formules[i].substring(formules[i].indexOf('=') + 1);
			var emej = elementsMisEnJeu(form);
			for(var j = 0; j < emej.length; j++) {
				for(var k = 0; k < 12; k++) {
					(function() {
						var kk = k;
						var f = form;
						var emejj = emej;
						var res = elementsMisEnJeu(formules[i].substring(0, formules[i].indexOf('=')))[0];
						table.childNodes[1].childNodes[res].childNodes[kk+1].childNodes[0].disabled = true;
						table.childNodes[1].childNodes[emej[j]].childNodes[kk+1].childNodes[0].addEvent('change', function() {
							var ff = f;
							//
							for(var l = 0; l < emejj.length; l++) {
								var value = parseFloat(table.childNodes[1].childNodes[emejj[l]].childNodes[kk+1].childNodes[0].value);
								if(isNaN(value)) value = 0;
								ff = ff.replace('e' + emejj[l], value);
							}
							
							var inputTarget = table.childNodes[1].childNodes[res].childNodes[kk+1].childNodes[0];
							inputTarget.value = eval(ff);
							inputTarget.emitEvent('change');
							
						});
						table.childNodes[1].childNodes[emej[j]].childNodes[kk+1].childNodes[0].addEventListener('keyup', function() {
							this.emitEvent('change');
						});
					})();
				}
			}
		}
	}
	
	function saveData(row, column, value) {
		$.ajax({
			type    : 'POST',
			url     : 'RDC/prod_client/G_juridique/save_data.php',
			data    : {
				row        : row,
				column     : column, 
				value      : value,
				mission_id : <?php echo $mission_id;?>
			},
			success : function(){
			}
		});	
	}
	
	function saveTableData(table) {
		$.ajax({
			type    : 'POST',
			url     : 'RDC/prod_client/G_juridique/delete_data.php',
			data    : {
				mission_id : <?php echo $mission_id;?>
			},
			success : function(){
				var corps = table.childNodes[1];
				
				for(var i = 0; i < corps.childNodes.length; i++) {
					for(var j = 1; j < 13; j++) {
						var input = corps.childNodes[i].childNodes[j].childNodes[0];
						if(!input.disabled && !isNaN(parseFloat(input.value))) {
							saveData(i, j, input.value);
						}
					}
				}
			}
		});	
	}
	
	function fillTableData(table) {
		$.ajax({
			type      : "POST",
			url       : "RDC/prod_client/G_juridique/get_data.php",
			dataType  : 'json',
			data      : {
				mission_id : <?php echo $mission_id;?>
			},
			success   : function(e){
				var data = e.data;
				var corps = table.childNodes[1];
				var dataElt;
				var input;
				for(var i = 0; i < data.length; i++) {
					dataElt = data[i];
					input   = corps.childNodes[dataElt.row].childNodes[dataElt.column].childNodes[0],
					input.value = dataElt.value;
					if(!isNaN(dataElt.value)) input.emitEvent('change');
				}
			},
			error     : function(msg){
				alert( "Error !: " + msg );
			}
		});
	}
	
	var table_g8;
	
	//creerTableau();
	$(function() {
		table_g8 = creerTableau();
		document.getElementById('tab').appendChild(table_g8);
		traiterFormule(table_g8, formules);
		fillTableData(table_g8);
	});

</script>
<div align="center">
<label>CADRAGE DU CHIFFRE D'AFFAIRES													
</label>
<div id="tab" style="overflow:auto;height:360px;">

</div>
</div>