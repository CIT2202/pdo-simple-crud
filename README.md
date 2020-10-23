# CRUD Examples using a single database table
These examples demonstrate the use of PDO to implement CRUD functionality for a simple web application. To run these examples:
* Download this repository and unzip it.
* In phpmyadmin execute the sql commands in [countries.sql](countries.sql). This will set up the countries table.
* In the PHP code change the connection settings to match your database i.e. wherever there is line such as
```
$conn = new PDO('mysql:host=localhost;dbname=cit2202', 'cit2202', 'letmein');
```
You will need to change the values of the database name, username and password to match the ones you have set up using phpmyadmin.
