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
<h1>A Browseable List</h1>
<?php

//check to see if there are any results
if($countries){
	//loop over the array of countries and display their name
	foreach ($countries as $country) {
	    echo "<p>";
	    //outputs a hyperlink for each country e.g. <a href="details.php?id=2">France</a>
	    //each hyperlink has a query string  that specifies which country has been clicked on
	    echo "<a href='details.php?id={$country["id"]}'>";
	    echo "{$country['name']}";
		echo "</a>";
	    echo "</p>";
	}
}else{
	echo "No records found";
}
?>
</body>
</html>
