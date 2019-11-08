<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ((isset($this->title)) ? $this->title : "MVC System"); ?></title>
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css" />
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/sunny/jquery-ui.css" />
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo URL ?>public/js/custom.js"></script>
	<script>
		$(document).ready(function($) {
			$("#calendar").datepicker()	
		});
	</script>
	<?php if(isset($this->js)): ?>
		<?php foreach ($this->js as $js): ?>
			<?php echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>'; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</head>
<body>
	<div id="header">

		<?php if(\App\Session::get('loggedIn') == false): ?>
			<a href="<?php echo URL; ?>index">Index</a>
			<a href="<?php echo URL; ?>help">Help</a>
		<?php endif; ?>

		<?php if(\App\Session::get('loggedIn') == true): ?>
			<a href="<?php echo URL; ?>dashboard">Dashboard</a>	
			<a href="<?php echo URL; ?>note">Notes</a>	
			<?php if(\App\Session::get('role') == 'owner'): ?>
				<a href="<?php echo URL; ?>user">Users</a>
			<?php endif; ?>
			<a href="<?php echo URL; ?>customers/add">Palhoça</a>	
			<a href="<?php echo URL; ?>dashboard/logout">Logout</a>	
		<?php else: ?>
			<a href="<?php echo URL; ?>login">Login</a>
		<?php endif; ?>
		
	</div>	
	<div id="content">