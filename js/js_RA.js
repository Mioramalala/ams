$(document).ready(
    function(e) {
        //$("#RA").click(ClickRa);
    }
);

function click_sousMenueREvue(lien, mission_id) {
	waiting();
    $("#contenue").load(lien + '?mission_id=' + mission_id, function(){
    	stopWaiting();
    });
    
}


function circularisation(type) {
    window.open('ams-mvc/index.php?type=' + type, '_blank');
}