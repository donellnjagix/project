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
        // save to database 
        $user_id = random_num(20);
        $query = "insert into users(user_id,user_name,password) values('$user_id','$user_name','$password')";
    
        mysqli_query($con, $query);

        header("location: login.php");// once registered go to login page 
        die;

    }else 
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
    <title>Sighn up</title>
</head>
<body>
    <style type="text/css">

        #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
        }

        #text{
            
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }
    
        <div id="box"></div>{
            
            padding: 20px;
            width: 300px;
            margin: auto;
            background-color: grey;
           
        }
        </style>

<div id="box">

<form method="post">
    <div style="font-size: 20px;margin: 10px;">Sighn up</div>
    
    <input id="tex" type="text" name="user_name"> <br> <br> <! id = text> 
            <input id="tex" type="password" name="password"><br><br> <! id = text>

    <input id="butt" type="submit" value="Sighn up"><br><br>

    <a href="login.php"> Click to Login</a><br><br>

</body>
</html>
