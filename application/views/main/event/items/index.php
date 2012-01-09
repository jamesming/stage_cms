		<style>
			
		iframe#iframe_src{
		width:850px;
		height:420px;	
		}
			
			
		img#addEventItem{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#event_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#event_item_outside_container div.event_item_row{
					border-bottom:1px solid lightgray;
					padding:5px;
					}
								#event_item_outside_container   .event_item_row .name_of{
								
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								color:gray;
								width:350px;
								 margin-right:100px;
								}
								
								#event_item_outside_container   .event_item_row .event_item_launch{
								
								font-size:30px;
								 
								 margin-right:200px;
								}								
									
											
								#event_item_outside_container   .event_item_row .event_item_trash{
								
								}
								

											#event_item_outside_container   .event_item_row .event_item_trash img{
											width:30px;
											}	

		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add Feature Item'  id='addEventItem' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='event_item_outside_container'  class='clearfix ' >
				
			<div   id='event_item_container'>
				
				<?php
				

				if( isset($data['event_items'])){
					

				 foreach( $data['event_items']  as  $event_item ){?>
				
					<div  class='clearfix event_item_row'>
						
						
						<div  class='float_left name_of '  event_item_id='<?php echo  $event_item['id']   ?>'  href='#fancy_zoom_div' >
							<?php echo  $event_item['name']   ?>
						</div>
						<div  class='float_left event_item_launch'   >
							<a target='_blank' href='http://stage.mynuvotv.com/nu-voices'>Preview</a>
						</div>	
						
						<div class='float_left '>
							<input <?php echo (isset($event_item['publish']) && $event_item['publish']==1?' checked ':'')    ?>  class='publish 'type="checkbox" value=""  event_item_id='<?php echo  $event_item['id']   ?>'>Publish
						</div>
						
						<div  class='float_left  event_item_trash' >
							<img src='<?php   echo base_url()  ?>images/trash.gif'   event_item_id='<?php echo  $event_item['id']   ?>' >
						</div>			
				
					</div>
					
				<?php }
				 
				};				
				
				?>
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript"> 
						
			
			function make_yellow(dom_ele){
				
				dom_ele.parent().parent().children().css({background:'white'})
				
				
		    new_position = dom_ele.parent().offset();
		    
		    window.scrollTo(new_position.left,new_position.top-100);
				
				
				dom_ele.parent().css({background:'yellow'})
				
			}
			 
			
			$(document).ready(function() {


				$('.publish').click(function(event) {
				
						if( $(this).is(':checked')){
							publish = 1;
						}else{
							publish = 0;
						};
						
						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'event_items',
							id:$(this).attr('event_item_id'),
							crud:'update',
							set_what_array:'publish='+publish
							},function(data) {
							
								
								
								
						});	
				
				
				});	

				$('#addEventItem').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'event_items',
							crud:'insert'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_event_form?event_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		

				
				$('#event_item_outside_container   .event_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {
				
						make_yellow($(this));

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_event_form?event_item_id=' + $(this).attr('event_item_id')  );
				
				});		

				$('.event_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to delete this item?')  ){
					  	

						
									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'event_items',
										id:$(this).attr('event_item_id'),
										crud:'update',
										set_what_array:'deactivate=1'
										},function(xml) {
										
			
											var db_response = $(xml).find('db_response').text();								
											alert('deactivated on: '+db_response );
											
											window.location.reload(true);
											
									});	
			    
					  }

					
					
				});	

  		});
  		
		</script>		