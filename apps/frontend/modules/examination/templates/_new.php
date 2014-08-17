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
</form>

<form action="" method="POST" class="form-horizontal" role="form">
	<div class="question hide">
		<div class="row">
			<div class="col-md-12">
				<legend>
					Question
				</legend>
				<div class="btn-group">
					<a href="#" class="btn btn-primary" id="question-type">Add Question</a>
				</div>
				<div class="btn-group">
					<a href="#" class="btn btn-success pull-right">Done</a>
				</div>
			</div>
		</div>
		<div class="row" id="generated-questions">
		</div>
	</div>
</form>

<script>
	$('#main-panel').on('click', ' #question-type', function(e) {
		e.preventDefault();
		var qtype = $(this).data('question-type');
		$.ajax({
			url: '/examination/getQuestionTemplate',
			type: 'POST',
			dataType: 'html',
			data: {
				temp: 'multiple'
			},
		})
		.done(function(html) {
			$('#generated-questions').append(html);
		});
	});
</script>