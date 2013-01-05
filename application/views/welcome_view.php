
<script type="text/javascript">
	$(document).ready(function() {
		$("#new-workout-link").click(function(event) {
			event.preventDefault();

			$("#new-workout-form").slideDown(200);
		});

		$("#new-workout-cancel").click(function(event) {
			event.preventDefault();

			$("#new-workout-form").slideUp(200);
			$("#new-workout-form").find("input").each(function() {
				$(this).val("");
			});
		});
	});

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
	<?php if($success_message): ?>
		<div class="row">
			<div class="span12">
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $success_message ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<form method="post" action="<?php echo base_url('workout/submit') ?>">
		<h1>Workouts</h1>
		
		<p>
			<a id="new-workout-link" href="#">New Workout</a>
		</p>
		
		<div id="new-workout-form" style="display:none;">
			<input type="text" class="name-dropdown" placeholder="Name" name="name" value="">
			<input type="text" class="span2" placeholder="Sets" name="sets" value="">
			<input type="text" class="span2" placeholder="Reps" name="reps" value="">
			<input type="text" class="span2" placeholder="Weight (lbs)" name="weight" value="">
			<input type="text" class="span2" placeholder="Date" name="tmstmp" value="">
			
			<div class="form-actions">
				<button type="submit" class="btn">Create</button>
				<a id="new-workout-cancel" href="#">Cancel</a>
			</div>
		</div>
		
		<table class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Sets</th>
					<th>Reps</th>
					<th>Weight (lbs)</th>
					<th>Date</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($workouts_iter as $index => $workout): ?>
					<tr>
						<td><?php echo $workout['name'] ?></td>
						<td><?php echo $workout['sets'] ?></td>
						<td><?php echo $workout['reps'] ?></td>
						<td><?php echo $workout['weight'] ?></td>
						<td><?php echo substr($workout['tmstmp'], 0, 10) ?></td>
						<td>
							<a href="<?php echo base_url('workout/edit?id='.$workout['id']) ?>">Edit</a>
							<a href="<?php echo base_url('workout/delete?id='.$workout['id']) ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php if(empty($index)): ?>
					<tr>
						<td colspan="6">No workouts :(</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</form>
</div>