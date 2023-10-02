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
                <h3 class="card-name">Inquery</h3>
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
					<th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th> Message </th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
				  if(!empty($inquerys)){ 
				  $i = 1;
				  foreach($inquerys as $inquery){
					  
				  ?>
                  <tr>
                    <td><?php echo $i;?></td>
					<td><?php echo  $inquery->name;?></td>
                    <td><?php echo  $inquery->mobile;?></td>
                    <td><?php echo $inquery->email;?></td>
                    <td><?php echo $inquery->course;?></td>
                    <td><?php echo $inquery->message;?></td>
                    <td> 
						
						
						
					</td>
                  </tr>
				  <?php $i++;}} ?>
                  </tbody>
                  
                </table>
              </div>
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
 
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<!-- Summernote -->
<script src="<?php echo base_url();?>assets/js/summernote-bs4.min.js"></script> 
 
 