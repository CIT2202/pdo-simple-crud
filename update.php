<?php
try{
  $conn = new PDO('mysql:host=localhost;dbname=cit2202', 'cit2202', 'letmein');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//This is a simple example we would normally do some form validation here

//basic form processing
$id=$_POST['id'];
$countryName=$_POST['country_name'];
$population=$_POST['population'];

$msg="";

//SQL UPDATE to change a row
$query="UPDATE countries SET name=:countryName, population=:population WHERE id=:id";
$stmt=$conn->prepare($query);
$stmt->bindValue(':id', $id);
$stmt->bindValue(':countryName', $countryName);
$stmt->bindValue(':population', $population);

if($stmt->execute()){
    $msg="<p>Successfully updated the details for {$countryName}.</p>";
}else{
    $msg="<p>There was a problem updating the data.</p>";
}

$conn=NULL;
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Update country record</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
		 <p><a href="index.php"><<< Home</a></p>
<?php
echo $msg;
?>
</body>
</html>
