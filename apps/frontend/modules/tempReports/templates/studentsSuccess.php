<?php slot('current_section', 'reports') ?>

<div>
  <legend>Student Records</legend>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <!-- <th>Overall Grade Here</th> -->
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($students as $student): ?>
    <tr>
      <td><?php echo $student['first_name'] ?></td>
      <td><?php echo $student['middle_name'] ?></td>
      <td><?php echo $student['last_name'] ?></td>
      <!-- <td></td> -->
      <td>
        <a href="<?php echo url_for('tempReports/studentStat?student_id='.$student['id']) ?>"  class="btn btn-success">Statistics</a></td>
    </tr>
    <?php endforeach ?>
    </tbody>
  </table>
</div>