<h3 class='page-header'>Exam for <?php echo $exam_name ?></h3>
<legend>Questionnaires</legend>
<div class="col-lg-12">
	<form class="form-horizontal" role="form">
		<?php foreach ($questions as $question): ?>
    	<div class="panel panel-warning">
  		  <div class="panel-heading">
  				<h3 class="panel-title">
    			<b>Question:</b> <br>
    			<?php echo $question['question'] ?>
  				</h3>
  		  </div>
  		  <div class="panel-body">
			    <div class="form-group">
			    	<div class="radio">
			    		<label>
				    		<div class="checkbox">
				    			<label>
					    			<input type="radio" name="answer[]" value="<?php echo $question['metadata']['values']['a'] ?>"> <?php echo $question['metadata']['values']['a'] ?>
				    			</label>
				    		</div>
				    		<div class="checkbox">
				    			<label>
					    			<input type="radio" name="answer[]" value="<?php echo $question['metadata']['values']['b'] ?>"> <?php echo $question['metadata']['values']['b'] ?>
				    			</label>
				    		</div>
				    		<div class="checkbox">
				    			<label>
					    			<input type="radio" name="answer[]" value="<?php echo $question['metadata']['values']['c'] ?>"> <?php echo $question['metadata']['values']['c'] ?>
				    			</label>
				    		</div>
				    		<div class="checkbox">
				    			<label>
					    			<input type="radio" name="answer[]" value="<?php echo $question['metadata']['values']['d'] ?>"> <?php echo $question['metadata']['values']['d'] ?>
				    			</label>
				    		</div>
			    		</label>
			    	</div>
			    </div>
  		  </div>
    	</div>

		<?php endforeach ?>
  	<button type="submit" class="btn btn-success">Submit Exam</button>
	</form>
</div>