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
                            <h3 class="card-name">About Us</h3>
                            <?php if(count($about_me) == 0) { ?>
                            <button style="float:right;" class="btn btn-info" id="add_modal_btn"><i class="fas fa-plus"></i> Add About Us</button> 
                            <?php } ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Vission</th>
                                        <th>Mission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($about_me)) {
                                        $i = 1;
                                        foreach ($about_me as $about) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img src="<?php echo base_url(); ?>/assets/images/about_me/<?php echo $about->image; ?>" width="100" height="100" alt="<?php echo $about->name; ?>"></td>
                                                <td><?php echo $about->name; ?></td>
                                                <td><?php echo $about->description; ?></td>
                                                <td><?php echo $about->vission; ?></td>
                                                <td><?php echo $about->mission; ?></td>
                                                <td> 

                                                    <a class="btn btn-info btn-sm edit_about_me" data-src="<?php echo $about->id; ?>" style="margin-bottom:5px;">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>

                                                    <?php
                                                    if ($about->is_active == 1) {
                                                        $check_val = "checked";
                                                    } else {
                                                        $check_val = "";
                                                    }
                                                    ?>

                                                    <input class="on_off_event" type="checkbox" <?php echo $check_val; ?> data-src="<?php echo $about->id; ?>" data-toggle="toggle" data-onstyle="warning" data-size="sm">	

                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    }
                                    ?>
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

<!-- Add about_me Modal Start -->
<div class="modal fade" id="add_about_me_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Add About Us</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="add_about_me_form" name="add_about_me_form" enctype="multipart/form-data">

                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>


                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="vission">Vission</label>
                                <textarea class="form-control" id="vission" name="vission" placeholder="Vission"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="mission">Description</label>
                                <textarea class="form-control" id="mission" name="mission" placeholder="Mission"></textarea>
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
                            <span id="add_about_me_msg"></span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Add about_me Modal End -->

<!-- Edit about_me Modal Start -->
<div class="modal fade" id="edit_about_me_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit About Us</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="edit_about_me_form" name="edit_about_me_form" enctype="multipart/form-data">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="edit_name">Name</label>
                                        <input type="hidden" name="hidden_id" id="hidden_id" value="">
                                        <input type="text" class="form-control" id="edit_name" name="name" placeholder="name">
                                    </div>
                                </div> 


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="edit_image">Image (Dimention : 700 x 700)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="edit_image" onchange='chk_ext("edit_image")' accept="image/*">
                                                <label class="custom-file-label" id="edit_image_label">Select Image</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">

                                    <img id="display_img" src="" width="100" height="100" class="elevation-2" alt="">

                                </div>


                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="edit_description" name="description" placeholder="Description"></textarea>
                                </div>				 


                                <div class="form-group">
                                    <label for="vission">Vission</label>
                                    <textarea class="form-control" id="edit_vission" name="vission" placeholder="Vission"></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="mission">Mission</label>
                                    <textarea class="form-control" id="edit_mission" name="mission" placeholder="Mission"></textarea>
                                </div>  


                            </div>  
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" id="edit_btn" class="btn btn-primary">Submit</button>
                            <span id="edit_about_me_msg"></span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Edit about_me Modal End -->


<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/responsive.bootstrap4.min.js"></script>

<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-switch.min.js"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/js/bs-custom-file-input.min.js"></script> 

<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/js/summernote-bs4.min.js"></script> 

<script>

                                                    // A $( document ).ready() block.
                                                    $(document).ready(function () {
                                                        var table = $("#example1").DataTable();
                                                        // For custom input file 
                                                        bsCustomFileInput.init();

// Summernote
                                                        $('#description').summernote({
                                                            height: 150, //set editable area's height
                                                            codemirror: {// codemirror options
                                                                theme: 'monokai'
                                                            }
                                                        });

                                                        $('#vission').summernote({
                                                            height: 150, //set editable area's height
                                                            codemirror: {// codemirror options
                                                                theme: 'monokai'
                                                            }
                                                        });

                                                        $('#mission').summernote({
                                                            height: 150, //set editable area's height
                                                            codemirror: {// codemirror options
                                                                theme: 'monokai'
                                                            }
                                                        });

                                                        $('#edit_description').summernote({
                                                            height: 150, //set editable area's height
                                                            codemirror: {// codemirror options
                                                                theme: 'monokai'
                                                            }
                                                        });

                                                        $('#edit_vission').summernote({
                                                            height: 150, //set editable area's height
                                                            codemirror: {// codemirror options
                                                                theme: 'monokai'
                                                            }
                                                        });

                                                        $('#edit_mission').summernote({
                                                            height: 150, //set editable area's height
                                                            codemirror: {// codemirror options
                                                                theme: 'monokai'
                                                            }
                                                        });


                                                        $("#example1").on("change", ".on_off_event", function () {

                                                            var id = $(this).attr("data-src");
                                                            var is_activee;

                                                            if ($(this).is(":checked")) {
                                                                is_activee = 1;
                                                            } else {
                                                                is_activee = 0;
                                                            }

                                                            $.ajax({
                                                                type: "POST",
                                                                url: '<?php echo base_url(); ?>index.php/about_me/active_enactive',
                                                                data: {is_active: is_activee, id: id},
                                                                success: function (result) {

                                                                }
                                                            });

                                                        });

// Show Popup modal
                                                        $("#add_modal_btn").click(function () {
                                                            $("#add_about_me_modal").modal("show");
                                                            $("#name").val("");
                                                            $("#description").val("");
                                                            $("#vission").val("");
                                                            $("#mission").val("");
                                                            $("#image").val("");
                                                            $("#image_label").html("Please choose image");
                                                        });

// Adding about_me

                                                        $("#add_btn").click(function () {

                                                            var name, description, vission, mission, image;
                                                            name = $("#name").val();
                                                            image = $("#image").val();
                                                            description = $("#description").val();
                                                            vission = $("#vission").val();
                                                            mission = $("#mission").val();

                                                            if (name.length <= 0) {
                                                                $("#add_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Please enter name</span>");
                                                                $("#name").focus();
                                                                setTimeout(function () {
                                                                    $("#add_about_me_msg").html("<sapn style='color:white;'>Add about_me</span>");
                                                                }, 3500);
                                                            } else if (description.length <= 0) {
                                                                $("#add_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Please enter description</span>");
                                                                $("#description").focus();
                                                                setTimeout(function () {
                                                                    $("#add_about_me_msg").html("<sapn style='color:white;'>Add about_me</span>");
                                                                }, 3500);
                                                            } else if (vission.length <= 0) {
                                                                $("#add_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Please enter vission</span>");
                                                                $("#vission").focus();
                                                                setTimeout(function () {
                                                                    $("#add_about_me_msg").html("<sapn style='color:white;'>Add about_me</span>");
                                                                }, 3500);
                                                            } else if (mission.length <= 0) {
                                                                $("#add_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Please enter mission</span>");
                                                                $("#mission").focus();
                                                                setTimeout(function () {
                                                                    $("#add_about_me_msg").html("<sapn style='color:white;'>Add about_me</span>");
                                                                }, 3500);
                                                            } else if (image.length <= 0) {
                                                                $("#add_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Please select about_me image</span>");
                                                                $("#image").focus();
                                                                setTimeout(function () {
                                                                    $("#add_about_me_msg").html("<sapn style='color:white;'>Add about_me</span>");
                                                                }, 3500);
                                                            } else {
                                                                $("#add_btn").hide();
                                                                var fd = new FormData();

                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: '<?php echo base_url(); ?>about_me/add_about_me',
                                                                    data: new FormData($('#add_about_me_form')[0]),
                                                                    contentType: false,
                                                                    processData: false,
                                                                    success: function (result) {

                                                                        if (result == 1) {
                                                                            $("#add_about_me_msg").html("<sapn style='color:white;font-weight:bold'>About Me added successfully...</span>");
                                                                            $("#name").val("");
                                                                            $("#designation").val("");
                                                                            $("#vission").val("");
                                                                            $("#mission").val("");
                                                                            $("#image").val("");
                                                                            $("#image_label").html("Please choose image");
                                                                            $("#add_btn").hide();
                                                                            setTimeout(function () {
                                                                                location.reload();
                                                                            }, 3500);
                                                                        } else {
                                                                            $("#add_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
                                                                            setTimeout(function () {
                                                                                $("#add_about_me_msg").html("<sapn style='color:white;'>Add about_me</span>");
                                                                            }, 3500);
                                                                        }
                                                                    }
                                                                });
                                                            }
                                                        });


// Call edit about_me modal

                                                        $("#example1").on("click", ".edit_about_me", function () {
                                                            var id = $(this).attr("data-src");

                                                            $.ajax({
                                                                type: "POST",
                                                                url: '<?php echo base_url(); ?>about_me/get_about_me_data',
                                                                data: {id: id},
                                                                dataType: "json",
                                                                success: function (result) {
                                                                    $("#edit_name").val(result[0].name);
                                                                    $("#edit_description").val(result[0].description);
                                                                    $(".note-editable").html(result[0].description);
                                                                    $("#edit_vission").val(result[0].vission);
                                                                    $(".note-editable").html(result[0].vission);
                                                                    $("#edit_mission").val(result[0].mission);
                                                                    $(".note-editable").html(result[0].mission);
                                                                    $("#hidden_id").val(result[0].id);
                                                                    $("#display_img").attr("src", '<?php echo base_url(); ?>/assets/images/about_me/' + result[0].image);
                                                                    $("#edit_about_me_modal").modal("show");
                                                                }
                                                            });

                                                        });

// Adding about_me

                                                        $("#edit_btn").click(function () {
                                                            var name, edit_description, edit_vission, edit_mission, image;
                                                            name = $("#edit_name").val();
                                                            edit_description = $("#edit_description").val();
                                                            edit_vission = $("#edit_vission").val();
                                                            edit_mission = $("#edit_mission").val();


                                                            if (name.length <= 0) {
                                                                $("#edit_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Please enter name</span>");
                                                                $("#edit_name").focus();
                                                                setTimeout(function () {
                                                                    $("#edit_about_me_msg").html("<sapn style='color:white;'>Edit About Me</span>");
                                                                }, 3500);
                                                            } else if (edit_description.length <= 0) {
                                                                $("#edit_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Please enter description</span>");
                                                                $("#edit_description").focus();
                                                                setTimeout(function () {
                                                                    $("#edit_about_me_msg").html("<sapn style='color:white;'>Edit About Me</span>");
                                                                }, 3500);
                                                            } else if (edit_vission.length <= 0) {
                                                                $("#edit_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Please enter vission</span>");
                                                                $("#edit_vission").focus();
                                                                setTimeout(function () {
                                                                    $("#edit_about_me_msg").html("<sapn style='color:white;'>Edit About Me</span>");
                                                                }, 3500);
                                                            } else if (edit_mission.length <= 0) {
                                                                $("#edit_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Please enter mission</span>");
                                                                $("#edit_mission").focus();
                                                                setTimeout(function () {
                                                                    $("#edit_about_me_msg").html("<sapn style='color:white;'>Edit About Me</span>");
                                                                }, 3500);
                                                            } else {
                                                                var fd = new FormData();

                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: '<?php echo base_url(); ?>about_me/edit_about_me',
                                                                    data: new FormData($('#edit_about_me_form')[0]),
                                                                    contentType: false,
                                                                    processData: false,
                                                                    success: function (result) {
                                                                        if (result == 1) {
                                                                            $("#edit_about_me_msg").html("<sapn style='color:green;font-weight:bold'>About Me updated successfully...</span>");
                                                                            $("#edit_name").val("");
                                                                            $("#edit_designation").val("");
                                                                            $("#edit_vission").val("");
                                                                            $("#edit_mission").val("");
                                                                            $("#edit_image").val("");
                                                                            $("#edit_image_label").html("Please choose image");
                                                                            $("#edit_btn").hide();
                                                                            setTimeout(function () {
                                                                                location.reload();
                                                                            }, 3500);
                                                                        } else {
                                                                            $("#edit_about_me_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
                                                                            setTimeout(function () {
                                                                                $("#edit_about_me_msg").html("<sapn style='color:white;'>Edit about_me</span>");
                                                                            }, 3500);
                                                                        }
                                                                    }
                                                                });
                                                            }

                                                        });

                                                    });

                                                    function chk_ext(file_id) {
                                                        if (file_id == "image") {
                                                            var about_me_msg = "add_about_me_msg";
                                                        } else {
                                                            var about_me_msg = "edit_about_me_msg";
                                                        }
                                                        var input = document.getElementById(file_id);

                                                        var validExtensions = ['jpg', 'png', 'jpeg'];
                                                        var fileName = input.files[0].name.split(".").pop().toLowerCase();
                                                        var size_bytes = input.files[0].size;
                                                        var size_kb = parseFloat(size_bytes / 1024).toFixed(2);
                                                        var size_mb = parseFloat(size_kb / 1024).toFixed(2);

                                                        if ($.inArray(fileName, validExtensions) == -1) {
                                                            $("#" + about_me_msg).html("<sapn style='color:red;font-weight:bold'>Only these file types are accepted : " + validExtensions.join(', ') + "</span>");
                                                            $("#" + file_id).focus();
                                                            setTimeout(function () {
                                                                $("#" + about_me_msg).html("<sapn style='color:white;'>Add about_me</span>");
                                                            }, 3500);
                                                            $("#image_label").html("Please choose image");
                                                            $("#" + file_id).val("");
                                                        } else if (size_mb > 2) {
                                                            $("#" + about_me_msg).html("<sapn style='color:red;font-weight:bold'>File size should less than 2 MB. Your file size is " + size_mb + "</span>");
                                                            $("#" + file_id).val("");
                                                            setTimeout(function () {
                                                                $("#" + about_me_msg).html("<sapn style='color:white;'>Add about_me</span>");
                                                            }, 3500);
                                                            $("#" + file_id).focus();
                                                        }
                                                    }

</script>