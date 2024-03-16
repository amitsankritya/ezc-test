$(document).ready(function() {
	$('#edit-button').click(function(e) {
		e.preventDefault();

		if (!validateForm()) {
			return false;
		}

		var formData = $('#edit-user').serialize();

		$.ajax({
			type: 'PUT',
			url: '',
			data: formData,
			dataType: 'json',
			success: function(response) {
				if (response.success) {
					console.log(response);
					window.location.href = response.redirectUrl;
				} else {
					$.each(response.message, function( index, value ) {
						$("#"+index).after('<div id="error-"'+index+ ' class="text-danger">'+value+'</div>').text(value);
					});

					console.log(response);
				}
			},
			error: function(xhr, status, error) {
				//console.log(error);
				// console.error('AJAX Error: ' + status + ': ' + error);
			}
		});
	});
});

function showError(fieldId, message) {
	$("#"+fieldId).after('<div id="error-"'+fieldId+ ' class="text-danger">'+message+'</div>');
}

function validateForm() {
	$('.text-danger').text('');

	var isValid = true;

	var firstName = $('#first_name').val().trim();
	if (firstName === '') {
		showError("first_name", 'Please enter First Name.');
		isValid = false;
	}

	var lastName = $('#last_name').val().trim();
	if (lastName === '') {
		showError("last_name", 'Please enter Last Name.');
		isValid = false;
	}

	var phoneNumber = $('#phone_number').val().trim();
	if (phoneNumber === '') {
		showError("phone_number", 'Please enter Contact Number');
		isValid = false;
	} else if (!/^[1-9]\d{9}$/.test(phoneNumber)) {
		showError("phone_number", 'Contact Number should be a 10-digit numeric value and should not start with 0.');
		isValid = false;
	}

	var email = $('#email').val().trim();
	if (email === '') {
		showError("email", 'Please enter Email.');
		isValid = false;
	} else if (!/\S+@\S+\.\S+/.test(email)) {
		showError("email", 'Please enter a valid email');
		isValid = false;
	}

	var address = $('#address').val().trim();
	if (address === '') {
		showError("address", 'Please enter Address.');
		isValid = false;
	}

	var state = $('#state').val();
	if (state === '') {
		showError("state", 'Please select State.');
		isValid = false;
	}

	return isValid;
}
