<form action="" method="POST" class="form-horizontal" role="form">
	<div class="create-new">
		<div class="row">
			<legend>Exam Details</legend>
			<div class="well">
				<div class="new-exam">
					<div class="form-group">
						<label class="control-label col-md-2">Exam Name</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="Exam Name">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-2">Active At</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="Active At" name="active_at">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-2">End At</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="End At" name="end_at">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-2">Subject</label>
						<div class="col-md-6">
							<select name="subject" class="form-control">
								<option value="">-- Select Subject --</option>
								<?php foreach ($subjects as $subject): ?>
									<option value="<?php echo $subject['id'] ?>"><?php echo $subject['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="question">
		<div class="row">
			<div class="col-md-12">
				<legend>
					Questions
				</legend>
				<div class="row" id="generated-questions">
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="btn-group">
							<a href="#" class="btn btn-primary" id="question-type">Add Question</a>
						</div>
						<div class="btn-group">
							<a href="#" class="btn btn-success pull-right">Create New Exam</a>
						</div>
					</div>
				</div>
			</div>
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