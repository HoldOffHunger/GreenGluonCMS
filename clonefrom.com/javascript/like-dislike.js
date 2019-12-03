$(document).ready(function(event){
	if($('#userid').attr('id')) {
		xmlhttp = undefined;
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {  // code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		var liked = 0;
		var disliked = 0;
		var profile;
		
		$('#thumbs-up-button-container').click(function(e){
			console.log("BT: VOTE!" + id_token + "|");
			if(liked) {
				undoLike();
				
				decrementLikes();
				
				xmlhttp.open('POST','view.json',true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send('action=undoupvote&google_token_id=' + id_token);
			} else {
				if(disliked) {
					decrementDislikes();
				}
				undoDisLike();
				doLike();
				
				incrementLikes();
				
				xmlhttp.open('POST','view.json',true);
				console.log("BT: OPENING action=upvote!");
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send('action=upvote&google_token_id=' + id_token);
			}
		});
		
		$('#thumbs-down-button-container').click(function(e){
			if(disliked) {
				undoDisLike();
				
				decrementDisLikes();
				
				xmlhttp.open('POST','view.json',true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send('action=undodownvote&google_token_id=' + id_token);
			} else {
				if(liked) {
					decrementLikes();
				}
				undoLike();
				doDisLike();
				
				incrementDisLikes();
				
				xmlhttp.open('POST','view.json',true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send('action=downvote&google_token_id=' + id_token);
			}
		});
		
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==XMLHttpRequest.DONE && this.status==200) {
				console.log("BT: Response text!!!" + xmlhttp.responseText + "|");
			//	document.getElementById("txtHint").innerHTML=this.responseText;
			}
		}
		
		function doLike() {
			liked = 1;
			imagesource = $('#thumbs-up-button').attr('src');
			imagesource = imagesource.replace('thumbs-up-right.jpg', 'thumbs-up-right-green.jpg');
			$('#thumbs-up-button').prop('src', imagesource);
		}
		
		function undoLike() {
			liked = 0;
			imagesource = $('#thumbs-up-button').attr('src');
			imagesource = imagesource.replace('thumbs-up-right-green.jpg', 'thumbs-up-right.jpg');
			$('#thumbs-up-button').prop('src', imagesource);
		}
		
		function doDisLike() {
			disliked = 1;
			imagesource = $('#thumbs-down-button').attr('src');
			imagesource = imagesource.replace('thumbs-down-right.jpg', 'thumbs-down-right-red.jpg');
			$('#thumbs-down-button').prop('src', imagesource);
		}
		
		function undoDisLike() {
			disliked = 0;
			imagesource = $('#thumbs-down-button').attr('src');
			imagesource = imagesource.replace('thumbs-down-right-red.jpg', 'thumbs-down-right.jpg');
			$('#thumbs-down-button').prop('src', imagesource);
		}
		
		function incrementLikes() {
			likes_text = $('#total-likes').html();
			likes_text = likes_text.replace(/,/gi, '');
			likes = parseInt(likes_text);
			likes = likes + 1;
			$('#total-likes').html(likes);
		}
		
		function decrementLikes() {
			likes_text = $('#total-likes').html();
			likes_text = likes_text.replace(/,/gi, '');
			likes = parseInt(likes_text);
			likes = likes - 1;
			$('#total-likes').html(likes);
		}
		
		function incrementDisLikes() {
			dislikes_text = $('#total-dislikes').html();
			dislikes_text = dislikes_text.replace(/,/gi, '');
			dislikes = parseInt(dislikes_text);
			dislikes = dislikes + 1;
			$('#total-dislikes').html(dislikes);
		}
		
		function decrementDisLikes() {
			dislikes_text = $('#total-dislikes').html();
			dislikes_text = dislikes_text.replace(/,/gi, '');
			dislikes = parseInt(dislikes_text);
			dislikes = dislikes - 1;
			$('#total-dislikes').html(dislikes);
		}
		
		if($('#likeordislike') && $('#likeordislike').attr('id')) {
			if(parseInt($('#likeordislike').val()))
			{
				doLike();
			}
			else
			{
				doDisLike();
			}
		}
	}
});