<?php 
//session_start();
$mission_id=$_GET['mission_id'];
?>


<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="js_menue.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
		
		</script>
	</head>
	
	<body>
	</br>
		<div>
			<table id="dv_autre" style = "border:1px; width:400px; height:50px;">
				<tr>
					<td class = "td_nom">
						<iframe src="RA/repertoire_ifram.php?mission_id=<?php //echo $mission_id; ?>" width="700" height="150"  >	
					</td>	
				</tr>
			</table>
		</div>
	</body>
</html>