<?php slot('current_section', 'reports') ?>

<div class="col-md-8 col-md-offset-2">
  <a href="<?php echo url_for('tempReports/examResults') ?>" class="btn btn-xsm">Go Back</a><br>
  <h4>Question Results</h4>
  <table class="table">
    <tr>
      <td></td>
      <td>Passed</td>
      <td>Failed</td>
    </tr>
    <?php foreach($questions as $name => $array): ?>
    <tr>
        <th><?php echo $array['name'] ?></th>
        <td><?php echo $array['passed'] ?></td>
        <td><?php echo $array['failed'] ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

</div>