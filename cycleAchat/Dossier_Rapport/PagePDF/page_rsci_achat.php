<?php
include "../Reporting_PDF/config_export.php";

    ob_start();
	/*================================================
	|  			FORMAT DES EXPORT PDF
	================================================ */
   
$date_entete="12/09/2013";





//-==============================================================================
        set_time_limit(1200);				
		ini_set("memory_limit","-1");
        ini_alter("memory_limit","-1");
       
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../Reporting_PDF/RSCI/Cycle_ACHAT/css_cycle_achat.css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
 <page_header>
      <table  border="1" class="table">
        <tr>
          <td width="223"><b>Client</b><br><span style="color: CMYK(0, 0, 100%, 0)"><b><h4> PROCHIMAD S.A</h4></b></span></td>
          <td width="384" align="center">QUESTIONNAIRE CONTR&Ocirc;LE INTERNE <br><b>ACHATS</b> GRANDE ENTITE </td>
          <td width="120"><b>CODE</b><br><br><span style="color: CMYK(0, 0, 100%, 0)">FC 1</span>  
	      </td>
        </tr>
        <tr>
          <td><b>COLLABORATEUR	<span style="color: CMYK(0, 0, 100%, 0)">auditeur</span></b></td>
          <td rowspan="2" align="center"><img src="../Reporting_PDF/RSCI/Cycle_ACHAT/images/pied.png" width="298" height="84" align="middle"></td>
          <td>FOLIO [[page_cu]]/[[page_nb]]</td>
        </tr>
        <tr>
          <td> <b> SUPERVISION</b>	<span style="color: RGB(255, 0, 0)">superviseur </span></td>
          <td><b>DATE	 <span style="color: CMYK(0, 0, 100%, 0)"><?php echo $date_entete; ?></span></b></td></tr>
      </table>
</page_header>
 
    <page_footer>
        <table  border="0" >
		   <tr> <td colspan="3" >-------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td></tr>
		   <tr>
                <td style="width: 300px; text-align: right">
                  <img src="../Reporting_PDF/RSCI/Cycle_ACHAT/images/HEADER.png" width="100px" height="20px"  />
                </td>
				<td style="width: 380px; text-align: center">
                  Evaluation des proc&eacute;dures 
                </td><td style="width: 40px; text-align: right">
                    Page [[page_cu]]                </td>
          </tr>
        </table>
    </page_footer>
<!--================================================================================= -->
<div id="conteneur"  style="left:130px; top: 200px;text-align: center; width:560px;  text-justify: newspaper; align:center">
	
<p>	<b>EVALUATION DU CONTROLE DES FOURNISSEURS</b></p>
</div>
<br><br><br><br><br><br>

	
	<div id="corp_objet">
	<b>OBJECTIF DE CONTR&ocirc;LE :</b>
	<br>
	 <ol style="list-style-type: upper-alpha; height:100px">
                <li style="padding:15px;"> S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes.</li>
                <li style="padding:15px;"> S&rsquo;assurer que tous les achats (retours) sont saisis et enregistr&eacute;s (exhaustivit&eacute;).</li>
                <li style="padding:15px;"> S&rsquo;assurer que toutes les factures (avoirs) enregistr&eacute;es correspondent &agrave; des achats r&eacute;els de l&rsquo;entreprise.</li>
                <li style="padding:15px;"> S&rsquo;assurer que tous les achats enregistr&eacute;s sont correctement &eacute;valu&eacute;s.</li>
                <li style="padding:15px;"> S&rsquo;assurer que tous les achats, ainsi que les produits et charges connexes sont enregistr&eacute;s dans la bonne p&eacute;riode</li>
                <li style="padding:15px;"> S&rsquo;assurer que tous les achats, ainsi que les charges et produits connexes sont correctement imput&eacute;s, totalis&eacute;s et centralis&eacute;s.</li>
	</ol>
	</div>
	<br><br>
	<div id="corp_objet2">
	<table class="table" align="center" >
	 <tr>
          <td  ><b>Etablissement et mise &agrave; jour :</b></td>
          <td ><b>Supervision :</b></td>
        
      </tr>
		<tr><td>  <br></td><td>  <br></td></tr>
	    <tr>
          <td >&Eacute;tabli par :  ___________________le _____________</td>
          <td >par  ____________________le ____________________</td>
        </tr>
		<tr>
          <td >Mis &agrave; jour par _________________le _____________	</td>
          <td >par ___________________	le ____________________</td>
        </tr><tr>
          <td >Mis &agrave; jour par _________________le _____________	</td>
          <td >par ___________________	le ____________________</td>
        </tr><tr>
          <td >Mis &agrave; jour par _________________le _____________	</td>
          <td >par ___________________	le ____________________</td>
        </tr>
	
	
	</table>
	</div>
	<!--========================================== PAGE 2 ============================================================= -->
	  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
		
				<!-- tableau PAGE 2-->
						<div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br> A - S&rsquo;assurer que les s&eacute;parations de fonctions sont suffisantes
						 </b> </div>		<br>
						  
				<table  border="1" class="table_p1">
					
							<tr>
									  <td width="207" rowspan="2"><div align="center"><strong>Fonctions</strong></div></td>
									  <td colspan="10" width="300"><div align="center"><strong>Personnel concern&eacute;</strong></div></td>
						    </tr>
							<tr>
									  <td style="width:6px" >&nbsp;</td>
									  <td style="width:6px">&nbsp;</td>
									  <td style="width:6px">&nbsp;</td>
									  <td style="width:6px">&nbsp;</td>
									  <td style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
									  <td  style="width:6px">&nbsp;</td>
						    </tr>
						    <tr>
							<td>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demandeurs  d&rsquo;achats</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							</tr>
							<tr>
									  <td>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &Eacute;tablissement  des commandes</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							</tr>
							<tr>
									  <td >3&nbsp;&nbsp;&nbsp; Autorisation    des commandes</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							</tr>
							<tr>
									  <td>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R&eacute;ception</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Comparaison  commande-facture</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Comparaison  bon de r&eacute;ception-facture</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Imputation  comptable</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; V&eacute;rification  de l&rsquo;imputation comptable</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bon  &agrave; payer</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  du journal des achats</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  des comptes fournisseurs</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rapprochement  des relev&eacute;s fournisseurs avec les comptes</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rapprochement  de la balance fournisseurs avec le compte collectif</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>14&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Centralisation  des achats</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>15&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Signature  des ch&egrave;ques</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>16&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Envoi  des ch&egrave;ques</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>17&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acceptation  des traites</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>18&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  du journal des effets &agrave; payer</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>19&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tenue  du journal de tr&eacute;sorerie</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									   <td >20&nbsp; Annulation    des pi&egrave;ces justificatives</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>21&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acc&egrave;s  &agrave; la comptabilit&eacute; g&eacute;n&eacute;rale</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									  <td>22&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Suivi  des avoirs</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
	  </tr><tr>
									<td>&nbsp;</td><td width="12"></td>
									<td width="9">&nbsp;</td>
									<td width="9">&nbsp;</td>
									<td width="12">&nbsp;</td>
									<td width="12">&nbsp;</td>
									<td width="12">&nbsp;</td>
									<td width="12">&nbsp;</td>
									<td width="12">&nbsp;</td>
									<td width="12">&nbsp;</td>
									<td width="12">&nbsp;</td>
									</tr>
				</table>
	<br>
						<table class="table" border="1">
							<tr>
								<td style="width:485px"><b>CONCLUSIONS :</b><br><br><br></td>
								<td  style="width:250px"><b>NIVEAU DE RISQUE</b><br>
									<b>Faible / Moyen / Elev&eacute;</b><br><br><br>
							  </td>
							</tr>
</table>
								  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			 <!-- ===============================PAGE 3========================================================== -->
			 <div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br><br> B - S&rsquo;assurer que tous les achats (retours) sont saisis et enregistr&eacute;s (exhaustivit&eacute;).
						 </b> </div><br>
			
			<table width="694" height="30"  border="1" class="table_p1" align="center" >
					
							<tr>
							  <td width="305" ><div align="center"><strong>QUESTIONS</strong></div></td>
							  <td width="34"><p><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td width="181"> <div align="center"><strong>COMMENTAIRES</strong></div></td>
							  <td width="36"> <strong>coef</strong></td>
			  </tr>
							<tr>
									  <td width="305" >1.	Toutes les marchandises reçues sont-<br> elles enregistr&eacute;es :<br>a)	sur des documents standard ?<br>
											b)	pr&eacute;num&eacute;rot&eacute;s ?
<br></td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55" style="bordure:none">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">1<br>1</td>
						    </tr><tr>
									  <td width="305" >Tous les services reçus sont-ils<br> enregistr&eacute;s :<br>
a)	sur des documents standard ?<br>
b)	pr&eacute;num&eacute;rot&eacute;s ?
<br></td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">1<br>1</td>
						    </tr><tr>
									  <td width="305" >Toutes les marchandises retourn&eacute;es et <br>les r&eacute;clamations effectu&eacute;es sont<br> enregistr&eacute;es sur des documents :<br>
a)	standard ?<br>
b)	pr&eacute;num&eacute;rot&eacute;s ?
</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">1<br>1</td>
						    </tr><tr>
									  <td width="305" >Le service comptable v&eacute;rifie-t-il la<br> s&eacute;quence num&eacute;rique des :<br>
a)	bons de r&eacute;ception ?<br>
b)	bons de retour ou de r&eacute;clamation pour s&rsquo;assurer qu&rsquo;il les reçoit tous ?
</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">2<br>2</td>
						    </tr><tr>
									  <td width="305" >Le service comptable tient-il un registre<br> des r&eacute;ceptions et des retours ou <br> r&eacute;clamations pour lesquels les factures <br>et avoirs n&rsquo;ont pas &eacute;t&eacute; reçus ?</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">3</td>
						    </tr>
						    <tr>
						      <td >	Ce registre :<br>
	a)	fait-il l&rsquo;objet d&rsquo;une revue particuli&egrave;re <br>pour identifier la cause des retards ?<br>
	b)	sert-il &agrave; &eacute;valuer les provisions pour <br>factures et avoirs &agrave; recevoir ?
</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>2<br>3</td>
		      </tr>
						    <tr>
									  <td width="305" >Le journal des achats est-il rapproch&eacute; <br>de la liste des r&eacute;ception retours ou r&eacute;clamations pour s&rsquo;assurer que toutes<br> les factures et tous les avoirs sont <br>comptabilis&eacute;s ?</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">3</td>
						    </tr>
									 
				</table>	
				  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<!--=======================================PAGE 4========================================================= -->
		<div id="corp_objet4"  style="left:3px; top: 100px;text-align: left; width:732px;  text-justify: newspaper">					
					<table width="694" height="30"  border="1" class="table_p4" align="center" >
					
							<tr>
							  <td width="305" ><div align="center"><strong>QUESTIONS</strong></div></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td width="181"> <div align="center"><strong>COMMENTAIRES</strong></div></td>
							  <td width="36"> <strong>coef</strong></td>
							</tr>
							<tr>
						 <td width="305" >Les produits aff&eacute;rents aux achats <br>(ristournes) sont-ils identifi&eacute;s au fur et à<br> mesure des r&eacute;ceptions pour permettre<br> de v&eacute;rifier que :<br>
a)	les avoirs sont reçus ?<br>
b)	les avoirs sont comptabilit&eacute;s ?
</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55" style="bordure:none">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">2<br>
									    2</td>
						    </tr><tr>
									  <td width="305" >Les charges aff&eacute;rentes aux achats<br> (frais de transport) sont-elles identifi&eacute;es <br>au fur et à mesure des r&eacute;ceptions pour<br> permettre de v&eacute;rifier que : <br>
a)	les factures sont reçues ?<br>
b)	les factures sont comptabilis&eacute;es ?
<br></td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">2<br>
									    3</td>
						    </tr><tr>
									  <td width="305" >Lorsque les factures et avoirs sont<br> envoy&eacute;s dans les services pour <br>contr&ocirc;le, le service comptable garde-t-il<br> la trace de ces envois ?<br>
a)	pour suivre les retours ?<br>
b)	identifier les factures non enregistr&eacute;es ?
</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">1<br>
									    2</td>
						    </tr><tr>
									  <td width="305" >Les comptes fournisseurs sont-ils <br>r&eacute;guli&egrave;rement rapproch&eacute;s :<br>
a)	du compte g&eacute;n&eacute;ral ?<br>
b)	des relev&eacute;s fournisseurs ?
</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">2<br>2</td>
						    </tr>
						    <tr>
						      <td >Lorsque le syst&egrave;me pr&eacute;voit le rejet <br> d&rsquo;op&eacute;rations non conformes, ces rejets sont-ils :<br>
a)	list&eacute;s ?<br>
b)	suivis pour v&eacute;rifier qu&rsquo;ils sont tous recycl&eacute;s ?
</td>
														  <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>3<br>3</td>
						</tr>
									 
				</table>	
				<br>
				<br>
				<br><div id="p_div_pied">
						<table class="table" border="0" style="padding-left:40px">
							<tr>
								<td style="width:500px"><b>NIVEAU DE RISQUE</b><br><b>Faible / Moyen / Elev&eacute;</b><br><br>Conclusions</td>
								<td  style="width:150px" align="left">NB :n/a<b></b><br>
									
							  </td>
							</tr>
				</table></div>
				</div>
				  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						 <!--===============================PAGE 5======================================================== -->
						 	<br>
				<div id="corp_objet"  style="left:3px; top: 130px;text-align: left; width:732px;  text-justify: newspaper">
							<b> OBJECTIF DE CONTR&ocirc;LE :<br>C - S&rsquo;assurer que toutes les factures (avoirs) enregistr&eacute;es correspondent à des achats r&eacute;els de l&rsquo;entreprise
						 </b> </div>		<br>		 
						 
						 <table width="694" height="30"  border="1" class="table_p4" align="center" >
					
							<tr>
							  <td width="305" ><div align="center"><strong>QUESTIONS</strong></div></td>
							  <td width="34"><p align="justify"><strong>R&eacute;f<br>Diag</strong></p></td>
							  <td width="55"><strong>OUI ou N/A</strong></td>
							  <td width="43"><strong>NON</strong></td>
							  <td width="181"> <div align="center"><strong>COMMENTAIRES</strong></div></td>
							  <td width="36"> <strong>coef</strong></td>
							</tr>
							<tr>
						 <td width="305" >Les factures et avoirs reçus ne peuvent-ils être enregistrés que s'ils sont rapprochés d'un bon de réception, retour ou réclamation ? (ou autre justificatif pour les services).</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55" style="bordure:none">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">2</td>
						    </tr><tr>
									  <td width="305" >Les bons de réception, retour ou réclamation sont-ils accrochés aux factures et avoirs pour éviter leur utilisation multiple ?
								<br></td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">3</td>
						    </tr>
						    <tr>
						      <td >Les  factures et avoirs enregistr&eacute;s sont-ils annul&eacute;s pour &eacute;viter leur enregistrement  multiple ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>3</td>
					       </tr>
						    <tr>
									  <td width="305" >Les doubles de factures et avoirs sont-ils identifiés dès réception pour éviter leur comptabilisation ?</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">3</td>
						    </tr><tr>
									  <td width="305" >La comptabilisation de duplicata est-elle interdite ou soumise à autorisation particulière ?</td>
									  <td width="34"><div align="center"></div></td>
									  <td width="55">&nbsp;</td>
									  <td width="43">&nbsp;</td>
									  <td width="181">&nbsp;</td>
									  <td  width="36">3</td>
						    </tr>
						    <tr>
						      <td >Les factures et avoirs sont-ils rapproch&eacute;s des bons de livraison, de retour ou r&eacute;clamation et des bons de commande pour &eacute;viter les erreurs de facturation ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>2</td>
					       </tr>
						    <tr>
						      <td >La liste des fournisseurs autorisés est-elle régulièrement mise à jour et contrôlée ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>1</td>
					       </tr>
						    <tr>
						      <td >Le fichier fournisseur est-il régulièrement rapproché de la liste établie en 7 ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>1</td>
					       </tr>
						    <tr>
						      <td >L'ouverture d'un nouveau compte fournisseur est-elle soumise à autorisation ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>2</td>
					       </tr>
						    <tr>
						      <td >Existe-t-il une liste des personnes habilitées à engager la société (éventuellement avec des plafonds) ?</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>2</td>
					       </tr>
						    <tr>
						      <td >Les opérations diverses relatives aux opérations d'achat sont-elles soumises à autorisation avant enregistrement ?</td>
														  <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>&nbsp;</td>
						      <td>1<br></td>
						</tr>
									 
				</table>	
</body>
</html>
<?php  
	//==============Garbage Collector ACTIVER============================
		gc_enable(); 							
		gc_collect_cycles(); 
	/*================================================*/
    $content = ob_get_clean();

    // convert to PDF
    //require_once(dirname(__FILE__).'/../html2pdf.class.php');
    require_once('../Reporting_PDF/Class_pdf_export/html2pdf.class.php');
 try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
       // $html2pdf->pdf->IncludeJS("print(true);");//fenêtre imprimer
        $html2pdf->pdf->SetDisplayMode('fullpage');
        //$html2pdf->pdf->SetProtection(array('print'), 'eufonie');//mot de passe
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('../Sauvegarde_sortie/PDF/cycle_achat.pdf','F');
         echo'<a href="Sauvegarde_sortie/PDF/cycle_achat.pdf"  target="_blank"> <img src="img/telecharger.png" height="28px" width="28px"/></a>  ';
   
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }   
  

/*
echo '<a href="'.$chm_taux_sondage.'Export_taux_sondages_pdf.php">Taux de sondage </a> <br>';
*/
?>