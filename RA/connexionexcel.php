<?php 
	//////////////////////////////local//////////////////////////////////////////
	//$conn = mysql_connect("","root","");
	//mysql_select_db("tmsconsuams",$conn);
	
	///////////////////////////////////prod///////////////////////////////////////
	 $connex='localhost';
		
	 $conn = mysql_connect($connex,"root","");
	 mysql_select_db("tmsconsuams",$conn);
	/////////////////////////////////////test///////////////////////////////////
	// $connex='mysql51-57.pro';
		
	// $conn = mysql_connect($connex,"tmsconsumuzik","YvCaBUYVU67V");
	// mysql_select_db("tmsconsumuzik",$conn);
?>