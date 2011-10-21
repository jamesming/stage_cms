<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	
$this->load->view('header/blueprint_css.php');  
$this->load->view('header/common_css.php');  
?>
<style>	
				body{
				color:gray;
				background:none;	
				}
				a{
				text-decoration:underline;
				color:blue;	
				}
				a:hover{
				color:lightblue;	
				}
				.toptab div{
					width:200px;
					height:20px;
					text-align:center;
					color:gray;
					margin-left:20px;
					margin-right:5px;
					border:1px solid lightgray;
				}
				#instruction{
				margin-left:20px;
				font-weight:bold;
				padding-top:30px;	
				clear:both;
				}
				#nu_spotlight_set_outside_container{
				clear:both;
				margin:10px 20px 0px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:470px;
				height:250px;
				overflow-y:scroll;
				}
				
							#nu_spotlight_set_outside_container div.row{
								width:100%;
								height:60px;
								border-bottom:1px solid lightgray;
							}
							
							
							#nu_spotlight_set_outside_container div.row .nu_spotlight_set_name_column{
								width:140px;
								padding-top:15px;
								text-align:left;
								color:gray;
								padding-left:8px;
							}
											#nu_spotlight_set_outside_container div.row div.thumbs_container{
												width:auto;
												margin:10px 0px 0px 10px;
											}
											
											#nu_spotlight_set_outside_container div.row div.thumbs_container div.thumb{
												width:69px;
												height:37px;
												margin-right:0px;
												margin-left:-14px;
											}
</style>

		<div  class='toptab ' >
			<div  class=' float_left ' >
				Nu Spotlight Line Up
			</div>
			<div  class='float_left ' >
				Bright Cove
			</div>
		</div>
		<div  id='instruction'>
			Choose a set for&nbsp;&nbsp;<big><?php echo $data['month']. '/' . $data['day'] . '/' .   $data['year']. '</big>&nbsp;or <a id="remove">remove</a> set from day';  ?>
		</div>
  	<div  id='nu_spotlight_set_outside_container'  class='clearfix '>

  		<?php foreach( $data['nu_spotlight_sets']  as  $key => $nu_spotlight_set){?>
  		
  		
  		
  				<div  class='row ' nu_spotlight_set_id='<?php  echo $nu_spotlight_set['id']   ?>'>
			
						<div  href='#fancy_zoom_div'   class='float_left nu_spotlight_set_name_column'  nu_spotlight_set_id='<?php echo $nu_spotlight_set['id']    ?>' >
							<?php  echo $nu_spotlight_set['name']   ?>
						</div>
			
						<div href='#fancy_zoom_div'  class='float_left thumbs_container' nu_spotlight_set_id='<?php echo $nu_spotlight_set['id']    ?>' >


						<?php foreach( $nu_spotlight_set['nu_spotlight_items_sets'] as  $nu_spotlight_items_set ){?>
						
								<div class='float_left thumb'>
									<img src='<?php  echo base_url()   ?>uploads/nu_spotlight_items_images/<?php  echo $nu_spotlight_items_set->nu_spotlight_items_image_id   ?>/image.png' />
								</div>
						
						<?php } ?>



						</div>
						
					</div>
  		
				
  		
  		<?php } ?>
  		


  	</div>

		<form 
			name='form0'
			id='form0'
			method='get'
			action='<?php  echo base_url()   ?>index.php/main/update_calendar'
		>
			<input name="month" type="hidden" value="<?php  echo $data['month']   ?>">
			<input name="day" type="hidden" value="<?php  echo $data['day']   ?>">
			<input name="year"  type="hidden" value="<?php echo $data['year']    ?>">
			<input name="nu_spotlight_set_id" id="nu_spotlight_set_id" type="hidden" value="">
			<input name="delete" id="delete" type="hidden" value="0">
		</form>

		</script>		
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>		
<script type="text/javascript" language="Javascript">  

	$(document).ready(function() {

			$('.row').css({cursor:'pointer'}).each(function(e) {
					$(this).click(function(event) {
						
						$('#nu_spotlight_set_id').val($(this).attr('nu_spotlight_set_id'));
						
						$('#form0').submit();

					});	
			});
			
			$('#remove').click(function(event) {
						$('#delete').val('1');
						$('#form0').submit();
			});	

			$('div.row[nu_spotlight_set_id=<?php  echo $data['nu_spotlight_set_id']   ?>]').css({background:'yellow'})


	});
</script>		