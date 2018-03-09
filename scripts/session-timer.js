
function timed_session(){
    var plugin_url = "/support/wp-content/plugins/ion-wpsession-timeout/scripts/"
    window.location.href = plugin_url + "timed-logout.php";
}

/*** Set timer limit to 1 minute ***/

// Change variable value here to set new # of minutes 
var mins = 5 / 60;
// Convert minutes to milliseconds
var timer = mins * 60 * 1000;

window.onclick = function(){
    setTimeout(timed_session, timer);
};

window.onkeypress = function(){
    setTimeout(timed_session, timer);
}

window.onkeydown = function(){
    setTimeout(timed_session, timer);
}