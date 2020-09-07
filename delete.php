<?php
try{
  $conn = new PDO('mysql:host=localhost;dbname=cit2202', 'cit2202', 'letmein');
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//Simple validation
if(isset($_POST['ids'])){
	//the ids come from the form as an array e.g. ids=[3,6,7]
	$ids=$_POST['ids'];

	//prepared statement uses the id to delete a single student
	$stmt = $conn->prepare("DELETE FROM countries WHERE countries.id = :id");

	//loop over the array of ids to delete multiple countries
	foreach($ids as $id){
		$stmt->bindValue(':id',$id);
		$stmt->execute();
	}
	$msg="<p>Successfully deleted countries.</p>";
}else{
  $msg="<p>No countries selected.</p>";
}
$conn=NULL;

?>


<!DOCTYPE HTML>
<html>
<head>
<title>Delete Countries</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
	<p><a href="delete-list.php"><<< Back to list</a></p>

<?php
echo $msg;
?>
</body>
</html>
