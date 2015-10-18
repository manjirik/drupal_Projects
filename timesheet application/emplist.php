<?php
include_once("tblEmployeeController.php");

$empcontroller=new tblEmployeeController();

$result=$empcontroller->getEmployeeName();

//print_r($result);

//echo count($result);


?>
<html>
<body>
<center>
<table border="1"  cellspacing=8 cellpadding=8>
<tr>
 <th align="center">Sr. No.</th>
 <th align="center">Emp_fname</th>
<th align="center">Action</th>


</tr>

<?php 
  while($row = mysql_fetch_array($result))
  {
  //	print_r($row);
  	//echo $row['emp_fname'];
 var $i;
  ?>	
  <tr>
  <td align="center"><?php  echo $i=$i+1;?></td>
  <td align="center"><?php echo $row['emp_fname'];?></td>
<td align="center"><a href="viewtimesheet.php">View Time sheet</a></td>

                                 
      
 </tr>
 
     
 <?php  

 }
 ?>
</table>
</center>

</body>
</html>