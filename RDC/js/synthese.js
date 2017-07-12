
function getValidationSynthese(cycle, mission, callback) {
	$.ajax({
		type    : 'POST',
		url     : 'RDC/verification_validation_synthese.php',
		data    : {
			mission_id         : mission,
			synthese_cycle_rdc : cycle
		},
		success : function(e){
			callback(e);
		}
	});
}

function getSynthese(cycle, mission, callback) {
	$.ajax({
		type    : 'POST',
		url     : 'RDC/fixation_synthese.php',
		data    : {
			mission_id         : mission,
			synthese_cycle_rdc : cycle
		},
		success : function(e) {
			callback(e);
		}
	});
}

function validerSynthese(cycle, mission, synthese, callback) {
	$.ajax({
		type    : 'POST',
		url     : 'RDC/valider_synthese.php',
		data    : {
			synthese_cycle_rdc : cycle,
			synthese           : synthese,
			mission_id         : mission
		},
		success : function(e){
			callback(e);
		}
	});
}
