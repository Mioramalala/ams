<?php include'../connexion.php';
// $idEntr=$_POST['a'];
// echo $idEntr;
?>


<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../css/cssEntreprise.css"/>
		<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
		 <link href="css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
		<link href="../facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
		<script src="../facebox/facebox.js" type="text/javascript"></script> 
		<script src="js/jquery.multi-select.js" type="text/javascript"></script>
		<script type="text/javascript" src="src/date/jquery.datepick.min.js"></script>
		<script type="text/javascript" src="src/date/jquery.datepick-fr.js"></script>
		<link rel="stylesheet" href="src/date/jquery.datepick.css"></script>
		
		<script>
			
			$(function(){
			
			jQuery(document).ready(function($) {
				  $('a[rel*=facebox]').facebox();
				}) ;
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////
				$('#txtdateD').datepick({ 
				dateFormat: 'dd/mm/yyyy'
				});
				$('#txtdateC').datepick({ 
				dateFormat: 'dd/mm/yyyy'
				});
				$('#txtdateDL').datepick({ 
				dateFormat: 'dd/mm/yyyy'
				});
					
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			
				$('#optgroup').multiSelect({
				  selectableHeader: "<div class='custom-header'>Collaborateurs </div>",
				  selectionHeader: "<div class='custom-header'>Intervenants </div>"
				  
				});
				$("#plusOpId").click(function(){
					
					i++;
				
					$("#list_Auditeur").append("<select id='idOp"+i+"'>  <?php
					//////////////////////////////////
					$sql_list='SELECT UTIL_NOM FROM  tab_utilisateur
										WHERE UTIL_STATUT = 1 order by UTIL_ID asc ';
						$reponse_list=$bdd->query($sql_list);
						while ($donnees_list=$reponse_list->fetch())
						
						{?>
						'<option> <?php $NomOp=$donnees_list['UTIL_NOM'];echo $NomOp; ?>  </option> <?php } ?> </select>");
						
					
					/////////////////////////////////////
					
					
					
				});
				
				
				$("#selectSup").click(function(){
					var selec=$("#ttList").find("tr input:checked").attr("value");
					var nomIdTr="Nom"+selec;
					var nom=$("#NomN"+selec).val();
					// alert(nom);
					$("#"+nomIdTr).hide();
					$("#Superviseur1").html($("#Superviseur1").html()+" "+nom);
					//var a=$("#Superviseur1").html();
					//alert(a);
				});
				
				$("#selectAud").click(function(){
					var selec=$("#ttList").find("tr input:checked").attr("value");
					if( selec==undefined)
					{
					alert("Choisissez");
					}
					else{
					var nomIdTr="Nom"+selec;
					var nom=$("#NomN"+selec).val();
					
					// alert(nom);
					$("#"+nomIdTr).hide();
					$("#operant").html($("#operant").html()+nom+",");
					
					
					}
				});
				
				
				
				$("#dis_tach").click(function(){
				var c= ($('.ms-selected').find('span').length)/2;
				var i=0;
				var transfer= new Array();
				var transferIdSel= new Array();
				transferIdSel="transferIdSel=true";
				transfer="transfer=true";
				var listSel=new Array();
				var	IdSelVal = $('#optgroup').val();
				var IdSelLenght = IdSelVal.length;
				var IdSel = new Array();
				var IdSel2 = [];
				// alert(IdSelLenght);
				for (i=0; i<c ; i++){
				
					listSel[i]= $('.ms-selected').find('span').contents().eq(i).text();
					transfer=transfer+"&listSel[]="+listSel[i];

					// alert( listSel[i]);
				}
					
				for (i=0; i<IdSelLenght ; i++){
					IdSel = IdSelVal[i];
					transferIdSel=transferIdSel+"&listIdSel[]="+IdSel;
					IdSel2.push(IdSel);
					// alert(IdSel);

				}

						 $.ajax({
							type:"POST",
							url:"entreprise/modification_distribution_tache.php",
							data:transfer+'&listIdSel[]='+transferIdSel,
							success:function(e){
								$("#ListOP").html(e);
								
							}
						
						});
					
				
				
				});
				
			
				$("#annulCM").click(function(){
					var IdEntr=$("#txtIdEntr").val();
					 $.ajax({
						type:"POST",
						url:"entreprise/viewEntreprise.php",
						data:{a:IdEntr},
						success:function(e){
						 
						  $("#Acc").html(e);
						}
					});
				
				});			
				
				
		///////////////////////////////////////////////////distribution tache/////////////////////////////
			});
		</script>
		
		<script>
			// function addTache(valId){
				// alert("cc1");
					// var valChecked = [];
					// var idChecked = [];
					 // $(".list_tach li input[type='checkbox']:checked").each(
						  // function() {
						  // alert("cc2");
							 // valChecked.push($(this).attr('value'))
							 // idChecked.push($(this).attr('id'));
							  // $("ul.list_tach li#"+$(this).attr('id')).remove(); 
								//// io ambony io//
						  // }); 
						  
						  // return false;
						//  // alert(valChecked+' '+valId);
						  // var valTransfert = new Array();
						  // valTransfert="valTransfert=true";
						  // valTransfert = valTransfert+'&listvalChecked[]='+valChecked;
						  // $.ajax({
								// type:"POST",
								// url:"entreprise/test.php",
								// data:valTransfert+'&envoi='+valId,
								// success:function(e){
								// $("#listTac"+valId).html(e)
									//// $("#list_tache_cycle").html(e);
								// }
								
						  // });

			// }
	
			
			//************************************************************creation mission*************************************************************************//
			
			/////////////////////////////////////////distribution des tache manomboka eto////////////////////////////////////////////////
			
			function openMe(idSelected){

				// alert(idSelected);
				$("#listTac"+idSelected).show();
				/////////////////////////maka ze vo selecte////////////////////////
				var valChecked = [];
				var idChecked = [];
				 $(".list_Tache li input[type='checkbox']:checked").each(
					  function() {
					
						 valChecked.push($(this).attr('value'))
						idChecked.push($(this).attr('id'));
					  }); 
					  $(".list_Tache li input[type='checkbox']:checked").parent().remove();
					  i=0;
					  //$("#listTac"+idSelected).insertBefore("<form id='frmlistTac"+idSelected+"'>");
						for(i=0;i<valChecked.length;i++){

						$("#listTac"+idSelected).html($("#listTac"+idSelected).html()+'<input type="text" value="'+idChecked[i]+'" id="'+idChecked[i]+'" style="display:none" name="cl1[]"/> <li id="'+idChecked[i]+'"><input type="checkbox" id="'+idChecked[i]+'" class="classTach" value="'+valChecked[i]+'">'+valChecked[i]+"</li>");

						}
						
						$("#listTac"+idSelected).html("<form id='frmlistTac"+idSelected+"'>"+$("#listTac"+idSelected).html()+"</form>");
						
						nbr=$("#listTac"+idSelected+" .classTach").length;
						// alert(nbr)
						if (nbr>0)
						$("#labNbr"+idSelected).show();
						$(".nbr_tach."+idSelected).html(nbr);
			}
			
			
			function closeMe(idSelected){
			
				$("#listTac"+idSelected).hide();
			
			}
			/////////////////////////////////////////////////////////////le retoure///////////////////////////////////////////////////////////////
			
			function retour_tach(){
				//alert("azerty");
				var RetChecked = [];
				var idRetChecked = [];
				
				/////////////////////////maka ze vo selecte////////////////////////
				
					$(".operantCl  li input[type='checkbox']:checked").parent().each(
					  function() {
					
						RetChecked.push($(this).attr('value'));
						idRetChecked.push($(this).attr('id'));
						
						//Annuler tâche par Niaina
						var id = $(this).attr('id');
						//Achats
						if ((id>=1) && (id<=6)) {
							$( "#list_achat" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Immobilisations
						if ((id>=7) && (id<=15)) {
							$( "#list_Immo" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Stocks
						if ((id>=16) && (id<=20)) {
							$( "#list_Stock" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Paie
						if ((id>=21) && (id<=25)) {
							$( "#list_Paie" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Tresoreries
						if ((id>=26) && (id<=33)) {
							$( "#list_Treso" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Ventes
						if ((id>=37) && (id<=42)) {
							$( "#list_Ventes" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Environnement de contrôles
						if ((id>=43) && (id<=44)) {
							$( "#list_Env" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Système d'information
						if ((id>=45) && (id<=46)) {
							$( "#list_SystInfo" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Fonds propres
						if ((id>=47) && (id<=49)) {
							$( "#list_FondProp" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Impôts et taxes
						if ((id>=50) && (id<=52)) {
							$( "#list_Impot" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Emprunts et dettes financières
						if ((id>=53) && (id<=55)) {
							$( "#list_Empr" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Debiteurs et crediteurs divers
						if ((id>=56) && (id<=60)) {
							$( "#list_DebCred" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Reporting
						if ((id>=61) && (id<=62)) {
							$( "#list_Report" ).append($(".operantCl  li input[type='checkbox']:checked").parent());
						}
						//Fin Annuler tâche par Niaina
						
						for(i=0;i<RetChecked.length;i++){
						
							 //alert(valChecked[i]);
							// alert(idRetChecked[i]);
						//$("#listTac"+idSelected).html($("#listTac"+idSelected).html()+'<li id="'+idChecked[i]+'"><input type="checkbox" id="'+idChecked[i]+'" class="classTach" value="'+valChecked[i]+'">'+valChecked[i]+"</li>");

						}
						
						
					  });
					  $(".operantCl  li input[type='checkbox']:checked").parent().remove();
					
			}
			
			
			
		</script>

	<input type="button" value="Enregistrer" onclick="EnregistrerMiss()" style="display:none"/>
		<p class="lab"><h3> Désignation des intervenants </h3></p>
					<div id="listExist" >
						<!--pour tout les operants-->
						<select id="optgroup" multiple="multiple">						
				
							<optgroup label="Auditeur">
								<?php
								$sqltoperan="SELECT UTIL_NOM,UTIL_ID FROM tab_utilisateur WHERE UTIL_STATUT=0";
								$repTO=$bdd->query($sqltoperan);	
								while($donneTo=$repTO->fetch()){
								$NomUtil=$donneTo["UTIL_NOM"];
								$IdUtil=$donneTo["UTIL_ID"];
								
								?>
								
								<option value="<?php echo $IdUtil; ?>"><?php echo $NomUtil ;?></option>
							<?php
						
							}
							?>
							
							</optgroup>
							
						</select>
					</div>
					<div id="dTache">
						<table >
							<tr>
								<td>
									<div id="dis_tach">Repartition des tâches</div>
								</td>
								<td>
									<img src="../icone/boutton-2.png" id="flech"/>
								</td>
							</tr>
						</table>
						<input type="button" value="Annuler" id="annulCM" class="txtGen"/>
					</div>
				<!--p id="annulCM">Annuler</p-->
	