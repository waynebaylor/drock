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

<?php echo $content ?>
	
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/1.8.3/jquery-1.8.3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/2.2.1/js/bootstrap.min.js') ?>"></script>
</body>
</html>
