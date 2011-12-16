		<style>
			
		iframe#iframe_src{
		width:850px;
		height:900px;	
		}
			
			
		img#addshowpage_episodesItem{
			width:30px;	
			margin:23px 23px 10px 23px;
			}
			
			
			#showpage_episodes_item_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
			}
			
					#showpage_episodes_item_outside_container div.showpage_episodes_item_row{
					border-bottom:1px solid lightgray;
					padding:5px;
					}
								#showpage_episodes_item_outside_container   .showpage_episodes_item_row .name_of{
								width:110px;
								font-weight:bold;
								font-size:20px;
								padding-top:0px;
								text-align:center;
								color:gray;
								}
								
	
											
								#showpage_episodes_item_outside_container   .showpage_episodes_item_row .showpage_episodes_item_trash{
								width:46px;
								padding-top:90px;
								}
								
											#showpage_episodes_item_outside_container   .showpage_episodes_item_row .showpage_episodes_item_trash img{
											width:30px;
											}	

		</style>
		<img  class='clearfix ' href='#fancy_zoom_div'  title='Add showpage_episodes Item'  id='addshowpage_episodesItem' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='showpage_episodes_item_outside_container'  class='clearfix ' >
				
			<div   id='showpage_episodes_item_container'>
				
				<?php
				
				if( isset($data['showpage_episodes_items'])){
					

				 foreach( $data['showpage_episodes_items']  as  $showpage_episodes_item ){?>
				
					<div  class='clearfix showpage_episodes_item_row'>
						
						
						<div  class='float_left name_of '  showpage_episodes_item_id='<?php echo  $showpage_episodes_item['id']   ?>'  href='#fancy_zoom_div' >
							<?php echo  $showpage_episodes_item['name']   ?>
						</div>

						<div  class='float_left  showpage_episodes_item_trash' >
							<img src='<?php   echo base_url()  ?>images/trash.gif'   showpage_episodes_item_id='<?php echo  $showpage_episodes_item['id']   ?>' >
						</div>			
					
					</div>
					
				<?php }
				 
				};				
				
				?>				
				
			</div>
		
  	</div>

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {

				$('#addshowpage_episodesItem').css({cursor:'pointer'}).fancyZoom().click(function(event) {

						$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
							table:'showpage_episodes_items',
							showpage_item_id:<?php  echo $data['showpage_item_id']   ?>,
							crud:'insert_with_showpage_id'
							},function(xml) {
							
								var status = $(xml).find('status').text();
								var message = $(xml).find('message').text();
								$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_showpage_episodes_form?showpage_episodes_item_id=' + $(xml).find('db_response').text()  );
								
						});	
				
				});		
				
				
				$('#showpage_episodes_item_outside_container   .showpage_episodes_item_row .name_of').css({cursor:'pointer'}).fancyZoom().click(function(event) {
					

						$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/get_showpage_episodes_form?showpage_episodes_item_id=' + $(this).attr('showpage_episodes_item_id')  );
				
				});		

				$('.showpage_episodes_item_trash img').css({cursor:'pointer'}).click(function(event) {


					  if(  confirm('Do you really want to delete this item?')  ){
					  	
					  	

									$.post("<?php echo base_url(). 'index.php/main/ajax_update';    ?>",{
										table:'showpage_episodes_items',
										crud:'delete_showpage_episodes_item',
										showpage_episodes_item_id:$(this).attr('showpage_episodes_item_id')
										
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