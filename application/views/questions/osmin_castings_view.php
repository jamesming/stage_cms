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
width:120px;
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
			<a target='_blank' href='http://www.mynuvotv.com/assets/pdf/OPERATION_OSMIN_OPEN_CASTING_CALL_GUIDELINES.pdf	'>
					<img src='http://www.mynuvotv.com/assets/images/pdf.gif'/></a>
		</td>
		<td><a  target='_blank' href='http://www.mynuvotv.com/assets/pdf/OPERATION_OSMIN_OPEN_CASTING_CALL_GUIDELINES.pdf	'><b>See Open Casting Guidelines for full details.</b></a>
	
		</td>
	</tr>
</table>
	

	
	<br />
	
	
	<br />

	
		<div   style='width:630px'   >

			<form id='form0'  
				name='form0' 
				action='<?php echo  base_url();   ?>index.php/questions/insert_osmin_castings' 
				method='post' 
				enctype='multipart/form-data' >
				
			<div  class='  section-header top' >
				ENTER CODES<br /><span    class='parenthesis ' ></span>
			</div>
		<div>
			<table>
			<tr>
				<td>Code 1
				</td>
				<td><input  class='codes_inputs '  name="code1" type="" value="">
				</td>
				<td>Code 6
				</td>
				<td><input  class='codes_inputs '  name="code6" type="" value="">
				</td>
			</tr>
			<tr>
				<td>Code 2
				</td>
				<td><input  class='codes_inputs '  name="code2" type="" value="">
				</td>
				<td>Code 7
				</td>
				<td><input  class='codes_inputs '  name="code7" type="" value="">
				</td>
			</tr>	
			<tr>
				<td>Code 3
				</td>
				<td><input  class='codes_inputs '  name="code3" type="" value="">
				</td>
				<td>Code 8
				</td>
				<td><input  class='codes_inputs '  name="code8" type="" value="">
				</td>
			</tr>
			<tr>
				<td>Code 4
				</td>
				<td><input  class='codes_inputs '  name="code4" type="" value="">
				</td>
				<td>Code 9
				</td>
				<td><input  class='codes_inputs '  name="code9" type="" value="">
				</td>
			</tr>	
			<tr>
				<td>Code 5
				</td>
				<td><input  class='codes_inputs '  name="code5" type="" value="">
				</td>
				<td>Code 10
				</td>
				<td><input  class='codes_inputs '  name="code10" type="" value="">
				</td>
			</tr>				
			
		</table>
		<br /><br />
		</div>
				
				
			<div  class='  section-header top' >
				SUPER-FAN CHALLENGE CANDIDATE PRELIMINARY QUESTIONNAIRE<br /><span    class='parenthesis ' >(Please complete for consideration.)</span>
			</div>
			<div   class='block' >
				
			<table>
				<tr>
					<td>First Name
					</td>
					<td><input  class='required '  name="first_name"  value="">
					</td>
					<td>Last Name
					</td>
					<td><input  class='required ' name="last_name"  value="">
					</td>
					<td>Gender
					</td>
					<td>
						<input name="gender" type='radio' value="M">M
						<input name="gender" type='radio' value="F">F
					</td>
				</tr>
				<tr>
					<td>Address
					</td>
					<td colspan=100 >
						<input  class='required ' name="address"  value=""    >
					</td>
				</tr>
				<tr>
					<td>City
					</td>
					<td><input  class='required ' name="city"  value="">
					</td>
					<td>State
					</td>
					<td><input  class='required ' name="state"  value="">
					</td>		
					<td>Zip
					</td>
					<td>
						<input  class='required ' name="zip"  value="">
					</td>
				</tr>
			</table>
			
			</div>
			<div  >
				<div  class='   section-header' >Contact Information:
				</div>
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
									Upload Picture/Video
								</td>
								<td><input  class='required ' id='select_file' type="file" name="Filedata"   />
									
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
								<td>&nbsp;
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
									Link for video online:&nbsp;
								</td>		
								<td><input name="video_link" id="video_link" type="" value="http://">
								</td>								
							</tr>
							<tr>
								<td class='shorten-td '>
									(d) Email
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
			<div  class='clearfix '   ><br />
			</div>
			<div  class='block' >
				Are you a lawful U.S. resident? 			
						<input name="citizen" type='radio' value="Y">Yes
						<input name="citizen" type='radio' value="N">No
			</div>
			<div class='block'>
				<div>What are your food habits?
				</div>
				<div><textarea name='food_habits'></textarea>
				</div>
				
			</div>
			<div class='block'>
				<div>What is your exercise routine?
				</div>
				<div><textarea name='excercise_routine'></textarea>	
				</div>
				
			</div>
			<div class='block'>
				<div>Do you consider yourself athletic?
				</div>
				<div><textarea name='consider_athletic'></textarea>	
				</div>
				
			</div>
			<div class='block'>
				What is your current weight?
				<div><input  class='shorter ' name="weight"  value="">
				</div>
				
			</div>
			<div class=' section-header'>
				Background Information
			</div>
			<div class='block'>
				Have you ever been arrested or had a restraining order placed against you?
				<div><input name="restraining_order" type='radio' value="Y">Yes
						<input name="restraining_order" type='radio' value="N">No
				</div>
						
			</div>
			<div class='block'>
				Have you ever been treated for any serious physical or mental illness or had any serious injuries?<br />
						<input name="illness_or_injuries" type='radio' value="Y">Yes
						<input name="illness_or_injuries" type='radio' value="N">No
			</div>
			<div class='block'>
				<div>If so, please describe:
				</div>
				<div><textarea name='describe_illness'></textarea>	
				</div>
				
			</div>
			<div class='block'>
				Are you on any prescription medication that you take on a regular basis?
				<div><input name="prescription_medication" type='radio' value="Y">Yes
						<input name="prescription_medication" type='radio' value="N">No
				</div>
						
			</div>
			<div class='block'>
				<div>If yes, please provide name(s) and for how long:
				</div>
				<div><textarea name='prescription_medication_describe'></textarea>
				</div>
					
			</div>
			<div class='block'>
				Do you have any allergies or medical conditions:
						<input name="allergies_or_medical_condition" type='radio' value="Y">Yes
						<input name="allergies_or_medical_condition" type='radio' value="N">No
			</div>
			<div class='block'>
				<div>If so, please describe:
				</div>
				<div><textarea name='allergies_or_medical_condition_describe'></textarea>	
				</div>
				
			</div>
			<div class='block'>
				Do you have any physical conditions, phobias or special considerations that should be mentioned here?<br />
						<input name="special_considerations" type='radio' value="Y">Yes
						<input name="special_considerations" type='radio' value="N">No
			</div>
			<div class='block'>
				<div>If so, please describe:
				</div>
				<div><textarea name='special_considerations_describe'></textarea>	
				</div>
				
			</div>
			<div class='block'>
				Have you ever been charged with or convicted of a violent offense or felony?
				<div><input name="violent_offenses" type='radio' value="Y">Yes
						<input name="violent_offenses" type='radio' value="N">No
				</div>
						
			</div>
			<div class='block'>
				<div>If so, please describe:
				</div>
				<div><textarea id='violent_offenses_describe' name='violent_offenses_describe'></textarea>
				</div>
					
			</div>
			
			<div  class='block' >
				<input   style='visibility:visible'  onclick=submitnow() id="submit" type="button" value="submit">
				<input   style='visibility:hidden'  id="really_submit" type="submit" value="submit">
			</div>
			</form>			
		</div>

		<input   style='visibility:hidden' onclick="$('body').scrollTo( $('#very_top'), 		1000 )" type="button" value="scroll">


</body>


<script type="text/javascript" language="Javascript">
	
function submitnow(){
			go = 1;
			$('.required').each(function(e) {
						if( $(this).val() == '' ){
							go = 0;
							$(this).css({border:'1px solid red'});	
						};
			});	
			
			
			
			if(go == 1 ){

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
	$('table#contact_info_type td.shorten-td').next().next().css({width:'120px'});
	

});		


</script>

</html>

