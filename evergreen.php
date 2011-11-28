<?php     
	$evergreens = array(
		0 => array(
			'name' => 'name0',
			'img' => 'assets/images/VIDEO-thumbnail-size.jpg',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
			),
		1 => array(
			'name' => 'name1',
			'img' => 'assets/images/VIDEO-thumbnail-size.jpg',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
			),
		2 => array(
			'name' => 'name2',
			'img' => 'assets/images/VIDEO-thumbnail-size.jpg',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
			),
		3 => array(
			'name' => 'name3',
			'img' => 'assets/images/VIDEO-thumbnail-size.jpg',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
			),
		4 => array(
			'name' => 'name4',
			'img' => 'assets/images/VIDEO-thumbnail-size.jpg',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
			)												
	);
?>
<head>


<link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print">
<!--[if IE]><link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->

<!-- Import fancy-type plugin for the sample page. -->
<link rel="stylesheet" href="css/blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">

<link rel="stylesheet" href="css/grid.css?<?php echo rand()    ?>"  type="text/css" >
<link rel="stylesheet" href="css/custom.css?<?php echo rand()    ?>"  type="text/css" >


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.js"></script>


<script type="text/javascript" language="Javascript">
	$(document).ready(function() { 
		

					    
				    
	});
</script>
<style>
.container{
width:980px;	
}
.evergreen{
    background: url("assets/images/Evergreen_tab.png") no-repeat scroll center center transparent;
    float: left;
    height: 227px;
    margin-right: 5px;
    width: 191px;
}
.evergreen .title{
    color: white;
    font-family: san-serif;
    font-size: 14px;
    padding-left: 10px;
    padding-top: 8px;
    height: 34px;
}
.evergreen .image_div {
    padding-left: 5px;
}
.evergreen .image_div img {
    width: 181px;
}
.evergreen .content{
    height: 70px;
    overflow: hidden;
    padding-left: 15px;
    width: 165px;
    padding-top: 3px;
}
</style>
</head>
<body>
	

	<div  class='container ' >
		

		<?php foreach( $evergreens  as  $key => $evergreen){?>
		
			<div class=' evergreen'> 
				<div  class='title ' ><?php  echo  $evergreen['name']  ?>
				</div>
				<div  class='image_div ' >
					<img src='<?php   echo  $evergreen['img']   ?>'>
				</div>
				<div  class='content ' ><?php  echo  $evergreen['description']  ?>
				</div>
			</div>
		
		<?php } ?>

	</div>
</body>
