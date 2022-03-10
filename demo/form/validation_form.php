<?php 
if(isset($_POST['submit'])){
  $name = array('Edwin','Student', 'peter', 'Samid', 'Mohad', 'Maria', 'Jane', 'Tom');
$minimum = 5;
$maximum = 10;

  $username = $_POST['username'];
  $password = $_POST['password'];

  if(strlen($username) < $minimum){
    echo 'Username has to be longer than five characters';
  }
  if(strlen($username) > $maximum){
    echo 'Username has to be less than ten characters';
  }

  if(!in_array($username,$name)){
    echo 'Sorry, You are not allowed';
  }else{
    echo 'Welcome';
  }

  // echo 'Hello'. $username;
  // echo 'Your Password is'.$password;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="validation_form.php" method="post">
    <input type="text" placeholder="Enter username" name="username">
    <input type="password" placeholder="Enter password" name="password"><br>
    <input type="submit" name="submit">
  </form>
</body>

</html>