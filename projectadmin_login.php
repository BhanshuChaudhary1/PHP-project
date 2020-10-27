<?php
session_start(); 
$con=mysqli_connect('localhost','root','','shoppingcart');


?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="css/style2.css">

    
    
    
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" action="" method="POST">
    <p><input type="text" placeholder="UserName" required name="username"></p>
    <p><input type="password" placeholder="Password" required name="pwd"></p>
    <p><input type="submit" value="Log in" name="submit1"></p>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <?php
    if(isset($_POST["submit1"]))
    {
      $res=mysqli_query($con,"select * from adminlogin where name='$_POST[username]' && password='$_POST[pwd]'");
      while($row=mysqli_fetch_array($res))
      {
        $_SESSION["admin"]=$row["name"];
        ?>
        <script type="text/javascript">
          window.location="project1.php";
        </script>
        <?php
      }
    }


    ?>
    
    
    
  </body>
</html>
