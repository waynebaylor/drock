
<script type="text/javascript">
	$(document).ready(function() {
		var $nameInput = $("input[name='name']");
		$nameInput.select2({
			width: "element",
			initSelection: function(element, callback) {
				callback({id: $(element).val(), text: $(element).val()});
			},
			query: function(query) {
				var data = {results: []};

				if(query.term) {
					data.results.push({id: query.term, text: query.term});
					$nameInput.select2('val', query.term);
				}
				
				<?php foreach($workout_names as $r): ?>
					data.results.push({id: '<?php echo $r['name'] ?>', text: '<?php echo $r['name'] ?>'});
				<?php endforeach; ?>

				query.callback(data);
			}
		});
	});
</script>

<div class="container">
	<form method="post" action="<?php echo base_url('workout/save') ?>">
		<legend>Edit Workout</legend>
		
		<?php foreach(general_errors() as $error_msg): ?>
			<div class="alert alert-error"><?php echo $error_msg ?></div>
		<?php endforeach; ?>
		
		<?php echo bs_hidden(array(
			'name' => 'id',
			'value' => set_value('id', $workout['id'])
		)) ?>
		
		<?php echo bs_text(array(
			'name' => 'name', 
			'label' => 'Name',
			'value' => set_value('id', $workout['name'])
		)) ?>
		<?php echo bs_text(array(
			'name' => 'sets', 
			'label' => 'Sets',
			'value' => set_value('id', $workout['sets'])
		)) ?>
		<?php echo bs_text(array(
			'name' => 'reps', 
			'label' => 'Reps',
			'value' => set_value('id', $workout['reps'])
		)) ?>
		<?php echo bs_text(array(
			'name' => 'weight', 
			'label' => 'Weight',
			'value' => set_value('id', $workout['weight'])
		)) ?>
		<?php echo bs_text(array(
			'name' => 'tmstmp', 
			'label' => 'Date',
			'value' => set_value('id', $workout['tmstmp'])
		)) ?>
		
		
		<div class="form-actions">
			<button type="submit" class="btn">Save</button>
			<a href="<?php echo base_url('welcome') ?>">Cancel</a>
		</div>
	</form>
</div>