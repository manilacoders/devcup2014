<div class="row">
  <div class="col-md-12">
    <?php if ($sf_user->hasFlash('error_head')): ?>
    <div class="alert alert-danger">
      <?php echo $sf_user->getFlash('error_head') ?>
    </div>
    <?php endif ?>
    <?php if ($sf_user->hasFlash('success_head')): ?>
    <div class="alert alert-success">
      <?php echo $sf_user->getFlash('success_head') ?>
    </div>
    <?php endif ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <?php if ($sf_user->hasFlash('success')): ?>
    <div class="alert alert-success">
      <?php echo $sf_user->getFlash('success') ?>
    </div>
    <?php endif ?>
    <form method="POST">
      <input class="form-control" type="text" name="first_name" placeholder="First Name"><br>
      <input class="form-control" type="text" name="middle_name" placeholder="Middle Name"><br>
      <input class="form-control" type="text" name="last_name" placeholder="Last Name"><br>
      <input class="form-control" type="email" name="email" placeholder="Email"><br>
      <input class="form-control" type="password" name="password" placeholder="Password"><br>
      <input class="btn btn-success" type="submit" value="Submit">
    </form>
  </div>

  <div class="col-md-6">
    <table class="table table-bordered">
      <tr>
        <th>Student Code</th>
        <th>Student Name</th>
        <th>Email</th>
        <th></th>
      </tr>
      <?php foreach($students as $student): ?>
      <tr>
        <td></td>
        <td><?php echo $student['first_name'] ?>&nbsp;<?php echo $student['middle_name'] ?>&nbsp;<?php echo $student['last_name'] ?></td>
        <td><?php echo $student['email'] ?></td>
        <td>
          <a href="">Update</a>
          <!-- <a href="<?php echo url_for('students/delete?student_id='.$student['id']) ?>">Delete</a> -->
        </td>
      </tr>
      <?php endforeach ?>
    </table>
  </div>
</div>