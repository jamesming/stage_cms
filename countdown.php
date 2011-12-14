<style>
body{
font-family:'Helvetica Neue', Arial, Helvetica, sans-serif;
width:174px;		
}
.countdown_block{
padding-right:3px;
float:left;
margin-right:0px;
color:white;
background:black;
padding-left:8px;
padding-top:5px;
width:21px;
height:23px;
font-size:16px;
}
.colon{
float:left;
font-size:18px;
width:9px;
padding-left:2px;
font-weight:bold;
}
.countdown_label{
background: transparent;
color: black;
font-size: 11px;
padding: 0px;
height: 17px;
text-align: center;
width: 32px;
font-weight: bold;
}
.until{
	font-size:13px;
clear:both;	
text-align:center;
font-weight:bold;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.js"></script>
<script type="text/javascript" language="Javascript" src = "js/jquery_countdown.js"></script>

<script type="text/javascript" language="Javascript">
$(document).ready(function() { 
	

				if( 	 getTimeZone() == 8 	  // Pacific Coast
						|| getTimeZone() == 5){   // Eastern
					airtime = 21; // 9pm
				}else if(getTimeZone() == 6){ // Central
					airtime = 20;  // 8pm
				}else if(getTimeZone() == 7){ // Mountain
					airtime = 19;  // 7pm
				};

				month = 0; // Should be 10 for October but javascript takes it down one number

				var austDay = new Date();
				austDay = new Date(
					2012, 
					month, 
					13, // day of month
					airtime, 
					0 // minutes
					);
				
				$('#defaultCountdown').countdown({
					until: austDay, 
    			layout: "<div  class=' countdown_block' >{dn}</div><div  class='colon ' >:</div><div  class=' countdown_block' >{hnn}</div><div  class='colon ' >:</div><div  class=' countdown_block' >{mnn}</div><div  class='colon ' >:</div><div  class=' countdown_block' >{snn}</div>"})
});


function getTimeZone(){
var localTime = new Date();
return localTime.getTimezoneOffset()/60 ;
}

</script>
	<body>
	<div  >
		<span id='defaultCountdown'></span>
	</div>
	<div   style='clear:both'  >
		<div  class='countdown_block countdown_label' >
			Days
		</div>
		<div  class='colon ' >
			&nbsp;
		</div>
		<div  class='countdown_block  countdown_label' >
			Hours
		</div>
		<div  class='colon ' >
			&nbsp;
		</div>
		<div  class='countdown_block  countdown_label' >
			Min
		</div>
		<div  class='colon ' >
			&nbsp;
		</div>
		<div  class='countdown_block  countdown_label' >
			Secs
		</div>
	</div>
	<div  class='until '  >
		UNTIL <br />Day<br />of
	</div>
</body>

