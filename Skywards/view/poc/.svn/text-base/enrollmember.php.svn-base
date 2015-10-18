<!-- Tab content -->
<div class="tabs">
	<?php include_once BASEPATH.DS."view".DS."navigation.php";; ?>
	<br /><div>
	<form name="form_vmn" method="POST" action="<?php echo SITE_URL."?r=poc/enrollmember_submit"; ?>">
		<table border="1">
			<tr>
				<th colspan="2"><b>Enroll Member</b></th>
			</tr>
			<tr>
				<th>First Name</th>
				<td><input type="text" name="fn" value="<?php echo $data['first_name'];?>"/></td>
			</tr>
			<tr>
				<th>Last Name</tg>
				<td><input type="text" name="ln" value="<?php echo $data['last_name'];?>" /></td>
			</tr>
			<tr>
				<th>Country</th>
				<td><input type="text" name="country"/></td>
			</tr>
			<tr>
				<th>Email Address</th>
				<td><input type="text" name="email" value="<?php echo $data['email'];?>" /></td>
			</tr>
			<tr>
				<th>Password</th>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<th>Which city is the hub of Emirates Airline?</th>
				<td><input type="text" name="que"/></td>
			</tr>
			<tr colspan="2">
				<th colspan="2"><input type="submit" name="submit" value="Submit"></th>
			</tr>
		</table>
	</form>
	</div>	
</div>
<!-- Tab content ends-->
<?php 
if($_POST && !empty($data)){
echo "<pre>";
print_r($data);
}
?>