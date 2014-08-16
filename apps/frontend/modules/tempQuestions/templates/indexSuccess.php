<a href="<?php echo url_for('tempQuestions/create?exam_id='.$exam['id']) ?>">Create Question</a> |
<a href="<?php echo url_for('tempQuestions/edit') ?>">Edit Question</a> | 

<br><br>
Exam: <?php echo $exam['name'] ?><br>

<br>
Your Questions Lists:
<ul>
  <?php foreach ($lists as $list): ?>
    <li><?php echo $list['question'] ?>, created_at(<?php echo $list['created_at'] ?>)</li>
  <?php endforeach ?>
</ul>