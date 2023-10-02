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
                <h3 class="card-name">Gallery List</h3>
                <h4 id="success_msg" style="text-align:center;color:green"></h4>
                <h4 id="error_msg" style="text-align:center;color:red"></h4>
				<button id="add_modal_btn" style="float:right;" class="btn btn-info"><i class="fas fa-plus"></i> Add Gallery</button>
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No</th>
					<th>Image</th>
                    <th>Activity</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="show_data">
				  <?php 
				  if(!empty($gallery)){ 
				  $i = 1;
				  foreach($gallery as $catg){
					  
				  ?>
                  <tr>
                    <td><?php echo $i;?></td>
					<td><img src="<?php echo base_url();?>/assets/images/gallery/<?php echo $catg->image;?>" width="100" height="100" alt=""></td>
                    <td><?php echo $catg->name;?></td>
                    
                    <td> 
											
						<a class="btn btn-info btn-sm edit_gallery" data-src="<?php echo $catg->id;?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                        </a>
						
						<a class="btn btn-danger btn-sm delete_gallery" data-src="<?php echo $catg->id;?>" >
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
 
	<!-- Add gallery Modal Start -->
	<div class="modal fade" id="add_gallery_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title" id="add_gallery_msg">Add gallery</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_gallery_form" name="add_gallery_form" enctype="multipart/form-data">
				
                <div class="card-body">
				
					<div class="row">
						<div class="col-6">
						  <div class="form-group">
							<label for="category">Event</label>
							<select class="form-control" id="event" name="event">
								<option value="">Please select Event</option>
								<?php foreach($events as $event){ ?>
									<option value="<?php echo $event->id; ?>"><?php echo $event->name; ?></option>
								<?php } ?>
								
							</select>
						  </div>
						</div> 
						
						
						<div class="col-4">
							<div class="form-group">
								<label for="image">Image</label>
								<div class="input-group">
								  <div class="custom-file">
									<input type="file" class="custom-file-input" name="image[]" id="image" onchange='chk_ext("image")' accept="image/*">
									<label class="custom-file-label image_label"  for="image">Select Image</label>
								  </div>
								</div>
							</div>
						</div>
						
						<div class="col-1">
							<div class="form-group">
								<button id="add_img_btn" type="button" style="margin-bottom:-70px;" class="btn btn-info" title="Add more image"><i class="fas fa-plus"></i></button>
							 </div>
						</div>
					</div>
		  
					<div class="row" id="row_id">
					
						
						
					</div>
                  
                </div>
				
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="add_btn" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- Add gallery Modal End -->
	  
	  <!-- Edit gallery Modal Start -->
	  <div class="modal fade" id="edit_gallery_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            
            <div class="modal-body">
					<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title" id="edit_gallery_msg">Edit gallery</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="edit_gallery_form" name="edit_gallery_form" enctype="multipart/form-data">
			  
                <div class="card-body">
				
				 
				
                  <div class="form-group">
                    <label for="edit_name">Name</label>
					<input type="hidden" name="hidden_id" id="hidden_id" value="">
                    
					<label for="category">Product</label>
							<select class="form-control" id="edit_name" name="event">
								<option value="">Please select Product</option>
								<?php foreach($events as $event){ ?>
									<option value="<?php echo $event->id; ?>"><?php echo $event->name; ?></option>
								<?php } ?>
								
							</select>
                  </div>
				  
				 
				  
				  <div class="row">
					<div class="col-sm-9">
						<div class="form-group">
							<label for="edit_image">Image</label>
							<div class="input-group">
							  <div class="custom-file">
								<input type="file" class="custom-file-input" name="image" id="edit_image" onchange='chk_ext("edit_image")' accept="image/*">
								<label class="custom-file-label" id="edit_image_label">Choose</label>
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
      <!-- Edit gallery Modal End -->
 
 
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
	var i=0;
	var table = $("#example1").DataTable();
	// For custom input file 
	bsCustomFileInput.init();
	
$('.on_of').bootstrapSwitch('state');
	  
// Show Popup modal
$("#add_modal_btn").click(function(){
	$("#add_gallery_modal").modal("show");
	$("#name").val("");
	$("#category").val("");
	$("#image").val("");
	$(".image_label").html("Choose");
}); 
	
// Adding gallery

$("#add_btn").click(function(){
   			
	var description,image;
	
	event = $("#event").val();
	image = $("#image").val();
	
	if(event.length <= 0){
		$("#add_gallery_msg").html("<sapn style='color:red;font-weight:bold'>Please select Activity</span>");
		$("#event").focus();
		setTimeout(function(){ $("#add_gallery_msg").html("<sapn style='color:white;'>Add Gallery</span>"); }, 3500);
	}else if(image.length <= 0){
		$("#add_gallery_msg").html("<sapn style='color:red;font-weight:bold'>Please select gallery image</span>");
		$("#image").focus();
		setTimeout(function(){ $("#add_gallery_msg").html("<sapn style='color:white;'>Add gallery</span>"); }, 3500);
	}else{
		var fd = new FormData();
		
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>gallery/add_gallery',
			data: new FormData($('#add_gallery_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			$("#add_btn").hide();
			if(result == 1){
				$("#add_gallery_msg").html("<sapn style='color:white;font-weight:bold'>Gallery added successfully...</span>");
				$("#name").val("");
				$("#category").val("");
				$("#image").val("");
				$("#image_label").html("Please choose image");
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#add_gallery_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#add_gallery_msg").html("<sapn style='color:white;'>Add Gallery</span>"); }, 3500);
			}
		  }
		 });
	}
});

// Call edit gallery modal
$("#show_data").on( "click",".edit_gallery",function(){      
	var id = $(this).attr("data-src");
	$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>gallery/get_gallery_data',
			data: {id:id},
			dataType: "json",
			success: function(result){
				$("#edit_name").val(result[0].event);	
				$("#hidden_id").val(result[0].id);
				$("#display_img").attr("src",'<?php echo base_url();?>/assets/images/gallery/'+result[0].image);
				$("#edit_gallery_modal").modal("show");	
			}
		 });
	
});


// Adding gallery

$("#edit_btn").click(function(){
	var name,description,image,category;
	name = $("#edit_name").val();
	
	
	
	if(name.length <= 0){
		$("#edit_gallery_msg").html("<sapn style='color:red;font-weight:bold'>Please select Activity</span>");
		$("#edit_name").focus();
		setTimeout(function(){ $("#edit_gallery_msg").html("<sapn style='color:white;'>Edit Gallery</span>"); }, 3500);
	}else{
		var fd = new FormData();
		
		$.ajax({
			type: "POST",
			url: '<?php echo base_url();?>gallery/edit_gallery',
			data: new FormData($('#edit_gallery_form')[0]),
			contentType: false,
            processData: false,
			success: function(result){
			if(result == 1){
				$("#edit_gallery_msg").html("<sapn style='color:white;font-weight:bold'>Gallery updated successfully...</span>");
				$("#edit_name").val("");
				$("#edit_image").val("");
				$("#edit_image_label").html("Please choose image");
				$("#edit_btn").hide();
				setTimeout(function(){ location.reload(); }, 3500);
			}else{
				$("#edit_gallery_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
				setTimeout(function(){ $("#edit_gallery_msg").html("<sapn style='color:white;'>Edit Gallery</span>"); }, 3500);
			}
		  }
		 });
	}
	
});


// Deleting Gallery

$("#show_data").on('click','.delete_gallery',function(){	
	var id = $(this).attr("data-src");
	var confrm = confirm('Do You Want To Delete');
	if(confrm){
		$.ajax({
				type: "POST",
				url: '<?php echo base_url();?>gallery/delete_gallery',
				data: {id:id},
				success: function(result){
					
					//alert(result);
					
					if(result == 1){
					$("#success_msg").html("<sapn style='color:green;font-weight:bold'>Gallery Delete successfully...</span>");
					setTimeout(function(){ location.reload(); }, 3000);
					}else{
					$("#error_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
					setTimeout(function(){ location.reload(); }, 3000);
					}     
				}
				
			 });
	}	 
		 
	
}); 


// Adding image

$("#add_img_btn").click(function(){
	i++;
	$("#row_id").append(`
							
							<div class="col-4" id="remove_${i}">
							<div class="form-group">
							<label for="image_${i}">Image</label>
								<div class="input-group">
								  <div class="custom-file">
									<input type="file" name="image[]" id="image_${i}" onchange='chk_ext("image_${i}")' accept="image/*">
									
								  </div>
								</div>
							</div>
							</div>
							<div class="col-1" id="remove_img_btn_${i}">
							<div class="form-group">
								<button onclick='remove_me("${i}")' type="button" style="margin-bottom:-70px;" data-src="${i}" class="btn btn-danger" title="Remove image"><i class="fas fa-minus"></i></button>
							 </div>
						</div>`);
});

	
});

function remove_me(remove_id){
	$("#name_"+remove_id).remove();
	$("#remove_"+remove_id).remove();
	$("#remove_img_btn_"+remove_id).remove();
}

function chk_ext(file_id){
	if(file_id == "image"){
		var gallery_msg = "add_gallery_msg";	
	}else{
		var gallery_msg = "edit_gallery_msg";
	}
	var input = document.getElementById(file_id);
	
	var validExtensions = ['jpg','png','jpeg'];
	var fileName = input.files[0].name.split(".").pop().toLowerCase();
	var size_bytes = input.files[0].size;
	var size_kb = parseFloat(size_bytes / 1024).toFixed(2);
	var size_mb = parseFloat(size_kb / 1024).toFixed(2);
	
	if($.inArray(fileName, validExtensions) == -1) {
		$("#"+gallery_msg).html("<sapn style='color:red;font-weight:bold'>Only these file types are accepted : "+validExtensions.join(', ')+"</span>");
		$("#"+file_id).focus();
		setTimeout(function(){ $("#"+gallery_msg).html("<sapn style='color:white;'>Add gallery</span>"); }, 3500);
		$("#image_label").html("Please choose image");
		$("#"+file_id).val("");
	}else if(size_mb > 2){
		$("#"+gallery_msg).html("<sapn style='color:red;font-weight:bold'>File size should less than 2 MB. Your file size is "+size_mb+"</span>");
		$("#"+file_id).val("");
		setTimeout(function(){ $("#"+gallery_msg).html("<sapn style='color:white;'>Add gallery</span>"); }, 3500);
		$("#"+file_id).focus();
	}
}

</script> 
