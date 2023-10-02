<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Unique Portable Cabins | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url("admin_panel/login"); ?>"><b>WPI Admin Panel</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo base_url();?>login/login_script" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email_id" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
		  <div class="col-12">
            <h5 style="color:red;margin-top:10px;cursor:pointer;" data-toggle="modal" data-target="#exampleModal">Forgot Password ? </h5>
          </div>
		  <div class="col-12">
            <h5 style="color:red;text-align:center;margin-top:10px;"><?php echo $this->session->flashdata('error'); ?></h5>
          </div>
		  
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
</body>
</html>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  
	  
      <div id="show_forgot_password">
      <div class="modal-body">
        <div class="col-lg-12">
			<label> Email Id </label>
			<input type="email" name="forgot_email" id="forgot_email" placeholder="Email Id" class="form-control" required>
		</div>
		<div class="col-12">
		
			<h5 style="color:red;text-align:center;margin-top:10px;" id="forgot_err"></h5>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="forgot_btn" class="btn btn-primary">Submit</button>
      </div>
	  
      </div>
	  
	  <div id="show_new_password">
	  <div class="modal-body">
        <div class="col-lg-12">
			<label> New Password </label>
			<input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control" required>
		</div>
		<div class="col-12">
            <h5 style="color:green;text-align:center;margin-top:10px;" id="newpass_succ"></h5>
            <h5 style="color:red;text-align:center;margin-top:10px;" id="newpass_err"></h5>
            
          </div>
		  
		  
      </div>
      <div class="modal-footer">
        <button type="button" id="password_btn" class="btn btn-primary">New Password</button>
      </div>
	  
	   
		  
      </div>
	  
    </div>
  </div>
</div>

<script>

	$(document).ready(function(){
		
		$("#show_new_password").hide();
		
		$("#forgot_btn").click(function(){
			
			var forgot_email = $("#forgot_email").val();
			
			$.ajax({
				
				url : "<?php echo base_url('login/check_email'); ?>",
				method: "post",
				data : {forgot_email : forgot_email},
				success : function(res){
					if(res == 1){
						
						$("#show_forgot_password").hide();
						$("#show_new_password").show();
						
						$("#exampleModalLabel").html("New Password");
						
						
						$("#password_btn").click(function(){
							
							
							
							var new_password = $("#new_password").val();
							
							$.ajax({
								
								url : "<?php echo base_url('login/forgot_password'); ?>",
								method : "post",
								data : {forgot_email : forgot_email, new_password : new_password},
								success : function (res){
									if(res == 1){
										
										$("#newpass_succ").html("Password Change SuccessFully ...");
										setTimeout(function() { location.reload(); }, 2500);
										
									}else{
										$("#newpass_err").html("Password Not Change Please Try Again...");
										setTimeout(function() { location.reload(); }, 2500);
									}
								}
							});
						});
						
					}else{
						
						$("#forgot_err").html("Invalid Email Id ...");
						setTimeout(function() { location.reload(); }, 2500);
					}
				}
				
			});
		});
	});	

</script>