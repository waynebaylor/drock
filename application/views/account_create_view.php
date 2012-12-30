
<div class="container">
	<form method="post" action="<?php echo base_url('account/submit') ?>">
		<legend>Create Account</legend>
		
		<?php foreach(general_errors() as $error_msg): ?>
			<div class="alert alert-error"><?php echo $error_msg ?></div>
		<?php endforeach; ?>
		
		<?php echo bs_text(array(
			'name' => 'username', 
			'label' => 'Username'
		)) ?>
		<?php echo bs_password(array(
			'name' => 'password', 
			'label' => 'Password'
		)) ?>
		
		<div class="form-actions">
			<button type="submit" class="btn">Create</button>
		</div>
	</form>
</div>