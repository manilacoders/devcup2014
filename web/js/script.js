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
			$('#main-panel div, form').remove();
			$('#main-panel').append(html);
		});
		
	});

	$('#main-panel').on('click', '#create-new', function(e) {
		e.preventDefault();
		console.log('clicked 1');
		$('.question').removeClass('hide');
	});

});