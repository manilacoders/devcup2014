<h5>Question Successfully added.</h5>
<div class="help-block">Please wait...</div>

<?php slot('page_js') ?>
<script>
	$(function() {
		setTimeout(function(){
			window.location.href = "<?php echo url_for('dashboard') ?>";
		}, 1000);
	});
</script>
<?php end_slot() ?>