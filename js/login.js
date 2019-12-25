$(function(){
	'use strict';
	
	// email and password validation
	var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
	$('input').blur(function(){
		if($(this).attr('type') == "text" && pattern.test($(this).val().trim())){
			$(this).css({
				border : "1px solid green"
			});
		}
		else if ($(this).attr('type') == "text" && !pattern.test($(this).val().trim())){
			$(this).css({
				border : "1px solid red"
			});
		}
		else if ($(this).attr('type') == "password" && $(this).val().trim() == ""){
			$(this).css({
				border : "1px solid red"
			});
		}
		else if ($(this).attr('type') == "password" && $(this).val().trim() != ""){
			$(this).css({
				border : "1px solid green"
			});
		}
	});
	$('#login').click(function(e){
		if(!pattern.test($('#email').val().trim()) || $('#password').val().trim() == ""){
			e.preventDefault();
			$('.info-message').slideDown(50, function() {
				$(this).find('p').text('Please enter a valid informations');
			});
		}
	});
});