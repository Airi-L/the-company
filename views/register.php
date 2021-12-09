<?php

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <!-- <div style = "height: 100vh"> -->
      <div class="container-fluid">
            <!-- navbar -->
      </div>   
      <div class="container-fluid mt-3">
          <div class="card w-25 mt-5 m-auto">
              <div class="card-header">
                   <h3 class="text-center">REGISTER</h3>
              </div>
              <div class="card-body">
                  <form action="../actions/register.php" method="post">
                    <label for="fname">First Name</label>
                    <input type="text" name="first_name" id="firt_name" class="form-control" required autofocus>
                    <label for="lname">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" maxlength="15" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" minlength="8" required> 
                    <button type="submit" class="btn btn-success text-light mt-3 form-control" name="register">REGISTER</button>
                  </form>
              </div>
              <div class="card-footer">
                  <p class="text-center small">Registered already?<a href="../views/">Log in.</a></p>
              </div>
          </div>

          <?php
            // if(isset($_POST['register'])){
            //     $fname = $_POST['fname'];
            //     $lname = $_POST['lname'];
            //     $username = $_POST['username'];
            //     $password = md5($_POST['password']);//we need to hash the password[encrypted] md5()is a predefined function in php used for password encryption

            //     $login = insert_into_login($username,$password);

            //     if(!empty($login)){
            //         insert_into_users($fname,$lname,$login);
            //     }else{
            //         echo "error in getting login_id";
            //     }
            // }     
          ?>
      </div> 


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>