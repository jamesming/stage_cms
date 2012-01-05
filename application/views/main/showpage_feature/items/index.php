		<style>
			
		iframe#iframe_src{
		width:850px;
		height:900px;	
		}
			
			
		img#addshowpage_featureItem{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#showpage_feature_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#showpage_feature_item_outside_container div.showpage_feature_item_row{
					border-bottom:1px solid lightgray;
					padding-top:5px;
					height:80px;
					}
								#showpage_feature_item_outside_container   .showpage_feature_item_row .name_of{
								width:110px;
								font-weight:bold;
								font-size:14px;
								padding-top:0px;
								text-align:center;
								color:gray;
								}
								
											#showpage_feature_item_outside_container   .showpage_feature_item_row .order{
											width:20px;
											}								
											
				
											
								#showpage_feature_item_outside_container   .showpage_feature_item_row .showpage_feature_item_trash{
								margin-left:5px;
								width:46px;
								padding-top:0px;
								}
								
											#showpage_feature_item_outside_container   .showpage_feature_item_row .showpage_feature_item_trash img{
											width:30px;
											}	

		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add showpage_feature Item'  id='addshowpage_featureItem' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='showpage_feature_item_outside_container'  class='clearfix ' >
				
			<div   id='showpage_feature_item_container'>
				
				<?php
				
				if( isset($data['showpage_feature_items'])){
					

				 foreach( $data['showpage_feature_items']  as  $showpage_feature_item ){?>
				
					<div  class='clearfix showpage_feature_item_row'>
						
						
						<div  class='float_left name_of '  showpage_feature_item_id='<?php echo  $showpage_feature_item['id']   ?>'  href='#fancy_zoom_div' >
							<?php echo  $showpage_feature_item['name']   ?>
						</div>
						<div  class=' float_left ' >
							<input  class='order '  showpage_feature_item_id='<?php  echo $showpage_feature_item['id']   ?>' name="order" type="" value="<?php echo $showpage_feature_item['order']     ?>">
						</div>
						<div  class='float_left  showpage_feature_item_trash' >
							<img src='<?php   echo base_url()  ?>images/trash.gif'   showpage_feature_item_id='<?php echo  $showpage_feature_item['id']   ?>' >
						</div>			
					
					</div>
					
				<?php }
				 
				};				
				
				?>				
				
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {
				
				$('.order').blur(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_feature_items',
							id:$(this).attr('showpage_feature_item_id'),
							crud:'update',
							set_what_array:$(this).serialize()
							},function(data) {
							

								document.location.reload(true);
								
						});		
				});		

				$('#addshowpage_featureItem').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_feature_items',
							showpage_item_id:<?php  echo $data['showpage_item_id']   ?>,
							crud:'insert_with_showpage_id'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_showpage_feature_form?showpage_feature_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		
				
				
				$('#showpage_feature_item_outside_container   .showpage_feature_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {
					

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_showpage_feature_form?showpage_feature_item_id=' + $(this).attr('showpage_feature_item_id')  );
				
				});		

				$('.showpage_feature_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to delete this item?')  ){

									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'showpage_feature_items',
										crud:'delete_showpage_feature_item',
										showpage_feature_item_id:$(this).attr('showpage_feature_item_id')
										
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