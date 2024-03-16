$(document).ready(function() {
	$('#signup-button').click(function(e) {
		e.preventDefault();

		if (!validateForm()) {
			return false;
		}

		var formData = $('#signup-form').serialize();

		$.ajax({
			type: 'POST',
			url: 'users/add',
			data: formData,
			dataType: 'json',
			success: function(response) {
				if (response.success) {
					window.location.href = '';
				} else {
					$.each(response.message, function( index, value ) {
						$("#"+index).after('<div id="error-"'+index+ ' class="text-danger">'+value+'</div>').text(value);
					});
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
		showError("phone_number", 'Please enter Contact Number.');
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

	password = $('#password').val().trim();
	if (password === '') {
		showError("password", 'Please enter Password.');
		isValid = false;
	} else if (password.length < 6 || password.length > 20) {
		showError("password", 'Password must be between 6 and 20 characters long.');
		isValid = false;
	}

	var confirmPassword = $('#confirm_password').val().trim();
	if (confirmPassword === '') {
		$('#confirm_password + .text-danger').text('Please confirm Password.');
		showError("confirm_password", 'Please enter First Name.');
		isValid = false;
	} else if (password !== confirmPassword) {
		showError("confirm_password", 'Passwords do not match.');
		isValid = false;
	}

	var address = $('#address').val().trim();
	if (address === '') {
		showError("address", 'Please enter Address.');
		isValid = false;
	}

	var state = $('#state').val();
	if (state === '') {
		$('#state + .text-danger').text('Please select State.');
		showError("state", 'Please select State.');
		isValid = false;
	}

	return isValid;
}
