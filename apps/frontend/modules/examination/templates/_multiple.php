<div class="well multiple">
  <fieldset>
    <div class="form-group">
    	<div class="col-md-7">
	      <label for="textArea" class="col-lg-2 control-label">Question</label>
	      <div class="col-lg-10">
	        <textarea class="form-control" rows="3" name="questions[<?php echo $question_index ?>][question]">Test Question number ?</textarea>
	      </div>
    	</div>

      <div class="col-md-5">
	      <label for="inputPassword" class="col-lg-5 control-label">Correct Answer</label>
	      <div class="col-md-5">
		      <select class="form-control" name="questions[<?php echo $question_index ?>][answer]">
            <option value=""> Select Correct Answer</option>
		        <option value="a">A</option>
		        <option value="b">B</option>
		        <option value="c">C</option>
		        <option value="d">D</option>
		      </select>
	      </div>
      </div>
    </div>
    <div class="form-group">
      <label for="inputA" class="col-md-1 control-label">A</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="questions[<?php echo $question_index ?>][choices][a]" value="choice a">
      </div>
    </div>
    <div class="form-group">
      <label for="inputB" class="col-md-1 control-label">B</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="questions[<?php echo $question_index ?>][choices][b]" value="choice b">
      </div>
    </div>
    <div class="form-group">
      <label for="inputC" class="col-md-1 control-label">C</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="questions[<?php echo $question_index ?>][choices][c]" value="choice c">
      </div>
    </div>
    <div class="form-group">
      <label for="inputD" class="col-md-1 control-label">D</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="questions[<?php echo $question_index ?>][choices][d]" value="choice d">
      </div>
    </div>
  </fieldset>
</div>
