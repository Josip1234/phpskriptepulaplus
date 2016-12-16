<!DOCTYPE html>
<html>
<head>
	<title>Items</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<center><h1 class="page-header">Items </h1> </center>

				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addItem" id="addItemModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	Add new Item
				</button>

				<br /> <br /> <br />

				<table class="table" id="manageItemTable">					
					<thead>
						<tr>
							<th>id</th>
							<th>item</th>													
							<th>description</th>
							<th>quantity</th>								
							<th>option</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addItem">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Add item</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create_item.php" method="POST" id="createItemForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="item" class="col-sm-2 control-label">Item</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="item" name="item" placeholder="Item">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="description" class="col-sm-2 control-label">Description</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="description" name="description" placeholder="Description">
			    </div>
			  </div>


		<div class="form-group">
			    <label for="quantity" class="col-sm-2 control-label">Quantity</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
			    </div>
			  </div>


	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      </form> 
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /add modal -->

	<!-- remove modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="removeItemModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Item</h4>
	      </div>
	      <div class="modal-body">
	        <p>Do you really want to remove ?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="removeBtn">Save changes</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /remove modal -->

	<!-- edit modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="editItemModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Item</h4>
	      </div>

		<form class="form-horizontal" action="php_action/update_item.php" method="POST" id="updateItemForm">	      

	      <div class="modal-body">
	        	
	        <div class="edit-messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="editItem" class="col-sm-2 control-label">Item</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="editItem" name="editItem" placeholder="Item">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="editDescription" class="col-sm-2 control-label">Description</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editDescription" name="editDescription" placeholder="Description">
			    </div>
			  </div>


			   <div class="form-group">
			    <label for="editQuantity" class="col-sm-2 control-label">Quantity</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" id="editQuantity" name="editQuantity" placeholder="Quantity">
			    </div>
			  </div>

	

	      <div class="modal-footer editItemModal">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	      </form>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- /edit modal -->

	<!-- jquery plugin -->
	<script type="text/javascript" src="assests/jquery/jquery.min.js"></script>
	<!-- bootstrap js -->
	<script type="text/javascript" src="assests/bootstrap/js/bootstrap.min.js"></script>
	<!-- datatables js -->
	<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
	<!-- include custom index.js -->
	<script type="text/javascript" src="custom/js/index_item.js"></script>

</body>
</html>