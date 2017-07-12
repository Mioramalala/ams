<?php
	@session_start();

	$_SESSION['fonction']='Synthèse';
	

	$mission_id=$_SESSION['idMission'];
	$cookie_name = "m_id".$mission_id;

	if(isset($_GET["m_id"])){ 
		$mission_id=$_GET["m_id"];
		$cookie_value = $_GET["m_id"];
		setcookie($cookie_name, $cookie_value,2000000000);
	}

	if(!isset($_COOKIE[$cookie_name])) {
	   
	} else {
	    $mission_id = $_COOKIE[$cookie_name];
	}


	$RisqueGlobalSystem = '';
	$tabRisques = array();

	//echo "mission_id=".$mission_id;

	include '../connexion.php';
	$reqRisqueGlobal = $bdd->query('SELECT RISQUE FROM tab_risque_lie_systeme WHERE MISSION_ID ='.@$_SESSION['idMission']);
	while ($donneeRisqueGlobal=$reqRisqueGlobal->fetch()) {
		$RisqueGlobalSystem = $donneeRisqueGlobal['RISQUE'];
	}
	include 'fonctions_requetes.php';

	$missionsListe = array();
	$reqMissions = "SELECT DISTINCT(s.MISSION_ID) as m_id, e.ENTREPRISE_DENOMINATION_SOCIAL AS nom, 
	m.MISSION_ANNEE as annee, m.MISSION_TYPE as type FROM tab_synthese_rsci_ra s
	INNER JOIN tab_mission m ON m.MISSION_ID=s.MISSION_ID
	INNER JOIN tab_entreprise e ON m.ENTREPRISE_ID = e.ENTREPRISE_ID";

	$missions = $bdd->query($reqMissions);
	while ($donneeMission=$missions->fetch()) {
		$missionsListe[$donneeMission['m_id']] = $donneeMission['nom']." ".$donneeMission['annee']." ".$donneeMission['type'];
	}
	//print_r($missionsListe);

$achat = array(1, 2, 3, 4, 5, 6);
$immo = array(10, 7, 8, 9);
$stock = array(1000, 11, 12, 13);
$paie = array(10000, 14, 15, 16, 17);
$recette = array(100000, 18, 19, 20, 21);
$depense = array(1000000, 22, 23, 24, 25);
$vente = array(10000000, 26, 27, 28, 29, 30);
?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel = "stylesheet" href = "../RA/css_RA.css"/>
	<link rel="stylesheet" type="text/css" href="css/css_RA_synthRsci.css" />
	<script type="text/javascript">
	$(document).ready(function(){
/*
		$.ajax({
	    	type :'POST',
	    	encoding: 'utf-8',
	    	url : "RA/requetTabSyntheseRSCI.php",
    		contentType: "application/json; charset=utf-8",
	    	dataType: 'json',
	    	success:function(data){
	    		var indice = 0;
	    		
	    		if(data.length != 0){
		    		for (var i = 0; i <= 12; i+=2){
		    			$("select#calculRisque"+((indice*10)+9)+" option[name='"+data[i]+"']").attr('selected','selected');
		    			$("select#calculRisque"+((indice*10)+10)+" option[name='"+data[i+1]+"']").attr('selected','selected');
		    			indice++;
		    		};
		    	}
	    	}
	    });
*/
	});
	$(function(){
		$('#dv_retour').click(function(){
			$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id; ?>);			
		});
		$('#dv_incidence').click(function(){
			$('#contenue').load('RA/incidence.php');			
		});
		$('#importer_revue').click(function(){
			var idMission = $("#listeMissions").val();
			$('#contenue').load('RA/structure.php?m_id='+idMission);			
		});
		
		Object.prototype.getKey = function(value){
		var tableau = [];
		  for(var key in this){
		    if(this[key] == value){
		      tableau.push(key);
		    }
		  }
		  return tableau;
		};

		$('.td_structure_selection select:not(.droite select)').change(function() {
				var id = $(this).attr('id');
				
				var id_ligne = id.substring(0, 13);
				var tabRisques=[];
				var max = 0;

				for(var i=1; i<8; i++){
					var risque = ($("#"+id_ligne+i).val()!="") ? ($("#"+id_ligne+i).val()) : ($("#"+id_ligne+i).html());
					console.log("Risque azo = "+risque);
					if(risque=="faible") risque='Faible';
					if(risque=="moyen") risque='Moyen';
					if(risque=="eleve") risque='Elevé';
					if(risque=="Faible"||risque=="Moyen"||risque=="Elevé"){tabRisques.push(risque);}
				}

				var obj = { };
				obj['Faible'] = 0;
				obj['Moyen'] = 0;
				obj['Elevé'] = 0;

				for (var i = 0, j = tabRisques.length; i < j; i++) {
						if (obj[tabRisques[i]]) {obj[tabRisques[i]]++;}
						else { obj[tabRisques[i]] = 1;}
				}
				console.log("L'objet : "+obj);
				console.log("Faible="+obj['Faible']);
				console.log("Moyen="+obj['Moyen']);
				console.log("Elevé="+obj['Elevé']);


				var max = Math.max(Number(obj['Faible']), Number(obj['Moyen']), Number(obj['Elevé']));
				console.log("Max="+max);
				var cle = obj.getKey(max);
				console.log(cle);

				// Id de la colonne totalisation
				$("#"+id_ligne+8).empty();
				cle.forEach(function(val) {
					if(cle.length==1)
						$("#"+id_ligne+8).append('<option value='+val+' selected="selected">'+val+'</option>');
					else if(cle.length>1)
						$("#"+id_ligne+8).append('<option value='+val+'>'+val+'</option>');
				});
				if(cle.length>1){$("#"+id_ligne+8).append('<option selected="selected">Votre choix</option>');}
		});

		$('#dv_enregistr').click(function(){
			waiting();
			var indice = 0;
			//Pour les <select></select>
			var tabSelecter = [];
			var risqueSysteme = $('input[name="risque"]:checked').val();

			console.log("Risque systeme = "+risqueSysteme);
			console.log("Enregistrement");
			$(".table_haut .td_structure_selection").each(function(){
				indice++;
				var texte = $(this).text();
				texte.trim();

				var risque = "";

				if((texte.length < 8)&&(texte.length>0)){
					risque = texte;
					console.log("texte:"+risque+", indice="+indice);
				} else{
					risque = $("select#calculRisque"+indice).val();
					if((typeof risque === "undefined")) {risque = $("#calculRisque"+indice).text();}
					console.log("calculRisque="+risque+", indice="+indice);
				}
				//var risque = ((texte.length < 8)||(texte.length>0)) ? $(this).text() : {$("select#calculRisque"+indice).val()};
				
				if(risque=="Votre choix" || (typeof risque === "undefined")) risque="";
				
				tabSelecter.push(risque);
		    });

		    console.log("Risque:"+tabSelecter);

		    $.post(
		    	"RA/saveTabRSCI.php",
		    	{'tabSelecter':tabSelecter,risqueSysteme:risqueSysteme},
		    	function(data){
		    		$('#contenue').load('RA/index.php?mission_id='+<?php echo $_SESSION['idMission']; ?>);
		    		stopWaiting();
		    	}
		    );	
		});
	});
	</script>
</head>
<body>
	<div style="margin-top:25px;">
		<b>
			<p style="font-size: 10pt;">
				Ce tableau permet d’affecter un niveau de risque aux objectifs de chaque domaine.
				L’évaluation du risque peut être réalisée à partir des critères suivants :<br/>
			</p>
		</b>
		<div id= "dv_scroll" class="dv_scroll">
			<table>
				<tr class="tr-titre">
					<td id ="id_structure" class="td-titre">Domaine</td>
					<td>Caractère Signification Fonction</td>
					<td>Exhaustivité</td>
					<td>Réalité</td>
					<td>Propriété</td>
					<td>Evaluation correcte</td>
					<td>Enregistrement bonne période</td>
					<td>Imputation correcte</td>
					<td>Totalisation</td>
					<td>Bonne information</td>
					<td>Risque global fonction</td>
				</tr>
			</table>
			<div id= "dv_scroll_table_haut" class="dv_scroll_table">
				<table class="table_haut">
					<?php
						$risques = remplir_tab_risques($immo, $mission_id);

						// $risques = array();

						// $requete = $bdd->query('SELECT SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID  = '.$mission_id.' AND CYCLE_ACHAT_ID= 10');
						// $lignes = $requete->rowCount();
						// if( $lignes != 0){
						// 	$donnee = $requete->fetch();
						// 	array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
						// }
						// else{
						// 	array_push($risques, '');
						// }

						// for ($i=7; $i <= 10 ; $i++) { 
						// 	$requete = $bdd->query('SELECT SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID  = '.$mission_id.' AND CYCLE_ACHAT_ID= '.$i);
						// 	$lignes = $requete->rowCount();
						// 	if( $lignes != 0){
						// 		$donnee = $requete->fetch();
						// 		array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
						// 	}
						// 	else{
						// 		array_push($risques, '');
						// 	}
						// }
						//totalisationRisque($risques);
					?>
					<tr>
						<td class ="td_structure td-titre">IMMOBILISATIONS Corporelles, incorporelles, financières</td>
						<td class ="td_structure_selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection"></td>				
						<td class ="td_structure_selection droite">
							<?php totalisationRisque($risques,8);?>
						</td>						
						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "IMMOBILISATIONS Corporelles, incorporelles, financiÃ¨res", "BONNE_INFORMATION",9);?>
<!-- 							<select id="calculRisque9">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "IMMOBILISATIONS Corporelles, incorporelles, financiÃ¨res", "RISQUE_GF",10);?>
<!-- 							<select id="calculRisque10">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
					</tr>
					<?php
						$risques = remplir_tab_risques($stock, $mission_id);

					?>
					<tr>
						<td class ="td_structure td-titre">STOCK</td>
						<td class ="td_structure_selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection droite">
						<?php totalisationRisque($risques,18);?>

						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "STOCK", "BONNE_INFORMATION",19);?>

<!-- 							<select id="calculRisque19">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "STOCK", "RISQUE_GF",20);?>

<!-- 							<select id="calculRisque20">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
					</tr>
					<?php
						$risques = remplir_tab_risques($vente, $mission_id);

					?>
					<tr>
						<td class ="td_structure td-titre">VENTES - CLIENTS</td>
						<td class ="td_structure_selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[4]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[5]; ?></td>
						<td class ="td_structure_selection droite">
						<?php totalisationRisque($risques,28);?>
						</td>
						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "VENTES - CLIENTS", "BONNE_INFORMATION",29);?>

<!-- 							<select id="calculRisque29">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "VENTES - CLIENTS", "RISQUE_GF",30);?>

<!-- 							<select id="calculRisque30">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
					</tr>
					<?php

						$risques_dep = remplir_tab_risques($depense, $mission_id);
						$risques_rec = remplir_tab_risques($recette, $mission_id);

					?>
					<tr>
						<td class ="td_structure td-titre">TRESORERIE</td>
						<td class ="td_structure_selection">
						<?php afficherOptionTreso($mission_id, "TRESORERIE", "CARACTERE", $risques_dep, $risques_rec, 0, 31)?>
						<?php //selectTresorerie($risques_dep, $risques_rec, 0, 31);?>

						</td>
						<td class ="td_structure_selection">
						<?php afficherOptionTreso($mission_id, "TRESORERIE", "EXHAUSTIVITE", $risques_dep, $risques_rec, 1, 32)?>

						<?php //selectTresorerie($risques_dep, $risques_rec, 1, 32);?>

						</td>
						<td class ="td_structure_selection">
						<?php afficherOptionTreso($mission_id, "TRESORERIE", "REALITE", $risques_dep, $risques_rec, 2, 33)?>
						<?php //selectTresorerie($risques_dep, $risques_rec, 2, 33);?>
						</td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection">
						<?php afficherOptionTreso($mission_id, "TRESORERIE", "ENREGISTREMENT_BP", $risques_dep, $risques_rec, 4, 35)?>
						<?php //selectTresorerie($risques_dep, $risques_rec, 4, 35);?>
						</td>
						<td class ="td_structure_selection">
						<?php afficherOptionTreso($mission_id, "TRESORERIE", "EVALUATION_CORRECTE", $risques_dep, $risques_rec, 3, 36)?>
						<?php// selectTresorerie($risques_dep, $risques_rec, 3, 36);?>

						</td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection droite">
						<?php totalisationRisqueTreso($risques_dep,$risques_rec,38);?>

						</td>
						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "TRESORERIE", "BONNE_INFORMATION",39);?>
						</td>
						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "TRESORERIE", "RISQUE_GF",40);?>		
						</td>
					</tr>
					<?php
						$risques = remplir_tab_risques($achat, $mission_id);

					?>						
					<tr>
						<td class ="td_structure td-titre">ACHATS - FOURNISSEURS</td>
						<td class ="td_structure_selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[4]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[5]; ?></td>
						<td class ="td_structure_selection droite">
						<?php totalisationRisque($risques,48);?>
<!-- 							<select id="calculRisque48">
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection droite">
							<?php afficherOption($mission_id, "ACHATS - FOURNISSEURS", "BONNE_INFORMATION",49);?>
<!-- 							<select id="calculRisque49">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection droite">
							<?php afficherOption($mission_id, "ACHATS - FOURNISSEURS", "RISQUE_GF",50);?>
<!-- 							<select id="calculRisque50">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>						
					</tr>
					<?php
						$risques = remplir_tab_risques($paie, $mission_id);
	
					?>	
					<tr>
						<td class ="td_structure td-titre">PAIE - PERSONNEL</td>
						<td class ="td_structure_selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure_selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure_selection"></td>
						<td class ="td_structure_selection"><?php echo $risques[4]; ?></td>
						<td class ="td_structure_selection droite">
						<?php totalisationRisque($risques,58);?>
						</td>
						<td class ="td_structure_selection droite">
							<?php afficherOption($mission_id, "ACHATS - FOURNISSEURS", "BONNE_INFORMATION",59);?>

<!-- 							<select id="calculRisque59">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection droite">
							<?php afficherOption($mission_id, "ACHATS - FOURNISSEURS", "RISQUE_GF",60);?>

<!-- 							<select id="calculRisque60">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
					</tr>
					<?php
						$risques = array();

						$requete = $bdd->query('SELECT *
						FROM tab_synthese_rsci_ra WHERE MISSION_ID  = '.$mission_id.'
						AND DOMAINE="SOUS TRAITANCE"');
						$lignes = $requete->rowCount();
						if( $lignes != 0){
							$donnee = $requete->fetch();
							array_push($risques, $donnee["CARACTERE"]);
							array_push($risques, $donnee["EXHAUSTIVITE"]);
							array_push($risques, $donnee["REALITE"]);
							array_push($risques, $donnee["PROPRIETE"]);
							array_push($risques, $donnee["EVALUATION_CORRECTE"]);
							array_push($risques, $donnee["ENREGISTREMENT_BP"]);
							array_push($risques, $donnee["IMPUTATION_CORRECTE"]);
						}

						
					?>						
					<tr>
						<td class ="td_structure td-titre">SOUS TRAITANCE</td>
						<td class ="td_structure_selection">
						<?php afficherOption($mission_id, "SOUS TRAITANCE", "CARACTERE",61);?>
<!-- 							<select id="calculRisque61">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible" >Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection">
						<?php afficherOption($mission_id, "SOUS TRAITANCE", "EXHAUSTIVITE",62);?>
<!-- 							<select id="calculRisque62">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection">
						<?php afficherOption($mission_id, "SOUS TRAITANCE", "REALITE",63);?>
<!-- 							<select id="calculRisque63">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection">
						<?php afficherOption($mission_id, "SOUS TRAITANCE", "PROPRIETE",64);?>
<!-- 							<select id="calculRisque64">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection">
						<?php afficherOption($mission_id, "SOUS TRAITANCE", "EVALUATION_CORRECTE",65);?>
<!-- 							<select id="calculRisque65">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection">
						<?php afficherOption($mission_id, "SOUS TRAITANCE", "ENREGISTREMENT_BP",66);?>
<!-- 							<select id="calculRisque66">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection">
						<?php afficherOption($mission_id, "SOUS TRAITANCE", "IMPUTATION_CORRECTE",67);?>
<!-- 						<select id="calculRisque67">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select > -->
						</td>
						<td class ="td_structure_selection droite">
							<?php totalisationRisque($risques,68);?>
						</td>
						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "SOUS TRAITANCE", "BONNE_INFORMATION",69);?>
<!-- 							<select id="calculRisque69">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>
						<td class ="td_structure_selection droite">
						<?php afficherOption($mission_id, "SOUS TRAITANCE", "RISQUE_GF",70);?>						
<!-- 							<select id="calculRisque70">
								<option disabled selected="selected">Votre choix</option>
								<option name="Faible" value="Faible">Faible</option>
								<option name="Moyen" value="Moyen">Moyen</option>
								<option name="Elevé" value="Elevé">Elevé</option>
							</select> -->
						</td>	
					</tr>	
				</table>
			</div>
		</div>
		<div style="width:650px;text-align:left;margin-top:5px;">
			<span style="font-style:italic;font-weight:bold;color:#00163E;">RISQUES LIES A LA CONCEPTION DES SYSTEMES :</span>
			<form style="float:right;">
				<input type="radio" name="risque" value="Faible" <?php if($RisqueGlobalSystem == 'Faible') echo 'checked';?> />Faible
				<input type="radio" name="risque" value="Moyen" <?php if($RisqueGlobalSystem == 'Moyen') echo 'checked';?> />Moyen
				<input type="radio" name="risque" value="Elevé" <?php if($RisqueGlobalSystem == 'Elevé') echo 'checked';?> />Elevé
			</form>
		</div>
		<div style="width:750px;margin-top:5pxs;clear:both;">
			<input type ="button" class="bouton" name= "btRetour" value= "Retour" id = "dv_retour" />
			<input type ="button" class="bouton" name= "btEnregistrer" value= "Enregistrer" id= "dv_enregistr" />
			<input type ="button" class="bouton" value= "Incidences" id="dv_incidence"/>
			<input type ="button" class="bouton" value= "Importer revue précedente" onclick="$('#import').show();" />
			<div id="import" style="display:none;margin-top:5px;">
			<select id="listeMissions">
				<?php 
					foreach ($missionsListe as $id => $nom){
						echo '<option value='.$id.' >'.$nom.'</option>';
					}
				?>
			</select>
			<input type ="button" class="bouton" value= "Confirmer" id="importer_revue"/>
			</div>
		</div>
		<center style="margin-top:5px;font-size:10pt;font-weight:bold;">Synthèses R.S.C.I</center>
		<div id= "dv_scroll" class="dv_scroll">
			<table>
				<tr class="tr-titre">
					<td id ="id_structure" class="td-titre">Domaine</td>
					<td>Risques</td>
					<td colspan="10">Commentaires</td>
				</tr>
			</table>
			<div id="dv_scroll_table_bas" class="dv_scroll_table">
				<table>
				<?php
					$domaines = array('IMMOBILISATIONS Corporelles, incorporelles, financières','STOCK','VENTES - CLIENTS','TRESORERIE','ACHATS - FOURNISSEURS','PAIE - PERSONNEL','SOUS TRAITANCE');
					$domaineKey = array('immobilisation','stocks','vente','tresorerie','achat','paie_personnel','environnement', 'info');
					$commentaires = $risques = array();
					$i = 0;

					foreach ($domaineKey as $key) {
						$req = $bdd->query('SELECT SYNTHESE,RISQUE FROM tab_synthese_rsci WHERE CYCLE = "'.$key.'" AND MISSION_ID='.$mission_id);
						$result = $req->rowCount();

						if( $result != 0){
							$donnees = $req->fetch();
							array_push($commentaires, $donnees['SYNTHESE']);	
							array_push($risques, $donnees['RISQUE']);	
						}
						else{
							array_push($commentaires, '');
							array_push($risques, '');
						}
					}

					foreach ($domaines as $domaine){
						if($i<6){
						echo '<tr>
							<td class ="td_structure td-titre">'.$domaine.'</td>
							<td class ="td_structure">'.$risques[$i].'</td>
							<td class ="td_structure" colspan="9">'.$commentaires[$i].'</td>
						</tr>';
						$i++;
						}
					}
					echo'<tr>
							<td class ="td_structure td-titre">'.$domaines[6].'</td>
							<td class ="td_structure">
								<div class="td_structure_enfant">'.$risques[6].'</div>
								<div class="td_structure_enfant">'.$risques[7].'</div>
							</td>
							<td class ="td_structure" colspan="9"> 
								<div class="td_structure_enfant">Environnement de controle : '.$commentaires[6].'</div>
								<div class="td_structure_enfant">Systeme d\'informations : '.$commentaires[7].'</div>
							</td>
					</tr>';

				?>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$("#dv_scroll_table_bas").scroll(function() {
			    $("#dv_scroll_table_haut").scrollTop($("#dv_scroll_table_bas").scrollTop());
		});
		$("#dv_scroll_table_haut").scroll(function() {
		    $("#dv_scroll_table_bas").scrollTop($("#dv_scroll_table_haut").scrollTop());
		});
		$(document).ready(function(){
			//Totalisation automatique
			var resultRisque = resultRisque1 = resultRisque2 = '';
			var countFaible = countMoyen = countEleve = 0;
			var repere = 0;

			$("td.selection").each(function(){
				var risque = $(this).text();
				repere++;

				if((repere%10>=1) && (repere%10<=7)){
					if(risque == 'Faible' || risque == 'faible') countFaible++;
					else if(risque == 'Moyen' || risque == 'moyen') countMoyen++;
					else if(risque == 'Elevé' || risque == 'Eleve' || risque == 'elevé' || risque == 'eleve') countEleve++;
				}

				if(repere%10 == 8){
					var maximum = Math.max(countFaible, countMoyen, countEleve);

					if(maximum != 0){
						if(maximum == countFaible){
							resultRisque="Faible";
							solutionUnique(repere,resultRisque);
						}
						else if(maximum == countMoyen){
							resultRisque="Moyen";
							solutionUnique(repere,resultRisque);
						}
						else if(maximum == countEleve){
							resultRisque="Elevé";
							solutionUnique(repere,resultRisque);
						}

						if((maximum == countFaible) && (maximum ==countMoyen)){
							resultRisque1="Moyen";
							resultRisque2="Faible";
							solutionDouble(repere,resultRisque1,resultRisque2);
						}
						else if((maximum == countFaible) && (maximum == countEleve)){
							resultRisque1="Elevé";
							resultRisque2="Faible";
							solutionDouble(repere,resultRisque1,resultRisque2);
						}
						else if((maximum ==countMoyen) && (maximum==countEleve)){
							resultRisque1="Elevé";
							resultRisque2="Moyen";
							solutionDouble(repere,resultRisque1,resultRisque2);
						}
					}
				}
				if(repere%10 == 0){
					countFaible = countMoyen = countEleve = 0;
					resultRisque = resultRisque1 = resultRisque2 = '';
				}
			});
		});
		//Des Fonctions utilitaires pour les totalisations des riques
		function solutionUnique(repere,resultRisque){
			$("select#calculRisque"+repere+" option[name='"+resultRisque+"']").attr('selected','selected');
			$("select#calculRisque"+repere+" option[name='"+resultRisque+"']").css("background-color","#00ff00");
		}
		function solutionDouble(repere,resultRisque1,resultRisque2){
			$("select#calculRisque"+repere+" option[name='"+resultRisque1+"']").attr('selected','selected');
			$("select#calculRisque"+repere+" option[name='"+resultRisque1+"']").css("background-color","#00ff00");
			$("select#calculRisque"+repere+" option[name='"+resultRisque2+"']").attr('selected','selected');
			$("select#calculRisque"+repere+" option[name='"+resultRisque2+"']").css("background-color","#00ff00");
		}
	</script>
</body>		