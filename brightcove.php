
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<title>Player API Example - HTML</title>

<link rel="stylesheet" href="displayTitles.css"/>

<script src="jsr_class.js"></script>

<script>

	

	// The web service call

	var token = "j1R2gIYQ1ws3N8_M3iJJ-XgPpFIMbGkeDGDbsimt_dNkT0uim3KgvA..";

	

	var req = "http://api.brightcove.com/services/library?";

	req += "command=find_all_videos&token=" + encodeURIComponent(token);  // tokens need to be URL-encoded

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

  <div style="display:none"> Experience for playing back videos. </div>



  <!--

By use of this code snippet, I agree to the Brightcove Publisher T and C 

found at http://corp.brightcove.com/legal/terms_publisher.cfm. 

-->

  <script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>

  <script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/APIModules_all.js"></script>

  <object id="myExperience" class="BrightcoveExperience">

    <param name="bgcolor" value="#FFFFFF" />

    <param name="width" value="480" />

    <param name="height" value="270" />

    <param name="playerID" value="441686777001" />



    <param name="publisherID" value="14459790001"/>

    <param name="isVid" value="true" />

    <param name="isUI" value="true" />

    <param name="dynamicStreaming" value="true" />

    <param name="@videoPlayer" value="441742807001" />

  </object>

  <!-- End of Brightcove Player -->

</div>

<div id="titleList"> </div>



</body>

</html>