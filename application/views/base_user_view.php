<?php header('Content-Type: text/html; charset=utf-8'); ?>

<!DOCTYPE html>

<html>
<head>
	<title>
		<?php echo $title ?>
	</title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/2.2.1/css/bootstrap.css') ?>">
	<link rel="stylesheet/less" type="text/css" href="<?php echo base_url('css/drock.less') ?>">
	
	<script type="text/javascript" src="<?php echo base_url('assets/less/1.3.1/less-1.3.1.min.js') ?>"></script>
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<ul class="nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							&#9776;
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo base_url('welcome') ?>">Home</a>
							</li>
							<li>
								<a href="<?php echo base_url('analysis') ?>">Analysis</a>
							</li>
						</ul>
					</li>
				</ul>
				
				<a class="brand" href="<?php echo base_url('welcome') ?>">D-Rock</a>

				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo base_url('logout') ?>">
									Logout <?php echo $user['username'] ?>
								</a>
							</li>
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	
	<div style="margin-top:60px;">
		<?php echo $content ?>
	</div>
	
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/1.8.3/jquery-1.8.3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/2.2.1/js/bootstrap.min.js') ?>"></script>
</body>
</html>
