<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

  <?= $this->Html->css('bootstrap/dist/css/bootstrap.min') ?>
  <!-- Font Awesome -->
  <?= $this->Html->css('font-awesome/css/font-awesome.min') ?>
  <!-- Ionicons -->
  <?= $this->Html->css('Ionicons/css/ionicons.min') ?>
 <link href="../img/woddi_logo.png" rel="icon" type="image/png">
  <!-- Theme style -->
  <?= $this->Html->css('css/AdminLTE.min') ?>
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <?= $this->fetch('css') ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif] $2y$10$lSQBuFK8p.aGIxzh2MuWneB.gqL8wMSa6GcoOFsJ2RBxMZYS6Mu4q -->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">

<?= $this->fetch('content') ?>

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<?= $this->Html->script([
  'jquery.min','bootstrap.min',
  'custom'
  ]
) ?>
<?= $this->fetch('script') ?>
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
