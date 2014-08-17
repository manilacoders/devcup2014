<div class="well well-sm">
	<form action="subjects/createNew" method="POST" class="form-inline" role="form">

		<div class="form-group">
			<label class="sr-only" for="subject">Subject Name</label>
			<input name="subject" class="form-control" placeholder="Subject">
		</div>

		<button type="submit" class="btn btn-primary">Add New Subject</button>
	</form>
</div>
<hr>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Subject Name</th>
				<th>Created Date</th>
				<th>Updated Date</th>
			</tr>
		</thead>
		<tbody>
			<!-- populate -->
			<?php foreach ($subjects as $subject): ?>
				<tr>
					<td><?php echo $subject['name'] ?></td>
					<td><?php echo $subject['created_at'] ?></td>
					<td><?php echo $subject['updated_at'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>