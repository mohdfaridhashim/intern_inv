var manageInventoryTable;

$(document).ready(function() {
	// active top navbar inventory
	$('#navUpdate').addClass('active');	

	manageInventoryTable = $('#manageInventoryTable').DataTable({
		'ajax' : 'phpaction/fetchInventory.php',
		'order': []
	}); // manage inventory Data Table

	// on click on submit inventory form modal
	$('#addInventoryModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$("#submitInventoryForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit inventory form function
		$("#submitInventoryForm").unbind('submit').bind('submit', function() {

			var inventoryName = $("#inventoryName").val();
			var inventoryStatus = $("#inventoryStatus").val();

			if(inventoryName == "") {
				$("#inventoryName").after('<p class="text-danger"> Inventory Name field is required</p>');
				$('#inventoryName').closest('.form-group').addClass('has-error');
			} else {
				// remove error text field
				$("#inventoryName").find('.text-danger').remove();
				// success out for form 
				$("#inventoryName").closest('.form-group').addClass('has-success');	  	
			}

			if(inventoryStatus == "") {
				$("#inventoryStatus").after('<p class="text-danger"> Status field is required</p>');
				$('#inventoryStatus').closest('.form-group').addClass('has-error');
			} else {
				// remove error text field
				$("#inventoryStatus").find('.text-danger').remove();
				// success out for form 
				$("#inventoryStatus").closest('.form-group').addClass('has-success');	  	
			}

			if(inventoryName && inventoryStatus) {
				var form = $(this);
				// button loading
				$("#createInventoryBtn").button('loading');

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						// button loading
						$("#createInventoryBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							manageInventoryTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitInventoryForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-inventory-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						}  // if

					} // /success
				}); // /ajax	
			} // if

			return false;
		}); // submit inventory form function
	}); // /on click on submit inventory form modal	

}); // /document

// edit categories function
function editInventory(inventoryId = null) {
	if(inventoryId) {
		// remove the added categories id 
		$('#editInventoryId').remove();
		// reset the form text
		$("#editInventoryForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit inventory messages
		$("#edit-inventory-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-inventory-result').addClass('div-hide');
		//modal footer
		$(".editInventoryFooter").addClass('div-hide');		

		$.ajax({
			url: 'phpaction/fetchSelectedInventory.php',
			type: 'post',
			data: {inventoryId: inventoryId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-inventory-result').removeClass('div-hide');
				//modal footer
				$(".editInventoryFooter").removeClass('div-hide');	

				// set the inventory name
				$("#editInventoryName").val(response.inv_name);
				// set the inventory status
				$("#editInventoryStatus").val(response.inv_active);
				// add the inventory id 
				$(".editInventoryFooter").after('<input type="hidden" name="editInventoryId" id="editInventoryId" value="'+response.inv_id+'" />');


				// submit of edit inventory form
				$("#editInventoryForm").unbind('submit').bind('submit', function() {
					var inventoryName = $("#editInventoryName").val();
					var inventoryStatus = $("#editInventoryStatus").val();

					if(inventoryName == "") {
						$("#editInventoryName").after('<p class="text-danger"> Inventory Name field is required</p>');
						$('#editInventoryName').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editInventoryName").find('.text-danger').remove();
						// success out for form 
						$("#editInventoryName").closest('.form-group').addClass('has-success');	  	
					}

					if(inventoryStatus == "") {
						$("#editInventoryStatus").after('<p class="text-danger"> Status field is required</p>');
						$('#editInventoryStatus').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editInventoryStatus").find('.text-danger').remove();
						// success out for form 
						$("#editInventoryStatus").closest('.form-group').addClass('has-success');	  	
					}

					if(inventoryName && inventoryStatus) {
						var form = $(this);
						// button loading
						$("#editInventoryBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editInventoryBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									manageInventoryTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-inventory-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}  // if

							} // /success
						}); // /ajax	
					} // if


					return false;
				}); // /submit of edit inventory form

			} // /success
		}); // /fetch the selected inventory data

	} else {
		alert('Oops!! Refresh the page');
	}
} // /edit inventory function

// remove inventory function
function removeInventory(inventoryId = null) {
		
	$.ajax({
		url: 'phpaction/fetchSelectedInventory.php',
		type: 'post',
		data: {inventoryId: inventoryId},
		dataType: 'json',
		success:function(response) {			

			// remove inventory btn clicked to remove the inventory function
			$("#removeInventoryBtn").unbind('click').bind('click', function() {
				// remove inventory btn
				$("#removeInventoryBtn").button('loading');

				$.ajax({
					url: 'phpaction/removeInventory.php',
					type: 'post',
					data: {inventoryId: inventoryId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove inventory btn
							$("#removeInventoryBtn").button('reset');
							// close the modal 
							$("#removeInventoryModal").modal('hide');
							// update the manage inventory table
							manageInventoryTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} else {
 							// close the modal 
							$("#removeInventoryModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} // /else
						
						
					} // /success function
				}); // /ajax function request server to remove the categories data
			}); // /remove categories btn clicked to remove the categories function

		} // /response
	}); // /ajax function to fetch the categories data
} // remove categories function