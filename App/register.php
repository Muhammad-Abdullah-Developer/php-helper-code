<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, hash('sha256',$_POST['password']));
   $cpass = mysqli_real_escape_string($conn, hash('sha256',$_POST['cpassword']));


   $select_users = "SELECT * FROM `register` WHERE email = '$email' AND password = '$pass'" or die('query failed');
   $res = mysqli_query($conn,$select_users);

   if(mysqli_num_rows($res) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $reg = "INSERT INTO `register`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', 'user')" or die('query failed');
        $res1 = mysqli_query($conn,$reg);
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Yourself</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   <!-- custom css file link  -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

<style>

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

.message i:hover{
   transform: rotate(90deg);
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
   <h3 class="m-3">Register Now</h3>
      <input type="text" name="name" placeholder="enter your name" required class="form-control m-3">
      <input type="email" name="email" placeholder="enter your email" required class="form-control m-3">
      <input type="password" name="password" placeholder="enter your password" required class="form-control m-3">
      <input type="password" name="cpassword" placeholder="confirm your password" required class="form-control m-3">
      <input type="submit" name="submit" value="register now" class="btn btn-info w-100 m-3">
      <p class="m-3">Already Have An Account? <a href="login.php">login now</a></p>
</div>
    </form>



    <script>
let userBox = document.querySelector('.header .header-2 .user-box');

document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}

        </script>
</body>
</html>

