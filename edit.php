<?php
try{
  $conn = new PDO('mysql:host=localhost;dbname=cit2202', 'cit2202', 'letmein');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//the id from the radio buttons in the form
$countryId=$_POST['id'];

//prepared statement uses the id to select a single country
$stmt = $conn->prepare("SELECT * FROM countries WHERE countries.id = :id");
$stmt->bindValue(':id',$countryId);
$stmt->execute();
$country=$stmt->fetch();
$conn=NULL;


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Edit country</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
		<p><a href="edit-list.php"><<< Back to list</a></p>
	<h1>Edit country details</h1>
<?php
//simple validation to see if we found a country
if($country){
?>

	<form action="update.php" method="POST">
	<!-- <input type="hidden"> creates a hidden text field i.e. not visible to the user
	we use it to store the id number of the selected country -->
	<input type="hidden" name="id" value="<?php echo $country["id"];?>">
	<label for="country_name">Country name:</label>
	<!-- we need to display the country's details in the form so we set the value of the HTML form controls -->
	<input type="text" id="country_name" name="country_name" value="<?php echo $country["name"];?>">
	<label for="last_name">Population:</label>
	<input type="text" id="population" name="population" value="<?php echo $country["population"];?>">
	<input type="submit" name="submitBtn" value="Save changes">
	</form>
<?php
}else{
	echo "<p>Can't find any country records.</p>";
}
?>


</body>
</html>
