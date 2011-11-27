
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

		

</div>




</body>

</html>