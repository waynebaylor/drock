
<style type="text/css">

form {
	width: 350px;
	margin: 100px auto;
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
				<input type="text" class="input-block-level" placeholder="Username" name="username" value="<?php echo set_value('username') ?>">
				<?php echo form_error('username') ?>
			</div>
		</div>
		
		<div class="control-group <?php if(form_error('password')) echo 'error' ?>">
			<div class="control-label"></div>
			<div class="controls">
				<input type="password" class="input-block-level" placeholder="Password" name="password" value="">
				<?php echo form_error('password') ?>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn">Login</button>
			<a class="pull-right" href="<?php echo base_url('account/create') ?>">Create Account</a>
		</div>
	</form>
</div>

