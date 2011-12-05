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
form#image_showpage_item_form{
font-size:16px;
}
form#image_showpage_item_form input[type=text]{
padding:6px 5px;
width:490px;	
}
form#image_showpage_item_form textarea#video_embed
{
width:495px;
height:90px;	
}
form#image_showpage_item_form textarea#getglue_embed
{
width:495px;
height:90px;	
}
form#image_showpage_item_form table#main {
width:100%;
margin:30px 0px 0px 0px;	
}
form#image_showpage_item_form table#main td.main_table{
padding-top:5px;
padding-bottom:5px;	
}

form#image_showpage_item_form table#main div.image_assets{
margin-top:25px;
}
/* showpage_hero */
form#image_showpage_item_form div#image_showpage_hero_item_showpage_hero{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:500px;
	height:422px;
	margin-left: 72px;
}
/* showpage_title */
form#image_showpage_item_form div#image_showpage_title_item_showpage_title{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_title_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:455px;
	height:167px;
	margin-left: 72px;
}
/* showpage_dropdown */
form#image_showpage_item_form div#image_showpage_dropdown_item_showpage_dropdown{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_dropdown_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:460px;
	height:323px;
	margin-left: 72px;
}

/* showpage_hero_iphone */
form#image_showpage_item_form div#image_showpage_hero_iphone_item_showpage_hero_iphone{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_iphone_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:200px;
	height:301px;
	margin-left: 72px;
}

/* hero_android */
form#image_showpage_item_form div#image_showpage_hero_android_item_showpage_hero_android{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_android_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:200px;
	height:301px;
	margin-left: 72px;
}

/* mobile_thumb*/
form#image_showpage_item_form div#image_showpage_hero_mobile_thumb{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_mobile_thumb_items_image_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:100px;
	height:70px;
	margin-left: 72px;
}

/* IPAD HERO */
form#image_showpage_item_form div#image_showpage_ipad_item_div{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_ipad_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:200px;
	height:301px;
	margin-left: 72px;
}
/* IPAD HERO LANDSCAPE*/
form#image_showpage_item_form div#image_showpage_ipad_landscape_item_div{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo $data['showpage_items'][0]['showpage_hero_ipad_landscape_id']; 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:301px;
	height:200px;
	margin-left: 72px;
}
/* IPAD HERO THUMB */
form#image_showpage_item_form div#image_showpage_ipad_hero_thumb_item_div{
	background-image: url(<?php echo base_url();    ?>uploads/showpage_items_images/<?php
	  	echo ( isset( $data['showpage_items'][0]['showpage_ipad_hero_thumb_items_id']) ? $data['showpage_items'][0]['showpage_ipad_hero_thumb_items_id']:'' ); 
	?>/image_tiny.png?random=<?php echo rand(5,12334)    ?>);
	background-repeat: no-repeat;
	border:1px dotted gray;
	width:100px;
	height:70px;
	margin-left: 72px;
}

form#image_showpage_item_form #textarea_div{
width:100%;
height: 180px;
margin:0px 0px 0px 0px;
padding:10px 0px 0px 0px;
}

form#image_showpage_item_form div.image_div div.icon_container{
	display:none;
	width:99%;
	height:26px;
	padding-top:5px;
	padding-right:5px;
	background:white;
	filter:alpha(opacity=75);    /* ie  */
	-moz-opacity:0.75;    /* old mozilla browser like netscape  */
	-khtml-opacity: 0.75;    /* for really really old safari */
	opacity: 0.75;    /* css standard, currently it works in most modern browsers like firefox,  */
}

form#image_showpage_item_form div.image_div div.label{
	text-align:center;
	font-weight:bold;
	font-size:20px;
	color:blue;
	display:none;
	width:99%;
	height:26px;
	padding-top:35px;
	padding-right:5px;
	background:white;
	filter:alpha(opacity=75);    /* ie  */
	-moz-opacity:0.75;    /* old mozilla browser like netscape  */
	-khtml-opacity: 0.75;    /* for really really old safari */
	opacity: 0.75;    /* css standard, currently it works in most modern browsers like firefox,  */
}
form#image_showpage_item_form  div.image_div div.icon_container div.icon{
	width:20px;
	height:20px;
	margin-right:5px;
	float:right;
}
form#image_showpage_item_form  div.image_div div.icon_container div.change_pic{
	background:lightblue;	
}
form#image_showpage_item_form  div.image_div div.icon_container div.facebook{
	background:orange;	
}
form#image_showpage_item_form  div.image_div div.icon_container div.video{
	background:gray;	
}
form#image_showpage_item_form #submit{
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
<form id='image_showpage_item_form'>
		<table  id='main'>
			<tr>
				<td  class='main_table ' > URL Name
				</td>
				<td  class='main_table '><input name="url_name" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['url_name']) ? $data['showpage_items'][0]['url_name']:'' )    ?>">
				</td>
			</tr>
			<tr>
				<td  class='main_table ' > Name
				</td>
				<td  class='main_table '><input name="name" id="" type="text" value="<?php echo $data['showpage_items'][0]['name']    ?>">
				</td>
			</tr>
			
			<tr>
				<td  class='main_table ' > First Video
				</td>
				<td  class='main_table '><input name="first_video" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['first_video'] ) ? $data['showpage_items'][0]['first_video'] :'' )   ?>">
				</td>
			</tr>
			<tr>
				<td  class='main_table ' > Full Episode Playlist
				</td>
				<td  class='main_table '><input name="full_episode_playlist" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['full_episode_playlist'] ) ? $data['showpage_items'][0]['full_episode_playlist'] :'' )   ?>">
				</td>
			</tr>
			
			
			<tr>
				<td  class='main_table ' > Next On Playlist
				</td>
				<td  class='main_table '><input name="next_on_playlist" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['next_on_playlist'] ) ? $data['showpage_items'][0]['next_on_playlist'] :'' )   ?>">
				</td>
			</tr>				
			<tr>
				<td  class='main_table ' > Sneak Peak Playlist
				</td>
				<td  class='main_table '><input name="sneak_peak_playlist" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['sneak_peak_playlist'] ) ? $data['showpage_items'][0]['sneak_peak_playlist'] :'' )   ?>">
				</td>
			</tr>			
			
			<tr>
				<td  class='main_table ' > Video Extras Playlist
				</td>
				<td  class='main_table '><input name="video_extras_playlist" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['video_extras_playlist'] ) ? $data['showpage_items'][0]['video_extras_playlist'] :'' )   ?>">
				</td>
			</tr>			
			
			<tr>
				<td  class='main_table '> Title
				</td>
				<td  class='main_table '><input name="title" id="" type="text" value="<?php echo $data['showpage_items'][0]['title']    ?>">
				</td>
			</tr>
			<tr>
				<td  class='main_table '> Keywords
				</td>
				<td  class='main_table '><input name="keywords" id="" type="text" value="<?php echo $data['showpage_items'][0]['keywords']    ?>">
				</td>
			</tr>
			<tr>
				<td  class='main_table '> Facebook
				</td>
				<td  class='main_table '><input name="facebook_url" id="" type="text" value="<?php echo $data['showpage_items'][0]['facebook_url']    ?>">
				</td>
			</tr>		
			
			<tr>
				<td  class='main_table '> Twitter
				</td>
				<td  class='main_table '><input name="twitter_url" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['twitter_url']) ? $data['showpage_items'][0]['twitter_url'] :'' )    ?>">
				</td>
			</tr>		
			
			<tr>
				<td  class='main_table '> Hulu
				</td>
				<td  class='main_table '><input name="hulu_url" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['hulu_url']) ? $data['showpage_items'][0]['hulu_url'] :'' )    ?>">
				</td>
			</tr>		
			
			<tr>
				<td  class='main_table '> GetGlue
				</td>
				<td  class='main_table '><input name="getglue_url" id="" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['getglue_url']) ? $data['showpage_items'][0]['getglue_url'] :'' )    ?>">
				</td>
			</tr>	
						
			<tr>
				<td  class='main_table '> Video Embed
				</td>
				<td  class='main_table '><textarea name="video_embed" id="video_embed" ><?php echo $data['showpage_items'][0]['video_embed']    ?></textarea>
				</td>
			</tr>	
			
			<tr>
				<td  class='main_table '> Get Glue Embed
				</td>
				<td  class='main_table '><textarea name="getglue_embed" id="getglue_embed" ><?php echo ( isset( $data['showpage_items'][0]['getglue_embed']) ? $data['showpage_items'][0]['getglue_embed']:'' )    ?></textarea>
				</td>
			</tr>					
			<tr>
				<td   class='main_table ' colspan=2>
					<div  id='textarea_div'   >
							<textarea  class=' clearfix' name='about' id='text_area'><?php echo $data['showpage_items'][0]['about']    ?></textarea>
					</div>
				</td>
			</tr>	

			<tr>
				<td   colspan=2>
					<div>
						<input  class=' submit' name="" type="button" value="submit">
					</div>
				</td>
			</tr>	
			<tr>
				<td class='main_table image_assets' colspan=2>
					<div  class=' image_assets' >
							<div image_type='showpage_hero' image_type_id='10' class='float_left image_div'  id='image_showpage_hero_item_showpage_hero' showpage_items_image_id='<?php echo $data['showpage_items'][0]['showpage_hero_items_image_id']    ?>'>
							</div>
							
					
					</div>

				</td>
			</tr>	
	

			<tr>
				<td class='main_table image_assets' colspan=2>
					<div  class=' image_assets' >
							<div image_type='showpage_title' image_type_id='12' class='float_left image_div'  id='image_showpage_title_item_showpage_title' showpage_items_image_id='<?php echo $data['showpage_items'][0]['showpage_title_items_image_id']    ?>'>
							</div>
							<input showpage_items_id=<?php echo  $data['showpage_items'][0]['id']   ?>  style='width:20px'   class='float_left ' name="showpage_title_left_margin" id="showpage_title_left_margin" type="text" value="<?php echo  $data['showpage_items'][0]['showpage_title_left_margin']   ?>">
					
					</div>

				</td>
			</tr>	


			<tr>
				<td class='main_table image_assets' colspan=2>
					<div  class=' image_assets' >
							<div image_type='showpage_dropdown' image_type_id='19' class='float_left image_div'  id='image_showpage_dropdown_item_showpage_dropdown' showpage_items_image_id='<?php echo $data['showpage_items'][0]['showpage_dropdown_items_image_id']    ?>'>
							</div>
							
					
					</div>

				</td>
			</tr>	

				<tr>
					<td colspan=2>
						<br />
						<hr /   style='border:2px solid gray; background:gray;'  >
					</td>
				</tr>

			<tr>
				<td>
					&nbsp;
				</td>
				<td >
							<style>
								#iphone_directTo_div{
								margin-right:420px;	
								}
								table#iphone_directTo_table{
									border:1px solid gray;
								}
								table#iphone_directTo_table td{/*
									border-right:0px solid gray;	
									border-bottom:0px solid gray;*/
									white-space:nowrap;
									vertical-align:middle;
								}
							</style>
 							<div   id='iphone_directTo_div' >	
 								
 								<table id='iphone_directTo_table'>
									
 									<tr>
 										<td><input name="iphone_directTo" type="radio" value="1"> </td>
 										<td>Internal 
 										</td>
 										<td>
 											

 											&nbsp;
 											
 											
 											
 										</td>
 									</tr>
 									<tr>
 										<td><input name="iphone_directTo" type="radio" value="2">	</td>
 										<td>External
 										</td>
 										<td>
 										</td>
 									</tr>
 									<tr>
 										<td><input name="iphone_directTo" type="radio" value="3"></td>
 										<td>Video
 										</td>
 										<td><input name="videoID" id="videoID" type="text" value="<?php echo ( isset( $data['showpage_items'][0]['videoID']  ) ? $data['showpage_items'][0]['videoID']  :'' )  ?>"    style='width:95px'  >
 										</td>
 									</tr>
 									<tr>
 										<td>
 											<input name="iphone_directTo" type="radio" value="4">	
 											<br /><br />	
 										</td>
 										<td>
 											None
 											<br /><br />
 										</td>
 										<td>
 										</td>
 									</tr> 									 									 									
 								</table>

								
							</div>	
				</td>
			</tr>


			<tr>
				<td class='main_table image_assets' colspan=2>
					<div  class='float_left image_assets' >
							<div image_type='showpage_hero_iphone' image_type_id='11' class='float_left image_div'  id='image_showpage_hero_iphone_item_showpage_hero_iphone' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_hero_iphone_items_image_id']) ? $data['showpage_items'][0]['showpage_hero_iphone_items_image_id']:'' )    ?>'>
							</div>
							
					
					</div>
					<div  class='float_left image_assets' >
							<div image_type='showpage_hero_android' image_type_id='29' class='float_left image_div'  id='image_showpage_hero_android_item_showpage_hero_android' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_hero_android_items_image_id']) ? $data['showpage_items'][0]['showpage_hero_android_items_image_id']:'' )    ?>'>
							</div>
							
					
					</div>
					
					<div  class='float_left image_assets' >
							<div image_type='showpage_hero_mobile_thumb' image_type_id='30' class='float_left image_div'  id='image_showpage_hero_mobile_thumb' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_hero_mobile_thumb_items_image_id']) ? $data['showpage_items'][0]['showpage_hero_mobile_thumb_items_image_id']:'' )    ?>'>
							</div>
							
					
					</div>					
					
				</td>
				
				
			</tr>				
			<tr>
				<td class='main_table image_assets' colspan=2>

					<div  class='float_left image_assets' >
							<div image_type='showpage_hero_ipad' image_type_id='37' class='float_left image_div'  id='image_showpage_ipad_item_div' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_hero_ipad_id']) ? $data['showpage_items'][0]['showpage_hero_ipad_id']:'' )    ?>'>
							</div>
							
					
					</div>
					<div  class='float_left image_assets' >
							<div image_type='showpage_ipad_hero_landscape' image_type_id='44' class='float_left image_div'  id='image_showpage_ipad_landscape_item_div' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_hero_ipad_landscape_id']) ? $data['showpage_items'][0]['showpage_hero_ipad_landscape_id']:'' )    ?>'>
							</div>
							
					
					</div>					
					<div  class='float_left image_assets' >
							<div image_type='showpage_ipad_hero_thumb' image_type_id='36' class='float_left image_div'  id='image_showpage_ipad_hero_thumb_item_div' showpage_items_image_id='<?php echo ( isset( $data['showpage_items'][0]['showpage_ipad_hero_thumb_items_id']) ? $data['showpage_items'][0]['showpage_ipad_hero_thumb_items_id']:'' )    ?>'>
							</div>

					</div>					
					
				</td>
				
				
			</tr>		
			<tr>
				<td   colspan=2>
					<div>
						<input  class=' submit' name="" type="button" value="submit">
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
$this->load->view('javascript/htmlbox_wsiwyg.php');  

?>

	
<script type="text/javascript" language="Javascript">
	

	$(document).ready(function() {

				$('#iphone_directTo_div input').each(function(event) {
					if( $(this).val() == <?php  echo ( isset( $data['showpage_items'][0]['iphone_directTo']) ? $data['showpage_items'][0]['iphone_directTo']:0 )   ?>){		
							$(this).attr("checked","checked");
					};
				});	

				$('#showpage_title_left_margin').blur(function(event) {

							
						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_items',
							id:$(this).attr('showpage_items_id'),
							crud:'update',
							set_what_array:$(this).serialize()
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								
								
						});		
				});		
		


				$('.image_div div.icon_container div.change_pic')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_upload_image(
						 $(this).parent().parent().attr('showpage_items_image_id'),
						 $(this).parent().parent().attr('image_type'),
						 $(this).parent().parent().attr('image_type_id')
						);
					})

				$('.image_div div.icon_container div.facebook')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_facebook_link()();
					})					
		
		
				$('.image_div div.icon_container div.video')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_video_link()();
					})					
		
		
		
				$(".image_div").css({cursor:'pointer',border:'1px solid gray'}).append("<div  class='icon_container ' ><div  class='icon change_pic'  >c</div></div>")
				.mouseover(function(event) {
							$(this).children('div.icon_container').show()
				})
				.mouseout(function(event) {
							$(this).children('div.icon_container').hide()
				}).append("<div  class='label ' ></div>")
				.mouseover(function(event) {
							$(this).css({'padding-top':$(this).height/2}).children('div.label').html($(this).attr('image_type')).show()
				})
				.mouseout(function(event) {
							$(this).children('div.label').hide()
				})


				<?php if( $data['showpage_items'][0]['showpage_title_items_image_id'] != 0 ){?>
					$(".image_div[image_type='showpage_title']").children('div.icon_container').append("<div  class='icon video'  >v</div><div  class='icon facebook'  >f</div>")
				<?php } ?>		$('#main td:nth-child(odd)').css({
					'text-align':'right',
					'padding-right':'9px',
					'padding-top':'8px',
					'width':'15%'
				})


				$('.image_div div.icon_container div.change_pic')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_upload_image(
						 $(this).parent().parent().attr('showpage_items_image_id'),
						 $(this).parent().parent().attr('image_type'),
						 $(this).parent().parent().attr('image_type_id')
						);
					})
					
				$('.image_div div.icon_container div.facebook')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_facebook_link()();
					})					
		
		
				$('.image_div div.icon_container div.video')
					.css({cursor:'pointer'})
					.click(function(event) {
						open_dialogue_video_link()();
					})					
		



				$('.submit').css({cursor:'pointer'}).click(function(event) {

					submit_inputs(
						close_fancyzoom = 1
					);
						
				});	
			
				mbox = $("#text_area").css({
						height:"100px",
						width:"100%"
						}).htmlbox({
				    toolbars:[
					    [
						// Cut, Copy, Paste
						"separator","cut","copy","paste",
						// Undo, Redo
						"separator","undo","redo",
						// Bold, Italic, Underline, Strikethrough, Sup, Sub
						"separator","bold","italic","underline","strike","sup","sub",
						// Left, Right, Center, Justify
						"separator","justify","left","center","right",
						// Ordered List, Unordered List, Indent, Outdent
						"separator","ol","ul","indent","outdent",
						// Hyperlink, Remove Hyperlink, Image
						"separator","link","unlink","image"
						
						],
						[// Show code
						"separator","code",
				        // Formats, Font size, Font family, Font color, Font, Background
				        "separator","formats","fontsize","fontfamily",
						"separator","fontcolor","highlight",
						],
						[
						//Strip tags
						"separator","removeformat","striptags","hr","paragraph",
						// Styles, Source code syntax buttons
						"separator","quote","styles","syntax"
						]
					],
					skin:"gray"
				});
				
				
				setTimeout(function() { 											
						mbox.set_text( $('#text_area').text()   );
				}, 100);
				
				
  });
    


function open_dialogue_facebook_link(){

		submit_inputs(close_fancyzoom=0);


		$("#iframe_src_for_image")
		.css({width:'750px',height:'400px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/create_facebook_link_form?table=showpage&showpage_items_image_id=<?php  echo $data['showpage_items'][0]['showpage_title_items_image_id']   ?>');

			
		var width_of_dialog = 795;
		
		
		
		var p = $('#image_showpage_title_item_showpage_title');
		position = p.position();
		
		
		
		var left_coord = ($(window).width()/2 - width_of_dialog/2);

		$("#dialog" ).dialog({
			position:[left_coord,position.top],
			height: 510,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	



function open_dialogue_video_link(){

		submit_inputs(close_fancyzoom=0);


		$("#iframe_src_for_image")
		.css({width:'750px',height:'400px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/create_video_link_form?table=showpage&showpage_items_image_id=<?php  echo $data['showpage_items'][0]['showpage_title_items_image_id']   ?>');

			
		var width_of_dialog = 795;
		
		var p = $('#image_showpage_title_item_showpage_title');
		position = p.position();
		
		var left_coord = ($(window).width()/2 - width_of_dialog/2);

		$("#dialog" ).dialog({
			position:[left_coord,position.top],
			height: 510,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	


function dialog_close(){
	$( "#dialog" ).dialog('close');
}


function submit_inputs(close_fancyzoom){
	
					serialized = $('#image_showpage_item_form').serialize();
				
					if( !$('#isHot').is(':checked')  ){
						
					serialized = serialized + '&isHot=0';
						
					};

					$("#text_area").val( mbox.get_html() );

					$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
						table:'showpage_items',
						crud:'update',
						set_what_array: serialized,
						id:'<?php echo $data['showpage_items'][0]['id']    ?>'
						},function(xml) {

							//var db_response = $(xml).find('db_response').text();
							if( close_fancyzoom == 1){
															window.parent.location.reload();
							};
							
							// window.parent.$('body').click();
							
					});	
	
}	

function open_dialogue_upload_image(
 showpage_items_image_id, 
 image_type, 
 image_type_id 
 ){



		submit_inputs(close_fancyzoom=0);

		if( showpage_items_image_id == null){
			showpage_items_image_id = 0;
		};

		$("#iframe_src_for_image")
		.css({width:'350px',height:'80px'})
		.attr('src','<?php echo base_url();    ?>index.php/main/upload_image_form?what_item=showpage&showpage_item_id=<?php echo $data['showpage_items'][0]['id']    ?>&showpage_items_image_id=' + showpage_items_image_id +'&image_type='+image_type +'&image_type_id='+image_type_id);

			
		var width_of_dialog = 410;
		var left_coord = ($(window).width()/2 - width_of_dialog/2);
		
		var p = $('div[image_type_id='+image_type_id+']');
		position = p.position();


		$("#dialog" ).dialog({
			position:[left_coord,position.top],
			height: 160,
			zIndex: -10,
			width: width_of_dialog,
			resizable: false 
			})
						
};	
	
	
	
</script>

<?php


