<?php
session_start();

include("connection.php");
    include("function.php");

//; <! check if user is logged in, $con is connection >
if($_SERVER['REQUEST_METHOD'] == "POST") //CHECK IF SOMETHING WAS POSTED
{
$user_name = $_POST['user_name'];
$password = $_POST['password'];
if(!empty($user_name) && !empty($password) ) // not to sighn up user with empty field
{
    // Read from database 
    
    $query = "select * from users where user_name = '$user_name' limit 1";

    $result = mysqli_query($con, $query);

    if($result)
{
    if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] === $password)
            {
                $_SESSION['user_id'] = $user_data['user_id'];
                header("location: index.php");// once registered go to login page 
    die;

            }
        }
}
echo " Wrong username or password";

}
else 
{
    echo " please enter valid information";
}


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<div class="container-fluid">   
    <div class="row">
        <div class="offset-md-4 col-md-4">
            <h2>Login</h2>
            <hr>


            <form method = "post">

                <div class="form-group">
                    <label for="">username</label>
                    <input id="tex" type="text" name="user_name" >
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input id="tex" type="password" name="password"><br><br> <! id = text>

                </div>

                <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                <input id="butt" type="submit" value="Login"  class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>
</div>

   <!--
<div id="box">

<form role="form" method="post">
    <div style="font-size: 20px;margin: 10px;">Login</div>
    
    <input id="tex" type="text" name="user_name"> <br> <br> <! id = text> 
            <input id="tex" type="password" name="password"><br><br> <! id = text>

    <input id="butt" type="submit" value="Login"><br><br>

    <a href="sighnup.php"> Click to sighnup</a><br><br>


-->










<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
