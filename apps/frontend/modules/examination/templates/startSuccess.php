<h3 class='page-header'>Exam for <?php echo $exam['name'] ?></h3>
<legend>Questionnaires</legend>
<div class="col-lg-12">
	<form class="form-horizontal" role="form" action="/examination/compute" method='post'>
    <input type="hidden" name="exam_id" value="<?php echo $exam['id'] ?>">
		<?php foreach ($questions as $question): ?>
    	<div class="panel panel-warning">
  		  <div class="panel-heading">
  				<h3 class="panel-title">
    			<b>Question:</b> <br>
    			<?php echo $question['question'] ?>
  				</h3>
  		  </div>

        <?php 
        $choices = $question['metadata']['values'];
        ?>
  		  <div class="panel-body">
			    <div class="form-group">
			    	<div class="radio">
			    		<label>
                <?php foreach ($choices as $key => $value): ?>
                  <div class="checkbox">
                    <label>
                      <input type="radio" name="answers[<?php echo $question['id'] ?>]" value="<?php echo $key ?>"> <?php echo $value ?>
                    </label>
                  </div>
                <?php endforeach ?>
			    		</label>
			    	</div>
			    </div>
  		  </div>
    	</div>

		<?php endforeach ?>
  	<button type="submit" class="btn btn-success">Submit Exam</button>
	</form>
</div>