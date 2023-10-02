<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Counter</h1>
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
                <h3 class="card-title">Counter List</h3>
				<!-- <button style="float:right;" class="btn btn-info" id="add_modal_btn"><i class="fas fa-plus"></i> Add Counter</button>  -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Work Experience</th>
                    <th>Happy Clients</th>
                    <th>Dedicated Staff</th>
                    <th>Awards Achieved</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="show_data">
                  <?php 
				  if(!empty($counter)){ 
				  $i = 1;
				  foreach($counter as $contr){
					  
				  ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $contr->campus;?></td>
                    <td><?php echo $contr->students;?></td>
                    <td><?php echo $contr->teachers;?></td>
                    <td><?php echo $contr->class_room;?></td>
                    <td> 
						
						<a class="btn btn-info btn-sm edit_counter" data-src="<?php echo $contr->id;?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                        </a>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
 
	<!-- Add counter Modal Start -->
	<div class="modal fade" id="add_counter_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title" id="add_counter_msg">Add Counter</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_counter_form" name="add_counter_form" enctype="multipart/form-data">
			  
                <div class="card-body">
				
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="campus">Work Experience</label>
							<input type="text" class="form-control" id="campus" name="campus" placeholder="Work Experience">
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="form-group">
							<label for="students">Happy Clients</label>
							<input type="text" class="form-control" id="students" name="students" placeholder="Happy Clients">
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="form-group">
							<label for="teachers">Dedicated Staff</label>
							<input type="text" class="form-control" id="teachers" name="teachers" placeholder="Dedicated Staff">
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="form-group">
							<label for="class_room">Awards Achieved</label>
							<input type="text" class="form-control" id="class_room" name="class_room" placeholder="Awards Achieved">
						</div>
					</div>
					
				  </div>
				 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button"  id="add_btn" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Add counter Modal End -->
	  
	  <!-- Edit counter Modal Start -->
	  <div class="modal fade" id="edit_counter_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title" id="edit_counter_msg">Edit Counter</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="edit_counter_form" name="edit_counter_form" enctype="multipart/form-data">
			  
                <div class="card-body">
                  <div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label for="edit_campus">Work Experience</label>
							<input type="text" class="form-control" id="edit_campus" name="campus" placeholder="Work Experience">
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="form-group">
							<label for="edit_students">Happy Clients</label>
							<input type="text" class="form-control" id="edit_students" name="students" placeholder="Happy Clients">
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="form-group">
							<label for="edit_teachers">Dedicated Staff</label>
							<input type="text" class="form-control" id="edit_teachers" name="teachers" placeholder="Dedicated Staff">
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="form-group">
							<label for="edit_class_room">Awards Achieved</label>
							<input type="text" class="form-control" id="edit_class_room" name="class_room" placeholder="Awards Achieved">
						</div>
					</div>
					
				  </div>
				  
				 
                  <input type="hidden" name="hidden_id" id="hidden_id" value="">
				  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="edit_btn" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Edit counter Modal End -->
 
 
 <!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/js/responsive.bootstrap4.min.js"></script>
 
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();?>assets/js/bootstrap-switch.min.js"></script>
 
<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>assets/js/bs-custom-file-input.min.js"></script> 

 <!-- Summernote -->
<script src="<?php echo base_url();?>assets/js/summernote-bs4.min.js"></script>
 
 <script>
 
  // A $( document ).ready() block.
$( document ).ready(function() {
	var table = $("#example1").DataTable();
	// For custom input file 
	bsCustomFileInput.init();
	
	
// Summernote
    $('#description').summernote({
	height: 150,   //set editable area's height
	  codemirror: { // codemirror options
		theme: 'monokai'
	  }
  });
  
  $('#edit_description').summernote({
	height: 150,   //set editable area's height
	  codemirror: { // codemirror options
		theme: 'monokai'
	  }
  });	
	
// Show Popup modal
$("#add_modal_btn").click(function(){
	$("#add_counter_modal").modal("show");
	$("#campus").val("");
	$("#students").val("");
	$("#teachers").val("");
	$("#class_room").val("");
});

// Adding counter

$("#add_btn").click(function(){
	var class_room,teachers,students,campus;
	campus = $("#campus").val();
	students = $("#students").val();
	teachers = $("#teachers").val();
	class_room = $("#class_room").val();
		
	if(campus.length <= 0){
		$("#add_counter_msg").html("<sapn style='color:red;font-weight:bold'>Please enter Work Experience</span>");
		$("#campus").focus();
		setTimeout(function(){ $("#add_counter_msg").html("<sapn style='color:white;'>Add Counter</span>"); }, 3500);
	}else if(students.length <= 0){
		$("#add_counter_msg").html("<sapn style='color:red;font-weight:bold'>Please enter Happy Clients</span>");
		$("#students").focus();
		setTimeout(function(){ $("#add_counter_msg").html("<sapn style='color:white;'>Add Counter</span>"); }, 3500);
	}else if(teachers.length <= 0){
		$("#add_counter_msg").html("<sapn style='color:red;font-weight:bold'>Please enter Dedicated Staff</span>");
		$("#teachers").focus();
		setTimeout(function(){ $("#add_counter_msg").html("<sapn style='color:white;'>Add Counter</span>"); }, 3500);
	}else if(class_room.length <= 0){
		$("#add_counter_msg").html("<sapn style='color:red;font-weight:bold'>Please enter Awards Achieved</span>");
		$("#class_room").focus();
		setTimeout(function(){ $("#add_counter_msg").html("<sapn style='color:white;'>Add Counter</span>"); }, 3500);
	}else{
		var fd = new FormData();
		
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>counter/add_counter',
			data: new FormData($('#add_counter_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			
			if(result == 1){
				$("#add_counter_msg").html("<sapn style='color:white;font-weight:bold'>Counter added successfully...</span>");
				$("#campus").val("");
				$("#students").val("");
				$("#class_room").val("");
				$("#teachers").val("");
				$("#name").val("");
				$("#description").val("");
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#add_counter_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#add_counter_msg").html("<sapn style='color:white;'>Add Counter</span>"); }, 3500);
			}
		  }
		 });
	}
});

// Call edit counter modal

$("#show_data").on( "click",".edit_counter",function(){
	var id = $(this).attr("data-src");
	$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>counter/get_counter_data',
			data: {id:id},
			dataType: "json",
			success: function(result){
			$("#edit_campus").val(result[0].campus);
			$("#edit_students").val(result[0].students);
			$("#edit_teachers").val(result[0].teachers);
			$("#edit_class_room").val(result[0].class_room);
			$("#hidden_id").val(result[0].id);
			$("#edit_counter_modal").modal("show");	
			}
		 });
	
});

// Editing counter

$("#edit_btn").click(function(){
	var class_room,teachers,students,campus;;
	campus = $("#edit_campus").val();
	students = $("#edit_students").val();
	teachers = $("#edit_teachers").val();
	class_room = $("#edit_class_room").val();
	
	
	if(campus.length <= 0){
		$("#edit_counter_msg").html("<sapn style='color:red;font-weight:bold'>Please enter Work Experience</span>");
		$("#edit_campus").focus();
		setTimeout(function(){ $("#edit_counter_msg").html("<sapn style='color:white;'>Edit Counter</span>"); }, 3500);
	}else if(students.length <= 0){
		$("#edit_counter_msg").html("<sapn style='color:red;font-weight:bold'>Please enter Happy Clients</span>");
		$("#edit_students").focus();
		setTimeout(function(){ $("#edit_counter_msg").html("<sapn style='color:white;'>Edit Counter</span>"); }, 3500);
	}else if(teachers.length <= 0){
		$("#edit_counter_msg").html("<sapn style='color:red;font-weight:bold'>Please enter Dedicated Staff</span>");
		$("#edit_teachers").focus();
		setTimeout(function(){ $("#edit_counter_msg").html("<sapn style='color:white;'>Edit Counter</span>"); }, 3500);
	}else if(class_room.length <= 0){
		$("#edit_counter_msg").html("<sapn style='color:red;font-weight:bold'>Please enter Awards Achieved</span>");
		$("#edit_class_room").focus();
		setTimeout(function(){ $("#edit_counter_msg").html("<sapn style='color:white;'>Edit Counter</span>"); }, 3500);
	}else{
		var fd = new FormData();
		
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>counter/edit_counter',
			data: new FormData($('#edit_counter_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			if(result == 1){
				$("#edit_counter_msg").html("<sapn style='color:white;font-weight:bold'>Counter updated successfully...</span>");
				$("#edit_students").val("");
				$("#edit_campus").val("");
				$("#edit_teachers").val("");
				$("#edit_class_room").val("");
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#edit_counter_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#edit_counter_msg").html("<sapn style='color:white;'>Edit Counter</span>"); }, 3500);
			}
		  }
		 });
	}
	
});
	
});

</script> 
