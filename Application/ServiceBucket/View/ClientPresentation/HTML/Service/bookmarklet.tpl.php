<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>ServiceBucket</title>
</head>
<style>
	span
	{
		font-weight: bold;
	}
</style>
<body>

	<div>
		<div id="serviceNameContainer">
			Service Name: <span id="serviceName"></span>
		</div>
		<div id="serviceCityContainer">
			Service City: <span id="serviceCity"></span>
		</div>
		<div id="serviceStateContainer">
			Service State: <span id="serviceState"></span>
		</div>
		<div id="servicePhoneContainer">
			Service Phone: <span id="servicePhone"></span>
		</div>
		<div id="serviceUrlContainer">
			Service URL: <span id="serviceUrl"></span>
		</div>
		
		<div id="microformatMessage"></div>
		
		<br />
		
		<form id='<?= $PROFILE_NAME ?>' action="<?= $SAVE_FORM ?>" method="POST">
			<?= $BUSINESS_OPTION_SERIALIZED ?>
		</form>
		
		<?= $SAVE_SERVICE ?>
	</div>
	
	<script type="text/javascript" src="/View/ClientPresentation/JS/Tool/Querystring/querystring.js"></script>
	
	<script type="text/javascript" src="http://uranus/View/ClientPresentation/JS/String/string.js"></script>
	
	<script type="text/javascript">
		var ServiceBucket = ServiceBucket || {};

		ServiceBucket = {
			"getQueryStringIntotheDOM": function() {
				var StringModule = Uranus.String;
			
				var qs = new Querystring();
				var isThereDataAvailable = false;
				
				if (!StringModule.isEmptyString(qs.get("service"))) {
					document.getElementById("serviceName").innerHTML = qs.get("service");
					isThereDataAvailable = true;
				} else {
					document.getElementById("serviceNameContainer").style.display = "none";
					isThereDataAvailable = false;
				}
				
				if (!StringModule.isEmptyString(qs.get("city"))) {
					document.getElementById("serviceCity").innerHTML = qs.get("city");
					isThereDataAvailable = true;
				} else {
					document.getElementById("serviceCityContainer").style.display = "none";	
					isThereDataAvailable = false;
				}
				
				if (!StringModule.isEmptyString(qs.get("state"))) {
					document.getElementById("serviceState").innerHTML = qs.get("state");
					isThereDataAvailable = true;
				} else {
					document.getElementById("serviceStateContainer").style.display = "none";	
					isThereDataAvailable = false;
				}
				
				if (!StringModule.isEmptyString(qs.get("phone"))) {
					document.getElementById("servicePhone").innerHTML = qs.get("phone");
					isThereDataAvailable = true;
				} else {
					document.getElementById("servicePhoneContainer").style.display = "none";
					isThereDataAvailable = false;	
				}
				
				if (!StringModule.isEmptyString(qs.get("url"))) {
					document.getElementById("serviceUrl").innerHTML = qs.get("url");
					isThereDataAvailable = true;
				} else {
					document.getElementById("serviceUrlContainer").style.display = "none";
					isThereDataAvailable = false;
				}
				
				if (!isThereDataAvailable) {
					document.getElementById("microformatMessage").innerHTML = "<strong>Business microformat is not defined in the page</strong>";
				}
			},
			"setSaveServiceOnClickListener" : function() {
				document.getElementById("SAVE_SERVICE").onclick = function() {
					var service = {};
					service.SERVICE_NAME = document.getElementById("serviceName").innerHTML;
					service.SERVICE_URL = document.getElementById("serviceUrl").innerHTML;
					service.SERVICE_CITY = document.getElementById("serviceCity").innerHTML;
					service.SERVICE_STATE = document.getElementById("serviceState").innerHTML;
					service.SERVICE_PHONE = document.getElementById("servicePhone").innerHTML;
				
					document.getElementById("BUSINESS_OPTION_SERIALIZED").value = JSON.stringify(service);
					document.getElementById("SERVICE").submit();
					window.close();
				};
			}
		};

		ServiceBucket.getQueryStringIntotheDOM();
		ServiceBucket.setSaveServiceOnClickListener();
	</script>

</body>
</html>