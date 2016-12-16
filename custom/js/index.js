// global the manage memeber table 
var manageRestoranTable;

$(document).ready(function() {
	manageRestoranTable = $("#manageRestoranTable").DataTable({
		"ajax": "php_action/retrieve.php",
		"order": []
	});

	$("#addRestoranModalBtn").on('click', function() {
		// reset the form 
		$("#createRestoranForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createRestoranForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var naziv = $("#naziv").val();
			var mjesto = $("#mjesto").val();
			var kontakt = $("#kontakt").val();
			var mail = $("#mail").val();
			

			if(naziv == "") {
				$("#naziv").closest('.form-group').addClass('has-error');
				$("#naziv").after('<p class="text-danger">The date field is required</p>');
			} else {
				$("#naziv").closest('.form-group').removeClass('has-error');
				$("#naziv").closest('.form-group').addClass('has-success');				
			}

			if(mjesto == "") {
				$("#mjesto").closest('.form-group').addClass('has-error');
				$("#mjesto").after('<p class="text-danger">The quantity field is required</p>');
			} else {
				$("#mjesto").closest('.form-group').removeClass('has-error');
				$("#mjesto").closest('.form-group').addClass('has-success');				
			}

			if(kontakt == "") {
				$("#kontakt").closest('.form-group').addClass('has-error');
				$("#kontakt").after('<p class="text-danger">The item field is required</p>');
			} else {
				$("#kontakt").closest('.form-group').removeClass('has-error');
				$("#kontakt").closest('.form-group').addClass('has-success');				
			}

			if(mail == "") {
				$("#mail").closest('.form-group').addClass('has-error');
				$("#mail").after('<p class="text-danger">The Active field is required</p>');
			} else {
				$("#mail").closest('.form-group').removeClass('has-error');
				$("#mail").closest('.form-group').addClass('has-success');				
			}



			if(naziv && mjesto && kontakt && mail) {
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
							$("#createRestoranForm")[0].reset();		

							// reload the datatables
							manageRestoranTable.ajax.reload(null, false);
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

function removeRestoran(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/remove.php',
				type: 'post',
				data: {restoran_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageRestoranTable.ajax.reload(null, false);

						// close the modal
						$("#removeRestoranModal").modal('hide');

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

function editRestoran(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#restoran_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {restoran_id : id},
			dataType: 'json',
			success:function(response) {
				$("#editNaziv").val(response.naziv);

				$("#editMjesto").val(response.mjesto);

				$("#editKontakt").val(response.kontakt);

				$("#editMail").val(response.mail);

					

				// mmeber id 
				$(".editRestoranModal").append('<input type="hidden" name="restoran_id" id="restoran_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateRestoranForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var editNaziv = $("#editNaziv").val();
					var editMjesto = $("#editMjesto").val();
					var editKontakt = $("#editKontakt").val();
					var editMail = $("#editMail").val();
					

					if(editNaziv == "") {
						$("#editNaziv").closest('.form-group').addClass('has-error');
						$("#editNaziv").after('<p class="text-danger">The Name field is required</p>');
					} else {
						$("#editNaziv").closest('.form-group').removeClass('has-error');
						$("#editNaziv").closest('.form-group').addClass('has-success');				
					}

					if(editMjesto == "") {
						$("#editMjesto").closest('.form-group').addClass('has-error');
						$("#editMjesto").after('<p class="text-danger">The Address field is required</p>');
					} else {
						$("#editMjesto").closest('.form-group').removeClass('has-error');
						$("#editMjesto").closest('.form-group').addClass('has-success');				
					}

					if(editKontakt == "") {
						$("#editKontakt").closest('.form-group').addClass('has-error');
						$("#editKontakt").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#editKontakt").closest('.form-group').removeClass('has-error');
						$("#editKontakt").closest('.form-group').addClass('has-success');				
					}

					if(editMail == "") {
						$("#editMail").closest('.form-group').addClass('has-error');
						$("#editMail").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#editMail").closest('.form-group').removeClass('has-error');
						$("#editMail").closest('.form-group').addClass('has-success');				
					}

				

					if(editNaziv && editMjesto && editKontakt && editMail ) {
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
									manageRestoranTable.ajax.reload(null, false);
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