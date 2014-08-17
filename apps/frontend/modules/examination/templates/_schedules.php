<div class="col-md-12">
  <table class="table">
    <tr>
      <th>Exam Title</th>
      <th>Active On</th>
      <th>End On</th>
    </tr>
    <?php foreach ($exams as $exam): ?>
    <tr>
      <td><?php echo $exam['name'] ?></td>
      <td><?php echo date('F j, Y g:i a', strtotime($exam['active_at'])) ?></td>
      <td><?php echo date('F j, Y g:i a', strtotime($exam['end_at'])) ?></td>
    </tr>
    <?php endforeach ?>
  </table>
</div>