<a class="btn btn-danger btn-sm" href="<?php echo url_for('tempExams/index') ?>">Go Back</a>
<a class="btn btn-success btn-xsm" href="<?php echo url_for('tempQuestions/create?exam_id='.$exam['id']) ?>">Create Question</a>

<br><br>
<h5>Exam Name: <?php echo $exam['name'] ?></h5><br>

<h4>Your Questions Lists:</h4>
<table class="table">
  <tr>
    <th></th>
    <th>Title</th>
    <th>Created Date</th>
  </tr>
  <?php foreach ($lists as $list): ?>
  <tr>
    <td><a href="<?php echo url_for('tempQuestions/edit?question_id='.$list['id']) ?>">Edit</a></td>
    <td><?php echo $list['question'] ?></td>
    <td><?php echo $list['created_at'] ?></td>
  </tr>
  <?php endforeach ?>
</table>