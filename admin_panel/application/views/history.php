<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">History</h1>
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
                <h3 class="card-title">History List</h3>
				<button style="float:right;" class="btn btn-info" id="add_modal_btn"><i class="fas fa-plus"></i> Add History</button>
				
				<h5 id="delete_msg" style="text-align:center;"></h5>
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Title</th>
                    <th>Discription</th>
                    <th> Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="show_data">
                  <?php 
				  if(!empty($history)){ 
				  $i = 1;
				  foreach($history as $hist){
					  
				  ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $hist->name;?></td>
                    <td><?php echo $hist->description;?></td>
                    <td><?php echo $hist->history_date;?></td>
                    <td> 
						
						<a class="btn btn-info btn-sm edit_history" data-src="<?php echo $hist->id;?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                        </a>
						<a class="btn btn-danger btn-sm delete_history" data-src="<?php echo $hist->id;?>" >
                              <i class="fas fa-trash-alt">
                              </i>
                              Delete
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
 
	<!-- Add History Modal Start -->
	<div class="modal fade" id="add_history_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title" id="add_history_msg">Add History</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_history_form" name="add_history_form" enctype="multipart/form-data">
			  
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Title">
                  </div>
                    
                  <div class="form-group">
                    <label for="history_date">History Date</label>
                    <input type="date" class="form-control" id="history_date" name="history_date" >
                  </div>
                  
				  <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="2" id="description" name="description" placeholder="description"></textarea>
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
      <!-- Add Event Modal End -->
	  
	  <!-- Edit Event Modal Start -->
	  <div class="modal fade" id="edit_history_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title" id="edit_history_msg">Edit History</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="edit_history_form" name="edit_history_form" enctype="multipart/form-data">
			  
                <div class="card-body">
                  <div class="form-group">
                    <label for="edit_name">Title</label>
                    <input type="text" class="form-control" id="edit_name" name="name" placeholder="Title">
                  </div>
                    
                  <div class="form-group">
                    <label for="edit_history_date">Event Date</label>
                    <input type="date" class="form-control" id="edit_history_date" name="history_date">
                  </div>
                    
                  <input type="hidden" name="hidden_id" id="hidden_id" value="">
				  <div class="form-group">
                        <label for="edit_description">Description</label>
                        <textarea class="form-control" rows="2" id="edit_description" name="description" placeholder="Description"></textarea>
                      </div>
				  
			
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
      <!-- Edit Event Modal End -->
 
 
 <!-- DataTables  & Plugins -->
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/js/responsive.bootstrap4.min.js"></script>
 
<!-- Bootstrap Switch -->
<script src="<?php echo base_url();?>assets/js/bootstrap-switch.min.js"></script>
 
<!-- bs-custom-file-input -->
<script src="<?php echo base_url();?>assets/js/bs-custom-file-input.min.js"></script> 
 
 <script>
 
  // A $( document ).ready() block.
$( document ).ready(function() {
	
	 $('table.dataTable').dataTable({});
	
	var table = $("#example1").DataTable();
	// For custom input file 
	bsCustomFileInput.init();
	$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
	
// Show Popup modal
$("#add_modal_btn").click(function(){
	$("#add_history_modal").modal("show");
	$("#name").val("");
	$("#description").val("");
	$("#history_date").val("");
});

// Adding event

$("#add_btn").click(function(){
   
	var name,description,history_date;
	name = $("#name").val();
	description = $("#description").val();
	history_date = $("#history_date").val();
	
	if(name.length <= 0){
		$("#add_history_msg").html("<sapn style='color:red;font-weight:bold'>Please enter title</span>");
		$("#name").focus();
		setTimeout(function(){ $("#add_history_msg").html("<sapn style='color:white;'>Add history</span>"); }, 3500);
	}else if(history_date.length <= 0){
		$("#add_history_msg").html("<sapn style='color:red;font-weight:bold'>Please select date</span>");
		$("#history_date").focus();
		setTimeout(function(){ $("#add_history_msg").html("<sapn style='color:white;'>Add history</span>"); }, 3500);
	}else if(description.length <= 0){
		$("#add_history_msg").html("<sapn style='color:red;font-weight:bold'>Please enter description</span>");
		$("#description").focus();
		setTimeout(function(){ $("#add_history_msg").html("<sapn style='color:white;'>Add history</span>"); }, 3500);
	}else{
		var fd = new FormData();
		$("#add_btn").css("display","none");
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>history/add_history',
			data: new FormData($('#add_history_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			 $("#add_btn").hide();
			if(result == 1){
				$("#add_history_msg").html("<sapn style='color:white;font-weight:bold'>History added successfully...</span>");
				$("#name").val("");
				$("#description").val("");
				$("#history_date").val("");
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#add_history_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#add_history_msg").html("<sapn style='color:white;'>Add history</span>"); }, 3500);
				$("#add_btn").css("display","none");
			}
		  }
		 });
	}
});

// Call edit history modal

$("#show_data").on('click','.edit_history',function(){
	var id = $(this).attr("data-src");
	$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>history/get_history_data',
			data: {id:id},
			dataType: "json",
			success: function(result){
				$("#edit_name").val(result[0].name);	
				$("#edit_description").val(result[0].description);
				$("#edit_history_date").val(result[0].history_date);
				$("#hidden_id").val(result[0].id);
				$("#edit_history_modal").modal("show");	
			}
		 });
	
});


// Editing history

$("#edit_btn").click(function(){
	var name,description,history_date;
	name = $("#edit_name").val();
	description = $("#edit_description").val();
	history_date = $("#edit_history_date").val();
	
	
	if(name.length <= 0){
		$("#edit_history_msg").html("<sapn style='color:red;font-weight:bold'>Please enter title</span>");
		$("#edit_name").focus();
		setTimeout(function(){ $("#edit_history_msg").html("<sapn style='color:white;'>Edit history</span>"); }, 3500);
	}else if(history_date.length <= 0){
		$("#edit_history_msg").html("<sapn style='color:red;font-weight:bold'>Please select date</span>");
		$("#edit_history_date").focus();
		setTimeout(function(){ $("#edit_history_msg").html("<sapn style='color:white;'>Edit history</span>"); }, 3500);
	}else if(description.length <= 0){
		$("#edit_history_msg").html("<sapn style='color:red;font-weight:bold'>Please enter description</span>");
		$("#edit_description").focus();
		setTimeout(function(){ $("#edit_history_msg").html("<sapn style='color:white;'>Edit history</span>"); }, 3500);
	}else{
		var fd = new FormData();
		$("#edit_btn").css("display","none");
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>history/edit_history',
			data: new FormData($('#edit_history_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			if(result == 1){
				$("#edit_history_msg").html("<sapn style='color:white;font-weight:bold'>History updated successfully...</span>");
				$("#edit_name").val("");
				$("#edit_description").val("");
				$("#edit_history_date").val("");
				$("#edit_btn").hide();
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#edit_history_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#edit_history_msg").html("<sapn style='color:white;'>Edit history</span>"); }, 3500);
				$("#edit_btn").css("display","block");
			}
		  }
		 });
	}
	
});


$("#show_data").on('click','.delete_history',function(){

	var id = $(this).attr("data-src");
	
	var confrm = confirm('Do You Want To Delete');
	
	if(confrm){
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>history/delete_history',
			data: {id:id},
			success: function(result){
				
				if(result == 1){
				$("#delete_msg").html("<sapn style='color:green;font-weight:bold'>History Delete successfully...</span>");
				setTimeout(function(){ location.reload(); }, 3000);
				}else{
				$("#delete_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ location.reload(); }, 3000);
				}  
			}
			
		 });
	}
	
		 
		 
	
});
	
});

</script> 
