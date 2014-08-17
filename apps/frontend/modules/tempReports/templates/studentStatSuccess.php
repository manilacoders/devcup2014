<?php slot('current_section', 'reports') ?>

<div class="col-md-5">
  <a href="<?php echo url_for('tempReports/students') ?>" class="btn btn-xsm">Go Back</a><br>
  <legend>Student Records</legend>
  <table class="table table-bordered">
    <tr>
      <th>Subjects</th>
      <th>Percent</th>
    </tr>
    <?php foreach($subjects as $name => $subject): ?>
    <tr>
      <td><?php echo $name ?></td>
      <td><?php echo number_format($subject['total'], 2) ?>%</td>
    </tr>
    <?php endforeach ?>
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