<div id="int_Question_A">
<?php 
$compte=0;
?>
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION :
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">7.	Le journal des achats est-il dapproché de la liste des réception retours ou réclamations pour s'assurer que toutes les factures et tous les avoirs sont comptabilisés ?

			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" value="rad_question<?php echo $compte;?>" id="rad_Question_Oui" name="rad_Question" />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" value="rad_question<?php echo $compte;?>" id="rad_Question_NA" name="rad_Question" />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" value="" id="rad_Question_Non" name="rad_Question" />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaire</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question" rows="15" cols="50"></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_A_Question_Precedent"/>&nbsp;&nbsp;&nbsp;<input type="button" value="Suivant" class="bouton" />
			</td>
		</tr>
	</table>
<?php
$compte++;

?>
</div>