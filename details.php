<?php
try{
  $conn = new PDO('mysql:host=localhost;dbname=examples', 'cit2202', 'letmein');
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}
//the id from the query string e.g. details.php?id=4
$countryId=$_GET['id'];

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
<title>Display the details for a country</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<p><a href="browseable-list.php"><<< Back to list</a></p>
<?php

//simple validation to see if we found a country
if($country){
	echo "<h1>{$country['name']}</h1>";
	echo "<p>Population: {$country['population']}</p>";
}
else
{
	echo "<p>Can't find any records.</p>";
}

?>
</body>
</html>
