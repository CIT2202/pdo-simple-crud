<?php
try{
  $conn = new PDO('mysql:host=localhost;dbname=examples', 'cit2202', 'letmein');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//select all the countries
$query = "SELECT * FROM countries";
$resultset = $conn->query($query);
$countries = $resultset->fetchAll();
$conn=NULL;

?>


<!DOCTYPE HTML>
<html>
<head>
<title>List the countries</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
	<p><a href="index.php"><<< Home</a></p>
	<h1>Update Country Details</h1>
	<p>Select a country:</p>
<form action="edit.php" method="POST">
<?php
foreach ($countries as $country) {
    echo "<p>";
    echo "<label>";
    //outputs a radio button for each country e.g. <label><input type="radio" name="country" value="2" '="">France</label>
    echo "<input type='radio' name='id' value='{$country["id"]}''>";
    echo "{$country["name"]}</label>";
    echo "</p>";
}
?>
<input type="submit">
</form>
</body>
</html>
