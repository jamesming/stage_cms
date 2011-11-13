<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php   
 	
$this->load->view('header/blueprint_css.php');  
$this->load->view('header/common_css.php');  
?>
<style>
body{
background:white;		
}
form#image_showpage_iphone_gallery_photo_item_form{
font-size:16px;
}
form#image_showpage_iphone_gallery_photo_item_form input[type=text]{
padding:6px 5px;
width:490px;	
}

form#image_showpage_iphone_gallery_photo_item_form table#main {
width:100%;
margin:30px 0px 0px 0px;	
}
form#image_showpage_iphone_gallery_photo_item_form table#main td.main_table{
padding-top:5px;
padding-bottom:5px;	
}

form#image_showpage_iphone_gallery_photo_item_form table#main div.image_assets{
margin-top:25px;
}
form#image_showpage_iphone_gallery_photo_item_form div#image_showpage_iphone_gallery_photo_item_div{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_iphone_gallery_photo_items_images/<?php
	  	echo $data['showpage_iphone_gallery_photo_items'][0]['showpage_iphone_gallery_photo_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:160px;
	height:240px;
	margin-left: 72px;
}
form#image_showpage_iphone_gallery_photo_item_form div#image_showpage_iphone_gallery_photo_thumb_inactive_item_div{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_iphone_gallery_photo_items_images/<?php
	  	echo ( isset( $data['showpage_iphone_gallery_photo_items'][0]['showpage_iphone_gallery_photo_thumb_inactive_items_image_id']) ? $data['showpage_iphone_gallery_photo_items'][0]['showpage_iphone_gallery_photo_thumb_inactive_items_image_id']:'' ); 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:132px;
	height:61px;
	margin-left: 72px;
}

form#image_showpage_iphone_gallery_photo_item_form div#image_showpage_iphone_gallery_photo_thumb_active_item_div{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_iphone_gallery_photo_items_images/<?php
	  	echo ( isset( $data['showpage_iphone_gallery_photo_items'][0]['showpage_iphone_gallery_photo_thumb_active_items_image_id']) ? $data['showpage_iphone_gallery_photo_items'][0]['showpage_iphone_gallery_photo_thumb_active_items_image_id']:'' ); 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:132px;
	height:61px;
	margin-left: 72px;
}

form#image_showpage_iphone_gallery_photo_item_form #submit{
width:70px;	
}

#dialog{
display:none;	
}
				
#dialog iframe#iframe_src_for_image{
	padding: 5px; 
	border: 1px solid lightgray;
	width:350px;
	height:50px;
	margin-top:13px;
	margin-left:5px;
}
</style>
</head>

<html>



<body >
<form id='image_showpage_iphone_gallery_photo_item_form'>
		<table  id='main'>
			<tr>
				<td  class='main_table ' > Name
				</td>
				<td  class='main_table '><input name="name" id="" type="text" value="<?php echo $data['showpage_iphone_gallery_photo_items'][0]['name']    ?>">
				</td>
			</tr>
			




			<tr>
				
				
				
				<td class='main_table image_assets'  colspan=2>
					<div  class='float_left image_assets' >
							<div image_type='showpage_iphone_gallery_photo' image_type_id='23' class='float_left image_div'  id='image_showpage_iphone_gallery_photo_item_div' showpage_iphone_gallery_photo_items_image_id='<?php echo $data['showpage_iphone_gallery_photo_items'][0]['showpage_iphone_gallery_photo_items_image_id']    ?>'>
							</div>
							
					
					</div>


					<div  class='float_left image_assets' >
							<div image_type='showpage_iphone_gallery_photo_thumb_inactive' image_type_id='24' class='float_left image_div'  id='image_showpage_iphone_gallery_photo_thumb_inactive_item_div' showpage_iphone_gallery_photo_items_image_id='<?php echo $data['showpage_iphone_gallery_photo_items'][0]['showpage_iphone_gallery_photo_thumb_inactive_items_image_id']    ?>'>
							</div>
							
					
					</div>

					<div  class='float_left image_assets' >
							<div image_type='showpage_iphone_gallery_photo_thumb_active' image_type_id='25' class='float_left image_div'  id='image_showpage_iphone_gallery_photo_thumb_active_item_div' showpage_iphone_gallery_photo_items_image_id='<?php echo $data['showpage_iphone_gallery_photo_items'][0]['showpage_iphone_gallery_photo_thumb_active_items_image_id']    ?>'>
							</div>
							
					
					</div>					

				</td>
				
				
			</tr>	
			
			<tr>
				<td   colspan=2>
					<div>
						<input name="" id="submit" type="button" value="submit">
					</div>
				</td>
			</tr>	
			
		</table>
</form>
</body>

<div id="dialog" title="Upload Image"     > 

		<iframe id="iframe_src_for_image" frameborder="0" scrolling=no src=""  >
			
		    <p>Your browser does not support iframes.</p>
		    
		</iframe>			


</div>
</html>

<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
<?php 

$this->load->view('footer/jquery_ui_for_dialog.php');    

?>

	
<script type="text/javascript" language="Javascript">
	

	$(document).ready(function() {
		
		
				$('.image_div').css({cursor:'pointer'}).click(function(event) {

					open_dialogue_upload_image(
					 $(this).attr('showpage_iphone_gallery_photo_items_image_id'),
					 $(this).attr('image_type'),
					 $(this).attr('image_type_id')
					);
				})
		
		

				$('#main td:nth-child(odd)').css({
					'text-align':'right',
					'padding-right':'9px',
					'padding-top':'8px',
					'width':'15%'
				})


				$('#submit').css({cursor:'pointer'}).click(function(event) {

					submit_inputs(
						close_fancyzoom = 1
					);
						
				});	

				
  });
    



function submit_inputs(close_fancyzoom){


					$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
						table:'showpage_iphone_gallery_photo_items',
						crud:'update',
						set_what_array: $('#image_showpage_iphone_gallery_photo_item_form').serialize(),
						id:'<?php echo $data['showpage_iphone_gallery_photo_items'][0]['id']    ?>'
						},function(xml) {

							//var db_response = $(xml).find('db_response').text();
							if( close_fancyzoom == 1){
															window.parent.location.reload();
							};
							
							// window.parent.$('body').click();
							
					});	
	
}	

function open_dialogue_upload_image(
 showpage_iphone_gallery_photo_items_image_id, 
 image_type, 
 image_type_id 
 ){

		submit_inputs(close_fancyzoom=0);

		if( showpage_iphone_gallery_photo_items_image_id == null){
			showpage_iphone_gallery_photo_items_image_id = 0;
		};

		$("#iframe_src_for_image")
		.css({width:'350px',height:'80px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/upload_image_form?what_item=showpage_iphone_gallery_photo&showpage_iphone_gallery_photo_item_id=<?php echo $data['showpage_iphone_gallery_photo_items'][0]['id']    ?>&showpage_iphone_gallery_photo_items_image_id=' + showpage_iphone_gallery_photo_items_image_id +'&image_type='+image_type +'&image_type_id='+image_type_id);

			
		var width_of_dialog = 410;
		var left_coord = ($(window).width()/2 - width_of_dialog/2);

		$("#dialog" ).dialog({
			position:[left_coord,200],
			height: 160,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	
	

</script>

<?php


