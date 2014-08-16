<form action="" method="POST" class="form-inline" role="form">
	<div class="well">
		<div class="new-exam">
			<div class="form-group">
				<label class="sr-only" for="">Exam Name</label>
				<input type="text" class="form-control" id="" placeholder="Exam Name">
			</div>
			
			<div class="form-group">
				<label class="sr-only" for="">Active At</label>
				<input type="text" class="form-control" id="" placeholder="Active At" name="active_at">
			</div>
			
			<div class="form-group">
				<label class="sr-only" for="">End At</label>
				<input type="text" class="form-control" id="" placeholder="End At" name="end_at">
			</div>

			<a href="#" class="btn btn-primary btn-sm" id="create-new">Create Exam</a>
		</div>

	</div>
	<div class="question hide">
		<div class="row">
			<div class="col-md-12">
				<legend>Add a Question</legend>
				<div class="btn-group btn-group-justified" id="question-type">
				  <div class="btn-group">
				    <a href="#" class="btn btn-default type" data-question-type="multiple">Multiple Choice</a>
				  </div>
				  <div class="btn-group">
				    <a href="#" class="btn btn-default type" data-question-type="essay">Essay Type</a>
				  </div>
				</div>
			</div>
		</div>
		<div class="row" id="generated-questions">
		</div>
	</div>
</form>

<script>
	$('#main-panel #question-type').on('click', '.type', function(e) {
		e.preventDefault();
		var qtype = $(this).data('question-type');
		if (qtype == 'multiple') {
			$('#generated-questions').append('multiple');
		};
		if (qtype == 'essay') {
			$('#generated-questions').append('essay');
		};
	});
</script>