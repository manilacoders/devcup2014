<?php slot('current_section', 'dashboard') ?>

<?php if ($sf_user->hasFlash('success')): ?>
<div style="margin-top:10px;" class="alert alert-success">
	<?php echo $sf_user->getFlash('success') ?>
</div>
<?php endif ?>

<div class="col-md-2" id="side-nav">
	<ul class="nav nav-stacked">
	  <li class="active">
	    <a href="#" data-target-page="new">
	      New Exam
	    </a>
	  </li>
	  <li class="active">
	    <a href="#" data-target-page="subject">
	      Subjects
	    </a>
	  </li>
	  <li>
	    <a href="#" data-target-page="manage">
	      Manage Exams
	    </a>
	  </li>
	  <li>
	    <a href="#" data-target-page="schedules">
	      Exam Schedules
	    </a>
	  </li>
	  <li>
	    <a href="#" data-target-page="monitoring">
	      Exam Monitoring
	    </a>
	  </li>
	</ul>
</div>

<div class="col-md-10" id="main-panel">
</div>

<?php slot('page_js') ?>
<script>
	$(function() {
		setTimeout(function(){
			$('.alert.alert-success').fadeOut()
		}, 2000);
	});
</script>
<?php end_slot() ?>
