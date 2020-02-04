var id_token;

function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();
	console.log('Hello, ' + profile.getEmail() + '.  We\'ve been waiting for you.');
	id_token = googleUser.getAuthResponse().id_token;
	
	if($('#logout').val()) {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {
			console.log('Signed out of Google.');
			$('#logout').val('');
			$('#comment-form').submit();
			
			var redirect = $('#redirect').val();
			
			if(redirect.length > 0) {
				console.log('Redirecting to: ' + redirect);
				
				window.location.href = redirect;
				
				return true;
			}
		});
	} else if(id_token && !$('#userid').val()) {
		$('#google_token_id').val(id_token);
		$('#submit').click();		// We hate you, Google.
		return true;
	}
}

$(document).ready(function(event){
	$('#comment-form').submit(function(e) {
		if(!$('#userid') && $('#userid').attr('id') && $('#userid').val() && !$('#google_token_id').val()) {
			if(!$('#Comments').val() || ($('#Username').prop('id') && !$('#Username').val())) {
				$('#error-box').show();
				
				var fields = [];
				
				if(!$('#Comments').val()) {
					fields.push('Comments');
				}
				
				if($('#Username').prop('id') && !$('#Username').val()) {
					fields.push('Username');
				}
				
				$('#validation-error-message').html('<p>There was an error.  You are missing: ' + fields.join(', ') + '</p>');
				return false;
			}
		}
		return true;
	});
});