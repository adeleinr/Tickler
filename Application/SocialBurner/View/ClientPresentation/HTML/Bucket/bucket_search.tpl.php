<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?= $SEARCH_FORM_TITLE ?></title>
	<?= $CSS_INCLUDES ?>
</head>
<body>

	<?= $HEADER?>

	
	<div id="bucket-search">
		<form id='<?= $PROFILE_NAME ?>' name='<?= $PROFILE_NAME ?>' action='<?= $SEARCH_FORM ?>' method='POST'>
			<fieldset>
				<legend ><h2><?= $SEARCH_FORM_TITLE ?></h2></legend>
					<div id="fieldContainer">
						<div>
							<div>
								<?= $KEYWORD ?>
								<?= $BUTTON_SEARCH ?>
							</div>
						</div>
						
					</div>
					
			</fieldset>
				
		</form>
	</div>

	
	<div id='services_result'>
		<?= $SERVICE_LIST ?>
	</div>
	
	<script type="text/javascript">
		var profileName = '<?= $PROFILE_NAME ?>';
	</script>
	
	<?= $FOOTER?>

</body>
</html>