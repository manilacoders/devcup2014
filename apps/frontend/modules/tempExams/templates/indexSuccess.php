<a class="btn btn-default btn-sm" href="<?php echo url_for('tempExams/create') ?>">Create New Exam</a>


<br><br>
<h4>Your Exam Lists:</h4>
<table class="table">
  <tr>
    <th></th>
    <th>Title</th>
    <th>Created Date</th>
    <th>No.&nbsp;Questions</th>
    <th></th>
  </tr>
  <?php foreach ($lists as $list): ?>
  <tr>
    <td>
      <a href="<?php echo url_for('tempExams/edit?exam_id='.$list['id']) ?>">Edit</a>
    </td>
    <td><?php echo $list['name'] ?></td>
    <td><?php echo $list['created_at'] ?></td>
    <td><?php echo $list['q_count'] ?></td>
    <td>
      <a class="pull-right" href="<?php echo url_for('tempQuestions/index?exam_id='.$list['id']) ?>">View Questions</a>
    </td>
  </tr>
  <?php endforeach ?>
</table>