var mission_id;

$(document).ready(
function(e)
	{
		// $("#RA").click(ClickRa);
		$('#RA').click(function(){
			mission_id=$('#tx_mission_id_ra').val();		
			ClickRa(mission_id);
		});



				



	}
);
function ClickRa(mission_id)
{

		$("#contenue").load("./RA/index.php?mission_id="+mission_id);


};


