 <script type="text/javascript" src="../js/NewEntrepreise.js"></script>
 <link href="../facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="../facebox/facebox.js" type="text/javascript"></script> 



 <table>
	<tr>
								
		<td class="lab">Registre du Commerce</td>
		<td><input type="text" id="txtRC" class="txtGeneral"/><span id="etoile">*</span></td> 
	</tr>
	<tr>
		<td class="lab">Numéro Statistique</td>
		<td><input type="text" id="txtNumStat" class="txtGeneral"/><span id="etoile">*</span></td>
	</tr>
	<tr>
		<td class="lab">Identification fiscale</td>
		<td><input type="text" id="txtNIF" class="txtGeneral"/><span id="etoile">*</span></td> 
	</tr>
	<tr>
		<td class="lab"> Exercice Comptable</td>
		<td><!--input type="text" id="txtExoCom" class="txtGeneral"/-->
				<table>
					<tr>
						<td>
							<select id="jourExoCom" class="datecre">
								<option >Jour</option>
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select>
						</td>
						<td class="lab">/</td>
						<td>
							<select id="moisExoComp" class="datecre">
								<option >Mois</option>
								<option value="Janvier">Janvier</option>
								<option value="Fevrier">Fevrier</option>
								<option value="Mars">Mars</option>
								<option value="Avril">Avril</option>
								<option value="Mais">Mai</option>
								<option value="Juin">Juin</option>
								<option value="Juillet">Juillet</option>
								<option value="Aôut">Aôut</option>
								<option value="Septembre">Septembre</option>
								<option value="Octobre">Octobre</option>
								<option value="Novembre">Novembre</option>
								<option value="Décembre">Décembre</option>
							</select>
							<span id="etoile">*</span>
						</td>
					</tr>
				</table>
		</td>
	</tr>
	<tr>
		<td class="lab">Valorisation de stock</td>
		<td> <input type="text" id="txtValStock" class="txtGeneral"/></td>
	</tr>
	
	<tr>
		<td class="lab"><label>Postes clés</label></td>
		<td><input type="text" id="NbrPostCle" class="txtGeneralP" placeholder="Nombre de postes clés" /><div id="pluPostCle"onClick="affich_casePost()" >+</div><span id="etoile">*</span> </td>
	</tr>
</table>
<?php
/*
Modification de l'affichage
*/
?>
<div id="creSurPlus">
	<div id="post_cle">
	</div>
</div>


