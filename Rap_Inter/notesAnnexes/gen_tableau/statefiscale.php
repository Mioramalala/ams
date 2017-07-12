<?php
session_start();
	include_once "../../../connexion.php";
$sigle = $_SESSION['ENTREPRISE'];
$annee = $_SESSION['A'];
$idM = $_SESSION['idMission'];

	$sql = "select * FROM `tab_rubrique_fisc` where id_mission=".$idM;
	$req = $bdd->query($sql) or die($sql);
	// $i=1;
	if($req->rowCount()>0){
	while($data = $req->fetch())
	{
		$id = $data['id'];
		$resultat = $data['resultat'];
		$devise = $data['id_devise'];
		$montant = $data['montant'];
		$impots = $data['impots'];
		$res_impots = $data['res_impots'];
	}
}else{
		$id ="";
		$resultat = "";
		$devise = "";
		$montant = "";
		$impots = "";
		$res_impots = "";
	}
?>
	<link   rel="stylesheet"       href="css/bootstrap/css/bootstrap.css">
	<link   rel="stylesheet"       href="Rap_Inter/notesAnnexes/assets/css/main.css">
	<script type="text/javascript" src="css/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="css/bootstrap/js/bootstrap.js"></script>
<body>
	<div id="GranTitre" class="panel-header">SITUATION FISCALE</div>
	<div id="titreIndex">
		<form method="POST" action="Rap_Inter/notesAnnexes/php/ajoutfiscale.php" id="frm">
		<table>
			<tr class=""  height="40">
				<td ><label for="monnaie">Monnaie :</label></td> 
				<td ><select id="monnaie" name="monnaie" class="texte" ><option></option>
						<?php 
							$sql = "select * FROM `tab_rubrique_devise` ";
							$req = $bdd->query($sql) or die($sql);
							// $i=1;
							while($data = $req->fetch())
							{
								if($data['id'] ==  $devise) $check = "selected";
								else $check = "";
								echo "<option value='".$data['id']."' ".$check." >".$data['monnaie']."</option>";
							}
							?>

				</select></td> 
			</tr>
			<tr class=""  height="40">
				<td ><label for="fiscal">Résultat fiscal :</label></td> 
				<td ><select id="fiscal" name="fiscal" class="texte"><option></option><option value="bénéficiaire" <?php if($resultat ==  "bénéficiaire") echo "selected"; ?> >bénéficiaire</option><option value="déficitaire" <?php if($resultat ==  "déficitaire") echo "selected"; ?> >déficitaire</option></select></td> 
			</tr>
			<tr class=""  height="40">
				<td ><label for="montant">MONTANT :</label></td> 
				<td ><input text="text" id="montant" name="montant" placeholder="montant en chiffre" class="texte" value="<?php echo $montant; ?>" ></td> 
			</tr>
			<tr class=""  height="40">
				<td ><label for="impots">IMPÔTS :</label></td> 
				<td ><input text="text" id="impots" name="impots" placeholder="montant en chiffre" class="texte" value="<?php echo $impots; ?>"><br> <input type="checkbox" id="minimum" name="minimum"  <?php if($res_impots ==  "on") echo "checked"; ?> >&nbsp;<label for="minimum"> minimum d'impôt </label></td> 
			</tr>
			<tr><td colspan="2">
			<h5>Aperçu : </h5>
		<div id="apercu">Pour l’exercice <?php echo $annee ?>, la société <?php echo $sigle ?> fait ressortir un résultat fiscal <span id="resfiscal"> déficitaire </span> de <span id="resmonnaie"> Ariary </span> <span id="resmontant"> 6 135 136 869,95 </span>; elle doit un <span id="resminimum">minimum d’impôts</span> s’élevant à <span id="resmonnaie2"> Ariary </span> <span id="resimpots"> 623 825 621,84</span>.</div></td></tr>
		</table>
		<div class="panel-footer">
			<button id="btn-preview" class="btn btn-default">Retour</button>
			<button id="btn-devise" class="btn btn-default">Ajout Devise</button>
			<button id="enregistrer" class="btn btn-primary">Enregistrer</button><input id="reset" type="reset" class="btn btn-primary" value="Annuler">
		</div>
		</form>
	</div>
</body>

<script type="text/javascript">
	<!--
// $(function(){
var minimum = "";
var fiscal  = "";
var monnaie = "";
var montant = "";
var	impots  = "";

		// alert(minimum);

	//suivant attribution rubrique
	$("#btn-preview").click(function(){
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_produit.php");
		return false;
	});
	$("#btn-devise").click(function(){
		$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/ajout_devise.php");
		return false;
	});
	//suivant attribution
	$("#fiscal").change(function(){
		text = $('#fiscal option:selected').text() ;
		$("#resfiscal").text(text);
	});
	$('#monnaie').change(function() {
		text = $('#monnaie option:selected').text() ;
		$("#resmonnaie").text(text);
		$("#resmonnaie2").text(text);
	});
	$('#montant').keyup(function() {
		$("#resmontant").text($(this).val());
	});
	$('#minimum').change(function() {
		if($('#minimum').is(':checked'))
			$("#resminimum").text(" minimum d'impôt ");
		else
			$("#resminimum").text(" impôt ");
	});
	$('#impots').keyup(function() {
		text = $('#impots').val() ;
			$("#resimpots").text(text);
	});
	// //enregistre le tableau pour notes annexes
	$("#enregistrer").click(function(){

		fiscal  = $('#fiscal option:selected').val() ;
		monnaie = $('#monnaie option:selected').val() ;
		montant = $('#montant').val();
		impots  = $("#impots").val();
		if($('#minimum').is(':checked'))minimum = 'on';
		else minimum = 'off';
		// alert(monnaie);
		// alert(fiscal);
		// return false;

		// var da = $('frm').serialize();
			// console.log(libelle);
			if(fiscal !="" && monnaie !="" && montant !="" && impots !="")
			{
				$.ajax({
					type: "post",
					url: "Rap_Inter/notesAnnexes/php/ajoutfiscale.php",
					data: {fiscal:fiscal, monnaie:monnaie, montant:montant, minimum:minimum, impots:impots},
					// data : da,
					success: function(e){
						alert(e);
						$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_etat_fi.php");
					},
					error: function(){
						alert("Pouf... Erreur: inattendue!");
					}
				});
			}else
			alert("Veuillez renseigner les informations indisponsables.");
	return false;
	});
// });

	//-->
</script>