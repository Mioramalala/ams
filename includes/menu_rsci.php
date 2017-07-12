<?php 
	@session_start();
?><head>
	<link rel="stylesheet" href="css/acceuil_rsci.css"/>
	<script type="text/javascript" src="cycleAchat/cycle_achat_js/js.js"></script>
	<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
	<script>
		$(function(){
			$('#bt_achat').click(function(){
				$('#dv_cont_menu_rsci').hide();
				$('#contenue_rsci').show();
				$('#deux_tresorerie').hide();
				$('#bt_tresorerie').show();
				bloquerOnglets();
			});
			$('#bt_immo').click(function(){
				$('#dv_cont_menu_rsci').hide();		
				$('#contRsciImmo').show();
				$('#deux_tresorerie').hide();
				$('#bt_tresorerie').show();
				bloquerOnglets();
			});
			$('#bt_stock').click(function(){
				$('#dv_cont_menu_rsci').hide();		
				$('#contRsciStock').show();
				$('#deux_tresorerie').hide();
				$('#bt_tresorerie').show();
				bloquerOnglets();
			});
			$('#bt_paie').click(function(){
				$('#dv_cont_menu_rsci').hide();		
				$('#contRsciPaie').show();
				$('#deux_tresorerie').hide();
				$('#bt_tresorerie').show();
				bloquerOnglets();
			});
			
			
			$('#bt_tresorerie').click(function(){
				$('#bt_tresorerie').hide();
				$('#deux_tresorerie').show();
				bloquerOnglets();
			});
			$('#bt_recette').click(function(){
				$('#dv_cont_menu_rsci').hide();		
				$('#contRsciRecette').show();
				$('#deux_tresorerie').hide();
				$('#bt_tresorerie').show();
				bloquerOnglets();
			});
			$('#bt_dep').click(function(){
				$('#dv_cont_menu_rsci').hide();		
				$('#contRsciDepense').show();
				$('#deux_tresorerie').hide();
				$('#bt_tresorerie').show();
				bloquerOnglets();
			});
			$('#bt_vente').click(function(){
				$('#dv_cont_menu_rsci').hide();		
				$('#contRsciVente').show();
				$('#deux_tresorerie').hide();
				$('#bt_tresorerie').show();
				bloquerOnglets();
			});	
			$('#bt_env').click(function(){
				$('#dv_cont_menu_rsci').hide();		
				$('#contRsciEnvironnement').show();
				$('#deux_tresorerie').hide();
				$('#bt_tresorerie').show();
				bloquerOnglets();
			});	
			$('#bt_syst').click(function(){
				$('#dv_cont_menu_rsci').hide();		
				$('#contRsciInfo').show();
				$('#deux_tresorerie').hide();
				$('#bt_tresorerie').show();
				bloquerOnglets();
			});
		});
		function sessi(x){
		 	var d=x;
			$.post('change_session.php',{sess:d},function(res)
			{
					//alert(res);
			});
		}
		function bloquerOnglets(){
			$('#ongulet').fadeTo('slow',.6);
			$('#ongulet').append('<div id="transparent" style="position: absolute;top:0;left:0;width: 100%;height:10%;z-index:2;opacity:0.4;filter: alpha(opacity = 50)"></div>');
		}
</script>
</head>


<div id="dv_rsci">
	<div id="fermeture_rsci">
		<a href="accueil.php"><img src="img/exit-retour.png" id="ferme_retour_acceuil"></a>
	</div>
	<table>
		<tr>
			<td id="bt_achat" onclick="CycleProcess(this.id);sessi(1)" class="choix_menu_rsci"><img src="img/RSCI/achat.png" /> Cycle Achat</td>
			<td id="bt_tresorerie" class="choix_menu_rsci" onclick="sessi(26)"><img src="img/RSCI/tresorerie.png" /> Cycle Trésorerie</td>
			<td id="deux_tresorerie" class="choix_menu_rsci" style="display:none;" >
	            <label id="bt_recette" class="mini_menu_tresore" style="float:left;" onclick="CycleProcess(this.id)">
	               Trésorerie<br /> recettes
	            </label>
	            <label style="float:right;" id="bt_dep" class="mini_menu_tresore" onclick="CycleProcess(this.id);">
	               Trésorerie<br /> dépenses
	            </label>
	         </td>
		</tr>
		<tr>
			<td id="bt_vente" onclick="CycleProcess(this.id);sessi(37)" class="choix_menu_rsci"><img src="img/RSCI/vente.png" /> Cycle Vente</td>
			<td id="bt_immo" onclick="CycleProcess(this.id);sessi(7)" class="choix_menu_rsci"><img src="img/RSCI/imobolisation.png" /> Cycle Immobilisation</td>
		</tr>
		<tr>
			<td id="bt_paie" onclick="CycleProcess(this.id);sessi(21)" class="choix_menu_rsci"><img src="img/RSCI/paie.png" /> Cycle Paie</td>
			<td id="bt_stock" onclick="CycleProcess(this.id);sessi(16)" class="choix_menu_rsci"><img src="img/RSCI/stock.png" /> Cycle Stocks</td>
		</tr>
		<tr>
			<td id="bt_env" onclick="CycleProcess(this.id);sessi(43)" class="choix_menu_rsci"><img src="img/RSCI/environnment-et-controle.png" /> Environnement de contrôles</td>
			<td id="bt_syst" onclick="CycleProcess(this.id);sessi(46)" class="choix_menu_rsci"><img src="img/RSCI/systeme-d'infomation.png" /> Système d'informations</td>
		</tr>
	</table>
</div>