<a href="<?php echo url_for('temQuestions/create') ?>">Create Exam</a> |
<a href="<?php echo url_for('temQuestions/edit') ?>">Edit Exam</a> | 


<br><br>
Exam: <?php $exam['name'] ?><br>

<br>
Your Questions Lists:
<ul>
  <?php foreach ($lists as $list): ?>
    <li><?php echo $list['name'] ?>, created_at(<?php echo $list['created_at'] ?>) [<a href="<?php echo url_for('tempQuestions/index?exam_id='.$list['id']) ?>">Create Questions</a>]</li>
  <?php endforeach ?>
</ul>