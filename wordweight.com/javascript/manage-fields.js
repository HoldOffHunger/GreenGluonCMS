$(document).ready(function(event){
	$('[id^="add-"][id$="-button"]').mousedown(".mousedown", function(event) {
		switch(event.which)
		{
			case 1:
			case 2:
				var type = getType($(this).attr('id'));
				var hiddenid = 'hidden-' + type + '-input';
				var inputbox = $('#' + hiddenid).clone();
				var indexid = type + '-list';
				
				var inputelement = $(inputbox).find('[name$="-Hidden"]');
				var inputelementname = $(inputelement).attr('name').replace('-Hidden','') + '[]';
				$(inputelement).attr('name', inputelementname);
				
				$(inputbox).find('[id="delete-' + type + '-button"]').bind( "click", function(event) {
					removeTypeField(event, inputbox);
				});
				$(inputbox).show();
				
				$('#' + indexid).append(inputbox);
				break;
		}
		return false;
	});
	
	$('[id^="delete-"][id$="-button"]').mousedown(".mousedown", function(event) {
		removeTypeField(event, $(this).parent('.input-divider'));
		return false;
	});
	
	function getType(id) {
		return id.replace('add-', '').replace('-button','');
	}
	
	function removeTypeField(event, element) {
		switch(event.which)
		{
			case 1:
			case 2:
				element.remove();
				break;
		}
	}
});