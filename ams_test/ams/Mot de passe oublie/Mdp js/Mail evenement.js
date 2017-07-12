$(function(){
	//La validation du mail enregistrer
	$('#valid_Mail').click(function(){
		if($('#authent_Mail').val()==""){
			$('#authent_vide').show();
		}
		else if(detect_Arobase($('#authent_Mail').val())==""){
			$('#authent_Erreur_De_Saisie').show();
		}
		else{
			$.ajax({
				type:'POST',
				url:'Mdp php/Mdp envoie mail.php',
				data:{mail:$('#authent_Mail').val()},
				success:function(){
					$('#authent_Validation_Mail').show();					
				}
			});
		}
	});
	//Le retour à l'interface du mot de passe oublié
	$('#valider_msg_Mdp').click(function(){
		$('#authent_Erreur_De_Saisie').hide();
	});
	//Le retour vers l'authentification
	$('#valider_Mail').click(function(){
		window.location="../Index.php";
	});
	//Le retour vers l'authentification après l'annulation
	$('#retour_Authent').click(function(){
		window.location="../Index.php";
	});
});

function detect_Arobase(texte){
	reponse=false;
	for(i=0; i<texte.length; i++){
		caractere=texte.charAt(i);
		if(caractere=='@'){
			reponse=true;
		}
	}
	if(reponse==true){
		return texte;
	}
	else{
		return "";
	}
}