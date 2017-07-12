<div id="popup_vente" class="popup_block">
	<?php   
		$cycle="vente";
		$req = $bdd->prepare('SELECT flowchart_filename FROM tab_flowchart_cycle_achat WHERE mission_id = :mission_id AND flowchart_cycle = :cycle');
		$req->execute(array(    
							'cycle'       => $cycle,
							'mission_id' => $mission_id
						));
		if($donnee = $req->fetch() )
			if($donnee['flowchart_filename']!="") {
				$extension = substr($donnee['flowchart_filename'], strripos($donnee['flowchart_filename'], '.'));
				$img = 'images.jpg';
				if($extension==".xlsx" || $extension==".xls")
					$img = 'excel.png';
				elseif($extension==".docx" || $extension==".doc")
					$img = 'word.png';
				elseif($extension==".pdf" )
					$img = 'pdf.jpg';
				elseif($extension==".txt" || $extension==".text")
					$img = 'text.jpg';
				$path = "RSCI/assets/uploads/flowchart/";
			?>
				<div class="container-img" style="width: 200px;height:200px; margin-bottom: 50px;">
					<a target='_blank' href="includes/google_docs_viewer.php?id=<?= $path.$donnee['flowchart_filename'] ?>&amp;nomfichier=<?= $donnee['flowchart_filename'] ?>" title="cliquer pour visualiser"> <img src="RSCI/assets/icons/<?= $img ?>" alt="icon" /> </a>
					<a target='_blank' href="includes/google_docs_viewer.php?id=<?= $path.$donnee['flowchart_filename'] ?>&amp;nomfichier=<?= $donnee['flowchart_filename'] ?>">Visionner le document</a>
				</div>	
					
		<?php
		}
	?>
	<form id="form-popup" enctype="multipart/form-data" method="post" action="../RSCI/traitement/upload.php" target="uploadFrame" >	
			<input type="hidden" name="cycle" value="<?= $cycle ?>" />
			<input type="hidden" name="mission_id" value="<?= $mission_id ?>" />
			<input type="file" name="fichier"/>
			<input type="submit" class="bouton-md send" value="envoyer"  style="width: 250px; margin-top: 100px;"/>
	</form>
</div>

<script type="text/javascript">	
	$('.send').click( function(){
 		setTimeout(
		    function () {
		        $('#fade , .popup_block').fadeOut(function() {
					$('#fade, a.close').remove();  //...ils disparaissent ensemble (popop)					
				});
		        $('#bt_ret_menu_index').trigger('click');				
		    },
		    2000
		);

	});	
	

	
</script>
