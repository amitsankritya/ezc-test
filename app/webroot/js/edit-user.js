$(document).ready(function() {
	$('#edit-button').click(function(e) {
		e.preventDefault();

		if (!validateForm()) {
			return false;
		}

		var formData = $('#edit-user').serialize();
		var UserId = $('#UserId').val().trim();

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
					//alert('Error: ' + response.message);
					// $.each(response, function( index, value ) {
					// 	$('#'+index+ '.text-danger').text(value);
					// });

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
