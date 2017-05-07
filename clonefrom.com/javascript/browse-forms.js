$(document).ready(function(event){
	if($('#perpage').val() == 'custom') {
		$('#CustomPerPage').show();
	} else {
		$('#CustomPerPage').hide();
	};
	$('#perpage').change(function() {
		if($(this).val() == 'custom') {
			$('#CustomPerPage').show();
		} else {
			$('#CustomPerPage').hide();
		}
	});
});