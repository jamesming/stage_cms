<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php     	$this->load->view('header/blueprint_css.php');  ?>
<?php     	$this->load->view('header/common_css.php');  ?>
<style>
body{
background:white;	
}
input{
width:100%;
}
input[type=radio]{
width:20px;
}
input[type=file]{
width:100px;
}
input[type=button]{
width:60px;
}
textarea{
width:100%;
height:120px;	
}
.parenthesis{
font-weight:normal;
text-transform:none;
font-style:italic;	
}
.section-header{
margin-top:50px;
text-transform:uppercase;	
font-weight:bold;
font-size:14px;
margin-bottom:10px;
}
.block{
margin-bottom:20px;
}
.top{
margin-top:0px;
}
table.pdf{
width:350px;	
}
table.pdf td{

}
.upload{
color:blue;
font-weight:bold;
text-decoration:underline;
cursor:pointer;	
}

</style>

<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo  base_url();   ?>js/jquery.scrollTo-min.js"></script>

</head>

<html>

<body>
<div id="very_top"><div>
<br /><br />
<table  class='pdf '  >
	<tr>
		<td align='right'>
			<a target='_blank' href='http://www.mynuvotv.com/assets/pdf/ml_casting.pdf	'>
					<img src='http://www.mynuvotv.com/assets/images/pdf.gif'/></a>
		</td>
		<td><a  target='_blank' href='http://www.mynuvotv.com/assets/pdf/OPERATION_OSMIN_OPEN_CASTING_CALL_GUIDELINES.pdf	'><b>See Casting Guidelines for full details.</b></a>
	
		</td>
	</tr>
</table>
	

	
	<br />
	
	
	<br />

	
		<div   style='width:630px'   >

			<form id='form0'  
				name='form0' 
				action='<?php echo  base_url();   ?>index.php/questions/insert_model_latinas_castings' 
				method='post' 
				enctype='multipart/form-data' >
				

				
				
			<div  class='  section-header top' >
				MODEL LATINA 5 CASTING FORM<br /><span    class='parenthesis ' ><small>(Please complete for consideration.  Required fields denoted by *)</small></span>
			</div>
			<div   class='block' >
				
			<table>
				<tr>
					<td>First Name *
					</td>
					<td><input  class='required '  name="first_name"  value="">
					</td>
					<td>Last Name *
					</td>
					<td ><input  class='required ' name="last_name"  value="">
					</td>
					<td>&nbsp;
					</td>
					<td>
&nbsp;
					</td>
				</tr>
				<tr>
					<td>Address *
					</td>
					<td colspan=100 >
						<input  class='required ' name="address"  value=""    >
					</td>
				</tr>
				<tr>
					<td>City *
					</td>
					<td><input  class='required ' name="city"  value="">
					</td>
					<td>State *
					</td>
					<td><input  class='required ' name="state"  value="">
					</td>		
					<td>Zip *
					</td>
					<td>
						<input  class='required ' name="zip"  value="">
					</td>
				</tr>
			</table>
			
			</div>
			<div  >

				<div>
					<div   >
						<table  id='contact_info_type'>
							<tr>
								<td  class='shorten-td ' >(a) Home
								</td>
								<td>
									<input name="home_tel"  value="">
								</td>
								<td >
									Upload Picture/Video *
								</td>
								<td><input  id='select_file' type="file" name="Filedata"   />
									
								</td>
							</tr>
							<tr>
								<td class='shorten-td '>
									(b) Work
								</td>
								<td>
									<input name="work_tel"  value="">
								</td>
								<td>
								</td>		
								<td>and/or
								</td>								
							</tr>
							<tr>
								<td class='shorten-td '>
									(c) Cell
								</td>
								<td>
									<input name="mobile_tel"  value="">
								</td>
								<td>
									Link to Video Online:&nbsp;
								</td>		
								<td><input name="video_link" id="video_link" type="" value="http://">
								</td>								
							</tr>
							<tr>
								<td class='shorten-td '>
									(d) Email  *
								</td>
								<td>
									<input   class='required 'name="email"  value="">
								</td>
								<td>
									
								</td>		
								<td>&nbsp;
								</td>									
							</tr>						
						</table>
					</div>

				</div>

			</div>
			<div  class='clearfix '   >
				
				

				
			</div>
			<div  class='block' >
				<input   style='visibility:hidden'  onclick=submitnow() id="submit" type="button" value="submit">
				<input   style='visibility:hidden'  id="really_submit" type="submit" value="submit">
			</div>
		
			</form>			
		</div>

		<input   style='visibility:hidden' onclick="$('body').scrollTo( $('#very_top'), 		1000 )" type="button" value="scroll">


</body>


<script type="text/javascript" language="Javascript">
	
function submitnow(){
	
			go = 1;
			item_entered_for_upload = 0;
			
			count = 0;
			$('.either_or').each(function(e) {
						if( $(this).val() == '' ){
							count++;
						};
			});	

			$('.required').each(function(e) {
						if( $(this).val() == '' ){
							go = 0;
							$(this).css({border:'1px solid red'});	
						};
			});	
			
			if( $('#select_file').val() != '' 
			){
						item_entered_for_upload = 1;
			};
			
			if( $('#video_link').val() != 'http://'
			){
						item_entered_for_upload = 1;
			};			
			
			if( item_entered_for_upload == 0){
				
				$('#video_link, #select_file').css({border:'1px solid red'});	
				
			};
			
			if(go == 1 && item_entered_for_upload == 1 ){
				$('#really_submit').click();

			}else{
				alert('Please make sure required fields are filled.');	
			};
}
	
$(document).ready(function() {



	$('td:even').css({width:'70px'});
	
	$('td:odd').css({'padding-right':'20px'});
	$('textarea,  .shorter').parent().css({'padding-right':'20px'});
	
	$('table#contact_info_type input').css({width:'120px'});
	$('table#contact_info_type input[type=file]').css({width:'220px'});
	$('table#contact_info_type input#video_link').css({width:'220px'});
	
	$('table#contact_info_type td.shorten-td').css({width:'70px'});
	$('table#contact_info_type td.shorten-td').next().css({width:'60px'});
	$('table#contact_info_type td.shorten-td').next().next().css({width:'126px'});
	

});		


</script>

</html>

