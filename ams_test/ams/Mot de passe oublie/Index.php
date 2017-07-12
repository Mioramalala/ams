<html>
<head>
<title>Mot de passe AMS</title>

<link href="../Authentification/Authentification css/div.css" rel="stylesheet" type="text/css" />
<link href="../Authentification/Authentification css/class.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../Authentification/Authentification js/Authent plugins/jquery.js"></script>
<script type="text/javascript" src="../Authentification/Authentification js/Authent evenement.js"></script>
<script type="text/javascript" src="Mdp js/Mail evenement.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>
	<center>
		<div id="fond_General"><br /><br /><br /><br /><br /><br /><br /><br /><br />
			<label class="grand_titre">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<div id="fond_Interface">
				<table>
					<tr>
						<td width="500" align="center" class="td_label">
							<label class="titre">VERIFICATION DE MOT DE PASSE OUBLIE</label>
						</td>
					</tr>
				</table>
				<table class="label_Authent">
					<tr height="40">
						<td>Entrer votre mail :</td>
						<td align="center"><input type="text" id="authent_Mail" name="authent_Mail" class="text" /></td>
					</tr>
					<tr height="40">
						<td></td>
						<td align="center">Votre demande sera vérifiée par l'administrateur</td>
					</tr>
					<tr height="40">
						<td></td>
						<td align="center"><input type="button" id="valid_Mail" name="valid_Mail" class="bouton" value="Enregistrer" />
						<input type="button" id="retour_Authent" name="retour_Authent" class="bouton" value="Annuler" />
						</td>
					</tr>
				</table>
			</div>
			<!--****************************************Affichage de message vide**********************************-->
			<div id="authent_vide"><?php include '../Authentification/Authentification message/Message vide.php';?></div>
			<!--***************************************************************************************************-->
			<!--****************************************Affichage de message erreur********************************-->
			<div id="authent_Erreur_De_Saisie"><?php include 'Mdp message/Message erreur.php';?></div>
			<!--***************************************************************************************************-->
			<!--****************************Affichage de message de validation du mail*****************************-->
			<div id="authent_Validation_Mail"><?php include 'Mdp message/Message valider mail.php';?></div>
			<!--***************************************************************************************************-->
		</div>
	</center>
</body>
</html>