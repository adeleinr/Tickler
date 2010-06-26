/**
 * Bookmarklet compression => java -jar ../../tool/compressor/yuicompressor-2.4.2.jar source.js -o build.js
 * 
 */
(function() {
	function walkTheDOM(node, func) {
		func(node);
		node = node.firstChild;
		while (node) {
			walktheDOM(node, func);
			node = node.nextSibling;
		}
	}

	function getElementsByClassName(className, nodeElement) {
		if (!nodeElement) {
			nodeElement = document;
		}
		if (nodeElement.getElementsByClassName) {
			return nodeElement.getElementsByClassName(className);
		} else {
			var results = [];
			walkTheDOM(nodeElement.body, function(node) {
				var a;
				var c = node.className;
				var i;

				if (c) {
					a = c.split(" ");
					for (i = 0; i < a.length; ++i) {
						if (a[i] === className) {
							results.push(node);
							break;
						}
					}
				}
			});

			return results;
		}
	}	
	
	var bookmarkletURL = "http://service_bucket/bookmarklet?";
	var queryString = {};	
	
	try {
		service = getElementsByClassName("fn org")[0].innerHTML;
		
		queryString['service'] = encodeURIComponent(service);
	} catch(e) {}
	
	try {
		city = getElementsByClassName("locality")[0].innerHTML;

		queryString['city'] = encodeURIComponent(city);
	} catch(e) {}

	try {
		state = getElementsByClassName("region")[0].innerHTML;

		queryString['state'] = encodeURIComponent(state);
	} catch(e) {}

	try {
		phone = getElementsByClassName("tel")[0].innerHTML;

		queryString['phone'] = encodeURIComponent(phone);
	} catch(e) {}
	
	try {
		url = getElementsByClassName("fn url")[0].innerHTML;

		queryString['url'] = encodeURIComponent(url);
	} catch(e) {
		alert("Business microformat is not defined in the page");
		return;
	}

	for (parameter in queryString) {
		bookmarkletURL += parameter + "=" + queryString[parameter] + "&";
	}
	
	bookmarkletURL += "v=1";
	
	var popup = function() {
		window.open(bookmarkletURL, "ServiceBucket", "location=yes, links=no, scrollbars=no, toolbar=no, width=550, height=300");
	};
	
	if(/Firefox/.test(navigator.userAgent)) {
		setTimeout(popup, 0);
	} else {
		popup();
	}
	
})();