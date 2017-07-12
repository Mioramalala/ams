<?php
	@session_start();
	include '../connexion.php';

	$_SESSION['fonction']='Synthèse';
	$mission_id=@$_SESSION['idMission'];
	$RisqueGlobalSystem = '';
	$tabRisques = array();

	$reqRisqueGlobal = $bdd->query('SELECT RISQUE FROM tab_risque_lie_systeme WHERE MISSION_ID ='.$_SESSION['idMission']);
	while ($donneeRisqueGlobal=$reqRisqueGlobal->fetch()) {
		$RisqueGlobalSystem = $donneeRisqueGlobal['RISQUE'];
	}
?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel = "stylesheet" href = "../RA/css_RA.css"/>
	<link rel="stylesheet" type="text/css" href="css/css_RA_synthRsci.css" />
	<script type="text/javascript">
	$(document).ready(function(){

		$.ajax({
	    	type :'POST',
	    	encoding: 'utf-8',
	    	url : "RA/requetTabSyntheseRSCIprec.php",
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
	});
	$(function(){
		$('#dv_retour').click(function(){
			$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id; ?>);			
		});
		$('#dv_incidence').click(function(){
			//$('#contenue').html("");
			$('#contenue').load('RA/incidenceprec.php');			
		});
		
		$('#dv_enregistr').click(function(){
			waiting();
			var indice = 0;//Pour les <select></select>
			var tabSelecter = [];
			var risqueSysteme = $('input[name="risque"]:checked').val();
			
			$("td.selection").each(function(){
				indice++;
				var risque = ($(this).text().length < 10) ? $(this).text() : $("select#calculRisque"+indice).val();
				
				tabSelecter.push(risque);
		    });
		    $.post(
		    	"RA/saveTabRSCIprec.php",
		    	{'tabSelecter':tabSelecter,risqueSysteme:risqueSysteme},
		    	function(data){
		    		$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id; ?>);
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
				Ce tableau permet d’affecter un niveau de risque aux objectifs de chaque domaine(N-1).
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
				<table>
					<?php
						$risques = array();
						
						$req=$bdd->query('SELECT MISSION_ANNEE FROM tab_mission WHERE MISSION_ID ='.$_SESSION['idMission']);
						$res=$req->fetch();
						$res2=$res["MISSION_ANNEE"]-1;
						
						$var='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID= 10 AND MISSION_ANNEE='.$res2;
						
						$requete = $bdd->query($var);	
						
						$lignes = $requete->rowCount();
						if( $lignes != 0){
							$donnee = $requete->fetch();
							array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
						}
						else{
							array_push($risques,'');
						}

						for ($i=7; $i <= 10 ; $i++) { 
							$var2='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID='.$i.' AND MISSION_ANNEE='.$res2;
						
							$requete = $bdd->query($var2);	
							
							$lignes = $requete->rowCount();
							if( $lignes != 0){
								$donnee = $requete->fetch();
								array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
							}
							else{
								array_push($risques, '');
							}
						}
					?>
					<tr>
						<td class ="td_structure td-titre">IMMOBILISATIONS Corporelles, incorporelles, financières</td>
						<td class ="td_structure selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection"></td>				
						<td class ="td_structure selection">
							<select id="calculRisque8"><!-- 8ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>						
						<td class ="td_structure selection">
							<select id="calculRisque9"><!-- 9ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque10"><!-- 10ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
					</tr>
					<?php
						$risques = array();
						$var3='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID= 100 AND MISSION_ANNEE='.$res2;
						
						$requete = $bdd->query($var3);	
						
						$lignes = $requete->rowCount();
						if( $lignes != 0){
							$donnee = $requete->fetch();
							array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
						}
						else{
							array_push($risques, '');
						}
						for ($i=11; $i <= 13 ; $i++) { 
							$var4='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID='.$i.' AND MISSION_ANNEE='.$res2;
						
							$requete = $bdd->query($var4);	

							$lignes = $requete->rowCount();
							if( $lignes != 0){
								$donnee = $requete->fetch();
								array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
							}
							else{
								array_push($risques, '');
							}
						}
					?>
					<tr>
						<td class ="td_structure td-titre">STOCK</td>
						<td class ="td_structure selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection">
							<select id="calculRisque18"><!-- 18ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque19"><!-- 19ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque20"><!-- 20ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
					</tr>
					<?php
						$risques = array();
						$var5='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID= 1000000 AND MISSION_ANNEE='.$res2;
						
						$requete = $bdd->query($var5);
						
						$lignes = $requete->rowCount();
						if( $lignes != 0){
							$donnee = $requete->fetch();
							array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
						}
						else{
							array_push($risques, '');
						}
						for ($i=26; $i <= 30 ; $i++) { 
							$var6='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID='.$i.' AND MISSION_ANNEE='.$res2;
						
							$requete = $bdd->query($var6);	
							
							$lignes = $requete->rowCount();
							if( $lignes != 0){
								$donnee = $requete->fetch();
								array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
							}
							else{
								array_push($risques, '');
							}
						}
					?>
					<tr>
						<td class ="td_structure td-titre">VENTES - CLIENTS</td>
						<td class ="td_structure selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[4]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[5]; ?></td>
						<td class ="td_structure selection">
							<select id="calculRisque28"><!-- 28ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque29"><!-- 29ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque30"><!-- 30ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
					</tr>
					<?php
						$risques = array();
						$var7='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID= 10000 AND MISSION_ANNEE='.$res2;
						
						$requete = $bdd->query($var7);	
						
						$lignes = $requete->rowCount();
						if( $lignes != 0){
							$donnee = $requete->fetch();
							array_push($risques, $donnee['SYNTHESE_RISQUE']);
						}
						else{
							array_push($risques, '');
						}
						$var8='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID= 100000 AND MISSION_ANNEE='.$res2;
						
						$requete = $bdd->query($var8);	
						$lignes = $requete->rowCount();
						if( $lignes != 0){
							$donnee = $requete->fetch();
							array_push($risques, $donnee['SYNTHESE_RISQUE']);
						}
						else{
							array_push($risques, '');
						}
						for ($i=18; $i <= 25 ; $i++) { 
							$var9='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID='.$i.' AND MISSION_ANNEE='.$res2;
						
							$requete = $bdd->query($var9);	
							
							$lignes = $requete->rowCount();
							if( $lignes != 0){
								$donnee = $requete->fetch();
								array_push($risques, $donnee['SYNTHESE_RISQUE']);
							}
							else{
								array_push($risques, '');
							}
						}
					?>
					<tr>
						<td class ="td_structure td-titre">TRESORERIE</td>
						<td class ="td_structure selection">
							<select id="calculRisque31"><!-- 31ème case-->
								<option name="Faible"><?php echo $risques[0]; ?></option>
								<option name="Faible"><?php echo $risques[1]; ?></option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque32"><!-- 32ème case-->
								<option name="Faible"><?php echo $risques[2]; ?></option>
								<option name="Faible"><?php echo $risques[6]; ?></option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque33"><!-- 33ème case-->
								<option name="Faible"><?php echo $risques[3]; ?></option>
								<option name="Faible"><?php echo $risques[7]; ?></option>
							</select>
						</td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection">
							<select id="calculRisque35"><!-- 35ème case-->
								<option name="Faible"><?php echo $risques[4]; ?></option>
								<option name="Faible"><?php echo $risques[8]; ?></option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque36"><!-- 36ème case-->
								<option name="Faible"><?php echo $risques[5]; ?></option>
								<option name="Faible"><?php echo $risques[9]; ?></option>
							</select></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection">
							<select id="calculRisque38"><!-- 38ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque39"><!-- 39ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque40"><!-- 40ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
					</tr>
					<?php
						$risques = array();

						for ($i=1; $i <= 6 ; $i++) { 
							$var10='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID='.$i.' AND MISSION_ANNEE='.$res2;
						
							$requete = $bdd->query($var10);	
							$lignes = $requete->rowCount();
							if( $lignes != 0){
								$donnee = $requete->fetch();
								array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
							}
							else{
								array_push($risques, '');
							}
						}
					?>						
					<tr>
						<td class ="td_structure td-titre">ACHATS - FOURNISSEURS</td>
						<td class ="td_structure selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[4]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[5]; ?></td>
						<td class ="td_structure selection">
							<select id="calculRisque48"><!-- 48ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque49"><!-- 49ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque50"><!-- 50ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>						
					</tr>
					<?php
						$risques = array();
						$var11='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID= 1000 AND MISSION_ANNEE='.$res2;
						
						$requete = $bdd->query($var11);	
						
						$lignes = $requete->rowCount();
						if( $lignes != 0){
							$donnee = $requete->fetch();
							array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
						}
						else{
							array_push($risques, '');
						}
						for ($i=14; $i <= 17 ; $i++) { 
							$var12='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID='.$i.' AND MISSION_ANNEE='.$res2;
						
							$requete = $bdd->query($var12);	
							
							$lignes = $requete->rowCount();
							if( $lignes != 0){
								$donnee = $requete->fetch();
								array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
							}
							else{
								array_push($risques, '');
							}
						}
					?>	
					<tr>
						<td class ="td_structure td-titre">PAIE - PERSONNEL</td>
						<td class ="td_structure selection"><?php echo $risques[0]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[1]; ?></td>
						<td class ="td_structure selection"><?php echo $risques[2]; ?></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection"><?php echo $risques[3]; ?></td>
						<td class ="td_structure selection"></td>
						<td class ="td_structure selection"><?php echo $risques[4]; ?></td>
						<td class ="td_structure selection">
							<select id="calculRisque58"><!-- 58ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque59"><!-- 59ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque60"><!-- 60ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
					</tr>
					<?php
						$risques = array();

						for ($i=15; $i <= 19 ; $i++) { 
							$var13='SELECT a.SYNTHESE_RISQUE,b.MISSION_ANNEE FROM tab_synthese a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND CYCLE_ACHAT_ID='.$i.' AND MISSION_ANNEE='.$res2;
						
							$requete = $bdd->query($var13);	
							$lignes = $requete->rowCount();
							if( $lignes != 0){
								$donnee = $requete->fetch();
								array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
							}
							else{
								array_push($risques, '');
							}
						}
					?>						
					<tr>
						<td class ="td_structure td-titre">SOUS TRAITANCE</td>
						<td class ="td_structure selection">
							<select id="calculRisque61"><!-- 61ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque62"><!-- 62ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque63"><!-- 63ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque64"><!-- 64ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque65"><!-- 65ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque66"><!-- 66ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque67"><!-- 67ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select >
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque68"><!-- 68ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque69"><!-- 69ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
						</td>
						<td class ="td_structure selection">
							<select id="calculRisque70"><!-- 70ème case-->
								<option name="Faible">Faible</option>
								<option name="Moyen">Moyen</option>
								<option name="Elevé">Elevé</option>
							</select>
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
		<div style="width:650px;margin-top:5pxs;clear:both;">
			<input type ="button" class="bouton" name= "btRetour" value= "Retour" id = "dv_retour" />
			<input type ="button" class="bouton" name= "btEnregistrer" value= "Enregistrer" id= "dv_enregistr" />
			<input type ="button" class="bouton" value= "Incidences" id="dv_incidence"/>
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
					$domaineKey = array('immobilisation','stocks','vente','tresorerie','achat','paie_personnel','environnement');
					$commentaires = $risques = array();
					$i = 0;

					foreach ($domaineKey as $key) {
						$req = $bdd->query('SELECT SYNTHESE,RISQUE FROM tab_synthese_rsci WHERE CYCLE = "'.$key.'" AND MISSION_ID='.$_SESSION['idMission']);
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
						echo '<tr>
							<td class ="td_structure td-titre">'.$domaine.'</td>
							<td class ="td_structure">'.$risques[$i].'</td>
							<td class ="td_structure" colspan="9">'.$commentaires[$i].'</td>
						</tr>';
						$i++;
					}
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