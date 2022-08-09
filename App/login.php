<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, hash('sha256',$_POST['password']));
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Please Enter Valid Email ID";
      }
   $select_users = "SELECT * FROM `register` WHERE email = '$email' AND password = '$pass'" or die('query failed');
   $res = mysqli_query($conn,$select_users);
   if(mysqli_num_rows($res) > 0){

      $row = mysqli_fetch_assoc($res);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin.php');

      }
      
      elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:verifymessage.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   <!-- custom css file link  -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap');

.message{
   position: sticky;
   top:0;
   margin:0 auto;
   max-width: 100%;
   background-color: black;
   padding: 1rem;
   display: flex;
   align-items: center;
   justify-content: space-between;
   z-index: 10000;
   gap:1.5rem;
}

.message span{
   font-size: 1rem;
   color: white;
}

.message i{
   cursor: pointer;
   color: red;
   font-size: 2.5rem;
}


    </style>


</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
   <form action="" method="post">
   <div class="col-10">
      <h3 class="m-3">Login Now</h3>
      <input type="email" name="email" placeholder="enter your email" required class="form-control m-3">
      <span style="color: red ; font-size: 20px ;"><?php if (isset($email_error)) echo $email_error; ?></span>
      <input type="password" name="password" placeholder="enter your password" required class="form-control m-3">
      <input type="submit" name="submit" value="login now" class="btn btn-info w-100 m-3">
      <p class="m-3">don't have an account? | Forgot Your Password <a href="register.php">register now</a>&ensp;  | &ensp; <a href="forgot.php">Forgot Password</a></p>
      </div>
    </form>



</body>
</html>