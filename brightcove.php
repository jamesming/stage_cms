
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>Player API Example - HTML</title>

<link rel="stylesheet" href="displayTitles.css"/>
<style>
#bcPlayer {
	float:left;
}

#titleList {
	float:left;
	margin:0px 2px 0px 12px;
	width:350px;
	height:412px;
	overflow:auto;
	font: bold 65% arial, sans-serif;
	color:#555;
}

.title {
	height:46px;
	margin-bottom:2px;
	padding:4px;
	overflow:hidden;
	cursor:pointer;
}

.title:hover {
	background:#ddd;
}

.title p {
	margin:0;
	padding:0;
}

p.displayName {
	font-weight:bold;
	color:#000000;
}

p.shortDescription {
	font-weight:normal;
	color:#cccccc;
}

div.thumb {
	float:left;
	width:60px;
	height:44px;
	margin-right:10px;
	background:#333;
	border:1px solid #666;
}

div.thumb img {
	width:100%;
	height:100%;
}
</style>
<script type="text/javascript" language="Javascript">

function JSONscriptRequest(fullUrl) {
    // REST request path
    this.fullUrl = fullUrl; 
    // Keep IE from caching requests
    this.noCacheIE = '&noCacheIE=' + (new Date()).getTime();
    // Get the DOM location to put the script tag
    this.headLoc = document.getElementsByTagName("head").item(0);
    // Generate a unique script tag id
    this.scriptId = 'JscriptId' + JSONscriptRequest.scriptCounter++;
}

// Static script ID counter
JSONscriptRequest.scriptCounter = 1;

// buildScriptTag method
//
JSONscriptRequest.prototype.buildScriptTag = function () {

    // Create the script tag
    this.scriptObj = document.createElement("script");
    
    // Add script object attributes
    this.scriptObj.setAttribute("type", "text/javascript");
    this.scriptObj.setAttribute("charset", "utf-8");
    this.scriptObj.setAttribute("src", this.fullUrl + this.noCacheIE);
    this.scriptObj.setAttribute("id", this.scriptId);
}
 
// removeScriptTag method
// 
JSONscriptRequest.prototype.removeScriptTag = function () {
    // Destroy the script tag
    this.headLoc.removeChild(this.scriptObj);  
}

// addScriptTag method
//
JSONscriptRequest.prototype.addScriptTag = function () {
    // Create the script tag
    this.headLoc.appendChild(this.scriptObj);
}

</script>

<script>

	

	// The web service call

	var token = "mfu5Nh2a27pJx7LrgZbLx363WrLDHUmtJ5BXY0GkYK4.";

	

	var req = "http://api.brightcove.com/services/library?";

	req += "command=find_playlist_by_id&playlist_id=1279653691001&playlist_fields=videos,videoIds&token=" + encodeURIComponent(token);  // tokens need to be URL-encoded

	req += "&fields=id,name,shortDescription,thumbnailURL,length&callback=response";



	function initCall() {

		// Create a new request object

		bObj = new JSONscriptRequest(req); 

		// Build the dynamic script tag

		bObj.buildScriptTag(); 

		// Add the script tag to the page

		bObj.addScriptTag();

	}

	

	// Define the callback function

	// writes out the HTML for each title item in the list

	function response(jsonData) {



		var items = jsonData["items"];

		var tDiv = document.getElementById("titleList");

		var i=0;

		

		while (i<items.length) {

		

			var str = "";

			str += '<div class="title" onClick="playTitleFromList(' + items[i].id + ')">';

			str += '<div class="thumb"><img src="' + items[i].thumbnailURL + '"/></div>';

			str += '<p class="displayName">' + items[i].name + ' (' + formatTime(items[i].length) + ')'+ '</p>';

			str += '<p class="desc">' + items[i].shortDescription + '</p>';

			str += '</div>';

			tDiv.innerHTML += str;

			i++;

		}

	}

	

	// time is stored in milliseconds; we need to convert to a mm:ss display format

	function formatTime(time) {

		

		var t_secs = Math.round(time/1000);

		var mins = Math.floor(t_secs/60);

		var secs = t_secs - (mins*60);

		return mins + ":" + secs;

	}	



	/* Player Interface */



	var player;

	var content;

	var video;

	

	// called when template loads, we use this to store a reference to the modules

	// and add event listeners for media load (when the user clicks on a video)

	function onTemplateLoaded(player) {

		player = brightcove.getExperience(player);

		video = player.getModule(APIModules.VIDEO_PLAYER);

		content = player.getModule(APIModules.CONTENT);

		content.addEventListener(BCContentEvent.MEDIA_LOAD, onMediaLoad);

	}

  

	// handles click event from list items 

	function playTitleFromList(id) {

		content.getMediaAsynch(id);

	}

	

	function onMediaLoad(evt) {

		video.loadVideo(evt.media.id);

	}



	</script>

</head>

<body onload="initCall()">

<div id="bcPlayer">

<!-- Start of Brightcove Player -->

<div style="display:none">

</div>

<!--
By use of this code snippet, I agree to the Brightcove Publisher T and C 
found at https://accounts.brightcove.com/en/terms-and-conditions/. 
-->

<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>
  <script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/APIModules_all.js"></script>
<object id="myExperience" class="BrightcoveExperience">
  <param name="bgcolor" value="#FFFFFF" />
  <param name="width" value="802" />
  <param name="height" value="427" />
  <param name="playerID" value="975126117001" />
  <param name="playerKey" value="AQ~~,AAAAADEdZAY~,VHcBVNPqDVtFfgMts1b_9xI-OSJcija0" />
  <param name="isVid" value="true" />
  <param name="isUI" value="true" />
  <param name="dynamicStreaming" value="true" />
  
</object>

<!-- 
This script tag will cause the Brightcove Players defined above it to be created as soon
as the line is read by the browser. If you wish to have the player instantiated only after
the rest of the HTML is processed and the page load is complete, remove the line.
-->
<script type="text/javascript">brightcove.createExperiences();</script>

<!-- End of Brightcove Player -->

</div>

<div id="titleList"> </div>



</body>

</html>