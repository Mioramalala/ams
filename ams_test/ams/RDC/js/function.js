function planification(cycle){
	waiting();$("#contenue").load("RA/planification/"+cycle+"/"+cycle+".php",stopWaiting);
}

RDC_stock = {
		calcul_ratio_jour : function(SI,SF,Achat_M){ // SI: stock Initial, SF: stock Final , achat_M: achat de matière première
			var result = (((SI + SF)/2)/(Achat_M - SI + SF))*360; 
			return Math.round(result*100)/100;
		},
		calcul_ratio_evolution: function(ratioN0,ratioN1){
			var result = ratioN0 - ratioN1;
			return Math.round(result*100)/100;
		},
		set_ratio : function (SI,SF,Achat_M,target){
			$(target).val(this.calcul_ratio_jour(SI,SF,Achat_M)); // affiche le résultat sur le tableau
		},
		set_ratio_evolution: function (ratioN0,ratioN1,target){
			$(target).val(this.calcul_ratio_evolution(ratioN0,ratioN1,target));// affiche le résultat sur le tableau
		},
		get_ratios : function(id_parent,target){
			var tab = [], r0, r1, target;
			$('#'+id_parent+' .rdc-ratio-jour').each(function(i,elmt){
				tab.push($(elmt).val());
			});
			for (var i = 0; i < tab.length; i++) {
				if((i+1)<tab.length && tab[i] != "" && tab[i+1]!=""){
					 r1 = tab[i].replace(',','.').replace(/ /g,""); 
					 r0 = tab[i+1].replace(',','.').replace(/ /g,""); 
					 this.set_ratio_evolution(r0,r1,$(target+'_N'+(i+1)));
				}
			};

		},
		
		verify: function (SI,SF,AM,target){ // la fonction qui sera appelée lors d'un évenement
			var test = false;
			if(SI != ''){
				var _SI = SI.replace(',','.').replace(/ /g,""); 
				if(/\d/.test(_SI)){
					SI = _SI*1;
					if(SF != ''){
						var _SF = SF.replace(',','.').replace(/ /g,""); 
						if(/\d/.test(_SF)){
							SF = _SF*1;
							if(AM != ''){
								var _AM = AM.replace(',','.').replace(/ /g,""); 
								if(/\d/.test(_AM)){
									AM = _AM*1;							
									this.set_ratio(SI,SF,AM,target);
									test = true;
								}
								else{
									alert(" La valeur de l'achat de matière première n'est pas numérique");
								}
							}
							
						}
						else{
								alert(" La valeur du stock final (brute) n'est pas numérique");
							}
					}
					
				}
				else{
					alert("La valeur du stock initial (brute) n'est pas numérique");
				}
				
			}
		},
		calcul_ecart_existence_solde: function(etat_theorique, etat_inventaire){
			var result = etat_theorique - etat_inventaire;
			return Math.round(result*100)/100;
		},
		set_ecart_existence_solde: function(etat_theorique, etat_inventaire,target){ // affiche le résultat sur le textarea
			target.val(this.calcul_ecart_existence_solde(etat_theorique, etat_inventaire));
		},
		calcul_ecart_evaluation_solde: function(prix1,prix2){
			var result = prix1 - prix2;
			return Math.round(result*100)/100;
		},
		set_ecart_evaluation_solde: function (p1,p2,target){
			target.val(this.calcul_ecart_evaluation_solde(p1, p2)+'%');
		}
}

/********************* Calcule automatique les ratios (en nombre de jour) [D2] **************************/
$(document).on('change','.rdc-stock-initial',function(e){
	var indiceTable = $(this).closest('table').attr('data-index');
	var col = $(this).attr('data-col');
	var SI  = $(this).val().trim();
	var SF  = $('#T'+indiceTable+'_L2_'+col).val();
	var AM 	= $('#T'+indiceTable+'_L3_'+col).val();  
	var target = $('#T'+indiceTable+'_L4_'+col);
	RDC_stock.verify(SI,SF,AM,target);
	RDC_stock.get_ratios('table-'+indiceTable,'#T'+indiceTable+'_L5');
	
});
$(document).on('change','.rdc-stock-final',function(e){
	var indiceTable = $(this).closest('table').attr('data-index');
	var col = $(this).attr('data-col');
	var SF  = $(this).val().trim();
	var SI  = $('#T'+indiceTable+'_L1_'+col).val();
	var AM 	= $('#T'+indiceTable+'_L3_'+col).val();  
	var target = $('#T'+indiceTable+'_L4_'+col);
	RDC_stock.verify(SI,SF,AM,target);
	RDC_stock.get_ratios('table-'+indiceTable,'#T'+indiceTable+'_L5');
	
});
$(document).on('change','.rdc-achat-matiere-premiere',function(e){
	var indiceTable = $(this).closest('table').attr('data-index');
	var col = $(this).attr('data-col');
	var SI  = $('#T'+indiceTable+'_L1_'+col).val();
	var SF  = $('#T'+indiceTable+'_L2_'+col).val();
	var AM 	= $(this).val().trim();  
	var target = $('#T'+indiceTable+'_L4_'+col);
	RDC_stock.verify(SI,SF,AM,target);
	RDC_stock.get_ratios('table-'+indiceTable,'#T'+indiceTable+'_L5');
	
});

/***************************** Calcule automatique l'écart [Rapprochement de l'état théorique avec le résultat des inventaires physiques des stocks (D4)] *************************************/
$(document).on('change','.rdc-existence-solde-etat-theorique',function(e){
	var indexLine = $(this).closest('tr').attr('data-uid');
	var etat_theorique = $(this).val();
	var etat_inventaire = $('#etat_inventaire'+indexLine).val();
	if(etat_theorique !='' && etat_inventaire != ''){
		var ET = etat_theorique.replace(',','.').replace(/ /g,"");
		var EI = etat_inventaire.replace(',','.').replace(/ /g,"");
		if(/\d/.test(ET)){
			if(/\d/.test(EI)){
				RDC_stock.set_ecart_existence_solde(ET*1,EI*1,$('#ecart'+indexLine));
			}
			else{
			alert("veuillez entrer une valeur numérique pour l'état d'inventaire !");
		}
		}
		else{
			alert('veuillez entrer une valeur numérique !');
			$(this).focus();
		}
	}
	else{
		$('#ecart'+indexLine).val('');
	}
});

$(document).on('change','.rdc-existence-solde-etat-inventaire',function(e){
	var indexLine = $(this).closest('tr').attr('data-uid');
	var etat_inventaire = $(this).val();
	var etat_theorique = $('#etat_theorique'+indexLine).val();
	if(etat_theorique !='' && etat_inventaire != ''){
		var ET = etat_theorique.replace(',','.').replace(/ /g,"");
		var EI = etat_inventaire.replace(',','.').replace(/ /g,"");
		if(/\d/.test(EI)){
			if(/\d/.test(ET)){
				RDC_stock.set_ecart_existence_solde(ET*1,EI*1,$('#ecart'+indexLine));
			}
			else{
			alert("veuillez entrer une valeur numérique pour l'état théorique !");
		}
		}
		else{
			alert('veuillez entrer une valeur numérique !');
			$(this).focus();
		}
	}
	else{
		$('#ecart'+indexLine).val('');
	}
});


/************************ Calcule automatique des ecarts A (2)-(1) (3)-(1) (3)-(2) EVALUATION DES SOLDES : PARTIE IV [d5] *************************/
$(document).on('change','.cout-revient',function(e){
	var indexLine = $(this).closest('tr').attr('data-index');
	var p1 = $(this).val();
	var p2 = $('#L'+indexLine+'_C3').val();
	var p3 = $('#L'+indexLine+'_C4').val();
	if(p1 !=''){
		var _p1 = p1.replace(',','.').replace(/ /g,"");
		var _p2 = p2.replace(',','.').replace(/ /g,"");
		var _p3 = p3.replace(',','.').replace(/ /g,"");
		if(/\d%$/.test(_p1)){
			if(p2 != '' && /\d%$/.test(_p2)){
				p1 = _p1.replace('%','');
				p2 = _p2.replace('%','');
				RDC_stock.set_ecart_evaluation_solde(p2*1,p1*1,$('#L'+indexLine+'_C5')); // (2) - (1)
			}
			if(p3 != '' && /\d%$/.test(_p3)){
				p1 = _p1.replace('%','');
				p3 = _p3.replace('%','');
				RDC_stock.set_ecart_evaluation_solde(p3*1,p1*1,$('#L'+indexLine+'_C6')); // (3) - (1)
			}
			
		}
		else{
			alert('veuillez entrer un nombre en pourcentage (%)');
		}
	}
});

$(document).on('change','.prix-vente',function(e){
	var indexLine = $(this).closest('tr').attr('data-index');
	var p2 = $(this).val();
	var p1 = $('#L'+indexLine+'_C2').val();
	var p3 = $('#L'+indexLine+'_C4').val();
	if(p2 !=''){
		var _p1 = p1.replace(',','.').replace(/ /g,"");
		var _p2 = p2.replace(',','.').replace(/ /g,"");
		var _p3 = p3.replace(',','.').replace(/ /g,"");
		if(/\d%$/.test(_p2)){
			if(p1 != '' && /\d%$/.test(_p1)){
				p1 = _p1.replace('%','');
				p2 = _p2.replace('%','');
				RDC_stock.set_ecart_evaluation_solde(p2*1,p1*1,$('#L'+indexLine+'_C5')); // (2) - (1)
			}
			if(p3 != '' && /\d%$/.test(_p3)){
				p2 = _p2.replace('%','');
				p3 = _p3.replace('%','');
				RDC_stock.set_ecart_evaluation_solde(p3*1,p2*1,$('#L'+indexLine+'_C7')); // (3) - (2)
			}
			
		}
		else{
			alert('veuillez entrer un nombre en pourcentage (%)');
		}
	}
});

$(document).on('change','.prix-marche',function(e){
	var indexLine = $(this).closest('tr').attr('data-index');
	var p3 = $(this).val();
	var p1 = $('#L'+indexLine+'_C2').val();
	var p2 = $('#L'+indexLine+'_C3').val();
	if(p3 !=''){
		var _p1 = p1.replace(',','.').replace(/ /g,"");
		var _p2 = p2.replace(',','.').replace(/ /g,"");
		var _p3 = p3.replace(',','.').replace(/ /g,"");
		if(/\d%$/.test(_p3)){
			if(p1 != '' && /\d%$/.test(_p1)){
				p1 = _p1.replace('%','');
				p3 = _p3.replace('%','');				
				RDC_stock.set_ecart_evaluation_solde(p3*1,p1*1,$('#L'+indexLine+'_C6')); // (3) - (1)
			}
			if(p2 != '' && /\d%$/.test(_p2)){
				p2 = _p2.replace('%','');
				p3 = _p3.replace('%','');
				RDC_stock.set_ecart_evaluation_solde(p3*1,p2*1,$('#L'+indexLine+'_C7')); // (3) - (2)
			}
			
		}
		else{
			alert('veuillez entrer un nombre en pourcentage (%)');
		}
	}
});
