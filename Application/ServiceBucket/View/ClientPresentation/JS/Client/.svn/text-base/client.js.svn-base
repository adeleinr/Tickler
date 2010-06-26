var ServiceBucket = ServiceBucket || {};

ServiceBucket = {
	"pullEvents" : function() {
		setInterval(function() {
			$.ajax({
				type: "GET",
				url: "http://service_bucket/demo/push_event_data",
				dataType: "json",
				success: function(json){
					for (service in json) {
						for (var i = 0, len = json[service].length; i < len; ++i)
						{
							var eventHTML = "";
							eventHTML += "<div id='event_" + json[service][i]['ID'] + "' class='event'>";
							eventHTML += "<div class='content'>";
							eventHTML += json[service][i]['EVENT'];
							eventHTML += "</div>";
							eventHTML += "</div>";
							$("#" + service + " .events").append(eventHTML);
							$("#event_" + json[service][i]['ID']).slideDown("slow");
						}
					}
				}
			});
		}, "5000");
	}
};

$(document).ready(function() {
	ServiceBucket.pullEvents();
});