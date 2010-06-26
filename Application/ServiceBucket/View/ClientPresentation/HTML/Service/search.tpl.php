<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Search Service</title>
	<!-- <link type="text/css" rel="stylesheet" href="/View/ClientPresentation/CSS/Service/service.css" /> -->
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
								<?= $SERVICE_LOCATION_TITLE ?>
							</label>
						</td>
						<td>
							<?= $SERVICE_LOCATION ?>(City, or Address)
							<?=$API ?>								
							<?= $SEARCH_BUTTON ?>
						</td>

					</tr>

					
				</table>

			</fieldset>
			
		</form>

		
		<a href='javascript: (function(){function f(h,e){e(h);h=h.firstChild;while(h){walktheDOM(h,e);h=h.nextSibling}}function a(h,i){if(!i){i=document}if(i.getElementsByClassName){return i.getElementsByClassName(h)}else{var e=[];f(i.body,function(l){var j;var m=l.className;var k;if(m){j=m.split(" ");for(k=0;k<j.length;++k){if(j[k]===h){e.push(l);break}}}});return e}}var c="http://service_bucket/bookmarklet?";var g={};try{service=a("fn org")[0].innerHTML;g.service=encodeURIComponent(service)}catch(d){}try{city=a("locality")[0].innerHTML;g.city=encodeURIComponent(city)}catch(d){}try{state=a("region")[0].innerHTML;g.state=encodeURIComponent(state)}catch(d){}try{phone=a("tel")[0].innerHTML;g.phone=encodeURIComponent(phone)}catch(d){}try{url=a("fn url")[0].innerHTML;g.url=encodeURIComponent(url)}catch(d){alert("Business microformat is not defined in the page");return}for(parameter in g){c+=parameter+"="+g[parameter]+"&"}c+="v=1";var b=function(){window.open(c,"ServiceBucket","location=yes, links=no, scrollbars=no, toolbar=no, width=550, height=300")};if(/Firefox/.test(navigator.userAgent)){setTimeout(b,0)}else{b()}})();'>Service Bookmarklet</a>
	</div>
	
	<script type="text/javascript">
		var profileName = '<?= $PROFILE_NAME ?>';
	</script>
	
	<script type="text/javascript" src="/View/ClientPresentation/js/service/service.js"></script>
	<?=$FOOTER ?>
</body>
</html>