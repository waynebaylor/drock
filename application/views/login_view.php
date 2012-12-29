
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
	
</style>

<div class="container">
	<form method="post" action="<?php echo base_url('login/submit') ?>">
		<h1>D-ROCK <span style="color:#eee;">Crush it!</span></h1>

		<input type="text" class="input-block-level" placeholder="Username" name="username" value="">
		<input type="password" class="input-block-level" placeholder="Password" name="password" value="">

		<button type="submit" class="btn">Login</button>
	</form>
</div>