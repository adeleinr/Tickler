
button_submit = document.getElementById('BUTTON_SUBMIT');
if( button_submit != null)
{
	button_submit.onclick = function() {
		document.getElementById(profileName).submit();
	}
}

button_reset = document.getElementById('BUTTON_RESET');
if( button_reset != null)
{
	button_reset.onclick = function() {
		document.getElementById(profileName).reset();
	}
}

button_login = document.getElementById('BUTTON_LOGIN');
if( button_login != null)
{
	
	button_login.onclick = function() {
		document.getElementById(profileName).submit();
	}
}

