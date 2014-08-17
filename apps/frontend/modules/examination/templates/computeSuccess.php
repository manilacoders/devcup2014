<div class="col-md-6 col-md-offset-4">
  <h3>Exam successfully done!</h3>
  <h4>Score: <?php echo $exam_result['correct_count'] ?> / <?php echo $exam_result['question_count'] ?></h4>
  <h4>Percentage: <?php echo $exam_result['score'] ?>%</h4>
  <a class="btn btn-success" href="<?php echo url_for('examination/list') ?>">Go Back to Examination List</a>
</div>