$(function() {
	console.log('ready');
	$('#side-nav').on('click', 'li', function(e) {
		e.preventDefault();
		var page = $(this).find('a').data('target-page');
		$.ajax({
			url: 'examination/getPage',
			type: 'POST',
			dataType: 'html',
			data: {
				'page': page
			},
		})
		.done(function(html) {
			$('#main-panel').empty().append(html);
		});
		
	});

	$('#main-panel').on('click', '#create-new', function(e) {
		e.preventDefault();
		$('.new-exam').find('input').attr('disabled', 'disabled');
		$('.question').removeClass('hide');
	});

});