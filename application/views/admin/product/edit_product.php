<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - Khoa Phạm</title> -->

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>electro/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>electro/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>electro/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>electro/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>electro/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>electro/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
<!-- NAV HEADER -->
    <?php $this->load->view('admin/nav_header')?>
<!-- /NAV HEADER -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="<?php echo base_url();?>index.php/Admin/Edit?id=<?php echo $data->id;?>" method="POST" name="form_add_product" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" value="<?php echo $data->name?>" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" value="<?php echo $data->price?>" />
                            </div>
                            <div class="form-group">
                                <label>Producer</label>
                                <input class="form-control" name="txtProducer" value="<?php echo $data->producer?>"/>
                                    
                                <!-- </input> -->
                            </div>
                            <div class="form-group">
                                <img src="<?php echo base_url()?>electro/<?php echo $data->image?>" alt="" id="img_tag" width="550px" >
                            </div>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="proimage" name="proimg"/>
                                <!-- <label class="custom-file-label" for="ProductImage" name="proimg">chose file</label> -->
                            </div>

                            <div class="form-group">
                                <label>Product Description</label>
                                <input class="form-control" name="txtDescription" value="<?php echo $data->description?>"/>
                                <!-- <textarea class="form-control" name="txtDescription" rows="3"></textarea> -->
                            </div>
                            <!-- <div class="form-group">
                                <label>Product Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Invisible
                                </label>
                            </div> -->
                            <input type="submit" class="btn btn-default" value="Edit Product" name="btnadd"></input>
                            <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>electro/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>electro/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>electro/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>electro/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>electro/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>electro/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img_tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);

        }
    }
    $("#proimage").change(function(){
        readURL(this);
    });
    </script>
</body>

</html>