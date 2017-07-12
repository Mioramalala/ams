<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<style>
#tet{
  margin-left:-17px;
  margin-top:20px;
  border-collapse:collapse;
  }
#tettd{
   border:1px solid #ccc;
   background-color:#0074bf;
   color:#fff;
  }
 </style>
<script>

$(function(){
	//////////////////////////////////////////////////////////////////////TAXABLE///////////////////////////////////////////////////////////////////////////
	
	$('#ca_taxable').click(function(){
	/////////////////////////////////////////////colonne1//////////////////////////////////////////////
		var a1=parseInt(document.getElementById("CA_tax_0_1").value);
		var a2=parseInt(document.getElementById("CA_tax_20_1").value);
		var a3=parseInt(document.getElementById("CA_NT_1").value);
		var a4=parseInt(document.getElementById("CA_tax_18_1").value);
		
		var somme1= a1+a2+a3+a4;
		document.getElementById("total_ca_taxable_1").value=somme1;
		
		/////////////////////////////////////////////colonne2//////////////////////////////////////////////
		var b1=parseInt(document.getElementById("CA_tax_0_2").value);
		var b2=parseInt(document.getElementById("CA_tax_20_2").value);
		var b3=parseInt(document.getElementById("CA_NT_2").value);
		var b4=parseInt(document.getElementById("CA_tax_18_2").value);
		
		var somme2= b1+b2+b3+b4;
		document.getElementById("total_ca_taxable_2").value=somme2;
		
		/////////////////////////////////////////////colonne3//////////////////////////////////////////////
		var c1=parseInt(document.getElementById("CA_tax_0_3").value);
		var c2=parseInt(document.getElementById("CA_tax_20_3").value);
		var c3=parseInt(document.getElementById("CA_NT_3").value);
		var c4=parseInt(document.getElementById("CA_tax_18_3").value);
		
		var somme3= c1+c2+c3+c4;
		document.getElementById("total_ca_taxable_3").value=somme3;
		
		/////////////////////////////////////////////colonne4//////////////////////////////////////////////
		var d1=parseInt(document.getElementById("CA_tax_0_4").value);
		var d2=parseInt(document.getElementById("CA_tax_20_4").value);
		var d3=parseInt(document.getElementById("CA_NT_4").value);
		var d4=parseInt(document.getElementById("CA_tax_18_4").value);
		
		var somme4= d1+d2+d3+d4;
		document.getElementById("total_ca_taxable_4").value=somme4;
		
		/////////////////////////////////////////////colonne5//////////////////////////////////////////////
		var e1=parseInt(document.getElementById("CA_tax_0_5").value);
		var e2=parseInt(document.getElementById("CA_tax_20_5").value);
		var e3=parseInt(document.getElementById("CA_NT_5").value);
		var e4=parseInt(document.getElementById("CA_tax_18_5").value);
		
		var somme5= e1+e2+e3+e4;
		document.getElementById("total_ca_taxable_5").value=somme5;
		
		/////////////////////////////////////////////colonne6//////////////////////////////////////////////
		var f1=parseInt(document.getElementById("CA_tax_0_6").value);
		var f2=parseInt(document.getElementById("CA_tax_20_6").value);
		var f3=parseInt(document.getElementById("CA_NT_6").value);
		var f4=parseInt(document.getElementById("CA_tax_18_6").value);
		
		var somme6= f1+f2+f3+f4;
		document.getElementById("total_ca_taxable_6").value=somme6;
		
		/////////////////////////////////////////////colonne7//////////////////////////////////////////////
		var g1=parseInt(document.getElementById("CA_tax_0_7").value);
		var g2=parseInt(document.getElementById("CA_tax_20_7").value);
		var g3=parseInt(document.getElementById("CA_NT_7").value);
		var g4=parseInt(document.getElementById("CA_tax_18_7").value);
		
		var somme7= g1+g2+g3+g4;
		document.getElementById("total_ca_taxable_7").value=somme7;
		
		/////////////////////////////////////////////colonne8//////////////////////////////////////////////
		var h1=parseInt(document.getElementById("CA_tax_0_8").value);
		var h2=parseInt(document.getElementById("CA_tax_20_8").value);
		var h3=parseInt(document.getElementById("CA_NT_8").value);
		var h4=parseInt(document.getElementById("CA_tax_18_8").value);
		
		var somme8= h1+h2+h3+h4;
		document.getElementById("total_ca_taxable_8").value=somme8;
		
		/////////////////////////////////////////////colonne9//////////////////////////////////////////////
		var i1=parseInt(document.getElementById("CA_tax_0_9").value);
		var i2=parseInt(document.getElementById("CA_tax_20_9").value);
		var i3=parseInt(document.getElementById("CA_NT_9").value);
		var i4=parseInt(document.getElementById("CA_tax_18_9").value);
		
		var somme9= i1+i2+i3+i4;
		document.getElementById("total_ca_taxable_9").value=somme9;
		
		/////////////////////////////////////////////colonne10//////////////////////////////////////////////
		var j1=parseInt(document.getElementById("CA_tax_0_10").value);
		var j2=parseInt(document.getElementById("CA_tax_20_10").value);
		var j3=parseInt(document.getElementById("CA_NT_10").value);
		var j4=parseInt(document.getElementById("CA_tax_18_10").value);
		
		var somme10= j1+j2+j3+j4;
		document.getElementById("total_ca_taxable_10").value=somme10;
		
		/////////////////////////////////////////////colonne11//////////////////////////////////////////////
		var k1=parseInt(document.getElementById("CA_tax_0_11").value);
		var k2=parseInt(document.getElementById("CA_tax_20_11").value);
		var k3=parseInt(document.getElementById("CA_NT_11").value);
		var k4=parseInt(document.getElementById("CA_tax_18_11").value);
		
		var somme11= k1+k2+k3+k4;
		document.getElementById("total_ca_taxable_11").value=somme11;
		
		/////////////////////////////////////////////colonne12//////////////////////////////////////////////
		var l1=parseInt(document.getElementById("CA_tax_0_12").value);
		var l2=parseInt(document.getElementById("CA_tax_20_12").value);
		var l3=parseInt(document.getElementById("CA_NT_12").value);
		var l4=parseInt(document.getElementById("CA_tax_18_12").value);
		
		var somme12= l1+l2+l3+l4;
		document.getElementById("total_ca_taxable_12").value=somme12;
	});
	
	
	//////////////////////////////////////////////////////////////////////NON TAXABLE///////////////////////////////////////////////////////////////////////////
	
	$('#ca_non_taxable').click(function(){
	    ////////////////////////////////////////////colonne1 NT//////////////////////////////////////////////
		var a_n1=parseInt(document.getElementById("CA_NTax_1").value);
			
		var somme_n1=a_n1;
		document.getElementById("total_ca_NT_1").value=somme_n1;
	    ////////////////////////////////////////////colonne2 NT//////////////////////////////////////////////
		var a_n2=parseInt(document.getElementById("CA_NTax_2").value);
			
		var somme_n2=a_n2;
		document.getElementById("total_ca_NT_2").value=somme_n2;
		  ////////////////////////////////////////////colonne3 NT//////////////////////////////////////////////
		var a_n3=parseInt(document.getElementById("CA_NTax_3").value);
			
		var somme_n3=a_n3;
		document.getElementById("total_ca_NT_3").value=somme_n3;
		 ////////////////////////////////////////////colonne4 NT//////////////////////////////////////////////
		var a_n4=parseInt(document.getElementById("CA_NTax_4").value);
			
		var somme_n4=a_n4;
		document.getElementById("total_ca_NT_4").value=somme_n4;
		////////////////////////////////////////////colonne5 NT//////////////////////////////////////////////
		var a_n5=parseInt(document.getElementById("CA_NTax_5").value);
			
		var somme_n5=a_n5;
		document.getElementById("total_ca_NT_5").value=somme_n5;
		////////////////////////////////////////////colonne6 NT//////////////////////////////////////////////
		var a_n6=parseInt(document.getElementById("CA_NTax_6").value);
			
		var somme_n6=a_n6;
		document.getElementById("total_ca_NT_6").value=somme_n6;
		////////////////////////////////////////////colonne7 NT//////////////////////////////////////////////
		var a_n7=parseInt(document.getElementById("CA_NTax_7").value);
			
		var somme_n7=a_n7;
		document.getElementById("total_ca_NT_7").value=somme_n7;
		////////////////////////////////////////////colonne8 NT//////////////////////////////////////////////
		var a_n8=parseInt(document.getElementById("CA_NTax_8").value);
			
		var somme_n8=a_n8;
		document.getElementById("total_ca_NT_8").value=somme_n8;
		////////////////////////////////////////////colonne9 NT//////////////////////////////////////////////
		var a_n9=parseInt(document.getElementById("CA_NTax_9").value);
			
		var somme_n9=a_n9;
		document.getElementById("total_ca_NT_9").value=somme_n9;
		////////////////////////////////////////////colonne10 NT//////////////////////////////////////////////
		var a_n10=parseInt(document.getElementById("CA_NTax_10").value);
			
		var somme_n10=a_n10;
		document.getElementById("total_ca_NT_10").value=somme_n10;
		////////////////////////////////////////////colonne11 NT//////////////////////////////////////////////
		var a_n11=parseInt(document.getElementById("CA_NTax_11").value);
			
		var somme_n11=a_n11;
		document.getElementById("total_ca_NT_11").value=somme_n11;
		////////////////////////////////////////////colonne12 NT//////////////////////////////////////////////
		var a_n12=parseInt(document.getElementById("CA_NTax_12").value);
			
		var somme_n12=a_n12;
		document.getElementById("total_ca_NT_12").value=somme_n12;
			
	});
	//////////////////////////////////////////////////////////////////////NON TAXABLE///////////////////////////////////////////////////////////////////////////
	$('#ca_total').click(function(){
		////////////////////////////////////////////total CA1//////////////////////////////////////////////
		var a_tca1=parseInt(document.getElementById("total_ca_taxable_1").value);
		var a_tca2=parseInt(document.getElementById("total_ca_NT_1").value);
			
		var somme_ca1=a_tca1+a_tca2;
		document.getElementById("total_CA_1").value=somme_ca1;
		////////////////////////////////////////////total CA2//////////////////////////////////////////////
		var b_tca1=parseInt(document.getElementById("total_ca_taxable_2").value);
		var b_tca2=parseInt(document.getElementById("total_ca_NT_2").value);
			
		var somme_ca2=b_tca1+b_tca2;
		document.getElementById("total_CA_2").value=somme_ca2;
		////////////////////////////////////////////total CA3//////////////////////////////////////////////
		var c_tca1=parseInt(document.getElementById("total_ca_taxable_3").value);
		var c_tca2=parseInt(document.getElementById("total_ca_NT_3").value);
			
		var somme_ca3=c_tca1+c_tca2;
		document.getElementById("total_CA_3").value=somme_ca3;
		////////////////////////////////////////////total CA4//////////////////////////////////////////////
		var d_tca1=parseInt(document.getElementById("total_ca_taxable_4").value);
		var d_tca2=parseInt(document.getElementById("total_ca_NT_4").value);
			
		var somme_ca4=d_tca1+d_tca2;
		document.getElementById("total_CA_4").value=somme_ca4;
		////////////////////////////////////////////total CA5//////////////////////////////////////////////
		var e_tca1=parseInt(document.getElementById("total_ca_taxable_5").value);
		var e_tca2=parseInt(document.getElementById("total_ca_NT_5").value);
			
		var somme_ca5=e_tca1+e_tca2;
		document.getElementById("total_CA_5").value=somme_ca5;
		////////////////////////////////////////////total CA6//////////////////////////////////////////////
		var f_tca1=parseInt(document.getElementById("total_ca_taxable_6").value);
		var f_tca2=parseInt(document.getElementById("total_ca_NT_6").value);
			
		var somme_ca6=f_tca1+f_tca2;
		document.getElementById("total_CA_6").value=somme_ca6;
		////////////////////////////////////////////total CA7//////////////////////////////////////////////
		var g_tca1=parseInt(document.getElementById("total_ca_taxable_7").value);
		var g_tca2=parseInt(document.getElementById("total_ca_NT_7").value);
			
		var somme_ca7=g_tca1+g_tca2;
		document.getElementById("total_CA_7").value=somme_ca7;
		////////////////////////////////////////////total CA8//////////////////////////////////////////////
		var h_tca1=parseInt(document.getElementById("total_ca_taxable_8").value);
		var h_tca2=parseInt(document.getElementById("total_ca_NT_8").value);
			
		var somme_ca8=h_tca1+h_tca2;
		document.getElementById("total_CA_8").value=somme_ca8;
		////////////////////////////////////////////total CA9//////////////////////////////////////////////
		var i_tca1=parseInt(document.getElementById("total_ca_taxable_9").value);
		var i_tca2=parseInt(document.getElementById("total_ca_NT_9").value);
			
		var somme_ca9=i_tca1+i_tca2;
		document.getElementById("total_CA_9").value=somme_ca9;
		////////////////////////////////////////////total CA10//////////////////////////////////////////////
		var j_tca1=parseInt(document.getElementById("total_ca_taxable_10").value);
		var j_tca2=parseInt(document.getElementById("total_ca_NT_10").value);
			
		var somme_ca10=j_tca1+j_tca2;
		document.getElementById("total_CA_10").value=somme_ca10;
		////////////////////////////////////////////total CA11//////////////////////////////////////////////
		var k_tca1=parseInt(document.getElementById("total_ca_taxable_11").value);
		var k_tca2=parseInt(document.getElementById("total_ca_NT_11").value);
			
		var somme_ca11=k_tca1+k_tca2;
		document.getElementById("total_CA_11").value=somme_ca11;
		////////////////////////////////////////////total CA12//////////////////////////////////////////////
		var l_tca1=parseInt(document.getElementById("total_ca_taxable_12").value);
		var l_tca2=parseInt(document.getElementById("total_ca_NT_12").value);
			
		var somme_ca12=l_tca1+l_tca2;
		document.getElementById("total_CA_12").value=somme_ca12;
	});
	//////////////////////////////////////////////////////////////////////TVA Collectée///////////////////////////////////////////////////////////////////////////
	$('#total_tva_collectee').click(function(){
		////////////////////////////////////////////TVA C1//////////////////////////////////////////////
		var a_tvac1=parseInt(document.getElementById("TVAC_20_1").value);
		var a_tvac2=parseInt(document.getElementById("TVAC_18_1").value);
		var a_tvac3=parseInt(document.getElementById("TVAC_Autres_1").value);
			
		var somme_tvac1=a_tvac1+a_tvac2+a_tvac3;
		document.getElementById("total_TVAC_1").value=somme_tvac1;
		////////////////////////////////////////////TVA C2//////////////////////////////////////////////
		var b_tvac1=parseInt(document.getElementById("TVAC_20_2").value);
		var b_tvac2=parseInt(document.getElementById("TVAC_18_2").value);
		var b_tvac3=parseInt(document.getElementById("TVAC_Autres_2").value);
			
		var somme_tvac2=b_tvac1+b_tvac2+b_tvac3;
		document.getElementById("total_TVAC_2").value=somme_tvac2;
		////////////////////////////////////////////TVA C3//////////////////////////////////////////////
		var c_tvac1=parseInt(document.getElementById("TVAC_20_3").value);
		var c_tvac2=parseInt(document.getElementById("TVAC_18_3").value);
		var c_tvac3=parseInt(document.getElementById("TVAC_Autres_3").value);
			
		var somme_tvac3=c_tvac1+c_tvac2+c_tvac3;
		document.getElementById("total_TVAC_3").value=somme_tvac3;
		////////////////////////////////////////////TVA C4//////////////////////////////////////////////
		var d_tvac1=parseInt(document.getElementById("TVAC_20_4").value);
		var d_tvac2=parseInt(document.getElementById("TVAC_18_4").value);
		var d_tvac3=parseInt(document.getElementById("TVAC_Autres_4").value);
			
		var somme_tvac4=d_tvac1+d_tvac2+d_tvac3;
		document.getElementById("total_TVAC_4").value=somme_tvac4;
		////////////////////////////////////////////TVA C5//////////////////////////////////////////////
		var e_tvac1=parseInt(document.getElementById("TVAC_20_5").value);
		var e_tvac2=parseInt(document.getElementById("TVAC_18_5").value);
		var e_tvac3=parseInt(document.getElementById("TVAC_Autres_5").value);
			
		var somme_tvac5=e_tvac1+e_tvac2+e_tvac3;
		document.getElementById("total_TVAC_5").value=somme_tvac5;
		////////////////////////////////////////////TVA C6//////////////////////////////////////////////
		var f_tvac1=parseInt(document.getElementById("TVAC_20_6").value);
		var f_tvac2=parseInt(document.getElementById("TVAC_18_6").value);
		var f_tvac3=parseInt(document.getElementById("TVAC_Autres_6").value);
			
		var somme_tvac6=f_tvac1+f_tvac2+f_tvac3;
		document.getElementById("total_TVAC_6").value=somme_tvac6;
		////////////////////////////////////////////TVA C7//////////////////////////////////////////////
		var g_tvac1=parseInt(document.getElementById("TVAC_20_7").value);
		var g_tvac2=parseInt(document.getElementById("TVAC_18_7").value);
		var g_tvac3=parseInt(document.getElementById("TVAC_Autres_7").value);
			
		var somme_tvac7=g_tvac1+g_tvac2+g_tvac3;
		document.getElementById("total_TVAC_7").value=somme_tvac7;
		////////////////////////////////////////////TVA C8//////////////////////////////////////////////
		var h_tvac1=parseInt(document.getElementById("TVAC_20_8").value);
		var h_tvac2=parseInt(document.getElementById("TVAC_18_8").value);
		var h_tvac3=parseInt(document.getElementById("TVAC_Autres_8").value);
			
		var somme_tvac8=h_tvac1+h_tvac2+h_tvac3;
		document.getElementById("total_TVAC_8").value=somme_tvac8;
		////////////////////////////////////////////TVA C9//////////////////////////////////////////////
		var i_tvac1=parseInt(document.getElementById("TVAC_20_9").value);
		var i_tvac2=parseInt(document.getElementById("TVAC_18_9").value);
		var i_tvac3=parseInt(document.getElementById("TVAC_Autres_9").value);
			
		var somme_tvac9=i_tvac1+i_tvac2+i_tvac3;
		document.getElementById("total_TVAC_9").value=somme_tvac9;
		////////////////////////////////////////////TVA C10//////////////////////////////////////////////
		var j_tvac1=parseInt(document.getElementById("TVAC_20_10").value);
		var j_tvac2=parseInt(document.getElementById("TVAC_18_10").value);
		var j_tvac3=parseInt(document.getElementById("TVAC_Autres_10").value);
			
		var somme_tvac10=j_tvac1+j_tvac2+j_tvac3;
		document.getElementById("total_TVAC_10").value=somme_tvac10;
		////////////////////////////////////////////TVA C11//////////////////////////////////////////////
		var k_tvac1=parseInt(document.getElementById("TVAC_20_11").value);
		var k_tvac2=parseInt(document.getElementById("TVAC_18_11").value);
		var k_tvac3=parseInt(document.getElementById("TVAC_Autres_11").value);
			
		var somme_tvac11=k_tvac1+k_tvac2+k_tvac3;
		document.getElementById("total_TVAC_11").value=somme_tvac11;
		////////////////////////////////////////////TVA C12//////////////////////////////////////////////
		var l_tvac1=parseInt(document.getElementById("TVAC_20_12").value);
		var l_tvac2=parseInt(document.getElementById("TVAC_18_12").value);
		var l_tvac3=parseInt(document.getElementById("TVAC_Autres_12").value);
			
		var somme_tvac12=l_tvac1+l_tvac2+l_tvac3;
		document.getElementById("total_TVAC_12").value=somme_tvac12;
	});
	//////////////////////////////////////////////////////////////////////TVA Déductible///////////////////////////////////////////////////////////////////////////
	$('#total_tva_deductible').click(function(){
		////////////////////////////////////////////TVA D1//////////////////////////////////////////////
		var a_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_1").value);
		var a_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_1").value);
		var a_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_1").value);
		var a_tvad4=parseInt(document.getElementById("TVAD_locaux_services_1").value);
		var a_tvad5=parseInt(document.getElementById("TVAD_import_biens_1").value);
		var a_tvad6=parseInt(document.getElementById("TVAD_import_equip_1").value);
		var a_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_1").value);
		var a_tvad8=parseInt(document.getElementById("TVAD_import_services_1").value);
	
			
		var somme_tvad1=a_tvad1+a_tvad2+a_tvad3+a_tvad4+a_tvad5+a_tvad6+a_tvad7+a_tvad8;
		document.getElementById("total_TVAD_1").value=somme_tvad1;
		
		////////////////////////////////////////////TVA D2//////////////////////////////////////////////
		var b_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_2").value);
		var b_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_2").value);
		var b_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_2").value);
		var b_tvad4=parseInt(document.getElementById("TVAD_locaux_services_2").value);
		var b_tvad5=parseInt(document.getElementById("TVAD_import_biens_2").value);
		var b_tvad6=parseInt(document.getElementById("TVAD_import_equip_2").value);
		var b_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_2").value);
		var b_tvad8=parseInt(document.getElementById("TVAD_import_services_2").value);
	
			
		var somme_tvad2=b_tvad1+b_tvad2+b_tvad3+b_tvad4+b_tvad5+b_tvad6+b_tvad7+b_tvad8;
		document.getElementById("total_TVAD_2").value=somme_tvad2;
		
		////////////////////////////////////////////TVA D3//////////////////////////////////////////////
		var c_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_3").value);
		var c_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_3").value);
		var c_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_3").value);
		var c_tvad4=parseInt(document.getElementById("TVAD_locaux_services_3").value);
		var c_tvad5=parseInt(document.getElementById("TVAD_import_biens_3").value);
		var c_tvad6=parseInt(document.getElementById("TVAD_import_equip_3").value);
		var c_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_3").value);
		var c_tvad8=parseInt(document.getElementById("TVAD_import_services_3").value);
	
			
		var somme_tvad3=c_tvad1+c_tvad2+c_tvad3+c_tvad4+c_tvad5+c_tvad6+c_tvad7+c_tvad8;
		document.getElementById("total_TVAD_3").value=somme_tvad3;
		
		////////////////////////////////////////////TVA D4//////////////////////////////////////////////
		var d_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_4").value);
		var d_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_4").value);
		var d_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_4").value);
		var d_tvad4=parseInt(document.getElementById("TVAD_locaux_services_4").value);
		var d_tvad5=parseInt(document.getElementById("TVAD_import_biens_4").value);
		var d_tvad6=parseInt(document.getElementById("TVAD_import_equip_4").value);
		var d_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_4").value);
		var d_tvad8=parseInt(document.getElementById("TVAD_import_services_4").value);
	
			
		var somme_tvad4=d_tvad1+d_tvad2+d_tvad3+d_tvad4+d_tvad5+d_tvad6+d_tvad7+d_tvad8;
		document.getElementById("total_TVAD_4").value=somme_tvad4;
		
		////////////////////////////////////////////TVA D5//////////////////////////////////////////////
		var e_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_5").value);
		var e_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_5").value);
		var e_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_5").value);
		var e_tvad4=parseInt(document.getElementById("TVAD_locaux_services_5").value);
		var e_tvad5=parseInt(document.getElementById("TVAD_import_biens_5").value);
		var e_tvad6=parseInt(document.getElementById("TVAD_import_equip_5").value);
		var e_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_5").value);
		var e_tvad8=parseInt(document.getElementById("TVAD_import_services_5").value);
	
			
		var somme_tvad5=e_tvad1+e_tvad2+e_tvad3+e_tvad4+e_tvad5+e_tvad6+e_tvad7+e_tvad8;
		document.getElementById("total_TVAD_5").value=somme_tvad5;
		
		////////////////////////////////////////////TVA D6//////////////////////////////////////////////
		var f_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_6").value);
		var f_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_6").value);
		var f_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_6").value);
		var f_tvad4=parseInt(document.getElementById("TVAD_locaux_services_6").value);
		var f_tvad5=parseInt(document.getElementById("TVAD_import_biens_6").value);
		var f_tvad6=parseInt(document.getElementById("TVAD_import_equip_6").value);
		var f_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_6").value);
		var f_tvad8=parseInt(document.getElementById("TVAD_import_services_6").value);
	
			
		var somme_tvad6=f_tvad1+f_tvad2+f_tvad3+f_tvad4+f_tvad5+f_tvad6+f_tvad7+f_tvad8;
		document.getElementById("total_TVAD_6").value=somme_tvad6;
		
		////////////////////////////////////////////TVA D7//////////////////////////////////////////////
		var g_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_7").value);
		var g_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_7").value);
		var g_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_7").value);
		var g_tvad4=parseInt(document.getElementById("TVAD_locaux_services_7").value);
		var g_tvad5=parseInt(document.getElementById("TVAD_import_biens_7").value);
		var g_tvad6=parseInt(document.getElementById("TVAD_import_equip_7").value);
		var g_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_7").value);
		var g_tvad8=parseInt(document.getElementById("TVAD_import_services_7").value);
	
			
		var somme_tvad7=g_tvad1+g_tvad2+g_tvad3+g_tvad4+g_tvad5+g_tvad6+g_tvad7+g_tvad8;
		document.getElementById("total_TVAD_7").value=somme_tvad7;
		
		////////////////////////////////////////////TVA D8//////////////////////////////////////////////
		var h_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_8").value);
		var h_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_8").value);
		var h_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_8").value);
		var h_tvad4=parseInt(document.getElementById("TVAD_locaux_services_8").value);
		var h_tvad5=parseInt(document.getElementById("TVAD_import_biens_8").value);
		var h_tvad6=parseInt(document.getElementById("TVAD_import_equip_8").value);
		var h_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_8").value);
		var h_tvad8=parseInt(document.getElementById("TVAD_import_services_8").value);
	
			
		var somme_tvad8=h_tvad1+h_tvad2+h_tvad3+h_tvad4+h_tvad5+h_tvad6+h_tvad7+h_tvad8;
		document.getElementById("total_TVAD_8").value=somme_tvad8;
		
		////////////////////////////////////////////TVA D9//////////////////////////////////////////////
		var i_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_9").value);
		var i_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_9").value);
		var i_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_9").value);
		var i_tvad4=parseInt(document.getElementById("TVAD_locaux_services_9").value);
		var i_tvad5=parseInt(document.getElementById("TVAD_import_biens_9").value);
		var i_tvad6=parseInt(document.getElementById("TVAD_import_equip_9").value);
		var i_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_9").value);
		var i_tvad8=parseInt(document.getElementById("TVAD_import_services_9").value);
	
			
		var somme_tvad9=i_tvad1+i_tvad2+i_tvad3+i_tvad4+i_tvad5+i_tvad6+i_tvad7+i_tvad8;
		document.getElementById("total_TVAD_9").value=somme_tvad9;
		
		////////////////////////////////////////////TVA D10//////////////////////////////////////////////
		var j_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_10").value);
		var j_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_10").value);
		var j_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_10").value);
		var j_tvad4=parseInt(document.getElementById("TVAD_locaux_services_10").value);
		var j_tvad5=parseInt(document.getElementById("TVAD_import_biens_10").value);
		var j_tvad6=parseInt(document.getElementById("TVAD_import_equip_10").value);
		var j_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_10").value);
		var j_tvad8=parseInt(document.getElementById("TVAD_import_services_10").value);
	
			
		var somme_tvad10=j_tvad1+j_tvad2+j_tvad3+j_tvad4+j_tvad5+j_tvad6+j_tvad7+j_tvad8;
		document.getElementById("total_TVAD_10").value=somme_tvad10;
		
		////////////////////////////////////////////TVA D11//////////////////////////////////////////////
		var k_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_11").value);
		var k_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_11").value);
		var k_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_11").value);
		var k_tvad4=parseInt(document.getElementById("TVAD_locaux_services_11").value);
		var k_tvad5=parseInt(document.getElementById("TVAD_import_biens_11").value);
		var k_tvad6=parseInt(document.getElementById("TVAD_import_equip_11").value);
		var k_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_11").value);
		var k_tvad8=parseInt(document.getElementById("TVAD_import_services_11").value);
		
		var somme_tvad11=k_tvad1+k_tvad2+k_tvad3+k_tvad4+k_tvad5+k_tvad6+k_tvad7+k_tvad8;
		document.getElementById("total_TVAD_11").value=somme_tvad11;
		
		////////////////////////////////////////////TVA D12//////////////////////////////////////////////
		var l_tvad1=parseInt(document.getElementById("TVAD_locaux_biens_12").value);
		var l_tvad2=parseInt(document.getElementById("TVAD_locaux_equip_12").value);
		var l_tvad3=parseInt(document.getElementById("TVAD_locaux_autres_biens_12").value);
		var l_tvad4=parseInt(document.getElementById("TVAD_locaux_services_12").value);
		var l_tvad5=parseInt(document.getElementById("TVAD_import_biens_12").value);
		var l_tvad6=parseInt(document.getElementById("TVAD_import_equip_12").value);
		var l_tvad7=parseInt(document.getElementById("TVAD_import_autres_biens_12").value);
		var l_tvad8=parseInt(document.getElementById("TVAD_import_services_12").value);
	
			
		var somme_tvad12=l_tvad1+l_tvad2+l_tvad3+l_tvad4+l_tvad5+l_tvad6+l_tvad7+l_tvad8;
		document.getElementById("total_TVAD_12").value=somme_tvad12;
	});
	//////////////////////////////////////////////////////////////////////TVA Déductible Prorata//////////////////////////////////////////////////////////////
		$('#tva_deductible_prorata').click(function(){
		////////////////////////////////////////////TVAD PRORATA 1//////////////////////////////////////////////
		var a_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_1").value);
		var a_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_1").value);
			
		var fois_tva_pro1=a_tva_pro1*a_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_1").value=fois_tva_pro1;
		////////////////////////////////////////////TVAD PRORATA 2//////////////////////////////////////////////
		var b_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_2").value);
		var b_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_2").value);
			
		var fois_tva_pro2=b_tva_pro1*b_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_2").value=fois_tva_pro2;	
		////////////////////////////////////////////TVAD PRORATA 3//////////////////////////////////////////////
		var c_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_3").value);
		var c_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_3").value);
			
		var fois_tva_pro3=c_tva_pro1*c_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_3").value=fois_tva_pro3;	
		////////////////////////////////////////////TVAD PRORATA 4//////////////////////////////////////////////
		var d_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_4").value);
		var d_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_4").value);
			
		var fois_tva_pro4=d_tva_pro1*d_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_4").value=fois_tva_pro4;	
		////////////////////////////////////////////TVAD PRORATA 5//////////////////////////////////////////////
		var e_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_5").value);
		var e_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_5").value);
			
		var fois_tva_pro5=e_tva_pro1*e_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_5").value=fois_tva_pro5;	
		////////////////////////////////////////////TVAD PRORATA 6//////////////////////////////////////////////
		var f_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_6").value);
		var f_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_6").value);
			
		var fois_tva_pro6=f_tva_pro1*f_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_6").value=fois_tva_pro6;	
		////////////////////////////////////////////TVAD PRORATA 7//////////////////////////////////////////////
		var g_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_7").value);
		var g_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_7").value);
			
		var fois_tva_pro7=g_tva_pro1*g_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_7").value=fois_tva_pro7;	
		////////////////////////////////////////////TVAD PRORATA 8//////////////////////////////////////////////
		var h_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_8").value);
		var h_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_8").value);
			
		var fois_tva_pro8=h_tva_pro1*h_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_8").value=fois_tva_pro8;	
		
		////////////////////////////////////////////TVAD PRORATA 9//////////////////////////////////////////////
		var i_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_9").value);
		var i_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_9").value);
			
		var fois_tva_pro9=i_tva_pro1*i_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_9").value=fois_tva_pro9;	
		////////////////////////////////////////////TVAD PRORATA 10//////////////////////////////////////////////
		var j_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_10").value);
		var j_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_10").value);
			
		var fois_tva_pro10=j_tva_pro1*j_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_10").value=fois_tva_pro10;	
		////////////////////////////////////////////TVAD PRORATA 11//////////////////////////////////////////////
		var k_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_11").value);
		var k_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_11").value);
			
		var fois_tva_pro11=k_tva_pro1*k_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_11").value=fois_tva_pro11;	
		////////////////////////////////////////////TVAD PRORATA 12//////////////////////////////////////////////
		var l_tva_pro1=parseInt(document.getElementById("TaxeD_fin_prorata_12").value);
		var l_tva_pro2=parseInt(document.getElementById("TaxeD_prorata_12").value);
			
		var fois_tva_pro12=l_tva_pro1*l_tva_pro2;
		document.getElementById("calcul_TVAD_prorata_12").value=fois_tva_pro12;	
	});
	
});

</script>
<div align="center">
<label>CADRAGE DU CHIFFRE D'AFFAIRES													
</label>
<div style="overflow:auto;height:360px;">
<table width="100%" id="tet">
	<tr id="tettd">
		<td width="15%">PERIODE</td>
		<td width="7%">Mois1</td>
		<td width="7%">Mois2</td>
		<td width="7%">Mois3</td>
		<td width="7%">Mois4</td>
		<td width="7%">Mois5</td>
		<td width="7%">Mois6</td>
		<td width="7%">Mois7</td>
		<td width="7%">Mois8</td>
		<td width="7%">Mois9</td>
		<td width="7%">Mois10</td>
		<td width="7%">Mois11</td>
		<td width="7%">Mois12</td>
	</tr>
	<tr>
		<td width="15%">CA tax 0%</td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_0_12"></textarea>
		</td>
	</tr>
	<tr>
		<td width="15%">CA tax 20%</td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_20_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">CA non tax personnes ass</td>
		<td width="7%"><textarea cols="10" id="CA_NT_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NT_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">CA tax 18%</td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_tax_18_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr  bgcolor="blue">
		<td width="15%">TOTAL CA TAXABLE<input type ="button" value="Calculer" id="ca_taxable"/></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_taxable_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		
		<td width="15%">CA non taxable</td>
		<td width="7%"><textarea cols="10" id="CA_NTax_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="CA_NTax_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr  bgcolor="blue">
		<td width="15%">TOTAL CA NON TAXABLE<input type ="button" value="Calculer" id="ca_non_taxable"/></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_ca_NT_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr  bgcolor="red">
		<td width="15%">CA TOTAL<input type ="button" value="Calculer" id="ca_total"/></td>
		<td width="7%"><textarea cols="10" id="total_CA_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_CA_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td width="15%">TVA collectée 20%</td>
		<td width="7%"><textarea cols="10" id="TVAC_20_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_20_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">TVA collectée 18%</td>
		<td width="7%"><textarea cols="10" id="TVAC_18_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_18_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">Autres TVA collectées</td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAC_Autres_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr  bgcolor="blue">
		<td width="15%">TOTAL TVA collectée<input type ="button" value="Calculer" id="total_tva_collectee"/></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAC_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td width="15%">TVA déductible - locaux</td>
	</tr>
	<tr>
		<td width="15%">biens-revente</td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_biens_12"></textarea></td>
		
	</tr>
	<tr>
		<td width="15%">équip/immeuble</td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_equip_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">autres biens</td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_autres_biens_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">services</td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_locaux_services_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td width="15%">TVA déductible - imports</td>
	</tr>
	<tr>
		<td width="15%">biens-revente</td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_biens_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">équip/immeuble</td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_equip_12"></textarea></td>
	</tr>
	<tr>
		<td width="15">autres biens</td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_autres_biens_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">services</td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_import_services_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr  bgcolor="red">
		<td width="15%">TOTAL TVA DEDUCTIBLES<input type ="button" value="Calculer" id="total_tva_deductible"/></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="total_TVAD_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">Taxe déd fins prorata (1) en %</td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_fin_prorata_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">Taux de prorata de déduction (2) en %</td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TaxeD_prorata_12"></textarea></td>
	</tr>
	<tr  bgcolor="blue">
		<td width="15%">TVA déductible prorata (1*2) en %<input type ="button" value="Calculer" id="tva_deductible_prorata"/></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="calcul_TVAD_prorata_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">TVA déductible pour la période</td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVAD_periode_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">REPORT DE CREDIT</td>
		<td width="7%"><textarea cols="10" id="report_credit_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="report_credit_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td width="15%">Solde à régulariser</td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="solde_regulariser_12"></textarea></td>
		
	</tr>
	<tr>
		<td width="15%">TVA à payer</td>
		<td width="7%"><textarea cols="10" id="TVA_paye_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="TVA_paye_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">Crédit de TVA</td>
		<td width="7%"><textarea cols="10" id="credit_TVA_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">Remboursement  de crédit de TVA</td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="remboursement_credit_TVA_12"></textarea></td>
	</tr>
	<tr>
		<td width="15%">Crédit de TVA à reporter</td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_TVA_reporter_12"></textarea></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	<tr>
		<td width="15%">Crédit demandé en rbrst</td>
		<td width="7%"><textarea cols="10" id="credit_demande_1"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_2"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_3"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_4"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_5"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_6"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_7"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_8"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_9"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_10"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_11"></textarea></td>
		<td width="7%"><textarea cols="10" id="credit_demande_12"></textarea></td>
	</tr>
	<input type="text" id="stockage" style="display:none"/>
	
</table>

</div>
</div>