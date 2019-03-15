<div class="login-logo">
    <?=$this->Html->image('woddi_logo.png', ['style'=>'height: 80px; width: 70px'])?>
  <a href="#"><b>Precisio</b>HMS</a>
</div>
<!-- /.login-logo -->
<div class="login-box-body">
  <p class="login-box-msg">Sign in to start your session</p>
  <?= $this->Flash->render() ?>
  <?= $this->Form->create(null,[ 'url' => ['controller' => 'users', 'action' => 'login']]); ?> 
    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Username" name="username" id="username">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Password" name="password" id="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
<!--      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox"> Remember Me
          </label>
        </div>
      </div>-->
      <!-- /.col -->
      <div class="col-xs-4">
        <?= $this->Form->button('Sign In',['class'=>'btn btn-primary btn-block btn-flat']) ?> 
      </div>
      <!-- /.col -->
    </div>
  <?= $this->Form->end() ?>
<!--  <a href="#">I forgot my password</a>-->
  <br>
</div><br />
<span style="font-weight: bolder; color: fuchsia; font-family: sans-serif">
    <center>Woodi Wellness Hospital Center Owerri</center></span>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->