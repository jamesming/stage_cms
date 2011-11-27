
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
//	include('brightcove_player.php');
?>
	
	
<style>
.playlist-title{
	float:left;
	border:1px solid gray;
	width:100px;
	height:20px;
	margin-right:10px;
	cursor:pointer;
}
.episodes-videos{
	border:1px solid gray; 
	width:320px; 
	height:200px; 
	overflow-y:scroll;
	background:black;
	clear:both;
}
.clips-videos{
	display:none;
}
.episodes-videos li{
    border: 0px solid white;
    clear: both;
    color: white;
    height: 78px;
    margin-bottom: 12px;    
}
.episodes-videos .img-div{
	float:left;	
	width:150px;
}
		.episodes-videos .img-div img{
		width:150px;
		height:85px;	
		}
.episodes-videos .text-div{
	float: left;
	width: 120px;
	padding-top:4px;
}	

.episodes-videos .text-div .video-name{
	padding-left:11px;
	height:54px;
}
.episodes-videos .text-div .watch-now{
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
		});	
		$('#episodes-title').click(function(event) {
			$('.episodes-videos').html(episodes_global);
		});	
		
	});
</script>
	
		<?php for( $i = 0; $i <= 1; $i++){ ?>	
		
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
					    	<?php foreach($videos[$i]['clips'] as  $video ){?>
					    	
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

		<?php } ?>
		
		
		<?php for( $i = 1; $i <= 2; $i++){ ?>	
			<div   class='clips-videos'  >
			    <ul>
		    	<?php foreach($videos[$i]['clips'] as  $video ){?>
		    	
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
		<?php } ?>
	
	
<?php if( 1==2){?>

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


<?php if( 1== 2){?>

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