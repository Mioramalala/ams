<table>
	<tr>
		<td class="lab">Statut juridique </td>
		<td><input type="text" id="txtraisonSoc" class="txtGeneral"/><span id="etoile">*</span></td> 
	</tr>
	<tr>
		<td class="lab"> Nombre de salariés </td>
		<td><input type="text" id="txtNbrSal" class="txtGeneral"/></td>
	</tr>
		<tr>
			<td class="lab">Durée de la société</td>
			<td><input type id="txtDureSoc" class="txtGeneral"/><span id="etoile">*</span></td>
		</tr>
		<tr>
			<td class="lab">Capital social</td>
			<td><input type="text" id="txtCapitSoc" class="txtGeneral" onblur="verif_CapSos()"/><span id="etoile">*</span></td>
		</tr>
		<tr>
		
			<td class="lab">Nombre d'actions</td>
			<td><input type="text" id="NbrAction" class="txtGeneral" onblur="verif_NbrAction()"/><span id="etoile">*</span></td>
		</tr>
		
		<tr>
			<td class="lab">Actionnaires</td>
			<td><input type="text" id="NbrActionnair" class="txtGeneralP" placeholder="Nombre d'actionnaires"/><div id="pluAction" onClick="affich_case()">+</div><span id="etoile">*</span></td>
		</tr>
		
		<tr>
			<td class="lab"> Activité</td>
			<td><input type="text" id="txtActi" class="txtGeneral"/></td>
		</tr>

</table>
<div id="creSurPlus">
	<div id="actMiampy">
	</div>
</div>
