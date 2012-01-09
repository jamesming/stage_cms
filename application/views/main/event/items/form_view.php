<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php   
 	
$this->load->view('header/blueprint_css.php');  
$this->load->view('header/common_css.php');  

?>
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>

<style>
body{
background:white;		
}
form#event_item_form{
font-size:16px;
}
form#event_item_form input[type=text]{
padding:6px 5px;
width:490px;	
}

form#event_item_form table#main {
width:100%;
margin:30px 0px 0px 0px;	
}
form#event_item_form table#main td.main_table{
padding-top:5px;
padding-bottom:5px;	
}


form#event_item_form #textarea_div{
width:100%;
height: 180px;
margin:0px 0px 0px 0px;
padding:10px 0px 0px 0px;
}
form#event_item_form #submit{
width:70px;	
}


</style>
</head>

<html>



<body >
<form id='event_item_form'>
	
<?php     

	ini_set('display_errors', '1');
	error_reporting(E_ALL ^ E_STRICT);


?>
		<table  id='main'>
			
			
			<tr>
				<td  class='main_table ' >Name
				</td>
				<td  class='main_table '>
					
					<input name="name" id="" type="text" value="<?php echo $data['event_items'][0]['name']    ?>">

					
				</td>
			</tr>
			<tr>
				<td  class='main_table ' >Link
				</td>
				<td  class='main_table '>
					
					<input name="link" id="" type="text" value="<?php echo ( isset( $data['event_items'][0]['link']) ? $data['event_items'][0]['link']:'' )    ?>">

					
				</td>
			</tr>
			<tr>
				<td   colspan=2>
					<div>
						<input name="" id="submit" type="button" value="save">&nbsp;&nbsp;<span class='launch' location='http://stage.mynuvotv.com/nu-voices'>Preview</span>
					</div>
				</td>
			</tr>	
			
			
			<tr>
				<td   class='main_table ' colspan=2>
					<div  id='textarea_div'   >
							<textarea  class=' clearfix' name='content' id='text_area'><?php echo $data['event_items'][0]['content']    ?></textarea>
					</div>
				</td>
			</tr>	

		</table>
</form>
</body>


</html>

<?php 

$this->load->view('footer/jquery_ui_for_dialog.php');    
$this->load->view('javascript/htmlbox_wsiwyg.php');  

?>

	
<script type="text/javascript" language="Javascript">
	

	$(document).ready(function() {
		
				$('.launch').css({cursor:'pointer'}).click(function(event) {
						window[1] = open($(this).attr('location'), 1);
				});			
		
				$('.image_div').css({cursor:'pointer'}).click(function(event) {

					open_dialogue_upload_image(
					 $(this).attr('event_items_image_id'),
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
			


				setTimeout(function() { 											
				mbox = $("#text_area").css({
						height:"120px",
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
				}, 1000);	

				
				
  });
    



function submit_inputs(close_fancyzoom){

					serialized = $('#event_item_form').serialize();
					
					if( !$('#include_title').is(':checked')  ){
						
					serialized = serialized + '&include_title=0';
						
					};
					

					$("#text_area").val( mbox.get_html() );

					$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
						table:'event_items',
						crud:'update',
						set_what_array: serialized,
						id:'<?php echo $data['event_items'][0]['id']    ?>'
						},function(xml) {

							//var db_response = $(xml).find('db_response').text();
							if( close_fancyzoom == 1){
							//								window.parent.location.reload();
							};
							
							// window.parent.$('body').click();
							
					});	
	
}	



</script>

<?php


