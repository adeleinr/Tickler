<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Add Client</title>
	<link type="text/css" rel="stylesheet" href="/View/ClientPresentation/CSS/Provider/provider_add.css" />
	
	<!-- START OF SCRIPTS USED FOR HCARD CREATOR -->
	<script type="text/javascript" src="/View/ClientPresentation/JS/Provider/jquery-1.2.1.pack.js"></script> 
	<script type="text/javascript" src="/View/ClientPresentation/JS/Provider/template.js"></script> 
	<script type="text/javascript" src="http://uranus/View/ClientPresentation/JS/String/string.js"  charset="utf-8"></script> 
	<script src="/View/ClientPresentation/JS/Provider/hcardcreator.js" type="text/javascript"></script>
	<!--  END OF SCRIPTS USED FOR HCARD CREATOR -->
	<?=$CSS_INCLUDES ?>
</head>
<body>
	<?=$HEADER ?>
	<div align='left'>
		<form id='<?= $PROFILE_NAME ?>' name='<?= $PROFILE_NAME ?>' action='<?= $REGISTER_FORM ?>' method='POST'>
			<fieldset>
				<legend ><?= $REGISTER_FORM_TITLE ?></legend>
					<div id="fieldContainer">
						<div>
							<label for="BUSINESS_NAME">
								<?= $BUSINESS_NAME_TITLE ?>
							</label>
							<div>
								<?= $PROVIDER_BUSINESS_NAME ?>
							</div>
						</div>
						
						<div>
							<label for="STREET">
								<?= $STREET_TITLE ?>
							</label>
							<div>
								<?= $PROVIDER_STREET ?>
							</div>
						</div>
			
						<div>
							<label for="CITY">
								<?= $CITY_TITLE ?>
							</label>
							<div class="field">
								<?= $PROVIDER_CITY ?>
							</div>
						</div>
						<div>
							<label for="STATE">
								<?= $STATE_TITLE ?>
							</label>
							<div class="field">
								<?= $PROVIDER_STATE ?>
							</div>
						</div>
						<div>
							<label for="ZIP">
								<?= $ZIP_TITLE ?>
							</label>
							<div class="field">
								<?= $PROVIDER_ZIP ?>
							</div>
						
						</div>
						<div>
							<label for="PHONE">
								<?= $PHONE_TITLE ?>
							</label>
							<div class="field">
								<?= $PROVIDER_PHONE ?>
							</div>
						</div>
						<div>
							<label for="EMAIL">
								<?= $EMAIL_TITLE ?>
							</label>
							<div class="field">
								<?= $PROVIDER_EMAIL ?>
							</div>
						</div>
						<div>
							<label for="URL">
								<?= $URL_TITLE ?>
							</label>
							<div class="field">
								<?= $PROVIDER_URL ?>
							</div>
						</div>
						
						<div>
							<label for="USERNAME">
								<?= $USERNAME_TITLE ?>
							</label>
							<div class="field">
								<?= $PROVIDER_USERNAME ?>
							</div>
						</div>
						
						<div>
							<label for="PASSWORD">
								<?= $PASSWORD_TITLE ?>
							</label>
							<div class="field">
								<?= $PROVIDER_PASSWORD ?>
							</div>
						</div>
						
						
					</div>
			</fieldset>
		<?= $BUTTON_SUBMIT ?>
		<?= $BUTTON_RESET ?>
		</form>
	</div>
	
	<script type="text/javascript">
		var profileName = '<?= $PROFILE_NAME ?>';
	</script>
	
	<div class="output">
		<h2>Copy this HCard code</h2>
		<textarea id="samplecode" rows="12" cols="70"></textarea>
		<h2>Your HCard Preview</h2>
		<div id="preview">
		<span></span>
		</div>
	</div>
	<?=$FOOTER ?>
</body>
</html>