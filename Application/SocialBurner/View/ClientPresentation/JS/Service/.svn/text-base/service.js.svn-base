var ServiceBucket = ServiceBucket || {};

ServiceBucket.changeFormAction = function() {
	var save_button = document.getElementById(ServiceBucket.saveButtonId);
	
	if( save_button != null)
	{
		save_button.onclick = function() {
			document.getElementById(ServiceBucket.profileName).action = ServiceBucket.saveButtonAction;
			document.getElementById(ServiceBucket.profileName).submit();
		}
};

ServiceBucket.changeFormAction();