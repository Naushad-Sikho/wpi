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
                            <h3 class="card-name">Constitution</h3>
                            <?php if (count($constitution) == 0) { ?>
                                <button style="float:right;" class="btn btn-info" id="add_modal_btn"><i class="fas fa-plus"></i> Add Constitution</button> 
                            <?php } ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($constitution)) {
                                        $i = 1;
                                        foreach ($constitution as $const) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $const->description; ?></td>
                                                <td> 

                                                    <a class="btn btn-info btn-sm edit_constitution" data-src="<?php echo $const->id; ?>" style="margin-bottom:5px;">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>

                                                    <?php
                                                    if ($const->is_active == 1) {
                                                        $check_val = "checked";
                                                    } else {
                                                        $check_val = "";
                                                    }
                                                    ?>

                                                    <input class="on_off_event" type="checkbox" <?php echo $check_val; ?> data-src="<?php echo $const->id; ?>" data-toggle="toggle" data-onstyle="warning" data-size="sm">	

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
<div class="modal fade" id="add_constitution_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Add Constitution</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="add_constitution_form" name="add_constitution_form" enctype="multipart/form-data">

                        <div class="card-body">

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description"></textarea>
                            </div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="add_btn">Submit</button>
                            <span id="add_constitution_msg"></span>
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
<div class="modal fade" id="edit_constitution_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Constitution</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="edit_constitution_form" name="edit_constitution_form" enctype="multipart/form-data">

                        <div class="card-body">

                            <div class="row">

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="hidden" name="hidden_id" id="hidden_id" value="">
                                    <textarea class="form-control" id="edit_description" name="description" placeholder="Description"></textarea>
                                </div>				 

                            </div>  
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" id="edit_btn" class="btn btn-primary">Submit</button>
                            <span id="edit_constitution_msg"></span>
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


        $('#edit_description').summernote({
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
                url: '<?php echo base_url(); ?>/constitution/active_enactive',
                data: {is_active: is_activee, id: id},
                success: function (result) {

                }
            });

        });

// Show Popup modal
        $("#add_modal_btn").click(function () {
            $("#add_constitution_modal").modal("show");
            $("#description").val("");
        });

// Adding about_me

        $("#add_btn").click(function () {

            var description;
            description = $("#description").val();

            if (description.length <= 0) {
                $("#add_constitution_msg").html("<sapn style='color:red;font-weight:bold'>Please enter description</span>");
                $("#description").focus();
                setTimeout(function () {
                    $("#add_constitution_msg").html("<sapn style='color:white;'>Add constitution</span>");
                }, 3500);
            } else {
                $("#add_btn").hide();
                var fd = new FormData();

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>constitution/add_constitution',
                    data: new FormData($('#add_constitution_form')[0]),
                    contentType: false,
                    processData: false,
                    success: function (result) {

                        if (result == 1) {
                            $("#add_constitution_msg").html("<sapn style='color:white;font-weight:bold'>constitution added successfully...</span>");
                            $("#designation").val("");
                            $("#add_btn").hide();
                            setTimeout(function () {
                                location.reload();
                            }, 3500);
                        } else {
                            $("#add_constitution_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
                            setTimeout(function () {
                                $("#add_constitution_msg").html("<sapn style='color:white;'>Add constitution</span>");
                            }, 3500);
                        }
                    }
                });
            }
        });


// Call edit constitution modal

        $("#example1").on("click", ".edit_constitution", function () {
            var id = $(this).attr("data-src");

            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>constitution/get_constitution_data',
                data: {id: id},
                dataType: "json",
                success: function (result) {
                    $("#edit_description").val(result[0].description);
                    $(".note-editable").html(result[0].description);
                    $("#hidden_id").val(result[0].id);
                    $("#edit_constitution_modal").modal("show");
                }
            });

        });

// Adding about_me

        $("#edit_btn").click(function () {
            var edit_description;
            edit_description = $("#edit_description").val();

             if (edit_description.length <= 0) {
                $("#edit_constitution_msg").html("<sapn style='color:red;font-weight:bold'>Please enter description</span>");
                $("#edit_description").focus();
                setTimeout(function () {
                    $("#edit_constitution_msg").html("<sapn style='color:white;'>Edit Constitution</span>");
                }, 3500);
            } else {
                var fd = new FormData();

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>constitution/edit_constitution',
                    data: new FormData($('#edit_constitution_form')[0]),
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result == 1) {
                            $("#edit_constitution_msg").html("<sapn style='color:green;font-weight:bold'>Constitution updated successfully...</span>");
                            $("#edit_designation").val("");
                            $("#edit_btn").hide();
                            setTimeout(function () {
                                location.reload();
                            }, 3500);
                        } else {
                            $("#edit_constitution_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
                            setTimeout(function () {
                                $("#edit_constitution_msg").html("<sapn style='color:white;'>Edit constitution</span>");
                            }, 3500);
                        }
                    }
                });
            }

        });

    });

    

</script>