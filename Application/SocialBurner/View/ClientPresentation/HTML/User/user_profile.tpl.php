<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?= $PROFILE_PAGE_TITLE ?></title>
	<?= $CSS_INCLUDES ?>

	
</head>
<body>
	<?= $HEADER ?>
	<div id="profile" class="span-24 last">
		<div class="profileModule">
			<h3>Analytics</h3>
			<div id="error"><?=$MESSAGE ?></div>
			<div>
				<?= $FEEDS_LIST ?>
			</div>
			<div>
				<h3>Your Social Card Preview</h3>
				<?=$SOCIALCARD ?>
				Embed URL <input type="text" id="embed" name="embed" value="<?=$SOCIALCARD?>"/>
			</div>
		</div>
		
	</div>
	
	<script type="text/javascript">
		var profileName = '<?= $PROFILE_NAME ?>';
	</script>
	<?= $FOOTER ?>

</body>
</html>