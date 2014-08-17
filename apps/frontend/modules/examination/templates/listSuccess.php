<h1 class='page-header'>Student Examination List</h1>

<div class="col-lg-3">
	<legend>Student Info</legend>
	<ul class="list-group">
		<li class="list-group-item">Name: </li>
		<li class="list-group-item">Email: </li>
		<li class="list-group-item">Section: </li>
	</ul>
</div>

<div class="col-lg-9">
	<legend>Subjects</legend>
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
</div>