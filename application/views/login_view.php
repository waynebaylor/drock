
<style type="text/css">

body {
	background-color: #fdf6e3;
}

form {
	background-color: #fff;
	border: 1px solid #eee8d5;
	border-radius: 4px;
	width: 300px;
	margin: 30px auto;
}

input {
	width: 300px;
}
	
</style>

<div class="container">
	<form method="post" action="<?php echo base_url('login') ?>">
		<h1>D-ROCK</h1>
		<h4>Crush it!</h4>

		<input type="text" class="input-block-level" placeholder="Username" name="username" value="">
		<input type="password" class="input-block-level" placeholder="Password" name="password" value="">

		<button type="submit" class="btn">Login</button>
	</form>
</div>