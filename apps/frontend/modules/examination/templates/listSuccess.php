<h1 class='page-header'>Student Examination List</h1>

<div class="col-lg-3">
	<legend>Student Info</legend>
	<ul class="list-group">
		<li class="list-group-item">Name: <?php echo ucwords($student['first_name'] . ' '. $student['last_name']) ?></li>
		<li class="list-group-item">Email: <?php echo $student['email'] ?></li>
		<li class="list-group-item">Section: <?php echo $section['name'] ?></li>
	</ul>
</div>

<div class="col-lg-9">
	<legend>Subjects</legend>
	<?php if (! empty($subjects)): ?>
		<div class="help-block">
			Please select your exam.
		</div>
		<ul class="list-group">
		<?php foreach ($subjects as $subj): ?>
			<li class="list-group-item">
				<a href="<?php echo url_for('subjects/list?id=' . $subj['id']) ?>"><?php echo $subj['name'] ?></a>
			</li>
		<?php endforeach ?>
		</ul>
	<?php else: ?>
		<p>No Subject Available.</p>
	<?php endif ?>
</div>