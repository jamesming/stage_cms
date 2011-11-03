<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >



<head>

	<link href="<?php echo  base_url();   ?>css/default.css" rel="stylesheet" type="text/css" />	
	
	
	<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();   ?>js/swfupload/js/swfupload.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();   ?>js/swfupload/js/swfupload.queue.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();   ?>js/swfupload/js/fileprogress.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();   ?>js/swfupload/js/handlers.js"></script>
	<script type="text/javascript">
		
		
	$(document).ready(function() { 
		queueComplete();
	});
			var swfu;
	
			// Flash will not pass through your existing PHP Session information, so if you are getting the 302 error it is likely that your application is returning the login URL to the Flash player. To resolve this issue, you could include the session information in scriptData and manage it manually in your application.
			// Using the home controller instead of the main controller since main contructor contains code to boot users that do not have sessions.
	
			window.onload = function() {
				var settings = {
					file_post_name : "Filedata",
					flash_url : "<?php echo  base_url();   ?>js/swfupload/swfupload.swf",
					upload_url: "<?php echo  base_url();   ?>index.php/home/upload_photos_success?showpage_item_id=<?php echo (isset($showpage_item_id)?$showpage_item_id:'');    ?>",
					post_params: {"PHPSESSID" : "1234"},
					file_size_limit : "100 MB",
					file_types : "*.*",
					file_types_description : "All Files",
					file_upload_limit : 100,
					file_queue_limit : 0,
					custom_settings : {
						progressTarget : "fsUploadProgress",
						cancelButtonId : "btnCancel"
					},
					debug: false,
	
					// Button settings
					button_image_url: "<?php echo  base_url();   ?>images/TestImageNoText_65x29.png",
					button_width: "90",
					button_height: "29",
					button_placeholder_id: "spanButtonPlaceHolder",
					button_text: '<span class="theFont">Select</span>',
					button_text_style: ".theFont { font-size: 16; }",
					button_text_left_padding: 12,
					button_text_top_padding: 3,
					
					// The event handler functions are defined in handlers.js
					file_queued_handler : fileQueued,
					file_queue_error_handler : fileQueueError,
					file_dialog_complete_handler : fileDialogComplete,
					upload_start_handler : uploadStart,
					upload_progress_handler : uploadProgress,
					upload_error_handler : uploadError,
					upload_success_handler : uploadSuccess,
					upload_complete_handler : uploadComplete,
					queue_complete_handler : queueComplete	// Queue plugin event
				};
	
				swfu = new SWFUpload(settings);
		     };
		     
		     
	function queueComplete(){
	
							$.post("<?php echo base_url(). 'index.php/home/get_thumb_photos';    ?>",{
							showpage_item_id:<?php echo (isset($showpage_item_id)?$showpage_item_id:'0');    ?>
							},function(data) {
										$('#error_div').html(data);
										$('#fsUploadProgress').html('');
							});		

		
	}
	
	</script>

</head>
<body>
	
	
	

 
<div   style='display:none'   class=' container' >
			<form id='uploadForm' name='uploadForm' action='<?php echo  base_url();   ?>index.php/home/upload_photos_success?showpage_item_id=<?php echo (isset($showpage_item_id)?$showpage_item_id:'');    ?>' 
			method='post' 
			enctype='multipart/form-data'>	
		
			<input id='select_file' type="file" name="Filedata" size="20"   />
			<input   type="submit" value="submit">
		</form>
</div>

 
 
 
 
<div id="content"  class=' container' >
	
			<div  id="fsUploadProgress" class="fieldset flash">
			<span class="legend">Upload Queue</span>
			</div>
			
			<div id="divStatus">0 Files Uploaded</div>
			
			<div>
				<style>
				#spanButtonPlaceHolder{
					 border:1px solid red;
				}
				</style>
				<span id="spanButtonPlaceHolder">test</span>
				<input id="btnCancel" type="button" value="Cancel All Uploads" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
			</div>
			
</div>


<div id='error_div'     style='background:lightyellow;margin-left:90px;font-size:9px'  >
</div>


</body>
</html>