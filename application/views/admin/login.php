<body style="background-color: yellow; height: 100%; margin-top: 3%; margin-right: 5%; margin-left: 5%;">
  
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!-- <p class="login-box-msg">Sign in to start your session</p> -->

    <form action="<?php echo base_url('Admin/login') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="hidden" name="char">
        <input type="email" class="form-control" placeholder="Email" name="email" required value="<?php 
          
        if(!empty($_POST['email']))
        {
          echo $_POST['email'];
        }
        else {
          echo "";
        }?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        
         <div class="form-group has-error">
         
           <span class="help-block">
             <?php 
              if(!empty($error))
              {
                echo $error;
              }
              ?>
           </span>
         </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<!--     <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="<?php echo base_url('facebook') ?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="<?php echo base_url('google') ?>" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <a href="<?php echo base_url('forgotpass') ?>">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new account</a>

  </div>
  <!-- /.login-box-body -->
</div>
  </div>
  <div class="col-md-4"></div>
</div>