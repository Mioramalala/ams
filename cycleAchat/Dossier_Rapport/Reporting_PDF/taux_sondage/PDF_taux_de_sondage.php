<?php

//Connexion base de donnees

//===================initialisation===============

$capitaux_ppre="";
$immo_corpot_inco="";
$immo_fin="";
$stock="";
$vente_cli="";
$tresorie_devise="";
$proviion_chgr="";
$achat_frs="";
$impot_taxe="";
$paie_pers="";
$pds_chrg="";
$autres_actif="";
$autres_passif="";
$intercomp="";
$autre_pre="";
//========REQUETE SQL VERS LA BASE============================

//=====================HEADER PAGE===================================
//===================================================================
echo '<html><head><link rel="stylesheet" type="text/css" href="css_taux_Sondag.css" /></head><body>



<!--  tableau form CATEIN  --> 
     <div id="conteneur">
			<div class="salarie">
	            <img src="images/logo.png" />                          
	            
            </div>
         
          	<!--  tableau form SOCIETE  -->
          	<div class="societe">
	          
	                          <p>Soci&eacute;t&eacute;: ............................................................................</p>
						      <p>Exercice clos au : ___/___/______ </p>

			</div>
		
		<p><u>TAUX DE SONDAGE</u></p>
			
		<table class="table">
			<col style="width: 5%" >
			<col style="width: 50%">
			<col style="width: 45%">
			
			<thead>
				<tr >
					<th  colspan="2" class="th">El&eacute;ments communs</th>
					<th colspan="3" style="font-size: 16px;" class="th">
						Taux 
					</th>
				</tr>
				
			</thead>
			<tr>
				<td >A</td>
				<td >Capitaux propres et emprunts</td>
				<td> </td>
			</tr>
			<tr>
				<td >B</td>
				<td >Immobilisations corporelles et incorporelles</td>
				<td> </td>
			</tr>
			<tr>
				<td >C</td>
				<td >Immobilisations financi&egrave;res</td>
				<td> </td>
			</tr>
			<tr>
				<td >D</td>
				<td >Stocks</td>
				<td> </td>
			</tr>
			<tr>
				<td >E</td>
				<td >Ventes et clients</td>
				<td> </td>
			</tr>
			<tr>
				<td >F</td>
				<td >Tr&eacute;sorerie et devises</td>
				<td> </td>
			</tr>
			<tr>
				<td >G</td>
				<td >Provisions pour charges</td>
				<td> </td>
			</tr>
			<tr>
				<td >I</td>
				<td >Achats et fournisseurs</td>
				<td> </td>
			</tr>
			<tr>
				<td >J</td>
				<td >Imp&ocirc;ts et taxes</td>
				<td> </td>
			</tr>
			<tr>
				<td >K</td>
				<td >Paie et personnel</td>
				<td> </td>
			</tr>
			<tr>
				<td >L</td>
				<td >Autres produits et charges</td>
				<td> </td>
			</tr>
			<tr>
				<td >M</td>
				<td >Autres actifs</td>
				<td> </td>
			</tr>
			<tr>
				<td >N</td>
				<td >Autres passifs</td>
				<td> </td>
			</tr>
			<tr>
				<td >O</td>
				<td >Intercompagnies</td>
				<td> </td>
			</tr>
			<tr>
				<td >P</td>
				<td >Autres (&acirc; pr&eacute;ciser )</td>
				<td></td>
			</tr>
		
		
		</table>
		<br>
		<br>
		<br>
		<br>
	<p><i>Cabinet GERARD CATEIN</i></p>	

  </div>



</body>';
///==================================================================

///====================FOOTER PAGE===================================

?>