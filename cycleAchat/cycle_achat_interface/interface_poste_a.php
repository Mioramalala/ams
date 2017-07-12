<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script>
$(function(){
	$('#enreg_poste').click(function(){
		$('#mess_enreg_poste_a').show();
	});
	
	$('#ret_menu_rsci').click(function(){
		$('#dv_cont_menu_rsci').show();
		$('#contenue_poste_a').hide();
	});
});

function select_check(id, poste_id, cpt){
	check_id_init="check_"+cpt;
	if(document.getElementById(check_id_init).checked==true){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/enregistre_poste_a.php',
			data:{poste_id:poste_id},
			success:function(){
			}			
		});
	}
	else{
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/suppr_poste_a.php',
			data:{poste_id:poste_id},
			success:function(){
			}			
		});
	}
}
</script>
<div id="dv_poste_a">
<label>
	Poste clé : Cycle achat
</label>
<table id="tbl_poste">
	<?php
		include 'connexion.php';
		
		$reponse=$bdd->query('SELECT POSTE_CLE_ID, POSTE_CLE_NOM FROM tab_poste_cle');
		
		$cpt=0;
		$res=0;
		$check='';
		$couleur="#efefef";
		while($donnees=$reponse->fetch()){
		
		$reponse1=$bdd->query('SELECT POSTE_CYCLE_NOM FROM  tab_poste_cycle WHERE POSTE_CLE_ID='.$donnees['POSTE_CLE_ID']);
		
		$donnees1=$reponse1->fetch();
	
	?>
	<tr <?php if($couleur=="#efefef") $couleur="white"; else $couleur="#efefef";?> bgcolor="<?php echo $couleur;?>">
		<td>
			<?php $res=0;?>
			<input type="checkbox" onchange="select_check(this.id,<?php echo $donnees['POSTE_CLE_ID'];?>, <?php echo $cpt; ?>)" id="check_<?php echo $cpt;?>" <?php if($donnees1['POSTE_CYCLE_NOM']=='achat') echo 'checked'; ?> <?php if($donnees1['POSTE_CYCLE_NOM']=='achat') echo 'disabled';?> />
		</td>
		<td width="300">
			<?php echo $donnees['POSTE_CLE_NOM'];?>
		</td>
	</tr>
	<?php
	$cpt++;
	}
	
	?>
</table>
	<input type="button" id="enreg_poste" value="Enregistrer" class="bouton" />&nbsp;&nbsp;&nbsp;
	<input type="button" id="ret_menu_rsci" value="Retour" class="bouton" />
</div>
<div id="mess_enreg_poste_a">
	<?php include 'cycleAchat/cycle_achat_message/mess_enreg_poste_a.php'; ?>
</div>