<?php @session_start(); ?>
<script src="../../js/jquery-1.6.1.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#preparation-memorandum").hide();
	$("#btn-generer-memorandum").click(function(){		
        if ($('#icone_memorandum').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Rap_Inter/memorandum/php/generer_doc_word.php",
                    send : $('#ltr_affirm_memo').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Errrrrreur  : " + JSON.stringify(msg) );
                    }
                    ,
                    success : function(data){
                    $('#ltr_affirm_memo').html(data);
                }
                });
            }
        }
        else{
			$.ajax({
				type: "POST",
				url: "Rap_Inter/memorandum/php/verifier_preparation.php",
                send : $('#ltr_affirm_memo').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
				error: function(msg){
                    alert( "Errrrrrreur1  : " + JSON.stringify(msg) );
				},
				success: function(data){
					if(data == true){
						alert("Veuillez verifier la preparation car il y a omision de champ(s) obligatoire(s) ou non respect de format de certain(s) fichier(s)")
						$('#ltr_affirm_memo').html("");
						$("#btn-preparer-memorandum").click();
					}
					else{						
						 $.ajax({
							type : "POST",
							url : "Rap_Inter/memorandum/php/generer_doc_word.php",
							send : $('#ltr_affirm_memo').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
							error :function(msg){
								alert( "Errrrrrreur2  : "+msg );
							}
							,
							success : function(data){
								$('#ltr_affirm_memo').html(data);
							}
						});
					}
				}
			});           
        }
	});
	$("#btn-preparer-memorandum").click(function(){
		$("#gauche, #doite, #zone_telechargement").hide();
		$("#preparation-memorandum").show();
		$("#interface-memorandum").load("Rap_Inter/memorandum/load/index.php");
		bloquerOnglets();
	});
	$("#memorandum-btn-retour").click(function(){
		if(confirm("Voulez vous vraiment quitter la page? Les données qui n'ont pas été enregistrées seront perdues si vous poursuivez")){
			$("#preparation-memorandum").hide();
			$("#gauche, #droite, #zone_telechargement").show();
			debloquerOnglets();
		}		
	});	
	function bloquerOnglets(){
		$('#ongulet').fadeTo('slow',.6);
		$('#ongulet').append('<div id="transparent" style="position: absolute;top:0;left:0;width: 100%;height:10%;z-index:2;opacity:0.4;filter: alpha(opacity = 50)"></div>');
	}
	function debloquerOnglets(){	
		$('#transparent').remove();
		$('#ongulet').fadeTo('slow',1);
	}
});
</script>

<div id="preparation-memorandum">
	<div id="interface-memorandum">
	
	</div>
	<input type="button" value="retour" id="memorandum-btn-retour"/>
</div>

<style>
#preparation-memorandum{
	position: absolute;
	width: 100%;
	height: 100%;
}
#memorandum-btn-retour{
	cursor: pointer;
	position: absolute;
	top: 0%;
    left: 80%;
    width: 200px;
    height: 35px;
}
#interface-memorandum{
	position: absolute;
	float:left;
    top: 6%;
    width: 100%;
    height: 100%;
    text-align: left;	
    font-size: smaller;
}
</style>