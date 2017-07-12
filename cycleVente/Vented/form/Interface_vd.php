<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



$sql='SELECT count(*) AS nb FROM tab_conclusion WHERE CYCLE_ACHAT_ID=28 AND MISSION_ID='.$mission_id;
//print ($sql);
$verif=$bdd->query($sql);
$res_=$verif->fetch();
$valideVenteD=$res_["nb"];

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/cssSousmenueCycle.css" rel="stylesheet" type="text/css" />
<script language="javascript">
$(function()
{


	<?php
	//FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	if($valideVenteD==1)
	{

	?>
	$('#contvd textarea').attr('disabled',true);
	$('#contvd  :input[type=radio]').attr('disabled',true);
	$('#contvd  #Synthese_vd_Terminer').attr('disabled',true);
	<?php
	}
	//FIN FUNCTION DESACTIVATION DES INPUT RADIO ET TEXTAREA  DES FENETRE LORQUE LOBJECTIF EST DEJA VALIDER
	?>

	// Droit cycle by Tolotra
    // Page : RSCI -> Cycle ventes
    // Tâche : Revue Cotrôles ventes, numéro 37
    $.ajax({
        type: 'POST',
        url: 'droitCycle.php',
        data: {task_id: 37},
        success: function (e) {
            var result = 0 === Number(e);
            $("#Int_vd_Synthese").attr('disabled', result);
            $("#Int_vd_Continuer").attr('disabled', result);
        }
    });
    
	// Bouton retour menu achat
	$('#int_vd_Retour').click(function(){
		$('#message_fermeture_vd').show();
		$('#fancybox_vd').show();
	});
	//Con$tinuer la question
	$('#Int_vd_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id_vd").value;
		$.ajax({
			type:'POST',
			url:'cycleVente/Vented/php/aff_quest_fin_vd.php',
			data:{mission_id:mission_id},
			success:function(e){
				
					quetion_vd="#Question_vd_"+e;
					$(quetion_vd).fadeIn(500);
					vd=e;
					$.ajax({
						type:'POST',
						url:'cycleVente/Vented/php/getRepContinuer.php',
						data:{mission_id:mission_id, questId:e, cycleId:28},
						success:function(e1){
							eo=""+e1+"";
							doc=eo.split(',');
							cpt=1;
							for(i=351; i<385; i++){ 
								if(i==vd){
									vdId="vd_"+cpt;
									vdIdCom="vd"+cpt;
									afficheReponseQuest(vdId,vdIdCom);
									break;
								}
								cpt++;
							}
							
						}
					});
				// }
				$('#dv_table_vd').show();
				$('#lb_veuillez_aff_vd').hide();
				$('#fancybox_vd').show();
			}
		});
	});
	//la synthèse de vd
	$('#Int_vd_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id_vd").value;
		
		// se rediriger vers calcul score
		$.ajax({
			type:'POST',
			url:'cycleVente/Vented/php/select_score_vd.php',
			data:{mission_id:mission_id},
			success:function(e){
			    $("#echo_score_vd").html(e);
			}			
		});
		
		$.ajax({
			type:'POST',
			url:'cycleVente/Vented/php/cpt_vd.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==35){
					$.ajax({
						type:'POST',
						url:'cycleVente/Vented/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:28},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_vd_Faible").checked=false;
							document.getElementById("rd_Synthese_vd_Moyen").checked=false;
							document.getElementById("rd_Synthese_vd_Eleve").checked=false;
							document.getElementById("txt_Synthese_vd").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_vd_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_vd_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_vd_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_vd').show();
					$('#fancybox_vd').show();
				}
				else{
					$('#fancybox_vd').show();
					$('#mess_vide_obj_vd').show();
				}
			}
		});
	});
});
function afficheReponseQuest(vdId,vdIdCom){
	document.getElementById("rad_Question_Oui_"+vdId).checked=false;
	document.getElementById("rad_Question_NA_"+vdId).checked=false;
	document.getElementById("rad_Question_Non_"+vdId).checked=false;
	if(doc[0]==0){
		document.getElementById("commentaire_Question_"+vdIdCom).value="";
	}
	else
		document.getElementById("commentaire_Question_"+vdIdCom).value=doc[0];
	if(doc[1]=='OUI'){
		document.getElementById("rad_Question_Oui_"+vdId).checked=true;
	}
	else if(doc[1]=='N/A'){
		document.getElementById("rad_Question_NA_"+vdId).checked=true;
	}
	else if(doc[1]=='NON'){
		document.getElementById("rad_Question_Non_"+vdId).checked=true;
	}
}
</script>

<div id="int_vd">


       


<label class="lb_veuillez" id="lb_veuillez_aff_vd"><br />Veuillez répondre aux questions suivantes par OUI, N/A ou NON</label><br />
	<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id_vd" style="display:none;" />
	<div id="Interface_Question_vd"><?php include 'cycleVente/Vented/load/load_quest_vd.php'; ?></div>
	<div id="dv_table_vd" style="float:left;display:none;width:80%;">
	<table class="label" id="lb_vd">
		<tr>
			<td width="60%">Question</td>
			<td width="10%">Commentaire</td>
		</tr>
	</table>
	</div>
	<div id="frm_tab_res_vd"></div>
	<div id="Int_Droite_vd">
		<input type="button" class="bouton" value="Retour" id="int_vd_Retour" /><br />
		<input type="button" class="bouton" value="Continuer" id="Int_vd_Continuer" /><br />
		<input type="button" class="bouton" value="Synthèse" id="Int_vd_Synthese" /><br />
		<span class="label">
			Pour modifier la réponse à une question, veuillez cliquer sur la liste		
		</span>
		
	</div>
	<!--**********************************Interface du fancybox****************************-->
	<div id="fancybox_vd"></div>
	<!--***********************************************************************************-->
	<!--div id="int_Bouton_Interface_B" align="center">

	</div-->
	<div id="Question_vd_351" data-options="handle:'#dragg_351'" align="center">
<div id="dragg_351" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°01/35
			<input type="button" style="width:10px;height:15px;background-color:#ccc" />
			<input type="button" style="width:220px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_vd_1.php';?></div>
	<div id="Question_vd_352" data-options="handle:'#dragg_352'" align="center">
<div id="dragg_352" >
		<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°02/35
				<input type="button" style="width:20px;height:15px;background-color:#ccc" />
				<input type="button" style="width:210px;height:15px;background-color:#efefef" />
			</td>
		</tr>
		</table></div>
	<?php include 'Interface_Question_vd_2.php';?></div>
	<div id="Question_vd_353" data-options="handle:'#dragg_353'" align="center">
<div id="dragg_353" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°03/35
				<input type="button" style="width:30px;height:15px;background-color:#ccc" />
				<input type="button" style="width:200px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_3.php';?></div>
	<div id="Question_vd_354" data-options="handle:'#dragg_354'" align="center">
<div id="dragg_354" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°04/35
				<input type="button" style="width:40px;height:15px;background-color:#ccc" />
				<input type="button" style="width:190px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_4.php';?></div>
	<div id="Question_vd_355" data-options="handle:'#dragg_355'" align="center">
<div id="dragg_355" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°05/35
				<input type="button" style="width:50px;height:15px;background-color:#ccc" />
				<input type="button" style="width:180px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_5.php';?></div>
	<div id="Question_vd_356" data-options="handle:'#dragg_356'" align="center">
<div id="dragg_356" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°06/35
				<input type="button" style="width:60px;height:15px;background-color:#ccc" />
				<input type="button" style="width:170px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_6.php';?></div>
	<div id="Question_vd_357" data-options="handle:'#dragg_357'" align="center">
<div id="dragg_357" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°07/35
				<input type="button" style="width:70px;height:15px;background-color:#ccc" />
				<input type="button" style="width:160px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_7.php';?></div>
	<div id="Question_vd_358" data-options="handle:'#dragg_358'" align="center">
<div id="dragg_358" >
	<table width="500">
		<tr>
				<td class="td_Titre_Question" align="center">QUESTION N°08/35
					<input type="button" style="width:80px;height:15px;background-color:#ccc" />
					<input type="button" style="width:150px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_8.php';?></div>
	<div id="Question_vd_359" data-options="handle:'#dragg_359'" align="center">
<div id="dragg_359" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°09/35
				<input type="button" style="width:90px;height:15px;background-color:#ccc" />
				<input type="button" style="width:140px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_9.php';?></div>
	<div id="Question_vd_360" data-options="handle:'#dragg_360'" align="center">
<div id="dragg_360" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°10/35
				<input type="button" style="width:100px;height:15px;background-color:#ccc" />
				<input type="button" style="width:130px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_10.php';?></div>
	<div id="Question_vd_361" data-options="handle:'#dragg_361'" align="center">
<div id="dragg_361" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°11/35
				<input type="button" style="width:110px;height:15px;background-color:#ccc" />
				<input type="button" style="width:120px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_11.php';?></div>
	<div id="Question_vd_362" data-options="handle:'#dragg_362'" align="center">
<div id="dragg_362" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°12/35
				<input type="button" style="width:120px;height:15px;background-color:#ccc" />
				<input type="button" style="width:110px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_12.php';?></div>
	<div id="Question_vd_363" data-options="handle:'#dragg_363'" align="center">
<div id="dragg_363" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°13/35
				<input type="button" style="width:165px;height:15px;background-color:#ccc" />
				<input type="button" style="width:100px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_13.php';?></div>
	<div id="Question_vd_364" data-options="handle:'#dragg_364'" align="center">
<div id="dragg_364" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°14/35
				<input type="button" style="width:140px;height:15px;background-color:#ccc" />
				<input type="button" style="width:90px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_14.php';?></div>
	<div id="Question_vd_365" data-options="handle:'#dragg_365'" align="center">
<div id="dragg_365" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°15/35
				<input type="button" style="width:167px;height:15px;background-color:#ccc" />
				<input type="button" style="width:80px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_15.php';?></div>
		<div id="Question_vd_366" data-options="handle:'#dragg_366'" align="center">
<div id="dragg_366" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°16/35
				<input type="button" style="width:160px;height:15px;background-color:#ccc" />
				<input type="button" style="width:70px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_16.php';?></div>
	<div id="Question_vd_367" data-options="handle:'#dragg_367'" align="center">
<div id="dragg_367" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°17/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_17.php';?></div>
		<div id="Question_vd_368" data-options="handle:'#dragg_368'" align="center">
<div id="dragg_368" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°18/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_18.php';?></div>
		<div id="Question_vd_369" data-options="handle:'#dragg_369'" align="center">
<div id="dragg_369" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°19/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_19.php';?></div>
		<div id="Question_vd_370" data-options="handle:'#dragg_370'" align="center">
<div id="dragg_370" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°20/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_20.php';?></div>
		<div id="Question_vd_371" data-options="handle:'#dragg_371'" align="center">
<div id="dragg_371" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°21/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_21.php';?></div>
		<div id="Question_vd_372" data-options="handle:'#dragg_372'" align="center">
<div id="dragg_372" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°22/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_22.php';?></div>
		<div id="Question_vd_373" data-options="handle:'#dragg_373'" align="center">
<div id="dragg_373" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°23/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_23.php';?></div>
		<div id="Question_vd_374" data-options="handle:'#dragg_374'" align="center">
<div id="dragg_374" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°24/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_24.php';?></div>
		<div id="Question_vd_375" data-options="handle:'#dragg_375'" align="center">
<div id="dragg_375" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°25/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_25.php';?></div>
		<div id="Question_vd_376" data-options="handle:'#dragg_376'" align="center">
<div id="dragg_376" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°26/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_26.php';?></div>
		<div id="Question_vd_377" data-options="handle:'#dragg_377'" align="center">
<div id="dragg_377" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°27/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_27.php';?></div>
		<div id="Question_vd_378" data-options="handle:'#dragg_378'" align="center">
<div id="dragg_378" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°28/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_28.php';?></div>
		<div id="Question_vd_379" data-options="handle:'#dragg_379'" align="center">
<div id="dragg_379" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°29/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_29.php';?></div>

		<div id="Question_vd_380" data-options="handle:'#dragg_380'" align="center">
<div id="dragg_380" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°30/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_30.php';?></div>	
			<div id="Question_vd_381" data-options="handle:'#dragg_381'" align="center">
<div id="dragg_381" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°31/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_31.php';?></div>
			<div id="Question_vd_382" data-options="handle:'#dragg_382'" align="center">
<div id="dragg_382" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°32/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_32.php';?></div>
			<div id="Question_vd_383" data-options="handle:'#dragg_383'" align="center">
<div id="dragg_383" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°33/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_33.php';?></div>

			<div id="Question_vd_384" data-options="handle:'#dragg_384'" align="center">
<div id="dragg_384" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°34/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_34.php';?></div>
			<div id="Question_vd_385" data-options="handle:'#dragg_385'" align="center">
<div id="dragg_385" >
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°35/35
				<input type="button" style="width:170px;height:15px;background-color:#ccc" />
				<input type="button" style="width:60px;height:15px;background-color:#efefef" />
			</td>
		</tr>
	</table></div>
	<?php include 'Interface_Question_vd_35.php';?></div>


<!--****************************************Interface B Synthese conclusion********************************-->
<div id="Int_Synthese_vd" data-options="handle:'#dragg_vd'" align="center">
<div id="dragg_vd" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include 'cycleVente/Vented/form/Interface_vd_Synthese.php';?></div>
<!--*******************************************************************************************************-->

<!--***********************************Message de slide de la question terminer****************************-->
<div id="message_Slide_terminer_Question_vd"><?php include 'cycleVente/Vented/sms/Message slide question terminer vd.php'?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de la page B***********************************-->
<div id="message_fermeture_vd"><?php include 'cycleVente/Vented/sms/messRetvd.php'?></div>
<!--*******************************************************************************************************-->
<!--**********************************Interface de terminaison de question 22 A****************************-->
<div id="message_Terminer_question_vd"><?php include 'cycleVente/Vented/sms/Message terminer question vd.php'; ?></div>
<!--*******************************************************************************************************-->
<!--*************************************Message de terminaison de la synthese B***************************-->
<div id="message_Terminer_Synthese_vd"><?php include 'cycleVente/Vented/sms/Message terminer synthese vd.php';?></div>
<!--*******************************************************************************************************-->
<!--************************************Message d'enregistrement de la synthese B**************************-->
<div id="message_Synthese_Slide_vd"><?php include 'cycleVente/Vented/sms/Message slide vd Synthese.php';?></div>
<!--*******************************************************************************************************-->


<!--*************************************Message vide de synthese******************************************-->
<div id="mess_vide_synthese_vd"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_vide_synth_vd.php'; ?></div>
<!--*******************************************************************************************************-->


<!--**********************************Interface de fermeture de synthese B*********************************-->
<div id="message_Donnees_Perdu_vd"><?php include 'cycleVente/Vented/sms/Message donnees perdues vd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd"><?php include 'cycleVente/Vented/sms/Message annulation question vd.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd2"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd2.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd3"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd3.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd4"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd4.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd5"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd5.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd6"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd6.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd7"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd7.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd8"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd8.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd9"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd9.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd10"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd10.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd11"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd11.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd12"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd12.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd13"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd13.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd14"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd14.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd15"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd15.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_vd16"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd16.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd17"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd17.php';?></div>
<!--*******************************************************************************************************-->

<div id="message_fermeture_question_vd18"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd18.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd19"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd19.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd20"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd20.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd21"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd21.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd22"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd22.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd23"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd23.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_vd24"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd24.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd25"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd25.php';?></div>
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd26"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd26.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd27"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd27.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_vd28"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd28.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd29"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd29.php';?></div>

<div id="message_fermeture_question_vd30"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd30.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd31"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd31.php';?></div>
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd32"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd32.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd33"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd33.php';?></div>
<!--*******************************************************************************************************-->
<div id="message_fermeture_question_vd34"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd34.php';?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message de fermeture de toutes les question*************************-->
<div id="message_fermeture_question_vd35"><?php include 'cycleVente/Vented/sms/Message_enregistre_question_vd35.php';?></div>

<!--**********************************Message d'ouverture de l'objectif B**********************************-->
<!--div id="mess_ouvrir_question_objectif_B"><?php //include '../cycle_achat_message/Message_ouverture_question_B.php';?></div-->
<!--*******************************************************************************************************-->
<!--***********************************Message question vide***********************************************-->
<div id="mess_quest_vide_vd1"><?php include 'cycleVente/Vented/sms/Message_question_vide.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd2"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd2.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd3"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd3.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd4"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd4.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd5"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd5.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd6"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd6.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd7"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd7.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd8"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd8.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd9"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd9.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd10"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd10.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd11"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd11.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd12"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd12.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd13"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd13.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd14"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd14.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd15"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd15.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd16"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd16.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd17"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd17.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd18"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd18.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd19"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd19.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd20"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd20.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd21"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd21.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd22"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd22.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd23"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd23.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd24"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd24.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd25"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd25.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd26"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd26.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd27"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd27.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd28"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd28.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd29"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd29.php'; ?></div>
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd30"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd30.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd31"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd31.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd32"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd32.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd33"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd33.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd34"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd34.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************************Message question vide B2***********************************************-->
<div id="mess_quest_vide_vd35"><?php include 'cycleVente/Vented/sms/sms_empty/Mess_quest_vide_vd35.php'; ?></div>

<!--*************************************Message vide resultat b*******************************************-->
<div id="mess_vide_obj_vd"><?php include 'cycleVente/Vented/sms/mess_vid_aud_vd.php'; ?></div>
<!--*******************************************************************************************************-->

<!--*************************************MESSAGE QUESTIONNAIRE NON REMPLI POUR SYNTHESE********************-->
<div id="mess_vide_obj_vd"><?php include 'cycleVente/Vented/sms/mess_vid_aud_vd.php'; ?></div>
<!--*******************************************************************************************************-->

</div>