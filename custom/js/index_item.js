// global the manage memeber table 
var manageItemTable;

$(document).ready(function() {
	manageItemTable = $("#manageItemTable").DataTable({
		"ajax": "php_action/retrieve_item.php",
		"order": []
	});

	$("#addItemModalBtn").on('click', function() {
		// reset the form 
		$("#createItemForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createItemForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var item = $("#item").val();
			var description = $("#description").val();
			var quantity = $("#quantity").val();
			

			if(item == "") {
				$("#item").closest('.form-group').addClass('has-error');
				$("#item").after('<p class="text-danger">The item field is required</p>');
			} else {
				$("#item").closest('.form-group').removeClass('has-error');
				$("#item").closest('.form-group').addClass('has-success');				
			}

			if(description == "") {
				$("#description").closest('.form-group').addClass('has-error');
				$("#description").after('<p class="text-danger">The description field is required</p>');
			} else {
				$("#description").closest('.form-group').removeClass('has-error');
				$("#description").closest('.form-group').addClass('has-success');				
			}

			if(quantity == "") {
				$("#quantity").closest('.form-group').addClass('has-error');
				$("#quantity").after('<p class="text-danger">The item field is required</p>');
			} else {
				$("#quantity").closest('.form-group').removeClass('has-error');
				$("#quantity").closest('.form-group').addClass('has-success');				
			}

		 

			if(item && description && quantity ) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createItemForm")[0].reset();		

							// reload the datatables
							manageItemTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
						}  // /else
					} // success  
				}); // ajax subit 				
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeItem(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			console.log(id);
			$.ajax({
				url: 'php_action/remove_item.php',
				type: 'post',
				data: {item_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageItemTable.ajax.reload(null, false);

						// close the modal
						$("#removeItemModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again');
	}
}

function editItem(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#item_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedItem.php',
			type: 'post',
			data: {item_id : id},
			dataType: 'json',
			success:function(response) {
				$("#editItem").val(response.item);

				$("#editDescription").val(response.description);

				$("#editQuantity").val(response.quantity);


				// mmeber id 
				$(".editItemModal").append('<input type="hidden" name="item_id" id="item_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateItemForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editItem = $("#ediItem").val();
					var editDescription = $("#editDescription").val();
					var editQuantity= $("#editQuantity").val();
				

					if(editItem == "") {
						$("#editItem").closest('.form-group').addClass('has-error');
						$("#editItem").after('<p class="text-danger">The Item field is required</p>');
					} else {
						$("#editItem").closest('.form-group').removeClass('has-error');
						$("#editItem").closest('.form-group').addClass('has-success');				
					}

					if(editDescription == "") {
						$("#editDescription").closest('.form-group').addClass('has-error');
						$("#editDescription").after('<p class="text-danger">The Description field is required</p>');
					} else {
						$("#editDescription").closest('.form-group').removeClass('has-error');
						$("#editDescription").closest('.form-group').addClass('has-success');				
					}

					if(editQuantity == "") {
						$("#editQuantity").closest('.form-group').addClass('has-error');
						$("#editQuantity").after('<p class="text-danger">The Quantity field is required</p>');
					} else {
						$("#editQuantity").closest('.form-group').removeClass('has-error');
						$("#editQuantity").closest('.form-group').addClass('has-success');				
					}

				

					if(editItem && editDescription && editQuantity) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									manageItemTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again");
	}
}