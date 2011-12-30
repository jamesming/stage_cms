<style>

iframe#iframe_src{
width:500px;
height:350px;	
}
img#addCarouselSet{
width:30px;	
margin:23px 23px 10px 23px;
}
				
				#carousel_set_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
				}
				
							#carousel_set_outside_container div.row{
								width:100%;
								height:150px;
								border-bottom:1px solid lightgray;
							}
											#carousel_set_outside_container div.row .carousel_set_name_column{
												width:100px;
												padding-top:15px;
												text-align:center;
												color:gray;
											}
											#carousel_set_outside_container div.row div.thumbs_container{
												width:auto;
												margin:10px 0px 0px 10px;
												
											}
											
														#carousel_set_outside_container div.row div.thumbs_container div.thumb{
													    border: 1px dotted gray;
													    height: 67px;
													    width: 76px;
													    overflow: hidden;
													    height: 31px;
														}
											
											
											#carousel_set_outside_container   div.row  .carousel_item_trash{
											width:16px;
											padding-top:20px;
											padding-left:100px;
											}
											
														#carousel_set_outside_container  div.row  .carousel_item_trash img{
														width:30px;
														}	
											
</style>
		<img   carousel_set_id='0' href='#fancy_zoom_div' class='clearfix ' title='Add Carousel Set'  id='addCarouselSet' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='carousel_set_outside_container'  class='clearfix '>

  		<?php 

	  		foreach( $data['carousel_sets']  as  $key => $carousel_set){?>
	  		
	  		
	  		
	  				<div  class='row ' >
				
							<div  href='#fancy_zoom_div'   class='float_left carousel_set_name_column'  carousel_set_id='<?php echo $carousel_set['id']    ?>' >
								<?php  echo $carousel_set['name']   ?>
							</div>
				
				
							<div  class='float_left ' >
									<div href='#fancy_zoom_div'  class='float_left  thumbs_container' carousel_set_id='<?php echo $carousel_set['id']    ?>' >
			
										<?php
										
												 
													$count = 0;
													foreach( $carousel_set['carousel_items_sets'] as  $carousel_items_set ){
													$count++;
												 	
												 	?>
										
																<div class='thumb'>
																	<img src='<?php   echo base_url()  ?>uploads/carousel_items_images/<?php  echo $carousel_items_set->carousel_items_image_id   ?>/image_tiny.png' />
																</div>
																
																
																
																
									<?php if (in_array($count, array(4,7,9))){?>
									
									</div>
									<div href='#fancy_zoom_div'  class='float_left  thumbs_container' carousel_set_id='<?php echo $carousel_set['id']    ?>' >
										
									<?php } ?>
										
										
										
										
										
										<?php } ?>
			
			
									</div>																										
							</div>

							
							
							<div  class='float_left  carousel_item_trash' >
								<img src='<?php echo base_url()    ?>images/trash.gif'   carousel_set_id='<?php echo $carousel_set['id']   ?>' >
							</div>		
							
							
						</div>
	  		
					
	  		
	  		<?php } ?>
	  		
	
	
	  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {

				$('#addCarouselSet, .thumbs_container, .carousel_set_name_column').css({cursor:'pointer'}).fancyZoom().click(function(event) {

					$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/carousel_sets_form?carousel_set_id=' + $(this).attr('carousel_set_id')  );

				});	
				
				
				$('.carousel_item_trash img').css({cursor:'pointer'}).each(function(event) {	
					

							
								$(this).click(function(event) {
									
									
										if(  confirm('Do you really want to remove this set?')  ){
													
															
														$.get("<?php echo base_url(). 'index.php/main/remove_carousel_set';    ?>",{
															carousel_set_id:$(this).attr('carousel_set_id')
															},function(xml) {
															
																var status = $(xml).find('status').text();
																var message = $(xml).find('message').text();
																
																if( status == 'ok'){
																	
																	document.location.reload(true);
																	
																}else{
																
																	alert(status);	
																	
																};
								
														});	
														
														
										}
											
								});

				});	

  		});
		</script>		