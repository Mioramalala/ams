
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			textarea{width:100%;height:100%;font-size: 8pt;}
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				$.ajax({
					type:"post",
					url:"RDC/paie/paieH/requetH2b.php",
					data:{},
					success:function(e){
						$("#resultat").html(e);
					}				
				});	
			});
			function ajout(){
				var compteur = parseInt($("#ajout").attr('alt'));
				var i = compteur + 1;
				$("#ajout").attr('alt',i);
				$('#ajout').append('<tr><td><textarea id="nat'+i+'" placeholder="Autre à mentioner"></textarea></td><td><textarea id="na'+i+'" placeholder="Notes annexes"></textarea></td></tr>');
			}
			function supp(){
				var compteur = parseInt($("#ajout").attr('alt'));
				if (compteur != 0){
					var i = compteur - 1;
					var nature = $('#nat'+compteur).text();
					if( nature != "" ){
						$.ajax({
							type:"post",
							url:"RDC/paie/paieH/requetSuppH2b.php",
							data:{nature:nature},
							success:function(e){
							}
						});
					}

					$("#ajout").attr('alt',i);
					$('table#ajout tr:last-child').remove();// Efface la dernière ligne
				}
			}
		</script>
	</head>
	<body>
		<center>
			<p class="titreRenvoie">Eléments en annexe	</p>
		</center>
		<div class="cadre">
			<span id="resultat"></span>
		</div>

		<div id="fermer" style="display:none;">
			<center>
			    <p> Voulez vous vraiment fermer l'application ?</p>
			    <p>
			     <input type="button" value="Valider" id="okferme"/> 
			    </p>
	       </center>
       
    	</div>
     </body>