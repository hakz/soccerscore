<?php
//echo '<pre>';
//print_r($ctrl);
//echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Administrator Movie Vanue</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le styles -->
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
		<!-- <link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet"> -->
		<link href="<?php echo base_url(); ?>assets/css/docs.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/docs.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/google-code-prettify/prettify.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
		<script>
			$(function() {
				window.prettyPrint && prettyPrint();
				$('#awal').datepicker();
			});
		</script>

	</head>
	<body style="background: #b3b3b3">
		<header class="jumbotron subhead" id="overview" style="background-color: white">
			<div class="container">
				<h1>ADMINISTRATOR MOVIEVANUE</h1>
				<p class="lead">
					All Started from Small Thing
				</p>
			</div>
		</header>
		<br/>

		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span2" style="padding: 20px; background-color: white; ">
					<?php echo anchor('administrator/barang', 'Items', 'title="List Items"'); ?>
					<br/>
					<?php echo anchor('administrator/order', 'Orders', 'title="News title"'); ?>
					<br/>
					<?php echo anchor('news/local/123', 'Users', 'title="News title"'); ?>
					<br/>
				</div>
				<div class="span10" style="padding: 20px; background-color: white; ">
					<?php $this -> load -> view('admin/' . $ctrl['page']); ?>
				</div>
			</div>
		</div>
	</body>
</html>