<?php
include("connection.php");

$username_err="";
$email_err="";
$password_err="";
if(isset($_POST["signUp"])){

    // UserName Format Validation
    if(empty($_POST["userName"])){
        $username_err="Username cannot be blank!";
    }
    else if(strlen($_POST["userName"])<6){  
        $username_err="Username cannot be shorter than 6 characters!";
    }
    else{
        $userName=$_POST["userName"];
    }
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
    else if(strlen($_POST["password"])<8){
        $password_err="Password cannot be shorter than 8 characters!";
    }
    else if(!preg_match('@[A-Z]@', $_POST["password"])){
        $password_err="Password must contain at least one capital letter!";
    }
    else if(!preg_match('@[a-z]@', $_POST["password"])){
        $password_err="Password must contain at least one lowercase letter!";
    }
    else if(!preg_match('@[0-9]@', $_POST["password"])){
        $password_err="Password must contain at least one number!";
    }
    else if(!preg_match('/[^\w]/', $_POST["password"])){
        $password_err="Password must contain at least one special character!";
    }
    else{
        $password=password_hash($_POST["password"],PASSWORD_BCRYPT);
        $password_err = "";
    }
    
    if(isset($userName) && isset($email) && isset($password) && empty($password_err)){
        $insert="INSERT INTO users (user_name, email, password) VALUES ('$userName','$email','$password')";
        $runInsert = mysqli_query($connection, $insert);

        if($runInsert){
            echo '<div style="width:31%; margin-left:30%; margin-top:30px;" class="alert alert-success" role="alert">
            Registration added successfully
        </div>';
        }
        else{
            echo '<div style="width:31%; margin-left:30%; margin-top:30px;" class="alert alert-danger" role="alert">
            An error occurred while adding the record!
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
    <title>Member Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <div class="container-fluit p-5" style="margin-left:27%;">
    <div style="width: 46%;">
        <div class="card p-5" style="background-color:#B8D1E0">
            <form action="registry.php" method="POST">
                <div><h3>Sign Up</h3></div>
                <br/>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                    <input type="text" class="form-control  
                    <?php 
                        if(!empty($username_err)){
                            echo "is-invalid";
                        }
                    ?>
                    id="exampleInputEmail1" name="userName">
                    <div class="invalid-feedback" id="validationServer03Feedback">
                    <?php 
                    echo $username_err;
                    ?>
                    </div>
                </div>

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
                <button type="submit" class="btn btn-primary" name="signUp">Sign Up</button>
                <br/><br/>
                <div><a href="login.php">I already have an account</a></div>
            </form>
        </div>
    </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>