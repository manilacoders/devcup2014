<div class="col-md-6">
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