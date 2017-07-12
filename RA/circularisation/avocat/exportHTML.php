<html>
	<head>
	</head>
	
	<body>
	<?php
		require_once('path_to_phpdocx/classes/createDocx.inc');
		docx = new CreateDocx();
	
		$html = '<p>A <span style="font-weight: bold">very simple</span> HTML example.</p>';
		$docx->embedHTML($html);
		$docx->createDocx('embedHTML_1'); 
	?>
	</body>
</html>




