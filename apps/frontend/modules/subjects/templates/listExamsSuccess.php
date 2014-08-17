<h1 class='page-header'>Student Examination List</h1>

<div class="col-lg-12">
	<legend>Exams and Schedules</legend>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Subject</th>
					<th>Teacher</th>
					<th>Active At</th>
					<th>End At</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($exams as $exam): ?>
				<tr>
					<td>
						<?php echo $exam['name'] ?>
					</td>
					<td>
						<?php echo ucwords($teacher['first_name'] . ' ' . $teacher['last_name']) ?>
					</td>
					<td>
						<?php echo date('Y-m-d g:i a', strtotime($exam['active_at'])) ?>
					</td>
					<td>
						<?php echo date('Y-m-d g:i a', strtotime($exam['end_at'])) ?>
					</td>
					<td>
						<a href="<?php echo url_for('examination/start?exam_id=' . $exam['id']) ?>" class="btn btn-success">Start Exam</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>