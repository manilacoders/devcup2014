<?php slot('current_section', 'reports') ?>

<div class="col-md-5">
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

<input class="hide" id="data" value="<?php echo $data ?>">

<div class="col-md-7">
  <canvas id="examResults" width="700" height="400"></canvas>
</div>

<?php slot('page_js') ?>
  <script>
    $(function() {
      var data = $('#data').val();
      var ctx = document.getElementById("examResults").getContext("2d");
      var myNewChart = new Chart(ctx).Bar(JSON.parse(data));
    });
  </script>
<?php end_slot() ?>