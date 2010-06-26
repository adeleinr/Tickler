<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?=$REGISTER_FORM_TITLE ?></title>
	<?=$CSS_INCLUDES?>

</head>
<body>
<?=$HEADER ?>
	<div id="boxes" class="span-24 last">
			
			<div id="logoBox" align="center" class="span-2 ">
			<img src="/View/ClientPresentation/Images/weather-clear.png"/>
	        </div>
	        
	        <div id="inputBox" align="left" class="span-10 ">
	        	<h2>Hi, signup!</h2>
				<form id='<?= $PROFILE_NAME ?>' name='<?= $PROFILE_NAME ?>' action='<?= $REGISTER_FORM ?>' method='POST'>
					<?//= $MESSAGE ?>
							<div id="fieldContainer">
								<div>
									<label for="NAME">
										<?= $NAME_TITLE ?>
									</label>
									<div>
										<?= $USER_NAME ?>
									</div>
								</div>
								<div>
									<label for="CATEGORY">
										<?= $CATEGORY_TITLE ?>
									</label>
									<div>
										<?= $CATEGORY ?>
									</div>
								</div>
								<!--  
								<div>
									<label for="STREET">
										<?= $STREET_TITLE ?>
									</label>
									<div>
										<?= $USER_STREET ?>
									</div>
								</div>
								-->
					
								<div>
									<label for="CITY">
										<?= $CITY_TITLE ?>
									</label>
									<div class="field">
										<?= $USER_CITY ?>
									</div>
								</div>
								<div>
									<label for="STATE">
										<?= $STATE_TITLE ?>
									</label>
									<div class="field">
										<?= $USER_STATE ?>
									</div>
								</div>
								<!-- 
								<div>
									<label for="ZIP">
										<?= $ZIP_TITLE ?>
									</label>
									<div class="field">
										<?= $USER_ZIP ?>
									</div>
								
								</div>
								-->
								<div>
									<label for="EMAIL">
										<?= $EMAIL_TITLE ?>
									</label>
									<div class="field">
										<?= $USER_EMAIL ?>
									</div>
								</div>			
								<div>
									<label for="PASSWORD">
										<?= $PASSWORD_TITLE ?>
									</label>
									<div class="field">
										<?= $USER_PASSWORD ?>
									</div>
								</div>
								
								
							</div>
														
					<div style="padding-top:2px;">
						<?= $TWITTER_URL ?>
						<img src="/View/ClientPresentation/Images/twitter.png"/>
					</div>
					<div style="padding-top:2px;">
						<?= $FACEBOOK_URL ?>
						<img src="/View/ClientPresentation/Images/facebook.png"/>
					</div>
					<div style="padding-top:2px;">
						<?= $FRIENDFEED_URL ?>
						<img src="/View/ClientPresentation/Images/friendfeed.png"/>
					</div>
					<div style="padding-top:2px;">
						<?= $FLICKR_URL ?>
						<img src="/View/ClientPresentation/Images/flickr.png"/>
					</div>
					<div style="padding-top:2px;">		
						<?= $YELP_URL ?>
						<img src="/View/ClientPresentation/Images/yelp.png"/>
					</div>
					
					<?= $BUTTON_SUBMIT ?>
					<?= $BUTTON_RESET ?>
			
				</form>
			
			</div>
			
			<div id="centerBox" align="center" class="span-3 ">
			
	        </div>
	        
	        <div id="outputBox" align="center" class="span-10 last">
					<h2>Your Social Widget</h2>
					<div id="socialPaw">
					</div>
					<div>
						Embed URL <input type="text" id="embed" name="embed" />
					</div>
			</div>
			
	</div>	<!-- End boxes -->
		
	
	<script type="text/javascript">
		var profileName = '<?= $PROFILE_NAME ?>';
	</script>
	<?=$FOOTER ?>
</body>
</html>