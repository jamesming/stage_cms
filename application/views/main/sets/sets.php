<style>
	
iframe#iframe_src{
width:500px;
height:250px;	
}
img#addNuSpotlightSet{
width:30px;	
margin:23px 23px 10px 23px;
}
				
				#nu_spotlight_set_outside_container{
				clear:both;
				margin:0px 20px;
				border-top:1px solid lightgray;
				border-left:1px solid lightgray;	
				border-right:1px solid lightgray;
				width:892px;
				}
				
							#nu_spotlight_set_outside_container div.row{
								width:100%;
								height:60px;
								border-bottom:1px solid lightgray;
							}
							
							
							#nu_spotlight_set_outside_container div.row .nu_spotlight_set_name_column{
								width:100px;
								padding-top:15px;
								text-align:center;
								color:gray;
							}
											#nu_spotlight_set_outside_container div.row div.thumbs_container{
												width:auto;
												margin:10px 0px 0px 10px;
											}
											
											#nu_spotlight_set_outside_container div.row div.thumbs_container div.thumb{
												width:69px;
												height:37px;
												margin-right:20px;
												border:1px dotted gray;
											}
</style>
		<img   nu_spotlight_set_id='0' href='#fancy_zoom_div' class='clearfix ' title='Add Nu Spotlight Set'  id='addNuSpotlightSet' src='<?php echo base_url()    ?>images/add.png'    />
			
  	
  	<div  id='nu_spotlight_set_outside_container'  class='clearfix '>

  		<?php foreach( $data['nu_spotlight_sets']  as  $key => $nu_spotlight_set){?>
  		
  		
  		
  				<div  class='row ' >
			
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

		
		<script type="text/javascript" language="Javascript">  
			
			$(document).ready(function() {

				$('#addNuSpotlightSet, .thumbs_container, .nu_spotlight_set_name_column').css({cursor:'pointer'}).fancyZoom().click(function(event) {

					$("#iframe_src").attr('src','<?php echo base_url();    ?>index.php/main/nu_spotlight_sets_form?nu_spotlight_set_id=' + $(this).attr('nu_spotlight_set_id')  );

				});		

  		});
		</script>		