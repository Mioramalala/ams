
	<table>
		<tr>
			<td class="lab">Dénomination</td>
			<td><input type="text" id="txtdenomination" class="txtGeneral"/><span id="etoile">*</span></td>
		</tr>
		<tr>
			<td class="lab">Code entreprise</td>
			<td><input type="text" id="txtCode" class="txtGeneral"/><span id="etoile">*</span></td>
		</tr>
		<tr>
			<td class="lab">Secteur d'activité</td>
			<td><input type="text" id="txtSectActi" class="txtGeneral"/><span id="etoile">*</span></td>
		</tr>
					
		<tr>
			<td class="lab">Date de création</td>
			<td>
			<!--input type id="txt_dateCreation" class="txtGeneral"/-->
				<table>
					<tr>
						<td>
							<select id="jourCre" class="datecre">
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
							<select id="moisCre" class="datecre">
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
						</td>
						<td class="lab">/</td>
						<td>
							<select id="AnnCre" class="datecre">
								<option >Année</option>
								<!-- Modification by Niaina -->
								<?php for($i=1930;$i<2101;$i++) { ?>
								<option value="<?php echo $i ?>"><?php echo $i ?></option>
								<?php } ?>
								<!-- Fin Modification -->
							</select><span id="etoile">*</span>
							</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="lab">Adresse</td>
			<td><input type="text" id="txtAdress" class="txtGeneral"/><span id="etoile">*</span></td>					
		</tr>	
		<tr>
								
		<td class="lab">Site internet</td>
			<td><input type="text" id="txtsite" class="txtGeneral"/></td> 
		</tr>
		<tr>
			<td class="lab">Téléphone </td>
			<td><input type="text" id="txtcontact" class="txtGeneralP"/><div id="pluTel">+</div><span id="etoile">*</span><input type="text" id="txtcontact2" class="txtGeneralP" style="display:none"/></td>
		</tr>
		<tr>
			<td class="lab">E-mail</td>
			<td><input type="text" id="txtMail" class="txtGeneral"/></td>
		</tr>
		
		
	</table>
