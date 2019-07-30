<body style="height: 100%; margin-top: 3%; margin-right: 5%; margin-left: 5%; background-image: url(<?php echo base_url('assets/img/pic.jpg')?>); -webkit-background-size: cover; background-position: center center; background-repeat: no-repeat;">
  
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <div class="login-box">
 <div class="login-box-header" style="backface-visibility: 2px;">
   
 </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!-- <p class="login-box-msg">Sign in to start your session</p> -->
    <div class="login-logo">
      <a href="../../index2.html"><b >Admin</b></a>
    </div>
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

              if(isset($error))
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
    <a href="<?php echo base_url('forgotpass') ?>">I forgot my password</a><br>
  </div>

</div>
  </div>
  <div class="col-md-4"></div>
</div>