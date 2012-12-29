
<style type="text/css">

form {
	background-color: #fff;
	border: 1px solid #eee8d5;
	border-radius: 4px;
	width: 350px;
	margin: 100px auto;
	padding: 30px;
}

input {
	width: 300px;
}

.form-actions {
	background-color: inherit;
}

h1 {
	margin-bottom: 20px;
}
	
</style>

<div class="container">
	<form method="post" action="<?php echo base_url('login/submit') ?>">
		<h1>D-ROCK <span style="color:#eee;">Crush it!</span></h1>
		
		<?php foreach(general_errors() as $error_msg): ?>
			<div class="alert alert-error"><?php echo $error_msg ?></div>
		<?php endforeach; ?>
		
		<div class="control-group <?php if(form_error('username')) echo 'error' ?>">
			<div class="control-label"></div>
			<div class="controls">
				<input type="text" placeholder="Username" name="username" value="<?php echo set_value('username') ?>">
				<?php echo form_error('username') ?>
			</div>
		</div>
		
		<div class="control-group <?php if(form_error('password')) echo 'error' ?>">
			<div class="control-label"></div>
			<div class="controls">
				<input type="password" placeholder="Password" name="password" value="">
				<?php echo form_error('password') ?>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn">Login</button>
		</div>
	</form>
</div>

