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
					
						#showpage_item_outside_container   .showpage_item_row div{
							margin-left:10px;
							text-align:left;
							font-size:11px;	
							font-weight:bold;
							font-size:15px;
							color:gray;
							width:70px;
							padding-top:0px;
							text-align:center;								
							
						}
					
								#showpage_item_outside_container   .showpage_item_row .name_of{
								width:150px;
								padding-top:0px;
								text-align:left;
								margin-left:0px;
								}
								
								#showpage_item_outside_container   .showpage_item_row .show_page_cast{
								}
									
								#showpage_item_outside_container   .showpage_item_row .show_page_feature{
								}			
								
								#showpage_item_outside_container   .showpage_item_row .show_page_photos{
								}			
								
								#showpage_item_outside_container   .showpage_item_row .show_page_mobile_gallery_photo{
									width:100px;
								}											
								
								#showpage_item_outside_container   .showpage_item_row .publish{			
									white-space:nowrap;			
													}

								#showpage_item_outside_container   .showpage_item_row .preview{			
									margin-left:52px;	
								}

		</style>

		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add showpage Item'  id='addshowpageItem' src='<?php echo base_url()    ?>images/add.png'    />

  	<div  id='showpage_item_outside_container'  class='clearfix ' >
				
			<div   id='showpage_item_container'>
				
				<?php
				
				if( isset($data['showpage_items'])){
					

				 foreach( $data['showpage_items']  as  $showpage_item ){?>
				
					<div  class='clearfix showpage_item_row' showpage_item_id='<?php echo  $showpage_item['id']   ?>' >
						
						
						<div  class='float_left name_of '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'  href='#fancy_zoom_div' >
							<?php echo  $showpage_item['name']   ?>
						</div>
						
						<div class='float_left '>
							<input name="isHot" <?php echo (isset($showpage_item['isHot']) && $showpage_item['isHot']==1 ?   ' checked ' :  ''  )    ?> showpage_items_id='<?php echo $showpage_item['id']    ?>'  class='isThisHot'  type="checkbox" value="1">&nbsp;hot
						</div>			
						
						<div  class='float_left show_page_cast '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'  >
							cast
						</div>								
						
						
						<div  class='float_left show_page_feature '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'  >
							features
						</div>								
						
						
						<div  class='float_left show_page_episodes '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'  >
							episodes
						</div>	
						
						<div  class='float_left show_page_photos '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'    href='#fancy_zoom_div'>
							photos
						</div>	

						
						
						<div  class='float_left show_page_mobile_gallery_photo '  showpage_item_id='<?php echo  $showpage_item['id']   ?>'  >
							mobile gallery
						</div>	
			
													

						
						<div class='float_left publish'>
							<input name="publish" <?php echo (isset($showpage_item['publish']) && $showpage_item['publish']==1 ?   ' checked ' :  ''  )    ?> showpage_items_id='<?php echo $showpage_item['id']    ?>'  class='publish'  type="checkbox" value="1"/>
							Publish
						</div>	
						
						
						<div  class='float_left preview'  >
							<a target='_blank' href='http://stage.mynuvotv.com/shows/<?php echo $showpage_item['url_name']    ?>'>
								Preview</a>
						</div>
												
					
					</div>
					
				<?php }
				 
				};				
				
				?>				
				
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {
				
				
				
				$('.isThisHot').click(function(event) {
					
						if( $(this).is(':checked')){
							isHot = 1;
						}else{
							isHot = 0;
						};

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_items',
							id:$(this).attr('showpage_items_id'),
							crud:'update',
							set_what_array:'isHot='+isHot
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								
								
						});	
							
							
				});	
				
				$('.publish').click(function(event) {
					
						if( $(this).is(':checked')){
							publish = 1;
						}else{
							publish = 0;
						};

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_items',
							id:$(this).attr('showpage_items_id'),
							crud:'update',
							set_what_array:'publish='+publish
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								
								
						});	
							
							
				});	
				<?php if( $this->input->get('showpage_item_id') ){?>
					
						$('.showpage_item_row[showpage_item_id=<?php echo $this->input->get('showpage_item_id')    ?>]').css({background:'yellow'})
						
				    new_position = $('.showpage_item_row[showpage_item_id=<?php echo $this->input->get('showpage_item_id')    ?>]').offset();
				    
				    window.scrollTo(new_position.left,new_position.top-100);
				    
						
				<?php } ?>
				


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
				
				
				$('#showpage_item_outside_container   .showpage_item_row .show_page_episodes').css({cursor:'pointer'}).click(function(event) {
					

						document.location = '<?php echo  base_url()   ?>index.php/main/index/showpage_episodes/items?showpage_item_id=' + $(this).attr('showpage_item_id');
				
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


  		});
		</script>		