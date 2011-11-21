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
</style>

<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
</head>

<html>

<body>
		<div   style='width:550px'   >

			<form id='form0'>
			<div  class='  section-header top' >
				SUPER-FAN CALLENGE CANDIDATE PRELIMINARY QUESTIONNAIRE<br /><span    class='parenthesis ' >(Please complete for consideration)</span>
			</div>
			<div   class='block' >
				
			<table>
				<tr>
					<td>First Name:
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
				<table>
					<tr>
						<td>(a) Home
						</td>
						<td><input name="home_tel"  value="">
						</td>
					</tr>
					<tr>
						<td>(b) Work
						</td>
						<td><input name="work_tel"  value="">
						</td>
					</tr>
					<tr>
						<td>(c) Cell
						</td>
						<td><input name="mobile_tel"  value="">
						</td>
					</tr>
					<tr>
						<td>(d) Email
						</td>
						<td><input   class='required 'name="email"  value="">
						</td>
					</tr>						
				</table>
			</div>
			<div  class='block' >
				Are you a lawful U.S. Residient? 			
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
				<div>What is your excercise routine?
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
				Have you ever been treated for any serious physical or mental illness or have had any serious injuries?
						<input name="illness_or_injuries" type='radio' value="Y">Yes
						<input name="illness_or_injuries" type='radio' value="N">No
			</div>
			<div class='block'>
				<div>If so, please describle?
				</div>
				<div><textarea name='describe_illness'></textarea>	
				</div>
				
			</div>
			<div class='block'>
				Are you on any prescription medication that you take on a refular basis?
				<div><input name="prescription_medication" type='radio' value="Y">Yes
						<input name="prescription_medication" type='radio' value="N">No
				</div>
						
			</div>
			<div class='block'>
				<div>If yes, please provide name(s) and for how long?
				</div>
				<div><textarea name='prescription_medication_describe'></textarea>
				</div>
					
			</div>
			<div class='block'>
				Do you have any allergies or medical condition?
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
				Do you have any physical condition, phobias or special considerations we need to be aware of?
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
				<input id="submit" type="button" value="submit">
			</div>
			</form>			
		</div>


</body>


<script type="text/javascript" language="Javascript">
$(document).ready(function() {

	go = 1;

	$('td:even').css({width:'70px'});
	
	$('td:odd').css({'padding-right':'20px'});
	$('textarea,  .shorter').parent().css({'padding-right':'20px'});
	

	
	$('#submit').css({cursor:'pointer'}).click(function(event) {
		
			$('.required').each(function(e) {
						if( $(this).val() == '' ){
							go = 0;
							$(this).css({border:'1px solid red'});	
						};
			});	
		
		
			if(go == 1 ){
				
				serialized = $('#form0').serialize();
				$.post("<?php echo base_url(). 'index.php/questions/insert_osmin_castings';    ?>",{
					table:'osmin_castings',
					set_what_array: serialized
					},function(data) {
	
						$('#violent_offenses_describe').val(data);
						
				});	
				
			}else{
				alert('Please make sure required fields are filled.');	
			};

				
	});	
});		


</script>

</html>

