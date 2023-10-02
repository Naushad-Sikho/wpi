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
                            <h3 class="card-name">Video List</h3>
                            <button style="float:right;" class="btn btn-info" id="add_modal_btn"><i class="fas fa-plus"></i> Add video </button>

                            <h5 id="delete_msg" style="text-align:center;"></h5>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Video link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    <?php
                                    if (!empty($videos)) {
                                        $i = 1;
                                        foreach ($videos as $video) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><iframe id="frame" src="https://www.youtube.com/embed/<?php echo $video->video_link ?>" frameborder="0"></iframe></td>
                                                <td> 

                                                    <a class="btn btn-info btn-sm edit_video" data-src="<?php echo $video->id; ?>">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>

                                                    <a class="btn btn-danger btn-sm delete_video" data-src="<?php echo $video->id; ?>">
                                                        <i class="fas fa-trash-alt">
                                                        </i>
                                                        Delete
                                                    </a>

                                                </td>
                                            </tr>
                                            <?php $i++;
                                        }
                                    } ?>
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

<!-- Add team Modal Start -->
<div class="modal fade" id="add_video_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Add Video </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="add_video_form" name="add_video_form" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="video_link">Video Link (embed)</label>
                                <input type="text" class="form-control" id="video_link" name="video_link" placeholder="Enter Youtube Link">
                            </div>



                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="add_btn">Submit</button>
                            <span id="add_video_msg"></span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Add team Modal End -->

<!-- Edit team Modal Start -->
<div class="modal fade" id="edit_video_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Video </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="edit_video_form" name="edit_video_form" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="video_link">Video Link (embed)</label>
                                <input type="hidden" name="hidden_id" id="hidden_id" value="">
                                <input type="text" class="form-control" id="edit_video_link" name="video_link" placeholder="Enter Youtube Link">
                            </div>
                            
                            <div class="col-sm-3">
						<iframe id="video_image" src="" frameborder="0"></iframe>
						
					</div>


                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" id="edit_btn" class="btn btn-primary">Submit</button>
                            <span id="edit_video_msg"></span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Edit team Modal End -->


<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/responsive.bootstrap4.min.js"></script>

<!-- Bootstrap Switch -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-switch.min.js"></script>

<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>assets/js/bs-custom-file-input.min.js"></script> 

<script>

    // A $( document ).ready() block.
    $(document).ready(function () {
        var table = $("#example1").DataTable();
        // For custom input file 
        bsCustomFileInput.init();
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

// Show Popup modal
        $("#add_modal_btn").click(function () {
            $("#add_video_modal").modal("show");
            $("#video_link").val("");

        });

// Adding team

        $("#add_btn").click(function () {

            var video_link;
            video_link = $("#video_link").val();


            if (video_link.length <= 0) {
                $("#add_video_msg").html("<sapn style='color:red;font-weight:bold'>Please enter youtube link</span>");
                $("#video_link").focus();
                setTimeout(function () {
                    $("#add_video_msg").html("<sapn style='color:white;'>Add Video</span>");
                }, 3500);
            } else {
                var fd = new FormData();

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>video/add_video',
                    data: new FormData($('#add_video_form')[0]),
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        $("#add_btn").hide();
                        if (result == 1) {
                            $("#add_video_msg").html("<sapn style='color:green;font-weight:bold'>video added successfully...</span>");
                            $("#video_link").val("");
                            setTimeout(function () {
                                location.reload();
                            }, 3500);
                        } else {
                            $("#add_video_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
                            setTimeout(function () {
                                $("#add_video_msg").html("<sapn style='color:white;'>Add video</span>");
                            }, 3500);
                        }
                    }
                });
            }
        });


// Call edit video modal

        $("#show_data").on('click', '.edit_video', function () {
            var id = $(this).attr("data-src");

            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>video/get_video_data',
                data: {id: id},
                dataType: "json",
                success: function (result) {
                    $("#edit_video_link").val(result[0].video_link);
                    $("#hidden_id").val(result[0].id);
                    $("#video_image").attr("src",'https://www.youtube.com/embed/'+result[0].video_link);
                    $("#edit_video_modal").modal("show");
                }
            });

        });

// Adding video

        $("#edit_btn").click(function () {
            var video_link;
            video_link = $("#edit_video_link").val();


            if (video_link.length <= 0) {
                $("#edit_video_msg").html("<sapn style='color:red;font-weight:bold'>Please enter youtube link</span>");
                $("#edit_name").focus();
                setTimeout(function () {
                    $("#edit_video_msg").html("<sapn style='color:white;'>Edit video</span>");
                }, 3500);
            } else {
                var fd = new FormData();

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>video/edit_video',
                    data: new FormData($('#edit_video_form')[0]),
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result == 1) {
                            $("#edit_video_msg").html("<sapn style='color:green;font-weight:bold'>video updated successfully...</span>");
                            $("#edit_video_link").val("");
                            $("#edit_btn").hide();
                            setTimeout(function () {
                                location.reload();
                            }, 3500);
                        } else {
                            $("#edit_video_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
                            setTimeout(function () {
                                $("#edit_video_msg").html("<sapn style='color:white;'>Edit Video</span>");
                            }, 3500);
                        }
                    }
                });
            }

        });


// Team Feedback

        $("#show_data").on('click', '.delete_video', function () {
            var id = $(this).attr("data-src");

            var confrm = confirm('Do You Want To Delete');

            if (confrm) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>video/delete_video',
                    data: {id: id},
                    success: function (result) {

                        //alert(result);

                        if (result == 1) {
                            $("#delete_msg").html("<sapn style='color:green;font-weight:bold'>Video Delete successfully...</span>");
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
                        } else {
                            $("#delete_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
                        }
                    }

                });
            }


        });


    });

</script>