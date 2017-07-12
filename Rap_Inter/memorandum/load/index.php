<?php @session_start(); ?>
<script type="text/javascript">
$(function(){
	// A CHAQUE MENU CORRESPOND UN FORMULAIRE DONT LE FICHIER A LE MEME NOM QUE L'ID DU MENU
	$(".ui-memo-menu").click(function(){
		if(confirm("Voulez vous vraiment quitter la page? Les données qui n'ont pas été enregistrées seront perdues si vous poursuivez")){
			$(".unclickable").removeClass("unclickable");
			var id = $(this).attr("id");
			$("#ui-memo-right").load("Rap_Inter/memorandum/load/formulaire/"+id+".php");
			$(this).addClass("unclickable");
		}
	});
	// Pour afficher le menu 1 en premier
	$("#ui-memo-right").load("Rap_Inter/memorandum/load/formulaire/memo-menu-1.php");
});
</script>
<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap/css/datepicker.css">
<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="css/bootstrap/js/jquery-ui.js"></script>
<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="css/bootstrap/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="css/bootstrap/js/locales/bootstrap-datepicker.fr.js" charset="UTF-8"></script>
<div id="ui-memo-left" class="ui-memo">
	<div id="memo-menu-1" class="ui-memo-menu unclickable">1.Pr&eacuteambule</div>
	<div id="memo-menu-2" class="ui-memo-menu">2.Evolution de l'entit&eacute durant l'exercice</div>
	<div id="memo-menu-3" class="ui-memo-menu">3.Information juridique</div>
	<div id="memo-menu-4" class="ui-memo-menu">4.Approche des risques</div>
	<div id="memo-menu-5" class="ui-memo-menu">5.Comptes annuels a certifier</div>
	<div id="memo-menu-6" class="ui-memo-menu">6.Evenements posterieurs et continuit&eacute d'exploitation</div>
	<div id="memo-menu-7" class="ui-memo-menu">7.Collecte des &eacutel&eacutements probants, affirmations de la direction</div>
	<div id="memo-menu-8" class="ui-memo-menu">8.Conclusion sur l'approche generale d'audit et les risques specifiques</div>
	<div id="memo-menu-9" class="ui-memo-menu">9.Synthese de la mission</div>
	<div id="btn-enreg"> Enregistrer les modifications </div>
</div>
<div id="ui-memo-right" class="ui-memo">
</div>
<script type="text/javascript" src="Rap_Inter/memorandum/load/formulaire/js/enregistrer-modification.js"></script>
<link rel="stylesheet" type="text/css" href="Rap_Inter/memorandum/load/formulaire/css/style.css"/>
