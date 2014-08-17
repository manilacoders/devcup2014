<div>
  <table class="table table-bordered">
    <tr>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <!-- <th>Overall Grade Here</th> -->
      <th></th>
    </tr>
    <?php foreach($students as $student): ?>
    <tr>
      <td><?php echo $student['first_name'] ?></td>
      <td><?php echo $student['middle_name'] ?></td>
      <td><?php echo $student['last_name'] ?></td>
      <!-- <td></td> -->
      <td><a href="<?php echo url_for('tempReports/studentStat?student_id='.$student['id']) ?>">Statistics</a></td>
    </tr>
    <?php endforeach ?>
  </table>
</div>