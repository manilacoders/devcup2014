<div class="col-md-12">
	<table class="table">
    <tr>
      <th>Exam Title</th>
      <th>Created At</th>
    </tr>
    <?php foreach ($exams as $exam): ?>
    <tr>
      <td><?php echo $exam['name'] ?></td>
      <td><?php echo date('F j, Y g:i a', strtotime($exam['created_at'])) ?></td>
    </tr>
    <?php endforeach ?>
  </table>
</div>