function timed_session(){
	var plugin_url_test = "/support/wp-content/plugins/ion-wpsession-timeout/scripts/"
	var plugin_url_prod = "/wp-content/plugins/ion-wpsession-timeout/scripts/"
    var current_url = window.location.href;
	if(location.href.match(/support/)) {
		// If on DEV/UAT environment
    	redirect_location_test = plugin_url_test + "timed-logout.php?lastpage=" + current_url;
		window.location.replace(redirect_location_test);
	} else { 
		// If on production
		redirect_location_prod = plugin_url_prod + "timed-logout.php?lastpage=" + current_url;
		window.location.replace(redirect_location_prod);
	}
}

// Change variable value here to set new # of minutes 
// Set to 1 minute for testing
var mins = 45;
// Convert minutes to milliseconds
var timer = mins * 60 * 1000;

window.onclick = function(){
    setTimeout(timed_session, timer);
};

window.onload = function(){
    setTimeout(timed_session, timer);
}