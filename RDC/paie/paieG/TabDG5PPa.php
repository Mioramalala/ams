<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			textarea{width: 100%;height: 100%;font-size: 8pt;}
			input{width:100%;font-size: 8pt;}
			.cadre1{width: 930px;height: 270px;overflow:hidden;}
			.cadre2{width: 930px;height: 15%;overflow:hidden;}
			.cadre1:hover,.cadre2:hover{overflow:auto;}
		</style>
		<script>
			$(document).ready(function(){								
				$.ajax({
					type:"post",
					url:"RDC/paie/paieG/requetG5a.php",
					data:{},
					success:function(e){
						$("#resultat").html(e);
						//console.log($("#resultat").html(e)) ;
					}				
				});								
				$.ajax({
					type:"post",
					url:"RDC/paie/paieD/requetD1prime.php",
					data:{},
					success:function(e){
						$("#resultatPrime").html(e);
					}				
				});
			});
			function ajout(){
				var compteur = parseInt($("#ajout").attr('alt'));
				var i = compteur + 1;
				$("#ajout").attr('alt',i);
				$('#ajout').append('<tr id="ligne'+ i +'"><td width="200px"><input type="text" id="periode'+i+'"/></td><td width="200px"><input type="text" id="nbr'+i+'" placeholder="0" /></td><td width="200px"><input type="text" id="avt'+i+'" placeholder="0.00" onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)"/></td><td width="200px"><input type="text" id="salaire'+i+'" placeholder="0.00" onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)" /></td><td width="200px"><input type="text" id="salaireT'+i+'" placeholder="0.00"  onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)"/></td><td width="200px" id="totalD'+i+'"></td><td width="200px"><input type="text" id="irsa'+i+'" placeholder="0.00" onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)"/></td><td width="200px"><input type="text" id="persT'+i+'" placeholder="0" /></td></tr>');
			}
			function supp(){
				var compteur = parseInt($("#ajout").attr('alt'));
				if (compteur != 0){
					var i = compteur - 1;
					var periode = $('#periode'+compteur).val();
					if( periode != "" ){
						$.ajax({
							type:"post",
							url:"RDC/paie/paieG/requetSuppG5a.php",
							data:{periode:periode},
							success:function(e){
							}
						});
					}

					$("#ajout").attr('alt',i);
					$('table#ajout tr:last-child').remove();// Efface la dernière ligne
				}
			}
			function calculTotalH(arg){
				if( !isNaN($(arg).val()) ){
					$(arg).css("background-color","");
					var budget = parseFloat($(arg).val());
					/(([0-9]+)$)/.exec($(arg).attr('id'));
					var indice = RegExp.$1;
					var avt = ($("#avt"+indice).val() == "") ? 0.00 : parseFloat($("#avt"+indice).val());
					var salaire = ($("#salaire"+indice).val() == "") ? 0.00 : parseFloat($("#salaire"+indice).val());
					var salaireT = ($("#salaireT"+indice).val() == "") ? 0.00 : parseFloat($("#salaireT"+indice).val());
					var totalD = 0.00;
					totalD = (avt + salaire + salaireT).toFixed(2);
					// Calcul des totals en bas
					/(^([a-zA-Z]+))/.exec($(arg).attr('id'));
					var name = RegExp.$1;
					var compteur = parseInt($("#ajout").attr('alt'));
					var totalH = 0.00;
					var totalDD = 0.00;
					for (var i = 1; i <= compteur; i++){
						totalH += ($("#"+name+i).val() == "") ? 0.00 : parseFloat($("#"+name+i).val());
						totalDD += ($("#totalD"+i).text() == "") ? 0.00 : parseFloat($("#totalD"+i).text());
					};
					//Calcul écart
					var TotalB = parseFloat($("#total"+name).text());
					var CompteB =($("#Compt"+name).val() == "") ? 0.00 : parseFloat($("#Compt"+name).val());
					var EcartB = TotalB - CompteB;

					$('#totalD'+indice).text(totalD);
					$('#total'+name).text(totalH.toFixed(2));
					$('#totaltotalD').text(totalDD.toFixed(2));//totaltotalD
					$('#ecart'+name).text(EcartB.toFixed(2));
				}
				else{
					$(arg).css("background-color","red");
				}
			}
			function calculEcart(arg){
				if( !isNaN($(arg).val()) ){
					$(arg).css("background-color","");
					var reg=new RegExp("^(Compt)", "g");
					var tableau = $(arg).attr('id').split(reg);
					var name = tableau[2];
					var compte = ($(arg).val() == "") ? 0.00 : parseFloat($(arg).val());
					var total = parseFloat($("#total"+name).text());
					var ecart = total - compte;

					$('#ecart'+name).text(ecart.toFixed(2));
				}
				else{
					$(arg).css("background-color","red");
				}
			}

 var  cadre=$('.cadreIRSA');
           	var cadr1=$('.cadre1.cadreIRSA');
           	var titre=$('cadre1.cadreIRSA.sous-titre');
                     
                 
                 cadre.scroll(function(){
                 	cadre.scrollLeft($(this).scrollLeft());
                
                 });
                
		</script>
	</head>
	<body>
		<center>
		<p class="titreRenvoie">
			Cadrage des salaires bruts déclarés à l'IRSA
		</p>
		</center>
		<div class="cadre">
			<div class="cadre2 cadreIRSA">
			<span id="resultatPrime"></span>
			</div>
			<style type="text/css">
				.cadre1:hover{
					overflow-y: hidden !important;
				}

				#resultat:hover{
					overflow: auto;
				}

				#resultat{
					height: 250px !important;
					width: 1600px !important;
					overflow: hidden;
				}
			</style>
			<div class="cadre1 cadreIRSA">
				<table class="h6">
					<tr class="sous-titre">
						<td width="200px">Période</td>
						<td width="200px">Nombre de personnel</td>
						<td width="200px">Avantages en nature</td>
						<td width="200px">Salaires bruts</td>
						<td width="200px">Personnels temporaires</td>
						<td width="200px">Total salaires déclarés</td>
						<td width="200px">IRSA</td>
						<td width="200px">Personnels temporaires</td>
					</tr>
				</table>
				<div id="resultat"></div> 
			</div>
			<input type="button" value="+" id="boutonAjout" class="bouton-pj" title="Ajout d'une ligne" onclick="ajout();" />
			<input type="button" value="-" id="boutonSupr" class="bouton-pj"  title="Suppression de la dernière ligne" onclick="supp();" />
			
		</div>
			
			
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>