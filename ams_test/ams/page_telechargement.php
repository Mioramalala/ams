

<html>
	 <head>
		<style type="text/css">
	.head {
	background-color:#2da4f4;
	
    }
	.table_telechargement {
	border:none;
	}
	




#test2
{
   background-color: yellow;
   text-align: center;
   vertical-align: middle;
   overflow: hidden;

   position: absolute;
   left: 440px;
   top: 150px;
   width: 50px;
   height: 30px;
}
.slash:hover {
background-color: #fff;

}

.s_slash:hover {
background-color: #eee;

}

	
	</style>
	 </head>
	 <body>
	 <!--====================================================== -->
<div id="Formulaire_rapport">

<table width="385" height="112" border="0"  background="Dossier_Rapport/img/fong_img.png" id="Tab" >

	 <tr class="head"><td width="262"><div align="center"><span style="color:#fff">Titre</span></div></td> <td style="width:20%"><div align="center"><span style="color:#fff" >Date</span></div></td><td><div align="center"><span style="color:#fff">Document</div></td><td></td>
	 </tr>
	 <tr class="slash">
	   <td><div id="l1">Lettre d &rsquo; affirmation</div></td>
	   <td><img src="Dossier_Rapport/img/btn1.png"  id="cahe1" /><img src="Dossier_Rapport/img/btn2.png"  id="btn_ltr_affirm" hidden /></td>
	   <td><div id="ltr_affirm" align="center"></div></td>
  </tr>
	 <tr class="slash">
	   <td>Lettre de mission</td>
	   <td><img src="Dossier_Rapport/img/btn1.png"  id="cahe2" /><img src="Dossier_Rapport/img/btn2.png"  id="btn_ltr_mission"  /></td>
	   <td><div align="center" id="ltr_mission"></div></td>
  </tr>
	 <tr class="slash">
	   <td>Liste des pi&egrave;ces </td>
	   <td><input type="button" id="btn_ltr_piece" value="charger" /></td>
	   <td><div align="center" id="ltr_piece"></div></td>
  </tr>
  <tr class="slash">
    <td colspan="3"><a href="#" id="afficher_rsci" border="1"> + </a> : RSCI</td>
  </tr> 
  <tr  class="slash" >
    <td colspan="2">
				<table  id="sous_menu_rsci">
					 <tr class="s_slash">
						   <td>FC 1 - Cycle Achat </td>
						   <td><input type="button" id="btn_ltr_cycle_achat" value="charger" /></td>
						   <td><div align="center" id="ltr_cycle_achat"></div></td>
					  </tr>
					  <tr class="s_slash">
						   <td>FC 2 - Cycle Immobilisation  </td>
						   <td><input type="button" id="btn_ltr_cycle_immo" value="charger" /></td>
						   <td><div align="center" id="ltr_cycle_immo"></div></td>
					  </tr>
					   <tr class="s_slash">
						   <td>FC 3 - Cycle Stocks  </td>
						   <td><input type="button" id="btn_ltr_rsci_stocks" value="charger" /></td>
						   <td><div align="center" id="ltr_rsci_stocks"></div></td>
					  </tr>
					  <tr class="s_slash">
						   <td>FC 4 - Paie </td>
						   <td><input type="button" id="btn_ltr_rsci_paie" value="charger" /></td>
						   <td><div align="center" id="ltr_rsci_paie"></div></td>
					  </tr>
					  <tr class="s_slash">
						   <td>FC 5 - Trésorerie recettes </td>
						   <td><input type="button" id="btn_ltr_rsci_tr_recette" value="charger" /></td>
						   <td><div align="center" id="ltr_rsci_tr_recette"></div></td>
					  </tr>
					  <tr class="s_slash">
						   <td>FC 6 - Trésoreries depense </td>
						   <td><input type="button" id="btn_ltr_rsci_tr_depense" value="charger" /></td>
						   <td><div align="center" id="ltr_rsci_tr_depense"></div></td>
					  </tr>
					  <tr class="s_slash">
						   <td>FC 7 -  Cycle Ventes  </td>
						   <td><input type="button" id="btn_ltr_rsci_ventes" value="charger" /></td>
						   <td><div align="center" id="ltr_rsci_ventes"></div></td>
					  </tr>
					  <tr class="s_slash">
						   <td>FC 8 - Environnement de contr&ocirc;le </td>
						   <td><input type="button" id="btn_ltr_rsci_EC" value="charger" /></td>
						   <td><div align="center" id="ltr_rsci_EC"></div></td>
					  </tr>
					  <tr class="s_slash">
						   <td>FC 9 - Syst&egrave;me d&rsquo;information </td>
						   <td><input type="button" id="btn_ltr_rsci_SI" value="charger" /></td>
						   <td><div align="center" id="ltr_rsci_SI"></div></td>
					  </tr>
					 
				</table>
	</td><td></td>
  </tr>
			
  <tr class="slash">
	   <td>Planification g&eacute;n&egrave;rale </td>
	   <td><input type="button" id="btn_planification_generale" value="charger" /></td>
	   <td><div align="center" id="planification_generale"></div></td>
  </tr > 

  <tr class="slash">
	   <td>RECAP RSCI </td>
	   <td><input type="button" id="btn_recap_rsci" value="charger" /></td>
	   <td><div align="center" id="recap_rsci"></div></td>
  </tr>
	
	  <tr class="slash">
	   <td>EXCEL </td>
	   <td><input type="button" id="btn_excel" value="charger" /></td>
	   <td><div align="center" id="excel"></div></td>
  </tr>
	</table>

</div>


	 <script type="text/javascript" src="Dossier_Rapport/js_telechargement/all_js_telechargement.js" ></script>
	 <script type="text/javascript" src="Dossier_Rapport/js_telechargement/Event_page.js" ></script>
	
	 </body>
	 </html>
