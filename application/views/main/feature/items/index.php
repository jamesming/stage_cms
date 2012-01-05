		<style>
			
		iframe#iframe_src{
		width:850px;
		height:1220px;	
		}
			
			
		img#addFeatureItem{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#feature_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#feature_item_outside_container div.feature_item_row{
					border-bottom:1px solid lightgray;
					padding:5px;
					}
								#feature_item_outside_container   .feature_item_row .name_of{
								
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								color:gray;
								width:350px;
								 margin-right:100px;
								}
								
								#feature_item_outside_container   .feature_item_row .feature_item_launch{
								
								font-size:30px;
								 
								 margin-right:200px;
								}								
									
											
								#feature_item_outside_container   .feature_item_row .feature_item_trash{
								
								}
								

											#feature_item_outside_container   .feature_item_row .feature_item_trash img{
											width:30px;
											}	

		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add Feature Item'  id='addFeatureItem' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='feature_item_outside_container'  class='clearfix ' >
				
			<div   id='feature_item_container'>
				
				<?php
				

				if( isset($data['feature_items'])){
					

				 foreach( $data['feature_items']  as  $feature_item ){?>
				
					<div  class='clearfix feature_item_row'>
						
						
						<div  class='float_left name_of '  feature_item_id='<?php echo  $feature_item['id']   ?>'  href='#fancy_zoom_div' >
							<?php echo  $feature_item['name']   ?>
						</div>
						<div  class='float_left feature_item_launch'   >
							<a target='_blank' href='http://stage.mynuvotv.com/features/<?php echo $feature_item['name']    ?>'>Preview</a>
						</div>	
						
						<div class='float_left '>
							<input <?php echo (isset($feature_item['publish']) && $feature_item['publish']==1?' checked ':'')    ?>  class='publish 'type="checkbox" value=""  feature_item_id='<?php echo  $feature_item['id']   ?>'>Publish
						</div>
						
						<div  class='float_left  feature_item_trash' >
							<img src='<?php   echo base_url()  ?>images/trash.gif'   feature_item_id='<?php echo  $feature_item['id']   ?>' >
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
							table:'feature_items',
							id:$(this).attr('feature_item_id'),
							crud:'update',
							set_what_array:'publish='+publish
							},function(data) {
							
								
								
								
						});	
				
				
				});	

				$('#addFeatureItem').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'feature_items',
							crud:'insert'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_feature_form?feature_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		
				
				
				$('#feature_item_outside_container   .feature_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {
					
						make_yellow($(this));

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_feature_form?feature_item_id=' + $(this).attr('feature_item_id')  );
				
				});		

				$('.feature_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to delete this item?')  ){
					  	
					  	

									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'feature_items',
										crud:'delete_feature_item',
										feature_item_id:$(this).attr('feature_item_id')
										
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