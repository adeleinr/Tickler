<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?=$CSS_INCLUDES ?>
</head>
<body>
<?=$HEADER ?>
<div align='left'>
	<form id='<?= $PROFILE_NAME ?>' name='<?= $PROFILE_NAME ?>' action='<?= $PUSH_EVENT_FORM ?>' method='POST'>
		<fieldset>
			<legend ><?= $PUSH_EVENT_FORM_TITLE ?></legend>
			<table>
			<tr>
				<td>
					<div><?= $MESSAGE ?></div>
					<label for="EVENT_NAME">
							<?= $EVENT_NAME_TITLE ?>
					</label>
					<div>
						<?= $EVENT_NAME ?>
					</div>
				</td>
			</tr>
			<tr>	
				<td>
					<label for="EVENT_DESCRIPTION">
						<?= $EVENT_DESCRIPTION_TITLE ?>
					</label>
					<div>
						<?= $EVENT_DESCRIPTION ?>
					</div>
				</td>
			</tr>

			</table>
			<?= $BUTTON_PUSH_EVENT ?>
			<?= $BUTTON_RESET ?>
				
		</fieldset>

	</form>
</div>

<script type="text/javascript">
	var profileName = '<?= $PROFILE_NAME ?>';
</script>
<?=$FOOTER ?>
</body>
</html>