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
        <!-- jQuery -->
    <script src="<?php echo base_url();?>electro/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>electro/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>electro/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>electro/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>electro/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>electro/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
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
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Producer</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data as $key => $value) {
                            ?>
                            <tr id="row_id_<?php echo $value->id ?>" class="odd gradeX" align="center">
                                <td><?php echo $value->id ?></td>
                                <td><?php echo $value->name ?></td>
                                <td><?php echo $value->price ?></td>
                                <td><?php echo $value->producer ?></td>
                                <td>Hiện</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                    <a href="#" onclick="return del('<?php echo $value->id ?>');"> Delete</a></td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw">
                                        
                                    </i> 
                                    <a data-target="#edit-modal" data-toggle="modal" class="MainNavText" id="MainNavHelp" 
                                    data-whatever="<?php echo $value->id ?>" href="#">Edit</a>
                                </td>


                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('admin/modalform')?>



    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    <script type="text/javascript">
        var base_url = "<?php echo base_url() ?>";
        
        $('#new-modal').on('shown.bs.modal', function (event) 
            {
                //Load danh sach category vao dropdown
                $.each(listCat, function(k,v)
                {
                  s ='<option value="' +v.id+'" >'+v.name +'</option>';
                   $("#new-modal #cat_id").append(s);
                  });
            });

        $('#edit-modal').on('shown.bs.modal', function (event) {
          var button = $(event.relatedTarget) ;// Button that triggered the modal
          var id = button.data('whatever') ;
          $('#edit-modal #product_id').val(id);
           $.ajax({
                     url: base_url+"index.php/Admin/detail/"+id,
                     dataType:'json',
                     success: function(datareturn)
                     {
                        console.log(datareturn);
                        $('#edit-modal #product_name').val(datareturn.name);
                        $('#edit-modal #description').val(datareturn.description);
                        $('#edit-modal #producer').val(datareturn.producer);
                        $('#edit-modal #price').val(datareturn.price);
                        $('#edit-modal #img_0 img').attr("src",base_url+'electro/'+datareturn.image);
                        $("#cat_id").empty();
                      
                      //Load danh sach category vao dropdown
                        $.each(listCat, function(k,v){
                          if (v.id == datareturn.product_type_id) s1 =" selected ";
                          else s1 ="";
                          s ='<option value="' +v.id+'" ' + s1+'>'+v.name +'</option>';
                           $("#edit-modal #cat_id").append(s);
                        })
                     },
                });
        });

        //------insert-----
        $("#new-modal #submit").click(function()
        {

          var form = new FormData($('#frm-new-modal')[0]);
          
          $.ajax({
                  url:base_url+'index.php/Admin/insert/',
                  data:form, 
                  type:"POST",
                  processData: false,
                      contentType: false,
                  success:function(dataReturn)
                  {
                    //alert(dataReturn);
                    if (dataReturn==1)
                    {
                    alert("Inserted!");
                    $('#new-modal').hide(2000);
                  
                    // setTimeout(function(){
                    //               $('#edit-modal').modal('hide')
                    //           }, 2000);
                    window.location.reload();
                  }
                  else 
                  {
                    window.location.reload();
                  }
              
                //return false;
            },
            error: function(xhr, status, error) 
                    {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }
          });
        });

        //------update-----
        $("#edit-modal #submit").click(function()
        {

          var form = new FormData($('#frm-edit-modal')[0]);
          
          $.ajax({
                  url:base_url+'index.php/Admin/update/',
                  data:form, 
                  type:"POST",
                  processData: false,
                      contentType: false,
                  success:function(dataReturn)
                  {
                    //alert(dataReturn);
                    if (dataReturn==1)
                    {
                    alert("Updated!");
                    $('#edit-modal').hide(2000);
                  
                    setTimeout(function(){
                                  $('#edit-modal').modal('hide')
                              }, 2000);
                  window.location.reload();
                  }
                  else 
                  {
                 alert("Failed to update ! Please try again !");
                }
              
                //return false;
            },
            error: function(xhr, status, error) 
                    {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }
          });
        });

        function del(id)
        {
            if (confirm('Delete product id=?'+ id))
            {
               $.ajax({
                     url: base_url+"index.php/Admin/delete",
                     data:{'product_id':id},
                    
                     type:'POST',
                     success: function(datareturn)
                     {
                        $('#row_id_'+id).hide('slow');
                      
                     },

                });
             }

             return false;
          }

    listCat = <?php echo $data2 ?>;
    console.log(listCat);
    </script>

</body>

</html>
