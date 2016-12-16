<!DOCTYPE html>
<html>
<head>
	<title>restorani</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- datatables css -->
	<link rel="stylesheet" type="text/css" href="assests/datatables/datatables.min.css">

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<center><h1 class="page-header">Restorani</h1> </center>

				<div class="removeMessages"></div>

				<button class="btn btn-default pull pull-right" data-toggle="modal" data-target="#addRestoran" id="addRestoranModalBtn">
					<span class="glyphicon glyphicon-plus-sign"></span>	dodaj restoran
				</button>

				<br /> <br /> <br />

				<table class="table" id="manageRestoranTable">					
					<thead>
						<tr>
							<th>id</th>
							<th>naziv</th>													
							<th>mjesto</th>
							<th>kontakt</th>								
							<th>mail</th>
							<th>option</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<!-- add modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="addRestoran">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>	Add restoran</h4>
	      </div>
	      
	      <form class="form-horizontal" action="php_action/create.php" method="POST" id="createRestoranForm">

	      <div class="modal-body">
	      	<div class="messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="naziv" class="col-sm-2 control-label">Naziv</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="naziv" name="naziv" placeholder="naziv">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="mjesto" class="col-sm-2 control-label">Mjesto</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="mjesto" name="mjesto" placeholder="Mjesto">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="kontakt" class="col-sm-2 control-label">Kontakt</label>
			    <div class="col-sm-10">
			     <input type="number" class="form-control" id="kontakt" name="kontakt" placeholder="Kontakt">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="mail" class="col-sm-2 control-label">Mail</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="mail" name="mail" placeholder="Mail">
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
	<div class="modal fade" tabindex="-1" role="dialog" id="removeRestoranModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Ukloni restoran</h4>
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
	<div class="modal fade" tabindex="-1" role="dialog" id="editRestoranModal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit</h4>
	      </div>

		<form class="form-horizontal" action="php_action/update.php" method="POST" id="updateRestoranForm">	      

	      <div class="modal-body">
	        	
	        <div class="edit-messages"></div>

			  <div class="form-group"> <!--/here teh addclass has-error will appear -->
			    <label for="editNaziv" class="col-sm-2 control-label">Naziv</label>
			    <div class="col-sm-10"> 
			      <input type="text" class="form-control" id="editNaziv" name="editNaziv" placeholder="Naziv">
				<!-- here the text will apper  -->
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="editMjesto" class="col-sm-2 control-label">Mjesto</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editMjesto" name="editMjesto" placeholder="Mjesto">
			    </div>
			  </div>

			    <div class="form-group">
			    <label for="editKontakt" class="col-sm-2 control-label">Kontakt</label>
			    <div class="col-sm-10">
			    <input type="number" class="form-control" id="editKontakt" name="editKontakt" placeholder="Kontakt">
			    </div>
			  </div>
	      

			  <div class="form-group">
			    <label for="editMail" class="col-sm-2 control-label">Mail</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="editMail" name="editMail" placeholder="Mail">
			    </div>
			  </div>

			

	      <div class="modal-footer editRestoranModal">
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
	<script type="text/javascript" src="custom/js/index.js"></script>

</body>
</html>