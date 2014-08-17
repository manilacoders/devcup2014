Choice:<br>
<form method="POST">
  <input type="text" name="type" value="choice"><br>
  <input type="text" name="question" placeholder="Question"><br>
  Choices:<br>
  <input type="text" name="choices[key][]" placeholder="a" value="a">
  <input type="text" name="choices[val][]" placeholder="Choices A"><br>
  <input type="text" name="choices[key][]" placeholder="b" value="b">
  <input type="text" name="choices[val][]" placeholder="Choices B"><br>
  <input type="text" name="choices[key][]" placeholder="c" value="c">
  <input type="text" name="choices[val][]" placeholder="Choices C"><br>
  <input type="text" name="choices[key][]" placeholder="d" value="d">
  <input type="text" name="choices[val][]" placeholder="Choices D"><br>
  Select Answer:
  <select name="answer">
    <option value="a">A</option>
    <option value="b">B</option>
    <option value="c">C</option>
    <option value="d">D</option>
  </select><br>
  <input type="hidden" name="exam_id" value="<?php echo $exam_id ?>">
  <input type="submit" value="Submit">
</form>


<br><br><br>
Essay:<br>
<form method="POST">
  <input type="text" name="type" value="text"><br>
  <input type="text" name="question" placeholder="Question"><br>
  <textarea name="choices[val][]"></textarea><br>
  <input type="hidden" name="exam_id" value="<?php echo $exam_id ?>">
  <input type="submit" value="Submit">
</form>