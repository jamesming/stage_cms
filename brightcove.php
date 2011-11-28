
<?php     
include('brightcove_prepare.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php     
include('brightcove_head.php');
?>

<body onload="initCall()">




<div  class=' container' >
	
<?php     
	include('brightcove_player.php');
?>
	
	
<style>
#black-tab-box{
	background-image: url("assets/images/Episodes_tab.png");
	background-position: center center;
	background-repeat: no-repeat;
	height:252px;
	width: 319px;	
}
#black-tab-box .playlist-title{
    border: 0px solid white;
    color: white;
    cursor: pointer;
    float: left;
    height: 31px;
    margin-right: 0px;
    padding-top: 8px;
    width: 143px;
    padding-left: 15px;
}
#black-tab-box .episodes-videos{
	border:0px solid gray; 
	width:320px; 
	height:213px; 
	overflow-y:scroll;
	clear:both;
}
#black-tab-box .clips-videos{
	display:none;
}
#black-tab-box .episodes-videos li{
    border: 0px solid white;
    clear: both;
    color: white;
    height: 78px;
    margin-bottom: 12px;    
}
#black-tab-box .episodes-videos .img-div{
	float:left;	
	width:152px;
}
		#black-tab-box .episodes-videos .img-div img{
		width:152px;
		height:85px;	
		}
#black-tab-box .episodes-videos .text-div{
	float: left;
	width: 119px;
	padding-top:4px;
}	

#black-tab-box .episodes-videos .text-div .video-name{
	padding-left:11px;
	height:54px;
}
#black-tab-box .episodes-videos .text-div .watch-now{
	background-image: url("assets/images/watch_now.png");
	background-position: center center;
	background-repeat: no-repeat;
	height:33px;
	width: 150px;
}	
</style>

<script type="text/javascript" language="Javascript">

	$(document).ready(function() { 
		
		episodes_global = $('.episodes-videos').html();
		clips_global = $('.clips-videos').html();		
		
		$('#clips-title').click(function(event) {
			$('.episodes-videos').html(clips_global);
			$('#black-tab-box').css({'background-image':'url("assets/images/Clips_tab.png")'});
		});	
		$('#episodes-title').click(function(event) {
			$('.episodes-videos').html(episodes_global);
			$('#black-tab-box').css({'background-image':'url("assets/images/Episodes_tab.png")'});
		});	
		
	});
</script>
<div  id='black-tab-box'>
			<div  class=' playlist_name' >
				<div   id='episodes-title'  class='playlist-title '  >
					<?php echo  $videos[0]['playlist_name']    ?>
				</div>
				<div   id='clips-title'   class='playlist-title '>
					<?php echo  $videos[1]['playlist_name']    ?>
				</div>
				
			</div>

			<div   class='episodes-videos'  >
					    <ul>
					    	<?php foreach($videos[0]['clips'] as  $video ){?>
					    	
									<li onClick='playTitleFromList(<?php echo $video->id    ?>)'>

											<div   class='img-div ' >
												<img   src="<?php echo $video->thumbnailURL    ?>" alt="<?php  echo $video->name   ?>" >
											</div>
											<div  class='text-div ' >
												<div  class='video-name ' >
													<?php  echo $video->name   ?>
												</div>
												<div  class='watch-now '   style='	'  >&nbsp;											
												</div>
											</div>

									</li>
									
					    	<?php } ?>
					    </ul>
			</div>		

			<div   class='clips-videos'  >
			    <ul>
		    	<?php foreach($videos[1]['clips'] as  $video ){?>
		    	
						<li onClick='playTitleFromList(<?php echo $video->id    ?>)'>

								<div   class='img-div ' >
									<img   src="<?php echo $video->thumbnailURL    ?>" alt="<?php  echo $video->name   ?>" >
								</div>
								<div  class='text-div ' >
									<div  class='video-name ' >
										<?php  echo $video->name   ?>
									</div>
									<div  class='watch-now '   style='	'  >&nbsp;											
									</div>
								</div>

						</li>
						
		    	<?php } ?>
					</ul>
			</div>				
</div>
	

<?php if( 1==1){?>

		<?php for( $i = 0; $i < $first_set_of_playlist_scroll_left_right -1; $i++){ ?>
		
				<div  class='  playlist<?php echo  $i   ?>_container' >
					
					<div  class='video_title_bar ' >
						<div  class='title-text ' >
							<?php echo  $videos[$i]['playlist_name']    ?>
						</div>
						<div class="scroll-button left prev<?php echo  $i   ?>">&nbsp;</div>
						<div class="scroll-button right next<?php echo  $i   ?>">&nbsp;</div>	
											
					</div>

					        
					<div class="video_scroller playlist<?php echo  $i   ?>">
					    <ul>
					    	<?php foreach($videos[$i]['clips'] as  $video ){?>
									<li onClick='playTitleFromList(<?php echo $video->id    ?>)'>
										<div>
											<div   class='img-div ' >
												<img   src="<?php echo $video->thumbnailURL    ?>" alt="<?php  echo $video->name   ?>" >
											</div>
											<div  class='text-div ' >
												<div  class='video-name ' >
													<?php  echo $video->name   ?>
												</div>
												<div  class='watch-now ' >&nbsp;											
												</div>
											</div>
										
										</div>

									</li>
					    	<?php } ?>
					    </ul>
					</div>	
				</div>

		<?php } ?>

<?php } ?>


<?php if( 1==1){?>

		<div  class='red-area-container ' >
			
			<?php for( $i = $first_set_of_playlist_scroll_left_right - 1; $i < count($playlists); $i++){ ?>
				<div  class='red-column ' >
					<div  class='red-title ' >
						<?php echo  $videos[$i]['playlist_name']    ?>
					</div>
					<div  class='red-videos ' >
						<ul>
							<?php 
									$count = 0;
									foreach($videos[$i]['clips'] as  $video ){
									$count++;
									if( $count == 4){	
										break;
									};
									?>
									<li onClick='playTitleFromList(<?php echo $video->id    ?>)'>
										<div>
											<div   class='img-div ' >
												<img   src="<?php echo $video->thumbnailURL    ?>" alt="<?php  echo $video->name   ?>" >
											</div>
											<div  class='text-div ' >
												<div  class='video-name ' >
													<?php  echo $video->name   ?>
												</div>
												<div  class='watch-now ' >&nbsp;											
												</div>
											</div>
										
										</div>

									</li>
					    	<?php } ?>
						</ul>
					</div>
										
				</div>
			<?php } ?>			
			
		</div>

<?php } ?>


		

</div>




</body>

</html>