<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Achievement</h1>
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
                <h3 class="card-title">Achievement List</h3>
				<button style="float:right;" class="btn btn-info" id="add_modal_btn"><i class="fas fa-plus"></i> Add Achievement</button>
				
				<h5 id="delete_msg" style="text-align:center;"></h5>
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Image</th>
					<th>Title</th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="show_data">
                  <?php 
				  if(!empty($achievement)){ 
				  $i = 1;
				  foreach($achievement as $achv){
					  
				  ?>
                  <tr>
                    <td><?php echo $i;?></td>
					<td><img src="<?php echo base_url();?>/assets/images/achievement/<?php echo $achv->image;?>" width="100" height="100" alt="<?php echo $achv->name;?>"></td>
                    <td><?php echo $achv->name;?></td>
                    <td> 
						
						<a class="btn btn-info btn-sm edit_achievement" data-src="<?php echo $achv->id;?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                        </a>
						<a class="btn btn-danger btn-sm delete_achievement" data-src="<?php echo $achv->id;?>" >
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
 
	<!-- Add Banner Modal Start -->
	<div class="modal fade" id="add_achievement_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title" id="add_achievement_msg">Add Achievement</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_achievement_form" name="add_achievement_form" enctype="multipart/form-data">
			  
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Title">
                  </div>
                  
				  
                  <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image" onchange='chk_ext("image")' accept="image/*">
                        <label class="custom-file-label" for="image" id="image_label">Select Image</label>
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
      <!-- Add Banner Modal End -->
	  
	  <!-- Edit Banner Modal Start -->
	  <div class="modal fade" id="edit_achievement_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title" id="edit_achievement_msg">Edit Achievement</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="edit_achievement_form" name="edit_achievement_form" enctype="multipart/form-data">
			  
                <div class="card-body">
                  <div class="form-group">
                    <label for="edit_title">Title</label>
                    <input type="text" class="form-control" id="edit_name" name="name" placeholder="Title">
                  </div>
                  <input type="hidden" name="hidden_id" id="hidden_id" value="">
				 
				  <div class="row">
					<div class="col-sm-9">
						<div class="form-group">
							<label for="edit_image">Image</label>
							<div class="input-group">
							  <div class="custom-file">
								<input type="file" class="custom-file-input" name="image" id="edit_image" onchange='chk_ext("edit_image")' accept="image/*">
								<label class="custom-file-label">Select Image</label>
							  </div>
							</div>
						 </div>
					</div>
					
					<div class="col-sm-3">
						
						 <img id="display_img" src="" width="100" height="100" class="elevation-2" alt="">
						
					</div>
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
      <!-- Edit Banner Modal End -->
 
 
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
	$("#add_achievement_modal").modal("show");
	$("#name").val("");
	$("#image").val("");
	$("#image_label").html("Please choose image");
});

// Adding banner

$("#add_btn").click(function(){
   
	var name,description,image;
	name = $("#name").val();
	image = $("#image").val();
	
	if(name.length <= 0){
		$("#add_achievement_msg").html("<sapn style='color:red;font-weight:bold'>Please enter title</span>");
		$("#name").focus();
		setTimeout(function(){ $("#add_achievement_msg").html("<sapn style='color:white;'>Add achievement</span>"); }, 3500);
	}else if(image.length <= 0){
		$("#add_achievement_msg").html("<sapn style='color:red;font-weight:bold'>Please select achievement image</span>");
		$("#image").focus();
		setTimeout(function(){ $("#add_achievement_msg").html("<sapn style='color:white;'>Add achievement</span>"); }, 3500);
	}else{
		var fd = new FormData();
		$("#add_btn").css("display","none");
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>achievement/add_achievement',
			data: new FormData($('#add_achievement_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			 $("#add_btn").hide();
			if(result == 1){
				$("#add_achievement_msg").html("<sapn style='color:white;font-weight:bold'>Achievement added successfully...</span>");
				$("#name").val("");
				$("#image").val("");
				$("#image_label").html("Please choose image");
				$("#add_btn").hide();
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#add_achievement_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#add_achievement_msg").html("<sapn style='color:white;'>Add achievement</span>"); }, 3500);
				$("#add_btn").css("display","none");
			}
		  }
		 });
	}
});

// Call edit banner modal

$("#show_data").on('click','.edit_achievement',function(){
	var id = $(this).attr("data-src");
	$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>achievement/get_achievement_data',
			data: {id:id},
			dataType: "json",
			success: function(result){
				$("#edit_name").val(result[0].name);	
				$("#hidden_id").val(result[0].id);
				$("#display_img").attr("src",'<?php echo base_url();?>/assets/images/achievement/'+result[0].image);
				$("#edit_achievement_modal").modal("show");	
			}
		 });
	
});


// Editing banner

$("#edit_btn").click(function(){
	var name,image;
	name = $("#edit_name").val();
	
	if(name.length <= 0){
		$("#edit_achievement_msg").html("<sapn style='color:red;font-weight:bold'>Please enter title</span>");
		$("#edit_name").focus();
		setTimeout(function(){ $("#edit_achievement_msg").html("<sapn style='color:white;'>Edit achievement</span>"); }, 3500);
	}else{
		var fd = new FormData();
		$("#edit_btn").css("display","none");
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>achievement/edit_achievement',
			data: new FormData($('#edit_achievement_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			if(result == 1){
				$("#edit_achievement_msg").html("<sapn style='color:white;font-weight:bold'>Achievement updated successfully...</span>");
				$("#edit_name").val("");
				$("#edit_image").val("");
				$("#edit_image_label").html("Please choose image");
				$("#edit_btn").hide();
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#edit_achievement_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#edit_achievement_msg").html("<sapn style='color:white;'>Edit achievement</span>"); }, 3500);
				$("#edit_btn").css("display","block");
			}
		  }
		 });
	}
	
});


$("#show_data").on('click','.delete_achievement',function(){

	var id = $(this).attr("data-src");
	
	var confrm = confirm('Do You Want To Delete');
	
	if(confrm){
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>achievement/delete_achievement',
			data: {id:id},
			success: function(result){
				
				if(result == 1){
				$("#delete_msg").html("<sapn style='color:green;font-weight:bold'>Achievement Delete successfully...</span>");
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

function chk_ext(file_id){
	if(file_id == "image"){
		var achievement_msg = "add_achievement_msg";	
	}else{
		var achievement_msg = "edit_achievement_msg";
	}
	var input = document.getElementById(file_id);
	
	var validExtensions = ['jpg','png','jpeg'];
	var fileName = input.files[0].name.split(".").pop().toLowerCase();
	var size_bytes = input.files[0].size;
	var size_kb = parseFloat(size_bytes / 1024).toFixed(2);
	var size_mb = parseFloat(size_kb / 1024).toFixed(2);
	
	if($.inArray(fileName, validExtensions) == -1) {
		$("#"+achievement_msg).html("<sapn style='color:red;font-weight:bold'>Only these file types are accepted : "+validExtensions.join(', ')+"</span>");
		$("#"+file_id).focus();
		setTimeout(function(){ $("#"+achievement_msg).html("<sapn style='color:white;'>Add achievement</span>"); }, 3500);
		$("#image_label").html("Please choose image");
		$("#"+file_id).val("");
	}else if(size_mb > 2){
		$("#"+achievement_msg).html("<sapn style='color:red;font-weight:bold'>File size should less than 2 MB. Your file size is "+size_mb+"</span>");
		$("#"+file_id).val("");
		setTimeout(function(){ $("#"+achievement_msg).html("<sapn style='color:white;'>Add achievement</span>"); }, 3500);
		$("#"+file_id).focus();
	}
}
</script> 
