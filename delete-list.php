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
  <h1>Delete Countries</h1>
  <p>Select countries:</p>
<form action="delete.php" method="POST">
<?php
foreach ($countries as $country){
    echo "<p>";
    echo "<label>";
    //outputs a checkbox button for each countryg. <label><input type="checkbox" name="ids[]" value="5" '="">Sunil Laxman</label>
    echo "<input type='checkbox' name='ids[]' value='{$country["id"]}'>";
    echo "{$country["name"]}";
    echo "</label>";
    echo "</p>";
}
?>
<input type="submit">
</form>

</body>
</html>
