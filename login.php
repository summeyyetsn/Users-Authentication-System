<?php
include("connection.php");

$email_err="";
$password_err="";

if(isset($_POST["login"])){
    
    // Email Format Validation
    if(empty($_POST["email"])){
        $email_err="Email cannot be blank!";
    }
    else{
        $email=$_POST["email"];
    }

    // Password Format Validation
    if(empty($_POST["password"])){
        $password_err="Password cannot be blank!";
    }
    else{
        $password=$_POST["password"];
    }

    if(isset($email) && isset($password)){

        $selection = "SELECT * FROM users WHERE email='$email'";
        $run = mysqli_query($connection, $selection);
        $recordCount = mysqli_num_rows($run); // ( 0 or 1 )

        if($recordCount > 0){
            $correspondingRecord = mysqli_fetch_assoc($run);
            $hashedPassword = $correspondingRecord["password"];

            if(password_verify($password, $hashedPassword)){
                session_start();
                $_SESSION["email"] = $correspondingRecord["email"];
                $_SESSION["user_name"] = $correspondingRecord["user_name"];
                
                header("location:profile.php");
            }
            else{
                echo '<div style="width:31%; margin-left:30%; margin-top:10px;" class="alert alert-danger" role="alert">
                <center><b>Password is INCORRECT!</b></center>
                
                </div>';
            }
        }
        else{
            echo '<div style="width:31%; margin-left:30%; margin-top:10px;" class="alert alert-danger" role="alert">
            <center><b>Email is INCORRECT!</b></center>
            </div>';
        }
        mysqli_close($connection);
    }
}

 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  
    <div class="container-fluit p-5"  style="margin-left:27%;">
        <div style="width: 46%;">
            <div class="card p-5" style="background-color:#B8D1E0";>
                <form action="login.php" method="POST">

                    <div><h3>Login</h3></div>
                    <br/>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control  
                        <?php 
                            if(!empty($email_err)){
                                echo "is-invalid";
                            }
                        ?>
                        id="exampleInputEmail1" name="email">
                        <div class="invalid-feedback" id="validationServer03Feedback">
                        <?php 
                        echo $email_err;
                        ?>
                    </div>
                                <br/>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control 
                        <?php 
                            if(!empty($password_err)){
                                echo "is-invalid";
                            }
                        ?>
                        id="exampleInputPassword1" name="password">
                        <div class="invalid-feedback" id="validationServer03Feedback">
                        <?php 
                        echo $password_err;
                        ?>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                    <br/><br/>
                    <div><a href="registry.php">Create an account</a></div>
                </form>
            </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>