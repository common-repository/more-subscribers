//email validate function
function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
}

//Execute a php script on click event using an ajax request
jQuery(document).ready(function() {
    jQuery('#ms_submit_btn').click(function() {
    	var enteredFirstName = jQuery('.ms_backend_class > input#fn_input_fld').val();
    	var enteredLastName = jQuery('.ms_backend_class > input#ln_input_fld').val();
    	var enteredEmail = jQuery('.ms_backend_class > input#email_input_fld').val();
    	if (enteredEmail === "") {
    		alert('No email address entered. Please provide an email address.');
		} else if (isValidEmailAddress(enteredEmail) === false) {
			alert('Sorry, the email you entered is invalid. Please try again.');
		} else {
			var ajaxData = {
				action: 'add_subscriber',
				firstName: enteredFirstName,
				lastName: enteredLastName,
				email: enteredEmail
			};
			jQuery.ajax({
				url: assets.ajaxurl,
				type:'POST',
				data: ajaxData,
				success: function( data ) {
					alert( 'Thanks for subscribing!');					
				}
			});
		}
	});	
});



