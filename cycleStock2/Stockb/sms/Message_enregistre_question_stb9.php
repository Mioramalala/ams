<script>
$(function(){
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_stb9').click(function(){	
	if((document.getElementById("commentaire_Question_stb9").value=="") || (document.getElementById("rad_Question_Oui_stb_9").checked==false && document.getElementById("rad_Question_NA_stb_9").checked==false && document.getElementById("rad_Question_Non_f_9").checked==false)){
			$('#mess_quest_vide_stb9').show();
			$('#message_fermeture_question_stb9').hide();
			$('#Question_stb_125').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stb").value;
			commentaire=document.getElementById("commentaire_Question_stb9").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_stb_9").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_stb_9").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_stb_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockb/php/detect_objectif_exist_stb.php',
				data:{mission_id:mission_id, question_id:125, cycle_achat_id:11},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_f(commentaire, qcm, mission_id, 125);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/update_object_stb.php',