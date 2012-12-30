
<div class="container">
	<form method="post" action="">
		<h1>Workouts</h1>
		
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Sets</th>
					<th>Reps</th>
					<th>Weight</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!$workouts->fetch()): ?>
					<tr>
						<td colspan="5">No workouts :(</td>
					</tr>
				<?php endif; ?>
				<?php while($workout = $workouts->fetch()): ?>
					<tr>
						<td><?php echo $workout['name'] ?></td>
						<td><?php echo $workout['sets'] ?></td>
						<td><?php echo $workout['reps'] ?></td>
						<td><?php echo $workout['weight'] ?></td>
						<td><?php echo $workout['tmstmp'] ?></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</form>
</div>