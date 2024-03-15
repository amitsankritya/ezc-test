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
					//alert('User registered successfully.');
					window.location.href = '/';
				} else {
					alert('Error: ' + response.message);
				}
			},
			error: function(xhr, status, error) {
				console.error('AJAX Error: ' + status + ': ' + error);
			}
		});
	});
});


function validateForm() {
	$('.text-danger').text('');

	var isValid = true;

	var firstName = $('#first_name').val().trim();
	if (firstName === '') {
		$('#first_name + .text-danger').text('Please enter First Name.');
		isValid = false;
	}

	var lastName = $('#last_name').val().trim();
	if (lastName === '') {
		$('#last_name + .text-danger').text('Please enter Last Name.');
		isValid = false;
	}

	var phoneNumber = $('#phone_number').val().trim();
	if (phoneNumber === '') {
		$('#phone_number + .text-danger').text('Please enter Contact Number.');
		isValid = false;
	} else if (!/^[1-9]\d{9}$/.test(phoneNumber)) {
		$('#phone_number + .text-danger').text('Contact Number should be a 10-digit numeric value and should not start with 0.');
		isValid = false;
	}

	var email = $('#email').val().trim();
	if (email === '') {
		$('#email + .text-danger').text('Please enter Email.');
		isValid = false;
	} else if (!/\S+@\S+\.\S+/.test(email)) {
		$('#email + .text-danger').text('Please enter a valid email');
		isValid = false;
	}

	password = $('#password').val().trim();
	if (password === '') {
		$('#password + .text-danger').text('Please enter Password.');
		isValid = false;
	} else if (password.length < 6 || password.length > 20) {
		$('#password + .text-danger').text('Password must be between 6 and 20 characters long.');
		isValid = false;
	}

	var confirmPassword = $('#confirm_password').val().trim();
	if (confirmPassword === '') {
		$('#confirm_password + .text-danger').text('Please confirm Password.');
		isValid = false;
	} else if (password !== confirmPassword) {
		$('#confirm_password + .text-danger').text('Passwords do not match.');
		isValid = false;
	}

	var address = $('#address').val().trim();
	if (address === '') {
		$('#address + .text-danger').text('Please enter Address.');
		isValid = false;
	}

	var state = $('#state').val();
	if (state === '') {
		$('#state + .text-danger').text('Please select State.');
		isValid = false;
	}

	return isValid;
}
