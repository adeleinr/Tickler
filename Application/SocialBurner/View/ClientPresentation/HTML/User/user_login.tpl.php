<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?= $LOGIN_FORM_TITLE ?></title>
	<?=$CSS_INCLUDES?>
</head>
<body>
	<?=$HEADER?>
	<div id="login" class="span-24 last">
		<div class="loginModule">
			<h3>Sign</h3>
			<form id='<?= $PROFILE_NAME ?>' name='<?= $PROFILE_NAME ?>' action='<?= $LOGIN_FORM ?>' method='POST'>
					<div id="fieldContainer">
						<div>
							<label for="USERNAME">
								<?= $EMAIL_TITLE ?>
							</label>
							<div>
								<?= $USER_EMAIL ?>
							</div>
						</div>
						
						<div>
							<label for="PASSWORD">
								<?= $PASSWORD_TITLE ?>
							</label>
							<div>
								<?= $USER_PASSWORD ?>
							</div>
						</div>
	
					</div>
			<?= $BUTTON_LOGIN ?>
		</form>
		</div>
		
	</div>
	
	<?=$JS_INCLUDES?>
	<script type="text/javascript">
		var profileName = '<?= $PROFILE_NAME ?>';
	</script>
	
	<?=$FOOTER?>
</body>
</html>