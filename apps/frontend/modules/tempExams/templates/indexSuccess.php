<a href="<?php echo url_for('tempExams/create') ?>">Create Exam</a> |
<a href="<?php echo url_for('tempExams/edit') ?>">Edit Exam</a> | 


<br><br>
Your Exam Lists:
<ul>
  <?php foreach ($lists as $list): ?>
    <li><?php echo $list['name'] ?>, created_at(<?php echo $list['created_at'] ?>) [<a href="<?php echo url_for('tempQuestions/index?exam_id='.$list['id']) ?>">Create Questions</a>]</li>
  <?php endforeach ?>
</ul>