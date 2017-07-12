<?php
	@session_start();
	include '../connexion.php';

	$RisqueGlobalSystem = '...';

	$reqRisqueGlobal = $bdd->query('SELECT RISQUE FROM tab_risque_lie_systeme WHERE MISSION_ID ='.$_SESSION['idMission']);
	while ($donneeRisqueGlobal=$reqRisqueGlobal->fetch()) {
		$RisqueGlobalSystem = $donneeRisqueGlobal['RISQUE'];
	}
?>
<head>
	<link rel="stylesheet" type="text/css" href="css/css_RA_synthRsci.css" />
	<style type="text/css">
		textarea{width:100%;height:100%;}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
		    	type : 'POST',
		    	url : "RA/requetTabIncidenceRSCIprec.php",
		    	dataType: 'json',
		    	data : {cycle:'A'},
		    	success:function(data){
		    		$("textarea.fonctionnement").val(data[0]);
		    		$("textarea.compte").val(data[1]);
		    	}
		    });
		});
		$(function(){
			$('#dv_retour').click(function(){
				$('#contenue').load('RA/structure.php');			
			});
			$('#dv_precedente').click(function(){
				var IncidanceTitre = ['A - FONDS PROPRES','B - IMMOBILISATIONS CORPORELLES et INCORPORELLES','C - IMMOBILISATION FINANCIERES','D - STOCKS','E - TRESORERIE','F - CHARGES FOURNISSEURS','G - VENTES-CLIENTS','H - PAIE-PERSONNEL','I - IMPOTS et TAXES','J - EMPRUNTS et DETTES FINANCIERES','K - DEBITEURS et CREDITEURS DIVERS'];
				var InitialIncidance = ['A','B','C','D','E','F','G','H','I','J','K'];

				var AltIncidanceTitre = parseInt($('#IncidanceTitre').attr('alt'));

				if(AltIncidanceTitre == 1){
					$('#dv_precedente').fadeOut();
				    $('#dv_retour').fadeIn(1000);
				}

				$('#IncidanceTitre').fadeOut();
				$('#IncidanceTitre').text(IncidanceTitre[AltIncidanceTitre-1]).fadeIn();
				$('#IncidanceTitre').attr('alt',AltIncidanceTitre-1);

			    //Récupération
			    $.ajax({
			    	type : 'POST',
			    	url : "RA/requetTabIncidenceRSCIprec.php",
			    	dataType: 'json',
			    	data : {cycle:InitialIncidance[AltIncidanceTitre-1]},
			    	success:function(data){
			    		$("textarea.fonctionnement").val(data[0]);
			    		$("textarea.compte").val(data[1]);
			    	}
			    });	
			});
			$('#dv_enregistr').click(function(){
				//waiting();
				var IncidanceTitre = ['A - FONDS PROPRES','B - IMMOBILISATIONS CORPORELLES et INCORPORELLES','C - IMMOBILISATION FINANCIERES','D - STOCKS','E - TRESORERIE','F - CHARGES FOURNISSEURS','G - VENTES-CLIENTS','H - PAIE-PERSONNEL','I - IMPOTS et TAXES','J - EMPRUNTS et DETTES FINANCIERES','K - DEBITEURS et CREDITEURS DIVERS'];
				var InitialIncidance = ['A','B','C','D','E','F','G','H','I','J','K'];
				var tabSelecter = [];

				var AltIncidanceTitre = parseInt($('#IncidanceTitre').attr('alt'));

				$('#dv_retour').fadeOut();
				$('#dv_precedente').fadeIn();
				$('#IncidanceTitre').fadeOut();

				$("textarea#valeurIncidence").each(function(){
			    	tabSelecter.push($(this).val());
			    });
			    //Récupération
			    $.ajax({
			    	type : 'POST',
			    	url : "RA/requetTabIncidenceRSCIprec.php",
			    	dataType: 'json',
			    	data : {cycle:InitialIncidance[AltIncidanceTitre+1]},
			    	success:function(data){
			    		$("textarea.fonctionnement").val(data[0]);
			    		$("textarea.compte").val(data[1]);
			    	}
			    });

				if (AltIncidanceTitre != 10){
					$('#IncidanceTitre').text(IncidanceTitre[AltIncidanceTitre+1]).fadeIn();
					$('#IncidanceTitre').attr('alt',AltIncidanceTitre+1);
				    //Enregistrement
				    $.post(
				    	"RA/saveTabIncidenceRSCIprec.php",
				    	{'tabSelecter':tabSelecter,cycle:InitialIncidance[AltIncidanceTitre]},
				    	function(data){
				    		//$('#contenue').load('RA/index.php');
				    		stopWaiting();
				    	}
				    );
				}
				else if(AltIncidanceTitre == 10){	
				    //Enregistrement
				    $.post(
				    	"RA/saveTabIncidenceRSCIprec.php",
				    	{'tabSelecter':tabSelecter,cycle:InitialIncidance[AltIncidanceTitre]},
				    	function(data){
				    		$('#contenue').load('RA/index.php');
				    		stopWaiting();
				    	}
				    );
				}
			});
		});
	</script>
</head>
	<br />
	<div style="font-style:italic;font-weight:bold;color:#00163E;width:1200px;text-align:left;">RISQUES LIES A LA CONCEPTION DES SYSTEMES : <span><?php echo $RisqueGlobalSystem; ?></span></div>
<?php
	$domaines = array('IMMOBILISATIONS Corporelles, incorporelles, financières','STOCK','VENTES - CLIENTS','TRESORERIE','ACHATS - FOURNISSEURS','PAIE - PERSONNEL','SOUS TRAITANCE');
	echo '<div class="dv_scroll">
	<table>
		<tr class="tr-titre">
			<td class="td-titre">Domaine</td>
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
		</tr>';
		for($i=0; $i<7; $i++){
		
			$req0=$bdd->query('SELECT MISSION_ANNEE FROM tab_mission WHERE MISSION_ID ='.$_SESSION['idMission']);
			$res=$req0->fetch();
			$res2=$res["MISSION_ANNEE"]-1;
							
			$requete='SELECT * FROM tab_synthese_rsci_ra a,tab_mission b,tab_entreprise c WHERE DOMAINE = "'.$domaines[$i].'" AND b.ENTREPRISE_ID= c.ENTREPRISE_ID AND MISSION_ANNEE='.$res2;
							
			$req = $bdd->query($requete);
			
			$row = $req->rowCount();
		
		if($row !=0 ){
			$donnees = $req->fetch();
			
			echo'
			<tr>
				<td class="td-titre">'.$donnees['DOMAINE'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['CARACTERE'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['EXHAUSTIVITE'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['REALITE'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['PROPRIETE'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['EVALUATION_CORRECTE'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['ENREGISTREMENT_BP'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['IMPUTATION_CORRECTE'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['TOTALISATION'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['BONNE_INFORMATION'].'</td>
				<td style="font-weight:bold;text-align:center;">'.$donnees['RISQUE_GF'].'</td>
			</tr>';
		}
		else{
			echo '
				<tr>
					<td colspan="11">Vide</td>
				</tr>
			';
		}
	}
	echo '</table></div>';
?>
<!-- Pour l'incidences -->
	<br />
	<div style="font-style:italic;font-weight:bold;color:#00163E;height:20px;">Incidence du cycle <span id="IncidanceTitre" alt="0">A - FONDS PROPRES</span></div>
	<br />
	<div class="dv_scroll" style="height:130px;">
		<table>
			<tr class="tr-titre">
				<td>
					INCIDENCES SUR LE PROGRAMME DE CONTROLE DU FONCTIONNEMENT
				</td>
				<td>
					INCIDENCES SUR LE PROGRAMME DE CONTROLE DES COMPTES
				</td>
			</tr>
			<tr>
				<td height="100px">
					<textarea id="valeurIncidence" placeholder="Saisissez votre texte ici ..." class="fonctionnement"></textarea>
				</td>
				<td height="100px">
					<textarea id="valeurIncidence" placeholder="Saisissez votre texte ici ..." class="compte"></textarea>
				</td>
			</tr>
		</table>
	</div>
	<input type ="button" class="bouton" name= "btRetour" value= "Retour" id="dv_retour" />
	<input type ="button" class="bouton" name= "btRetour" value= "Précedent" id="dv_precedente" style="display:none;" />
	<input type ="button" class="bouton" name= "btEnregistrer" value= "Suivant" id= "dv_enregistr" />