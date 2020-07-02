<?php 

//ternary operators
 //$score = 50;
 // if($score>40){
 // 	echo 'high score';
 // }else{
 // 	echo 'low score :(';
 // }

  //echo $score > 40 ? 'high score' : 'low score';

  // echo $_SERVER['SERVER_NAME'];
    //echo $_SERVER['PHP_SELF'];
     //echo $_SERVER['SCRIPT_FILENAME'];

  //SESSION
  if(isset($_POST['submit'])){

  	//cookie for gender
  	setcookie('gender', $_POST['gender'], time() + 86400);
   
   session_start();

   $_SESSION['name'] = $_POST['name'];

   echo $_SESSION['name'];

  }



 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>php tuts</title>
 </head>
 <body>
 
   <!--  <p><?php echo $score > 40 ? 'high score' : 'low score'; ?></p> -->

   <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
   	<input type="text" name="name">
   	<select name="gender">
   		<option v alue="male">male</option>
   		<option value="female">female</option>
   	</select>
   	<input type="submit" name="submit" value="submit">
   </form>

 </body>
 </html>