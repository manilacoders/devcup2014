
<div class="col-md-8 col-md-offset-2">
  <h4>Exam Results</h4>
  <table class="table">
    <tr>
      <td></td>
      <td></td>
      <td>Passed</td>
      <td>Failed</td>
      <td></td>
    </tr>
    <?php foreach($exams as $name => $array): ?>
    <tr>
        <th><?php echo $array['created_at'] ?></th>
        <th><?php echo $name ?></th>
        <td><?php echo $array['passed'] ?></td>
        <td><?php echo $array['failed'] ?></td>
        <td><a href="<?php echo url_for('tempReports/questionResults?exam_id='.$array['id']) ?>">Expand</a></td>
    </tr>
    <?php endforeach; ?>
  </table>

</div>