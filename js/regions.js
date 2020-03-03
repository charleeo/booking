function getRegions(selected) {
	if (typeof selected === undefined) {
		var selected = '';
	}
	var states = document.getElementById('states').value;
	jQuery.ajax({
		url: './users/queryclasses/local_governments_areas.php',
		type: 'GET',
		data: { states: states, selected: selected },
		success: function(data) {
			jQuery('#lga').html(data);
		},
		error: function() {
			alert('Invalid request to local government');
		}
	});
}
jQuery('select[name ="states"]').change(function() {
	getRegions();
});