/**
 * /js/common.js
 *
 * Global JS functions
 */

/*====================== Visual functionality ======================*/

// Show modal window, used when deleting user
function showModal(id, name) {

	// Substitute the name in the madal window
	$('#modal-name').html(name);

	// Assign actions to the modal window button
	$('#modal-yes').click(function(){removeUser(id)});
	$('#modal-no').click(function(){hideModal()});

	// Show modal window
	$('.modal__layout').show();

}

	// Hide modal window
function hideModal() {
	$('.modal__layout').hide();
}

/*====================== AJAX functionality ===========================*/

// User delete function
function removeUser(rowId){

	// Address of the user deletion script
	var urlAction = '/delete';

	// Ajax request to the server to delete the page
	$.ajax({
	 	url: urlAction,
	 	type: "POST",
		data: { id: rowId},
		response: 'text',
		success: function(data){
			hideModal();
			$('#row'+rowId).remove();
        	console.log(data);
      	}
	});
}