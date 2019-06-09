<div id="new-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">				
			<div class="modal-header">
				<a class="close" data-dismiss="modal">X</a>
				<h3>Add New Product</h3>
			</div>				
			<div class="modal-body">

				<form id="frm-new-modal" class="form-horizontal" role="form" method="post" action="" >
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="book_id" name="txtName"  >
						</div>
					</div>


					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Producer</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="book_name" name="txtProducer" >
						</div>
					</div>

					<div class="form-group">
						<label for="description" class="col-sm-2 control-label">Product Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="txtDescription" id='description'></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="price" class="col-sm-2 control-label">Price</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="price" name="txtPrice">
						</div>
					</div>

					<div class="form-group">
						<label for="cat_id" class="col-sm-2 control-label">Category</label>
						<div class="col-sm-10">
							<select name="cat_id" id="cat_id" class="form-control" >
							
							</select>
						</div>
					</div>
					<div class="form-group">
					    <img src="" alt="" id="img_tag_insert" style="display: block; margin: 0 auto"  height="100" width="100" >
					</div>
					<div class="form-group">
						<label for="img" class="col-sm-2 control-label">Image</label>
						<div class="col-sm-10">
							<!-- <input type="file" class="form-control" id="img" name="proimg"/> -->
							<input type="file" class="custom-file-input" id="proimage_insert" name="proimg"/>
						</div>
					</div>

					<div class="modal-footer">
						<button class="btn btn-success" type="submit" id="submit">Send</button>
						<a href="#" class="btn" data-dismiss="modal">Close</a>
					</div>	
				</form>		
			</div>
		</div>				
	</div>
</div>


<!-- edit form -->
<div id="edit-modal" class="modal fade" role="dialog">
<div class="modal-dialog">
	<div class="modal-content">				
		<div class="modal-header">
			<a class="close" data-dismiss="modal">X</a>
			<h3>Edit Product</h3>
		</div>				
		<div class="modal-body">

<form id="frm-edit-modal" class="form-horizontal" role="form" method="post" action="index.php">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Product ID</label>
<div class="col-sm-10">
	<input type="text" class="form-control" id="product_id" name="product_id" readonly >
</div>
</div>


<div class="form-group">
<label for="name" class="col-sm-2 control-label">Product Name</label>
<div class="col-sm-10">
	<input type="text" class="form-control" id="product_name" name="product_name" >
</div>
</div>

<div class="form-group">
<label for="name" class="col-sm-2 control-label">Producer</label>
<div class="col-sm-10">
	<input type="text" class="form-control" id="producer" name="producer" >
</div>
</div>

<div class="form-group">
<label for="description" class="col-sm-2 control-label">Description</label>
<div class="col-sm-10">
	<textarea class="form-control" rows="4" name="description" id='description'></textarea>
</div>
</div>

<div class="form-group">
<label for="price" class="col-sm-2 control-label">Price</label>
<div class="col-sm-10">
	<input type="text" class="form-control" id="price" name="price">
</div>
</div>

<div class="form-group">
<label for="cat_id" class="col-sm-2 control-label">Category</label>
<div class="col-sm-10">
	<select name="cat_id" id="cat_id" class="form-control" >
		
	</select>
</div>
</div>
<div class="row">
	<!-- <div class="col-sm-6">
		<div class="form-group">
		<label for="img" class="col-sm-2 control-label">Image</label>
		<div class="col-sm-10">
			<input type="file" class="form-control" id="img" name="img">
		</div>
		</div>
	</div> -->
	<!-- <div class="col-sm-6">
		<div id='img_0'>
			<img src="" alt="" id="img_tag" style="display: block; margin: 0 auto"  height="100" width="100" >
		</div>
	</div> -->

	<div class="form-group" id='img_0'>
		<img src="" alt="" id="img_tag_edit" style="display: block; margin: 0 auto"  height="100" width="100" >
	</div>

	<div class="form-group">
		<label for="img" class="col-sm-2 control-label">Image</label>
		<div class="col-sm-10">
			<!-- <input type="file" class="form-control" id="img" name="proimg"/> -->
			<input type="file" class="custom-file-input" id="proimage_edit" name="proimg"/>
		</div>
	</div>
</div>



</form>
		</div>			
		<div class="modal-footer">
			<button class="btn btn-success" id="submit">Send</button>
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
	</div>
</div>
</div>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#new-modal #img_tag_insert').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);

        }
    }
    $("#new-modal #proimage_insert").change(function(){
        readURL(this);
    });
</script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img_tag_edit').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);

        }
    }
    $("#proimage_edit").change(function(){
        readURL(this);
    });
</script>



