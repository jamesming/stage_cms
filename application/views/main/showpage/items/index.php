		<style>
			
		iframe#iframe_src{
		width:850px;
		height:3120px;	
		}
			
			
		img#addshowpageItem{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#showpage_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#showpage_item_outside_container div.showpage_item_row{
					border-bottom:1px solid lightgray;
					padding:5px;
					}
								#showpage_item_outside_container   .showpage_item_row .name_of{
								width:110px;
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								text-align:center;
								color:gray;
								}
								
								#showpage_item_outside_container   .showpage_item_row .show_page_cast{
								width:110px;
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								text-align:center;
								color:gray;
								}
									
								#showpage_item_outside_container   .showpage_item_row .show_page_feature{
								width:110px;
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								text-align:center;
								color:gray;
								}			
								
								#showpage_item_outside_container   .showpage_item_row .show_page_photos{
								width:110px;
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								text-align:center;
								color:gray;
								}			
								
								#showpage_item_outside_container   .showpage_item_row .show_page_mobile_gallery_photo{
													width:110px;
													font-weight:bold;
													font-size:20px;
													padding-top:0px;
													text-align:center;
													color:gray;
													}
																						
								#showpage_item_outside_container   .showpage_item_row .show_page_android_gallery_photo{
													width:110px;
													font-weight:bold;
													font-size:20px;
													padding-top:0px;
													text-align:center;
													color:gray;
													}
																						
																
																							
								#showpage_item_outside_container   .showpage_item_row .showpage_item_trash{
								width:46px;
								padding-top:90px;
								}
								
											#showpage_item_outside_container   .showpage_item_row .showpage_item_trash img{
											width:30px;
											}	

		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add showpage Item'  id='addshowpageItem' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='showpage_item_outside_container'  class='clearfix ' >
				
			<div   id='showpage_item_container'>
				
				<?php
				
				if( isset($data['showpage_items'])){
					

				 foreach( $data['showpage_items']  as  $showpage_item ){?>
				
					<div  class='clearfix showpage_item_row'>
						
						
						<div  class='float_left name_of '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'  href='#fancy_zoom_div' >
							<?php echo  $showpage_item['name']   ?>
						</div>
						
						
						
						<div  class='float_left show_page_cast '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'  >
							cast
						</div>								
						
						
						<div  class='float_left show_page_feature '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'  >
							features
						</div>								
						
						<div  class='float_left show_page_photos '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'    href='#fancy_zoom_div'>
							photos
						</div>	

						
						
						<div  class='float_left show_page_mobile_gallery_photo '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'  >
							mobile gallery
						</div>	
			
													
						
						<div  class='float_left'  >
							<a target='_blank' href='http://stage.mynuvotv.com/shows/<?php echo $showpage_item['url_name']    ?>'>preview</a>
						</div>
						<div  class='float_left  showpage_item_trash' >
							<img src='<?php   echo base_url()  ?>images/trash.gif'   showpage_item_id='<?php echo  $showpage_item['id']   ?>' >
						</div>	

						
												
					
					</div>
					
				<?php }
				 
				};				
				
				?>				
				
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {

				$('#addshowpageItem').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_items',
							crud:'insert'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_showpage_form?showpage_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		
				
				
				$('#showpage_item_outside_container   .showpage_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {
					

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_showpage_form?showpage_item_id=' + $(this).attr('showpage_item_id')  );
				
				});		
				
				
				
				$('#showpage_item_outside_container   .showpage_item_row .show_page_cast').css({cursor:'pointer'}).click(function(event) {
					

						document.location = '<?php echo  base_url()   ?>index.php/main/index/showpage_cast/items?showpage_item_id=' + $(this).attr('showpage_item_id');
				
				});			
				
				
				$('#showpage_item_outside_container   .showpage_item_row .show_page_feature').css({cursor:'pointer'}).click(function(event) {
					

						document.location = '<?php echo  base_url()   ?>index.php/main/index/showpage_feature/items?showpage_item_id=' + $(this).attr('showpage_item_id');
				
				});							
				
				$('#showpage_item_outside_container   .showpage_item_row .show_page_photos').css({cursor:'pointer'}).click(function(event) {
					
						document.location = '<?php echo  base_url()   ?>index.php/main/index/showpage_photos/items?showpage_item_id=' + $(this).attr('showpage_item_id');
						
						// Flash will not pass through your existing PHP Session information, so if you are getting the 302 error it is likely that your application is returning the login URL to the Flash player. To resolve this issue, you could include the session information in scriptData and manage it manually in your application.
						// Using the home controller instead of the main controller since main contructor contains code to boot users that do not have sessions.
						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/home/upload_photos?showpage_item_id=' + $(this).attr('showpage_item_id')  );
				
				});		
				
				
				
				$('#showpage_item_outside_container   .showpage_item_row .show_page_mobile_gallery_photo').css({cursor:'pointer'}).click(function(event) {
					

						document.location = '<?php echo  base_url()   ?>index.php/main/index/showpage_mobile_gallery_photo/items?showpage_item_id=' + $(this).attr('showpage_item_id');
				
				});			
				
				$('#showpage_item_outside_container   .showpage_item_row .show_page_android_gallery_photo').css({cursor:'pointer'}).click(function(event) {
					

						document.location = '<?php echo  base_url()   ?>index.php/main/index/showpage_android_gallery_photo/items?showpage_item_id=' + $(this).attr('showpage_item_id');
				
				});		
				
				$('.showpage_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to delete this item?')  ){
					  	
					  	

									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'showpage_items',
										crud:'delete_showpage_item',
										showpage_item_id:$(this).attr('showpage_item_id')
										
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