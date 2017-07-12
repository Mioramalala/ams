<?php include'../connexion.php';
$list=$_POST['list'];
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
					
			/////////////////////////////////////////////////////////////////////////////////////////////////////
			
				$('#optgroup').multiSelect({
				  selectableHeader: "<div class='custom-header'>Element disponible </div>",
				  selectionHeader: "<div class='custom-header'>L'équipe </div>"
				  
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
					alert("ndana mfidy");
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
							url:"entreprise/distribution_tache.php",
							data:transfer+'&listIdSel[]='+transferIdSel,
							success:function(e){
								$("#ListOP").html(e);
								// $("#ListOP").hide();
								// $("#tach_div").show();
							}
						
						});
					
				
				
				});
				
			
				$("#annulCM").click(function(){
						// alert("nnn");
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
			function addTache(valId){
				alert("cc1");
					var valChecked = [];
					var idChecked = [];
					 $(".list_tach li input[type='checkbox']:checked").each(
						  function() {
						  alert("cc2");
							 valChecked.push($(this).attr('value'))
							 idChecked.push($(this).attr('id'));
							 $("ul.list_tach li#"+$(this).attr('id')).remove();
								// console.log(bbb);
						  }); 
						  
						  return false;
						  //alert(valChecked+' '+valId);
						  var valTransfert = new Array();
						  valTransfert="valTransfert=true";
						  valTransfert = valTransfert+'&listvalChecked[]='+valChecked;
						  $.ajax({
								type:"POST",
								url:"entreprise/test.php",
								data:valTransfert+'&envoi='+valId,
								success:function(e){
								$("#listTac"+valId).html(e)
									//$("#list_tache_cycle").html(e);
								}
								
						  });

			}
	
			
			function EnregistrerMiss(){
					var typeM=$("#typeMiss").val();
					var AnneM=$("#txtAnnMiss").val();
					var SupM=$("#Superv").val();
					var DebuM=$("#txtdateD").val();
					var ClozM=$("#txtdateC").val();
					var IdEntr=$("#txtIdEntr").val();
					// alert(typeM);
			if(DebuM!='' && ClozM!=''){
				
					$.ajax({
						type:"POST",
						url:"entreprise/saveMission.php",
						data:{a:typeM,z:AnneM,e:SupM,r:DebuM,t:ClozM,y:IdEntr},
						success:function(e){
																		
						}
					
					
					});
				}
				else{
				jQuery.facebox({ ajax: '../alert/cazVid.php' });
				
				}
			
			
			}
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
						 $("ul.list_Tache li#"+$(this).attr('id')).remove();
							
					  }); 
					  i=0;
					  
					  for(i=0;i<valChecked.length;i++){
					  // alert(valChecked[i]);
					  //$("valChecked[i]").prependTo($("#listTac"+idSelected));
						$("#listTac"+idSelected).html($("#listTac"+idSelected).html()+'<input type="checkbox" id="'+idChecked[i]+'" class="classTach" value="'+valChecked[i]+'">'+valChecked[i]+"</br>");
							
						}
						nbr=$("#listTac"+idSelected+" .classTach").length;
						// alert(nbr)
						if (nbr>0)
						$("#labNbr"+idSelected).show();
						$(".nbr_tach."+idSelected).html(nbr);
			}
			
			
			function closeMe(idSelected){
			
				$("#listTac"+idSelected).hide();
			
			}
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		</script>

	<input type="button" value="Enregistrer" onclick="EnregistrerMiss()" style="display:none"/>
		<p class="lab"><h3> Définition de l'équipe </h3></p>
					<div id="listExist" >
						<!--pour tout les operants-->
						<select id="optgroup" multiple="multiple">
						
						<optgroup label="Auditeurs">
								<?php
								$sqltoperan="SELECT UTIL_NOM,UTIL_ID FROM tab_utilisateur WHERE UTIL_ID IN ($list)";
								
								
								$repTO=$bdd->query($sqltoperan);	
								while($donneTo=$repTO->fetch()){
								$NomUtil=$donneTo["UTIL_NOM"];
								$IdUtil=$donneTo["UTIL_ID"];
								?>
								<option value="<?php echo $IdUtil; ?>" selected> <?php echo $NomUtil;?></option>

							<?php
						
							}
							?>
						</optgroup>
						
							<optgroup label="Auditeurs">
								<?php
								$sqltoperan="SELECT UTIL_NOM,UTIL_ID FROM tab_utilisateur WHERE UTIL_ID NOT IN ($list)";
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
					</div>
				
	