<div class="content-wrapper">
<div class="login-box ">
  <div class="login-logo"><a href="<?PHP echo URL; ?>"><b>Admin </b><?php echo framework ?></a></div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo URL.'login/run';?>" method="post">
		<div class="form-group">
			<select class="form-control" id="exampleFormControlSelect1" name="demgraphie"   >
			  <option value="1">Décès</option>
			  <option value="2">Naissance</option>
			  <option value="3">Bnm</option>
			  <option value="4">Evacuation</option>
			</select>
		</div>
		 <div class="input-group mb-3">
          <input type="text" class="form-control" name="login"    value="tibaredha"  required=""   placeholder="login"  >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" value="030570" required=""  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">Remember Me</label>  
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4"><button type="submit" class="btn btn-primary btn-block">Sign In</button></div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="<?PHP echo URL; ?>" class="btn btn-block btn-primary"><i class="fab fa-facebook mr-2"></i> Sign in using Facebook</a>
        <a href="<?PHP echo URL; ?>" class="btn btn-block btn-danger"><i class="fab fa-google-plus mr-2"></i> Sign in using Google+</a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1"><a href="<?PHP echo URL; ?>register/forget/">I forgot my password</a></p>
      <p class="mb-0"><a href="<?PHP echo URL; ?>register/" class="text-center">Register a new membership</a></p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</div>