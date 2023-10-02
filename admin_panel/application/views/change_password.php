<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
	
	
    <div class="content">
      <div class="container-fluid">
       
		<div class="row">
          
		  <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-name">Change Password</h3>
				
              </div>
              
               <div class="col-12">
                <h5 style="color:green;text-align:center;margin-top:10px;"><?php echo $this->session->flashdata('success'); ?></h5>
                <h5 style="color:red;text-align:center;margin-top:10px;"><?php echo $this->session->flashdata('error'); ?></h5>
               </div>
			  
			  <div class="container">
			  
			  <form id="pay_monthly_fees_form" method="post" action="<?php echo base_url()?>login/changePasswordScript">
				<div class="row">
				
					
						<div class="col-lg-4">
							<div class="form-group">
								<label for="stud_name"> New Password </label>
								<input type="password" name="new_password" id="new_password" class="form-control" required>
							</div>
						</div>
						
					    <div class="col-lg-12">
					        <button type="submit" class="btn btn-primary"> Submit </button>
					    </div>     	
					
				</div>
				
				</form>
			  </div>
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
        </div>
	   
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
	
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
 
 
 <!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/js/responsive.bootstrap4.min.js"></script>
 
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();?>assets/js/bootstrap-switch.min.js"></script>
 
<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>assets/js/bs-custom-file-input.min.js"></script> 
 
 