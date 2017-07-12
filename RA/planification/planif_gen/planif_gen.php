<?php
	session_start();
	$_SESSION['fonction']='Planification';
	include './../../../connexion.php';
	$mission_id=$_SESSION['idMission'];
?>
<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<style type="text/css">
    	#dv_planif_gen_RAborder
    	{
    		width:auto;
    		overflow:auto;
    		float:left;
    		margin:0;
    		padding:0;
    		border: solid 1px;
    	} 
    	#planif_fond_propre 
    	{
			height: 450px;
			background-color: #FFF;
			margin-top: -445px;
			overflow: auto;
			display: none;
		}
		#planif_stock
		{
			
			display: inline-block;;
		}
		

		</style>
		
		<script>
		$(document).ready(function (e)
		{



					var RA_PLANIF="";
					//CLICK DES MENUE
					$(".menu_planif").click(function (menue)
					{

						RA_PLANIF=$(this).attr("id");		
						$(".menu_planif").css("background-color","");
						$(".menu_planif").css("margin-left","");
						$(".menu_planif").css("width","");

						$(this).css("background-color","#6495ED");
						$(this).css("margin-left","-550px");
						$(this).css("width","230px");

						$('#planif_gen2').load('/RA/planification/planif_gen/Panel_contenuePlanif.php?PLANIF_CYCLE='+RA_PLANIF);
					});




					//CLICK BTN ENREGISTREMENT PLANIFICATION RA
					$("#planif_gen2").on("click","#btn_valideplanif",function(e)
					{
							datatransert=$("#frmPlanifgenRA").serializeArray();
							lientransfert=$("#frmPlanifgenRA").attr("action");

							$.post(lientransfert,datatransert,function (resplanif)
							{
								//alert(resplanif);
									$('#planif_gen2').load('/RA/planification/planif_gen/Panel_contenuePlanif.php?PLANIF_CYCLE='+RA_PLANIF,function (res)
										{
											 alert('Bien enregistr\351');
										});
									
									
							});

					})

					$(document).on("click","#btn_retour",function(e)
					{
							$('#contenue').load('/RA/planification/planification.php?mission_id='+<?php echo $mission_id;?>);

					})

				


		});	
		</script>
	</head>
<body>
	<input type="text" id="missId" value="<?php echo $mission_id;?>" style="display:none;" />
	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
		<tr><td style="color:white"><center>PLANIFICATION GENERALE</center></td></tr>
	</table>

	<form id="frmPlanifgenRA" action="/RA/planification/planif_gen/enregistrerplanif_gen_ra.php">
				<div  id="dv_planif_gen_RA" style="width:auto;">
								<div class="menu_planif" id='fond'><a href = "#" style="color:white">A. Fonds propres</a></div>
								
								<div class="menu_planif" id='immo'><a href = "#" style="color:white">B. Immobilisations corporelles et incorporelles</a></div>
							
								<div class="menu_planif" id='immofi'><a href = "#" style="color:white">C. Immobilisation Financieres</a></div>	
							
								<div class="menu_planif" id='stock'><a href = "#" style="color:white">D. Stocks</a></div>
							
								<div class="menu_planif" id='tresorerie'><a href = "#" style="color:white">E .Tresorerie</a></div>
							
								<div class="menu_planif" id='charge'><a href = "#" style="color:white">F. Charges fournisseurs</a></div>
							
								<div class="menu_planif" id='vente'><a href = "#" style="color:white">G. Ventes-Clients</a></div>
							
								<div class="menu_planif" id='paie'><a href = "#" style="color:white">H. Paie-Personnel</a></div>
							
								<div class="menu_planif" id='impot'><a href = "#" style="color:white">I. Impôts et taxes</a></div>
							
								<div class="menu_planif" id='emprunt'><a href = "#" style="color:white">J. Emprunts et dettes financières</a></div>
							
								<div class="menu_planif" id='dcd'><a href = "#" style="color:white">K. Débiteurs et créditeurs divers</a></div>	
				</div>	
			<div id="planif_gen2"  style="background-color:transparent; padding:0;"></div>
	</form>
		
</body>
</html>