<?php     

$myshows = array(
	0 => array(
		'name' => 'Adrenalina',
		'link' => '/series/adrenalina'
	),
	1 => array(
		'name' => 'Chicago Hope',
		'link' => '/series/chicago-hope'
	),
	2 => array(
		'name' => "Cristina's Court",
		'link' => 'testlink'
	),
	3 => array(
		'name' => 'Curvy Girls',
		'link' => '/series/curvygirls'
	),
	4 => array(
		'name' => 'Dark Angel',
		'link' => '/series/dark-angel'
	),
	5=> array(
		'name' => 'Fame',
		'link' => '/series/fame'
	),
	6 => array(
		'name' => "Hill Street Blues",
		'link' => '/series/hill-street-blues'
	),
	7 => array(
		'name' => 'In Living Color',
		'link' => '/series/in-living-color'
	),
	8 => array(
		'name' => 'L.A. Law',
		'link' => '/series/la-law'
	),

	9 => array(
		'name' => 'Latino 101 Season 1',
		'link' => '/series/latino-101-s1'
	),
	10=> array(
		'name' => 'Latino 101 Season 2',
		'link' => '/series/latino-101-s2'
	),
	11 => array(
		'name' => "LA Ink",
		'link' => '/shows/la-ink'
	),
	12 => array(
		'name' => 'Miami Ink',
		'link' => '/series/miami-ink'
	),
	13=> array(
		'name' => 'Mission Menu',
		'link' => '/series/mission-menu'
	),	
	14=> array(
		'name' => 'Model Latina L.A.',
		'link' => '/series/model-latina-la'
	),
	15=> array(
		'name' => 'Model Latina Las Vegas',
		'link' => '/model-latina-las-vegas'
	),

	16 => array(
		'name' => 'Model Latina Miami',
		'link' => '/series/model-latina-miami'
	),
	17 => array(
		'name' => 'Model Latina NYC',
		'link' => '/series/model-latina-nyc'
	),
	18=> array(
		'name' => 'New York Undercover',
		'link' => '/series/new-york-undercover'
	),	
	19=> array(
		'name' => 'NYPD Blue',
		'link' => '/series/nypd-blue'
	),
	20 => array(
		'name' => "Operation Osmin",
		'link' => '/shows/operation-osmin'
	),
	21 => array(
		'name' => 'Pastport Argentina',
		'link' => '/series/pastport-argentina'
	),
	22 => array(
		'name' => 'Pastport Colombia',
		'link' => '/series/pastport-colombia'
	),
	23=> array(
		'name' => 'Pastport Cuba',
		'link' => '/series/pastport-cuba'
	),
	24 => array(
		'name' => 'Pastport Panama',
		'link' => '/series/pastport-panama'
	),	
	25 => array(
		'name' => "Pastport Puerto Rico",
		'link' => '/series/pastport-puerto-rico'
	),
	26 => array(
		'name' => 'Pastport Venezuela',
		'link' => '/series/pastport-venezuela'
	),
	27 => array(
		'name' => 'Prison Break',
		'link' => '/series/prison-break'
	)
);
?>

<style>
.showlist_container #logo_img_div,
.showlist_container .col{
 float:left;
}
.showlist_container #logo_img_div{
 float:left;
 margin-right:25px;
}
.showlist_container ul{
	text-align:left;
	padding:0px 0px 0px 0px;
	margin:0px 25px 0px 0px;
}
.showlist_container li{
	list-style-type: none;
}
.showlist_container li a{
	color:black;
	text-decoration:none;
	font-family: sans-serif;
	font-size:12px;
	font-weight:bold;
}
</style>

<div  class='showlist_container ' >
	
		<div  id='logo_img_div'>
			<img src='assets/images/nu_shows_title.png'>
		</div>
		
		<?php     
		$from = 0;
		$to = 6;
		for($col = 0 ; $col <= 4; $col ++){
		
		?>
		
				<div  class='col '  >
					<ul   >
						<?php for($i=$from; $i < $to; $i++){ ?>
							
							<li><a href='<?php  echo ( isset($myshows[$i]['link'] ) ? $myshows[$i]['link']:'' )      ?>'><?php echo ( isset($myshows[$i]['name'] ) ? $myshows[$i]['name']:'' )    ?></a></li>
						
						<?php }; ?>
					</ul>		
				</div>
		
		<?php 
			$from =  $from + 6;
			$to = $to + 6;
		} ?>
</div>



