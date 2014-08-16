$(function() {
	console.log('ready');
	$('#side-nav').on('click', 'li', function(e) {
		e.preventDefault();
		var page = $(this).find('a').data('target-page');
	});
});