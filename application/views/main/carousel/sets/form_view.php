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
font-size:16px;
}
div.name_div{
padding-top:20px;	
}
div.name_div input{
padding:6px 5px;
width:376px;	
border:1px solid lightgray;
}
div.row{
	margin-left:30px;
	width:100%;
	height:40px;
}
							
div.row div.right_tab_container{
	width:auto;
	margin-top:5px;
	
}
											
div.row div.right_tab_container div.thumb{
    border: 1px dotted gray;
    height: 31px;
    width: 76px;
    overflow: hidden;
}

div.choice_right_tab_container_div{
    background: none repeat scroll 0 0 lightgray;
    border: 1px dotted lightblue;
    height: 54px;
    margin-bottom: 25px;
    margin-top: 15px;
    overflow-x: scroll;
    overflow-y: hidden;
    width: 436px;
}
div.choice_right_tab_container_div div.right_tab_container{
	width:10000px;
}

.submit_div{
	margin-top:115px;
}
#submit{
padding:5px 20px;
width:100px;	
}
</style>
</head>  		
<body>  		
<form 
	id='form0' 
	name='form0' 
	action='<?php  echo base_url()   ?>index.php/main/update_carousel_set_order' 
	method='post'
>
<div  class='container ' >
					<div class='row name_div'>
					Name&nbsp;&nbsp;<input name="name" type="" value="<?php
					
					if( isset($data['carousel_sets'][0]['name'] )){
						
					  echo $data['carousel_sets'][0]['name'];
						
					};
 
					  
					  ?>" >
					</div>
					
					
					
  				<div  class='clearfix row choice_right_tab_container_div' >
			
						<div class='float_left right_tab_container'  >
							

							<?php foreach( $data['carousel_items']  as  $carousel_item){?>
							
									<div class='float_left thumb choice_thumb' carousel_item_id='<?php echo $carousel_item['id']    ?>'>
										<img  title='<?php  echo $carousel_item['name']   ?>' src='<?php echo base_url()    ?>uploads/carousel_items_images/<?php  echo $carousel_item['right_tab_carousel_items_image_id']   ?>/image_tiny.png'/>
									</div>
									
							<?php } ?>
							


						</div>
						
					</div>						
	
  				<div  class='row right_tab_container_div' >
			
						<div class='clearfix right_tab_container'  >


								<?php if( isset($data['carousel_sets'])  ){
															
															/* START FOREACH */
															$count=0;
															foreach( $data['carousel_sets'][0]['carousel_items_sets'] as  $carousel_items_set ){
															$count++;
															?>
															
															
																	<div order_num = '<?php echo $carousel_items_set->order;   ?>' class='float_left thumb designate' >
																			<img src='<?php   echo base_url()  ?>uploads/carousel_items_images/<?php  echo $carousel_items_set->carousel_items_image_id;   ?>/image_tiny.png' />
																	</div>
																	
																	
																	
						<?php if (in_array($count, array(4,7,9))){?>
							
						</div>
						<div class='clearfix right_tab_container'  >
							
						<?php } ?>
						

															<?php } /* END FOREACH */
								}else{
									
															for($i=1; $i <=10; $i++){?>
																
		
																	<div order_num = '<?php echo $i;   ?>' class='thumb designate' >
																			
																	</div>
																	
																	
						<?php if (in_array($i, array(4,7,9))){?>
							
						</div>
						<div class='float_left right_tab_container'  >
							
						<?php } ?>
																	
															<?php }
									
								} ?>


							

						</div>
						
						
					</div>	
					
					

					
					<div  class='submit_div row clearfix '    >
						
						<input name="carousel_set_id" type="hidden" value="<?php echo $data['carousel_set_id']    ?>">
						
							<?php if( isset($data['carousel_sets'])  ){	
								 foreach( $data['carousel_sets'][0]['carousel_items_sets'] as  $carousel_items_set ){?>
									<input name="order<?php echo $carousel_items_set->order;   ?>" id="order<?php echo $carousel_items_set->order;   ?>" type="hidden" value="<?php  echo $carousel_items_set->carousel_item_id;   ?>">
									<?php }
							}else{
									for($i=1; $i <=10; $i++){?>
											<input name="order<?php echo $i  ?>" id="order<?php echo $i ?>" type="hidden" value="">
									<?php }
							} ?>

						<input id="submit" type="submit" value="submit">
					</div>
</div>
</form>
  		
</body>	
<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>		
		<script type="text/javascript" language="Javascript">  
			order_num = 1;	

			$(document).ready(function() {

				$('.designate[order_num=1]').css({'border':'1px solid red'});

				$('.designate').css({cursor:'pointer'}).each(function(event) {
					
						$(this).click(function(event) {	
							
									$('.designate').css({'border':'1px dotted gray'})	
									$(this).css({'border':'1px solid red'});
									
									order_num = $(this).attr('order_num');
									
						});	
				});	
				
				$('.choice_thumb').css({cursor:'pointer'}).each(function(event) {
						$(this).click(function(event) {	
								$('.designate[order_num='+order_num+']').html( 
										$(this).html()
								);
								$('#order'+order_num).val( $(this).attr('carousel_item_id'));
								
								
								
								
								order_num++;
								
								$('.designate').css({'border':'1px dotted gray'});	
								$('.designate[order_num='+order_num+']').css({'border':'1px solid red'});	
								
								
								
						});			
				});	



  		});
		</script>		