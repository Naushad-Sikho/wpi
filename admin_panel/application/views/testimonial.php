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
                <h3 class="card-name">Testimonial List</h3>
				<button style="float:right;" class="btn btn-info" id="add_modal_btn"><i class="fas fa-plus"></i> Add Testimonial</button>
				
				<h5 id="delete_msg" style="text-align:center;"></h5>
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
					<th>Image</th>
                    <th>Name</th>
                    <th>Feedback</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
				  if(!empty($feedback)){ 
				  $i = 1;
				  foreach($feedback as $feed){
					  
				  ?>
                  <tr>
                    <td><?php echo $i;?></td>
					<td><img src="<?php echo base_url();?>/assets/images/testimonial/<?php echo $feed->image;?>" width="100" height="100" alt="<?php echo $feed->name;?>"></td>
                    <td><?php echo $feed->name;?></td>
                    <td><?php echo $feed->feedback;?></td>
                    <td><?php echo $feed->designation;?></td>
                    <td> 
						
						<a class="btn btn-info btn-sm edit_feedback" data-src="<?php echo $feed->id;?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                        </a>
						<a class="btn btn-danger btn-sm delete_feedback" data-src="<?php echo $feed->id;?>">
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
 
	<!-- Add feedback Modal Start -->
	<div class="modal fade" id="add_feedback_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title" id="add_feedback_msg">Add Testimonial</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_feedback_form" name="add_feedback_form" enctype="multipart/form-data">
			  
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                  </div>
                  
				  <div class="form-group">
                        <label for="feedback">Feedback</label>
                        <textarea class="form-control" rows="2" id="feedback" name="feedback" placeholder="feedback"></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
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
                  <button type="button" class="btn btn-primary" id="add_btn">Submit</button>
                </div>
              </form>
            </div>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Add feedback Modal End -->
	  
	  <!-- Edit feedback Modal Start -->
	  <div class="modal fade" id="edit_feedback_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title" id="edit_feedback_msg">Edit Testimonial</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="edit_feedback_form" name="edit_feedback_form" enctype="multipart/form-data">
			  
                <div class="card-body">
                  <div class="form-group">
                    <label for="edit_name">Name</label>
					<input type="hidden" name="hidden_id" id="hidden_id" value="">
                    <input type="text" class="form-control" id="edit_name" name="name" placeholder="name">
                  </div>
                  
				  <div class="form-group">
                        <label for="edit_feedback">Feedback</label>
                        <textarea class="form-control" rows="2" id="edit_feedback" name="feedback" placeholder="Feedback"></textarea>
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="edit_designation">Designation</label>
                        <input type="text" class="form-control" id="edit_designation" name="designation" placeholder="Designation">
                      </div>
				  
				  
				  <div class="row">
					<div class="col-sm-9">
						<div class="form-group">
							<label for="edit_image">Image</label>
							<div class="input-group">
							  <div class="custom-file">
								<input type="file" class="custom-file-input" name="image" id="edit_image" onchange='chk_ext("edit_image")' accept="image/*">
								<label class="custom-file-label" id="edit_image_label">Select Image</label>
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
                  <button type="button" id="edit_btn" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Edit feedback Modal End -->
 
 
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
	var table = $("#example1").DataTable();
	// For custom input file 
	bsCustomFileInput.init();
	$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

// Show Popup modal
$("#add_modal_btn").click(function(){
	$("#add_feedback_modal").modal("show");
	$("#name").val("");
	$("#feedback").val("");
	$("#designation").val("");
	$("#image").val("");
	$("#image_label").html("Please choose image");
});

// Adding feedback

$("#add_btn").click(function(){
    
	var name,feedback,image,designation;
	name = $("#name").val();
	feedback = $("#feedback").val();
	designation = $("#designation").val();
	image = $("#image").val();
	
	if(name.length <= 0){
		$("#add_feedback_msg").html("<sapn style='color:red;font-weight:bold'>Please enter name</span>");
		$("#name").focus();
		setTimeout(function(){ $("#add_feedback_msg").html("<sapn style='color:white;'>Add testimonial</span>"); }, 3500);
	}else if(feedback.length <= 0){
		$("#add_feedback_msg").html("<sapn style='color:red;font-weight:bold'>Please enter feedback</span>");
		$("#feedback").focus();
		setTimeout(function(){ $("#add_feedback_msg").html("<sapn style='color:white;'>Add testimonial</span>"); }, 3500);
	}else if(designation.length <= 0){
		$("#add_feedback_msg").html("<sapn style='color:red;font-weight:bold'>Please enter designation</span>");
		$("#designation").focus();
		setTimeout(function(){ $("#add_feedback_msg").html("<sapn style='color:white;'>Add testimonial</span>"); }, 3500);
	}else if(image.length <= 0){
		$("#add_feedback_msg").html("<sapn style='color:red;font-weight:bold'>Please select image</span>");
		$("#image").focus();
		setTimeout(function(){ $("#add_feedback_msg").html("<sapn style='color:white;'>Add testimonial</span>"); }, 3500);
	}else{
		var fd = new FormData();
		
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>testimonial/add_testimonial',
			data: new FormData($('#add_feedback_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			    $("#add_btn").hide();
			if(result == 1){
				$("#add_feedback_msg").html("<sapn style='color:white;font-weight:bold'>Testimonial added successfully...</span>");
				$("#name").val("");
				$("#feedback").val("");
				$("#designation").val("");
				$("#image").val("");
				$("#image_label").html("Please choose image");
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#add_feedback_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#add_feedback_msg").html("<sapn style='color:white;'>Add testimonial</span>"); }, 3500);
			}
		  }
		 });
	}
});

	
// Call edit feedback modal

$(".edit_feedback").click(function(){
	var id = $(this).attr("data-src");
	$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>testimonial/get_testimonial_data',
			data: {id:id},
			dataType: "json",
			success: function(result){
				$("#edit_name").val(result[0].name);	
				$("#edit_feedback").val(result[0].feedback);
				$("#edit_designation").val(result[0].designation);
				$("#hidden_id").val(result[0].id);
				$("#display_img").attr("src",'<?php echo base_url();?>/assets/images/testimonial/'+result[0].image);
				$("#edit_feedback_modal").modal("show");	
			}
		 });
	
});

// Adding feedback

$("#edit_btn").click(function(){
	var name,feedback,image,designation;
	name = $("#edit_name").val();
	feedback = $("#edit_feedback").val();
	designation = $("#edit_designation").val();
	
	
	if(name.length <= 0){
		$("#edit_feedback_msg").html("<sapn style='color:red;font-weight:bold'>Please enter name</span>");
		$("#edit_name").focus();
		setTimeout(function(){ $("#edit_feedback_msg").html("<sapn style='color:white;'>Edit testimonial</span>"); }, 3500);
	}else if(feedback.length <= 0){
		$("#edit_feedback_msg").html("<sapn style='color:red;font-weight:bold'>Please enter feedback</span>");
		$("#edit_feedback").focus();
		setTimeout(function(){ $("#edit_feedback_msg").html("<sapn style='color:white;'>Edit testimonial</span>"); }, 3500);
	}else if(designation.length <= 0){
		$("#edit_feedback_msg").html("<sapn style='color:red;font-weight:bold'>Please enter designation</span>");
		$("#edit_feedback").focus();
		setTimeout(function(){ $("#edit_feedback_msg").html("<sapn style='color:white;'>Edit testimonial</span>"); }, 3500);
	}else{
		var fd = new FormData();
		
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>testimonial/edit_testimonial',
			data: new FormData($('#edit_feedback_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			if(result == 1){
				$("#edit_feedback_msg").html("<sapn style='color:white;font-weight:bold'>testimonial updated successfully...</span>");
				$("#edit_name").val("");
				$("#edit_feedback").val("");
				$("#edit_designation").val("");
				$("#edit_image").val("");
				$("#edit_image_label").html("Please choose image");
				$("#edit_btn").hide();
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#edit_feedback_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#edit_feedback_msg").html("<sapn style='color:white;'>Edit feedback</span>"); }, 3500);
			}
		  }
		 });
	}
	
});	

// Delete Feedback

$(".delete_feedback").click(function(){
	var id = $(this).attr("data-src");
	var confrm = confirm('Do You Want To Delete');
	
	if(confrm){
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>testimonial/delete_testimonial',
			data: {id:id},
			success: function(result){
				
				//alert(result);
				
				if(result == 1){
				$("#delete_msg").html("<sapn style='color:green;font-weight:bold'>Testimonial Delete successfully...</span>");
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
		var feedback_msg = "add_feedback_msg";	
	}else{
		var feedback_msg = "edit_feedback_msg";
	}
	var input = document.getElementById(file_id);
	
	var validExtensions = ['jpg','png','jpeg'];
	var fileName = input.files[0].name.split(".").pop().toLowerCase();
	var size_bytes = input.files[0].size;
	var size_kb = parseFloat(size_bytes / 1024).toFixed(2);
	var size_mb = parseFloat(size_kb / 1024).toFixed(2);
	
	if($.inArray(fileName, validExtensions) == -1) {
		$("#"+feedback_msg).html("<sapn style='color:red;font-weight:bold'>Only these file types are accepted : "+validExtensions.join(', ')+"</span>");
		$("#"+file_id).focus();
		setTimeout(function(){ $("#"+feedback_msg).html("<sapn style='color:white;'>Add feedback</span>"); }, 3500);
		$("#image_label").html("Please choose image");
		$("#"+file_id).val("");
	}else if(size_mb > 2){
		$("#"+feedback_msg).html("<sapn style='color:red;font-weight:bold'>File size should less than 2 MB. Your file size is "+size_mb+"</span>");
		$("#"+file_id).val("");
		setTimeout(function(){ $("#"+feedback_msg).html("<sapn style='color:white;'>Add feedback</span>"); }, 3500);
		$("#"+file_id).focus();
	}
}

</script>