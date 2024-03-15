$(document).ready(function() {
	$('#login-button').click(function(e) {
		e.preventDefault();

		if (!validateForm()) {
			return false;
		}

		var formData = $('#login-form').serialize();

		$.ajax({
			type: 'POST',
			url: 'login',
			data: formData,
			dataType: 'json',
			success: function(response) {
				if (response.success) {
					//alert('login');
					window.location.href = '/';
				} else {
					//alert('Error: ' + response.message);
				}
			},
			error: function(xhr, status, error) {
				console.log(error);
				//console.error('AJAX Error: ' + status + ': ' + error);
			}
		});
	});
});


function validateForm() {
	$('.text-danger').text('');

	var isValid = true;

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
	}

	return isValid;
}
