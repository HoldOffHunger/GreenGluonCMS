$(document).ready(function(event, cancel){
	$('.list-item-row-level-1, .list-item-row-level-2, .list-item-row-level-3, .list-item-row-level-4, .list-item-row-level-5, .list-item-row-level-6').click(function(event) {
		return false;
	});
	$('.list-item-row-level-1, .list-item-row-level-2, .list-item-row-level-3, .list-item-row-level-4, .list-item-row-level-5, .list-item-row-level-6').mousedown(function(event) {
		var listlevelclass = $(this).attr('class');
		var listlevelnumber = parseInt(listlevelclass.split('-')[4]);
		var nextlistlevelnumber = listlevelnumber + 1;
		var nextlistlevelclass = 'list-level-' + nextlistlevelnumber;
		var nextlevellist = $(this).find('.' + nextlistlevelclass);
		if($(nextlevellist).attr('class')) {
			if($(nextlevellist).is(':visible'))
			{
				$(nextlevellist).hide();
			}
			else
			{
				$(nextlevellist).show();
			}
			return false;
		}
		else
		{
			var linkclass = 'list-item-link-level-' + listlevelnumber;
			var linkelement = $(this).find('.' + linkclass);
			switch(event.which)
			{
				case 1:
					window.location.href = linkelement.attr('href');
					break;
					
				case 2:
					window.open(linkelement.attr('href'), '_blank');
					break;
			}
			return false;
		}
	});
});