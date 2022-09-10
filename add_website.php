<!DOCTYPE html>
<html>
<head>
	<title>Search Engine Inserting Web Data</title>

<style>
	input
	{
		width: 600px;
		height: 30px;
		font-size: 20px;
	}
	#addbtn
	{
		width: 150px;
		height: 35px;
		color: green;
		border: 1px solid green;
		background-color: white;
		border-radius: 5px;
		font-size: 18px;
	}
	#addbtn:hover
	{
		background-color: green;
		color: white;
	}
	#cancelbtn
	{
		width: 150px;
		height: 35px;
		color: red;
		border: 1px solid red;
		background-color: white;
		border-radius: 5px;
		font-size: 18px;
	}
	#cancelbtn:hover
	{
		background-color: red;
		color: white;
	}
</style>

</head>
<body>

<font size="7"><p align="center" style="color: #281C2D" ><b>Add Websites Data</b></p></font>

<form action="" method="POST" enctype="multipart/form-data">

	<table border="0" width="60%" cellspacing="10" align="center">
	<tr>
		<td width="25%"><b>Website Title</b></td>
		<td><input type="text" name="websitetitle"></td>
	</tr>
	<tr>
		<td><b>Website Link</b></td>
		<td><input type="text" name="websitelink"></td>
	</tr>
	<tr>
		<td><b>Website Keywords</b></td>
		<td><input type="text" name="websitekeywords"></td>
	</tr>
	<tr>
		<td><b>Website Description</b></td>
		<td><textarea cols="83" rows="5" name="websitedescription"></textarea></td>
	</tr>
	<br>
	
	<tr>
		<td><b>Website Images</b></td>
		<td><input type="file" name="uploadfile"></td>
		
	</tr>
	<tr>
		<td colspan="2" align="center" style="height: 100px;"><input type="submit" name="addwebsite" value="Insert Data" id="addbtn">
			&nbsp &nbsp &nbsp
		<input type="submit" name="cancel" value="Cancel" id="cancelbtn">	
		</td>
	</tr>
</table>
</form>

</body>
</html>


<?php
include("connection.php");
error_reporting(0);
if($_POST['addwebsite'])
{
			$website_title=$_POST['websitetitle'];
			$website_link=$_POST['websitelink'];
			$website_keywords=$_POST['websitekeywords'];
			$website_description=$_POST['websitedescription'];
			
			$filename=$_FILES["uploadfile"]["name"];
			$tempname=$_FILES["uploadfile"]["tmp_name"];
			
			$folder = "website_images/".$filename;
			move_uploaded_file($tempname,$folder);

			if($website_title!="" && $website_link!="" && $website_keywords!="" && $website_description!="" && $filename!="")
			{ 
					$query="INSERT INTO add_website VALUES ('$website_title','$website_link','$website_keywords','$website_description','$folder')";
					$data = mysqli_query($conn,$query);
					
					if($data)
					{
						echo "<script>alert('Inserted Web Data Succesfully')</script>";
					}
			}
					else
					{
						echo "<script>alert('Failed to Insert Web Data')</script>";
					}
					
}
?>
