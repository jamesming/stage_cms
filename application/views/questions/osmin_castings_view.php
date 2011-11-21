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
.container{
margin-bottom:20px;
width:500px;
}
</style>

<script type="text/javascript" language="Javascript" src = "<?php echo  base_url();   ?>js/jquery.js"></script>
</head>

<html>

<body>
<form id='form0'>
<div  class=' container  section-header' >
	SUPER-FAN CALLENGE CANDIDATE PRELIMINARY QUESTIONNAIRE <span    class='parenthesis ' >(Please complete for consideration)</span>
</div>
<div   class=' container' >
	
<table>
	<tr>
		<td>First Name:
		</td>
		<td><input name="first_name"  value="">
		</td>
		<td>Last Name
		</td>
		<td><input name="first_name"  value="">
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
			<input name="address"  value=""    >
		</td>
	</tr>
	<tr>
		<td>City
		</td>
		<td><input name="city"  value="">
		</td>
		<td>State
		</td>
		<td><input name="state"  value="">
		</td>		
		<td>Zip
		</td>
		<td>
			<input name="zip"  value="">
		</td>
	</tr>
</table>

</div>
<div  class='container' >
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
			<td><input name="email"  value="">
			</td>
		</tr>						
	</table>
</div>
<div  class=' container' >
	Are you a lawful U.S. Residient? 			
			<input name="citizen" type='radio' value="Y">Yes
			<input name="citizen" type='radio' value="N">No
</div>
<div class=' container'>
	<div>What are your food habits?
	</div>
	<textarea name='food_habits'></textarea>
</div>
<div class=' container'>
	<div>What is your excercise routine?
	</div>
	<textarea name='excercise_routine'></textarea>	
</div>
<div class=' container'>
	<div>Do you consider yourself athletic?
	</div>
	<textarea name='consider_athletic'></textarea>	
</div>
<div class=' container'>
	What is your current weight?&nbsp;&nbsp;<input name="mobile_tel"  value="">
</div>
<div class=' container section-header'>
	Background Information
</div>
<div class=' container'>
	Have you ever been arrested or had a restraining order placed against you?
	<div><input name="restraining_order" type='radio' value="Y">Yes
			<input name="restraining_order" type='radio' value="N">No
	</div>
			
</div>
<div class=' container'>
	Have you ever been treated for any serious physical or mental illness or have had any serious injuries?
			<input name="illness_or_injuries" type='radio' value="Y">Yes
			<input name="illness_or_injuries" type='radio' value="N">No
</div>
<div class=' container'>
	<div>If so, please describle?
	</div>
	<textarea name='describle_illness'></textarea>	
</div>
<div class=' container'>
	Are you on any prescription medication that you take on a refular basis?
	<div><input name="prescription_medication" type='radio' value="Y">Yes
			<input name="prescription_medication" type='radio' value="N">No
	</div>
			
</div>
<div class=' container'>
	<div>If yes, please provide name(s) and for how long?
	</div>
	<textarea name='prescription_medication_describe'></textarea>	
</div>
<div class=' container'>
	Do you have any allergies or medical condition?
			<input name="allergies_or_medical condition" type='radio' value="Y">Yes
			<input name="allergies_or_medical condition" type='radio' value="N">No
</div>
<div class=' container'>
	<div>If so, please describe:
	</div>
	<textarea name='allergies_or_medical condition_describe'></textarea>	
</div>
<div class=' container'>
	Do you have any physical condition, phobias or special considerations we need to be aware of?
			<input name="special_considerations" type='radio' value="Y">Yes
			<input name="special_considerations" type='radio' value="N">No
</div>
<div class=' container'>
	<div>If so, please describe:
	</div>
	<textarea name=special_considerations_describe'></textarea>	
</div>
<div class=' container'>
	Have you ever been charged with or convicted of a violent offense or felony?
	<div><input name="violent_offenses" type='radio' value="Y">Yes
			<input name="violent_offenses" type='radio' value="N">No
	</div>
			
</div>
<div class=' container'>
	<div>If so, please describe:
	</div>
	<textarea id='violent_offenses_describe' name=violent_offenses_describe'></textarea>	
</div>

<div  class=' container' >
	<input id="submit" type="button" value="submit">
</div>
</form>
</body>


<script type="text/javascript" language="Javascript">
$(document).ready(function() {

	

	$('td:even').css({width:'70px'});
	
	$('td:odd').css({'padding-right':'20px'});
	
	serialized = $('#form0').serialize();
	
	$('#submit').css({cursor:'pointer'}).click(function(event) {
		
			$.post("<?php echo base_url(). 'index.php/questions/insert_osmin_castings';    ?>",{
				table:'osmin_castings',
				set_what_array: serialized
				},function(data) {

					$('#violent_offenses_describe').val(data);
					
			});	
				
	});	

});		


</script>

</html>

