$(function(){
	'use strict';
	// changing dashboard content depending on list
	$('#navbar ul li').click(function(){
		$('#navbar ul').find('.active').removeClass('active');
		$(this).addClass('active');
		// changing the title
		if($(this).text() !== "view posts" && $(this).text() !== "log out"){
			$('#operation').text($(this).text());
		}
		if($(this).text() == "view posts"){
			$('.post-managements').hide(100);
			$('.grid').show(100);
		}
		else if ($(this).text() == "add post"){
			$('.post-managements').show(100);
			$('.grid').hide(100);
			$('#post-select').show(); 
			$('.post-select').hide(); 
			$('#btn-op').text($(this).text());
		}
		else if ($(this).text() == "edit post" || $(this).text() == "delete post") {
			// show the select title
			$('.post-managements').show(100);
			$('.grid').hide(100);
			$('#post-select').hide(); 
			$('.post-select').show();
			$('#btn-op').text($(this).text());
		}
	});
	// admin log out
	$('#logout').click(function(){
		window.location.href = "logout.php";
	});

	// post ajax managements
	$('#btn-op').click(function(e){
		e.preventDefault();
		if($(this).text() == 'add post'){
			$.ajax({
				url: 'configs/postManagement.php',
				type: 'POST',
				dataType: 'html',
				data: {
					operation: $(this).text(),
					title : $('#post-title').val(),
					content : $('#content').val(),
					img_url : $('#img_url option:selected').text(),
					type : $('#type option:selected').text(),
					date : $('#date').val(),
					user_id : $('#session').data('value')
				},
				success : function(result){
					alert(result);
				}
			});
			
		}
		else if ($(this).text() == 'edit post'){
			$.ajax({
				url: 'configs/postManagement.php',
				type: 'POST',
				dataType: 'html',
				data: {
					operation: $(this).text(),
					title : $('.post-title option:selected').text(),
					content : $('#content').val(),
					img_url : $('#img_url option:selected').text(),
					type : $('#type option:selected').text(),
					date : $('#date').val(),
					user_id : $('#session').data('value')
				},
				success : function(result){
					alert(result);
				}
			});
			
		}
		else if ($(this).text() == 'delete post'){
			$.ajax({
				url: 'configs/postManagement.php',
				type: 'POST',
				dataType: 'html',
				data: {
					operation: $(this).text(),
					title : $('.post-title option:selected').text()
				},
				success : function(result){
					alert(result);
				}
			});
			
		}
	});
	// getting values to edit posts via ajax
	var img_url_html = $('#img_url').html();
	var post_type = $('#type').html();
	$('.post-title').change(function(){
		$.ajax({
				url: 'configs/postInfo.php',
				type: 'POST',
				dataType: 'html',
				data: {
					title : $('.post-title option:selected').text()
				},
				success : function(result){
					var array = JSON.parse(result);
					$('#img_url').html('').html("<option value="+array['img_url']+">"+array['img_url']+"</option>" + img_url_html);
					$('#type').html('').html("<option value="+array['type']+">"+array['type']+"</option>" + post_type);
					$('#date').val(array['date']);
					$('#content').val(array['content']);
				}
			});
	});
});