<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SUPERO | Tasks System</title>
	<!-- Favicon -->
	<link rel="icon" href="https://www.favicon.cc/logo3d/139785.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo PUBLIC_URL ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo PUBLIC_URL ?>bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo PUBLIC_URL ?>bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo PUBLIC_URL ?>css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo PUBLIC_URL ?>plugins/iCheck/square/blue.css">
	<!-- Main -->
	<link rel="stylesheet" href="<?php echo PUBLIC_URL ?>css/main.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
	  <div class="login-logo">
	    <a href="../../index2.html"><b>Supero </b>TASKS</a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="login-box-body">
	    <p class="login-box-msg">Faça login para acessar o sistema</p>
	    <?php if(isset($error) AND $error == true): ?>
			<div class="alert alert-danger alert-dismissible disabled">
				<p><i class="icon fa fa-ban"></i> Informações incorretas. Tente novamente.</p>
			</div>
		<?php endif; ?>
	    <form action="<?php echo URL . 'login/run' ?>" method="POST" enctype="application/x-www-url-encoded">
	      <div class="form-group has-feedback">
	        <input type="email" name="email" class="form-control" placeholder="E-mail" required value="supero@tecnologia.com.br" />
	        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	      </div>
	      <div class="form-group has-feedback">
	        <input type="password" name="senha" class="form-control" placeholder="Senha" required value="123456" />
	        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	      </div>
	      <div class="row">
	        <div class="col-xs-8">
	          <div class="checkbox icheck">
	            <label>
	              <input type="checkbox"> &nbsp;&nbsp;Lembrar
	            </label>
	          </div>
	        </div>
	        <!-- /.col -->
	        <div class="col-xs-4">
	          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
	        </div>
	        <!-- /.col -->
	      </div>
	    </form>
	    <a href="#">Esqueci minha senha</a><br>
	  </div>
	  <!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="<?php echo PUBLIC_URL ?>bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo PUBLIC_URL ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?php echo PUBLIC_URL ?>plugins/iCheck/icheck.min.js"></script>
	<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});
	});
	</script>
</body>
</html>