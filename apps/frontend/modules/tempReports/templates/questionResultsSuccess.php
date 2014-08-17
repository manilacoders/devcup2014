<?php slot('current_section', 'reports') ?>

<div class="col-md-5">
  <a href="<?php echo url_for('tempReports/examResults') ?>" class="btn btn-xsm">Go Back</a><br>
  <h4>Question Results</h4>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Passed</th>
        <th>Failed</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($questions as $name => $array): ?>
    <tr>
        <td><?php echo $array['name'] ?></td>
        <td><?php echo $array['passed'] ?></td>
        <td><?php echo $array['failed'] ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
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