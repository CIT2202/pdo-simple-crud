<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=cit2202', 'cit2202', 'letmein');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}


//This is a simple example we would normally do some user input validation here

//basic form processing
$countryName=$_POST['country_name'];
$population=$_POST['population'];

//SQL INSERT for adding a new row
//Use a prepared statement to bind the values from the form
$query="INSERT INTO countries (id, name, population) VALUES (NULL,:countryName, :population)";
$stmt=$conn->prepare($query);
$stmt->bindValue(':countryName', $countryName);
$stmt->bindValue(':population', $population);

if($stmt->execute()){
    $msg="<p>Successfully added the details for {$countryName}.</p>";
}else{
    $msg="<p>There was a problem inserting the data.</p>";
}
$conn=NULL;
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Save the Country details</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<p><a href="index.php"><<< Home</a></p>

<?php
echo $msg;
?>
</body>
</html>
