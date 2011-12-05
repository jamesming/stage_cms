		<style>
			
		iframe#iframe_src{
		width:850px;
		height:950px;	
		}
			
			
		img#addshowpage_mobile_gallery_photoItem{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#showpage_mobile_gallery_photo_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#showpage_mobile_gallery_photo_item_outside_container div.showpage_mobile_gallery_photo_item_row{
					border-bottom:1px solid lightgray;
					padding:5px;
					}
								#showpage_mobile_gallery_photo_item_outside_container   .showpage_mobile_gallery_photo_item_row .name_of{
								width:110px;
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								text-align:center;
								color:gray;
								}
								
	
											
								#showpage_mobile_gallery_photo_item_outside_container   .showpage_mobile_gallery_photo_item_row .showpage_iphone_gallery_photo_item_trash{
								width:46px;
								padding-top:90px;
								}
								
											#showpage_mobile_gallery_photo_item_outside_container   .showpage_mobile_gallery_photo_item_row .showpage_iphone_gallery_photo_item_trash img{
											width:30px;
											}	
											
											
											#showpage_mobile_gallery_photo_item_outside_container   .showpage_mobile_gallery_photo_item_row div input.order,
											#showpage_mobile_gallery_photo_item_outside_container   .showpage_mobile_gallery_photo_item_row div input.show_on_showpage{
											width:20px;
											}	
		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add showpage_mobile_gallery_photo Item'  id='addshowpage_mobile_gallery_photoItem' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='showpage_mobile_gallery_photo_item_outside_container'  class='clearfix ' >
				
			<div   id='showpage_iphone_gallery_photo_item_container'>
				
				<?php
				
				if( isset($data['showpage_mobile_gallery_photo_items'])){
					

				 foreach( $data['showpage_mobile_gallery_photo_items']  as  $showpage_mobile_gallery_photo_item ){?>
				
					<div  class='clearfix showpage_mobile_gallery_photo_item_row'>
						
						
						<div  class='float_left name_of '  showpage_mobile_gallery_photo_item_id='<?php echo  $showpage_mobile_gallery_photo_item['id']   ?>'  href='#fancy_zoom_div' >
							open
						</div>
						
						
						<div  class='float_left ' >
							open
						</div>

						<div  class='float_left  showpage_iphone_gallery_photo_item_trash' >
							<img src='<?php   echo base_url()  ?>images/trash.gif'   showpage_mobile_gallery_photo_item_id='<?php echo  $showpage_mobile_gallery_photo_item['id']   ?>' >
						</div>			
					
					</div>
					
				<?php }
				 
				};				
				
				?>				
				
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {
				
				
				$('.show_on_showpage').click(function(event) {
					
						if( $(this).is(':checked')){
							show_on_showpage = 1;
						}else{
							show_on_showpage = 0;
						};

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_mobile_gallery_photo_items_images',
							id:$(this).attr('showpage_mobile_gallery_photo_items_image_id'),
							crud:'update',
							set_what_array:'show_on_showpage='+show_on_showpage
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								
								
						});	
							
							
				});	
				
			
				$('#addshowpage_mobile_gallery_photoItem').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_mobile_gallery_photo_items',
							showpage_item_id:<?php  echo $data['showpage_item_id']   ?>,
							crud:'insert_with_showpage_id'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_showpage_mobile_gallery_mobile_form?showpage_mobile_gallery_photo_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		
				
				
				$('#showpage_mobile_gallery_photo_item_outside_container   .showpage_mobile_gallery_photo_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {
					

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_showpage_mobile_gallery_mobile_form?showpage_mobile_gallery_photo_item_id=' + $(this).attr('showpage_mobile_gallery_photo_item_id')  );
				
				});		

				$('.showpage_mobile_gallery_photo_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to delete this item?')  ){
					  	
					  	

									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'showpage_mobile_gallery_photo_items',
										crud:'delete_showpage_mobile_gallery_photo_item',
										showpage_mobile_gallery_photo_item_id:$(this).attr('showpage_mobile_gallery_photo_item_id')
										
										},function(xml) {
										
											var db_response = $(xml).find('db_response').text();
										
											if( db_response == 'ok'){
												document.location.reload(true);
											}else{
												alert(db_response);
											};
										
											
											
									});						    
					  }

					
					
				});	

  		});
		</script>		