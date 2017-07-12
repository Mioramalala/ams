

function PositionProcess(id,annee,type){
	$.ajax({
		type:'post',
		url:'detailPosition.php',
		data:{id:id},
		success:function(e){
			$('#nom_societe span').html('<strong>'+e+'</strong>');
			$('#nom_mission span').html('<strong>'+type+' '+annee+'<strong>');
			$('#nom_process span').html('<strong>R.S.C.I</strong>');
		}
	});
}
function PreProcess(id,annee,type){
	$.ajax({
		type:'post',
		url:'detailPosition.php',
		data:{id:id},
		success:function(e){
			$('#nom_societe span').html('<strong>'+e+'</strong>');
			$('#nom_mission span').html('<strong>'+type+' '+annee+'<strong>');
		}
	});
}
function NameProcess(id){
	$.ajax({
		type:'post',
		url:'detailPosition.php',
		data:{id:id},
		success:function(e){
			$('#nom_societe span').html('<strong>'+e+'</strong>');
		}
	});
}
function CycleProcess(arg){
	var cycle = ($('#'+arg).text()) ? $('#'+arg).text() : $('#'+arg).val();
	console.log("ity ilay cycle "+cycle);
	$('#nom_cycle span').html('<strong>'+cycle +'</strong>');
}
function positionCycle(number){
	var processus = "";
	switch(number){
		case 1:
			processus="R.S.C.I";
			break;
		case 2:
			processus="R.A";
			break;
		case 3:
			processus="R.D.C";
			break;
		case 4:
			processus="Rapports intermédiaires";
			break;
		case 5:
			processus="Rapports définitifs";
			break;
		case 6:
			processus="Références & archives";
			break;
		default:
			processus="";
	}
	$('#nom_process span').html('<strong>'+processus+'</strong>');
	$('#nom_cycle span').text('');
}
function waiting()
{
	$('<div id="waiting"></div><div id="loading"><center><img src="RDC/paie/ajax-loader_blue.gif"/><br /><strong style="color: #095487;">Veuillez patienter ...</strong></center></div>').prependTo('#Acc');
}
function stopWaiting(){
	$('#waiting').remove();
	$('#loading').remove();
}