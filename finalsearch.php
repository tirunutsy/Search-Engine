<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<table border="0" width="50%" style="margin-left: 190px;" >

	<?php 
        error_reporting(0);
		$query1 = "select * from add_website where website_keywords like '%$search%' ";

		$data1 = mysqli_query($conn,$query1);

		while($row1 = mysqli_fetch_array($data1))
		{
			echo 
			"
				<tr>
				<td>

				<font size='5' color='#0000cc'><b><a href='$row1[1]'>$row1[0]</a></b> </font><br>" ;
				echo "<font size='4' color='#006400'>$row1[1]</font><br>";
				echo "<font size='4' color='#666666'>$row1[3]</font><br><br>

				</td>
				</tr>
			";
		}
	?>

</table>

</body>
</html>
 