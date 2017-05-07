$(document).ready(function(event){
	$('#generate-primary-host-records').mousedown(".mousedown", function(event) {
	//	console.log("BT: Clicky!!!");
		var fields = [
			'Author',
			'BaseTemplate',
			'Classification',
			'Contact',
			'Contributor',
			'Copyright',
			'Creator',
			'NewsKeywords',
			'PublicReleaseDate',
			'Publisher',
			'Rights',
			'Subject',
			'ApplicationName',
			'PrimaryImageLeft',
			'PrimaryImageRight',
		];
		
		$('.recordkey').each(function() {
			var index = fields.indexOf($(this).val());
			
			if(index > -1) {
				fields.splice(index, 1);
			}
		});
		
		console.info(fields);
		
		// RecordKey[]
		
		var inputrecordtemplate = $('#hidden-record-input');
		
		console.info(inputrecordtemplate);
		
		for (i = 0; i < fields.length; i++) { 
			field = fields[i];
			
			var fielddivelement = inputrecordtemplate.clone();
			var recordkeyelement = fielddivelement.find('[name="RecordKey-Hidden[]"]');
			recordkeyelement.attr('name', 'RecordKey[]');
			
			$(fielddivelement).attr('id', 'record-input');
			$(fielddivelement).find('[name="RecordKey-Hidden"]').attr('name', 'RecordKey[]');
			$(fielddivelement).find('[name="RecordValue-Hidden"]').attr('name', 'RecordValue[]');
			$(fielddivelement).find('[name="RecordKey[]"]').val(field);
			console.log("BT: Bind?...|" + field + "|");
			bindRemoveButton(event, fielddivelement);
			
			$(fielddivelement).show();
			
			$('#record-list').append(fielddivelement);
		}
	//	$(document).on( 'click', '.delete-record-button', function(event){
	});
	
	function bindRemoveButton(event, fielddivelement) {
		$(fielddivelement).find('.delete-record-button').bind( "click", function(event) {
		//	console.log("BT: Bind...|" + field + "|");
			removeTypeField(event, fielddivelement);
			event.preventDefault();
		});
	}
	
	function removeTypeField(event, element) {
		console.log("BT: GO!...|" + event.which + "|");
		console.info(event.which);
		console.info(element);
		console.log(element.attr('id'));
		switch(event.which)
		{
			case 1:
			case 2:
				console.log("DELETED!");
				$(element).remove();
				break;
		}
	}
});