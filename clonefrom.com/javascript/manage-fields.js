$(document).ready(function(event){
	var addfunction = function(event) {
		switch(event.which)
		{
			case 1:
			case 2:
			case 13:
			case 32:
				var repeat = 1;
				
				if(event.shiftKey)
				{
					repeat = 100;
				}
				else if(event.altKey)
				{
					repeat = 50;
				}
				else if(event.ctrlKey)
				{
					repeat = 10;
				}
				var type = getType($(this).attr('id'));
				var indexid = type + '-list';
				var hiddenid = 'hidden-' + type + '-input';
				
				for(i = 0; i < repeat; i++)
				{
					inputbox = $('#' + hiddenid).clone();
					
					var inputelement = $(inputbox).find('[name$="-Hidden"]').each(function(j, obj) {
						$(obj).attr('name', $(obj).attr('name').replace('-Hidden','') + '[]');
					});
					
					$(inputbox).find('[id="delete-' + type + '-button"]').bind( "click", removeTypeFieldFunction);
					$(inputbox).show();
					
					$('#' + indexid).append(inputbox);
				}
				
				$(this).blur();
				
				return false;
		}
		return true;
	};
	
	var removeTypeFieldFunction = function removeTypeField(event, element) {
		if(!element)
		{
			element = $(this).parent('div');
		}
		
		switch(event.which)
		{
			case 1:
			case 2:
			case 13:
			case 32:
				element.remove();
				break;
		}
	};
	
	$('[id^="add-"][id$="-button"]').mousedown(".mousedown", addfunction);
	$('[id^="add-"][id$="-button"]').keypress(".keypress", addfunction);
	$('[id^="delete-"][id$="-button"]').mousedown(".mousedown", removeTypeFieldFunction);
	
	function getType(id) {
		return id.replace('add-', '').replace('-button','');
	}
	
	document.addEventListener("paste", function (event) {
		if(event.target.type == 'text')
		{
			var pastedText = undefined;
			
			if (window.clipboardData && window.clipboardData.getData)
			{ // IE
				pastedText = window.clipboardData.getData('Text');
			}
			else if (event.clipboardData && event.clipboardData.getData)
			{
				pastedText = event.clipboardData.getData('text/plain');
			}
			
			var lines = pastedText.split(/\n/);
			
			if(lines.length > 1)
			{
				event.target.value = '';
				
				var fields = $('.' + event.target.className + ':visible');
				
				for(i = 0; i < fields.length; i++)
				{
					field = fields[i];
					line = lines[i];
					$(field).val(line);
				}
				
				event.preventDefault();
				return false;
			}
		}
	});
});