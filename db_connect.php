<?php  
//conect to database
$conn = mysqli_connect('localhost', 'shaun', 'test1234','ninja_pizza');

//check connection
if(!$conn){
	echo 'Connnection error:' . mysql_connect_error();
	 
}
?>