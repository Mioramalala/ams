$(function(){
	$('#id_Exporter').click(function(){
		var adresse = $('#id_Text').val();		
		$.ajax({
			type:'POST',
			url:'php/export_Excel.php',
			data:{adresse:adresse},
			success:function(e){
				alert(e);
			}
		});
	});
});