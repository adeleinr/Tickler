<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Search Service Result</title>
	<link type="text/css" rel="stylesheet" href="/View/ClientPresentation/CSS/Service/service.css" />
	<?=$CSS_INCLUDES ?>	
</head>
<body>
	<?=$HEADER ?>
	<div align='center'>
		<form id='<?= $PROFILE_NAME ?>' name='<?= $PROFILE_NAME ?>' action='<?= $SEARCH_FORM ?>' method='POST'>
		
			<fieldset>
				<legend accesskey="c" tabindex="1"><?= $FORM_TITLE ?></legend>
				<table>
					<tr>
						<td id="serviceNameWidth">
							<label for="SERVICE_NAME">
								<?= $SERVICE_NAME_TITLE ?>
							</label>
						</td>
						<td>
							<?= $SERVICE_NAME ?> 
						</td>
						<td>
							<label for="SERVICE_LOCATION">
								<?= $SERVICE_LOCATION_TITLE ?> (City)
							</label>
						</td>
						<td>
							<?= $SERVICE_LOCATION ?>
							<?= $API ?>								
							<?= $SEARCH_BUTTON ?>
						</td>

					</tr>
				</table>
				<div id="message">
				</div>
				<?= $BUSINESS_OPTION ?>
				<?= $SAVE_BUTTON ?>

			</fieldset>
			
		</form>
	</div>
	<?=$FOOTER ?>
	
	<script type="text/javascript">
		var ServiceBucket = ServiceBucket || {};
	
		ServiceBucket = {
			"profileName" : '<?= $PROFILE_NAME ?>',
			"saveButtonId" : '<?= $SAVE_BUTTON_ID ?>',
			"saveButtonAction" : '<?= $SAVE_BUTTON_ACTION ?>'
		};
	</script>
	<?=$JS_INCLUDES ?>
	
	<script>
				
		//Singleton/Module
		var ServiceBucket = ServiceBucket || {};
		
		
		ServiceBucket = {
			"addService" : function($serviceId) {
					var data = escape($("#BUSINESS_OPTION_" + $serviceId).val());
					var response = $.ajax({
						type: "POST",
						url: "http://service_bucket/save",
						dataType: "json",
						data: "SERVICE_INFO_JSON="+data,
						async: false						
						
					}).responseText;

					return response;
			}
			
		};

		$('.add-service').click(function(event){
			event.preventDefault();
			// Get the data in the hidden input for the
			// service
			var serviceId = $(this.parentNode).attr("id");
			// Add the service
			var msg= ServiceBucket.addService(serviceId);

			//$('#'+serviceId+'> .message').html('Service Added');
			// Remove the add icon
			// TODO Need to add a remove symbol
			$('#'+serviceId+'> .message').html(msg);
			$(this).children('.add-remove-service-icon').remove();
			
			
		});

	</script>
</body>
</html>