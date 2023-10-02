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
                            <h3 class="card-name">Notice List</h3>
                            <button style="float:right;" class="btn btn-info" id="add_modal_btn"><i class="fas fa-plus"></i> Add Notice </button>

                            <h5 id="delete_msg" style="text-align:center;"></h5>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Notice</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                    <?php
                                    if (!empty($notice)) {
                                        $i = 1;
                                        foreach ($notice as $note) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $note->notice ?></td>
                                                <td> 

                                                    <a class="btn btn-info btn-sm edit_notice" data-src="<?php echo $note->id; ?>">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>

                                                    <a class="btn btn-danger btn-sm delete_notice" data-src="<?php echo $note->id; ?>">
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
<div class="modal fade" id="add_notice_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Add Notice </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="add_notice_form" name="add_notice_form" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="notice">Notice</label>
                                <input type="text" class="form-control" id="notice" name="notice" placeholder="Enter Notice">
                            </div>



                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="add_btn">Submit</button>
                            <span id="add_notice_msg"></span>
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
<div class="modal fade" id="edit_notice_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Notice </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="edit_notice_form" name="edit_notice_form" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="notice">Notice</label>
                                <input type="hidden" name="hidden_id" id="hidden_id" value="">
                                <input type="text" class="form-control" id="edit_notice" name="notice" placeholder="Enter Notice">
                            </div>
                            
                           
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" id="edit_btn" class="btn btn-primary">Submit</button>
                            <span id="edit_notice_msg"></span>
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
            $("#add_notice_modal").modal("show");
            $("#notice").val("");

        });

// Adding team

        $("#add_btn").click(function () {

            var notice;
            notice = $("#notice").val();


            if (notice.length <= 0) {
                $("#add_notice_msg").html("<sapn style='color:red;font-weight:bold'>Please enter notice</span>");
                $("#notice").focus();
                setTimeout(function () {
                    $("#add_notice_msg").html("<sapn style='color:white;'>Add Notice</span>");
                }, 3500);
            } else {
                var fd = new FormData();

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>notice/add_notice',
                    data: new FormData($('#add_notice_form')[0]),
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        $("#add_btn").hide();
                        if (result == 1) {
                            $("#add_notice_msg").html("<sapn style='color:green;font-weight:bold'>notice added successfully...</span>");
                            $("#notice").val("");
                            setTimeout(function () {
                                location.reload();
                            }, 3500);
                        } else {
                            $("#add_notice_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
                            setTimeout(function () {
                                $("#add_notice_msg").html("<sapn style='color:white;'>Add notice</span>");
                            }, 3500);
                        }
                    }
                });
            }
        });


// Call edit video modal

        $("#show_data").on('click', '.edit_notice', function () {
            var id = $(this).attr("data-src");

            $.ajax({
                type: "POST",
                url: '<?php echo base_url(); ?>notice/get_notice_data',
                data: {id: id},
                dataType: "json",
                success: function (result) {
                    $("#edit_notice").val(result[0].notice);
                    $("#hidden_id").val(result[0].id);
                    $("#edit_notice_modal").modal("show");
                }
            });

        });

// Adding video

        $("#edit_btn").click(function () {
            var notice;
            notice = $("#edit_notice").val();


            if (notice.length <= 0) {
                $("#edit_notice_msg").html("<sapn style='color:red;font-weight:bold'>Please enter notice</span>");
                $("#edit_name").focus();
                setTimeout(function () {
                    $("#edit_notice_msg").html("<sapn style='color:white;'>Edit notice</span>");
                }, 3500);
            } else {
                var fd = new FormData();

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>notice/edit_notice',
                    data: new FormData($('#edit_notice_form')[0]),
                    contentType: false,
                    processData: false,
                    success: function (result) {
                        if (result == 1) {
                            $("#edit_notice_msg").html("<sapn style='color:green;font-weight:bold'>notice updated successfully...</span>");
                            $("#edit_notice").val("");
                            $("#edit_btn").hide();
                            setTimeout(function () {
                                location.reload();
                            }, 3500);
                        } else {
                            $("#edit_notice_msg").html("<sapn style='color:red;font-weight:bold'>Something went wrong, Please try again...</span>");
                            setTimeout(function () {
                                $("#edit_notice_msg").html("<sapn style='color:white;'>Edit notice</span>");
                            }, 3500);
                        }
                    }
                });
            }

        });


// Team Feedback

        $("#show_data").on('click', '.delete_notice', function () {
            var id = $(this).attr("data-src");

            var confrm = confirm('Do You Want To Delete');

            if (confrm) {
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url(); ?>notice/delete_notice',
                    data: {id: id},
                    success: function (result) {

                        //alert(result);

                        if (result == 1) {
                            $("#delete_msg").html("<sapn style='color:green;font-weight:bold'>notice Delete successfully...</span>");
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