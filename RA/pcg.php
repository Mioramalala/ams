<?php
@session_start();
$_SESSION['objectif']='Plan comptable';

$mission_id=@$_SESSION['idMission'];
$choix_plan=@$_POST['choix_plan'];
?>
	<link rel = "stylesheet" href = "../RA/css_RA.css"/>
	<script type="text/javascript">
	// Droit cycle by Tolotra
    // Page : RA -> Données financière -> Structure plan comptable
    // Tâche : Revue Cotrôles ventes, numéro 37
    var disabled = false;
    $.ajax(
        {
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 2},
            success: function (e) {
                var result = 0 === Number(e);
                disabled = result;
                $("#id_val").attr('disabled', result);
                if (result) {
                    $(".modif_btn").css('color', '#DDD');
                    $('#id_val').css({"background-color": "#DDD", "color": "#FFF"});
                }
            }
        }
    );
	//FONCTION COMPTE COCNCERNES
	$(function(){
		
		// alert("le script fonctionne ");
		
		$('#labModif').click(function(){
		var idbal=$('#idBalGen').val();
		});
		
		$('#btretour').click(function(){
				$('#contenue').load('RA/donnees_financiers.php?mission_id='+<?php echo $mission_id; ?>);			
			});	

		$('#dv_retour').click(function(){
			$('#contenue').load('RA/pcg.php?mission_id='+<?php echo $mission_id; ?>);			
		});	
	});
	var choix_plan='';
	var vali1='';
	var vali4='';
	var m='';
	function choixplan1()
			{
				
				choix_plan=$('#dv_plan').val();	
				$.ajax({
					type:'POST',
					url:'RA/pcg.php',
					data:{choix_plan:choix_plan},
					success:function(e){
						// alert(e);
						$("#contenue").html(e);
						$('#dv_plan').val(choix_plan);
					}
				});
			}
			
		function makaid(ct,comp){
			//var idBal="idBalGen"+comp;
		var td1=$("#id_bal1"+ct).html();
		var td2=$("#id_bal4"+ct).html();
		var td11=$("#id_bal_gen1"+ct).html();
		var td22=$("#id_bal_gen4"+ct).html();
		var group=$("#gr"+ct).html();
		var cyc=$("#td_cycle"+ct).html().trim();
		$("#nomenk").hide();
		$("#manova").show();

		$("#groupModif").html(group);

		$("#dv_txt3").val(cyc);

		$("#dv_txt1").val(td1);
		$("#dv_txt2").val(td2);
		
		$("#dv_txt1").val(td11);
		$("#dv_txt2").val(td22);
		

		//$('#dv_txt3').val(cyc).prop('selected', true); 

		$("#dv_c").val(ct);
		}
		
		function ok(){
			var c=$("#dv_c").val();
			var grp=$("#groupModif").html();
			var txt1=$("#dv_txt1").val();
			var txt2=$("#dv_txt2").val();
			var txt3=$("#dv_txt3").val();
			$("#nomenk").show();
			$("#manova").hide();
			$("#id_bal1"+c).html(txt1);
			$("#id_bal_gen1"+c).html(txt1);
			$("#id_bal_gen4"+c).html(txt2);
			$("#gr"+c).html(grp);
			$("#td_cycle"+c).html(txt3);	
		}
			
//////////////////////////validation et insertion///////////////////////////	
	
		function valideko(){
			waiting();

			var nb=$("#pnbr").val();
			//alert(nb);
			var i = 0;
				for(i=0;i<nb;i++){
					
					vali1=$('#id_bal1'+i).html() == null ? $('#id_bal_gen1'+i).html() : $('#id_bal1'+i).html();
					vali2=$('#id_bal4'+i).html() == null ? $('#id_bal_gen4'+i).html() : $('#id_bal4'+i).html();  
					vali3=$('#gr'+i).html();  
					vali4=$('#td_cycle'+i).html(); 
					id=$("#id_bal_gen_mission"+i).val();
					// console.log(id);
						console.log(vali1+vali2+vali3+vali4+id);
						if(vali1 != null && vali2 != null && vali3 != null && vali4 != null){
							$.ajax({
								type:"post",
								url:"RA/validationBalGen.php",
								data:{a:vali1,b:vali2,c:vali3,d:vali4,id:id},
								success:function(e){
									//alert(e);
								}
							});
						}
						
				}
				// alert("ok");
				$("#contenue").load("RA/pcg.php?mission_id=<?php echo $_SESSION['mission_id'] ?>", function(){
					stopWaiting();
				});
				///////////////////////////////ato point show////////////////
		}

		</script>
		<div id="nomenk">
		<br/>
			<input type = "button" id= "btretour" class="bouton-blanc" value = "Retour" style = "float:right" /><br/>
			<center><label style="font-size:14"><b>Définition de la nomenclature des comptes</b> </label></center><br/>
			<!-- <h1><?php echo "choix : ".$choix_plan ?></h1> -->
		<div>	
			<table class="table_pcg" width="1000" border="1">
				<tr>
					<td width="300" style="border:1px solid silver; background-color:#efefef;">PLAN DE COMPTES A 
						<select id = 'dv_plan' onchange = "choixplan1()" >
							<option></option>
							<option value="1" id="val1">1</option>
							<option value="2" id="val2">2</option>
							<option value="3" id="val3">3</option>
							<option value="4" id="val4">4</option>
							<option value="5" id="val5">5</option>
							<option value="6" id="val6">6</option>
							<option value="7" id="val7">7</option>
							<option value="8" id="val8">8</option>
							<option value="9" id="val9">9</option>
							<option value="10" id="val10">10</option>
							<option value="11" id="val11">11</option>
							<option value="12" id="val12">12</option>
						</select> 
						DIGITS
					</td>
					<td width="300" style="border:1px solid silver; background-color:#efefef;"></td>
					<td width="420" style="border:1px solid silver; background-color:#efefef;"><input type = "button" class="bouton-blanc" value="Valider" id="id_val" onclick="valideko()"/></td>
				</tr>
				<tr>
					<td width="300" style="background-color:#2ca3f3; font-weight:bold;"><label style="color:white">Comptes concernés <br/>de &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;à<label> </td>
					<td width="300" style="background-color:#2ca3f3; font-weight:bold;"><label style="color:white">Groupe de comptes</td>
					<td width="420" style="background-color:#2ca3f3; font-weight:bold;"><label style="color:white">Cycles</td>
				</tr>	
			</table>
		</div>
		<div id="div_pcg">
		<form name="frm_balancegnrl"  class="frm_balancegnrl" action="validerpcg.php" method="POST">
		<!--form-->
			<table class="table_pcg" width="980">
				<?php
					include '../connexion.php';
					$max=$bdd->query('SELECT COUNT(BALANCE_GENERAL_ID) AS m from tab_balance_general');
					$valiny=$max->fetch();?>
					
					<input type id="pnbr" style="display:none" value="<?php echo $valiny['m'];?>"/>
				<?php
					$reqNbrres = $bdd->query('SELECT count(*) as nbr_res FROM tab_bal_gen_mission WHERE id_mission='.$mission_id);
					$reponse = $bdd->query('SELECT id_bal_gen_miss,compt1,compt2,groupBal,cycle FROM tab_bal_gen_mission WHERE id_mission='.$mission_id);
					$compte=0;
					$donnees = $reqNbrres->fetch();
					$nbr_res=$donnees["nbr_res"];
		if($nbr_res>0)
		{		
			while ($donnees = $reponse->fetch()){
						$bal_gen1=$donnees['compt1'];
						$bal_gen4=$donnees['compt2'];
						$bal_gen2=$donnees['groupBal'];
						$bal_gen3=$donnees['cycle'];
					 if($bal_gen1!="" && $bal_gen4!=""){
					 	if($choix_plan!=0){
							$bal_gen1=substr($bal_gen1,0,$choix_plan);
							$bal_gen4=substr($bal_gen4,0,$choix_plan);
						}
					 				 
					?>
					<script type="text/javascript">
						$(function(){
							//alert("azert");
							var id_bal_gen=$("#id_bal_gen11").html();
							var nombre=(id_bal_gen.length)-2;
							
							//alert(id_bal_gen+" / "+nombre);
							$("#dv_plan").val(nombre);
							
							if (nombre <= 12){
								//$('#id_val').hide();
								//document.getElementById("dv_plan").setAttribute("disabled","disabled");
							}
						});
					</script>
						<tr id="idBalGen<?php echo $compte;?>" value="<?php echo $donnees['id_bal_gen_miss'];?>">
							<input type ="text" value="<?php echo $donnees['id_bal_gen_miss']?>"  style="display:none"/>
							<td class="" width="150" id="id_bal_gen1<?php echo $compte;?>"><?php echo $bal_gen1;?> </td>
							<td width="150" id="id_bal_gen4<?php echo $compte;?>"><?php echo $bal_gen4;?> </td>
							
							<td width="320" id="gr<?php echo $compte;?>"><?php echo $bal_gen2;?></td>
							<td id="td_cycle<?php echo $compte;?>" style ="width:370;display:block"><?php echo $bal_gen3;?></td>
							<td width="50" onclick="makaid(<?php echo $compte;?>,<?php echo $donnees['id_bal_gen_miss'];?>)"><label id="labModif" style ="color:#2ca3f3; font-weight: bold;">Modifier</label><td>
							<input type="hidden" id="id_bal_gen_mission<?php echo $compte;?>" value="<?php echo $donnees['id_bal_gen_miss']  ?>">
						</tr>
					
				<?php 
					 }
					$compte++;
				 }//FIN WHILE
	}//FIN IF 
	else
	{
			//check if there are other missions	
			$missions_q = $bdd->query('SELECT MISSION_ID FROM tab_mission WHERE ENTREPRISE_ID='.$_SESSION["id_Entre"]);
			$missions = $missions_q->fetchAll();
			$found = 0;
			foreach ($missions as $key => $value) {
				if ($value["MISSION_ID"] != $mission_id){
					$found=1;
					$new_mission_id = $value["MISSION_ID"];
					break;
				} 
			}

				if($found == 1){
				
					$reponse = $bdd->query('SELECT id_bal_gen_miss,compt1,compt2,groupBal,cycle FROM tab_bal_gen_mission WHERE id_mission='.$new_mission_id);
					
					$nb_rep = count($reponse->fetchAll());
					if(count($donnees1) == 0){
						$reponse = $bdd->query('SELECT BALANCE_GENERAL_ID,BALANCE_GENERAL_COMPTE_CONCERNE,BALANCE_GENERAL_COMPTE_CONCERNE2,BALANCE_GENERAL_GROUPES,BALANCE_GENERAL_CYCLE FROM tab_balance_general');
				}

				}else{
					 $reponse = $bdd->query('SELECT BALANCE_GENERAL_ID,BALANCE_GENERAL_COMPTE_CONCERNE,BALANCE_GENERAL_COMPTE_CONCERNE2,BALANCE_GENERAL_GROUPES,BALANCE_GENERAL_CYCLE FROM tab_balance_general');
				}

			
					$compte1=0;
					while ($donnees1 = $reponse->fetch())
					{
						$bal1=$donnees1['BALANCE_GENERAL_COMPTE_CONCERNE'] ? $donnees1['BALANCE_GENERAL_COMPTE_CONCERNE'] : $donnees1['compt1'];
						$bal4=$donnees1['BALANCE_GENERAL_COMPTE_CONCERNE2'] ? $donnees1['BALANCE_GENERAL_COMPTE_CONCERNE2'] : $donnees1['compt2'];
						$bal2=$donnees1['BALANCE_GENERAL_GROUPES'] ? $donnees1['BALANCE_GENERAL_GROUPES'] : $donnees1['groupBal'] ;
						$bal3=$donnees1['BALANCE_GENERAL_CYCLE'] ? $donnees1['BALANCE_GENERAL_CYCLE'] : $donnees1['cycle'] ;
							global $choix_plan;
						if($choix_plan!=0){
							$bal1=substr($bal1,0,$choix_plan);
							$bal4=substr($bal4,0,$choix_plan);
						}
				?>
				<!-- <tr id="idBalGen<?php echo $compte1;?>" value="<?php echo $donnees1['BALANCE_GENERAL_ID'];?>"> -->
				<tr id="idBalGen<?php echo $compte1;?>" >
					<!-- <input type ="text" value="<?php echo $donnees1['BALANCE_GENERAL_ID']?>"  style="display:none"/> -->
					<td width="150" id="id_bal1<?php echo $compte1;?>"><?php echo $bal1;?> </td>
					<td width="150" id="id_bal4<?php echo $compte1;?>"><?php echo $bal4;?> </td>

					<td width="320" id="gr<?php echo $compte1;?>"><?php echo $bal2;?></td>
					<td id="td_cycle<?php echo $compte1;?>" style ="width:370;display:block"><?php echo $bal3;?></td>
					<td width="50"  onclick="makaid(<?php echo $compte1;?>,<?php echo $donnees1['BALANCE_GENERAL_ID'];?>)"><label id="labModif" style ="color:#2ca3f3; font-weight: bold;">Modifier</label><td>
					<input type="hidden" id="id_bal_gen_mission<?php echo $compte;?>" value="<?php echo $donnees['id_bal_gen_miss']  ?>">
				</tr>
				<?php
					$compte1++;
			}//FIN WHILE
} 
?>
			</table>
		</form>
</div>
</div>
<div id="manova" style="display:none; margin-top:50px;">
<form class="form-style">
	<table style=" width:500px; height:200px;">	
			<tr>
				<td id="groupModif"></td>
			</tr>
			<tr>
				<td>Modifier le numéro des comptes de:</td>
				<td><input type = "text" id ="dv_txt1"  /></td>
			</tr>
			<tr>
				<td>Modifier le numéro des comptes à:</td>
				<td><input type = "text" id ="dv_txt2"  /></td>
			</tr>
			<tr>
				<td>Modifier le cycle:</td>
				<td>
				<!-- <input type = "text" id ="dv_txt3"  /> -->
				<select id ="dv_txt3">
					<option value="A- Fonds propres">A- Fonds propres</option>
					<option value="B- Immobilisations incorporelles et corporelles">B- Immobilisations incorporelles et corporelles</option>
					<option value="C- Immobilisations financières">C- Immobilisations financi&egrave;res</option>
					<option value="D- Stocks">D- Stocks</option>
					<option value="E- Trésoreries">E- Tr&eacute;soreries</option>
					<option value="F- Charges fournisseurs">F- Charges fournisseurs</option>
					<option value="G- Produits Clients">G- Produits Clients</option>
					<option value="H- Paie et Personnel">H- Paie et Personnel</option>
					<option value="I- Impôts et taxes">I- Imp&ocirc;ts et taxes</option>
					<option value="K- Débiteurs et créditeurs divers">K- D&eacute;biteurs et cr&eacute;diteurs divers</option>
					<option value="J- Emprunts et dettes financières">J- Emprunts et dettes financi&egrave;res</option>
				<select>
				</td>
			</tr>
			<input type id="dv_c" style="display:none"; />
			<tr>
				<td><input type = "button" class="bouton-blanc" id ="Valid_modif" value = "Valider" onclick="ok()"/></td>
				<td><input type = "button" class="bouton-blanc" id ="dv_retour" value = "Retour" onclick="valider()" /></td>
			</tr>
		</table>
</form>
</div>