var manageAdminTable;

$(document).ready(function() {
	// top nav bar 
	$('#topNavAdmin').addClass('active');
	// manage product data table
	manageAdminTable = $('#manageAdminTable').DataTable({
		'ajax': 'phpaction/fetchAdmin.php',
		'order': []
	});

	// add product modal btn clicked
	$("#addAdminModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitAdminForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		$("#inventoryImage").fileinput({
	      overwriteInitial: true,
		    maxFileSize: 2500,
		    showClose: false,
		    showCaption: false,
		    browseLabel: '',
		    removeLabel: '',
		    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
		    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
		    removeTitle: 'Cancel or reset changes',
		    elErrorContainer: '#kv-avatar-errors-1',
		    msgErrorClass: 'alert alert-block alert-danger',
		    defaultPreviewContent: '<img src="assests/images/photo_default.png" alt="Profile Image" style="width:100%;">',
		    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
	  		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
			});   

		// submit admin form
		$("#submitAdminForm").unbind('submit').bind('submit', function() {
			// form validation
			var adminName = $("#adminName").val();
			var adminPass = $("#adminPass").val();
	
			if(adminName == "") {
				$("#adminName").after('<p class="text-danger"> Admin Name field is required</p>');
				$('#adminName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#adminName").find('.text-danger').remove();
				// success out for form 
				$("#adminName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			

			if(adminPass == "") {
				$("#adminPass").after('<p class="text-danger">Password field is required</p>');
				$('#adminPass').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#adminPass").find('.text-danger').remove();
				// success out for form 
				$("#adminPass").closest('.form-group').addClass('has-success');	  	
			}	// /else

			
				// /else

			if(adminPass && adminName) {
				// submit loading button
				$("#createAdminBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {

						if(response.success == true) {
							// submit loading button
							$("#createAdminBtn").button('reset');
							
							$("#submitAdminForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-admin-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert

		          // reload the manage student table
							manageAdminTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success
						
					} // /success function
				}); // /ajax function
			}	 // /if validation is ok 					

			return false;
		}); // /submit product form

	}); // /add product modal btn clicked
	

	// remove product 	

}); // document.ready fucntion


// remove admin 
function removeAdmin(adminid = null) {
	if(adminid) {
		// remove admin button clicked
		$("#removeAdminBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeAdminBtn").button('loading');
			$.ajax({
				url: 'phpaction/removeAdmin.php',
				type: 'post',
				data: {adminid: adminid},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeAdminBtn").button('reset');
					if(response.success == true) {
						// remove admin modal
						$("#removeAdminModal").modal('hide');

						// update the product table
						manageAdminTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					} else {

						// remove success messages
						$(".removeAdminMessages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the product
			return false;
		}); // /remove product btn clicked
	} // /if adminid
} // /remove product function

