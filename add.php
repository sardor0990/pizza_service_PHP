<?php 

   // if(isset($_GET['submit'])){
   //   echo $_GET['email'];
   //   echo $_GET['title'];
   //   echo $_GET['ingredients'];
   // }
    
    include('config/db_connect.php');

    $title = $email = $ingredients = '';  
    $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

  if(isset($_POST['submit'])){  

     //check email
      if(empty($_POST['email'])){
      $errors['email'] = 'An email is required <br />';
      }else{
       $email = $_POST['email'];
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'email must be a valid email address';
       }
      }

    //check title
      if(empty($_POST['title'])){
      $errors['title'] = 'An title is required <br />';
      }else{
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
          $errors['title'] = 'Title must be letters va bosh';
        }
      }

    //check ingredient
      if(empty($_POST['ingredients'])){
      $errors['ingredients'] = 'An ingredients is required <br />';
      }else{
      $ingredients = $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
       $errors['ingredients'] = 'Ingredients must comma separated';
      }
      }
   
   if(array_filter($errors)){
    // echo 'errors in form';
   }else{

     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $title = mysqli_real_escape_string($conn, $_POST['title']);
     $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

     //create sql
     $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title', '$email', '$ingredients')";

     //save to basadanix saqlash
     if (mysqli_query($conn, $sql)) {
      //success
      // echo 'form is valid';
    header('Location: index.php');
     }else{
      //error
      echo 'query error:' .mysqli_error($conn);
     }

    }
   }
 ?>

 <!DOCTYPE html>
 <html>
 <?php include('template/header.php'); ?>

 <section class="container grey-text">
  <h4 class="center">Add a pisa</h4>  
  <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <label>Your Email:</label>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
    <div class="red-text"><?php echo $errors['email']; ?></div>
    <label>Pizza Title:</label>
    <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
    <div class="red-text"><?php echo $errors['title']; ?></div>
    <label>Ingredients (comma separated):</label>
    <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
    <div class="red-text"><?php echo $errors['ingredients']; ?></div>
    <div class="center">
      <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
  </form>
 </section>

 <?php include('template/footer.php'); ?>
 </html>
